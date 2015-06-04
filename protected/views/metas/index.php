<?php
$this->breadcrumbs=array(
	'Metas',
);

$this->menu=array(
array('label'=>'Create Metas','url'=>array('create')),
array('label'=>'Manage Metas','url'=>array('admin')),
);
?>

<h1>METAS</h1>

<?php $this->widget('booster.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'carteravencida',
)); ?>
