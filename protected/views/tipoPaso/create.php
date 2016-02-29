<?php
$this->breadcrumbs=array(
	'Tipo Pasos'=>array('index'),
	'Create',
);

$this->menu=array(
array('label'=>'List TipoPaso','url'=>array('index')),
array('label'=>'Manage TipoPaso','url'=>array('admin')),
);
?>

<h1>Create TipoPaso</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>