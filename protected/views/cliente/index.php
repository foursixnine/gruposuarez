<?php
$this->breadcrumbs=array(
	'Clientes',
);

$this->menu=array(
array('label'=>'Create Cliente','url'=>array('create')),
array('label'=>'Manage Cliente','url'=>array('admin')),
);
?>

<br/>
<button type="button" class="btn btn-warning">CLIENTE</button>
<br/>

<?php $this->widget('booster.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
