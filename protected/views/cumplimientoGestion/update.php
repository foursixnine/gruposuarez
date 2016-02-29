<?php
$this->breadcrumbs=array(
	'Cumplimiento Gestions'=>array('index'),
	$model->id_cumplimiento=>array('view','id'=>$model->id_cumplimiento),
	'Update',
);

	$this->menu=array(
	array('label'=>'List CumplimientoGestion','url'=>array('index')),
	array('label'=>'Create CumplimientoGestion','url'=>array('create')),
	array('label'=>'View CumplimientoGestion','url'=>array('view','id'=>$model->id_cumplimiento)),
	array('label'=>'Manage CumplimientoGestion','url'=>array('admin')),
	);
	?>

	<h1>Update CumplimientoGestion <?php echo $model->id_cumplimiento; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>