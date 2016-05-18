<?php
$this->breadcrumbs=array(
	'Clientes'=>array('index'),
	'Detalle',
);

$this->menu=array(
array('label'=>'Volver','url'=>array('gestion/index')),
array('label'=>'Volver','url'=>array('gestion/reporteretirados')),
//array('label'=>'Manage Clientes','url'=>array('admin')),
);

Yii::app()->clientScript->registerScript('search', "
    $('.search-button').click(function(){
    $('.search-form').toggle();
    return false;
    });
    $('.search-form form').submit(function(){
    $.fn.yiiGridView.update('clientes-grid', {
    data: $(this).serialize()
    });
    return false;
    });
    ");
?>
<br/><br/><br/><br/>
<button type="button" class="btn btn-warning">DETALLE CLIENTES RETIRADOS</button>


<?php //echo $this->renderPartial('detalle', array('model'=>$model)); ?>
<?php 
$this->widget('booster.widgets.TbGridView',array(
//$this->widget('zii.widgets.grid.CGridView',array(
'id'=>'clientes-grid',
'dataProvider'=>$clientesretirados->clientesretirados(),
'filter'=>$clientesretirados,
'columns'=>
        array(
                    'nombre_de_empresa',		
                    'numero_de_lote',
                    'cartera_corriente',
                    'cartera_30_dias',
                    'cartera_60_dias',
                    'cartera_90_dias',
                    'cartera_120_dias',         
                    'total_vencido',
                    'status_plan_pago',
                array(
                    'name'=>'id_proyecto',
                    'header'=>'Proyecto',
                    'value'=> 'CHtml::encode($data->idProyecto["titulo"])',
                    'filter'=>CHtml::listData(Proyecto::model()->findAll(), 'id_crm_proyecto', 'titulo'),
               ), 
        
                 
'buttons' => 
   array(
            'class'=>'CButtonColumn',
                        'template' => '{ver_gestion}',
                        'buttons' => array(
                             'ver_gestion' => array(
                                'label'=>'Ver Cliente',
                                'imageUrl'=>Yii::app()->request->baseUrl.'/images/usuarios.jpg',
                                      'url'=>'Yii::app()->createUrl("cliente/perfilcliente", array("id"=>$data["id_cliente"]))',
                                   
                       ),

        )
    ), 
),
)); 



?>