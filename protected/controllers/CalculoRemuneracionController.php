<?php

class CalculoRemuneracionController extends Controller
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
        'actions'=>array('index','view','calculoremunecacioncobradora','proyectoscobradoras','cobradoraproyectosall'),
        'users'=>array('*'),
    ),
    array('allow', // allow authenticated user to perform 'create' and 'update' actions
        'actions'=>array('create','update','calculoremunecacioncobradora','proyectoscobradoras','cobradoraproyectosall'),
        'users'=>array('@'),
    ),
    array('allow', // allow admin user to perform 'admin' and 'delete' actions
        'actions'=>array('admin','delete','calculoremunecacioncobradora','proyectoscobradoras','cobradoraproyectosall'),
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
       $tablar = PagoRemuneracion::model()->findAll();
    $this->render('view',array(
        'tablar'=>$tablar,
        'model'=>$this->loadModel($id),
    ));
}

/**
* Creates a new model.
* If creation is successful, the browser will be redirected to the 'view' page.
*/
public function actionProyectosCobradoras($id)
{
    $metas = new Metas();
   /* $usuarios = Usuarios::model()->find('id_usuario=:id_usuario',
                           array(':id_usuario'=>$id));
 
    $metas = Metas::model()->findAll('id_usuario=:id_usuario',
                           array(':id_usuario'=>$id));*/
     //var_dump($metas);die;
    $this->render('proyectoscobradoras',array(
                    'metas'=>$metas,
                    
    ));
    
}
public function actionCreate($id)
{
  
    $model = new calculoRemuneracion;

    //Uncomment the following line if AJAX validation is needed
    $this->performAjaxValidation($model);

    //Metas
    $metas =  Metas::model()->find('id_meta=:id_meta',
                           array(':id_meta'=>$id));
    //Meta Corriente
    $meta_corriente = Metas::model()->find('id_crm_proyecto=:id_crm_proyecto AND id_tipo_meta=:id_tipo_meta AND mes=:mes',
                           array(':id_crm_proyecto'=>$metas->id_crm_proyecto,
                                 ':mes'=>$metas->mes,
                                 ':id_tipo_meta'=>2,
                                ));
    //Pivote del mes anterior
    $pivote_inicio_mes = Pivote::model()->find('id_crm_proyecto=:id_crm_proyecto and mes=7',
                               array(':id_crm_proyecto'=>$metas->id_crm_proyecto));
    //Pivote del mes actual
    $pivote_final_mes = Pivote::model()->find('id_crm_proyecto=:id_crm_proyecto and mes=8',
                               array(':id_crm_proyecto'=>$metas->id_crm_proyecto));

   
    
    ///TOTAL COBRADO DE LOS MESES/////////////
            //Para saber el total cobrado de los meses                    
        if($metas->mes == 1){
            $cobrado = Yii::app()->dbconix->createCommand()
                         ->select('sum(p.monto)')
                                 ->from('payments p, quotes_details qd')
                                 ->where(' p.Abono_Reff=qd.Bill and fecha BETWEEN '. "'2015-01-01'".' and '. "'2015-01-31'".' and project = '."'".$proyecto->id_crm_proyecto."'")
                                 ->queryScalar();
        }
        
        if($metas->mes == 2){
            $cobrado = Yii::app()->dbconix->createCommand()
                         ->select('sum(p.monto)')
                                 ->from('payments p, quotes_details qd')
                                 ->where(' p.Abono_Reff=qd.Bill and fecha BETWEEN '. "'2015-02-01'".' and '. "'2015-02-31'".' and project = '."'".$proyecto->id_crm_proyecto."'")
                                 ->queryScalar();
        }
        
        if($metas->mes == 3){
            $cobrado = Yii::app()->dbconix->createCommand()
                         ->select('sum(p.monto)')
                                 ->from('payments p, quotes_details qd')
                                 ->where(' p.Abono_Reff=qd.Bill and fecha BETWEEN '. "'2015-03-01'".' and '. "'2015-03-31'".' and project = '."'".$proyecto->id_crm_proyecto."'")
                                 ->queryScalar();
        }
        
        if($metas->mes == 4){
            $cobrado = Yii::app()->dbconix->createCommand()
                         ->select('sum(p.monto)')
                                 ->from('payments p, quotes_details qd')
                                 ->where(' p.Abono_Reff=qd.Bill and fecha BETWEEN '. "'2015-04-01'".' and '. "'2015-04-31'".' and project = '."'".$proyecto->id_crm_proyecto."'")
                                 ->queryScalar();
        }
        
        if($metas->mes == 5){
            $cobrado = Yii::app()->dbconix->createCommand()
                         ->select('sum(p.monto)')
                                 ->from('payments p, quotes_details qd')
                                 ->where(' p.Abono_Reff=qd.Bill and fecha BETWEEN '. "'2015-05-01'".' and '. "'2015-05-31'".' and project = '."'".$proyecto->id_crm_proyecto."'")
                                 ->queryScalar();
        }
        
        if($metas->mes == 6){
            $cobrado = Yii::app()->dbconix->createCommand()
                         ->select('sum(p.monto)')
                                 ->from('payments p, quotes_details qd')
                                 ->where(' p.Abono_Reff=qd.Bill and fecha BETWEEN '. "'2015-06-01'".' and '. "'2015-06-31'".' and project = '."'".$proyecto->id_crm_proyecto."'")
                                 ->queryScalar();
        }
        
        if($metas->mes == 7){
            $cobrado = Yii::app()->dbconix->createCommand()
                         ->select('sum(p.monto)')
                                 ->from('payments p, quotes_details qd')
                                 ->where(' p.Abono_Reff=qd.Bill and fecha BETWEEN '. "'2015-07-01'".' and '. "'2015-07-31'".' and project = '."'".$proyecto->id_crm_proyecto."'")
                                 ->queryScalar();
        }        
        
        if($metas->mes == 8){
            $cobrado = Yii::app()->dbconix->createCommand()
                         ->select('sum(p.monto)')
                                 ->from('payments p, quotes_details qd')
                                 ->where(' p.Abono_Reff=qd.Bill and fecha BETWEEN '. "'2015-08-01'".' and '. "'2015-08-31'".' and project = '."'".$proyecto->id_crm_proyecto."'")
                                 ->queryScalar();
        } 
        
        if($metas->mes == 9){
            $cobrado = Yii::app()->dbconix->createCommand()
                         ->select('sum(p.monto)')
                                 ->from('payments p, quotes_details qd')
                                 ->where(' p.Abono_Reff=qd.Bill and fecha BETWEEN '. "'2015-09-01'".' and '. "'2015-09-31'".' and project = '."'".$proyecto->id_crm_proyecto."'")
                                 ->queryScalar();
        } 

        if($metas->mes == 10){
            $cobrado = Yii::app()->dbconix->createCommand()
                         ->select('sum(p.monto)')
                                 ->from('payments p, quotes_details qd')
                                 ->where(' p.Abono_Reff=qd.Bill and fecha BETWEEN '. "'2015-10-01'".' and '. "'2015-10-31'".' and project = '."'".$proyecto->id_crm_proyecto."'")
                                 ->queryScalar();
        }
        
        if($metas->mes == 11){
            $cobrado = Yii::app()->dbconix->createCommand()
                         ->select('sum(p.monto)')
                                 ->from('payments p, quotes_details qd')
                                 ->where(' p.Abono_Reff=qd.Bill and fecha BETWEEN '. "'2015-11-01'".' and '. "'2015-11-31'".' and project = '."'".$proyecto->id_crm_proyecto."'")
                                 ->queryScalar();
        }

        if($metas->mes == 12){
            $cobrado = Yii::app()->dbconix->createCommand()
                         ->select('sum(p.monto)')
                                 ->from('payments p, quotes_details qd')
                                 ->where(' p.Abono_Reff=qd.Bill and fecha BETWEEN '. "'2015-12-01'".' and '. "'2015-12-31'".' and project = '."'".$proyecto->id_crm_proyecto."'")
                                 ->queryScalar();
        }        
 if(isset($_POST['calculoRemuneracion']))
    {
             $model->attributes=$_POST['calculoRemuneracion'];
    if($model->save())
             $this->redirect(array('view','id'=>$model->id_crm_proyecto));
    }
    $this->render('create',array(
                    'model'=>$model,
                    'metas'=>$metas,
                    'cobrado'=>$cobrado,
                    'tablar'=>$tablar,
                    'pivote_inicio_mes'=> $pivote_inicio_mes,
                    'pivote_final_mes'=>$pivote_final_mes,
                    'meta_corriente'=>$meta_corriente,
    ));
}

