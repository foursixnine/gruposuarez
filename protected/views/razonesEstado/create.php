<?php
$this->breadcrumbs=array(
	'Razones Estados'=>array('index'),
	'Create',
);

$this->menu=array(
array('label'=>'List RazonesEstado','url'=>array('index')),
array('label'=>'Manage RazonesEstado','url'=>array('admin')),
);
?>

<h1>Create RazonesEstado</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>