<?php
$this->breadcrumbs=array(
	'Pasos'=>array('index'),
	'Create',
);

$this->menu=array(
array('label'=>'List Paso','url'=>array('index')),
array('label'=>'Manage Paso','url'=>array('admin')),
);
?>

<h1>Create Paso</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>