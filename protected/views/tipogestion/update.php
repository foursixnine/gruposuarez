<?php
$this->breadcrumbs=array(
	'Tipogestions'=>array('index'),
	$model->id_tipo_gestion=>array('view','id'=>$model->id_tipo_gestion),
	'Update',
);

	$this->menu=array(
	array('label'=>'List Tipogestion','url'=>array('index')),
	array('label'=>'Create Tipogestion','url'=>array('create')),
	array('label'=>'View Tipogestion','url'=>array('view','id'=>$model->id_tipo_gestion)),
	array('label'=>'Manage Tipogestion','url'=>array('admin')),
	);
	?>

	<h1>Update Tipogestion <?php echo $model->id_tipo_gestion; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>