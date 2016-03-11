<?php

class GestionController extends Controller
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
				'actions'=>array('index','view','gestioncobros','toggle','excel','indexreportes','morocidadcliente','excelcm','morosidadproyecto'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update','gestioncobros','excel','indexreportes','morocidadcliente','excelcm','morosidadproyecto'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete','excel'),
				'users'=>array('admin','orodriguez','obonilla','ppuerta','osoto'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
            
		);
	}
        
public function actions()
    {
    return array(
    'toggle' => array(
    'class'=>'bootstrap.actions.TbToggleAction',
    'modelName' => 'Gestion',
    )
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


public function actionCreate($id){
            
	$model = new Gestion;
        $cartera = new Cartera;
        // Uncomment the following line if AJAX validation is needed
        $this->performAjaxValidation($model);
        $fecha="";
        
        //Para ver el total abonado
        $totalabonadof =  Yii::app()->dbconix->createCommand()
                                ->select('SUM(monto)')
                                ->from('payments')
                                ->where('Cliente='."'".$id."'")
                                ->queryScalar();
        
        //Buscamos el cliente segun el parametro recibido para traerme sus datos.
        $cliente = Cliente::model()->find('id_cliente=:id_cliente',
                              array(':id_cliente'=>$id)); 

                                 

       //Buscamos las ultimas Gestiones Realizadas
        $gestion_old = $model->findAll('id_cliente=:id_cliente',
                              array(':id_cliente'=>$id)); 
        
        if(isset($_POST['Gestion']))
        {
            
        $fecha_actual = date('Y-m-d');         
        $model->attributes=$_POST['Gestion'];
        $model->fecha_creacion=$fecha_actual;
        if(empty($_POST['Gestion']['fecha_acuerdo'])){               
               $model->fecha_acuerdo=NULL;
        }
        $model->id_usuario=Yii::app()->user->id; 
            
  
        if($model->save()){
            $clienteupdate = Cliente::model()->updateByPk($cliente->id_cliente_gs,array('gestion' => 1));
            $this->redirect(array('view','id'=>$model->id_gestion));
        }    
        }

        $this->render('create',array(
                        'model'=>$model,
                        'cliente'=>$cliente,
                        'cartera'=>$cartera,
                        'gestion_old'=>$gestion_old,
                        'totalabonadof'=>$totalabonadof,
                      //  'tramite'=>$tramite,
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
        $cliente=Cliente::model()->find('id_cliente=:id_cliente',
                               array(':id_cliente'=>$id)); //Buscamos el cliente segun el parametro recibido
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Gestion']))
		{
			$model->attributes=$_POST['Gestion'];
            
			if($model->save())
				$this->redirect(array('view','id'=>$model->id_gestion));
		}

		$this->render('update',array(
			'model'=>$model,
            'cliente'=>$cliente,
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
            
            //Mas Buscados - Clientes con 90 dias
            $cliente = new Cliente('search90');
            
            $cliente->unsetAttributes();
            
           // $retiro= new Cliente('search120');
            //Aviso de retiro - Clientes con 120 dias
            $retiro= new Cliente('search120');
            $retiro->unsetAttributes();
            
            $model=new Gestion('search');  
            $model->unsetAttributes();
     
            if(isset($_GET['Cliente'])){
                            $cliente->attributes=$_GET['Cliente'];
                            $retiro->attributes=$_GET['Cliente'];
                        // print_r($_GET['Customers']);
            }
            
            if(isset($_GET['Cliente'])){
                         
                            $retiro->attributes=$_GET['Cliente'];
                        // print_r($_GET['Customers']);
            }
         
            if(isset($_GET['Gestion'])){
                            $model->attributes=$_GET['Gestion'];
                        // print_r($_GET['Customers']);
            }		
		
                     
                
		$this->render('index',array(
                    'model'=>$model,
                    'cliente'=>$cliente,
                    'retiro'=>$retiro                  
		));
             
        
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
    
            $model=new Gestion('search');  
            $model->unsetAttributes();
     
         
            if(isset($_GET['Gestion'])){
                            $model->attributes=$_GET['Gestion'];
                       
            }		
		
                     
                
		$this->render('admin',array(
                    'model'=>$model,
                      
		));

	}

    public function actionExcel() {

    
		$issueDataProvider = $_SESSION['Gestion'];
		$cliente = new Cliente();
		$i = 0;
      
        $i++;
        

        //populate data array with the required data elements
        foreach($issueDataProvider->getData(true) as $queryData)
        {
        	
			$data[$i]['id_gestion'] = $queryData->id_gestion;
			$data[$i]['id_crm_proyecto'] = $queryData->id_crm_proyecto;
			$data[$i]['proyecto'] = $queryData->idClienteGs->proyecto;
			$data[$i]['numero_de_lote'] = $queryData->idClienteGs->numero_de_lote;
			$data[$i]['nombre_de_empresa'] = $queryData->idClienteGs->nombre_de_empresa;
			$data[$i]['descripcion'] = $queryData->idAcuerdoCobros->descripcion;
			$data[$i]['fecha_acuerdo'] = $queryData->fecha_acuerdo;
			$data[$i]['id_cumplimiento'] = $queryData->id_cumplimiento;
			$data[$i]['observaciones'] = $queryData->observaciones;
            
            $i++;
        }
     /*   foreach ($issueDataProvider->data as $item) {
            $data[] = $item->attributes;

        }*/
       
 		Yii::app()->request->sendFile('Gestiones.xls',
                                $this->renderPartial('excel',array(
                                    'data'=>$data,
                                ),true)
                
        );

	}

	/**
	 * INDEX DE REPORTES
	 */
	public function actionIndexReportes()
	{


		$this->render('indexreportes');
               
	}
	/**
	 * MOROCIDAD PROYECTO 
	 */

    public function actionMorosidadProyecto(){


        //MorosidadProyecto
        $proyectomorosos =  Yii::app()->db->createCommand()
                                ->select('proyecto, SUM(TOTAL_VENCIDO) as suma, SUM(CARTERA_30_DIAS) as treinta, SUM(CARTERA_60_DIAS) as sesenta, 
										SUM(CARTERA_90_DIAS) as noventa, SUM(CARTERA_120_DIAS) as cientoveinte,SUM(CARTERA_CORRIENTE) as cartera_corriente')
                                ->from('cliente c')
                                ->where('status_plan_pago != '."'RETIRO'".' AND status_de_lote != '."'LIQUIDADO'".' AND (cartera_corriente > '."'1'".' OR cartera_30_dias > '."'1'".' OR cartera_60_dias >'."'1'".' OR cartera_90_dias > '."'1'".' OR cartera_120_dias > '."'1'".' OR total_vencido > '."'1'".') GROUP BY proyecto')
                                ->queryAll(true);

        Yii::app()->request->sendFile('MorosidadProyecto.xls',
                                $this->renderPartial('morosidadproyecto',array(
                                    'proyectomorosos'=>$proyectomorosos,
                                ),true)
                
                );




    }
    	/**
	 * MOROCIDAD PROYECTO 
	 */
	public function actionMorocidadCliente()
	{
        $model = new Cliente('clientesexcel');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Cliente'])){
			$model->attributes=$_GET['Cliente'];
		}
	
    	$this->render('morocidadcliente', array('model' => $model));   
	}

	 public function actionExcelcm() {

    
		$issueDataProvider = $_SESSION['Cliente'];
		$cliente = new Cliente();
		$i = 0;
      
      
        
      //populate data array with the required data elements
      /*  foreach($issueDataProvider->getData(true) as $queryData)
        {
        	
	 echo "<pre>";
    print_r($queryData); // or var_dump($data);
    echo "</pre>";	
		die;
        }*/
        //populate data array with the required data elements
        foreach($issueDataProvider->getData(true) as $queryData)
        {
        	
			$data[$i]['nombre_de_empresa'] = $queryData->nombre_de_empresa;
			$data[$i]['correo'] = $queryData->correo;
			$data[$i]['id_proyecto'] = $queryData->id_proyecto;
			$data[$i]['proyecto'] = $queryData->proyecto;
			$data[$i]['numero_de_lote'] = $queryData->numero_de_lote;
			$data[$i]['cartera_corriente'] = $queryData->cartera_corriente;
			$data[$i]['cartera_30_dias'] = $queryData->cartera_30_dias;
			$data[$i]['cartera_60_dias'] = $queryData->cartera_60_dias;
			$data[$i]['cartera_90_dias'] = $queryData->cartera_90_dias;
			$data[$i]['cartera_120_dias'] = $queryData->cartera_120_dias;
			$data[$i]['total_vencido'] = $queryData->total_vencido;

            $i++;
        }
     /*   foreach ($issueDataProvider->data as $item) {
            $data[] = $item->attributes;

        }*/
       
 		Yii::app()->request->sendFile('morocidadcliente.xls',
                                $this->renderPartial('excelcm',array(
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
		$model=Gestion::model()->findByPk($id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='gestion-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
    
    
    public function actionGestioncobros($id){
             
         $cliente=Clientes::model()->find('id_cliente=:id_cliente',
                               array(':id_cliente'=>$id));
        // var_dump($cliente);die;
          
           $this->render('gestioncobros',array(
               'cliente'=>$cliente,
            
            ));
 	}
 
 
}



        
    

