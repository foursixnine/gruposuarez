<?php
$this->breadcrumbs=array(
	'Pago Remuneracions',
);

$this->menu=array(
array('label'=>'Crear - Plan de Remuneracion','url'=>array('create')),
array('label'=>'Administrar - Plan de Remuneracion','url'=>array('admin')),
);
?>

<h1>Pago de Remuneraci&oacute;n</h1>

<?php $this->widget('booster.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
