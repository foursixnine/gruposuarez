<?php
$this->breadcrumbs=array(
	'Pasos',
);

$this->menu=array(
array('label'=>'Create Paso','url'=>array('create')),
array('label'=>'Manage Paso','url'=>array('admin')),
);
?>

<h1>Pasos</h1>

<?php $this->widget('booster.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
