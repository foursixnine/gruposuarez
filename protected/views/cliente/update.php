<?php
$this->breadcrumbs=array(
	'Clientes'=>array('index'),
	$model->id_cliente_gs=>array('view','id'=>$model->id_cliente_gs),
	'Update',
);

	$this->menu=array(
	array('label'=>'List Cliente','url'=>array('index')),
	array('label'=>'Create Cliente','url'=>array('create')),
	array('label'=>'View Cliente','url'=>array('view','id'=>$model->id_cliente_gs)),
	array('label'=>'Manage Cliente','url'=>array('admin')),
	);
	?>

	<h1>Update Cliente <?php echo $model->id_cliente_gs; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>