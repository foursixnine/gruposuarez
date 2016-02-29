<?php

class MetasController extends Controller
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
                'actions'=>array('index','view','actualizar','updatemetames','indexmetas'),
                'users'=>array('*'),
            ),
            array('allow', // allow authenticated user to perform 'create' and 'update' actions
                'actions'=>array('create','update','actualizar','updatemetames','indexmetas'),
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

public function actionUpdateMetaMes($id)
{
        //Buscamos las ultimas Gestiones Realizadas
        $model= new Metas();
        $meta_update = $model->find('id_meta=:id_meta',
                              array(':id_meta'=>$id)); 
       $cantidad=null;
          
        
      
                $cantidad =  Yii::app()->db->createCommand()
                          ->select('SUM(total_vencido)')
                          ->from('cliente')
                          ->where('id_proyecto = '."'".$meta_update->id_crm_proyecto."'" )
                          ->queryScalar();
      
        ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
  //      $meta_update->metas_monto=$cantidad; 


        $total = ($cantidad * $meta_update->porcentaje_meta / 100);
 //var_dump($total);die;
// $clienteupdate = Cliente::model()->updateAll(array( 'gestion' => 1), 'id_cliente_gs ='.$cliente->id_cliente_gs);
$model = Metas::model()->updateAll(array(
                                    'monto_mes_proyecto'=>"$total"),
        "id_meta=$id " );
        $this->redirect(array('view','id'=>$id));
}
/**
* Creates a new model.
* If creation is successful, the browser will be redirected to the 'view' page.
*/
public function actionCreate()
{
$model=new Metas;
$mes_actual= date("n");
$model->mes=array($mes_actual);
// Uncomment the following line if AJAX validation is needed
 $this->performAjaxValidation($model);
$proyect01 =  Yii::app()->db->createCommand()
          ->select('SUM(total_vencido)')
                          ->from('cliente')
                          ->where('ID_PROYECTO='."'PROJ0001'")
                          ->queryScalar();

$proyect02 =  Yii::app()->db->createCommand()
->select('SUM(total_vencido)')
                ->from('cliente')
                ->where('id_proyecto='."'PROJ0002'")
                ->queryScalar();

$proyect03 =  Yii::app()->db->createCommand()
->select('SUM(total_vencido)')
                ->from('cliente')
                ->where('id_proyecto='."'PROJ0003'")
                ->queryScalar();

$proyect04 =  Yii::app()->db->createCommand()
->select('SUM(total_vencido)')
                ->from('cliente')
                ->where('id_proyecto='."'PROJ0004'")
                ->queryScalar();

$proyect05 =  Yii::app()->db->createCommand()
->select('SUM(total_vencido)')
                ->from('cliente')
                ->where('id_proyecto='."'PROJ0005'")
                ->queryScalar();

$proyect06 =  Yii::app()->db->createCommand()
->select('SUM(total_vencido)')
                ->from('cliente')
                ->where('id_proyecto='."'PROJ0006'")
                ->queryScalar();

$proyect07 =  Yii::app()->db->createCommand()
->select('SUM(total_vencido)')
                ->from('cliente')
                ->where('id_proyecto='."'PROJ0007'")
                ->queryScalar();

$proyect09 =  Yii::app()->db->createCommand()
->select('SUM(total_vencido)')
                ->from('cliente')
                ->where('id_proyecto='."'PROJ0009'")
                ->queryScalar();

$proyect11 =  Yii::app()->db->createCommand()
->select('SUM(total_vencido)')
                ->from('cliente')
                ->where('id_proyecto='."'PROJ0011'")
                ->queryScalar();

$proyect12 =  Yii::app()->db->createCommand()
->select('SUM(total_vencido)')
                ->from('cliente')
                ->where('id_proyecto='."'PROJ0012'")
                ->queryScalar();

$proyect13 =  Yii::app()->db->createCommand()
->select('SUM(total_vencido)')
                ->from('cliente')
                ->where('id_proyecto='."'PROJ0013'")
                ->queryScalar();

$proyect14 =  Yii::app()->db->createCommand()
->select('SUM(total_vencido)')
                ->from('cliente')
                ->where('id_proyecto='."'PROJ0014'")
                ->queryScalar();
//************************************************************///
$carteracorriente1 =  Yii::app()->db->createCommand()
          ->select('SUM(cartera_corriente)')
                          ->from('cliente')
                          ->where('ID_PROYECTO='."'PROJ0001'")
                          ->queryScalar();

$carteracorriente2 =  Yii::app()->db->createCommand()
->select('SUM(cartera_corriente)')
                ->from('cliente')
                ->where('id_proyecto='."'PROJ0002'")
                ->queryScalar();

$carteracorriente3 =  Yii::app()->db->createCommand()
->select('SUM(cartera_corriente)')
                ->from('cliente')
                ->where('id_proyecto='."'PROJ0003'")
                ->queryScalar();

$carteracorriente4 =  Yii::app()->db->createCommand()
->select('SUM(cartera_corriente)')
                ->from('cliente')
                ->where('id_proyecto='."'PROJ0004'")
                ->queryScalar();

$carteracorriente5 =  Yii::app()->db->createCommand()
->select('SUM(cartera_corriente)')
                ->from('cliente')
                ->where('id_proyecto='."'PROJ0005'")
                ->queryScalar();

$carteracorriente6 =  Yii::app()->db->createCommand()
->select('SUM(cartera_corriente)')
                ->from('cliente')
                ->where('id_proyecto='."'PROJ0006'")
                ->queryScalar();

$carteracorriente7 =  Yii::app()->db->createCommand()
->select('SUM(cartera_corriente)')
                ->from('cliente')
                ->where('id_proyecto='."'PROJ0007'")
                ->queryScalar();

$carteracorriente9 =  Yii::app()->db->createCommand()
->select('SUM(cartera_corriente)')
                ->from('cliente')
                ->where('id_proyecto='."'PROJ0009'")
                ->queryScalar();

$carteracorriente11 =  Yii::app()->db->createCommand()
->select('SUM(cartera_corriente)')
                ->from('cliente')
                ->where('id_proyecto='."'PROJ0011'")
                ->queryScalar();

$carteracorriente12 =  Yii::app()->db->createCommand()
->select('SUM(cartera_corriente)')
                ->from('cliente')
                ->where('id_proyecto='."'PROJ0012'")
                ->queryScalar();

$carteracorriente13 =  Yii::app()->db->createCommand()
->select('SUM(cartera_corriente)')
                ->from('cliente')
                ->where('id_proyecto='."'PROJ0013'")
                ->queryScalar();

$carteracorriente14 =  Yii::app()->db->createCommand()
->select('SUM(cartera_corriente)')
                ->from('cliente')
                ->where('id_proyecto='."'PROJ0014'")
                ->queryScalar();

if(isset($_POST['Metas']))
{ 
    
     $model->attributes=$_POST['Metas'];//DESCOMENTAR OJO
     $success=0;
   // if($model->validate()){
                       /*     $success=1;
				echo 'Todo se valido bien';
                     if($success==1){*/
                        foreach($model->mes as $llave=>$valor)
                        {
                           
                
                            $gestion=new Metas;
                            $gestion->attributes=$_POST['Metas'];
                            $gestion->monto=$model->monto;
                            $gestion->id_crm_proyecto=$model->id_crm_proyecto;
                            $gestion->id_tipo_meta=$model->id_tipo_meta;
                            $gestion->remuneracion=0;
                            $gestion->mes=$valor;
                            if($gestion->validate()){
                                $success=1;
                            }  else {
                              Yii::app()->user->setFlash('error', "Datos Invalidos por favor verifique!");    
                            }
                        }        
                        if($success==1){
                        foreach($model->mes as $key=>$val)
                        {
                           
                            $gestion=new Metas;
                            $gestion->attributes=$_POST['Metas'];
                            $gestion->monto=$model->monto;
                            $gestion->id_crm_proyecto=$model->id_crm_proyecto;
                            $gestion->id_tipo_meta=$model->id_tipo_meta;
                            $gestion->remuneracion=0;
                            $gestion->mes=$val;
                            
                          //  $gestion->getErrors();
                             //var_dump($val->id_crm_proyecto);die;
                              //   $gestion->save();
                                     
                       if ($gestion->validate()) {
                            $gestion->save();
        echo 'Successfully created ' . $gestion->id_crm_proyecto . PHP_EOL;
       // Yii::app()->user->setFlash('Metas',Yii::t('metas','Satisfactoria Metas de Meta '));
        Yii::app()->user->setFlash('success', "Meta creada Satisfactoriamente!");
         $gestion->getErrors();
        
    } else {
        Yii::app()->user->setFlash('error', "Este proyecto ya tiene una Meta Asociada!");
       // Yii::app()->user->setFlash('error',Yii::t('metas','Error Metas de Meta '));
        echo 'Failed to create ';
        print_r( $gestion->getErrors() );
    }
                            
                        }
}    
                         $this->redirect(array('create'));
                  
            //  }          
}         

		
 
       


$this->render('create',array(
        'model'=>$model,
        'proyect01'=>$proyect01,
        'proyect02'=>$proyect02,
        'proyect03'=>$proyect03,
        'proyect04'=>$proyect04,
        'proyect05'=>$proyect05,
        'proyect06'=>$proyect06,
        'proyect07'=>$proyect07,
        'proyect09'=>$proyect09,
        'proyect11'=>$proyect11,
        'proyect12'=>$proyect12,
        'proyect13'=>$proyect13,
        'proyect14'=>$proyect14,
    
    
    'carteracorriente1'=>$carteracorriente1,
        'carteracorriente2'=>$carteracorriente2,
        'carteracorriente3'=>$carteracorriente3,
        'carteracorriente4'=>$carteracorriente4,
        'carteracorriente5'=>$carteracorriente5,
        'carteracorriente6'=>$carteracorriente6,
        'carteracorriente7'=>$carteracorriente7,
        'carteracorriente9'=>$carteracorriente9,
        'carteracorriente11'=>$carteracorriente11,
        'carteracorriente12'=>$carteracorriente12,
        'carteracorriente13'=>$carteracorriente13,
        'carteracorriente14'=>$carteracorriente14,
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

if(isset($_POST['Metas']))
{
    $model->attributes=$_POST['Metas'];
        if($model->save())
    $this->redirect(array('view','id'=>$model->id_meta));
}

    $this->render('update',array(
        'model'=>$model,
    ));
}
/**
 * Actualizar Cobrador
 */
public function actionActualizar()
{  
    Yii::import('bootstrap.widgets.TbEditableSaver');
    $es = new TbEditableSaver('Metas');
    $es->update();
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
    $dataProvider=new CActiveDataProvider('Metas');
    $this->render('index',array(
          'dataProvider'=>$dataProvider,
    ));
}

    public function actionIndexMetas()
    {


        $this->render('indexmetas');
               
    }
/**
* Manages all models.
*/
public function actionAdmin()
{
        $model=new Metas('search');
        $model->unsetAttributes();  // clear any default values
        if(isset($_GET['Metas']))
                 $model->attributes=$_GET['Metas'];

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
        $model=Metas::model()->findByPk($id);
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
    if(isset($_POST['ajax']) && $_POST['ajax']==='metas-form')
    {
          echo CActiveForm::validate($model);
          Yii::app()->end();
    }
    }
}
