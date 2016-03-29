<?php

class TablerosController extends Controller
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
        'actions'=>array('index','view','createtramitesone','createtramitestwo','createTramitebancos'),
        'users'=>array('*'),
    ),
    array('allow', // allow authenticated user to perform 'create' and 'update' actions
        'actions'=>array('create','update','createanillos','createexpediente','createestatuscartera','createmetascobranzas','createtramitesone','createtramitestwo','createTramitebancos'),
        'users'=>array('@'),
    ),
    array('allow', // allow admin user to perform 'admin' and 'delete' actions
        'actions'=>array('admin','delete'),
        'users'=>array('admin'),
    ),
    array('deny',  // deny all users
        'users'=>array('*'),
    ),
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
public function actionCreate()
{
    $model=new Tableros;

// Uncomment the following line if AJAX validation is needed
// $this->performAjaxValidation($model);
     
    if(isset($_POST['Tableros']))
    {
        $model->attributes=$_POST['Tableros'];
        if($model->save())
        $this->redirect(array('view','id'=>$model->id_tablero));
    }

    $this->render('create',array(
          'model'=>$model,
    ));
}

public function actionCreateAnillos()
{
    $model =new Tableros;
    $proyecto="";
    $totalsi="";
  
    if(isset($_POST['Tableros'])){
       //var_dump($_POST['Tableros']);die;
    
               $proyecto = $_POST['Tableros']['id_crm_proyecto'];
               $fecha_inicio = $_POST['Tableros']['fecha_inicio'];
               $fecha_fin = $_POST['Tableros']['fecha_fin'];
               $usuario = $_POST['Tableros']['id_usuario'];
               if($fecha_inicio=="" or $fecha_fin==""){
                          $fecha_inicio='2013-01-01';
                          $fecha_fin='2021-01-01';
                }
                if($usuario=="" ){
                          $usuario=0;
                         
                }
              //var_dump($fecha_fin);die;
             $model->attributes=$_POST['Tableros'];
                 //var_dump(  $model->attributes);die; $proyecto= $model->id_crm_proyecto;
      
            
                   
                    $totalsi=  Yii::app()->db->createCommand()
                    ->select('COUNT(contactado_llamada)')
                    ->from('gestion')
                    ->where('id_crm_proyecto='."'".$proyecto."'".' OR id_usuario = '.$usuario.''
                            . ' and '
                            . 'fecha_acuerdo BETWEEN '. "'".$fecha_inicio."'".' and '. "'". $fecha_fin."'")
                    ->queryScalar();
                      

               // }
           }
      
        
   
    
    $this->render('createanillos',array(
        'model'=>$model,
        'proyecto'=>$proyecto,
        'totalsi'=>$totalsi,
        
    ));
    
}

public function actionCreateEstatuscartera()
{
    $model =new Tableros;
    $proyecto="";
    $total30 =  Yii::app()->db->createCommand()
                    ->select('SUM(cartera_30_dias)')
                                    ->from('cliente')
                                    ->queryScalar();
   //Careta 60 dias
   echo $total60 =  Yii::app()->db->createCommand()
    ->select('SUM(cartera_60_dias)')
                    ->from('cliente')                                   
                    ->queryScalar();
   //Careta 90 dias
    echo $total90 =  Yii::app()->db->createCommand()
    ->select('SUM(cartera_90_dias)')
                    ->from('cliente')                                   
                    ->queryScalar();
    //Careta 120 dias
    echo $total120 =  Yii::app()->db->createCommand()
    ->select('SUM(cartera_120_dias)')
                    ->from('cliente')                                   
                    ->queryScalar();
    
        $total30p =  Yii::app()->db->createCommand()
                    ->select('SUM(treinta)')
                                    ->from('pivote')
                                     ->where('mes=4')
                                    ->queryScalar();
   //Careta 60 dias
   echo $total60p =  Yii::app()->db->createCommand()
    ->select('SUM(sesenta)')
                    ->from('pivote')
                    ->where('mes=4')
                    ->queryScalar();
   //Careta 90 dias
    echo $total90p =  Yii::app()->db->createCommand()
    ->select('SUM(noventa)')
                    ->from('pivote')  
                    ->where('mes=4')
                    ->queryScalar();
    //Careta 120 dias
    echo $total120p =  Yii::app()->db->createCommand()
    ->select('SUM(cientoveinte)')
                    ->from('pivote')
                    ->where('mes=4')
                    ->queryScalar();
    $mes="";
    if(isset($_POST['Tableros'])){
   
           $model->attributes=$_POST['Tableros'];
           //  var_dump($_POST['Tableros']);die;
          // if($model->validate()){
                                                     
               $proyecto = $_POST['Tableros']['id_crm_proyecto'];
               //$fecha_inicio = $_POST['Tableros']['fecha_inicio'];
              // $fecha_fin = $_POST['Tableros']['fecha_fin'];
               $usuario = $_POST['Tableros']['id_usuario'];
               $mes = $_POST['Tableros']['mes'];
               if($proyecto!="" and $mes!=""){
                    //Careta 30 dias
                    $total30 =  Yii::app()->db->createCommand()
                    ->select('SUM(cartera_30_dias)')
                                    ->from('cliente')
                                    ->where('id_proyecto='."'".$proyecto."'")
                                    ->queryScalar();
                    //Careta 60 dias
                    $total60 =  Yii::app()->db->createCommand()
                    ->select('SUM(cartera_60_dias)')
                                    ->from('cliente')
                                    ->where('id_proyecto='."'".$proyecto."'")
                                    ->queryScalar();

                    //Careta 90 dias
                    $total90 =  Yii::app()->db->createCommand()
                    ->select('SUM(cartera_90_dias)')
                                    ->from('cliente')
                                    ->where('id_proyecto='."'".$proyecto."'")
                                    ->queryScalar();
                             //Careta 90 dias
                    $total120 =  Yii::app()->db->createCommand()
                    ->select('SUM(cartera_120_dias)')
                                    ->from('cliente')
                                    ->where('id_proyecto='."'".$proyecto."'")
                                    ->queryScalar();
                
                    
                     $total30p =  Yii::app()->db->createCommand()
                    ->select('SUM(treinta)')
                                    ->from('pivote')
                                    ->where('mes='."'".$mes."'".' and id_crm_proyecto='."'".$proyecto."'")
                                    ->queryScalar();
                            
                    //Careta 60 dias
                    $total60p =  Yii::app()->db->createCommand()
                    ->select('SUM(sesenta)')
                                    ->from('pivote')
                                     ->where('mes='."'".$mes."'".' and id_crm_proyecto='."'".$proyecto."'")
                                    ->queryScalar();

                    //Careta 90 dias
                    $total90p =  Yii::app()->db->createCommand()
                    ->select('SUM(noventa)')
                                    ->from('pivote')
                                     ->where('mes='."'".$mes."'".' and id_crm_proyecto='."'".$proyecto."'")
                                    ->queryScalar();
                             //Careta 90 dias
                    $total120p =  Yii::app()->db->createCommand()
                    ->select('SUM(cientoveinte)')
                                    ->from('pivote')
                                    ->where('mes='."'".$mes."'".' and id_crm_proyecto='."'".$proyecto."'")
                                    ->queryScalar();
                    $proyecto= $model->id_crm_proyecto;
                    $mes=$model->mes;

         //  }
            }elseif($proyecto!=""){  
                $total30 =  Yii::app()->db->createCommand()
                    ->select('SUM(cartera_30_dias)')
                                    ->from('cliente')
                                    ->where('id_proyecto='."'".$proyecto."'")
                                    ->queryScalar();
                    //Careta 60 dias
                    $total60 =  Yii::app()->db->createCommand()
                    ->select('SUM(cartera_60_dias)')
                                    ->from('cliente')
                                    ->where('id_proyecto='."'".$proyecto."'")
                                    ->queryScalar();

                    //Careta 90 dias
                    $total90 =  Yii::app()->db->createCommand()
                    ->select('SUM(cartera_90_dias)')
                                    ->from('cliente')
                                    ->where('id_proyecto='."'".$proyecto."'")
                                    ->queryScalar();
                             //Careta 90 dias
                    $total120 =  Yii::app()->db->createCommand()
                    ->select('SUM(cartera_120_dias)')
                                    ->from('cliente')
                                    ->where('id_proyecto='."'".$proyecto."'")
                                    ->queryScalar();
            }
    }  
        
   

    $this->render('createestatuscartera',array(
        'model'=>$model,
        'proyecto'=>$proyecto,
        'total30'=>$total30,
        'total60'=>$total60,
        'total90'=>$total90,
        'total120'=>$total120,
        'total30p'=>$total30p,
        'total60p'=>$total60p,
        'total90p'=>$total90p,
        'total120p'=>$total120p,
        'mes'=>$mes,
        
    ));
    
}


