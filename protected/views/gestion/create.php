<?php
$this->breadcrumbs=array(
	'Gestions'=>array('index'),
	'Create',
);

$this->menu=array(

array('label'=>'Volver','url'=>'../index'),    
);
?>

<h1>Gesti&oacute;n de Clientes</h1>
    <p class="help-block">Los campos con <span class="required">*</span> son requeridos.</p>
<?php echo $this->renderPartial('_form', array('model'=>$model,
                                               'cliente'=>$cliente,
                                               'fecha_acuerdo'=>$fecha_acuerdo,
                                               'cartera'=>$cartera, 
)); ?>