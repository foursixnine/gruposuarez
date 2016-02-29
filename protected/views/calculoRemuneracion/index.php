<?php
$this->breadcrumbs=array(
	'Calculo Remuneracion',
);

$this->menu=array(
array('label'=>'Create calculoRemuneracion','url'=>array('create')),
array('label'=>'Manage calculoRemuneracion','url'=>array('admin')),
);
?>

<h2 class="titulo">Calculo Remuneracion</h2>

<?php $this->widget('booster.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
