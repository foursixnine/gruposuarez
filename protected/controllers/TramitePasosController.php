<?php

class TramitePasosController extends Controller
{
/**
* @var string the default layout for the views. Defaults to '//layouts/column2', meaning
* using two-column layout. See 'protected/views/layouts/column2.php'.
*/
public $layout='//layouts/column2';

/**
* @return array action filters
*/
public function filters()
{
return array(
'accessControl', // perform access control for CRUD operations
);
}

/**
* Specifies the access control rules.
* This method is used by the 'accessControl' filter.
* @return array access control rules
*/
public function accessRules()
{
        return array(
        array('allow',  // allow all users to perform 'index' and 'view' actions
            'actions'=>array('index','view','pasoanterior','vertramitesliquidados','reporte','excelreporte','reportepasos'),
            'users'=>array('*'),
        ),
        array('allow', // allow authenticated user to perform 'create' and 'update' actions
            'actions'=>array('tramite','update','pasoanterior','detalleliquidacion','vertramitesliquidados','reporte','excelreporte','reportepasos'),
         //   'users'=>array('@'),
             'users'=>array('*'),
        ),
        array('allow', // allow admin user to perform 'admin' and 'delete' actions
            'actions'=>array('admin','delete'),
           // 'users'=>array('*'),
            'users'=>array('admin', 'gilarreta','aquintero','lvelasco','mguerra','orodriguez'),
        ),
        array('deny',  // deny all users
            'users'=>array('*'),
        ),
);
}

public function actions()
  {
      return array(
          'captcha'=>array(
              'class'=>'CCaptchaAction',
              'backColor'=>0xFFFFFF,
          ),
          'page'=>array(
              'class'=>'CViewAction',
          ),
          'yiichat'=>array('class'=>'YiiChatAction'), // <- ADD THIS LINE
      );
  }
/**
* Displays a particular model.
* @param integer $id the ID of the model to be displayed
*/
public function actionView($id)
{
    //Cargo mi Modelo Actual Tramite Actividad 
    $model=$this->loadModel($id);
    //Para saber las actividades que exiten por tramite
   
    $tramitesactividad = TramiteActividad::model()->tramitesactividad($model->id_tramite);
    $this->render('view',array(
          'model'=>$model,
          'tramitesactividad'=>$tramitesactividad,
    ));
}

/**
* Creates a new model.
* If creation is successful, the browser will be redirected to the 'view' page.
*/
public function actionPasoAnterior($id)
{
        //Buscamos el ultimo tramite registrado
        $model = new TramitePasos();
        $tramite = new Tramite();
        
        $tramite = $tramite->find('id_tramite=:id_tramite',
                              array(':id_tramite'=>$id)); 
        $paso_anterior=$tramite->id_pasos-1;
        
        $tramiteupdate = Tramite::model()->updateAll(array( 
                                                'id_pasos'    =>$paso_anterior,   
                                                'fecha_paso' =>null,
                                                'inicio'=>1,
                                                                  ),
                                                                    'id_tramite ='.$id
                                                            );
        
        ///**********NUEVO TRAMITE **********//////////
  
        $tramite_pasos_update = TramitePasos::model()->updateAll(array( 
                                                    'id_paso'    =>$paso_anterior,   
                                                    'fecha_paso' =>NULL,      
                                                ),
                                                    'id_tramite = '.$id .' and id_paso='.$paso_anterior
                                                ///''    =>$ultimo_tramite->id_pasos-1
                                            
                                    );
        $ultimo_tramite = $model->find('id_tramite=:id_tramite ORDER BY id_tramite_pasos DESC',
                              array(':id_tramite'=>$id)); 
        
        $this->loadModel($ultimo_tramite->id_tramite_pasos)->delete();    
        
        
        $this->redirect(array('tramitePasos/tramite/','id'=>$id));
}

/************************** REGISTRAR TRAMIES*****************/
public function actionTramite($id)
{
 
    //Para la Bitacora del tramite
    $model = new TramitePasos;
    //Para la actividad del tramite
    $tramite_actividad = new TramiteActividad;
    //Para saber las actividades que exiten por tramite
    $tramitesactividad = TramiteActividad::model()->tramitesactividad($id);
    
    //Para Actualzar el Tramite
    $tramite_datosgenerales = new Tramite();
       
    //Para el Chat **
    $chat = new Chat;
    //Para los CHAT que existen por tramite
    $chat_mostrar = Chat::model()->tramites($id);
    
    //Buscar datos del tramite de un cliente
    $tramite_cliente =  Tramite::model()->find('id_tramite=:id_tramite',
                               array(':id_tramite'=>$id));

    $cliente = Cliente::model()->find('id_cliente_gs=:id_cliente_gs',
                               array(':id_cliente_gs'=>$tramite_cliente->id_cliente_gs));
    
    //Campos Adicionales///
        $calle = Yii::app()->dbconix->createCommand()
        ->select('calle')
        ->from('project_models_house')
        ->where(' project = '."'".$cliente->id_proyecto."'")
        ->queryScalar();
         $model_adic = Yii::app()->dbconix->createCommand()
        ->select('model')
        ->from('project_models_house')
        ->where('project = '."'".$cliente->id_proyecto."'")
        ->queryScalar();
                  
   // var_dump($chat_mostrar);die;
    $tramiteold = TramitePasos::model()->findall('id_tramite=:id_tramite',
                               array(':id_tramite'=>$id
                                    ));
                
    $duracionpasos = DuracionPasos::model()->findall(); 
    
    $pasos = Paso::model()->findall(array('order'=>'id_paso ASC'));
    
    $tramite = Tramite::model()->find('id_tramite=:id_tramite',
                               array(':id_tramite'=>$id)); 
   
    $tramitepasos = new TramitePasos('search');
    
    //Uncomment the following line if AJAX validation is needed
    $this->performAjaxValidation($model);

    //Obtengo la Fecha Actual
    $hoy = date("Y-m-d");
    $tab=false;
    $fecha_tramite = $tramitepasos->fecha_paso;

    
    /********************************************************************************************************************
     * ***************************************** UPDATE TRAMITE (DATOS GENERALES)****************************************
     * ******************************************************************************************************************
     * ******************************************************************************************************************
     */
    
    if (isset($_POST['updatetramite'])){
      
       
          $tramite_datosgenerales->attributes=$_POST['Tramite'];
      
            $x = Tramite::model()->updateByPk($id,array(
               
                                                'plano'             =>$tramite_datosgenerales->plano,   
                                                'fecha_entrega'     =>$tramite_datosgenerales->fecha_entrega,                                        
                                                'ganancia_capital'  =>$tramite_datosgenerales->ganancia_capital,              
                                                'fecha_escritura'   =>$_POST['Tramite']['fecha_escritura'],
                                                'fecha_inscripcion_escritura' =>$_POST['Tramite']['fecha_inscripcion_escritura'],
                                                'num_escritura' =>$_POST['Tramite']['num_escritura'],
                                                'num_finca_inscrita'=>$_POST['Tramite']['num_finca_inscrita'],
                                                'transferencia_inmueble'=>$_POST['Tramite']['transferencia_inmueble'],
                                                'num_permiso_ocupacion'=>$tramite_datosgenerales->num_permiso_ocupacion, 
                                                'num_formulario'=>$_POST['Tramite']['num_formulario'],
            ));


                 
                        if($x)
                        {
                          //var_dump($id);die;
                               Yii::app()->clientScript->registerScript(1, 'alert("Registros Almacenados Correctamente")');
          $this->redirect(array('tramite',
                                  'id'=>$id));
                        }
                
          
          
     }
    
    if (isset($_POST['chat'])){

          $chat->attributes=$_POST['Chat'];
          //var_dump($chat->descripcion);die;
          $chat->id_tramite=$id;
          $chat->save();
           //$tab=true;
           $this->redirect(array('tramite','id'=>$id));
          
    }
        
//*********************************************************************************************************
//*********************************************************************************************************
//*********************************************************************************************************
//*************************$_POST['TramitePasos'], $_POST['TramiteActividad']************************************************     
//*********************************************************************************************************
//*********************************************************************************************************

    if(isset($_POST['TramitePasos'], $_POST['TramiteActividad']))
    {
                            
        //ATRIUTOS QUE VIENEN POR POST
        $model->attributes=$_POST['TramitePasos'];
        $tramite_actividad->attributes=$_POST['TramiteActividad'];

        //Ponemos fecha en NULL
        if($model->firma_cliente == ""){ $model->firma_cliente=null; } 
        if($model->firma_promotora == ""){ $model->firma_promotora=null;} 
        if($model->fecha_solicitud == ""){ $model->fecha_solicitud=null;} 
        if($model->fecha_recibido == ""){ $model->fecha_recibido=null;} 

        
         //*********************************************************************************************************
         //*********************************************************************************************************
         //*********************************************************************************************************
         //*************************************SI ES ACTUALIZAR************************************************//
         //*********************************************************************************************************
         //*********************************************************************************************************

          if(isset($_POST['actualizar'])){
               
              //SI PASO ES EL IGUAL A 1  
              if($_POST['TramitePasos']['id_paso']==1){  
               
                          //Actualizo la Tabla Tramite
                $tramiteupdate = Tramite::model()->updateAll(array( 
                                                'id_pasos'    =>1,
                                                'id_estado'   =>$model->id_estado,              
                                                'fecha_inicio'   =>$hoy,
                                                'fecha_paso'   =>$hoy,
                                                'inicio'   =>1,                                        
                                                'id_razones_estado' => $model->id_razones_estado,
                                                'id_cliente' => $cliente->id_cliente                                             
                                                                  ),
                                                                    'id_tramite ='.$id
                                                            );
                 // var_dump($tramiteupdate);die;            
                  //Guardamos el Tramite de la Actividad
                  $tramite_actividad->id_paso=1;
                  $tramite_actividad->id_tramite=$id;
                  
                  $tramite_actividad->save();  
                  //Redigirimos la pagina a TRAMITE
                  $this->redirect(array('tramite','id'=>$id));

              //SI TRAMITE PASO ES IGUAL A DOS
              }elseif($_POST['TramitePasos']['id_paso']==2){
                
                              //Busco si existe el tramite con el "PASO 2" ingreso o actualizo
                              //Busco mi tramite
                              $tramite_two = TramitePasos::model()->find('id_tramite=:id_tramite and
                                            id_paso=:id_paso',
                                           
                                        array(':id_tramite'=>$id,
                                             ':id_paso'=>2,
                                            ));
                              //Si es existe mi tramite y es Diferente de vacio
                              if(!empty($tramite_two)){

                                $tramite_pasos_update = TramitePasos::model()->updateAll(array( 
                                                    'id_pasos'                 =>$tramite->id_pasos,
                                                    'id_estado'                =>$model->id_estado,   

                                                    'fecha_inicio'             =>$hoy,
                                                    'id_razones_estado'        => $model->id_razones_estado,
                                                    'fecha_actualizacion'      =>$hoy,
                                                  
                                                                      ),
                                                                        'id_paso=2 AND id_tramite ='.$id
                                                                );
                                //Guardo la Actividad
                                $tramite_actividad->id_paso=2;
                                $tramite_actividad->id_tramite=$id;
                                $tramite_actividad->save();  
                                $this->redirect(array('tramite','id'=>$id));

                              }else{

                                  //GUARDO el PASO DOS  
                                  $model->fecha_inicio=$tramite->fecha_inicio;  
                                  $model->id_tramite=$id; 
                                  $model->id_cliente_gs=$tramite->id_cliente_gs; 
                                  $model->fecha_pazysalvo=$tramite->fecha_pazysalvo;
                                  $model->id_expediente_fisico=$tramite->id_expediente_fisico;
                                  $model->id_usuario=$tramite->id_usuario;                              
                                  $model->save();

                                  //Guardo la Actividad
                                  $tramite_actividad->id_paso=2;
                                  $tramite_actividad->id_tramite=$id;
                                  $tramite_actividad->save();
                                  $this->redirect(array('tramite','id'=>$id));
                              }       
                                
                        
            
              }else{
              //Es 3 o UN PASO MAYOR
                        
                       
                          //Buscar el ID del TRAMITE PASO
                          $id_tp =  TramitePasos::model()->find(
                                               'id_tramite=:id_tramite AND 
                                                id_paso=:id_paso',
                                              array(':id_tramite'=>$id,
                                                    ':id_paso'=>$tramite->id_pasos,
                                                    ));

                          //ACTUALIZAMOS EL TRAMITE PASO
                          $tramite_pasos_update = TramitePasos::model()->updateByPk($id_tp->id_tramite_pasos,array(  
                                                  'id_pasos'                 =>$tramite->id_pasos,
                                                  'id_estado'                =>$model->id_estado,   
                                                  'id_responsable_ejecucion' =>$model->id_responsable_ejecucion,  
                                                  'id_razones_estado'        => $model->id_razones_estado,
                                                  'id_tipo_responsable'      =>$model->id_tipo_responsable,
                                                  'fecha_actualizacion'      =>$hoy,
                                                  'id_crm_proyecto' => $cliente->id_proyecto      
                                                                    ));

                          //Actualizo mi table TRAMITE 
                          $tramiteupdate = Tramite::model()->updateByPk($id,array( 
                                'id_responsable_ejecucion' =>$model->id_responsable_ejecucion,  
                                'id_estado'                =>$model->id_estado,                                                                             
                                'id_razones_estado' => $model->id_razones_estado,         
                                            ));


                          //GUARDO LOS DATOS EN MI TABLA ACTIVIDAD DEL TRAMITE 
                          $tramite_actividad->id_paso=$tramite->id_pasos;
                          $tramite_actividad->id_tramite=$id;
                          $tramite_actividad->save();  
                          $this->redirect(array('tramite','id'=>$id));

              //CIERRO EL ELSE (SI ES MAYOR A 3)
                    }
                
            
          }else{
//*********************************************************************************************************
//*********************************************************************************************************
//***************************************CERRAR PASO*******************************************************
//*********************************************************************************************************
//*********************************************************************************************************

                if($_POST['TramitePasos']['id_paso']==1){
                          //Actualizo mi table TRAMITE 
                          $tramiteupdate = Tramite::model()->updateByPk($id,array( 
                                            'id_pasos'                 =>2,
                                            'id_estado'                =>$model->id_estado,
                                             'inicio'   =>1,                                    
                                            'fecha_inicio'             =>$hoy,
                                            'id_razones_estado'        => $model->id_razones_estado,
                                            'id_cliente'               =>$cliente->id_cliente,  
                                            'id_responsable_ejecucion' =>$model->id_responsable_ejecucion,  
                                            'id_estado'                =>$model->id_estado,    
                                            'fecha_actualizacion'      =>$hoy,                                                                         
                                            ));
      
                          //Actualizo la Tabla Tramite Paso
                          $tramite_pasos_update = TramitePasos::model()->updateAll(array( 
                                                      'id_estado'   =>$model->id_estado,    

                                                      'fecha_solicitud'=>$model->fecha_solicitud,
                                                      'fecha_recibido'=>$model->fecha_recibido,
                                                      'firma_promotora'=>$model->firma_promotora,
                                                      'firma_cliente'=>$model->firma_cliente,
                                                      'fecha_paso'   =>$hoy,                                                
                                                      'id_razones_estado' => $model->id_razones_estado,
                                                      'id_crm_proyecto' => $tramite->id_proyecto,
                                                      'id_banco' => $cliente->id_banco,
                                                      'fecha_actualizacion'      =>$hoy,        
                                                                        ),
                                                                        'id_paso=1 and id_tramite ='.$id 
                                                                  );
                    //BUSCO EL TRAMITE ONE
                    $tramite_two = TramitePasos::model()->find('id_tramite=:id_tramite and
                                        id_paso=:id_paso',
                                         array(':id_tramite'=>$id,
                                               ':id_paso'=>2,
                                        ));

                    if(empty($tramite_two)){

                    //Actualizo la Tabla Tramite Paso
               
                          $model->fecha_inicio=$hoy;  
                          $model->id_tramite=$id; 
                          $model->id_cliente_gs=$tramite->id_cliente_gs; 
                          $model->fecha_pazysalvo=$tramite->fecha_pazysalvo;
                          $model->id_expediente_fisico=$tramite->id_expediente_fisico;
                          $model->id_usuario=$tramite->id_usuario;
                          $model->id_paso=2;
                          $model->fecha_actualizacion=$hoy;
                          //Guardo el tramite    
                          $model->save();
                        
                  }

                         
                $this->redirect(array('tramite','id'=>$id));
          //SI ES CERRAR PASO 2      
          }elseif($_POST['TramitePasos']['id_paso']==2){  
      
                    //BUSCO EL TRAMITE ONE
                    $tramite_one = TramitePasos::model()->find('id_tramite=:id_tramite and
                                        id_paso=:id_paso',
                                        array(':id_tramite'=>$id,
                                              ':id_paso'=>1,
                                        ));

                    if(empty($tramite_one->fecha_paso)){
                          Yii::app()->user->setFlash('error', "Es necesario Cerrar el Paso 1 => SOLICITUD DE MINUTA DE CANCELACIÓN A BANCO INTERINO Y FIRMA DE MINUTA");
                          $this->redirect(array('tramite','id'=>$id));
                          //var_dump($tramite_one);die;
                    }

                    //Busco si existe el tramite con el PASO 2 ingreso o actualizo
                    //Busco mi tramite
                    $tramite_two = TramitePasos::model()->find('id_tramite=:id_tramite and
                                            id_paso=:id_paso', array(
                                                                      ':id_tramite'=>$id,
                                                                      ':id_paso'=>2,
                                                                    ));

                    //SI PASO 2 EXISTE EN MI TABLA TRAMITE_PASOS => ACTUALIZO
                    if(!empty($tramite_two)){    
                                        //Actualizo la Tabla Tramite
                                        $tramiteupdate = Tramite::model()->updateByPk($id,array( 
                                              'id_pasos'                 =>3,
                                              'id_estado'                =>$model->id_estado,                                        
                                              'fecha_inicio'             =>$hoy,
                                              'id_razones_estado'        =>$model->id_razones_estado,
                                              'id_cliente'               =>$cliente->id_cliente,  
                                              'id_responsable_ejecucion' =>$model->id_responsable_ejecucion,  
                                              'id_estado'                =>$model->id_estado,   
                                              'fecha_actualizacion'      =>$hoy,                                                                                  
                                        ));

                                          //Buscar el ID del TRAMITE PASO
                                        $id_tp2 =  TramitePasos::model()->find(
                                                       'id_tramite=:id_tramite AND 
                                                        id_paso=:id_paso',
                                                  array(':id_tramite'=>$id,
                                                        ':id_paso'=>2,
                                                        ));

                                      //ACTUALIZAMOS EL TRAMITE PASO
                                      $tramite_pasos_update = TramitePasos::model()->updateByPk($id_tp2->id_tramite_pasos,array(  
                                                'id_estado'   =>$model->id_estado,                                        
                                                'fecha_solicitud'=>$model->fecha_solicitud,
                                                'fecha_recibido'=>$model->fecha_recibido,
                                                'firma_promotora'=>$model->firma_promotora,
                                                'firma_cliente'=>$model->firma_cliente,
                                                'fecha_paso'   =>$hoy,
                                                'id_banco' => $cliente->id_banco,
                                                'id_razones_estado' => $model->id_razones_estado,
                                                'id_estado' => 4,
                                                'id_crm_proyecto' =>$cliente->id_proyecto,
                                                'fecha_actualizacion'      =>$hoy,
                                                            )); 

                          //SI PASO 2 AUN NO EXISTE EN MI TABLA TRAMITE_PASOS => INGRESO Y PASO AL PASO 3.                        
                          $model->fecha_inicio=$tramite->fecha_inicio;  
                          $model->id_tramite=$id; 
                          $model->id_cliente_gs=$tramite->id_cliente_gs; 
                          $model->fecha_pazysalvo=$tramite->fecha_pazysalvo;
                          $model->id_expediente_fisico=$tramite->id_expediente_fisico;
                          $model->id_usuario=$tramite->id_usuario;
                          $model->id_crm_proyecto = $tramite->idClienteGs->id_proyecto;
                          $model->fecha_actualizacion=$hoy;
                          $model->id_paso=3;
                        //  $tramite_actividad->id_paso=$tramite->id_pasos;
                         // $tramite_actividad->id_tramite=$id;
                  
                          //Guardo el tramite    
                          $model->save();
                          
                          //Guardo la Activudad
                          //$tramite_actividad->save();  
                          $this->redirect(array('tramite','id'=>$model->id_tramite));

                    }else{


                            $model->fecha_inicio=$hoy;  
                            $model->id_tramite=$id; 
                            $model->id_cliente_gs=$tramite->id_cliente_gs; 
                            $model->fecha_pazysalvo=$tramite->fecha_pazysalvo;
                            $model->id_expediente_fisico=$tramite->id_expediente_fisico;
                            $model->id_usuario=$tramite->id_usuario;
                            $model->fecha_actualizacion=$hoy;
                            $pasoactual=$tramite->id_pasos;
                            $model->id_paso=$tramite->id_pasos+1;
                            $tramite_actividad->id_paso=$tramite->id_pasos;
                            $tramite_actividad->id_tramite=$id;
                    
                            //Guardo el tramite    
                            $model->save();
                            
                            //Guardo la Activudad
                            $tramite_actividad->save();                      
                    
                            if($model->save()){
                                        $tramiteupdate = Tramite::model()->updateAll(array( 
                                                'id_pasos' => 3,                                                                       
                                                'fecha_paso'=>null,
                                                 'inicio'=>1,
                                                //'id_razones_estado' => null
                                                                      ),
                                                                        'id_tramite ='.$id
                                                                ); 

                                $this->redirect(array('tramite','id'=>$model->id_tramite));
                            }else{
                                        //echo "epaa";    die;
                                    Yii::app()->user->setFlash('error', "Datos Invalidos por favor verifique!");   
                            }
                       }
            
          
            }elseif($tramite->id_pasos==11){
                                       //11 Es el FIN DEL TRAMITE   
            
                  if($tramite->plano=="" or $tramite->ganancia_capital==""){
                        Yii::app()->user->setFlash('notice', "Recuerde Actualizar los DATOS DEL TRAMITE");                      
                  }else{                    
                  //Actualizo mi table TRAMITE 
                  $tramiteupdate = Tramite::model()->updateByPk($id,array( 
                            'id_responsable_ejecucion' =>$model->id_responsable_ejecucion,  
                            'id_estado'                =>$model->id_estado,                                                                              
                            'id_razones_estado' => $model->id_razones_estado, 
                            'fecha_paso'=>$hoy,
                            'fecha_fin'=>$hoy,    
                            'id_pasos' => 11,       
                                        ));  
     

                  //Buscar el ID del TRAMITE PASO
                  $id_tp =  TramitePasos::model()->find(
                                       'id_tramite=:id_tramite AND 
                                        id_paso=:id_paso',
                                      array(':id_tramite'=>$id,
                                            ':id_paso'=>11,
                                            ));

                  //ACTUALIZAMOS EL TRAMITE PASO
                  $tramite_pasos_update = TramitePasos::model()->updateByPk($id_tp->id_tramite_pasos,array(  
                                                'id_estado'   =>$model->id_estado,                                        
                                                'fecha_solicitud'=>$model->fecha_solicitud,
                                                'fecha_recibido'=>$model->fecha_recibido,
                                                'firma_promotora'=>$model->firma_promotora,
                                                'firma_cliente'=>$model->firma_cliente,
                                                'fecha_paso'   =>$hoy,
                                                'id_banco' => $cliente->id_banco,
                                                'id_razones_estado' => $model->id_razones_estado,
                                                'id_estado' => $model->id_estado,
                                                'id_crm_proyecto' =>$cliente->id_proyecto,
                                                'fecha_actualizacion'      =>$hoy,
                                            
                                                            )); 
            Yii::app()->user->setFlash('success', "TRAMITE LIQUIDADO!");
            $this->redirect(array('tramitePasos/vertramitesliquidados','id'=>$id));
                 }           
            }else{
                $tramiteupdate = Tramite::model()->updateAll(array( 
                                        'id_pasos' => $model->id_paso,                                                                                                              
                                        'fecha_paso'=>$hoy,
                                        'inicio'=>1,
                                        'fecha_actualizacion'      =>$hoy,        
                                                              ),
                                                                'id_tramite ='.$id
                                                        ); 

                  $id_tpm3 =  TramitePasos::model()->find(
                                       'id_tramite=:id_tramite AND 
                                        id_paso=:id_paso',
                                      array(':id_tramite'=>$id,
                                            ':id_paso'=>$tramite->id_pasos,
                                            ));

                  //ACTUALIZAMOS EL TRAMITE PASO
                  $tramite_pasos_update = TramitePasos::model()->updateByPk($id_tpm3->id_tramite_pasos,array(  
                                                'id_estado'   =>$model->id_estado,                                        
                                                'fecha_solicitud'=>$model->fecha_solicitud,
                                                'fecha_recibido'=>$model->fecha_recibido,
                                                'firma_promotora'=>$model->firma_promotora,
                                                'firma_cliente'=>$model->firma_cliente,
                                                'fecha_paso'   =>$hoy,
                                                'id_banco' => $cliente->id_banco,
                                                'id_razones_estado' => $model->id_razones_estado,
                                                'id_estado' => $model->id_estado,
                                                'id_crm_proyecto' =>$cliente->id_proyecto,
                                                'fecha_actualizacion'      =>$hoy,
                                            
                                                            )); 
            /*    $tramite_pasos_update = TramitePasos::model()->updateAll(array( 
                                                'id_pasos'    =>$tramite->id_pasos,
                                                'id_estado'   =>$model->id_estado,                                        
                                                'fecha_solicitud'=>$model->fecha_solicitud,
                                                'fecha_recibido'=>$model->fecha_recibido,
                                                'firma_promotora'=>$model->firma_promotora,
                                                'firma_cliente'=>$model->firma_cliente,
                                                'fecha_paso'   =>$hoy,
                                                'id_banco' => $cliente->id_banco,
                                                'id_razones_estado' => $model->id_razones_estado,
                                                'id_crm_proyecto' => $tramite->id_proyecto,
                                                'fecha_actualizacion'      =>$hoy
                                                                  ),
                                                                    'id_tramite ='.$id
                                                            );        */       
                                                           
      
            $model->fecha_inicio=$hoy;  
            $model->id_tramite=$id; 
            $model->id_cliente_gs=$tramite->id_cliente_gs; 
            $model->fecha_pazysalvo=$tramite->fecha_pazysalvo;
            $model->id_expediente_fisico=$tramite->id_expediente_fisico;
            $model->id_usuario=$tramite->id_usuario;
            $model->fecha_actualizacion=$hoy;
            //Calculo el paso siguiente
            $pasoactual=$tramite->id_pasos;
            $model->id_paso=$pasoactual+1;
            $tramite_actividad->id_paso=$tramite->id_pasos;
            $tramite_actividad->id_tramite=$id;
            
            
            $model->save();
            $tramite_actividad->save();                      
            
                    if($model->save()){
                                $tramiteupdate = Tramite::model()->updateAll(array( 
                                        'id_pasos' => $model->id_paso,                                                                       
                                       // 'id_estado'   =>$model->id_estado,
                                         //$model->fecha_paso=
                                        'inicio'=>1,
                                        'fecha_paso'=>null,
                                        'fecha_actualizacion'      =>$hoy,        
                                        'id_razones_estado' => null

                                                              ),
                                                                'id_tramite ='.$id
                                                        ); 

                        $this->redirect(array('tramite','id'=>$model->id_tramite));
                    }else{
                           Yii::app()->user->setFlash('error', "Fin del proceso!");
                    }
             }
          ///FIIIIIIIIIIIIIIIIIIIIIIIIIIIIN
 }
    }    
    
    
$this->render('tramite',array(
    'model'=>$model,
    'tramiteold'=>$tramiteold,
    'tramite'=>$tramite,
    'tramitepasos'=>$tramitepasos,
    'duracionpasos'=>$duracionpasos,
    'pasos'=>$pasos,
    'tramite_actividad'=>$tramite_actividad,
    'chat'=>$chat,
    'chat_mostrar'=>$chat_mostrar,
    'calle'=>$calle,
    'model_adic'=>$model_adic,
    'tab'=>$tab,
    'tramitesactividad'=>$tramitesactividad,
    'tramite_datosgenerales'=>$tramite_datosgenerales
      ));
}


