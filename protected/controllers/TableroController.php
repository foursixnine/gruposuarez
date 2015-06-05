<?php

class TableroController extends Controller
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
        'actions'=>array('index','view','detalle','perfilcliente','tablero','estatuscartera','metascobranzas','recuperacioncartera','anillos'),
        'users'=>array('*'),
    ),
    array('allow', // allow authenticated user to perform 'create' and 'update' actions
        'actions'=>array('create','update','detalle','perfilcliente','tablero','estatuscartera','metascobranzas','recuperacioncartera','anillos','expediente','acuerdos'),
        'users'=>array('@'),
    ),
    array('allow', // allow admin user to perform 'admin' and 'delete' actions
        'actions'=>array('admin','delete','detalle','perfilcliente','tablero','estatuscartera','metascobranzas','recuperacioncartera','anillos','expediente','acuerdos'),
        'users'=>array('admin'),
    ),
    array('deny',  // deny all users
        'users'=>array('*'),
        ),
    );
}

	
	public function actionIndex()
	{
		$this->render('index');
	}
        
public function actionEstatuscartera(){
        $proyecto=new Proyecto();
        $proyecto=Proyecto::model()->findAll();
        
        $id='PROJ0001';
        $cliente=Customersview::model()->findAll('ID_PROYECTO=:ID_PROYECTO',
                               array(':ID_PROYECTO'=>$id));     

        $treinta = array();
        $sesenta = array();
        $noventa = array();
        $cientoveinte = array();
        foreach( $cliente as $rowt )
        {
             $treinta[] = $rowt['CARTERA_30_DIAS'];
        }
        //60 dias
        foreach( $cliente as $rows )
        {
             $sesenta[] = $rows['CARTERA_60_DIAS'];
        }
        //90 dias
        foreach( $cliente as $rown )
        {
             $noventa[] = $rown['CARTERA_90_DIAS'];
        }
        //120 dias
        foreach( $cliente as $rowv )
        {
             //$sumveinte[$id]+=$value;
             $cientoveinte[]= $rowv['CARTERA_120_DIAS'];
        }
        var_dump($noventa);die;

             $nom_proyecto=array(
            "VERDE REAL",
            "ALTOS DEL TECAL ETAPAS  5 ABC",
            "ALTOS DEL TECAL ETAPA 6 Y 7",
            "TORRES DE VENECIA TORRE 1",
            "TORRES DE TOSCANA TORRE 4",
            "ALTOS DEL TECAL  COROTU ETAPA 13 Y 14 DERECHO",
            "NEW WEST FASE I",
            "SENDEROS FASE I",
            "ALTOS DEL TECAL COROTU ETAPA 13 Y 14 IZQUIERDO",
            "NEW WEST FASE II",
            "TORRES DE TOSCANA TORRE 3",
            "TORRES DE VENECIA - TORRE I",
            );

         $this->render('estatuscartera',array(
                          'proyecto'=>$proyecto,
                          'cliente'=>$cliente,
                          'nom_proyecto'=>$nom_proyecto,
                          'treinta'=>$treinta,
                          'sesenta'=>$sesenta,
                          'noventa'=>$noventa,
                          'cientoveinte'=>$cientoveinte,
                      ));    
} 

public function actionMetasCobranzas(){
        $proyecto=new Proyecto();
        $proyecto=Proyecto::model()->findAll(); 
 
        $id='PROJ0001';
        $cliente=Customersview::model()->findAll('ID_PROYECTO=:ID_PROYECTO',
                               array(':ID_PROYECTO'=>$id));     
//          var_dump($cliente);die;
$treinta = array();
$sesenta = array();
$noventa = array();
$cientoveinte = array();
foreach( $cliente as $rowt )
{
     $treinta[] = $rowt['CARTERA_30_DIAS'];
}

foreach( $cliente as $rows )
{
     $sesenta[] = $rows['CARTERA_60_DIAS'];
}
foreach( $cliente as $rown )
{
     $noventa[] = $rown['CARTERA_90_DIAS'];
}
foreach( $cliente as $rowv )
{
     $cientoveinte[] = $rowv['CARTERA_120_DIAS'];
}
      // var_dump($proyecto);die;
        
        
         $this->render('metascobranzas',array(
                          'treinta'=>$treinta,
                          'sesenta'=>$sesenta,
                          'noventa'=>$noventa,
                          'cientoveinte'=>$cientoveinte,
                      ));     
} 

public function actionRecuperacioncartera(){
        $proyecto=new Proyecto();
        $proyecto=Proyecto::model()->findAll(); 
    $id='PROJ0001';
        $cliente=Customersview::model()->findAll('ID_PROYECTO=:ID_PROYECTO',
                               array(':ID_PROYECTO'=>$id));     
//          var_dump($cliente);die;
$treinta = array();
$sesenta = array();
$noventa = array();
$cientoveinte = array();
foreach( $cliente as $rowt )
{
     $treinta[] = $rowt['CARTERA_30_DIAS'];
}

foreach( $cliente as $rows )
{
     $sesenta[] = $rows['CARTERA_60_DIAS'];
}
foreach( $cliente as $rown )
{
     $noventa[] = $rown['CARTERA_90_DIAS'];
}
foreach( $cliente as $rowv )
{
     $cientoveinte[] = $rowv['CARTERA_120_DIAS'];
}
      // var_dump($proyecto);die;
        
        
         $this->render('recuperacioncartera',array(
                          'treinta'=>$treinta,
                          'sesenta'=>$sesenta,
                          'noventa'=>$noventa,
                          'cientoveinte'=>$cientoveinte,
                      ));         
} 

