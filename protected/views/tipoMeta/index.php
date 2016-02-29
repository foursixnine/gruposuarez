<?php
$this->breadcrumbs=array(
	'Tipo Metas',
);

$this->menu=array(
array('label'=>'Create TipoMeta','url'=>array('create')),
array('label'=>'Manage TipoMeta','url'=>array('admin')),
);
?>

<h1>Tipo Metas</h1>

<?php $this->widget('booster.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
