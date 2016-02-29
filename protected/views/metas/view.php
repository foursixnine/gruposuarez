<?php
$this->breadcrumbs=array(
	'Metases'=>array('index'),
	$model->id_meta,
);

$this->menu=array(
array('label'=>'Listar Metas','url'=>array('index')),
array('label'=>'Crear Metas','url'=>array('create')),
//array('label'=>'U Metas','url'=>array('update','id'=>$model->id_meta)),
array('label'=>'Eliminar Meta','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id_meta),'confirm'=>'Esta seguro que desea borrar esta meta?')),
array('label'=>'Administrar Metas','url'=>array('admin')),
    array('label'=>'Actualizar Meta','url'=>array('metas/updatemetames','id'=>$model->id_meta)),
   // 'url'=>'Yii::app()->createUrl("metas/updatemetames", array("id"=>$data->id_meta))',
);
?>


<button type="button" class="btn btn-warning">VER META</button>


<?php $this->widget('booster.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'idCrmProyecto.titulo',
		'monto',
		'porcentaje_meta',
		'monto_mes_proyecto',
		'id_usuario',
		'mes0.descripcion',
		'idTipoMeta.descripcion',
),
)); ?>
