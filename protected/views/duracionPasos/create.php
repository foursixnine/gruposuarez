<?php
$this->breadcrumbs=array(
	'Duracion Pasoses'=>array('index'),
	'Create',
);

$this->menu=array(
array('label'=>'List DuracionPasos','url'=>array('index')),
array('label'=>'Manage DuracionPasos','url'=>array('admin')),
);
?>

<h1>Create DuracionPasos</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>