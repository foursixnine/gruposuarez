<?php
$this->breadcrumbs=array(
	'Clientes'=>array('index'),
	'Detalle',
);

$this->menu=array(
array('label'=>'Volver','url'=>array('gestion/index')),
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

<h1>Detalle Clientes</h1>
<?php //echo $hola; ?> 

<?php //echo $this->renderPartial('detalle', array('model'=>$model)); ?>
<?php $this->widget('booster.widgets.TbGridView',array(
'id'=>'clientes-grid',
'dataProvider'=>$model->buscarproyecto(),
'filter'=>$model,
'columns'=>
        array(
		'nom_cliente',
		'ape_cliente',
		'direccion',
'treinta',
            'sesenta',
            'noventa',
      //      'cientoveinte',
        array(
        'name'=>'id_proyecto',
        'header'=>'Proyecto',
        'value'=> 'CHtml::encode($data->idProyecto["titulo"])',
        'filter'=>CHtml::listData(Proyecto::model()->findAll(), 'id_proyecto', 'titulo'),
        ),
                 
'buttons' => 
   array(
            'class'=>'CButtonColumn',
                        'template' => '{iniciar_gestion} ',
                        'buttons' => array(
                             'iniciar_gestion' => array(
                                    'label'=>'Iniciar Gestion',
                                    'url'=>'Yii::app()->createUrl("/gestion/create/",array("id"=>$data["id_cliente"]))',
                                    
                       ) )
            ), 

		
array(
'class'=>'booster.widgets.TbButtonColumn',
),
),
)); 



?>

<?php
/*
array(
            'class'=>'CButtonColumn',
                        'template' => '{view} {update} {delete} {nueva_accion}',
                        'buttons' => array(
                             'nueva_accion' => array(
                                    'label'=>'nueva_accion',
                                    'url'=>'Yii::app()->createUrl("url auntando a la acci�n" )',
                       ) )
            ), 
*/
?>
