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
            'actions'=>array('index','view','pasoanterior'),
            'users'=>array('*'),
        ),
        array('allow', // allow authenticated user to perform 'create' and 'update' actions
            'actions'=>array('tramite','update','pasoanterior'),
            'users'=>array('@'),
        ),
        array('allow', // allow admin user to perform 'admin' and 'delete' actions
            'actions'=>array('admin','delete'),
            'users'=>array('*'),
          //  'users'=>array('admin', 'gilarreta'),
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
    $this->render('view',array(
          'model'=>$this->loadModel($id),
    ));
}

/**
* Creates a new model.
* If creation is successful, the browser will be redirected to the 'view' page.
*/
public function actionPasoAnterior($id)
{
        //Buscamos el ultimo tramite registrado
        $model= new TramitePasos();
        $tramite= new Tramite();
        
        $tramite = $tramite->find('id_tramite=:id_tramite',
                              array(':id_tramite'=>$id)); 
        $paso_anterior=$tramite->id_pasos-1;
        
        $tramiteupdate = Tramite::model()->updateAll(array( 
                                                'id_pasos'    =>$paso_anterior,   
                                                'fecha_paso' =>null,
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

public function actionTramite($id)
{
 
    //Para la Bitacora del tramite
    $model = new TramitePasos;
    //Para la actividad del tramite
    $tramite_actividad = new TramiteActividad;
    $tramitesactividad = TramiteActividad::model()->tramitesactividad($id);
    
    $tramite_datosgenerales = new Tramite();
       
    //Para el Chat **
    $chat = new Chat;
    //$chat_mostrar = new Chat('search');
    $chat_mostrar = Chat::model()->tramites($id);
    
    //Buscar Cliente
    $tramite_cliente=  Tramite::model()->find('id_tramite=:id_tramite',
                               array(':id_tramite'=>$id));
    $cliente= Cliente::model()->find('id_cliente_gs=:id_cliente_gs',
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

    //Obtengo la fecha actual
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
               
            ));
           
     
           $this->redirect(array('tramite','id'=>$id));
          
     }
      if (isset($_POST['chat'])){
      
       // $tramite_datosgenerales->attributes=$_POST['Tramite'];
        
        
        //var_dump($_POST['Chat']);die;
          $chat->attributes=$_POST['Chat'];
          //var_dump($chat->descripcion);die;
          $chat->id_tramite=$id;
          $chat->save();
           //$tab=true;
           $this->redirect(array('tramite','id'=>$id));
          
     }
    if(isset($_POST['TramitePasos'], $_POST['TramiteActividad']))
    {
     //   var_dump($tramiteupdate->plano);
     //     $tramiteupdate->attributes=$_POST['Tramite'];
      //  die;
           $model->attributes=$_POST['TramitePasos'];
           $tramite_actividad->attributes=$_POST['TramiteActividad'];
        
           //*********************************************************************************************************
           //*********************************************************************************************************
           //*********************************************************************************************************
           //***********************************************ACTUALIZAR************************************************//
           if(isset($_POST['actualizar'])){
               
            if($_POST['TramitePasos']['id_paso']==1){  
                
            $tramiteupdate = Tramite::model()->updateAll(array( 
                                                'id_pasos'    =>$tramite->id_pasos,
                                                'id_estado'   =>$model->id_estado,                                        
                                                'fecha_inicio'   =>$hoy,
                                                'fecha_paso'   =>null,
                                                'inicio'   =>1,
                                                'id_razones_estado' => $model->id_razones_estado                                            
                                                                  ),
                                                                    'id_tramite ='.$id
                                                            );
                                                 $tramite_actividad->save();
            }elseif($_POST['TramitePasos']['id_paso']==2){
                
                        $tramite_two = TramitePasos::model()->find('id_tramite=:id_tramite and
                                 id_paso=:id_paso',
                               array(':id_tramite'=>$id,
                                     ':id_paso'=>2,
                                    ));
                                   
                        if($tramite_two==NULL){
                            //Poner fecha en null
                            if($model->firma_cliente ==""){
                                $model->firma_cliente=null;
                            }
                            if($model->firma_promotora ==""){
                                $model->firma_promotora=null;
                            }
                            if($model->fecha_solicitud ==""){
                                $model->fecha_solicitud=null;
                            }
                            if($model->fecha_recibido ==""){
                                $model->fecha_recibido=null;
                            }
                            
                            $model->fecha_inicio=$tramite->fecha_inicio;  
                            $model->id_tramite=$id; 
                            $model->id_cliente_gs=$tramite->id_usuario; 
                            $model->fecha_pazysalvo=$tramite->fecha_pazysalvo;
                            $model->id_expediente_fisico=$tramite->id_expediente_fisico;
                            $model->id_usuario=$tramite->id_usuario;
                           // $tramite_actividad->save();
                            $model->save();
                        }else{
                            
                       
                        $tramite_pasos_update = TramitePasos::model()->updateAll(array( 
                                                'id_pasos'    =>$tramite->id_pasos,
                                                'id_estado'   =>$model->id_estado,                                        
                                                'fecha_inicio'   =>$hoy,
                                                //'fecha_paso'   =>"",
                                                'id_razones_estado' => $model->id_razones_estado
                                              
                                                                  ),
                                                                    'id_tramite ='.$id
                                                            );
                        }
                
            }else{
            $tramiteupdate = Tramite::model()->updateAll(array( 
                                                'id_pasos'    =>$tramite->id_pasos,
                                                'id_estado'   =>$model->id_estado,                                        
                                                'fecha_inicio'   =>$hoy,
                                                'fecha_paso'   =>null,
                                                'inicio'   =>1,
                                                'id_razones_estado' => $model->id_razones_estado                                            
                                                                  ),
                                                                    'id_tramite ='.$id
                                                            );                
            }
         /*   $tramite_pasos_update = TramitePasos::model()->updateAll(array( 
                                                'id_pasos'    =>$tramite->id_pasos,
                                                'id_estado'   =>$model->id_estado,                                        
                                                'fecha_inicio'   =>$hoy,
                                                //'fecha_paso'   =>"",
                                                'id_razones_estado' => $model->id_razones_estado
                                              
                                                                  ),
                                                                    'id_tramite ='.$id
                                                            );*/
            $tramite_actividad->id_paso=$tramite->id_pasos;
            $tramite_actividad->id_tramite=$id;
            $tramite_actividad->save();  
            $this->redirect(array('tramite','id'=>$id));
            
            //*********************************************************************************************************
            //*********************************************************************************************************
            //***************************************CERRAR PASO*************************************************
            //*********************************************************************************************************
            //*********************************************************************************************************
            
            
            }else{
               
            //Pongo las fecha en NULL
            if($model->firma_cliente ==""){
                $model->firma_cliente=null;
            }
            if($model->firma_promotora ==""){
                $model->firma_promotora=null;
            }
            if($model->fecha_solicitud ==""){
                $model->fecha_solicitud=null;
            }
            if($model->fecha_recibido ==""){
                $model->fecha_recibido=null;
            }
            
            //Si es paso 1 y le da cerrar paso. Actualizo y Pongo la Fecha de Cierre es de decir fecha de Paso
            
            if($_POST['TramitePasos']['id_paso']==1){
                
                //Actualizo la Tabla Tramite
                $tramiteupdate = Tramite::model()->updateAll(array( 
                                                'id_pasos'    =>$tramite->id_pasos,
                                                'id_estado'   =>$model->id_estado,                                        
                                                'fecha_inicio'   =>$hoy,
                                                'fecha_paso'   =>null,
                                                'inicio'   =>1,
                                                'id_razones_estado' => $model->id_razones_estado                                            
                                                                  ),
                                                                    'id_tramite ='.$id
                                                            );        
                //Actualizo la Tabla Tramite Paso
                $tramite_pasos_update = TramitePasos::model()->updateAll(array( 
                                             //   'id_pasos'    =>1,
                                                'id_estado'   =>$model->id_estado,                                        
                                                'fecha_solicitud'=>$model->fecha_solicitud,
                                                'fecha_recibido'=>$model->fecha_recibido,
                                                'firma_promotora'=>$model->firma_promotora,
                                                'firma_cliente'=>$model->firma_cliente,
                                                'fecha_paso'   =>$hoy,                                                
                                                'id_razones_estado' => $model->id_razones_estado
                                              
                                                                  ),
                                                                  'id_paso=1 and id_tramite ='.$id 
                                                            );
                                                $this->redirect(array('tramite','id'=>$id));
            //Si al dar CERRAR PASO es 2(PASO 2)                                    
            }elseif($_POST['TramitePasos']['id_paso']==2){  
      
                   
                    //Actualizo la Tabla Tramite
                    $tramiteupdate = Tramite::model()->updateAll(array( 
                                                                    'id_pasos' =>$model->id_paso,
                                                                    'inicio'   =>1,               
                                                                  ),
                                                                    'id_tramite ='.$id
                                                            ); 
                   
                    $tramite_pasos_update = TramitePasos::model()->updateAll(array( 
                                                'id_pasos'    =>2,
                                                'id_estado'   =>$model->id_estado,                                        
                                                'fecha_solicitud'=>$model->fecha_solicitud,
                                                'fecha_recibido'=>$model->fecha_recibido,
                                                'firma_promotora'=>$model->firma_promotora,
                                                'firma_cliente'=>$model->firma_cliente,
                                                'fecha_paso'   =>$hoy,     
                                                'id_razones_estado' => $model->id_razones_estado                                              
                                                                  ),                    
                                                                    'id_paso=2 and id_tramite ='.$id                                                                   
                                                            );
   
                    $model->fecha_inicio=$tramite->fecha_inicio;  
                    $model->id_tramite=$id; 
                    $model->id_cliente_gs=$tramite->id_cliente_gs; 
                    $model->fecha_pazysalvo=$tramite->fecha_pazysalvo;
                    $model->id_expediente_fisico=$tramite->id_expediente_fisico;
                    $model->id_usuario=$tramite->id_usuario;
                    $pasoactual=$tramite->id_pasos;
                    $model->id_paso=$pasoactual+1;
                    $tramite_actividad->id_paso=$tramite->id_pasos;
                    $tramite_actividad->id_tramite=$id;
            
                    //Guardo el tramite    
                    $model->save();
                    
                    //Guardo la Activudad
                    $tramite_actividad->save();                      
            
                    if($model->save()){
                                $tramiteupdate = Tramite::model()->updateAll(array( 
                                        'id_pasos' => $model->id_paso,                                                                       
                                       // 'id_estado'   =>$model->id_estado,
                                         //$model->fecha_paso=

                                        'fecha_paso'=>null,
                                        'id_razones_estado' => null

                                                              ),
                                                                'id_tramite ='.$id
                                                        ); 

                        $this->redirect(array('tramite','id'=>$model->id_tramite));
                    }else{
                                //echo "epaa";    die;
                            Yii::app()->user->setFlash('error', "Datos Invalidos por favor verifique!");   
                    }
             
            
          
            }elseif($tramite->id_pasos==11){
                                       //echo "HolA ES 11 FIIn";die;       
                   $tramiteupdate = Tramite::model()->updateAll(array( 
                                        'id_pasos' => 11,                                                                                                              
                                        'fecha_paso'=>$hoy,

                                                              ),
                                                                'id_tramite ='.$id
                                                        );     
            $tramite_pasos_update = TramitePasos::model()->updateAll(array( 
                                                'id_pasos'    =>11,
                                                'id_estado'   =>$model->id_estado,                                        
                                                'fecha_solicitud'=>$model->fecha_solicitud,
                                                'fecha_recibido'=>$model->fecha_recibido,
                                                'firma_promotora'=>$model->firma_promotora,
                                                'firma_cliente'=>$model->firma_cliente,
                                                'fecha_paso'   =>$hoy,
                                                'id_razones_estado' => $model->id_razones_estado
                                              
                                                                  ),
                                                                    'id_tramite ='.$id
                                                            );  
            Yii::app()->user->setFlash('success', "Fin del Tramite!");
                            
            }else{
                $tramiteupdate = Tramite::model()->updateAll(array( 
                                        'id_pasos' => $model->id_paso,                                                                                                              
                                        'fecha_paso'=>$hoy,

                                                              ),
                                                                'id_tramite ='.$id
                                                        ); 
                $tramite_pasos_update = TramitePasos::model()->updateAll(array( 
                                                'id_pasos'    =>$tramite->id_pasos,
                                                'id_estado'   =>$model->id_estado,                                        
                                                'fecha_solicitud'=>$model->fecha_solicitud,
                                                'fecha_recibido'=>$model->fecha_recibido,
                                                'firma_promotora'=>$model->firma_promotora,
                                                'firma_cliente'=>$model->firma_cliente,
                                                'fecha_paso'   =>$hoy,
                                                'id_razones_estado' => $model->id_razones_estado
                                              
                                                                  ),
                                                                    'id_tramite ='.$id
                                                            );               
                                                           
           // $model->fecha_paso=$hoy; 
            $model->fecha_inicio=$tramite->fecha_inicio;  
            $model->id_tramite=$id; 
            $model->id_cliente_gs=$tramite->id_usuario; 
            $model->fecha_pazysalvo=$tramite->fecha_pazysalvo;
            $model->id_expediente_fisico=$tramite->id_expediente_fisico;
            $model->id_usuario=$tramite->id_usuario;
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

                                        'fecha_paso'=>null,
                                        'id_razones_estado' => null

                                                              ),
                                                                'id_tramite ='.$id
                                                        ); 

                        $this->redirect(array('tramite','id'=>$model->id_tramite));
                    }else{
                           Yii::app()->user->setFlash('error', "Fin del proceso!");
                    }
             }
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
public function actionUpdate($id)
{
$model=$this->loadModel($id);

// Uncomment the following line if AJAX validation is needed
// $this->performAjaxValidation($model);

if(isset($_POST['TramitePasos']))
{
    $model->attributes=$_POST['TramitePasos'];
    if($model->save())
         $this->redirect(array('view','id'=>$model->id_tramite_pasos));
    }

    $this->render('update',array(
         'model'=>$model,
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
