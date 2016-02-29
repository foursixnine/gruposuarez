<?php
$this->breadcrumbs=array(
	'Carteras'=>array('index'),
	$model->id_cartera=>array('view','id'=>$model->id_cartera),
	'Update',
);

	$this->menu=array(
	array('label'=>'List Cartera','url'=>array('index')),
	array('label'=>'Create Cartera','url'=>array('create')),
	array('label'=>'View Cartera','url'=>array('view','id'=>$model->id_cartera)),
	array('label'=>'Manage Cartera','url'=>array('admin')),
	);
	?>

	<h1>Update Cartera <?php echo $model->id_cartera; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>