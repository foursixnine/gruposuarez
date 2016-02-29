<?php
$this->breadcrumbs=array(
	'Pagos',
);

$this->menu=array(
array('label'=>'Create Pago','url'=>array('create')),
array('label'=>'Manage Pago','url'=>array('admin')),
);
?>

<h1>Pagos</h1>

<?php $this->widget('booster.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
