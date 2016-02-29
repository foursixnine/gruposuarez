<?php
$this->breadcrumbs=array(
	'Carteras',
);

$this->menu=array(
array('label'=>'Create Cartera','url'=>array('create')),
array('label'=>'Manage Cartera','url'=>array('admin')),
);
?>

<h1>Carteras</h1>

<?php $this->widget('booster.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