/**
* Updates a particular model.
* If update is successful, the browser will be redirected to the 'view' page.
* @param integer $id the ID of the model to be updated
*/

public function actionUpdate($id){
    
    //Cargo mi Modelo Actual Tramite Actividad 
    $model=$this->loadModel($id);

    //Creo un nuevo modelo de Tramite Actividad
    $tramite_actividad = new TramiteActividad;
    
    //Para saber las actividades que exiten por tramite
    $tramitesactividad = TramiteActividad::model()->tramitesactividad($model->id_tramite);
   
    $tramite_estado = TramiteActividad::model()->findAll(
                                                'id_tramite=:id_tramite AND id_paso=:id_paso',
                                                array(':id_tramite'=>$model->id_tramite,
                                                ':id_paso'=>$model->id_paso,
                                     )); 

    // Uncomment the following line if AJAX validation is needed
    $this->performAjaxValidation($model);
    $this->performAjaxValidation($tramite_actividad);
    

      if(isset($_POST['actualizar'])){

              
                $tramite_actividad->attributes=$_POST['TramiteActividad'];
                $tramite_actividad->id_paso=$model->id_paso;
                $tramite_actividad->id_tramite=$model->id_tramite;
                $tramite_actividad->id_estado;
                $tramite_actividad->save();     
                Yii::app()->user->setFlash('success', "Actividad creada Satisfactoriamente!");       
                $this->redirect(array('update','id'=>$id));
             
                
      }
        if(isset($_POST['tramite']))
        {
           
            $model->attributes=$_POST['TramitePasos'];
             
            if($model->validate())
            {
                $model->save();
                $this->redirect(array('view','id'=>$id));
            }
        }
   

    $this->render('update',array(
             'model'=>$model,
             'tramitesactividad'=>$tramitesactividad,
             'tramite_actividad'=>$tramite_actividad,
             'tramite_estado'=>$tramite_estado,
    ));
}

