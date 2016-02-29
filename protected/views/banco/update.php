<?php
$this->breadcrumbs=array(
	'Bancos'=>array('index'),
	$model->id_banco=>array('view','id'=>$model->id_banco),
	'Update',
);

	$this->menu=array(
	array('label'=>'List Banco','url'=>array('index')),
	array('label'=>'Create Banco','url'=>array('create')),
	array('label'=>'View Banco','url'=>array('view','id'=>$model->id_banco)),
	array('label'=>'Manage Banco','url'=>array('admin')),
	);
	?>

	<h1>Update Banco <?php echo $model->id_banco; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>