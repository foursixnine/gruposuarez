<?php
$this->breadcrumbs=array(
	'Cumplimiento Gestions',
);

$this->menu=array(
array('label'=>'Create CumplimientoGestion','url'=>array('create')),
array('label'=>'Manage CumplimientoGestion','url'=>array('admin')),
);
?>

<h1>Cumplimiento Gestions</h1>

<?php $this->widget('booster.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
