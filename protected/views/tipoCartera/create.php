<?php
$this->breadcrumbs=array(
	'Tipo Carteras'=>array('index'),
	'Create',
);

$this->menu=array(
array('label'=>'List TipoCartera','url'=>array('index')),
array('label'=>'Manage TipoCartera','url'=>array('admin')),
);
?>

<h1>Create TipoCartera</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>