<?php
$this->breadcrumbs=array(
	'Acuerdo Cobroses'=>array('index'),
	$model->id_acuerdo_cobros=>array('view','id'=>$model->id_acuerdo_cobros),
	'Update',
);

	$this->menu=array(
	array('label'=>'List AcuerdoCobros','url'=>array('index')),
	array('label'=>'Create AcuerdoCobros','url'=>array('create')),
	array('label'=>'View AcuerdoCobros','url'=>array('view','id'=>$model->id_acuerdo_cobros)),
	array('label'=>'Manage AcuerdoCobros','url'=>array('admin')),
	);
	?>

	<h1>Update AcuerdoCobros <?php echo $model->id_acuerdo_cobros; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>