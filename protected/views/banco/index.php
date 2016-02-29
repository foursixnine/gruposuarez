<?php
$this->breadcrumbs=array(
	'Bancos',
);

$this->menu=array(
array('label'=>'Create Banco','url'=>array('create')),
array('label'=>'Manage Banco','url'=>array('admin')),
);
?>

<h1>Bancos</h1>

<?php $this->widget('booster.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
