<?php
$this->breadcrumbs=array(
	'Pago Remuneracions'=>array('index'),
	$model->id_pago_remuneracion=>array('view','id'=>$model->id_pago_remuneracion),
	'Update',
);

	$this->menu=array(
	array('label'=>'List PagoRemuneracion','url'=>array('index')),
	array('label'=>'Create PagoRemuneracion','url'=>array('create')),
	array('label'=>'View PagoRemuneracion','url'=>array('view','id'=>$model->id_pago_remuneracion)),
	array('label'=>'Manage PagoRemuneracion','url'=>array('admin')),
	);
	?>

	<h1>Update PagoRemuneracion <?php echo $model->id_pago_remuneracion; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>