public function actionAnillos(){
    
        $gestion=new Gestion();
        $gestion=Gestion::model()->findAll();
        
        $proyecto=new Proyecto();
      
        $nom_proyecto=array(
            "VERDE REAL",
            "ALTOS DEL TECAL ETAPAS  5 ABC",
            "ALTOS DEL TECAL ETAPA 6 Y 7",
            "TORRES DE VENECIA TORRE 1",
            "TORRES DE TOSCANA TORRE 4",
            "ALTOS DEL TECAL  COROTU ETAPA 13 Y 14 DERECHO",
            "NEW WEST FASE I",
            "SENDEROS FASE I",
            "ALTOS DEL TECAL COROTU ETAPA 13 Y 14 IZQUIERDO",
            "NEW WEST FASE II",
            "TORRES DE TOSCANA TORRE 3",
            "TORRES DE VENECIA - TORRE I",
        );
   
        $id='PROJ0001';
        $cliente=Customersview::model()->findAll('ID_PROYECTO=:ID_PROYECTO',
                               array(':ID_PROYECTO'=>$id));     

        $treinta = array();
        $sesenta = array();
        $noventa = array();
        $cientoveinte = array();
        foreach( $cliente as $rowt )
        {
             $treinta[] = $rowt['CARTERA_30_DIAS'];
        }
        //60 dias
        foreach( $cliente as $rows )
        {
             $sesenta[] = $rows['CARTERA_60_DIAS'];
        }
        //90 dias
        foreach( $cliente as $rown )
        {
             $noventa[] = $rown['CARTERA_90_DIAS'];
        }
        //120 dias
        foreach( $cliente as $rowv )
        {
             $cientoveinte[] = $rowv['CARTERA_120_DIAS'];
        }
      // var_dump($proyecto);die;
        
            $this->render('anillos',array(
                          'proyecto'=>$proyecto,
                          'gestion'=>$gestion,
                          'nom_proyecto'=>$nom_proyecto,
                          'treinta'=>$treinta,
                          'sesenta'=>$sesenta,
                          'noventa'=>$noventa,
                          'cientoveinte'=>$cientoveinte,
                      )    
                 );   
}

public function actionExpediente(){
        $proyecto=new Proyecto();
        $proyecto=Proyecto::model()->findAll(); 
      // var_dump($proyecto);die;
        
        
         $this->render('expediente');    
}
/**       public function listarVehiculosPorMarca($marca){
        $result = array();
        $rows = Yii::app()->db->createCommand()->select("v.placa, v.modelo, m.marca")->from("vehiculo v")
                ->leftjoin("modelos m","m.modelo = v.modelo")
                ->where("m.marca = :marca",array(":marca"=>$marca))
                ->queryAll();
        if($rows) foreach($rows as $row) $result[$row['placa']] = array("modelo"=>$row['modelo'], "marca"=>$row["marca"]);
        return $result;
        }*/
public function actionAcuerdos(){
       
        
       // $proyecto = Proyecto::model()->nombreproyectos();
    $proyecto=array(
        "VERDE REAL",
"ALTOS DEL TECAL ETAPAS  5 ABC",
"ALTOS DEL TECAL ETAPA 6 Y 7",
"TORRES DE VENECIA TORRE 1",
"TORRES DE TOSCANA TORRE 4",
"ALTOS DEL TECAL  COROTU ETAPA 13 Y 14 DERECHO",
"NEW WEST FASE I",
"SENDEROS FASE I",
"ALTOS DEL TECAL COROTU ETAPA 13 Y 14 IZQUIERDO",
"NEW WEST FASE II",
"TORRES DE TOSCANA TORRE 3",
"TORRES DE VENECIA - TORRE I",

        
    );
foreach($proyecto as $currentRow) {
    $pila = array($currentRow);
    array_push($pila, $currentRow);
  // echo $currentRow['titulo'];
 // print_r($pila);
}
       
  
     //    var_dump($pila);die;
           $gestion= new Gestion();
        $gestion = Gestion::model()->findAll();  
         $this->render('acuerdos',array(
                          'proyecto'=>$proyecto,
                          'gestion'=>$gestion,
                      )    
                 );    
}
	
	public function SendMail()
    {   
        $message            = new YiiMailMessage;
           //this points to the file test.php inside the view path
        $message->view = "test";
        $sid                 = 1;
        $criteria            = new CDbCriteria();
        $criteria->condition = "studentID=".$sid."";            
        $studModel1          = Student::model()->findByPk($sid);        
        $params              = array('myMail'=>$studModel1);
        $message->subject    = 'My TestSubject';
        $message->setBody($params, 'text/html');                
        $message->addTo('gabrielailarreta@gmail.com');
        $message->from = 'gilarreta@valorca.com';   
        Yii::app()->mail->send($message);       
    }
}