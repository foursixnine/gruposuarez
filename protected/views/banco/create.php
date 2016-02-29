<?php
$this->breadcrumbs=array(
	'Bancos'=>array('index'),
	'Create',
);

$this->menu=array(
array('label'=>'List Banco','url'=>array('index')),
array('label'=>'Manage Banco','url'=>array('admin')),
);
?>

<h1>Create Banco</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>