///******************************************************************************////////////////////


public function actionCobradoraProyectosAll($id,$mes)
{

    $model = new calculoRemuneracion;
    
    ///$tablar = new PagoRemuneracion('search');
    
    $pago_remu = new PagoRemuneracion;
    $tablar = PagoRemuneracion::model()->findAll();
    //Uncomment the following line if AJAX validation is needed
    $this->performAjaxValidation($model);

    
    $usuario = Usuarios::model()->find('id_usuario=:id_usuario',
                           array(':id_usuario'=>$id));

    //Cartera Corriente
    $cartera_corriente = Metas::model()->findAll('id_usuario=:id_usuario AND id_tipo_meta=:id_tipo_meta AND mes=:mes',
                               array(':id_usuario'=>$id,
                                     ':mes'=>$mes,
                                     ':id_tipo_meta'=>2,
                                    ));
    //Cartera Vencida
    $cartera_vencidad = Metas::model()->findAll('id_usuario=:id_usuario AND id_tipo_meta=:id_tipo_meta AND mes=:mes',
                           array(':id_usuario'=>$id,
                                 ':mes'=>$mes,
                                 ':id_tipo_meta'=>1,
                                ));
    //Count Pivote vencido
    $count_proyecto_vencida = Metas::model()->countByAttributes(array(
            'mes'=> $mes,
             'id_tipo_meta'=>2,
    ));
    
    //Count Pivote Corriente
    $count_proyecto_corriente = Metas::model()->countByAttributes(array(
            'mes'=> $mes,
             'id_tipo_meta'=>1,
    ));
    
    //Pivote del mes anterior
    $pivote_inicio_mes = Pivote::model()->find('mes=:mes',
                               array(':mes'=>$mes,                                   
                                    ));
                                 //  var_dump($pivote_inicio_mes);die;              
    //Pivote del mes actual
    $mes_old=$mes-1;
    $pivote_final_mes = Pivote::model()->find('mes=:mes',
                               array(':mes'=>$mes_old,
                                    ));

                                   // var_dump($mes_old);die;

            //Para saber el total cobrado de los meses                    
            if($mes == 1){
            $cobrado = Yii::app()->dbconix->createCommand()
                         ->select('sum(p.monto)')
                                 ->from('payments p, quotes_details qd')
                                 ->where(' p.Abono_Reff=qd.Bill and fecha BETWEEN '. "'2015-01-01'".' and '. "'2015-01-31'")
                                 ->queryScalar();
            }
        
            if($mes == 2){
            $cobrado = Yii::app()->dbconix->createCommand()
                         ->select('sum(p.monto)')
                                 ->from('payments p, quotes_details qd')
                                 ->where(' p.Abono_Reff=qd.Bill and fecha BETWEEN '. "'2015-02-01'".' and '. "'2015-02-31'")
                                 ->queryScalar();
            }
        
            if($mes == 3){
            $cobrado = Yii::app()->dbconix->createCommand()
                         ->select('sum(p.monto)')
                                 ->from('payments p, quotes_details qd')
                                 ->where(' p.Abono_Reff=qd.Bill and fecha BETWEEN '. "'2015-03-01'".' and '. "'2015-03-31'")
                                 ->queryScalar();
            }
        
            if($mes == 4){
            $cobrado = Yii::app()->dbconix->createCommand()
                         ->select('sum(p.monto)')
                                 ->from('payments p, quotes_details qd')
                                 ->where(' p.Abono_Reff=qd.Bill and fecha BETWEEN '. "'2015-04-01'".' and '. "'2015-04-31'")
                                 ->queryScalar();
            }
        
            if($mes == 5){
            $cobrado = Yii::app()->dbconix->createCommand()
                         ->select('sum(p.monto)')
                                 ->from('payments p, quotes_details qd')
                                 ->where(' p.Abono_Reff=qd.Bill and fecha BETWEEN '. "'2015-05-01'".' and '. "'2015-05-31'")
                                 ->queryScalar();
            }
        
            if($mes == 6){
            $cobrado = Yii::app()->dbconix->createCommand()
                         ->select('sum(p.monto)')
                                 ->from('payments p, quotes_details qd')
                                 ->where(' p.Abono_Reff=qd.Bill and fecha BETWEEN '. "'2015-06-01'".' and '. "'2015-06-31'")
                                 ->queryScalar();
            }
            
            if($mes == 7){
            $cobrado = Yii::app()->dbconix->createCommand()
                         ->select('sum(p.monto)')
                                 ->from('payments p, quotes_details qd')
                                 ->where(' p.Abono_Reff=qd.Bill and fecha BETWEEN '. "'2015-07-01'".' and '. "'2015-07-31'")
                                 ->queryScalar();
            } 
        
            if($mes == 8){
            $cobrado = Yii::app()->dbconix->createCommand()
                         ->select('sum(p.monto)')
                                 ->from('payments p, quotes_details qd')
                                 ->where(' p.Abono_Reff=qd.Bill and fecha BETWEEN '. "'2015-08-01'".' and '. "'2015-08-31'")
                                 ->queryScalar();
            }
        
            if($mes == 9){
            $cobrado = Yii::app()->dbconix->createCommand()
                         ->select('sum(p.monto)')
                                 ->from('payments p, quotes_details qd')
                                 ->where(' p.Abono_Reff=qd.Bill and fecha BETWEEN '. "'2015-09-01'".' and '. "'2015-09-31'")
                                 ->queryScalar();
            }

            if($mes == 10){
            $cobrado = Yii::app()->dbconix->createCommand()
                         ->select('sum(p.monto)')
                                 ->from('payments p, quotes_details qd')
                                 ->where(' p.Abono_Reff=qd.Bill and fecha BETWEEN '. "'2015-10-01'".' and '. "'2015-10-31'")
                                 ->queryScalar();
            }
        
            if($mes == 11){
            $cobrado = Yii::app()->dbconix->createCommand()
                         ->select('sum(p.monto)')
                                 ->from('payments p, quotes_details qd')
                                 ->where(' p.Abono_Reff=qd.Bill and fecha BETWEEN '. "'2015-11-01'".' and '. "'2015-11-31'")
                                 ->queryScalar();
            }

            if($mes == 12){
            $cobrado = Yii::app()->dbconix->createCommand()
                         ->select('sum(p.monto)')
                                 ->from('payments p, quotes_details qd')
                                 ->where(' p.Abono_Reff=qd.Bill and fecha BETWEEN '. "'2015-12-01'".' and '. "'2015-12-31'")
                                 ->queryScalar();
            }  

        
        if(isset($_POST['calculoRemuneracion']))
        {
        $model->attributes=$_POST['calculoRemuneracion'];
        if($model->validate()){
				if($model->save())
               $metasupdate = Metas::model()->updateAll(array( 'remuneracion' => 1), 
                       'id_usuario ='.$id .'and mes ='.$mes); 
             $this->redirect(array('view','id'=>$model->id_calculo_remuneracion));
        }
        }                   
				
        

    $this->render('cobradoraproyectosall',array(
                    'model'=>$model,
                    'count_proyecto_vencida'=>$count_proyecto_vencida,
                    'count_proyecto_corriente'=>$count_proyecto_corriente,
                    'cobrado'=>$cobrado,
                    'tablar'=>$tablar,
                    'pivote_inicio_mes'=> $pivote_inicio_mes,
                    'pivote_final_mes'=>$pivote_final_mes,
                    'cartera_corriente'=>$cartera_corriente,
                    'cartera_vencidad'=>$cartera_vencidad,
                    'id'=>$id,
        'pago_remu'=>$pago_remu,
    ));
}



