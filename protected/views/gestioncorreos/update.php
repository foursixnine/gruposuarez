<?php
$this->breadcrumbs=array(
	'Gestioncorreoses'=>array('index'),
	$model->id_gestion_correos=>array('view','id'=>$model->id_gestion_correos),
	'Update',
);

	$this->menu=array(
	array('label'=>'List Gestioncorreos','url'=>array('index')),
	array('label'=>'Create Gestioncorreos','url'=>array('create')),
	array('label'=>'View Gestioncorreos','url'=>array('view','id'=>$model->id_gestion_correos)),
	array('label'=>'Manage Gestioncorreos','url'=>array('admin')),
	);
	?>

	<h1>Update Gestioncorreos <?php echo $model->id_gestion_correos; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>