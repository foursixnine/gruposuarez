<?php
$this->breadcrumbs=array(
	'Razones Estados'=>array('index'),
	$model->id_razones_estado=>array('view','id'=>$model->id_razones_estado),
	'Update',
);

	$this->menu=array(
	array('label'=>'List RazonesEstado','url'=>array('index')),
	array('label'=>'Create RazonesEstado','url'=>array('create')),
	array('label'=>'View RazonesEstado','url'=>array('view','id'=>$model->id_razones_estado)),
	array('label'=>'Manage RazonesEstado','url'=>array('admin')),
	);
	?>

	<h1>Update RazonesEstado <?php echo $model->id_razones_estado; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>