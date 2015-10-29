<?php
$this->pageTitle=Yii::app()->name;
Yii::app()->clientScript->registerCoreScript('jquery'); 
Yii::app()->clientScript->registerCoreScript('jquery.ui');
Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl.'/helpers/bootstrap-datepicker/js/bootstrap-datepicker.js');
Yii::app()->clientScript->registerCssFile(Yii::app()->baseUrl.'/helpers/bootstrap-datepicker/css/datepicker.css'); 
?>
 <script type="text/javascript">
$("#fecha_creacion").datepicker({
    format: 'mm-dd-yyyy'
});
</script>  
<?php
$this->breadcrumbs=array(
	'Gestión'=>array('index'),
	'Administrar Gestiones',
);

$this->menu=array(
array('label'=>'Volver','url'=>array('index')),
array('label'=>'Exportar y descargar', 'url'=>array('excel'))
                                        
);

Yii::app()->clientScript->registerScript('search', "
        $('.search-button').click(function(){
            $('.search-form').toggle();
            return false;
        });
        $('.search-form form').submit(function(){
            $.fn.yiiGridView.update('gestion-grid', {
            data: $(this).serialize()
        });
             return false;
        });
");
?>
<br/>
<br/><br/><br/>
<br/><br/><br/><br/>
<button type="button" class="btn btn-warning">ADMISTRAR GESTION</button>


<?php 


$this->widget('booster.widgets.TbGridView',array(
'id'=>'gestion',
'dataProvider'=>$model->excel(),
'filter'=>$model,
'afterAjaxUpdate'=>"function(){jQuery('#Gestion_fecha_creacion').datepicker({'dateFormat': 'yyyy-mm-dd'})}",
//'afterAjaxUpdate' => 'reinstallDatePicker', // (#1)
'columns'=>array(
			'idClienteGs.id_cliente',
			'idClienteGs.nombre_de_empresa',
            array(
                    'name'=>'id_crm_proyecto',
                    'header'=>'Proyecto',
                    'value'=> 'CHtml::encode($data->idCrmProyecto["titulo"])',
                    'filter'=>CHtml::listData(Proyecto::model()->findAll(), 'id_crm_proyecto', 'titulo'),
            ), 
			'idClienteGs.numero_de_lote',
			

            array('name'=>'idUsuario.username', 'header'=>'Cobradora'),


			array(
				'name'=>'id_acuerdo_cobros',
				'header'=>'Acuerdos Cobros',
				'value'=> 'CHtml::encode($data->idAcuerdoCobros["descripcion"])',
				'filter'=>CHtml::listData(AcuerdoCobros::model()->findAll(), 'id_acuerdo_cobros', 'descripcion'),
			),
			
			'fecha_acuerdo',
            array(
            'name' => 'fecha_creacion',
            'type' => 'date',
   
            'filter' => $this->widget('bootstrap.widgets.TbDatePicker', array(
                'model'=>$model, 
                'attribute'=>'fecha_creacion',  
             //   'i18nScriptFile' => 'jquery.ui.datepicker-ja.js', //(#2)
                'htmlOptions' => array(
                      'id' => 'fecha_creacion',
                      'size' => '10',
                      //'style' => 'width:80px;vertical-align:top'
                ),
                 'options'=>array(
                        'showAnim'=>'fold',
                        'format' => 'yyyy-mm-dd',
                       /*  'afterAjaxUpdate'=>'function(){
                                        jQuery("#'.CHtml::activeId($model, 'fecha_creacion').'").datepicker({showButtonPanel:true, changeYear:true});
                                }',*/
        )
            ), 
            true), // (#4)
        ),

			

     array(
            'class'=>'CButtonColumn',
            'template'=>'{ver}',
            'buttons'=>array
        (
        'ver' => array
        (
            'label'=>'Ver Cliente',
            'imageUrl'=>Yii::app()->request->baseUrl.'/images/view.png',
            'url'=>'Yii::app()->createUrl("gestion/view", array("id"=>$data->id_gestion))',
        ),
     ),
        ),


),
));

//use the same parameters that you had set in your widget else the datepicker will be refreshed by default 
//(#5)
Yii::app()->clientScript->registerScript('re-install-date-picker', "
function reinstallDatePicker(id, data) {

    $('#fecha_acuerdo').datepicker(jQuery.extend({showMonthAfterYear:true},jQuery.datepicker.regional['es'],{'dateFormat':'yyyy-mm-dd'}));
}
");
?>

