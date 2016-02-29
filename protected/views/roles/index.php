<?php
$this->breadcrumbs=array(
	'Roles',
);

$this->menu=array(
array('label'=>'Create Roles','url'=>array('create')),
array('label'=>'Manage Roles','url'=>array('admin')),
);
?>

<h1>Roles</h1>

<?php $this->widget('booster.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
