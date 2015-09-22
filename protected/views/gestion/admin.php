<?php
$this->breadcrumbs=array(
	'Gestions'=>array('index'),
	'Manage',
);

$this->menu=array(
array('label'=>'List Gestion','url'=>array('index')),
array('label'=>'Create Gestion','url'=>array('create')),
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

<h1>Manage Gestions</h1>



<?php 


$this->widget('booster.widgets.TbGridView',array(
'id'=>'gestion-grid',
'dataProvider'=>$model->excel(),
'filter'=>$model,
'columns'=>array(
			'idClienteGs.id_cliente',
			'idClienteGs.nombre_de_empresa',
			'idClienteGs.numero_de_lote',
			'idUsuario.username',
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

