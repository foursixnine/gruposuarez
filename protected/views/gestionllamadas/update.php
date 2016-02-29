<?php
$this->breadcrumbs=array(
	'Gestionllamadases'=>array('index'),
	$model->id_gestion_llamadas=>array('view','id'=>$model->id_gestion_llamadas),
	'Update',
);

	$this->menu=array(
	array('label'=>'List Gestionllamadas','url'=>array('index')),
	array('label'=>'Create Gestionllamadas','url'=>array('create')),
	array('label'=>'View Gestionllamadas','url'=>array('view','id'=>$model->id_gestion_llamadas)),
	array('label'=>'Manage Gestionllamadas','url'=>array('admin')),
	);
	?>

	<h1>Update Gestionllamadas <?php echo $model->id_gestion_llamadas; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>