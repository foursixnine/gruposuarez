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

<button type="button" class="btn btn-warning">ADMISTRAR GESTION</button>


<?php 


$this->widget('booster.widgets.TbGridView',array(
'id'=>'gestion',
'dataProvider'=>$model->excel(),
'filter'=>$model,
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


?>

