<?php
$this->breadcrumbs=array(
	'Clientes',
);

$this->menu=array(
array('label'=>'Volver','url'=>array('gestion/index')),
array('label'=>'Manage Clientes','url'=>array('admin')),
);
?>

<h1>Clientes</h1>

<?php $this->widget('booster.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
