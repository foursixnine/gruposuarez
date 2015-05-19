<?php
$this->breadcrumbs=array(
	'Clientes'=>array('index'),
	$model->id_cliente,
);

$this->menu=array(
array('label'=>'Listar Clientes','url'=>array('index')),
array('label'=>'Crear Clientes','url'=>array('create')),
array('label'=>'Actualizar Clientes','url'=>array('update','id'=>$model->id_cliente)),
array('label'=>'Eliminar Clientes','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id_cliente),'confirm'=>'Are you sure you want to delete this item?')),
array('label'=>'Administrar Clientes','url'=>array('admin')),
);
?>
<h1>Datos Cliente: #<?php echo $model->id_cliente;?> </h1> 
<h3><strong>PROYECTO  </strong><?php echo $model->idProyecto->titulo; ?></h3>


<?php 

$this->widget('booster.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'id_gruposuarez',
		'cedula',
		'nom_cliente',
		'ape_cliente',
		'fe_cumpleannos',
		'direccion',
		'telefono',
		'celular',
		'correo',
		'telefono2',
		'id_cliente',
		'id_status',
		'ocupacion',
		'id_ciudad',
		'fax',
		'ruc',
		'estado_civil',
		'nacionalidad',
		'sexo',
		'lugar_trabajo',
    	array(
            'label'=>'Proyecto',
            'value'=>$model->idProyecto->titulo,
        )
),
)); 
?>


