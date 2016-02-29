<?php
$this->breadcrumbs=array(
	'Pagos'=>array('index'),
	'Create',
);

$this->menu=array(
array('label'=>'List Pago','url'=>array('index')),
array('label'=>'Manage Pago','url'=>array('admin')),
);
?>

<h1>Create Pago</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>