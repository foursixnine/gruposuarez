<?php

class ClienteController extends Controller
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
            'actions'=>array('index','view','retiro','perfilcliente','generatepdf','detalle','excel','iniciartramite','actualizarobservaciones','actualizarprotocolo','toggle'),
            'users'=>array('*'),
    ),
    array('allow', // allow authenticated user to perform 'create' and 'update' actions
            'actions'=>array('create','update','retiro','perfilcliente','generatepdf','detalle','excel','iniciartramite','actualizarobservaciones','actualizarprotocolo','toggle'),
         //   'users'=>array('@'),
               'users'=>array('*'),

    ),
    array('allow', // allow admin user to perform 'admin' and 'delete' actions
            'actions'=>array('admin','delete'),
            'users'=>array('admin','obonilla'),
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
//********* ACTUALIZAR OBSERVACIONES ************//
public function actionActualizarObservaciones()
    {
    Yii::import('bootstrap.widgets.TbEditableSaver');
    $es = new TbEditableSaver('Cliente');
    $es->update();
}

public function actions()
    {
    return array(
    'toggle' => array(
    'class'=>'bootstrap.actions.TbToggleAction',
    'modelName' => 'Cliente',
    )
    );
    }

public function actionActualizarProtocolo()
    {
    Yii::import('bootstrap.widgets.TbEditableSaver');
    $es = new TbEditableSaver('Cliente');
    $es->update();
}

//*********ACTUALIZAMOS EL PAZYSALVO QUE VIENE DE TRAMITE/ADMIN ************//
public function actionIniciarTramite($id){
        //Buscamos las ultimas Gestiones Realizadas
        $model= new Tramite();
        $id_usuario = Yii::app()->user->id; 
        //Creo Nuevos Modelos
        $tramite = new Tramite;
        $tramite_pasos = new TramitePasos;
        
        //Busco los datos del Cliente 
         $cliente_datos = Cliente::model()->find('id_cliente_gs=:id_cliente_gs',
                                    array(':id_cliente_gs'=>$id));

        //Agente Tramitador
        $agente_tramite = $cliente_datos->agente_tramite;
        //Busco el Tramitor
        $tramitador = new Usuarios(); 
        $at = $tramitador->find('nombre=:nombre',
                              array(':nombre'=>$agente_tramite));
        
        if($agente_tramite==""){
                Yii::app()->user->setFlash('notice', "No sé puede iniciar el Tramite. Debe asignarle un tramitador (CRM)!");
                $this->redirect(array('tramite/admin'));
        }else{
                //Guardo los Datos en Tramites una vez generado el Paz y Salvo   
                $date = date('Y-m-d');    
                $tramite->id_cliente_gs=$id;
                $tramite->fecha_pazysalvo=$date;
                $tramite->id_expediente_fisico=3;
                $tramite->id_pasos=1;
                $tramite->inicio=0;
                $tramite->id_usuario=$at->id_usuario;
                $tramite->fecha_inicio=$date;    
                $tramite->descripcion="Inicio Tramite";
                $tramite->id_cliente=$cliente_datos->id_cliente; 
                $tramite->id_proyecto=$cliente_datos->id_proyecto;
                $tramite->numero_de_lote=$cliente_datos->numero_de_lote;
                $tramite->id_banco=$cliente_datos->id_banco;
             
                $tramite->save();
                //Guardo los Datos en Tramites una vez generado el Paz y Salvo      
                if($tramite->save()){
                                            /* inicia para guardar en la otra tabla TRAMITE PASOS*/
                                            $tramite_pasos->id_tramite=$tramite->id_tramite;
                                            $tramite_pasos->id_cliente_gs = $id;
                                            $tramite_pasos->fecha_pazysalvo=$date;
                                            $tramite_pasos->id_expediente_fisico=3;
                                            $tramite_pasos->id_usuario=$at->id_usuario;
                                            $tramite_pasos->fecha_inicio=$date;    
                                            $tramite_pasos->id_paso=1;    
                                            $tramite_pasos->id_crm_proyecto=$cliente_datos->id_proyecto;
                                            $tramite_pasos->save();                        
                }
            
                $clienteupdate = Cliente::model()->updateByPk($id,array('pazysalvo' => 1));
                $this->redirect(array('tramite/admin'));

        }

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
$model=new Cliente;

// Uncomment the following line if AJAX validation is needed
// $this->performAjaxValidation($model);

if(isset($_POST['Cliente']))
{
    $model->attributes=$_POST['Cliente'];
         if($model->save())
         $this->redirect(array('view','id'=>$model->id_cliente_gs));
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

if(isset($_POST['Cliente']))
{
        $model->attributes=$_POST['Cliente'];
        if($model->save())
              $this->redirect(array('view','id'=>$model->id_cliente_gs));
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
        $dataProvider = new CActiveDataProvider('Cliente');
        $this->render('index',array(
                 'dataProvider'=>$dataProvider,
        ));        
}

public function actionExcel()
{
        $clienteexcel=Cliente::model()->findall();
        Yii::app()->request->sendFile('antaresclientes.xls',
                                $this->renderPartial('excel',array(
                                    'clienteexcel'=>$clienteexcel,
                                ),true)
                
                );
        
}

/**
* Manages all models.
*/
public function actionAdmin()
{
                $model= new Cliente('noventadias');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Cliente']))
			$model->attributes=$_GET['Cliente'];
                
          
                
		$this->render('admin',array(
			'model'=>$model,
                )); 
}

public function actionRetiro(){
      Yii::import('application.extensions.phpmailer.JPhpMailer');
        $mail = new JPhpMailer;
        $cliente=  Cliente::model()->findAll("cartera_120_dias > 5 and status_plan_pago !='RETIRO' order by cartera_120_dias DESC");

        $message =
                "
                Datos de los Clientes....
         
                <u><strong>Cartera de 120 Dias</strong></u><br/>
                <table width='100%' border='0' cellpadding='0' cellspacing='0' style='border: 1px solid #E2E2E2;'>
                    <tr style='background: #003e82; color: #FFF; font-weight: bold;'>
                        <td style='border: 1px solid #E2E2E2; height:30px; padding-left:5px; padding-right: 5px;'>Nombre y Apellido</td>                  
                        <td style='border: 1px solid #E2E2E2; height:30px; padding-left:5px; padding-right: 5px;'>Proyecto</td>
                        <td style='border: 1px solid #E2E2E2; height:30px; padding-left:5px; padding-right: 5px;'>Lote</td>
                        <td style='border: 1px solid #E2E2E2; height:30px; padding-left:5px; padding-right: 5px;'>Cartera</td>
                        <td style='border: 1px solid #E2E2E2; height:30px; padding-left:5px; padding-right: 5px;'>Status Plan Pago</td>
                    </tr>
                ";

        foreach ($cliente as $row) {

            $message .= "<tr>
                            <td style='border: 1px solid #E2E2E2; height:30px; padding-left:5px; padding-right: 5px;'> ".$row['nombre_de_empresa']."</td>
                            <td style='border: 1px solid #E2E2E2; height:30px; padding-left:5px; padding-right: 5px;'>".$row['proyecto']." </td>
                            <td style='border: 1px solid #E2E2E2; height:30px; padding-left:5px; padding-right: 5px;'>".$row['numero_de_lote']." </td>                            
                            <td style='border: 1px solid #E2E2E2; height:30px; padding-left:5px; padding-right: 5px;'>".$row['cartera_120_dias']." </td>
                            <td style='border: 1px solid #E2E2E2; height:30px; padding-left:5px; padding-right: 5px;'>".$row['status_plan_pago']." </td>    
                        </tr>";
        }

        $message .= "
                </table>
                ";

        $datetime1 = new DateTime("now");
        $datetime2 = new DateTime('2015-05-18'); //Fecha Carta Promesa
        $interval = date_diff($datetime2,$datetime1 );
        $fe_diff= $interval->format('%R%a');

        $mail->Username = 'gilarreta@valorca.com';
        $mail->Password = 'IRGA2785';
        $mail->SetFrom('gilarreta@valorca.com', 'GRUPO SUAREZ');
        $mail->Subject = 'PRUEBA DE CLIENTES PARA RETIRO';
        $mail->CharSet = 'UTF-8';
        $mail->AltBody = 'HOLA';
     
 
        $mail->MsgHTML($message);         // Colocaremos el cuerpo del mensaje en html.
        $mail->AddAttachment("images/logo.png");  
        $mail->AddAddress('osoto@valorca.com', 'Oly Soto');
        $mail->AddAddress('gilarreta@valorca.com', 'Oly Soto');
        $mail->Send();       
        $this->redirect('../gestion');

}

public function actionPerfilcliente($id){
    
   
    $gestion = new Gestion();


 //   $model->unsetAttributes();  // clear any default values
    

    $cliente = Cliente::model()->find('id_cliente=:id_cliente',
                               array(':id_cliente'=>$id));
  
    //Buscamos las ultimas Gestiones Realizadas
    $gestion_old = Gestion::model()->findAll('id_cliente=:id_cliente',
                              array(':id_cliente'=>$id)); 

    //Buscamos para si existe algun tramite
    $tramite = Tramite::model()->find('id_cliente_gs=:id_cliente_gs',
                      array(':id_cliente_gs'=>$cliente->id_cliente_gs)); 
//var_dump("Aqui-->". $tramite->id_expediente_fisico);die;

    $model = new Tramite();

    if(empty($tramite)){
    $tramite="";    
    }
     
    if(isset($_POST['Tramite']))
    {
        $model->attributes=$_POST['Tramite'];
       //  print_r($_POST['Tramite']);die;
        $tramiteupdate = Tramite::model()->updateAll(array( 
                                                'id_expediente_fisico'    =>$model->id_expediente_fisico,   
                                            
                                                                  ),
                                                                    'id_tramite ='.$tramite->id_tramite
                                                            );
        
      
    }

    $this->render('perfilcliente',array(
                          'cliente'=>$cliente,
                          'gestion_old'=>$gestion_old,
                          'tramite'=>$tramite,
                          'model'=>$model,

));
    
} 

public function actionGeneratePdf($id) {
    
    $cliente = Cliente::model()->find('id_cliente_gs=:id_cliente_gs',
                           array(':id_cliente_gs'=>$id)); //Buscamos el cliente segun el parametro recibido
    $proyecto = Proyecto::model()->find('id_crm_proyecto=:id_crm_proyecto',
                           array(':id_crm_proyecto'=>$cliente->id_proyecto));
    $usuarios = Usuarios::model()->find('id_usuario=:id_usuario',
                           array(':id_usuario'=>1));
    //Creo Nuevos Modelos
    $tramite = new Tramite;
    $tramite_pasos = new TramitePasos;
    
    //Guardo los Datos en Tramites una vez generado el Paz y Salvo   
    $date = date('Y-m-d');    
    $tramite->id_cliente_gs=$id;
    $tramite->fecha_pazysalvo=$date;
    $tramite->id_expediente_fisico=3;
    $tramite->id_pasos=1;
    $tramite->inicio=0;
    $tramite->fecha_inicio=$date;    
    $tramite->descripcion="Inicio Tramite";
    $tramite->save();
    //Guardo los Datos en Tramites una vez generado el Paz y Salvo      
    if($tramite->save()){
                                /* inicia para guardar en la otra tabla*/
                                $tramite_pasos->id_tramite=$tramite->id_tramite;
                                $tramite_pasos->id_cliente_gs = $id;
                                $tramite_pasos->fecha_pazysalvo=$date;
                                $tramite_pasos->id_expediente_fisico=3;
                                $tramite_pasos->fecha_inicio=$date;    
                                $tramite_pasos->id_paso=1;    
                                $tramite_pasos->save();
                        
    }
    
 
    
    //****************************INFORMACION PARA EL PDF*******************************///////////
    Yii::import('application.vendors.*');
    require_once('tcpdf/tcpdf.php');
    require_once('tcpdf/config/lang/eng.php');
 // create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor(' ');
$pdf->SetTitle('TCPDF Example 039');
$pdf->SetSubject('TCPDF Tutorial');
$pdf->SetKeywords('TCPDF, PDF, example, test, guide');

// set default header data
$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, '',' ');

// set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set some language-dependent strings (optional)
if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
    require_once(dirname(__FILE__).'/lang/eng.php');
    $pdf->setLanguageArray($l);
}

// ---------------------------------------------------------

// add a page
$pdf->AddPage();

// set font
$pdf->SetFont('helvetica', 'B', 20);

$pdf->Write(0, ' ', '', 0, 'L', true, 0, false, false, 0);

// create some HTML content
$html = '<span style="text-align:justify;">'
        . '<br/><br/>'
        . '<b>Yo  '.$usuarios->nombre.' identificada con la '
        . 'cédula No X.XXX.XXX </b> actuando en representación Legal de Grupo '
        . 'Suarez identificada con el RUC se permite certificar que el Señor(A) '
        . '<b>'.$cliente->nombre_de_empresa.'</b> identificado con cedula '.$cliente->cedula.', se '
        . 'encuentra a Paz y Salvo por todo concepto con nuestra organización en lo '
        . 'que se refiere al tema de pagos por concepto de abono inicial a la compra de la '
        . 'propiedad <b>'.$cliente->numero_de_lote.'</b> en el proyecto <b>'.$cliente->proyecto.'</b>'
        . '<br/><br/>'
        . 'El presente certificado se expide a los '
        . '30 días del mes de Junio del presente año 2015 por Admin'
        . '<br/><br/><br/><br/>'
        . '<b>DATOS DEL COBRO</b><br/> '
        . '<p>Monto Abono: MONTO PAGADO</p><br/>'
        . '<p>Monto Mejoras: MONTO PAGADO</p><br/>'
        . '<p>Monto Adenda: MONTO PAGADO</p><br/>'
        . '<p>Fecha Ultimo Pago: MONTO PAGADO</p><br/>'
        . '</span>';

// set core font
$pdf->SetFont('helvetica', '', 12);

// output the HTML content
$pdf->writeHTML($html, true, 0, true, true);

$pdf->Ln();

// set UTF-8 Unicode font
$pdf->SetFont('dejavusans', '', 10);



// reset pointer to the last page
$pdf->lastPage();

// ---------------------------------------------------------

//Close and output PDF document
$pdf->Output('pazysalvo.pdf', 'I');

        Yii::app()->end();
    
    
}
/**
* Returns the data model based on the primary key given in the GET variable.
* If the data model is not found, an HTTP exception will be raised.
* @param integer the ID of the model to be loaded
*/
public function loadModel($id)
{
$model=Cliente::model()->findByPk($id);
if($model===null)
throw new CHttpException(404,'The requested page does not exist.');
return $model;
}

public function actionDetalle(){
    $model = new Cliente ('search');
    $model->unsetAttributes();  // clear any default values
  
    if(isset($_GET['Cliente'])){
			$model->attributes=$_GET['Cliente'];
        }
    $this->render('detalle',array(
     'model'=>$model,
));
}
/**
* Performs the AJAX validation.
* @param CModel the model to be validated
*/
protected function performAjaxValidation($model)
{
if(isset($_POST['ajax']) && $_POST['ajax']==='cliente-form')
{
echo CActiveForm::validate($model);
Yii::app()->end();
}
}
}
