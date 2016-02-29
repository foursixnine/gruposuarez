<?php
$this->breadcrumbs=array(
	'Pivotes',
);

$this->menu=array(
array('label'=>'Create Pivote','url'=>array('create')),
array('label'=>'Manage Pivote','url'=>array('admin')),
);
?>

<h1>Pivotes</h1>

<?php $this->widget('booster.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
