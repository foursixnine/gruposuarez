<?php
$this->breadcrumbs=array(
	'Tramite Actividads'=>array('index'),
	$model->id_tramite_actividad=>array('view','id'=>$model->id_tramite_actividad),
	'Update',
);

	$this->menu=array(
	array('label'=>'List TramiteActividad','url'=>array('index')),
	array('label'=>'Create TramiteActividad','url'=>array('create')),
	array('label'=>'View TramiteActividad','url'=>array('view','id'=>$model->id_tramite_actividad)),
	array('label'=>'Manage TramiteActividad','url'=>array('admin')),
	);
	?>

	<h1>Update TramiteActividad <?php echo $model->id_tramite_actividad; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>