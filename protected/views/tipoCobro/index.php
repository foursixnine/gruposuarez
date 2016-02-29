<?php
$this->breadcrumbs=array(
	'Tipo Cobros',
);

$this->menu=array(
array('label'=>'Create TipoCobro','url'=>array('create')),
array('label'=>'Manage TipoCobro','url'=>array('admin')),
);
?>

<h1>Tipo Cobros</h1>

<?php $this->widget('booster.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
