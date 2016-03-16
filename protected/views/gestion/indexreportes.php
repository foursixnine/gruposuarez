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
    <a href="<?php echo Yii::app()->createUrl('gestion/morocidadcliente'); ?>">
  
        <img width="120px" height="120px" src="<?php echo Yii:: app()->baseUrl.'/images/cobros.png' ?> " />
        <button type="button" class="btn btn-warning"> MOROSIDAD <br/>POR CLIENTE</button>
     
    </a>      
    &nbsp;&nbsp;&nbsp;&nbsp;
    <!-- Tramites-->
    <a href="<?php echo Yii::app()->createUrl('gestion/morosidadproyecto'); ?>">
        <img width="120px" height="120px" src="<?php echo Yii:: app()->baseUrl.'/images/perfil.png' ?> "  />
        <button type="button" class="btn btn-warning">MOROSIDAD <br/>POR PROYECTO</button>
            
    </a> 

    
</div>
<br/>





