<?php
$this->breadcrumbs=array(
	'Pago Remuneracions'=>array('index'),
	'Create',
);

$this->menu=array(
array('label'=>'List PagoRemuneracion','url'=>array('index')),
array('label'=>'Manage PagoRemuneracion','url'=>array('admin')),
);
?>

<h1>Crear Plan de Bono</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>