public function actionCreateExpediente()
{
    $model=new Tableros;
    $proyecto="";
    
   // $totalsi="";
// Uncomment the following line if AJAX validation is needed
   //$this->performAjaxValidation($model);
	if(isset($_POST['Tableros']))
		{
		
			$model->attributes=$_POST['Tableros'];
                       // print_r($model);die;
		
			if($proyecto!=""){
				$proyecto= $model->id_crm_proyecto;
                                $totalsi=  Yii::app()->dbconix->createCommand()
                                ->select('SUM(TOTAL_VENTA)')
                                ->from('customers_view')
                                ->where('ID_PROYECTO='."'".$model->id_crm_proyecto."'")
                                ->queryScalar();
                                $proyecto=$model->id_crm_proyecto;
                                $this->redirect('createexpediente',array(
                                              // 'totalsi'=>$totalsi,
                                               'proyecto'=>$proyecto,
                                               'model'=>$model,

                                ));
                        }
		
		}
    

    $this->render('createexpediente',array(
    'model'=>$model,
                'proyecto'=>$proyecto,
        //'totalsi'=>$totalsi,
    ));
  
  
}


public function actionCreateMetascobranzas()
{
   
    $model = new Tableros;
    $model->unsetAttributes();
    //Variables
    $proyecto=null;
    $totalmetaspg="";
    $mes="";
    $eneproy=0;
    $febproy=0;
    $marproy=0;
    $abrilproy=0;
    $mayoproy=0;
    $junproy=0;
    $julproy=0;
    $agosproy=0;
    $sepproy=0;    
    $octproy=0;
    $novproy=0;
    $dicproy=0;
    $eneropgg=0;
         $febreropgg=0;
            $marzopgg=0;
            $abrilpgg=0;
            $mayopgg=0;
            $juniopgg=0;
            $juliopgg=0;
            $agostopgg=0;
            $septiembrepgg=0;
            $octubrepgg=0;
            $noviembrepgg=0;
            $diciembrepgg=0;
            ////////////////////////
            $cobradora="";
            $eneproycobrador=0;
$febproycobrador=0;
$marproycobrador=0;
$abrilproycobrador=0;
$mayoproycobrador=0;
$junproycobrador=0;
$julproycobrador=0;
$agosproycobrador=0;
$sepproycobrador=0;    
$octproycobrador=0;
$novproycobrador=0;
$dicproycobrador=0;  
$eneropggcobrador=0;
$febreropggcobrador=0;
$marzopggcobrador=0;
$abrilpggcobrador=0;
$mayopggcobrador=0;
$juniopggcobrador=0;
$juliopggcobrador=0;
$agostopggcobrador=0;
$septiembrepggcobrador=0;
$octubrepggcobrador=0;
$noviembrepggcobrador=0;
$diciembrepggcobrador=0;
   // $cobrado="";
        //////////*********CALCULO GLOBALES DE MESES CONIX***************************    
        //Enero 1
        $enero = Yii::app()->dbconix->createCommand()
        ->select('sum(monto)')
        ->from('payments p, quotes_details qd')
        ->where('p.Abono_Reff=qd.Bill and fecha BETWEEN '. "'2016-01-01'".' and '. "'2016-01-31'")
        ->queryScalar();
       
        //Febrero 2
        $febrero = Yii::app()->dbconix->createCommand()
        ->select('sum(monto)')
        ->from('payments p, quotes_details qd')
        ->where('p.Abono_Reff=qd.Bill and fecha BETWEEN '. "'2016-02-01'".' and '. "'2016-02-31'")
        ->queryScalar();
        //Marzo 3
        $marzo = Yii::app()->dbconix->createCommand()
        ->select('sum(monto)')
        ->from('payments p, quotes_details qd')
        ->where('p.Abono_Reff=qd.Bill and fecha BETWEEN '. "'2016-03-01'".' and '. "'2016-03-31'")
        ->queryScalar();
        //Abril
        $abril = Yii::app()->dbconix->createCommand()
        ->select('sum(monto)')
        ->from('payments p, quotes_details qd')
        ->where('p.Abono_Reff=qd.Bill and fecha BETWEEN '. "'2016-04-01'".' and '. "'2015-04-31'")
        ->queryScalar();
        //Mayo
        $mayo = Yii::app()->dbconix->createCommand()
        ->select('sum(monto)')
        ->from('payments p, quotes_details qd')
        ->where('p.Abono_Reff=qd.Bill and fecha BETWEEN '. "'2016-05-01'".' and '. "'2016-05-31'")
        ->queryScalar();
        //Junio
        $junio = Yii::app()->dbconix->createCommand()
        ->select('sum(monto)')
        ->from('payments p, quotes_details qd')
        ->where('p.Abono_Reff=qd.Bill and fecha BETWEEN '. "'2016-06-01'".' and '. "'2016-06-31'")
        ->queryScalar();
        //Julio
        $julio = Yii::app()->dbconix->createCommand()
        ->select('sum(monto)')
        ->from('payments p, quotes_details qd')
        ->where('p.Abono_Reff=qd.Bill and fecha BETWEEN '. "'2016-07-01'".' and '. "'2016-07-31'")
        ->queryScalar();
        //Agosto
        $agosto = Yii::app()->dbconix->createCommand()
        ->select('sum(monto)')
        ->from('payments p, quotes_details qd')
        ->where('p.Abono_Reff=qd.Bill and fecha BETWEEN '. "'2016-08-01'".' and '. "'2016-08-31'")
        ->queryScalar();
        //Septiembre
        $septiembre = Yii::app()->dbconix->createCommand()
        ->select('sum(monto)')
        ->from('payments p, quotes_details qd')
        ->where('p.Abono_Reff=qd.Bill and fecha BETWEEN '. "'2016-09-01'".' and '. "'2016-09-31'")
        ->queryScalar();
        //Octubre
        $octubre = Yii::app()->dbconix->createCommand()
        ->select('sum(monto)')
        ->from('payments p, quotes_details qd')
        ->where('p.Abono_Reff=qd.Bill and fecha BETWEEN '. "'2016-10-01'".' and '. "'2016-10-31'")
        ->queryScalar();
        //Noviembre
        $noviembre = Yii::app()->dbconix->createCommand()
        ->select('sum(monto)')
        ->from('payments p, quotes_details qd')
        ->where('p.Abono_Reff=qd.Bill and fecha BETWEEN '. "'2016-11-01'".' and '. "'2016-11-31'")
        ->queryScalar();
        //Diciembre
        $diciembre = Yii::app()->dbconix->createCommand()
        ->select('sum(monto)')
        ->from('payments p, quotes_details qd')
        ->where('p.Abono_Reff=qd.Bill and fecha BETWEEN '. "'2016-12-01'".' and '. "'2016-12-31'")
        ->queryScalar();
//////////*********FIIIN CALCULO GLOBALES DE MESES CONIX***************************
        
        
        //////////*********CALCULO GLOBALES DE MESES DBPG***************************    
        //Enero 1
        $eneropg = Yii::app()->db->createCommand()
        ->select('sum(monto_mes_proyecto)')
        ->from('metas')
        ->where(' mes = 1 and id_tipo_meta=1')
        ->queryScalar();
        //Febrero 2
        $febreropg = Yii::app()->db->createCommand()
        ->select('monto_mes_proyecto')
        ->from('metas')
        ->where(' mes = 2 and id_tipo_meta=1')
        ->queryScalar();
        //Marzo 3
        $marzopg = Yii::app()->db->createCommand()
        ->select('sum(monto_mes_proyecto)')
        ->from('metas')
        ->where(' mes = 3 and id_tipo_meta=1')
        ->queryScalar();
        //Abril
        $abrilpg = Yii::app()->db->createCommand()
        ->select('sum(monto_mes_proyecto)')
        ->from('metas')
        ->where(' mes = 4 and id_tipo_meta=1')
        ->queryScalar();
        //Mayo
        $mayopg = Yii::app()->db->createCommand()
        ->select('sum(monto_mes_proyecto)')
        ->from('metas')
        ->where(' mes = 5 and id_tipo_meta=1')
        ->queryScalar();
        //Junio
        $juniopg = Yii::app()->db->createCommand()
        ->select('sum(monto_mes_proyecto)')
        ->from('metas')
        ->where(' mes = 6 and id_tipo_meta=1')
        ->queryScalar();
        //Julio
        $juliopg = Yii::app()->db->createCommand()
        ->select('sum(monto_mes_proyecto)')
        ->from('metas')
        ->where(' mes = 7 and id_tipo_meta=1')
        ->queryScalar();
        //Agosto
        $agostopg = Yii::app()->db->createCommand()
        ->select('sum(monto_mes_proyecto)')
        ->from('metas')
        ->where(' mes = 8 and id_tipo_meta=1')
        ->queryScalar();
        //Septiembre
        $septiembrepg = Yii::app()->db->createCommand()
        ->select('sum(monto_mes_proyecto)')
        ->from('metas')
        ->where(' mes = 9 and id_tipo_meta=1')
        ->queryScalar();
        //Octubre
        $octubrepg = Yii::app()->db->createCommand()
        ->select('sum(monto_mes_proyecto)')
        ->from('metas')
        ->where(' mes = 10 and id_tipo_meta=1')
        ->queryScalar();
        //Noviembre
        $noviembrepg = Yii::app()->db->createCommand()
        ->select('sum(monto_mes_proyecto)')
        ->from('metas')
        ->where(' mes = 11 and id_tipo_meta=1')
        ->queryScalar();
        //Diciembre
        $diciembrepg = Yii::app()->db->createCommand()
        ->select('sum(monto_mes_proyecto)')
        ->from('metas')
        ->where('mes = 12 and id_tipo_meta=1')
        ->queryScalar();
//////////*********FIIIN CALCULO GLOBALES DE MESES DBPG***************************
        
   if (isset($_POST['Tableros']) && (
           !empty($_POST['Tableros']['id_crm_proyecto']) or 
           !empty($_POST['Tableros']['id_usuario']) or 
           !empty($_POST['Tableros']['id_tipo_meta']) or
           !empty($_POST['Tableros']['mes']) 
           ) ){
    
              
            ///////////////////////////////////////////  
            $proyecto = $_POST['Tableros']['id_crm_proyecto'];
            if($_POST['Tableros']['id_crm_proyecto'] != "" ){  

            $proyecto = $_POST['Tableros']['id_crm_proyecto'];
            $proyectopg = Proyecto::model()->find('id_crm_proyecto=:id_crm_proyecto',
                                        array(':id_crm_proyecto'=>$proyecto));
                    

                         //Para saber el total cobrado de los meses                    
                  
                         $eneproy = Yii::app()->dbconix->createCommand()
                         ->select('sum(p.monto)')
                                 ->from('payments p, quotes_details qd')
                                 ->where(' p.Abono_Reff=qd.Bill and fecha BETWEEN '. "'2016-01-01'".' and '. "'2016-01-31'".' and project = '."'".$proyectopg->id_crm_proyecto."'")
                                 ->queryScalar();


                         
              //    var_dump($eneproy);die;
                  
                         $febproy = Yii::app()->dbconix->createCommand()
                         ->select('sum(p.monto)')
                                 ->from('payments p, quotes_details qd')
                                 ->where(' p.Abono_Reff=qd.Bill and fecha BETWEEN '. "'2016-02-01'".' and '. "'2016-02-31'".' and project = '."'".$proyectopg->id_crm_proyecto."'")
                                 ->queryScalar();
                     
                    
                         $marproy = Yii::app()->dbconix->createCommand()
                         ->select('sum(p.monto)')
                                 ->from('payments p, quotes_details qd')
                                 ->where(' p.Abono_Reff=qd.Bill and fecha BETWEEN '. "'2016-03-01'".' and '. "'2016-03-31'".' and project = '."'".$proyectopg->id_crm_proyecto."'")
                                 ->queryScalar();

                   
         
        
                         $abrilproy = Yii::app()->dbconix->createCommand()
                         ->select('sum(p.monto)')
                                 ->from('payments p, quotes_details qd')
                                 ->where(' p.Abono_Reff=qd.Bill and fecha BETWEEN '. "'2016-04-01'".' and '. "'2016-04-31'".' and project = '."'".$proyectopg->id_crm_proyecto."'")
                                 ->queryScalar();

  
    
                         $mayoproy = Yii::app()->dbconix->createCommand()
                         ->select('sum(p.monto)')
                                 ->from('payments p, quotes_details qd')
                                 ->where(' p.Abono_Reff=qd.Bill and fecha BETWEEN '. "'2016-05-01'".' and '. "'2016-05-31'".' and project = '."'".$proyectopg->id_crm_proyecto."'")
                                 ->queryScalar();

                     

                
                         $junproy = Yii::app()->dbconix->createCommand()
                         ->select('sum(p.monto)')
                                 ->from('payments p, quotes_details qd')
                                 ->where(' p.Abono_Reff=qd.Bill and fecha BETWEEN '. "'2016-06-01'".' and '. "'2016-06-31'".' and project = '."'".$proyectopg->id_crm_proyecto."'")
                                 ->queryScalar();

         
                         $julproy = Yii::app()->dbconix->createCommand()
                         ->select('sum(p.monto)')
                                 ->from('payments p, quotes_details qd')
                                 ->where(' p.Abono_Reff=qd.Bill and fecha BETWEEN '. "'2016-07-01'".' and '. "'2016-07-31'".' and project = '."'".$proyectopg->id_crm_proyecto."'")
                                 ->queryScalar();

        
                         $agosproy = Yii::app()->dbconix->createCommand()
                         ->select('sum(p.monto)')
                                 ->from('payments p, quotes_details qd')
                                 ->where(' p.Abono_Reff=qd.Bill and fecha BETWEEN '. "'2015-08-01'".' and '. "'2016-08-31'".' and project = '."'".$proyectopg->id_crm_proyecto."'")
                                 ->queryScalar();

         
                         $sepproy = Yii::app()->dbconix->createCommand()
                         ->select('sum(p.monto)')
                                 ->from('payments p, quotes_details qd')
                                 ->where(' p.Abono_Reff=qd.Bill and fecha BETWEEN '. "'2016-09-01'".' and '. "'2016-09-31'".' and project = '."'".$proyectopg->id_crm_proyecto."'")
                                 ->queryScalar();

            
                         $octproy = Yii::app()->dbconix->createCommand()
                         ->select('sum(p.monto)')
                                 ->from('payments p, quotes_details qd')
                                 ->where(' p.Abono_Reff=qd.Bill and fecha BETWEEN '. "'2016-10-01'".' and '. "'2016-10-31'".' and project = '."'".$proyectopg->id_crm_proyecto."'")
                                 ->queryScalar();

              
                         $novproy = Yii::app()->dbconix->createCommand()
                         ->select('sum(p.monto)')
                                 ->from('payments p, quotes_details qd')
                                 ->where(' p.Abono_Reff=qd.Bill and fecha BETWEEN '. "'2016-11-01'".' and '. "'2016-11-31'".' and project = '."'".$proyectopg->id_crm_proyecto."'")
                                 ->queryScalar();

              
                         $dicproy = Yii::app()->dbconix->createCommand()
                         ->select('sum(p.monto)')
                                 ->from('payments p, quotes_details qd')
                                 ->where(' p.Abono_Reff=qd.Bill and fecha BETWEEN '. "'2016-12-01'".' and '. "'2016-12-31'".' and project = '."'".$proyectopg->id_crm_proyecto."'")
                                 ->queryScalar();

        /////////////*****************************FIN*****************///////////////////////////
                    
                    
 //////////*********CALCULO GLOBALES DE MESES DBPG***************************    
        //Enero 1
        $eneropgg = Yii::app()->db->createCommand()
        ->select('monto_mes_proyecto')
        ->from('metas')
        ->where('mes = 1 and id_crm_proyecto='."'".$proyectopg->id_crm_proyecto."' and id_tipo_meta=1")
        ->queryScalar();

        //Febrero 2
        $febreropgg = Yii::app()->db->createCommand()
        ->select('monto_mes_proyecto')
        ->from('metas')
        ->where('mes = 2 and id_crm_proyecto='."'".$proyectopg->id_crm_proyecto."' and id_tipo_meta=1")
        ->queryScalar();
        //Marzo 3
        $marzopgg = Yii::app()->db->createCommand()
        ->select('monto_mes_proyecto')
        ->from('metas')
        ->where('mes = 3 and id_crm_proyecto='."'".$proyectopg->id_crm_proyecto."' and id_tipo_meta=1")
        ->queryScalar();
        //Abril
        $abrilpgg = Yii::app()->db->createCommand()
        ->select('monto_mes_proyecto')
        ->from('metas')
        ->where('mes = 4 and id_crm_proyecto='."'".$proyectopg->id_crm_proyecto."' and id_tipo_meta=1")
        ->queryScalar();
        //Mayo
        $mayopgg = Yii::app()->db->createCommand()
        ->select('monto_mes_proyecto')
        ->from('metas')
        ->where('mes = 5 and id_crm_proyecto='."'".$proyectopg->id_crm_proyecto."' and id_tipo_meta=1")
        ->queryScalar();
        //Junio
        $juniopgg = Yii::app()->db->createCommand()
        ->select('monto_mes_proyecto')
        ->from('metas')
        ->where('mes = 6 and id_crm_proyecto='."'".$proyectopg->id_crm_proyecto."' and id_tipo_meta=1")
        ->queryScalar();
        //Julio
        $juliopgg = Yii::app()->db->createCommand()
        ->select('monto_mes_proyecto')
        ->from('metas')
        ->where('mes = 7 and id_crm_proyecto='."'".$proyectopg->id_crm_proyecto."' and id_tipo_meta=1")
        ->queryScalar();
//var_dump($juliopgg);die;
        //Agosto
        $agostopgg = Yii::app()->db->createCommand()
        ->select('monto_mes_proyecto')
        ->from('metas')
        ->where('mes = 8 and id_crm_proyecto='."'".$proyectopg->id_crm_proyecto."' and id_tipo_meta=1")
        ->queryScalar();
        //Septiembre
        $septiembrepgg = Yii::app()->db->createCommand()
        ->select('monto_mes_proyecto')
        ->from('metas')
        ->where('mes = 9 and id_crm_proyecto='."'".$proyectopg->id_crm_proyecto."' and id_tipo_meta=1")
        ->queryScalar();
        //Octubre
        $octubrepgg = Yii::app()->db->createCommand()
        ->select('monto_mes_proyecto')
        ->from('metas')
        ->where('mes = 10 and id_crm_proyecto='."'".$proyectopg->id_crm_proyecto."' and id_tipo_meta=1")
        ->queryScalar();
        //Noviembre
        $noviembrepgg = Yii::app()->db->createCommand()
        ->select('monto_mes_proyecto')
        ->from('metas')
        ->where('mes = 11 and id_crm_proyecto='."'".$proyectopg->id_crm_proyecto."' and id_tipo_meta=1")
        ->queryScalar();
        //Diciembre
        $diciembrepgg = Yii::app()->db->createCommand()
        ->select('monto_mes_proyecto')
        ->from('metas')
        ->where('mes = 12 and id_crm_proyecto='."'".$proyectopg->id_crm_proyecto."' and id_tipo_meta=1")
        ->queryScalar();                         
                         ////
            }elseif($_POST['Tableros']['id_usuario'] !="" and $_POST['Tableros']['id_crm_proyecto'] == ""){  

            $cobradora = $_POST['Tableros']['id_usuario'];
         
                                        //Para saber el total cobrado de los meses                    
                  
                         $eneproycobrador = Yii::app()->dbconix->createCommand()
                         ->select('sum(p.monto)')
                                 ->from('payments p, quotes_details qd')
                                 ->where(' p.Abono_Reff=qd.Bill and fecha BETWEEN '. "'2015-01-01'".' and '. "'2015-01-31'")
                                 ->queryScalar();


                         
              //    var_dump($eneproy);die;
                  
                         $febproycobrador = Yii::app()->dbconix->createCommand()
                         ->select('sum(p.monto)')
                                 ->from('payments p, quotes_details qd')
                                 ->where(' p.Abono_Reff=qd.Bill and fecha BETWEEN '. "'2015-02-01'".' and '. "'2015-02-31'")
                                 ->queryScalar();
                     
                    
                         $marproycobrador = Yii::app()->dbconix->createCommand()
                         ->select('sum(p.monto)')
                                 ->from('payments p, quotes_details qd')
                                 ->where(' p.Abono_Reff=qd.Bill and fecha BETWEEN '. "'2015-03-01'".' and '. "'2015-03-31'")
                                 ->queryScalar();

                   
         
        
                         $abrilproycobrador = Yii::app()->dbconix->createCommand()
                         ->select('sum(p.monto)')
                                 ->from('payments p, quotes_details qd')
                                 ->where(' p.Abono_Reff=qd.Bill and fecha BETWEEN '. "'2015-04-01'".' and '. "'2015-04-31'")
                                 ->queryScalar();

  
    
                         $mayoproycobrador = Yii::app()->dbconix->createCommand()
                         ->select('sum(p.monto)')
                                 ->from('payments p, quotes_details qd')
                                 ->where(' p.Abono_Reff=qd.Bill and fecha BETWEEN '. "'2015-05-01'".' and '. "'2015-05-31'")
                                 ->queryScalar();

                     

                
                         $junproycobrador = Yii::app()->dbconix->createCommand()
                         ->select('sum(p.monto)')
                                 ->from('payments p, quotes_details qd')
                                 ->where(' p.Abono_Reff=qd.Bill and fecha BETWEEN '. "'2015-06-01'".' and '. "'2015-06-31'")
                                 ->queryScalar();

         
                         $julproycobrador = Yii::app()->dbconix->createCommand()
                         ->select('sum(p.monto)')
                                 ->from('payments p, quotes_details qd')
                                 ->where(' p.Abono_Reff=qd.Bill and fecha BETWEEN '. "'2015-07-01'".' and '. "'2015-07-31'")
                                 ->queryScalar();

        
                         $agosproycobrador = Yii::app()->dbconix->createCommand()
                         ->select('sum(p.monto)')
                                 ->from('payments p, quotes_details qd')
                                 ->where(' p.Abono_Reff=qd.Bill and fecha BETWEEN '. "'2015-08-01'".' and '. "'2015-08-31'")
                                 ->queryScalar();

         
                         $sepproycobrador = Yii::app()->dbconix->createCommand()
                         ->select('sum(p.monto)')
                                 ->from('payments p, quotes_details qd')
                                 ->where(' p.Abono_Reff=qd.Bill and fecha BETWEEN '. "'2016-09-01'".' and '. "'2016-09-31'")
                                 ->queryScalar();

            
                         $octproycobrador = Yii::app()->dbconix->createCommand()
                         ->select('sum(p.monto)')
                                 ->from('payments p, quotes_details qd')
                                 ->where(' p.Abono_Reff=qd.Bill and fecha BETWEEN '. "'2016-10-01'".' and '. "'2016-10-31'")
                                 ->queryScalar();

              
                         $novproycobrador = Yii::app()->dbconix->createCommand()
                         ->select('sum(p.monto)')
                                 ->from('payments p, quotes_details qd')
                                 ->where(' p.Abono_Reff=qd.Bill and fecha BETWEEN '. "'2016-11-01'".' and '. "'2016-11-31'")
                                 ->queryScalar();

              
                         $dicproycobrador = Yii::app()->dbconix->createCommand()
                         ->select('sum(p.monto)')
                                 ->from('payments p, quotes_details qd')
                                 ->where(' p.Abono_Reff=qd.Bill and fecha BETWEEN '. "'2016-12-01'".' and '. "'2016-12-31'")
                                 ->queryScalar();

        /////////////*****************************FIN*****************///////////////////////////
                    
                    
 //////////*********CALCULO GLOBALES DE MESES DBPG***************************    
        //Enero 1
        $eneropggcobrador = Yii::app()->db->createCommand()
        ->select('SUM(monto_mes_proyecto)')
        ->from('metas')
        ->where('id_usuario='."'".$cobradora."' and id_tipo_meta=1 and mes=1")
        ->queryScalar();

        //Febrero 2
        $febreropggcobrador = Yii::app()->db->createCommand()
        ->select('sum(monto_mes_proyecto)')
        ->from('metas')
        ->where('id_usuario='."'".$cobradora."' and id_tipo_meta=1 and mes=2")
        ->queryScalar();
        //Marzo 3
        $marzopggcobrador = Yii::app()->db->createCommand()
        ->select('sum(monto_mes_proyecto)')
        ->from('metas')
        ->where('id_usuario='."'".$cobradora."' and id_tipo_meta=1 and mes=3")
        ->queryScalar();
        //Abril
        $abrilpggcobrador = Yii::app()->db->createCommand()
        ->select('sum(monto_mes_proyecto)')
        ->from('metas')
        ->where('id_usuario='."'".$cobradora."' and id_tipo_meta=1 and mes=4")
        ->queryScalar();
        //Mayo
        $mayopggcobrador = Yii::app()->db->createCommand()
        ->select('sum(monto_mes_proyecto)')
        ->from('metas')
        ->where('id_usuario='."'".$cobradora."' and id_tipo_meta=1 and mes=5")
        ->queryScalar();
        //Junio
        $juniopggcobrador = Yii::app()->db->createCommand()
        ->select('sum(monto_mes_proyecto)')
        ->from('metas')
        ->where('id_usuario='."'".$cobradora."' and id_tipo_meta=1 and mes=6")
        ->queryScalar();
        //Julio
        $juliopggcobrador = Yii::app()->db->createCommand()
        ->select('sum(monto_mes_proyecto)')
        ->from('metas')
        ->where('id_usuario='."'".$cobradora."' and id_tipo_meta=1 and mes=7")
        ->queryScalar();
        
        //Agosto
        $agostopggcobrador = Yii::app()->db->createCommand()
        ->select('sum(monto_mes_proyecto)')
        ->from('metas')
        ->where('id_usuario='."'".$cobradora."' and id_tipo_meta=1 and mes=8")
        ->queryScalar();
        //Septiembre
        $septiembrepggcobrador = Yii::app()->db->createCommand()
        ->select('sum(monto_mes_proyecto)')
        ->from('metas')
        ->where('id_usuario='."'".$cobradora."' and id_tipo_meta=1 and mes=9")
        ->queryScalar();
        //Octubre
        $octubrepggcobrador = Yii::app()->db->createCommand()
        ->select('sum(monto_mes_proyecto)')
        ->from('metas')
        ->where('id_usuario='."'".$cobradora."' and id_tipo_meta=1 and mes=10")
        ->queryScalar();
        //Noviembre
        $noviembrepggcobrador = Yii::app()->db->createCommand()
        ->select('sum(monto_mes_proyecto)')
        ->from('metas')
        ->where('id_usuario='."'".$cobradora."' and id_tipo_meta=1 and mes=11")
        ->queryScalar();
        //Diciembre
        $diciembrepggcobrador = Yii::app()->db->createCommand()
        ->select('sum(monto_mes_proyecto)')
        ->from('metas')
        ->where('id_usuario='."'".$cobradora."' and id_tipo_meta=1 and mes=12")
        ->queryScalar();                         
                         ////
            }elseif($_POST['Tableros']['id_usuario'] !="" and $_POST['Tableros']['id_crm_proyecto'] != ""){  
              //*******************************************************************************************************************
              //************************************  COBRADORA Y PROYECTO ********************************************************
              //*******************************************************************************************************************
      
                
                  $proyecto = $_POST['Tableros']['id_crm_proyecto'];
                  $proyectopg = Proyecto::model()->find('id_crm_proyecto=:id_crm_proyecto',
                                        array(':id_crm_proyecto'=>$proyecto));
                    
                  $cobradora=$_POST['Tableros']['id_usuario'];
                         //Para saber el total cobrado de los meses                    
                  
                         $eneproy = Yii::app()->dbconix->createCommand()
                         ->select('sum(p.monto)')
                                 ->from('payments p, quotes_details qd')
                                 ->where(' p.Abono_Reff=qd.Bill and fecha BETWEEN '. "'2016-01-01'".' and '. "'2016-01-31'".' and project = '."'".$proyectopg->id_crm_proyecto."'")
                                 ->queryScalar();


                         
              //    var_dump($eneproy);die;
                  
                         $febproy = Yii::app()->dbconix->createCommand()
                         ->select('sum(p.monto)')
                                 ->from('payments p, quotes_details qd')
                                 ->where(' p.Abono_Reff=qd.Bill and fecha BETWEEN '. "'2016-02-01'".' and '. "'2016-02-31'".' and project = '."'".$proyectopg->id_crm_proyecto."'")
                                 ->queryScalar();
                     
                    
                         $marproy = Yii::app()->dbconix->createCommand()
                         ->select('sum(p.monto)')
                                 ->from('payments p, quotes_details qd')
                                 ->where(' p.Abono_Reff=qd.Bill and fecha BETWEEN '. "'2016-03-01'".' and '. "'2016-03-31'".' and project = '."'".$proyectopg->id_crm_proyecto."'")
                                 ->queryScalar();

                   
         
        
                         $abrilproy = Yii::app()->dbconix->createCommand()
                         ->select('sum(p.monto)')
                                 ->from('payments p, quotes_details qd')
                                 ->where(' p.Abono_Reff=qd.Bill and fecha BETWEEN '. "'2016-04-01'".' and '. "'2016-04-31'".' and project = '."'".$proyectopg->id_crm_proyecto."'")
                                 ->queryScalar();

  
    
                         $mayoproy = Yii::app()->dbconix->createCommand()
                         ->select('sum(p.monto)')
                                 ->from('payments p, quotes_details qd')
                                 ->where(' p.Abono_Reff=qd.Bill and fecha BETWEEN '. "'2016-05-01'".' and '. "'2016-05-31'".' and project = '."'".$proyectopg->id_crm_proyecto."'")
                                 ->queryScalar();

                     

                
                         $junproy = Yii::app()->dbconix->createCommand()
                         ->select('sum(p.monto)')
                                 ->from('payments p, quotes_details qd')
                                 ->where(' p.Abono_Reff=qd.Bill and fecha BETWEEN '. "'2016-06-01'".' and '. "'2016-06-31'".' and project = '."'".$proyectopg->id_crm_proyecto."'")
                                 ->queryScalar();

         
                         $julproy = Yii::app()->dbconix->createCommand()
                         ->select('sum(p.monto)')
                                 ->from('payments p, quotes_details qd')
                                 ->where(' p.Abono_Reff=qd.Bill and fecha BETWEEN '. "'2016-07-01'".' and '. "'2016-07-31'".' and project = '."'".$proyectopg->id_crm_proyecto."'")
                                 ->queryScalar();

        
                         $agosproy = Yii::app()->dbconix->createCommand()
                         ->select('sum(p.monto)')
                                 ->from('payments p, quotes_details qd')
                                 ->where(' p.Abono_Reff=qd.Bill and fecha BETWEEN '. "'2016-08-01'".' and '. "'2016-08-31'".' and project = '."'".$proyectopg->id_crm_proyecto."'")
                                 ->queryScalar();

         
                         $sepproy = Yii::app()->dbconix->createCommand()
                         ->select('sum(p.monto)')
                                 ->from('payments p, quotes_details qd')
                                 ->where(' p.Abono_Reff=qd.Bill and fecha BETWEEN '. "'2016-09-01'".' and '. "'2016-09-31'".' and project = '."'".$proyectopg->id_crm_proyecto."'")
                                 ->queryScalar();

            
                         $octproy = Yii::app()->dbconix->createCommand()
                         ->select('sum(p.monto)')
                                 ->from('payments p, quotes_details qd')
                                 ->where(' p.Abono_Reff=qd.Bill and fecha BETWEEN '. "'2016-10-01'".' and '. "'2016-10-31'".' and project = '."'".$proyectopg->id_crm_proyecto."'")
                                 ->queryScalar();

              
                         $novproy = Yii::app()->dbconix->createCommand()
                         ->select('sum(p.monto)')
                                 ->from('payments p, quotes_details qd')
                                 ->where(' p.Abono_Reff=qd.Bill and fecha BETWEEN '. "'2016-11-01'".' and '. "'2016-11-31'".' and project = '."'".$proyectopg->id_crm_proyecto."'")
                                 ->queryScalar();

              
                         $dicproy = Yii::app()->dbconix->createCommand()
                         ->select('sum(p.monto)')
                                 ->from('payments p, quotes_details qd')
                                 ->where(' p.Abono_Reff=qd.Bill and fecha BETWEEN '. "'2015-12-01'".' and '. "'2015-12-31'".' and project = '."'".$proyectopg->id_crm_proyecto."'")
                                 ->queryScalar();

        /////////////*****************************FIN*****************///////////////////////////
                    
                    
 //////////*********CALCULO GLOBALES DE MESES DBPG***************************    
        //Enero 1
        $eneropgg = Yii::app()->db->createCommand()
        ->select('monto_mes_proyecto')
        ->from('metas')
        ->where('mes = 1 and id_crm_proyecto='."'".$proyectopg->id_crm_proyecto."'".' and id_usuario='."'".$cobradora."' and id_tipo_meta=1")
        ->queryScalar();

        //Febrero 2
        $febreropgg = Yii::app()->db->createCommand()
        ->select('monto_mes_proyecto')
        ->from('metas')
        ->where('mes = 2 and id_crm_proyecto='."'".$proyectopg->id_crm_proyecto."'".' and id_usuario='."'".$cobradora."' and id_tipo_meta=1")
        ->queryScalar();
        //Marzo 3
        $marzopgg = Yii::app()->db->createCommand()
        ->select('monto_mes_proyecto')
        ->from('metas')
        ->where('mes = 3 and id_crm_proyecto='."'".$proyectopg->id_crm_proyecto."'".' and id_usuario='."'".$cobradora."' and id_tipo_meta=1")
        ->queryScalar();
        //Abril
        $abrilpgg = Yii::app()->db->createCommand()
        ->select('monto_mes_proyecto')
        ->from('metas')
        ->where('mes = 4 and id_crm_proyecto='."'".$proyectopg->id_crm_proyecto."'".' and id_usuario='."'".$cobradora."' and id_tipo_meta=1")
        ->queryScalar();
        //Mayo
        $mayopgg = Yii::app()->db->createCommand()
        ->select('monto_mes_proyecto')
        ->from('metas')
        ->where('mes = 5 and id_crm_proyecto='."'".$proyectopg->id_crm_proyecto."'".' and id_usuario='."'".$cobradora."' and id_tipo_meta=1")
        ->queryScalar();
        //Junio
        $juniopgg = Yii::app()->db->createCommand()
        ->select('monto_mes_proyecto')
        ->from('metas')
        ->where('mes = 6 and id_crm_proyecto='."'".$proyectopg->id_crm_proyecto."'".' and id_usuario='."'".$cobradora."' and id_tipo_meta=1")
        ->queryScalar();
        //Julio
        $juliopgg = Yii::app()->db->createCommand()
        ->select('monto_mes_proyecto')
        ->from('metas')
        ->where('mes = 7 and id_crm_proyecto='."'".$proyectopg->id_crm_proyecto."'".' and id_usuario='."'".$cobradora."' and id_tipo_meta=1")
        ->queryScalar();

        //Agosto
        $agostopgg = Yii::app()->db->createCommand()
        ->select('monto_mes_proyecto')
        ->from('metas')
        ->where('mes = 8 and id_crm_proyecto='."'".$proyectopg->id_crm_proyecto."'".' and id_usuario='."'".$cobradora."' and id_tipo_meta=1")
        ->queryScalar();
        //Septiembre
        $septiembrepgg = Yii::app()->db->createCommand()
        ->select('monto_mes_proyecto')
        ->from('metas')
        ->where('mes = 9 and id_crm_proyecto='."'".$proyectopg->id_crm_proyecto."'".' and id_usuario='."'".$cobradora."' and id_tipo_meta=1")
        ->queryScalar();
        //Octubre
        $octubrepgg = Yii::app()->db->createCommand()
        ->select('monto_mes_proyecto')
        ->from('metas')
        ->where('mes = 10 and id_crm_proyecto='."'".$proyectopg->id_crm_proyecto."'".' and id_usuario='."'".$cobradora."' and id_tipo_meta=1")
        ->queryScalar();
        //Noviembre
        $noviembrepgg = Yii::app()->db->createCommand()
        ->select('monto_mes_proyecto')
        ->from('metas')
        ->where('mes = 11 and id_crm_proyecto='."'".$proyectopg->id_crm_proyecto."'".' and id_usuario='."'".$cobradora."' and id_tipo_meta=1")
        ->queryScalar();
        //Diciembre
        $diciembrepgg = Yii::app()->db->createCommand()
        ->select('monto_mes_proyecto')
        ->from('metas')
        ->where('mes = 12 and id_crm_proyecto='."'".$proyectopg->id_crm_proyecto."'".' and id_usuario='."'".$cobradora."' and id_tipo_meta=1")
        ->queryScalar(); 
                
                
                
                
                
              /////**********************************************************************************************************************///////////////  
            }else{
                
             /*   $totalmetaspg =  Yii::app()->db->createCommand()
                ->select('SUM(monto)')
                ->from('metas')
                ->where('id_crm_proyecto='."'".$proyecto."'".' ')
                ->queryScalar();*/
                    
                $totalmetaspg =  Yii::app()->db->createCommand()
                    ->select('SUM(monto)')
                    ->from('metas')
                    ->where('id_crm_proyecto='."'".$proyecto."'".' 
                        OR id_usuario=1 or id_usuario=2 OR mes = '.$mes.'')
                    ->queryScalar();
            }
           }


           
     
        
   
    
    $this->render('createmetascobranza',array(
            'model'=>$model,
            'proyecto'=>$proyecto,
            'totalmetaspg'=>$totalmetaspg,
            'mes'=>$mes,
            'enero'=>$enero,
            'febrero'=>$febrero,
            'marzo'=>$marzo,
            'abril'=>$abril,
            'mayo'=>$mayo,
            'junio'=>$junio,
            'julio'=>$julio,
            'agosto'=>$agosto,
            'septiembre'=>$septiembre,
            'octubre'=>$octubre,
            'noviembre'=>$noviembre,
            'diciembre'=>$diciembre,               
            'eneropg'=>$eneropg,
            'febreropg'=>$febreropg,
            'marzopg'=>$marzopg,
            'abrilpg'=>$abrilpg,
            'mayopg'=>$mayopg,
            'juniopg'=>$juniopg,
            'juliopg'=>$juliopg,
            'agostopg'=>$agostopg,
            'septiembrepg'=>$septiembrepg,
            'octubrepg'=>$octubrepg,
            'noviembrepg'=>$noviembrepg,
            'diciembrepg'=>$diciembrepg, 
        //Paymentes por Proyecto
            'eneproy'=>$eneproy,
            'febproy'=>$febproy,
            'marproy'=>$marproy,
            'abrilproy'=>$abrilproy,
            'mayoproy'=>$mayoproy,
            'junproy'=>$junproy,
            'julproy'=>$julproy,
            'agosproy'=>$agosproy,
            'sepproy'=>$sepproy,    
            'octproy'=>$octproy,
            'novproy'=>$novproy,
            'dicproy'=>$dicproy,
        ////
                  'eneropgg'=>$eneropgg,
            'febreropgg'=>$febreropgg,
            'marzopgg'=>$marzopgg,
            'abrilpgg'=>$abrilpgg,
            'mayopgg'=>$mayopgg,
            'juniopgg'=>$juniopgg,
            'juliopgg'=>$juliopgg,
            'agostopgg'=>$agostopgg,
            'septiembrepgg'=>$septiembrepgg,
            'octubrepgg'=>$octubrepgg,
            'noviembrepgg'=>$noviembrepgg,
            'diciembrepgg'=>$diciembrepgg, 
        
        ///////////////////////////
    'cobradora'=>$cobradora,
                   'eneproycobrador'=>$eneproycobrador,
                            'febproycobrador'=>$febproycobrador,
                            'marproycobrador'=>$marproycobrador,
                            'abrilproycobrador'=>$abrilproycobrador,
                            'mayoproycobrador'=>$mayoproycobrador,
                            'junproycobrador'=>$junproycobrador,
                            'julproycobrador'=>$julproycobrador,
                            'agosproycobrador'=>$agosproycobrador,
                            'sepproycobrador'=>$sepproycobrador,    
                            'octproycobrador'=>$octproycobrador,
                            'novproycobrador'=>$novproycobrador,
                            'dicproycobrador'=>$dicproycobrador,  
                            'eneropggcobrador'=>$eneropggcobrador,
                            'febreropggcobrador'=>$febreropggcobrador,
                            'marzopggcobrador'=>$marzopggcobrador,
                            'abrilpggcobrador'=>$abrilpggcobrador,
                            'mayopggcobrador'=>$mayopggcobrador,
                            'juniopggcobrador'=>$juniopggcobrador,
                            'juliopggcobrador'=>$juliopggcobrador,
                            'agostopggcobrador'=>$agostopggcobrador,
                            'septiembrepggcobrador'=>$septiembrepggcobrador,
                            'octubrepggcobrador'=>$octubrepggcobrador,
                            'noviembrepggcobrador'=>$noviembrepggcobrador,
                            'diciembrepggcobrador'=>$diciembrepggcobrador, 
    ));
    
}

public function actionAnillos($model)
{
    //var_dump($model);die;


}

//*******************************************************
//*******************************************************
//**************************TRAMITES*********************
//*******************************************************
/////////////////////////////////////////////////////////


public function actionCreateTramitesOne()
{
    $model =new Tableros;
    $proyecto="";
    $totalsi="";
    $mes="";
   
  
       $mes_paso= array();
       $mes_paso2= array();
   $totalliquidado=array();
   $totalpaso= array();
   $totalpaso2= array();
$totalventa=array();
    $paso = Yii::app()->db->createCommand()
    ->select('SUM(DISTINCT c.monto_liquidacion) as total_liquidado, m.descripcion as nommes,
       COUNT(DISTINCT t.id_tramite) as totalpaso, t.id_paso, date_part('. "'month'".', t.fecha_paso) as mes')
    ->from('tramite_pasos t, cliente c, proyecto p, meses m')
    ->where(' p.id_crm_proyecto=c.id_proyecto and 
        m.id_meses=date_part('. "'month'".', t.fecha_paso) and
         c.id_proyecto=p.id_crm_proyecto and c.id_cliente_gs=t.id_cliente_gs and t.id_paso=11 and c.id_banco!=16 
    group by t.id_paso, mes, nommes
    order by mes')
    ->queryAll(true);
   $mes_paso = array();
   $totalliquidado = array();
   $totalpaso = array();
    foreach($paso as $t=>$key) {
array_push($mes_paso, $key['nommes']);
array_push($totalliquidado, (int)$key['total_liquidado']);
array_push($totalpaso, $key['totalpaso']);
}

    $paso2 = Yii::app()->db->createCommand()
    ->select('SUM(DISTINCT c.total_venta) as total_venta, m.descripcion as nommes,
       COUNT(DISTINCT t.id_tramite) as totalpaso, t.id_paso, date_part('. "'month'".', t.fecha_paso) as mes, p.id_crm_proyecto as crmproyecto')
    ->from('tramite_pasos t, cliente c, proyecto p, meses m')
    ->where(' p.id_crm_proyecto=c.id_proyecto and 
        m.id_meses=date_part('. "'month'".', t.fecha_paso) and
         c.id_proyecto=p.id_crm_proyecto and c.id_cliente_gs=t.id_cliente_gs and t.id_paso=11 and c.id_banco=16
    group by t.id_paso, mes, crmproyecto, nommes
    order by mes')
    ->queryAll(true);
   $mes_paso2 = array();
   $totalventa = array();
   $totalpaso2 = array();
    foreach($paso2 as $t=>$key) {
array_push($mes_paso2, $key['nommes']);
array_push($totalventa, (int)$key['total_venta']);
array_push($totalpaso2, $key['totalpaso']);
}
//$arr[$index] = (int)$value; 
//var_dump($totalliquidado);
   //die;
    if (isset($_POST['Tableros']) && (
           !empty($_POST['Tableros']['id_crm_proyecto']) or 
           !empty($_POST['Tableros']['id_usuario']) or 
          // !empty($_POST['Tableros']['id_tipo_meta']) or
           !empty($_POST['Tableros']['mes']) 
           ) ){
    
              
            ///////////////////////////////////////////  
            
       //     if($_POST['Tableros']['id_crm_proyecto'] != "" ){ 
                        $proyecto = $_POST['Tableros']['id_crm_proyecto'];
                        $mes = $_POST['Tableros']['mes'];
                        $usuario = $_POST['Tableros']['id_usuario'];
                        $queryumes="";
                        $queryusuario="";
                        $queryproyecto="";
//var_dump($usuario);die;

                        if($proyecto!=""){
                            $queryproyecto = "AND p.id_crm_proyecto='$proyecto' AND c.id_proyecto='$proyecto'"; 
                        }

                        if($usuario!=""){
                            $queryusuario = "AND t.id_usuario=$usuario"; 
                        }
                                                  
                        
  
                        if($mes!=""){                            
                            $queryumes= "AND date_part('month', t.fecha_paso) = $mes";
                        }
    //  var_dump($queryproyecto);die;
                            
      
                        $paso = Yii::app()->db->createCommand()
                        ->select('SUM(DISTINCT c.monto_liquidacion) as total_liquidado, 
                        COUNT(DISTINCT t.id_tramite) as totalpaso, 
                        t.id_paso, date_part('. "'month'".', t.fecha_paso) as mes, 
                        p.id_crm_proyecto as crmproyecto, m.descripcion as nommes')
                        ->from('tramite_pasos t, cliente c, proyecto p, meses m')
                        ->where('m.id_meses = date_part('. "'month'".', t.fecha_paso) AND c.id_proyecto=p.id_crm_proyecto '.$queryproyecto.' '.$queryusuario.' '.$queryumes.' and c.id_banco!=16 and c.id_cliente_gs=t.id_cliente_gs and t.id_paso=11
                        group by t.id_paso, mes, crmproyecto, nommes
                        order by mes')
                        ->queryAll(true);
                        $mes_paso = array();
                        $totalliquidado = array();
                        $totalpaso = array();
                        foreach($paso as $t=>$key) {
                            array_push($mes_paso, $key['nommes']);
                            array_push($totalliquidado,  (int)$key['total_liquidado']);
                            array_push($totalpaso, (int)$key['totalpaso']);
                    }

                        $paso2 = Yii::app()->db->createCommand()
                        ->select('SUM(DISTINCT c.total_venta) as total_venta, 
                        COUNT(DISTINCT t.id_tramite) as totalpaso, t.id_paso, date_part('. "'month'".', t.fecha_paso) as mes, 
                        p.id_crm_proyecto as crmproyecto,  m.descripcion as nommes')
                        ->from('tramite_pasos t, cliente c, proyecto p, meses m')
                        ->where('m.id_meses = date_part('. "'month'".', t.fecha_paso) AND c.id_proyecto=p.id_crm_proyecto '.$queryproyecto.' '.$queryusuario.' '.$queryumes.' and c.id_banco=16 and c.id_cliente_gs=t.id_cliente_gs and t.id_paso=11
                        group by t.id_paso, mes, crmproyecto, nommes
                        order by mes')
                        ->queryAll(true);
                        $mes_paso2 = array();
                        $totalventa = array();
                        $totalpaso2 = array();

                        foreach($paso2 as $t=>$key) {
                            array_push($mes_paso2, $key['nommes']);
                            array_push($totalventa,  (int)$key['total_venta']);
                            array_push($totalpaso2, (int)$key['totalpaso']);
                        }
           }      
      
        
   
    
    $this->render('createtramitesone',array(
        'model'=>$model,
        'mes'=>$mes,
        'totalsi'=>$totalsi,
        'mes_paso'=>$mes_paso,
        'mes_paso2'=>$mes_paso2,
        'totalliquidado'=>$totalliquidado,
        'totalpaso'=>$totalpaso,
        'totalventa'=>$totalventa,
        'totalpaso2'=>$totalpaso2,
    ));
    
}



public function actionCreateTramitesTwo()
{
   
    $model =new Tableros;
    $proyecto="";
    $totalsi="";
    $mes="";
    $titulo = array();  
    $nompaso = array();
    $totalpasos = array();       
    $dataCategories = array();
    $dataSeries = array();
    //Variable para el grafico dos
    $dataSeries2 = array();
    $dataCategories2 = array();  

    //Query donde obtengo los datos necesarios mediante un query
    $paso = Yii::app()->db->createCommand()
    ->select('t.id_pasos, 
            pa.descripcion, pa.abrev,
            p.comentario, c.id_proyecto, 
            SUM(c.monto_liquidacion) as total,
            COUNT(c.id_proyecto) as crmproyecto, 
            COUNT(t.id_pasos) as totalpaso')
    ->from('tramite t')
    ->join('paso pa', 'pa.id_paso = t.id_pasos and t.id_pasos!=11 and t.id_pasos!=0')
    ->join('cliente c', 'c.id_cliente_gs = t.id_cliente_gs')            
    ->join('proyecto p', 'p.id_crm_proyecto = c.id_proyecto GROUP BY 
            t.id_pasos,  p.comentario,  c.id_proyecto, pa.descripcion, pa.abrev
            order by t.id_pasos')      
    ->queryAll(true);
   
    
    /** Obtengo mis pasos*/

    //$pasosAvailable = Paso::model()->FindAll(array('order'=>'id_paso'));

    $pasosAvailable  = Paso::model()->findAll('id_paso > 0 AND id_paso < 11 order by id_paso');

     //Obtengo el Maximo y el Minimo
    $maxPaso = Yii::app()->db->createCommand()->select('max(id_paso) as maxIdPasos')->from('paso')->queryScalar();
    $minPaso = Yii::app()->db->createCommand()->select('min(id_paso) as maxIdPasos')->from('paso')->queryScalar();



   /* Extrayendo los nombres de las series*/
   foreach ($pasosAvailable as $thisPaso){
        array_push($dataSeries, $thisPaso["abrev"]);   //Para la serie cantdad de Pasos
        array_push($dataSeries2, $thisPaso["abrev"]);  //Para la serie monto de Pasos
    }


   // $dataCategories = array_flip(array_unique($dataCategories));
    $dataSeries = array_unique($dataSeries);

    foreach ($paso as $thisPaso){
        
        if (!isset($dataCategories[$thisPaso["comentario"]])) {
            $dataCategories[$thisPaso["comentario"]] = array_fill($minPaso, 10, null);
            $dataCategories2[$thisPaso["comentario"]] = array_fill($minPaso, 10, null);
        }
        
        $dataCategories[$thisPaso["comentario"]][$thisPaso["id_pasos"]] = $thisPaso["totalpaso"];
        $dataCategories2[$thisPaso["comentario"]][$thisPaso["id_pasos"]] = intval(substr($thisPaso["total"],0,8),16);

    }
 

    $categoriesData = $dataCategories;
    $dataCategories = array();
    
    foreach ($categoriesData as $name => $data){
        
        $dataCategories[] = array("name" => $name, "data" => $data);
        
    }

  
 //array_pop($dataCategories); 


    $categoriesData2 = $dataCategories2;
    $dataCategories2 = array();
    
    foreach ($categoriesData2 as $name => $data){
        
        $dataCategories2[] = array("name" => $name, "data" => $data);
        
    }


  //  print "<pre>";
//    
////    var_export ($paso);
 //   var_export ($dataCategories2);
   // var_export ($dataSeries2);
//    var_export ($maxPaso);
//    var_export ($minPaso);
////    var_export ($pasosAvailable);
//    
//    
   //print "</pre>";
   // die();
    

//var_dump($titulo);die;
    
    if (isset($_POST['Tableros']) && (
           !empty($_POST['Tableros']['id_crm_proyecto']) or 
           !empty($_POST['Tableros']['id_usuario']) or 
          // !empty($_POST['Tableros']['id_tipo_meta']) or
           !empty($_POST['Tableros']['mes']) 
           ) ){
     
              
            ///////////////////////////////////////////  
            
           // if($_POST['Tableros']['id_crm_proyecto'] != "" ){ 
                    $proyecto = $_POST['Tableros']['id_crm_proyecto'];
                    $usuario = $_POST['Tableros']['id_usuario'];
                    $queryusuario="";
                    $queryproyecto="";
                    if($usuario!=""){
                        $queryusuario = "AND t.id_usuario=$usuario"; 

                    }
                    if($proyecto!=""){
                        $queryproyecto = "AND c.id_proyecto='$proyecto'"; 
                    }
                   
                            //Query donde obtengo los datos
                            $paso = Yii::app()->db->createCommand()
                            ->select('t.id_pasos, 
                                    pa.descripcion, pa.abrev,  p.comentario,
                                    p.titulo, c.id_proyecto, 
                                    COUNT(c.id_proyecto) as crmproyecto, 
                                     SUM(c.monto_liquidacion) as total,
                                    COUNT(t.id_pasos) as totalpaso')
                            ->from('tramite t')
                            ->join('paso pa', 'pa.id_paso = t.id_pasos ')
                            ->join('cliente c', 'c.id_cliente_gs = t.id_cliente_gs')            
                            ->join('proyecto p', 't.id_pasos!=11 and t.id_pasos!=0 and p.id_crm_proyecto = c.id_proyecto '.$queryproyecto.' '.$queryusuario.' GROUP BY 
                                    t.id_pasos,  p.titulo,  c.id_proyecto, p.comentario,pa.descripcion, pa.abrev
                                    order by t.id_pasos')      
                            ->queryAll(true);
                      
                            /** Get pasos */

                            $pasosAvailable = Paso::model()->FindAll(array('order'=>'id_paso'));
                            $maxPaso = Yii::app()->db->createCommand()->select('max(id_paso) as maxIdPasos')->from('paso')->queryScalar();
                            $minPaso = Yii::app()->db->createCommand()->select('min(id_paso) as maxIdPasos')->from('paso')->queryScalar();

                           /* Extrayendo los nombres de las series*/
 /* Extrayendo los nombres de las series*/
   foreach ($pasosAvailable as $thisPaso){
        array_push($dataSeries, $thisPaso["abrev"]);   //Para la serie cantdad de Pasos
        array_push($dataSeries2, $thisPaso["abrev"]);  //Para la serie monto de Pasos
    }


   // $dataCategories = array_flip(array_unique($dataCategories));
    $dataSeries = array_unique($dataSeries);

    foreach ($paso as $thisPaso){
        
        if (!isset($dataCategories[$thisPaso["comentario"]])) {
            $dataCategories[$thisPaso["comentario"]] = array_fill($minPaso, 10, null);
            $dataCategories2[$thisPaso["comentario"]] = array_fill($minPaso, 10, null);
        }
        
        $dataCategories[$thisPaso["comentario"]][$thisPaso["id_pasos"]] = $thisPaso["totalpaso"];
        $dataCategories2[$thisPaso["comentario"]][$thisPaso["id_pasos"]] = intval(substr($thisPaso["total"],0,8),16);

    }
 

    $categoriesData = $dataCategories;
    $dataCategories = array();
    
    foreach ($categoriesData as $name => $data){
        
        $dataCategories[] = array("name" => $name, "data" => $data);
        
    }

  
 //array_pop($dataCategories); 


    $categoriesData2 = $dataCategories2;
    $dataCategories2 = array();
    
    foreach ($categoriesData2 as $name => $data){
        
        $dataCategories2[] = array("name" => $name, "data" => $data);
        
    }



                    
           // }
        }      

    //Envio  Variables a la Vista
    $this->render('createtramitestwo',array(
        'model'=>$model,
        'totalpasos'=>$totalpasos,
        'titulo'=>$titulo, 
        'dataSeries' => $dataSeries,
        'dataSeries2' => $dataSeries2,
        'dataCategories' => $dataCategories,
        'dataCategories2' => $dataCategories2,
    ));
    
}



public function actionCreateTramiteBancos()
{
    $model =new Tableros;
    $proyecto="";
    $totalsi="";
    $mes="";
    $titulo = array();  
    $nompaso = array();
    $totalpasos = array();       
    $dataCategories = array();
    $dataSeries = array();
  
    //Query donde obtengo los datos
    $paso = Yii::app()->db->createCommand()
    ->select('t.id_pasos, 
            pa.descripcion, pa.abrev,
            b.descripcion, c.id_banco, 
            COUNT(c.id_banco) as bancotramite,
            COUNT(t.id_pasos) as totalpaso')
    ->from('tramite t')
    ->join('paso pa', 'pa.id_paso = t.id_pasos')
    ->join('cliente c', 'c.id_cliente_gs = t.id_cliente_gs')            
    ->join('banco b', 'b.id_banco = c.id_banco  GROUP BY 
            t.id_pasos,  b.descripcion,  c.id_banco, pa.descripcion, pa.abrev
            order by t.id_pasos')      
    ->queryAll(true);

    
    /** Get pasos */

    $pasosAvailable = Paso::model()->FindAll(array('order'=>'id_paso'));
    
    $maxPaso = Yii::app()->db->createCommand()->select('max(id_paso) as maxIdPasos')->from('paso')->queryScalar();
    $minPaso = Yii::app()->db->createCommand()->select('min(id_paso) as maxIdPasos')->from('paso')->queryScalar();
       
   /* Extrayendo los nombres de las series*/
   
   foreach ($pasosAvailable as $thisPaso){
        
        array_push($dataSeries, $thisPaso["abrev"]);
        
    }
    
    foreach ($paso as $thisPaso){
        
//        if (!array_key_exists($thisPaso["id_pasos"], $dataSeries)){
//            $dataSeries = array_merge($dataSeries, array($thisPaso["id_pasos"] => $thisPaso["descripcion"]));
////            array_push($dataSeries, $thisPaso["descripcion"]);
//        }
        
       
    }
    
//    $dataCategories = array_flip(array_unique($dataCategories));
    $dataSeries = array_unique($dataSeries);
    
    foreach ($paso as $thisPaso){
        
        if (!isset($dataCategories[$thisPaso["descripcion"]])) {
//            $dataCategories[$thisPaso["titulo"]]= array();
            $dataCategories[$thisPaso["descripcion"]] = array_fill($minPaso, $maxPaso+1, null);
        }
        
        $dataCategories[$thisPaso["descripcion"]][$thisPaso["id_pasos"]] = $thisPaso["id_pasos"];
    }
    $categoriesData = $dataCategories;
    $dataCategories = array();
    
    foreach ($categoriesData as $name => $data){
        
        $dataCategories[] = array("name" => $name, "data" => $data);
        
    } 
//    print "<pre>";
//    
////    var_export ($paso);
//    var_export ($dataCategories);
//    var_export ($dataSeries);
//    var_export ($maxPaso);
//    var_export ($minPaso);
////    var_export ($pasosAvailable);
//    
//    
//    print "</pre>";
//    die();
    

//var_dump($titulo);die;
    
    if (isset($_POST['Tableros']) && (
           !empty($_POST['Tableros']['id_banco']) or 
           !empty($_POST['Tableros']['id_usuario']) or 
          // !empty($_POST['Tableros']['id_tipo_meta']) or
           !empty($_POST['Tableros']['mes']) 
           ) ){
    
              
            ///////////////////////////////////////////  
            
            if($_POST['Tableros']['id_banco'] != "" ){ 
                    $banco = $_POST['Tableros']['id_banco'];
                    //var_dump($banco);die;
                    $usuario = $_POST['Tableros']['id_usuario'];
                    $queryusuario="";
                    $querybanco="";
                    if($usuario!=""){
                        $queryusuario = "AND t.id_usuario=$usuario"; 
                    }
                    if($banco!=""){
                        $querybanco = "AND c.id_banco=$banco"; 
                    }
                            //Query donde obtengo los datos c.id_banco='."'".$banco."'".'
          

                            $paso = Yii::app()->db->createCommand()
                            ->select('t.id_pasos, 
                                    pa.descripcion, pa.abrev,
                                    b.descripcion, c.id_banco,
                                    COUNT(c.id_proyecto) as crmproyecto, 
                                    COUNT(t.id_pasos) as totalpaso')
                            ->from('tramite t')
                            ->join('paso pa', 'pa.id_paso = t.id_pasos')
                            ->join('cliente c', 'c.id_cliente_gs = t.id_cliente_gs')            
                            ->join('banco b', 'b.id_banco = c.id_banco '.$queryusuario.' '.$querybanco.' GROUP BY 
                                    t.id_pasos,  b.descripcion,  c.id_banco, pa.descripcion, pa.abrev
                                    order by t.id_pasos')      
                            ->queryAll(true);
                      
                            /** Get pasos */

                            $pasosAvailable = Paso::model()->FindAll(array('order'=>'id_paso'));
                            $maxPaso = Yii::app()->db->createCommand()->select('max(id_paso) as maxIdPasos')->from('paso')->queryScalar();
                            $minPaso = Yii::app()->db->createCommand()->select('min(id_paso) as maxIdPasos')->from('paso')->queryScalar();

                           /* Extrayendo los nombres de las series*/

                           foreach ($pasosAvailable as $thisPaso){
                                array_push($dataSeries, $thisPaso["abrev"]);
                            }
    
                            $dataSeries = array_unique($dataSeries);

                            foreach ($paso as $thisPaso){

                                if (!isset($dataCategories[$thisPaso["descripcion"]])) {                      
                                    $dataCategories[$thisPaso["descripcion"]] = array_fill($minPaso, $maxPaso+1, null);
                                }
                                $dataCategories[$thisPaso["descripcion"]][$thisPaso["id_pasos"]] = $thisPaso["totalpaso"];
                            }
                            
                            $categoriesData = $dataCategories;
                            $dataCategories = array();

                            foreach ($categoriesData as $name => $data){
                                $dataCategories[] = array("name" => $name, "data" => $data);

                            } 

                    
            }
        }      

    //Envio  Variables a la Vista
    $this->render('createtramitebancos',array(
        'model'=>$model,
        'totalpasos'=>$totalpasos,
        'titulo'=>$titulo, 
        'dataSeries' => $dataSeries,
        'dataCategories' => $dataCategories,
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

    if(isset($_POST['Tableros']))
    {
    $model->attributes=$_POST['Tableros'];
    if($model->save())
         $this->redirect(array('view','id'=>$model->id_tablero));
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
public function actionDelete($id)
    {
        if(Yii::app()->request->isPostRequest)
    {
        // we only allow deletion via POST request
        $this->loadModel($id)->delete();

        // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
        if(!isset($_GET['ajax']))
        $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
    }
    else
    throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
}

/**
* Lists all models.
*/
public function actionIndex()
{
    $dataProvider=new CActiveDataProvider('Tableros');
        $this->render('index',array(
        'dataProvider'=>$dataProvider,
    ));
}

/**
* Manages all models.
*/
public function actionAdmin()
{
    $model=new Tableros('search');
    $model->unsetAttributes();  // clear any default values
    if(isset($_GET['Tableros']))
             $model->attributes=$_GET['Tableros'];

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
    $model=Tableros::model()->findByPk($id);
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
if(isset($_POST['ajax']) && $_POST['ajax']==='tableros-form')
{
echo CActiveForm::validate($model);
Yii::app()->end();
}
}
}


