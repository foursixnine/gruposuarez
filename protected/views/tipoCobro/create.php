<?php
$this->breadcrumbs=array(
	'Tipo Cobros'=>array('index'),
	'Create',
);

$this->menu=array(
array('label'=>'List TipoCobro','url'=>array('index')),
array('label'=>'Manage TipoCobro','url'=>array('admin')),
);
?>

<h1>Create TipoCobro</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>