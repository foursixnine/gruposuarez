
<?php
$this->breadcrumbs=array(
	'Tramites'=>array('tramite/index'),
	'Reporte Paso a Paso',
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

<br/><br/>


<br/>
<br/><br/>
<button type="button" class="btn btn-warning">REPORTE PASO A PASO</button>

<?php $this->widget('booster.widgets.TbGridView',array(
'id'=>'tramite-pasos-grid',
'dataProvider'=>$model->reporteexcel(),
'filter'=>$model,
//'afterAjaxUpdate' => 'reinstallDatePicker', // (#1)
'columns'=>array(
        array('name'=>'fecha_paso_range_pasos',
        'header'=>'Fecha Entrada',
        'type'=>'raw',
        'value'=>'date("Y-m-d", strtotime($data->fecha_inicio))',
        'filter'=>$this->widget('booster.widgets.TbDateRangePicker',array(
                                'model'=>$model,
                                'attribute'=>'fecha_paso_range_pasos',
                              //     'attribute'=>'due_date', 
                             //   'language' => 'ja',
                              /*  'htmlOptions'=>array(
                                                //'id'=>'dateRangePicker_'.$model->id_tramite_pasos,
                                                'id'=>'dateRangePicker_fecha_paso_range_pasos',
                                                'class'=>'form-control date-filter'
                                ),*/
                                'options'=>TramitePasos::$dateRangePickerOptions,
                                ),
                        true).
                '</div>'),

		array(
                    'name'=>'id_crm_proyecto',
                    'header'=>'Proyecto',
                    'value'=> 'CHtml::encode($data->idCrmProyecto["titulo"])',
                    'filter'=>CHtml::listData(Proyecto::model()->findAll(), 'id_crm_proyecto', 'titulo'),
         ), 
	//	'idClienteGs.proyecto',
		'idClienteGs.numero_de_lote',
	
	
		'idClienteGs.nombre_de_empresa',
		'idClienteGs.total_venta',
		'idClienteGs.monto_liquidacion',
		//'idClienteGs.banco_acreedor',
        array(
                    'name'=>'id_banco',
                    'header'=>'Banco',
                    'value'=> 'CHtml::encode($data->idBanco["descripcion"])',
                    'filter'=>CHtml::listData(Banco::model()->findAll(), 'id_banco', 'descripcion'),
         ), 
		'idTramite.num_escritura',	
		'idTramite.num_formulario',	
		array(
			'name'=>'id_paso',
			'header'=>'Pasos',
			'value'=> 'CHtml::encode($data->idPaso["abrev"])',
			'filter'=>CHtml::listData(Paso::model()->findAll(), 'id_paso', 'abrev'),
		),
/*    array(
       'model'=>$model,
  'attribute'=>'id_usuario',
    'data'=>array(
    0=>'Nol',
    1=>'Satu',
    2=>'Dua',
  ),*/ 


      
			array(
            'name'=>'id_usuario',
            'header'=>'Tramitador',
            'value'=> 'CHtml::encode($data->idUsuario["nombre"])',
           // 'filter'=>CHtml::listData(Usuarios::model()->findAll(), 'id_usuario', 'nombre'),
    'filter' => CHtml::listData(Usuarios::model()->findall("id_usuario IN (10,11,14)"), 'id_usuario', 'nombre'), 
         ),
      /*      array(
 'name'=>'fecha_inicio',
 'filter'=>$nose,
 'value'=>'$data->fecha_inicio'
 ),*/


				
),
)); 

      /*
Yii::app()->clientScript->registerScript('for-date-picker',"
function reInstallDatepicker(id, data){
       $('#dateRangePicker_fecha_paso_range_pasos').datepicker({'dateFormat':'yy-mm-dd'});
    }
");
*/
?>

