<?php
$this->breadcrumbs=array(
	'Pasos'=>array('index'),
	$model->id_paso=>array('view','id'=>$model->id_paso),
	'Update',
);

	$this->menu=array(
	array('label'=>'List Paso','url'=>array('index')),
	array('label'=>'Create Paso','url'=>array('create')),
	array('label'=>'View Paso','url'=>array('view','id'=>$model->id_paso)),
	array('label'=>'Manage Paso','url'=>array('admin')),
	);
	?>

	<h1>Update Paso <?php echo $model->id_paso; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>