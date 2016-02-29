<?php
$this->breadcrumbs=array(
	'Tramites'=>array('index'),
	$model->id_tramite=>array('view','id'=>$model->id_tramite),
	'Update',
);

	$this->menu=array(
	array('label'=>'List Tramite','url'=>array('index')),
	array('label'=>'Create Tramite','url'=>array('create')),
	array('label'=>'View Tramite','url'=>array('view','id'=>$model->id_tramite)),
	array('label'=>'Manage Tramite','url'=>array('admin')),
	);
	?>

	<h1>Update Tramite <?php echo $model->id_tramite; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>