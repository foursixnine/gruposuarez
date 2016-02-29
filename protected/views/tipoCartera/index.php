<?php
$this->breadcrumbs=array(
	'Tipo Carteras',
);

$this->menu=array(
array('label'=>'Create TipoCartera','url'=>array('create')),
array('label'=>'Manage TipoCartera','url'=>array('admin')),
);
?>

<h1>Tipo Carteras</h1>

<?php $this->widget('booster.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