/**********************VER TRAMITES LIQUIDADOS**********************************************/
public function actionVerTramitesLiquidados($id){
    
    //var_dump($id);die;
        $model = new Tramite();

       
        // Uncomment the following line if AJAX validation is needed
        $this->performAjaxValidation($model);

        $tramitesactividad = TramiteActividad::model()->tramitesactividad($id);
        $tramitesliquidados = Yii::app()->db->createCommand()
                ->select('tp.id_tramite,tp.id_paso, c.nombre_de_empresa, tp.fecha_inicio, tp.fecha_paso, 
                    t.plano, t.fecha_entrega, t.ganancia_capital, t.permiso_ocupacion, 
                    t.inicio, t.fecha_escritura, t.fecha_inscripcion_escritura, t.num_escritura, 
                    t.num_finca_inscrita, t.transferencia_inmueble, t.num_permiso_ocupacion')
                ->from('tramite_pasos tp')
                ->join('tramite t', 'tp.id_tramite = t.id_tramite AND tp.id_tramite= '."'".$id."'")
                ->join('cliente c', 'c.id_cliente_gs = t.id_cliente_gs GROUP BY 
                        tp.id_paso, tp.id_tramite, c.nombre_de_empresa, tp.fecha_inicio, tp.fecha_paso, 
                        t.plano, t.fecha_entrega, t.ganancia_capital, t.permiso_ocupacion,
                        t.inicio, t.fecha_escritura, t.fecha_inscripcion_escritura, t.num_escritura, 
                        t.num_finca_inscrita, t.transferencia_inmueble, t.num_permiso_ocupacion 
                        order by tp.id_paso')      
                ->queryAll(true);


          if(isset($_POST['Tramite']))
              {

             
              $model->attributes=$_POST['Tramite'];
             // var_dump($model->casa_entregada );die;

                  $tramiteupdate = Tramite::model()->updateAll(array( 
                                                      'descripcion'    =>$model->descripcion,
                                                      'casa_entregada' =>$_POST['Tramite']['casa_entregada'],                                            
                                                   'fecha_entrega' => $_POST['Tramite']['fecha_entrega']
                                                                        ),
                                                                'id_tramite ='.$id
                                                       );
                //   $this->redirect(array('vertramitesliquidados','id'=>$id));
              }

      
                  // var_dump($tramitesliquidados);die;                         
        $this->render('vertramitesliquidados',array(
         'tramitesliquidados'=>$tramitesliquidados,
         'tramitesactividad'=>$tramitesactividad,
         'model'=>$model
    ));
    
    
}
/**
* Deletes a particular model.
* If deletion is successful, the browser will be redirected to the 'admin' page.
* @param integer $id the ID of the model to be deleted
*/
public function actionDelete($id){
if(Yii::app()->request->isPostRequest)
{
// we only allow deletion via POST request
$this->loadModel($id)->delete();

    // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
    if(!isset($_GET['ajax']))
             $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
    }else
         throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
    }

/**
* Lists all models.
*/
public function actionIndex()
{
        $dataProvider=new CActiveDataProvider('TramitePasos');
        $this->render('index',array(
               'dataProvider'=>$dataProvider,
        ));
}

/**
* Manages all models.
*/
public function actionAdmin($id)
{
    
  //  $model = new TramitePasos('search');
    
    $model = TramitePasos::model()->tramitesanteriores($id);
    //var_dump($model);die;
   /** $model->unsetAttributes();  // clear any default values
    if(isset($_GET['TramitePasos']))
             $model->attributes=$_GET['TramitePasos'];
*/
    $this->render('admin',array(
             'model'=>$model,
    ));
}

public function actionDetalleLiquidacion($id)
{
    
  //  $model = new TramitePasos('search');
    
    $tramitePasos=TramitePasos::model()->find(
                                'id_tramite_pasos=:id_tramite_pasos',
                                'id_paso=:id_paso',
                                array(':id_tramite_pasos'=>$id,
                                      ':id_paso'=>1,
                                      )); 
    var_dump($tramitePasos);die;
    //var_dump($model);die;
   /** $model->unsetAttributes();  // clear any default values
    if(isset($_GET['TramitePasos']))
             $model->attributes=$_GET['TramitePasos'];
*/
    $this->render('admin',array(
             'model'=>$model,
    ));
}
/*
** REPORTE EXCEL
*/


  public function actionReportePasos(){

       /* $reportepasos = Yii::app()->db->createCommand()
      ->select('SUM(DISTINCT c.monto_liquidacion) as total_liquidado, SUM(DISTINCT c.total_venta) as totalventa, m.descripcion as nommes,p.titulo, pa.descripcion, p.id_crm_proyecto as crmproyecto,
         COUNT(DISTINCT t.id_tramite) as totalpaso, t.id_paso, date_part('. "'month'".', t.fecha_paso) as mes, p.id_crm_proyecto as crmproyecto')
      ->from('tramite_pasos t, cliente c, proyecto p, meses m,paso pa')
      ->where(' p.id_crm_proyecto=c.id_proyecto and 
          m.id_meses=date_part('. "'month'".', t.fecha_paso) and pa.id_paso=t.id_paso and 
           c.id_proyecto=p.id_crm_proyecto and c.id_cliente_gs=t.id_cliente_gs  and t.id_paso=11
      group by t.id_paso, mes, crmproyecto, nommes, p.titulo, pa.descripcion 
      order by mes')
      ->queryAll(true);*/

      $reportepasos = Yii::app()->db->createCommand()
      ->select('c.monto_liquidacion as totalliquidado, c.total_venta as totalventa, c.nombre_de_empresa,c.numero_de_lote as lote, c.id_proyecto as crmproyecto,
              c.proyecto as titulo, t.id_pasos, date_part('. "'month'".', t.fecha_inicio) as mes')
      ->from('tramite t, cliente c')
      ->where('t.id_pasos=11 and 
           c.id_cliente_gs=t.id_cliente_gs 
      group by t.id_pasos, mes, crmproyecto, c.proyecto,totalliquidado, totalventa,lote, c.nombre_de_empresa 
      order by mes')
      ->queryAll(true);
 /*  echo "<pre>";
    print_r($reportepasos); // or var_dump($data);
    echo "</pre>";  
    die;*/
        
      Yii::app()->request->sendFile('Liquidaciones.xls',
                                $this->renderPartial('reportepasos',array(
                                    'reportepasos'=>$reportepasos,
                                ),true)
                
      );
  }


 public function actionExcelReporte() {

    
    $issueDataProvider = $_SESSION['TramitePasos'];
    $cliente = new Cliente();
    $i = 0;
      // var_dump($chat_mostrar);die;
    $tramite = Tramite::model()->findall();  
        $i++;
        
        foreach($issueDataProvider->getData(true) as $queryData)
        {          
              $data[$i]['nombre_de_empresa'] = $queryData->idClienteGs->nombre_de_empresa;
              $data[$i]['proyecto'] = $queryData->idClienteGs->proyecto;
              $data[$i]['numero_de_lote'] =$queryData->idClienteGs->numero_de_lote;
              $data[$i]['total_venta'] =  $queryData->idClienteGs->total_venta;
              $data[$i]['monto_liquidacion'] =  $queryData->idClienteGs->monto_liquidacion;
              $data[$i]['banco_acreedor'] =  $queryData->idClienteGs->banco_acreedor;
              $data[$i]['fecha_inicio'] =  $queryData->fecha_inicio;
              $data[$i]['fecha_actualizacion'] =  $queryData->fecha_actualizacion;
              $data[$i]['fecha_paso'] =  $queryData->fecha_paso;
              $data[$i]['id_tramite'] =  $queryData->id_tramite;
              $data[$i]['plano'] =  $queryData->idTramite->plano;
              $data[$i]['fecha_entrega'] = $queryData->idTramite->fecha_entrega; 
              $data[$i]['ganancia_capital'] = $queryData->idTramite->ganancia_capital;   
              $data[$i]['fecha_escritura'] = $queryData->idTramite->fecha_escritura;   
              $data[$i]['fecha_inscripcion_escritura'] = $queryData->idTramite->fecha_inscripcion_escritura;   
              $data[$i]['num_escritura'] = $queryData->idTramite->num_escritura;    
              $data[$i]['num_finca_inscrita'] = $queryData->idTramite->num_finca_inscrita;   
              $data[$i]['transferencia_inmueble'] = $queryData->idTramite->transferencia_inmueble;    
              $data[$i]['num_permiso_ocupacion'] = $queryData->idTramite->num_permiso_ocupacion;  
              $data[$i]['fecha_de_permiso_ocupacion'] = $queryData->idClienteGs->fecha_de_permiso_ocupacion;  
              $data[$i]['id_paso'] = $queryData->idPaso->descripcion; 
              $data[$i]['id_expediente_fisico'] = $queryData->idExpedienteFisico->descripcion; 
              $data[$i]['num_formulario'] = $queryData->idTramite->num_formulario;
              $data[$i]['id_tipo_responsable'] = $queryData->idPaso->abrev;  
              $data[$i]['fecha_de_permiso_contruccion'] =$queryData->idClienteGs->fecha_de_permiso_contruccion;
              $data[$i]['vendedor'] =$queryData->idClienteGs->vendedor;
              $data[$i]['confeccion_protocolo']=$queryData->idClienteGs->confeccion_protocolo;
              $data[$i]['agente_tramite']=$queryData->idClienteGs->agente_tramite;


            $i++;
        }


      Yii::app()->request->sendFile('ReportePasos.xls',
                                $this->renderPartial('excelreporte',array(
                                    'data'=>$data,
                                    'tramite'=>$tramite
                                ),true)        
        );

  }

  /**Reporte***/
  public function actionReporte()
  {

    $model = new TramitePasos();

    $var_post = Yii::app()->getRequest()->getParam('TramitePasos');
        if ($var_post) {
            $model->attributes = $var_post;
        }

        $provider = $model->reporteexcel();
        $count = $provider->getItemCount();
            $minimo =  Yii::app()->db->createCommand()
            ->select('MIN(fecha_inicio)')
            ->from('tramite_pasos')
            ->where('id_paso!=11')
            ->queryScalar();

            $maximo =  Yii::app()->db->createCommand()
            ->select('MAX(fecha_inicio)')
            ->from('tramite_pasos')
            ->where('id_paso!=11')
            ->queryScalar();
       
        $this->render('reporte', array(
            'model' => $model,
            'count' => $count,
            'minimo' => $minimo,
            'maximo' => $maximo,
        ));

  }


/**
* Returns the data model based on the primary key given in the GET variable.
* If the data model is not found, an HTTP exception will be raised.
* @param integer the ID of the model to be loaded
*/
public function loadModel($id)
{
        $model=TramitePasos::model()->findByPk($id);
                if($model===null)
                         throw new CHttpException(404,'The requested page does not exist.');
                return $model;
}

/**
* Performs the AJAX validation.
* @param CModel the model to be validated
*/
protected function performAjaxValidation($model)
{
    if(isset($_POST['ajax']) && $_POST['ajax']==='tramite-pasos-form')
    {
             echo CActiveForm::validate($model);
            Yii::app()->end();
    }
}
}
