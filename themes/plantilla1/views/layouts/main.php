<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo Yii::app()->language;?>" lang="<?php echo Yii::app()->language;?>" dir="ltr">
<head profile="http://gmpg.org/xfn/11">
<title><?php echo CHtml::encode($this->pageTitle).' - '.Yii::app()->params['empresa']; ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=<?php echo Yii::app()->charset;?>" />
<meta http-equiv="imagetoolbar" content="no" />
<link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/layout.css" type="text/css" />
</head>
<body id="top">
        
<div class="wrapper col1">
  <div id="header" class="clear">
    <div class="fl_left">
      <h1><?php //echo CHtml::link(CHtml::encode(Yii::app()->name),Yii::app()->baseUrl);?></h1>
      <p><?php //echo Yii::app()->params['empresa']; 
	  echo CHtml::image(Yii::app()->theme->baseUrl."/images/demo/logo1.png");
       echo Yii::app()->request->baseUrl."images/logo.png";
         ?>      
      </p>
    </div>
	<div style="text-align:right">

	</div>
	
    <div class="text-align:right"><a href="#"><?php //echo CHtml::image(Yii::app()->theme->baseUrl."/images/demo/gsuarezlogo.png");?></a></div>
  </div>
</div>

<!-- ####################################################################################################### -->

<?php 
$user=Yii::app()->user->id;
if($user!=""){
 
?>
<div class="wrapper col1">
  <div id="topbar" class="clear">
    <?php $this->widget('zii.widgets.CMenu',array(
			'items'=>array(
				array('label'=>'INICIO', 'url'=>array('/site/index')),
                                array('label'=>'COBROS', 'url'=>array('/gestion')),
                  
				array('label'=>'METAS', 'url'=>array('/metas/indexmetas'),
							'items'=>array(
								array('label'=>'Nuevo', 'url'=>array('/metas/create')),
								array('label'=>'Administrar', 'url'=>array('/metas/admin')),
								array('label'=>'Listado', 'url'=>array('/metas/index')),
							)
                                ),
        
  //                              array('label'=>'REMUNERACION', 'url'=>array('/calculoRemuneracion/calculoremunecacioncobradora')),
              array('label'=>'REMUNERACIÓN', 'url'=>array('/calculoRemuneracion/calculoremunecacioncobradora'),
              'items'=>array(
                      array('label'=>'Bonos', 'url'=>array('/PagoRemuneracion/index')),
                       array('label'=>'CÁLCULO DE REMUNERACIÓN COBRADORA', 'url'=>array('/calculoRemuneracion/calculoremunecacioncobradora')),
                                                            
                            )
                                ),
             


              array('label'=>'TRAMITES', 'url'=>array('/tramite/index'),
							'items'=>array(
								array('label'=>'Administrar Tramites', 'url'=>array('/tramite/admin')),
                array('label'=>'Tramites en Transito', 'url'=>array('/tramite/continuartramites')),
                array('label'=>'Tramites Liquidados', 'url'=>array('/tramite/tramitesliquidados')),
                array('label'=>'Administración de Pasos', 'url'=>array('/duracionPasos/')),
							)
                                ),
                             
                          
				
                             array('label'=>'TABLEROS', 'url'=>array('/tableros/')),
                  array('label'=>'ADMINISTRACION', 'url'=>array('/usuarios/inicio'),
              'items'=>array(
                array('label'=>'Usuarios', 'url'=>array('/usuarios/create')),             
                                                                array('label'=>'Duracion Pasos', 'url'=>array('/duracionPasos/index')),
              )
                                ),
                               // array('label'=>'Usuarios', 'url'=>array('/usuarios/index')),
				array('label'=>'INICIAR SESIÓN', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
				array('label'=>'CERRAR SESION ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest)
			),
			'id'=>'topnav',
		));

}else{

?>	
<div class="wrapper col1">
  <div id="topbar" class="clear">
    <?php $this->widget('zii.widgets.CMenu',array(
      'items'=>array(
        array('label'=>'INICIAR SESIÓN', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
        array('label'=>'CERRAR SESION ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest)
      ),
      'id'=>'topnav',
    ));
  }
?>
  </div>
</div>
<!-- ####################################################################################################### -->
<div class="wrapper col2">
  <div id="container" class="clear">
    <!-- ####################################################################################################### -->
      	<?php if(isset($this->breadcrumbs)):?>
		<?php $this->widget('zii.widgets.CBreadcrumbs', array(
			'links'=>$this->breadcrumbs,
		)); ?><!-- breadcrumbs -->
	<?php endif?>
	
	<div class='info' style='text-align:left;'>
		<?php
		$flashMessages = Yii::app()->user->getFlashes();
		if($flashMessages){
			foreach($flashMessages as $key => $message){
				echo '<div class="flash-' . $key . '">' . $message . "</div>\n";
			}
		}
	?>
	</div>
	<?php echo $content; ?>
    <!-- ####################################################################################################### -->
  </div>
</div>

<div class="wrapper">
  <div id="footer" class="clear">
    <div class="footbox">
        <h2>Misi&oacute;n</h2>
      <p>
    Construimos y promovemos viviendas uniendo innovación, calidad, personal calificado, trabajo en equipo, servicio y 
    tecnología de punta, con el fin de satisfacer las necesidades de nuestros clientes, 
    del mercado inmobiliario y de nuestros colaboradores..          
      </p>
      
    </div>
    <div class="footbox">
        <h2>Visi&oacute;n</h2>
      <p>
          Ser una de las empresas l&iacute;deres en construcción y promoción de viviendas, reconocida por su capacidad, 
      calidad y cumplimiento al utilizar métodos innovadores que permitan desarrollar viviendas más confortables, de mayor calidad y 
      que proporcionen un mejor estándar de vida a aquellas familias que confían en nosotros..    
          
      </p>
    </div>
    <div class="footbox">
      <h2>Valores</h2>
      <ul>
        <li>Integridad</a></li>
        <li>Trabajo en Equipo</li>
        <li>Vocación por el Servicio</li>
        <li>Sentido de responsabilidad y pertenencia</li>
        <li>Compromiso</li>
        <li>Trabajo y Esfuerzo</li>
        <li>Orientación a Resultados</li>
        <li>Profesionalismo</li>
        <li class="last">Honestidad</li>
        <li class="last">Respeto por las personas y las normas </li>
      </ul>
    </div>
    <div class="footbox last">
      
      <h2>Contacto:</h2>
      <ul>
          <strong class="title">Direcci&oacute;n:</strong><br />
        <li><p>
         Vía España, Edificio PH Los Toneles, planta baja.
        </p></li>  
          <li><strong class="title">Tel&eacute;fono:</strong><br />
            366-7300</li>
        <li><strong class="title">Email:</strong><br />
          <a href="#">soporte@gsuarez.com</a></li>
      </ul>
    </div>
  </div>
</div>
 
<div class="wrapper">
  <div id="copyright" class="clear">
    <p class="fl_left">Copyright &copy; <?php echo date('Y'); ?> <a href="http://valorca.com">Valor Technology</a> |  All Rights Reserved.</p>
    <p class="fl_right"><a href="#" title=""></a></p>
  </div>
</div>
</body>
</html>
			
<?php
// Efecto para el div de Mensajes Flash
Yii::app()->clientScript->registerScript(
   'myHideEffect',
   '$(".info").animate({opacity: 1.0}, 1000000).slideUp("slow");',
   CClientScript::POS_READY
);
?>