<?php
$this->breadcrumbs=array(
	'Corte Cartera Mes'=>array('index'),
	$model->id_corte_cartera_mes=>array('view','id'=>$model->id_corte_cartera_mes),
	'Update',
);

	$this->menu=array(
	array('label'=>'List CorteCarteraMes','url'=>array('index')),
	array('label'=>'Create CorteCarteraMes','url'=>array('create')),
	array('label'=>'View CorteCarteraMes','url'=>array('view','id'=>$model->id_corte_cartera_mes)),
	array('label'=>'Manage CorteCarteraMes','url'=>array('admin')),
	);
	?>

	<h1>Update CorteCarteraMes <?php echo $model->id_corte_cartera_mes; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>