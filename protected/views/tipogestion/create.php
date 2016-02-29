<?php
$this->breadcrumbs=array(
	'Tipogestions'=>array('index'),
	'Create',
);

$this->menu=array(
array('label'=>'List Tipogestion','url'=>array('index')),
array('label'=>'Manage Tipogestion','url'=>array('admin')),
);
?>

<h1>Create Tipogestion</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>