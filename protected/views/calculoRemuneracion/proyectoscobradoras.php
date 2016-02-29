<?php
$this->menu=array(
array('label'=>'Asignar Proyecto a Cobradora','url'=>array('metas/admin')),

);
?>
<h1>Perfil de Cobradora</h1>
<?php $this->widget('booster.widgets.TbGridView',array(
'id'=>'metas-grid',
'dataProvider'=>$metas->projectcobrador(),
//'filter'=>$metas,
'columns'=>array(
		'idUsuario.nombre',
		'idUsuario.apellido',	
		'monto_mes_proyecto',
	//	'idCrmProyecto.titulo',
                 'mes0.descripcion',
	      array(
                    'name'=>'id_crm_proyecto',
                    'header'=>'Proyecto',
                    'value'=> 'CHtml::encode($data->idCrmProyecto["titulo"])',
                    'filter'=>CHtml::listData(Proyecto::model()->findAll(), 'id_crm_proyecto', 'titulo'),
               ), 
         
/*array(
'class'=>'booster.widgets.TbButtonColumn',
),*/
      array(
            'class'=>'CButtonColumn',
            'template'=>'{calcular}{update}',
            'buttons'=>array
        (
        'calcular' => array
        (
            'label'=>'Calculo Remuneracion',
            'imageUrl'=>Yii::app()->request->baseUrl.'/images/calculo.png',
            'url'=>'Yii::app()->createUrl("calculoRemuneracion/create", array("id"=>$data->id_meta))',
        ),
        'update' => array
        (
            'label'=>'Actualizar Meta en el Mes',
            //'imageUrl'=>Yii::app()->request->baseUrl.'/images/calculo.png',
            'url'=>'Yii::app()->createUrl("metas/updatemetames", array("id"=>$data->id_meta))',
        ),
                
                
     ),
        ),
),
)); ?>
