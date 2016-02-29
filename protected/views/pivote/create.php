<?php
$this->breadcrumbs=array(
	'Pivotes'=>array('index'),
	'Create',
);

$this->menu=array(
array('label'=>'List Pivote','url'=>array('index')),
array('label'=>'Manage Pivote','url'=>array('admin')),
);
?>

<h1>Create Pivote</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>