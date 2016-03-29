<?php
$this->breadcrumbs=array(
	'Gestion Seguimientos'=>array('index'),
	$model->id_gestion_seguimiento=>array('view','id'=>$model->id_gestion_seguimiento),
	'Update',
);

	$this->menu=array(
	array('label'=>'List GestionSeguimiento','url'=>array('index')),
	array('label'=>'Create GestionSeguimiento','url'=>array('create')),
	array('label'=>'View GestionSeguimiento','url'=>array('view','id'=>$model->id_gestion_seguimiento)),
	array('label'=>'Manage GestionSeguimiento','url'=>array('admin')),
	);
	?>

	<h1>Update GestionSeguimiento <?php echo $model->id_gestion_seguimiento; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>