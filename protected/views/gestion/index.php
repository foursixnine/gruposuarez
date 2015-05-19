<?php
$this->breadcrumbs=array(
	'Gestions'=>array('index'),
	'Manage',
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
$this->widget('booster.widgets.TbGridView',array(
'id'=>'masbuscados-grid',
'dataProvider'=>$model->agendagestion(),
'filter'=>$model,
'columns'=>array(
		'idCliente.nom_cliente',
                'idCliente.ape_cliente',
    /*
      array(
        'name'=>'id_cliente',
        'header'=>'Cliente',
        'value'=> 'CHtml::encode($data->idCliente["nom_cliente"])',
          'filter'=> false,
        //'filter'=> CHtml::activeTelField($model,'id_cliente'),
        ),*/
                array(
'name'=>'id_cliente',
           'header'=>'Proyecto',
'value'=>'$data->idCliente.idProyecto["titulo"]',
        //'filter'=>Categorias::getListProyecto(), 
),
                array(
'name'=>'id_cliente',
           'header'=>'30 Días',
'value'=>'$data->idCliente["treinta"]',
    //    'filter'=>CHtml::listData(Clientes::model()->findAll(), 'id_cliente', 'treinta'),
),
           array(
'name'=>'id_cliente',
           'header'=>'60 Días',
'value'=>'$data->idCliente["sesenta"]',
    //    'filter'=>CHtml::listData(Clientes::model()->findAll(), 'id_cliente', 'treinta'),
),
           array(
'name'=>'id_cliente',
           'header'=>'90 Días',
'value'=>'$data->idCliente["sesenta"]',
    //    'filter'=>CHtml::listData(Clientes::model()->findAll(), 'id_cliente', 'treinta'),
),
       
           array(
'name'=>'id_cliente',
           'header'=>'120 Días',
'value'=>'$data->idCliente["cientoveiente"]',
    //    'filter'=>CHtml::listData(Clientes::model()->findAll(), 'id_cliente', 'treinta'),
),
array
(
    'class'=>'CButtonColumn',
    'template'=>'{crear}{ver}',
    'buttons'=>array
    (
        'crear' => array
        (
            'label'=>'Iniciar Gestion',
           // 'imageUrl'=>Yii::app()->request->baseUrl.'/images/email.png',
            'url'=>'Yii::app()->createUrl("gestion/create", array("id"=>$data->id_cliente))',
        ),
            'ver' => array
        (
            'label'=>'Iniciar Gestion',
            'imageUrl'=>Yii::app()->request->baseUrl.'/images/view.png',
            'url'=>'Yii::app()->createUrl("gestion",  array($data->id_gestion))',
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

<!--------------------AVISO DE RETIRO--------------------------------------->

<span class="label label-success">AGENDA DE GESTI&Oacute;N</span>
<a href="#"><span class="label label-danger"></span></a>
<div class="well">
<?php 

 //$this->widget('zii.widgets.grid.CGridView',array(
$this->widget('booster.widgets.TbGridView',array(
'id'=>'avisoretiro-grid',
'dataProvider'=>$model->agendagestion(),
'filter'=>$model,   
'columns'=>array(
                'idCliente.nom_cliente',
                'idCliente.ape_cliente',
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
 
 ?>


</div>