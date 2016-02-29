<?php
$this->breadcrumbs=array(
	'Cliente'=>array('index'),
	'Manage',
);

$this->menu=array(
    array('label'=>'Listar Cliente','url'=>array('index')),
//    array('label'=>'Create Cliente','url'=>array('create')),
  //  array('label'=>'Exportar a Excel','url'=>array('excel')),
     // array('label'=>'Actualizar Meta','url'=>array('metas/updatemetames','id'=>$->id_meta)),
);

Yii::app()->clientScript->registerScript('search', "
    $('.search-button').click(function(){
            $('.search-form').toggle();
        return false;
    });
    $('.search-form form').submit(function(){
        $.fn.yiiGridView.update('cliente-grid', {
        data: $(this).serialize()
    });
    return false;
    });
");
?>
<br/><br/><br/><br/>
<button type="button" class="btn btn-warning">ADMINISTRAR CLIENTE</button>
<br/><br/><br/><br/>


<?php 
$this->widget('booster.widgets.TbGridView',array(
'id'=>'cliente-grid',
'dataProvider'=>$model->noventadias(),
'filter'=>$model,
'columns'=>       
     array(
                    'nombre_de_empresa',
                    'numero_de_lote',
                   'cartera_corriente',
                    'cartera_30_dias',
                    'cartera_60_dias',
                    'cartera_90_dias',
                    'cartera_120_dias',
                array(
                    'name'=>'id_proyecto',
                    'header'=>'Proyecto',
                    'value'=> 'CHtml::encode($data->idProyecto["titulo"])',
                    'filter'=>CHtml::listData(Proyecto::model()->findAll(), 'id_crm_proyecto', 'titulo'),                   
                ), 
                array(
                    'type'=>'raw',
                    'header' => 'Gestión',            
                    'value'=> '($data->gestion == 0) ? "<a>NO</a>" : "<a>SI</a>"',
                ),           
                'buttons' => array(
                                'class'=>'CButtonColumn',                    
                                'template' => '{iniciar_gestion}',
                                'buttons' => array(
                                            'iniciar_gestion' =>array(
                                                    'label'=>'Detalle',
                                                    'url'=>'Yii::app()->createUrl("/cliente/perfilcliente/",array("id"=>$data["id_cliente"]))',
                                                                     )
                                                  )
                    ),		

),
));

?>



                                         
                                       


