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
        'actions'=>array('index','view','actualizarcobradora','actualizar','toggle','listar','continuartramites','tramitesliquidados','reportetramite','excelreporte','reportebancos'),
        'users'=>array('*'),
    ),
    array('allow', // allow authenticated user to perform 'create' and 'update' actions
        'actions'=>array('create','update','actualizarcobradora','actualizar','listar','continuartramites','tramitesliquidados','reportetramite','excelreporte','reportebancos'),
        //'users'=>array('@'),
         'users'=>array('*'),
    ),
    array('allow', // allow admin user to perform 'admin' and 'delete' actions
        'actions'=>array('admin','delete','actualizarcobradora'),
        'users'=>array('admin', 'gilarreta','aquintero','lvelasco','mguerra','orodriguez'),
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

            //Tramites Activos
            $tramitadora = new Tramite('activos'); 
            $tramitadora->unsetAttributes();
            $nameape=Yii::app()->user->nombre;

            //Clientes en Tramite
            $cliente = new Cliente('clientestramites');
            $cliente->unsetAttributes();
            
            $tramitador_clientes = $cliente->findall('agente_tramite=:agente_tramite',
                              array(':agente_tramite'=>$nameape)); 

            if(isset($_GET['Cliente'])){
                            $cliente->attributes=$_GET['Cliente'];
                         //   $retiro->attributes=$_GET['Cliente'];
                        // print_r($_GET['Customers']);
            }

            if(isset($_GET['Tramite'])){
                            $tramitadora->attributes=$_GET['Tramite'];
                        // print_r($_GET['Customers']);
            }       
        
                     
                
           $this->render('admin',array(
            'tramitador_clientes'=>$tramitador_clientes,
            'tramitadora'=>$tramitadora,   
            'cliente'=>$cliente,
             ));
}
/**
*
*/

public function actionContinuarTramites(){
            
            $model = new Tramite('search');
           // $tramitadora = new Tramite('search');
           // $tramitadora->unsetAttributes();  // clear any default values
            $model->unsetAttributes();  // clear any default values
            if(isset($_GET['Tramite']))
            $model->attributes=$_GET['Tramite'];

            $this->render('continuartramites',array(
                    'model'=>$model,
                    //'tramitadora'=>$tramitadora,   
                    
            ));



}

/**********************TRAMITES LIQUIDADOS*************************************/
public function actionTramitesLiquidados(){
            
        
            $model = new Tramite();
            $tramitadora = new Tramite('tramitesliquidados');
            $tramitadora->unsetAttributes();  // clear any default values

            if(isset($_GET['Tramite']))
            $tramitadora->attributes=$_GET['Tramite'];

   /*         $this->render('tramitesliquidados',array(
                    'model'=>$model,
                    'tramitadora'=>$tramitadora,   
                    
            ));*/


        $post = Yii::app()->getRequest()->getParam('Tramite');
        if ($post) {
            $model->attributes = $post;
        }

        $provider = $model->search();
        $count = $provider->getItemCount();
            $min=  Yii::app()->db->createCommand()
            ->select('MIN(fecha_inicio)')
            ->from('tramite')
            ->where('id_pasos=11')
            ->queryScalar();

            $max=  Yii::app()->db->createCommand()
            ->select('MAX(fecha_inicio)')
            ->from('tramite')
            ->where('id_pasos=11')
            ->queryScalar();
       
        $this->render('tramitesliquidados', array(
            'model' => $model,
            'count' => $count,
            'min' => $min,
            'max' => $max,
        ));

}

  /**Reporte***/
  public function actionReporteTramite()
  {

    $model = new Tramite();

    $var_post = Yii::app()->getRequest()->getParam('Tramite');
        if ($var_post) {
            $model->attributes = $var_post;
        }

        $provider = $model->reporteexcel();
        $count = $provider->getItemCount();
            $minimo =  Yii::app()->db->createCommand()
            ->select('MIN(fecha_inicio)')
            ->from('tramite')
            ->where('id_pasos!=11')
            ->queryScalar();

            $maximo =  Yii::app()->db->createCommand()
            ->select('MAX(fecha_inicio)')
            ->from('tramite')
            ->where('id_pasos!=11')
            ->queryScalar();
       
        $this->render('reportetramite', array(
            'model' => $model,
            'count' => $count,
            'minimo' => $minimo,
            'maximo' => $maximo,
        ));

  }

  public function actionReporteBancos(){


      $reportebancos = Yii::app()->db->createCommand()
      ->select('t.id_pasos as pasos, 
            pa.descripcion as nompaso, pa.abrev,
            b.descripcion, c.id_banco, 
            COUNT(c.id_banco) as totalbanco,
            COUNT(t.id_pasos) as totalpaso,
            SUM(monto_liquidacion) as montoliquidacion,
            SUM(total_venta) as totalventa')
      ->from('tramite t, paso pa,cliente c,banco b')
      ->where('pa.id_paso = t.id_pasos AND c.id_cliente_gs = t.id_cliente_gs
               AND b.id_banco = c.id_banco  GROUP BY 
               t.id_pasos,  b.descripcion,  c.id_banco, pa.descripcion, pa.abrev
              order by pasos')
      ->queryAll(true);

      Yii::app()->request->sendFile('TramitesporBancos.xls',
                                $this->renderPartial('reportebancos',array(
                                    'reportebancos'=>$reportebancos,
                                ),true)
                
       );
  }
     public function actionExcelReporte() {

    
    $issueDataProvider = $_SESSION['Tramite'];
    $cliente = new Cliente();
    $i = 0;
      
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
              $data[$i]['plano'] =  $queryData->plano;
              $data[$i]['fecha_entrega'] = $queryData->fecha_entrega; 
              $data[$i]['ganancia_capital'] = $queryData->ganancia_capital;   
              $data[$i]['fecha_escritura'] = $queryData->fecha_escritura;   
              $data[$i]['fecha_inscripcion_escritura'] = $queryData->fecha_inscripcion_escritura;   
              $data[$i]['num_escritura'] = $queryData->num_escritura;    
              $data[$i]['num_finca_inscrita'] = $queryData->num_finca_inscrita;   
              $data[$i]['transferencia_inmueble'] = $queryData->transferencia_inmueble;    
              $data[$i]['num_permiso_ocupacion'] = $queryData->num_permiso_ocupacion;  
              $data[$i]['fecha_de_permiso_ocupacion'] = $queryData->idClienteGs->fecha_de_permiso_ocupacion;  
              $data[$i]['id_pasos'] = $queryData->idPasos->descripcion; 
              $data[$i]['id_expediente_fisico'] = $queryData->idExpedienteFisico->descripcion; 
              $data[$i]['num_formulario'] = $queryData->num_formulario;
              $data[$i]['id_tipo_responsable'] = $queryData->idPasos->abrev;  
              $data[$i]['fecha_de_permiso_contruccion'] =$queryData->idClienteGs->fecha_de_permiso_contruccion;
              $data[$i]['vendedor'] =$queryData->idClienteGs->vendedor;
              $data[$i]['confeccion_protocolo']=$queryData->idClienteGs->confeccion_protocolo;
              $data[$i]['agente_tramite'] = $queryData->idClienteGs->agente_tramite;


            $i++;
        }


      Yii::app()->request->sendFile('ReporteTramite.xls',
                                $this->renderPartial('excelreporte',array(
                                    'data'=>$data,
                                ),true)        
        );

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