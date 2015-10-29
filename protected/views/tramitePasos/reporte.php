
<?php
$this->breadcrumbs=array(
	'Tramite Pasoses'=>array('index'),
	'Manage',
);

$this->menu=array(
array('label'=>'Volver','url'=>array('tramite/admin')),
array('label'=>'Exportar y Descargar','url'=>array('excelreporte')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
$('.search-form').toggle();
return false;
});
$('.search-form form').submit(function(){
$.fn.yiiGridView.update('tramite-pasos-grid', {
data: $(this).serialize()
});
return false;
});
");
?>
<br/>
<br/>
<br/>
<br/>
<br/><br/>
<button type="button" class="btn btn-warning">REPORTE DE TRAMITES </button>

<?php $this->widget('booster.widgets.TbGridView',array(
'id'=>'tramite-pasos-grid',
'dataProvider'=>$model->reporteexcel(),
'filter'=>$model,
'columns'=>array(

	/*	array(
			'name'=>'id_crm_proyecto',
			'header'=>'Proyecto',
			'value'=> 'CHtml::encode($data->idCrmProyecto["titulo"])',
			'filter'=>CHtml::listData(Proyecto::model()->findAll(), 'id_crm_proyecto', 'titulo'),
		),*/
		'idClienteGs.proyecto',
		'idClienteGs.numero_de_lote',
		'idClienteGs.nombre_de_empresa',
		'idClienteGs.total_venta',
		'idClienteGs.monto_liquidacion',
		'idClienteGs.banco_acreedor',
		'idTramite.num_escritura',	
		'idTramite.num_finca_inscrita',
		'idTramite.transferencia_inmueble',
		'idTramite.num_permiso_ocupacion',
		'idTramite.num_formulario',	
		array(
			'name'=>'id_paso',
			'header'=>'Pasos',
			'value'=> 'CHtml::encode($data->idPaso["abrev"])',
			'filter'=>CHtml::listData(Paso::model()->findAll(), 'id_paso', 'abrev'),
		),
				
),
)); 
            
?>

