<?php
$this->breadcrumbs=array(
	'Pivotes'=>array('index'),
	$model->id_calculo_vencidad=>array('view','id'=>$model->id_calculo_vencidad),
	'Update',
);

	$this->menu=array(
	array('label'=>'List Pivote','url'=>array('index')),
	array('label'=>'Create Pivote','url'=>array('create')),
	array('label'=>'View Pivote','url'=>array('view','id'=>$model->id_calculo_vencidad)),
	array('label'=>'Manage Pivote','url'=>array('admin')),
	);
	?>

	<h1>Update Pivote <?php echo $model->id_calculo_vencidad; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>