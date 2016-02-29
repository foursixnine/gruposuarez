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
        'actions'=>array('index','view','listarusuarioremuneracion','email','inicio'),
      //  'users'=>array('*'),
        'roles'=>array('admin'),
    ),
    array('allow', // allow authenticated user to perform 'create' and 'update' actions
      //  'actions'=>array('create','update','listarusuarioremuneracion','email','inicio'),
    	  'actions'=>array('update','create','view'),
     //   'users'=>array('*'),
          'roles'=>array('analista_cobros','jefe_cobros','admin'),
    ),
    array('allow', // allow admin user to perform 'admin' and 'delete' actions
        'actions'=>array('admin','delete'),
       // 'users'=>array('*'),
        'roles'=>array('admin'),
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
		$model->password=$model->hashPassword($_POST['Usuarios']['password'],$session=$model->generateSalt());
		$model->session=$session;
		if($model->save())
			//$role = $auth->createRole('analista_cobros', 'Analista de Cobros');
			$auth=Yii::app()->authManager;
            $rol = Roles::model()->find('id_rol=:id_rol',
                              array(':id_rol'=>$model->id_rol)); 
			$auth->assign($rol->descrip_roles,$model->id_usuario); // adding admin to first user created 
			$auth->save();
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
				$model->password=$model->hashPassword($_POST['Usuarios']['password'],$session=$model->generateSalt());
				$model->session=$session;
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
/*if (Yii::app()->user->checkAccess("admin"))
    {
        echo 'HOLA';
    } else {
        echo 'ADIOS';
    }*/
   /* Yii::app()->authManager->createRole("admin");
    Yii::app()->authManager->assign("admin",1);*/
 
        $dataProvider = new CActiveDataProvider('Usuarios');
    $this->render('index',array(
    'dataProvider'=>$dataProvider,
    ));
}

/**
* Lists all models.
*/
public function actionInicio()
{   

 
       //$this->redirect('../gestion');
            $this->render('inicio',array());
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
	$mail->Subject = 'Departamento de Cobros - Clientes que deben ser Retirados';
	$mail->AltBody = 'To view the message, please use an HTML compatible email viewer!';
	$mail->MsgHTML('<p>Estimada Oly Soto! <br/><br/><h2>Le informamos que los siguientes clientes: '
		. 'DANDOLE PROYECTO TORRES DE TOSCANA TORRE 4 MONTO XXXX'
		. 'KELVIN PROYECTO VERDE REAL MONTO XXXX'
		. 'deben ser retiros. Pus cumplieron el <br/><br/>'
		. ''
		. 'Grupo Suárez'
		. ''
		. ''
		. 'Nota: Tambien se le enviara al cliente');
	$mail->AddAddress('jtorres@gsuarez.com', 'Jessica Torres');
	$mail->AddCC('gilarreta@valorca.com','Gabriela Ilarreta');
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

	public function validatePassword($password)
	{
		return CPasswordHelper::verifyPassword($password,$this->password);
	}

	public function hashPassword($password)
	{
		return CPasswordHelper::hashPassword($password);
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
