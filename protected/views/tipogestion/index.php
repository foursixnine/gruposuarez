<?php
$this->breadcrumbs=array(
	'Tipogestions',
);

$this->menu=array(
array('label'=>'Create Tipogestion','url'=>array('create')),
array('label'=>'Manage Tipogestion','url'=>array('admin')),
);
?>

<h1>Tipogestions</h1>

<?php $this->widget('booster.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
