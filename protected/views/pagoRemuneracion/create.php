<?php
$this->breadcrumbs=array(
	'Pago Remuneracions'=>array('index'),
	'Create',
);

$this->menu=array(
array('label'=>'Listar Plan de Remuneracion','url'=>array('index')),
array('label'=>'Administrar Plan de Remuneracion','url'=>array('admin')),
);
?>

<h1>Crear - Plan de Remuneraci&oacute;n</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model,
                                                'pago_remuneracion'=>$pago_remuneracion)); ?>