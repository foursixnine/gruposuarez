<?php
$this->breadcrumbs=array(
	'Cobroses'=>array('index'),
	$model->id_cobros=>array('view','id'=>$model->id_cobros),
	'Update',
);

	$this->menu=array(
	array('label'=>'List Cobros','url'=>array('index')),
	array('label'=>'Create Cobros','url'=>array('create')),
	array('label'=>'View Cobros','url'=>array('view','id'=>$model->id_cobros)),
	array('label'=>'Manage Cobros','url'=>array('admin')),
	);
	?>

	<h1>Update Cobros <?php echo $model->id_cobros; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>