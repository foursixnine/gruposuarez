<?php
$this->breadcrumbs=array(
	'Acuerdo Cobroses'=>array('index'),
	'Create',
);

$this->menu=array(
array('label'=>'List AcuerdoCobros','url'=>array('index')),
array('label'=>'Manage AcuerdoCobros','url'=>array('admin')),
);
?>

<h1>Create AcuerdoCobros</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>