<?php

class TramiteController extends Controller
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
        'actions'=>array('index','view','actualizarcobradora','actualizar','toggle','listar','continuartramites'),
        'users'=>array('*'),
    ),
    array('allow', // allow authenticated user to perform 'create' and 'update' actions
        'actions'=>array('create','update','actualizarcobradora','actualizar','listar','continuartramites'),
        //'users'=>array('@'),
         'users'=>array('*'),
    ),
    array('allow', // allow admin user to perform 'admin' and 'delete' actions
        'actions'=>array('admin','delete','actualizarcobradora'),
        'users'=>array('admin', 'gilarreta'),
       //  'users'=>array('*'),
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

public function actions()
    {
    return array(
    'toggle' => array(
    'class'=>'bootstrap.actions.TbToggleAction',
    'modelName' => 'Tramite',
    )
    );
    }
public function actionActualizar()
    {
    Yii::import('bootstrap.widgets.TbEditableSaver');
    $es = new TbEditableSaver('Tramite');
    $es->update();
}

public function actionActualizarCobradora()
    {
    Yii::import('bootstrap.widgets.TbEditableSaver');
    $es = new TbEditableSaver('Tramite');
    $es->update();
}

public function actionPermiso()
    {
    Yii::import('bootstrap.widgets.TbEditableSaver');
    $es = new TbEditableSaver('Tramite');
    $es->update();
}

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
$model=new Tramite;

// Uncomment the following line if AJAX validation is needed
// $this->performAjaxValidation($model);

if(isset($_POST['Tramite']))
{
$model->attributes=$_POST[''];
if($model->save())
$this->redirect(array('view','id'=>$model->id_tramite));
}

$this->render('create',array(
'model'=>$model,
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

        if(isset($_POST['Tramite']))
        {
        $model->attributes=$_POST['Tramite'];
                if($model->save())
                $this->redirect(array('view','id'=>$model->id_tramite));
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
$dataProvider=new CActiveDataProvider('Tramite');
$this->render('index',array(
'dataProvider'=>$dataProvider,
));
}

public function actionListar()
{
$dataProvider=new CActiveDataProvider('Tramite');
$this->render('listar',array(
'dataProvider'=>$dataProvider,
));
}

/**
* Manages all models.
*/
public function actionAdmin()
{
    $model = new Tramite('search');
    $tramitadora = new Tramite('search');
    $cliente = new Cliente('clientestramites');

    $model->unsetAttributes();  // clear any default values
    $tramitadora->unsetAttributes();  // clear any default values
    $cliente->unsetAttributes();  // clear any default values

    if(isset($_GET['Cliente'])){
                            $cliente->attributes=$_GET['Cliente'];
                        // print_r($_GET['Customers']);
    }
            
    if(isset($_GET['Tramite'])){            
                            $tramitadora->attributes=$_GET['Tramite'];
                        // print_r($_GET['Customers']);
    }

    $this->render('admin',array(
            'model'=>$model,
            'tramitadora'=>$tramitadora,   
            'cliente'=>$cliente,
    ));
}
/**
*
*/

public function actionContinuarTramites(){
            
            $model = new Tramite('search');
            $tramitadora = new Tramite('search');
            $tramitadora->unsetAttributes();  // clear any default values

            if(isset($_GET['Tramite']))
            $tramitadora->attributes=$_GET['Tramite'];

            $this->render('continuartramites',array(
                    'model'=>$model,
                    'tramitadora'=>$tramitadora,   
                    
            ));

}


/**
* Returns the data model based on the primary key given in the GET variable.
* If the data model is not found, an HTTP exception will be raised.
* @param integer the ID of the model to be loaded
*/
public function loadModel($id)
{
$model=Tramite::model()->findByPk($id);
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
if(isset($_POST['ajax']) && $_POST['ajax']==='tramite-form')
{
echo CActiveForm::validate($model);
Yii::app()->end();
}
}
}
