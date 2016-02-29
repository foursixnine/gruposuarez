<?php
$this->breadcrumbs=array(
	'Calculo Remuneracions'=>array('index'),
	$model->id_calculo_remuneracion=>array('view','id'=>$model->id_calculo_remuneracion),
	'Update',
);

	$this->menu=array(
	array('label'=>'List calculoRemuneracion','url'=>array('index')),
	array('label'=>'Create calculoRemuneracion','url'=>array('create')),
	array('label'=>'View calculoRemuneracion','url'=>array('view','id'=>$model->id_calculo_remuneracion)),
	array('label'=>'Manage calculoRemuneracion','url'=>array('admin')),
	);
	?>

	<h1>Update calculoRemuneracion <?php echo $model->id_calculo_remuneracion; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>