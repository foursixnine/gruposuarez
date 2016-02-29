<?php
$this->breadcrumbs=array(
	'Carteras'=>array('index'),
	'Create',
);

$this->menu=array(
array('label'=>'List Cartera','url'=>array('index')),
array('label'=>'Manage Cartera','url'=>array('admin')),
);
?>

<h1>Create Cartera</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>