<?php

class ClientesController extends Controller
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
        'actions'=>array('index','view','detalle','perfilcliente','generatepdf'),
        'users'=>array('*'),
    ),
    array('allow', // allow authenticated user to perform 'create' and 'update' actions
        'actions'=>array('create','update','detalle','perfilcliente','generatepdf'),
        'users'=>array('@'),
    ),
    array('allow', // allow admin user to perform 'admin' and 'delete' actions
        'actions'=>array('admin','delete','detalle','perfilcliente','generatepdf'),
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

public function actionDetalle(){
    $model=new Customersview ('buscarproyecto');
    $model->unsetAttributes();  // clear any default values
    //var_dump($model); die;
    if(isset($_GET['Customersview']))
      $model->attributes=$_GET['Customersview'];
    
    $this->render('detalle',array(
     'model'=>$model,
));
}

public function actionPerfilcliente($id){
    
       // var_dump($id);die;
    
     
    //$customersview = Customersview::model()->findAll();
     
    $cliente=Customersview::model()->find('ID_CLIENTE=:ID_CLIENTE',
                               array(':ID_CLIENTE'=>$id));
  
   
    /*	$cliente=new Clientes();
        $cliente=Clientes::model()->find('id_cliente=:id_cliente',
                               array(':id_cliente'=>$id));*/
                               
  
        //$model=$this->loadModel($id);
     //  var_dump($cobros->fecha_cobro);
    //   die;
                               
        $this->render('perfilcliente',array(
                          'cliente'=>$cliente,
                          // 'cobros'=>$cobros,
                          //  'customersview'=>$customersview,
));
    
} 

public function actionGeneratePdf($id) {
    
    $cliente = Clientes::model()->find('id_cliente=:id_cliente',
                           array(':id_cliente'=>$id)); //Buscamos el cliente segun el parametro recibido
    $proyecto = Proyecto::model()->find('id_proyecto=:id_proyecto',
                           array(':id_proyecto'=>$cliente->id_proyecto));
    
    Yii::import('application.vendors.*');
    require_once('tcpdf/tcpdf.php');
    require_once('tcpdf/config/lang/eng.php');
    $pdf = new TCPDF();
    $pdf->SetCreator(PDF_CREATOR);
    $pdf->SetAuthor('Grupo Suarez');
    $pdf->SetTitle('TCPDF fff 001');
    $pdf->SetSubject('TCPDF Tutorial');
    $pdf->SetKeywords('AAA, PDF, example, test, guide');
    $pdf->SetHeaderData('', 0, PDF_HEADER_TITLE, 'Grupo Suarez');
    $pdf->setHeaderFont(Array('helvetica', '', 14));
    $pdf->setFooterFont(Array('helvetica', '', 72));
  //  $pdf->Image('tcpdf/soporte.png', 50, 50, 100, 150, '', 'http://www.tcpdf.org', '', true, 150);
    $pdf->SetMargins(15, 18, 15);
    $pdf->SetHeaderMargin(5);
    $pdf->SetFooterMargin(10);
    $pdf->SetAutoPageBreak(TRUE, 0);
    $pdf->SetFont('dejavusans', '', 16);
    $pdf->AddPage();
    $pdf->writeHTML("<span>"
            ."<br/>"
            . "<p align='justify'> Yo identificado con cédula la No $cliente->ruc actuando en representación Legal de Grupo Suarez identificada con el RUC se permite certificar que el Señor (A) $cliente->nom_cliente identificado con cedula No $cliente->ruc, se encuentra a Paz y Salvo por todo concepto con nuestra organización en lo que se refiere al tema 
                de pagos por concepto de abono a la compra del lote  $proyecto->lote en el proyecto $proyecto->titulo"
            ."</p><br/>"
            ."<br/>"
                ."El presente certificado se expide por solicitud del interesado a 
                los dos (XX) días del mes de XXXXX del presente año XXXX."
                   ."<br/>"           ."<br/>"

            . "</span>", true, false, true, false, '');
    $pdf->LastPage();
    $pdf->Output("example_002.pdf", "I");
}
    
/**
* Creates a new model.
* If creation is successful, the browser will be redirected to the 'view' page.
*/
public function actionCreate()
{
    $model=new Clientes;
    
    // Uncomment the following line if AJAX validation is needed
    // $this->performAjaxValidation($model);
    
    if(isset($_POST['Clientes']))
    {
        $model->attributes=$_POST['Clientes'];
        if($model->save())
            $this->redirect(array('view','id'=>$model->id_cliente));
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

    if(isset($_POST['Clientes']))
    {
         $model->attributes=$_POST['Clientes'];
         
    if($model->save())
    
         $this->redirect(array('view','id'=>$model->id_cliente));
         
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

 
    $dataProvider=new CActiveDataProvider('Customersview');
    $this->render('index',array(
    'dataProvider'=>$dataProvider,
    ));
}

/**
* Manages all models.
*/
public function actionAdmin()
{
   //$model=new Clientes('buscarproyecto');
  // $model=new Customersview('buscarproyecto');
    
    $model = Customersview::model()->findAll();
   //var_dump($model);die;
    
   // $model->unsetAttributes();  // clear any default values
  //  if(isset($_GET['Clientes']))
   //   $model->attributes=$_GET['Clientes'];
    
  //  $model= new CActiveDataProvider('Customersview');
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
    //$model=Clientes::model()->findByPk($id);
    $model=  Customersview::model()->find('ID_CLIENTE=:ID_CLIENTE',
                               array(':ID_CLIENTE'=>$id));
    var_dump($model);die;
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
    if(isset($_POST['ajax']) && $_POST['ajax']==='clientes-form')
    {
         echo CActiveForm::validate($model);
         Yii::app()->end();
    }
    }
    
    

}



