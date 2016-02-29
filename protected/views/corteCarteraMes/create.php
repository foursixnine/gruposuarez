<?php
$this->breadcrumbs=array(
	'Corte Cartera Mes'=>array('index'),
	'Create',
);

$this->menu=array(
array('label'=>'List CorteCarteraMes','url'=>array('index')),
array('label'=>'Manage CorteCarteraMes','url'=>array('admin')),
);
?>

<h1>Create CorteCarteraMes</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>