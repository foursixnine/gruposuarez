<?php
$this->breadcrumbs=array(
	'Proyectos'=>array('index'),
	$model->id_crm_proyecto=>array('view','id'=>$model->id_crm_proyecto),
	'Update',
);

	$this->menu=array(
	array('label'=>'List Proyecto','url'=>array('index')),
	array('label'=>'Create Proyecto','url'=>array('create')),
	array('label'=>'View Proyecto','url'=>array('view','id'=>$model->id_crm_proyecto)),
	array('label'=>'Manage Proyecto','url'=>array('admin')),
	);
	?>

	<h1>Update Proyecto <?php echo $model->id_crm_proyecto; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>