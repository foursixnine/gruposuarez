<?php

function dias_transcurridos($fecha_i,$fecha_f)
{
  $dias = (strtotime($fecha_i)-strtotime($fecha_f))/86400;
  $dias   = abs($dias); $dias = floor($dias);   
  return $dias;
}
$fecha_actual = date('Y-m-d');
// Ejemplo de uso:
$this->breadcrumbs=array(
  'Tramites'=>array('index'),
  'Administrar',
);

$this->menu=array(
    array('label'=>'Volver','url'=>array('admin')),
);

?>

<br/><br/>

<button type="button" class="btn btn-warning">TRAMITES LIQUIDADOS</button>
<?php
$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'type' => 'horizontal',
));

$this->widget('bootstrap.widgets.TbDateRangePicker', array(
    'model' => $model,
    'attribute' => 'fecha_paso_range',
    'options' => array(
        'format' => 'YYYY-MM-DD',
    ),
));

$this->widget('bootstrap.widgets.TbButton', array(
    'buttonType' => 'submit',
    'label' => 'Ir'
));

$this->endWidget();
?>
<div class="row">
    <div class="span12">
        <p>
            Filas Seleccionadas: <strong><?php echo $count; ?></strong>
        </p>
        <div class="alert alert-info">
            Resultados de los tramites entre las fechas <strong><?php echo $min; ?></strong> a <strong><?php echo $max; ?></strong>
        </div>
    </div>
</div>

<?php $this->widget('booster.widgets.TbGridView',array(
'id'=>'tramite-grid',
'dataProvider'=>$model->tramitesliquidados(),
'filter'=>$model,
'columns'=>array(
                'fecha_inicio',
                array(
                    'name'=>'id_usuario',
                    'header'=>'Usuario',
                    'value'=> 'CHtml::encode($data->idUsuario["nombre"])',
                    'filter'=>CHtml::listData(Usuarios::model()->findAll(), 'id_usuario', 'nombre'),
                ), 
                'idClienteGs.numero_de_lote',
                array(
                    'name'=>'id_proyecto',
                    'header'=>'Proyecto',
                    'value'=> 'CHtml::encode($data->idProyecto["titulo"])',
                    'filter'=>CHtml::listData(Proyecto::model()->findAll(), 'id_crm_proyecto', 'titulo'),
                ), 
    	        'idPasos.descripcion', 
            
                array(
                    'header' => 'Porcentaje',
                    'value' => function($data)
                {
                Controller::widget('bootstrap.widgets.TbProgress', array(
                    'percent' => ($data->id_pasos)/ 11 * 100,
                    //'striped' => true,
                    'context' => 'success',
                    'animated' => false,
                 ));
            },
            'htmlOptions' => array (
                'style' => ''
            ),
        ),
    
        'buttons' => 
        array(
            'class'=>'CButtonColumn',
                        'template' => '{continuar_tramite} ',
                        'buttons' => array(
                             'continuar_tramite' => array(
                                    'label'=>'Ver Tramite',
                                    'url'=>'Yii::app()->createUrl("/tramitePasos/vertramitesliquidados/",array("id"=>$data["id_tramite"]))',
                                    
                       ) )
        ), 
    


        )
        )
    );
?>