///////////*************************************************************************////////////////
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

if(isset($_POST['calculoRemuneracion']))
{
$model->attributes=$_POST['calculoRemuneracion'];
if($model->save())
$this->redirect(array('view','id'=>$model->id_calculo_remuneracion));
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
$dataProvider=new CActiveDataProvider('calculoRemuneracion');
$this->render('index',array(
'dataProvider'=>$dataProvider,
));
}

/**
* Manages all models.
*/
public function actionCalculoRemunecacionCobradora()
{
  /*  $cobradora = new Usuarios('search');
    $cobradora->unsetAttributes();  // clear any default values
    if(isset($_GET['Usuarios']))
          $cobradora->attributes=$_GET['Usuarios'];

    $this->render('calculoremunecacioncobradora',array(
          'cobradora'=>$cobradora,
    ));*/
     //$cobradora = new Metas('remuneracionprojectremuneracionproject');
    $cobradora = new Metas('remuneracionproject');
    $cobradora->unsetAttributes();  // clear any default values
    if(isset($_GET['Usuarios']))
          $cobradora->attributes=$_GET['Usuarios'];

    $this->render('calculoremunecacioncobradora',array(
          'cobradora'=>$cobradora,
    ));
}

/**
* Manages all models.
*/
public function actionAdmin()
{
    $model=new calculoRemuneracion('search');
    $model->unsetAttributes();  // clear any default values
    if(isset($_GET['calculoRemuneracion']))
          $model->attributes=$_GET['calculoRemuneracion'];

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
$model=calculoRemuneracion::model()->findByPk($id);
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
if(isset($_POST['ajax']) && $_POST['ajax']==='calculo-remuneracion-form')
{
echo CActiveForm::validate($model);
Yii::app()->end();
}
}
}
