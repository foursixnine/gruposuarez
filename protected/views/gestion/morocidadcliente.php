<?php
$this->breadcrumbs=array(
	'Gestión'=>array('index'),
	'Administrar Gestiones',
);

$this->menu=array(
array('label'=>'Volver','url'=>array('indexreportes')),
array('label'=>'Exportar y descargar', 'url'=>array('excelcm'))
                                        
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

<button type="button" class="btn btn-warning">MOROSIDAD CLIENTE</button>

<br/><br/><br/><br/><br/><br/><br/><br/><br/>


<?php 


$this->widget('booster.widgets.TbExtendedGridView', array(
    'filter'=>$model,
    'id'=>'clientes1-grid',
    'type'=>'striped bordered',
    'dataProvider' => $model->clientesexcel(),
    'template' => "{items}\n{extendedSummary}",
    'columns' =>
        array(
         array(
                    'name'=>'id_proyecto',
                    'header'=>'PROYECTO',
                    'value'=> 'CHtml::encode($data->idProyecto["titulo"])',
                    'filter'=>CHtml::listData(Proyecto::model()->findAll(), 'id_crm_proyecto', 'titulo'),
               ), 

      
        array('name'=>'numero_de_lote', 'header'=>'LOTE'),
        array('name'=>'nombre_de_empresa', 'header'=>'NOMBRE CLIENTE'),
        array('name'=>'numero_celular', 'header'=>'NÚMERO TELÉFONICO'),
        array('name'=>'cartera_corriente', 'header'=>'CARTERA CORRIENTE'),
        array('name'=>'cartera_30_dias', 'header'=>'30'),
        array('name'=>'cartera_60_dias', 'header'=>'60'),
        array('name'=>'cartera_90_dias', 'header'=>'90'),
        array('name'=>'cartera_120_dias', 'header'=>'120'),
        array('name'=>'total_vencido', 'header'=>'TOTAL VENCIDO'),
     //   array('name'=>'total_vencido', 'header'=>'120', 'footer'=>'Total Vencido'),
    ),

          'extendedSummary' => array(
        'title' => 'Total de Cartera',
        'columns' => array(
        'total_vencido' => array('label'=>'Total Vencido', 'class'=>'TbSumOperation'),
        'cartera_120_dias' => array('label'=>'Cartera de 120', 'class'=>'TbSumOperation'),
        'cartera_90_dias' => array('label'=>'Cartera de 90', 'class'=>'TbSumOperation'),
        'cartera_60_dias' => array('label'=>'Cartera de 60', 'class'=>'TbSumOperation'),
        'cartera_30_dias' => array('label'=>'Cartera de 30', 'class'=>'TbSumOperation'),
        'cartera_corriente' => array('label'=>'Cartera Corriente', 'class'=>'TbSumOperation'),
        )
    ),
    'extendedSummaryOptions' => array(
        'class' => 'well pull-right',
        'style' => 'width:300px'
    ),
));

?>