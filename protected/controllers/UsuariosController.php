<?php

class UsuariosController extends Controller
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
'actions'=>array('index','view','listarusuarioremuneracion','email'),
'users'=>array('*'),
),
array('allow', // allow authenticated user to perform 'create' and 'update' actions
'actions'=>array('create','update','listarusuarioremuneracion','email'),
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
$model=new Usuarios;

// Uncomment the following line if AJAX validation is needed
// $this->performAjaxValidation($model);

if(isset($_POST['Usuarios']))
{
$model->attributes=$_POST['Usuarios'];
if($model->save())
$this->redirect(array('view','id'=>$model->id_usuario));
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

if(isset($_POST['Usuarios']))
{
$model->attributes=$_POST['Usuarios'];
if($model->save())
$this->redirect(array('view','id'=>$model->id_usuario));
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
    $dataProvider=new CActiveDataProvider('Usuarios');
    $this->render('index',array(
    'dataProvider'=>$dataProvider,
    ));
}

/**
* Manages all models.
*/
public function actionAdmin()
{
    $model=new Usuarios('search');
    $model->unsetAttributes();  // clear any default values
    if(isset($_GET['Usuarios']))
         $model->attributes=$_GET['Usuarios'];
    
    $this->render('admin',array(
         'model'=>$model,
));
}

public function actionListarusuarioremuneracion()
{
    $model=new Usuarios('search');
    $model->unsetAttributes();  // clear any default values
        if(isset($_GET['Usuarios']))
        $model->attributes=$_GET['Usuarios'];

        $this->render('listarusuarioremuneracion',array(
        'model'=>$model,
    ));
}
public function actionEmail() {
        Yii::import('application.extensions.phpmailer.JPhpMailer');
        $mail = new JPhpMailer;
     /*
$mail->IsSMTP();
$mail->SMTPSecure = "ssl";  
$mail->Host = 'smtp.gmail.com'; 
$mail->SMTPAuth = true; 
$mail->SMTPSecure = true; */
      
        $mail->Username = 'gilarreta@valorca.com';
     //   $mail->Port = '465'; 
        $mail->Password = 'IRGA2785';


$mail->SetFrom('gilarreta@valorca.com', 'Departamento de Cobros');
$mail->Subject = 'Departamento de Cobros - Grupo Suarez';
$mail->AltBody = 'To view the message, please use an HTML compatible email viewer!';
$mail->MsgHTML('<h3>Le informamos que según nuestro registro usted tiene tres letras vencidas con fecha (insertar fecha). '
        . 'Le agradecemos contactarse con nosotros en los teléfonos (insertar teléfonos) a más tardar el día (insertar día) '
        . 'ya que sus pagos han pasado el plazo de los 90 días y según los términos del contrato tendremos que retirarlo del '
        . 'proyecto por incumplimiento. Nuestra intención es tener la mejor relación comercial con usted, para esto le '
        . 'solicitamos ponerse en contacto con nosotros lo más pronto posible.!</h3>');
$mail->AddAddress('gilarreta@valorca.com', 'Gabriela Ilarreta');
$mail->Send();
     //   Yii::app()->user->setFlash('contact','Thank you for... as possible.');
       //  $this->refresh();
       
        $this->redirect('../gestion');
}        
/**
* Returns the data model based on the primary key given in the GET variable.
* If the data model is not found, an HTTP exception will be raised.
* @param integer the ID of the model to be loaded
*/
public function loadModel($id)
{
$model=Usuarios::model()->findByPk($id);
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
if(isset($_POST['ajax']) && $_POST['ajax']==='usuarios-form')
{
echo CActiveForm::validate($model);
Yii::app()->end();
}
}
}
