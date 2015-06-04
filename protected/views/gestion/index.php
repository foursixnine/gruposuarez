<?php
$this->breadcrumbs=array(
	'Gestion'=>array('index'),
	'Administración',
);

$this->menu=array(
array('label'=>'List Gestion','url'=>array('index')),
array('label'=>'Create Gestion','url'=>array('create')),
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

<span class="label label-success">CUMPLIMIENTO A LAS METAS</span>
<div class="well">
 
</div>

<span class="label label-success">INICIAR GESTI&Oacute;N DE COBROS</span>
<div class="well">
   <?php
          $this->widget('zii.widgets.CMenu', array(
            'items'=>array(
                    array(
                            'label'=>CHtml::image(Yii::app()->request->baseUrl."/images/gestioncobros.png").'',
                            'url'=>array('/clientes/detalle'),
                    ),
            ),
            'encodeLabel' => false,
        ));
        ?>
</div>

<span class="label label-success">M&Aacute;S BUSCADOS</span>
<div class="well">
<?php //echo CHtml::link('Advanced Search','#',array('class'=>'search-button btn')); 

//'filter'=>CHtml::activeTextField($dataprovider, 'mailTemplate'),?>
    
    
    
<?php 
 //$this->widget('zii.widgets.grid.CGridView',array(
$this->widget('zii.widgets.grid.CGridView',array(
//$this->widget('booster.widgets.TbGridView',array(
'id'=>'masbuscados-grid',
'dataProvider'=>$cliente->noventadias(),
'filter'=>$cliente,
   // 'limit' => 5,
'columns'=>array(
                'ID_CLIENTE',
		'NOMBRE',
                /*'APELLIDO',
                'ID_PROYECTO',
                'CARTERA_30_DIAS',
                'CARTERA_60_DIAS',
                'CARTERA_90_DIAS',
                'CARTERA_120_DIAS',


		array(
		'name'=>'ID_PROYECTO',
		'value'=>'$data->PROYECTO',
		'filter'=>  Gestion::getListProyecto(),
		),*/
array
(
    'class'=>'CButtonColumn',
    'template'=>'{crear}{ver}',
    'buttons'=>array
    (
        'crear' => array
        (
            'label'=>'Iniciar Gestion',
        //    'imageUrl'=>Yii::app()->request->baseUrl.'/images/email2.png',
            'url'=>'Yii::app()->createUrl("gestion/create", array("id"=>$data->ID_CLIENTE))',
        ),
            'ver' => array
        (
            'label'=>'Iniciar Gestion',
            'imageUrl'=>Yii::app()->request->baseUrl.'/images/view.png',
           // 'url'=>'Yii::app()->createUrl("gestion",  array($data->id_gestion))',
        ),
        
    ),
),
),
)); ?>
</div>


<!--------------------PERFIL CLIENTE--------------------------------------->


<span class="label label-success">PERFIL DE CLIENTE</span>
<div class="well">
   <?php
          $this->widget('zii.widgets.CMenu', array(
            'items'=>array(
                    array(
                            'label'=>CHtml::image(Yii::app()->request->baseUrl."/images/perfil.png").'',
                            'url'=>array('clientes/admin'),
                    ),
            ),
            'encodeLabel' => false,
        ));
        ?>
</div>


<!--------------------AVISO DE RETIRO --------------------------------------->

 
<span class="label label-success">AVISO DE RETIRO</span>
<a href="<?php echo Yii::app()->createUrl("usuarios/email");?>"><span class="label label-info">Email</span></a>    

<div class="well">
    
<?php 
/*
 $this->widget('zii.widgets.grid.CGridView',array(
//$this->widget('booster.widgets.TbGridView',array(
'id'=>'avisoretiro-grid',
'dataProvider'=>$model->agendagestion(),
'filter'=>$model,   
'columns'=>array(
                array(
                'name'=>'id_cliente',
                'type'=>'raw',
                'header'=>'id_cliente',
                'value'=>'CHtml::link("clientes/perfilcliente/",array($data->id_cliente, $data->id_cliente))',
                ),    
               'fecha_acuerdo',
           array(
        'name'=>'id_acuerdo_cobros',
        'header'=>'Acuerdo',
        'value'=> 'CHtml::encode($data->idAcuerdoCobros["descripcion"])',
        'filter'=>CHtml::listData(AcuerdoCobros::model()->findAll(), 'id_acuerdo_cobros', 'descripcion'),
        ),
            
  array(
    'class' => 'bootstrap.widgets.TbToggleColumn',
    'toggleAction' => 'gestion/toggle',
    'name' => 'id_cumplimiento',
    'header' => 'Cumplimiento',
                  'filter'=>false,
    ),  
    
    
        
),
    
    
    
        
)); 
 */
 ?>


</div>


<!--------------------AGENDA DE GESTION --------------------------------------->

<span class="label label-success">AGENDA DE GESTI&Oacute;N</span>
<a href="#"><span class="label label-danger"></span></a>
<div class="well">
<?php 
/*
$this->widget('zii.widgets.grid.CGridView',array(
'id'=>'avisoretiro-grid',
'dataProvider'=>$model->agendagestion(),
'filter'=>$model,   
'columns'=>
        array(
               'id_cliente',
               'fecha_acuerdo',
        array(
        'name'=>'id_acuerdo_cobros',
        'header'=>'Acuerdo',
        'value'=> 'CHtml::encode($data->idAcuerdoCobros["descripcion"])',
        'filter'=>CHtml::listData(AcuerdoCobros::model()->findAll(), 'id_acuerdo_cobros', 'descripcion'),
        ),            
        array(
          'class' => 'bootstrap.widgets.TbToggleColumn',
          'toggleAction' => 'gestion/toggle',
          'name' => 'id_cumplimiento',
          'header' => 'Cumplimiento',
                        'filter'=>false,
          ),  
        array(
            'class'=>'CButtonColumn',
            'template'=>'{ver}',
            'buttons'=>array
        (
        'ver' => array
        (
            'label'=>'Ver Cliente',
           // 'imageUrl'=>Yii::app()->request->baseUrl.'/images/email.png',
            'url'=>'Yii::app()->createUrl("clientes/perfilcliente", array("id"=>$data->id_cliente))',
        ),
     ),
        ),
),
    
    
    
        
)); 
 */
 ?>


</div>
