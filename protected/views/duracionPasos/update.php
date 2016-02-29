<?php
$this->breadcrumbs=array(
	'Duracion Pasoses'=>array('index'),
	$model->id_duracion_paso=>array('view','id'=>$model->id_duracion_paso),
	'Update',
);

	$this->menu=array(
	array('label'=>'List DuracionPasos','url'=>array('index')),
	array('label'=>'Create DuracionPasos','url'=>array('create')),
	array('label'=>'View DuracionPasos','url'=>array('view','id'=>$model->id_duracion_paso)),
	array('label'=>'Manage DuracionPasos','url'=>array('admin')),
	);
	?>

	<h1>Update DuracionPasos <?php echo $model->id_duracion_paso; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>