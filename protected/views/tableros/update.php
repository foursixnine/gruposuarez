<?php
$this->breadcrumbs=array(
	'Tableroses'=>array('index'),
	$model->id_tablero=>array('view','id'=>$model->id_tablero),
	'Update',
);

	$this->menu=array(
	array('label'=>'List Tableros','url'=>array('index')),
	array('label'=>'Create Tableros','url'=>array('create')),
	array('label'=>'View Tableros','url'=>array('view','id'=>$model->id_tablero)),
	array('label'=>'Manage Tableros','url'=>array('admin')),
	);
	?>

	<h1>Update Tableros <?php echo $model->id_tablero; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>