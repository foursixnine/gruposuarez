<?php
$this->breadcrumbs=array(
	'Calculo Remuneracions',
);

$this->menu=array(
array('label'=>'Create calculoRemuneracion','url'=>array('create')),
array('label'=>'Manage calculoRemuneracion','url'=>array('admin')),
);
?>

<h1>Calculo Remuneracions</h1>

<?php $this->widget('booster.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
