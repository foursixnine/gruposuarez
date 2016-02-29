<?php
$this->breadcrumbs=array(
	'Expediente Fisicos'=>array('index'),
	$model->id_expediente_fisico=>array('view','id'=>$model->id_expediente_fisico),
	'Update',
);

	$this->menu=array(
	array('label'=>'List ExpedienteFisico','url'=>array('index')),
	array('label'=>'Create ExpedienteFisico','url'=>array('create')),
	array('label'=>'View ExpedienteFisico','url'=>array('view','id'=>$model->id_expediente_fisico)),
	array('label'=>'Manage ExpedienteFisico','url'=>array('admin')),
	);
	?>

	<h1>Update ExpedienteFisico <?php echo $model->id_expediente_fisico; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>