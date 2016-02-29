<?php
$this->breadcrumbs=array(
	'Pago Remuneracions',
);

$this->menu=array(
array('label'=>'Create PagoRemuneracion','url'=>array('create')),
array('label'=>'Manage PagoRemuneracion','url'=>array('admin')),
);
?>

<h1>Pago Remuneracions</h1>

<?php $this->widget('booster.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
