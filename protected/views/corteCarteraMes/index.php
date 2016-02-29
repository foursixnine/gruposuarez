<?php
$this->breadcrumbs=array(
	'Corte Cartera Mes',
);

$this->menu=array(
array('label'=>'Create CorteCarteraMes','url'=>array('create')),
array('label'=>'Manage CorteCarteraMes','url'=>array('admin')),
);
?>

<h1>Corte Cartera Mes</h1>

<?php $this->widget('booster.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
