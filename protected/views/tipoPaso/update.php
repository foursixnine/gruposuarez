<?php
$this->breadcrumbs=array(
	'Tipo Pasos'=>array('index'),
	$model->id_tipo_paso=>array('view','id'=>$model->id_tipo_paso),
	'Update',
);

	$this->menu=array(
	array('label'=>'List TipoPaso','url'=>array('index')),
	array('label'=>'Create TipoPaso','url'=>array('create')),
	array('label'=>'View TipoPaso','url'=>array('view','id'=>$model->id_tipo_paso)),
	array('label'=>'Manage TipoPaso','url'=>array('admin')),
	);
	?>

	<h1>Update TipoPaso <?php echo $model->id_tipo_paso; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>