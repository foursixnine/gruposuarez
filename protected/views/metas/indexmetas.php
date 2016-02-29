<?php
$this->breadcrumbs=array(
    'Gestion'=>array('index'),
    'Administración',
);

$this->menu=array(
array('label'=>'Listar Gestion','url'=>array('admin')),
array('label'=>'Detalle de Cliente','url'=>array('cliente/detalle')),
array('label'=>'Reporte de Cobros','url'=>array('gestion/indexreportes')),
);
/*
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
");*/
?>
<br/><br/>
<!--------------------AGENDA DE GESTION --------------------------------------->


<br/>
<!--<span>INICIAR GESTI&Oacute;N DE COBROS</span>-->
<div class="">
       <!-- Remuneracion -->
    <a href="<?php echo Yii::app()->createUrl('metas/create'); ?>">
  
        <img width="120px" height="120px" src="<?php echo Yii:: app()->baseUrl.'/images/crearmetas.png' ?> " />
        <button type="button" class="btn btn-warning"> CREAR <br/>METAS</button>
     
    </a>      
    &nbsp;&nbsp;&nbsp;&nbsp;
    <!-- Tramites -->
    <a href="<?php echo Yii::app()->createUrl('metas/admin'); ?>"><img width="120px" height="120px" src="<?php echo Yii:: app()->baseUrl.'/images/administrarmetas.png' ?> " />
        <button type="button" class="btn btn-warning">ADMINISTRAR <br/>METAS</button>
            
    </a> 
</div>
<br/>





