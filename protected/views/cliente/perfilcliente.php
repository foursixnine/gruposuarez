<?php
$this->breadcrumbs=array(
	'Clientes'=>array('index'),
	'perfilcliente',
);

$this->menu=array(
	array('label'=>'Volver','url'=>array('/gestion/index')),
	//array('label'=>'Administrar Clientes','url'=>array('admin')),
);
?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
<script src="script.js"></script>
<script>

$(function(){
  $('#demo').on('hide.bs.collapse', function () {
    $('#button').html('<span class="glyphicon glyphicon-collapse-down"></span> Show');
  })
  $('#demo').on('show.bs.collapse', function () {
    $('#button').html('<span class="glyphicon glyphicon-collapse-up"></span> Hide');
  })
})
</script>

<br/>
<?php

$this->widget('bootstrap.widgets.TbTabs', array(
    'tabs'=>array(
        array(
            'id'=>'tab1',
            'active'=>true,
            'justified' => true,
            //'itemOptions' => array('class' => ' <span </span>'),
            'label'=>'DATOS GENERALES',
            'content'=>$this->renderPartial("_datosgenerales", array('cliente' => $cliente),true),               
        ),
        array(
            'id'=>'tab2',
            'active'=>false,
            'justified' => true,
            'label'=>'DATOS CONTACTO',
            'content'=>$this->renderPartial("_datoscontacto", array('cliente' => $cliente),true),
        ),
        array(
            'id'=>'tab3',
            'active'=>false,
            'justified' => true,
            'label'=>'ULTIMA GESTION',
                 'content'=>$this->renderPartial("_datosgestion", array('cliente' => $cliente,
                                                                        'gestion_old'=>$gestion_old,),true),
        ), 
        array(
            'id'=>'tab4',
            'active'=>false,
            'justified' => true,
            'label'=>'COBROS',
                 'content'=>$this->renderPartial("_datoscobros", array('cliente' => $cliente),true),
        ),        
        array(
            'id'=>'tab5',
            'active'=>false,
            'justified' => true,
            'label'=>'TRAMITES',
                 'content'=>$this->renderPartial("_datostramites", array(
                                           'cliente' => $cliente,
                                           'tramite' => $tramite,
                                           'model'=>$model,
        ),true),

        ),   
    ),
)); 
?>

  

<br />
