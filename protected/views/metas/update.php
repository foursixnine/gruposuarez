<?php
$this->breadcrumbs=array(
	'Metases'=>array('index'),
	$model->id_meta=>array('view','id'=>$model->id_meta),
	'Update',
);

	$this->menu=array(
	array('label'=>'List Metas','url'=>array('index')),
	array('label'=>'Create Metas','url'=>array('create')),
	array('label'=>'View Metas','url'=>array('view','id'=>$model->id_meta)),
	array('label'=>'Manage Metas','url'=>array('admin')),
	);
	?>

	<h1>Update Metas <?php echo $model->id_meta; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>