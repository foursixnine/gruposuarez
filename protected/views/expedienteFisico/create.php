<?php
$this->breadcrumbs=array(
	'Expediente Fisicos'=>array('index'),
	'Create',
);

$this->menu=array(
array('label'=>'List ExpedienteFisico','url'=>array('index')),
array('label'=>'Manage ExpedienteFisico','url'=>array('admin')),
);
?>

<h1>Create ExpedienteFisico</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>