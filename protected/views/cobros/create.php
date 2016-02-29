<?php
$this->breadcrumbs=array(
	'Cobroses'=>array('index'),
	'Create',
);

$this->menu=array(
array('label'=>'List Cobros','url'=>array('index')),
array('label'=>'Manage Cobros','url'=>array('admin')),
);
?>

<h1>Create Cobros</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>