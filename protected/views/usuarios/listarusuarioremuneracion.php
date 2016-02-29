
<?php //var_dump($model);die;?>
<h1>Perfil de Cobradora</h1>

<p>
	<!--You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>
		&lt;&gt;</b>
	or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.-->
</p>

<!-- search-form -->

<?php 
/*
 $this->widget('booster.widgets.TbGridView',array(
'id'=>'clientes-grid',
'dataProvider'=>$model->search(),
'filter'=>$model,
'columns'=>array(
		'id_gruposuarez',
		'cedula',
		'nom_cliente',
		'ape_cliente',
		'fe_cumpleannos',
		'direccion',
        array(
        'name'=>'id_proyecto',
        'header'=>'Proyecto',
        'filter'=>CHtml::listData(Proyecto::model()->findAll(), 'id_proyecto', 'titulo'),
        ),*/
		
	/*	'telefono',
		'celular',
		'correo',
		'telefono2',
		'id_cliente',
		'id_status',
		'ocupacion',
		'id_ciudad',
		'fax',
		'ruc',
		'estado_civil',
		'nacionalidad',
		'sexo',
		'lugar_trabajo',
		'id_proyecto',*/
/*		
array(
'class'=>'booster.widgets.TbButtonColumn',
),
),
)); */
$this->widget('booster.widgets.TbGridView',array(
'id'=>'usuarios-grid',
'dataProvider'=>$model->search(),
//'filter'=>$model,
'columns'=>
        array(
		
		'nombre',
		'apellido',
		'cedula',
	
      /*  array(
        'name'=>'id_proyecto',
        'header'=>'Proyecto',
        'value'=> 'CHtml::encode($data->idProyecto["titulo"])',
        'filter'=>CHtml::listData(Proyecto::model()->findAll(), 'id_proyecto', 'titulo'),
        ),*/

'buttons' => 
   array(
            'class'=>'CButtonColumn',
                        'template' => '{iniciar_gestion} ',
                        'buttons' => array(
                             'iniciar_gestion' => array(
                                    'label'=>'Calcular Remuneración',
                                    'url'=>'Yii::app()->createUrl("/calculoRemuneracion/create/",array("id"=>$data["id_usuario"]))',
                                    
                       ) )
            ), 

		

),
));

?>
