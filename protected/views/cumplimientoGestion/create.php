<?php
$this->breadcrumbs=array(
	'Cumplimiento Gestions'=>array('index'),
	'Create',
);

$this->menu=array(
array('label'=>'List CumplimientoGestion','url'=>array('index')),
array('label'=>'Manage CumplimientoGestion','url'=>array('admin')),
);
?>

<h1>Create CumplimientoGestion</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>