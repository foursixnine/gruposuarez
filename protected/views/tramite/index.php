<?php
$this->breadcrumbs=array(
	'Tramites',
);

$this->menu=array(
//array('label'=>'Crear Tramite','url'=>array('create')),
array('label'=>'Volver','url'=>array('../gruposuarez')),
);
?>

<h1>Tramites</h1>

<br/>
<h2 class="titulo">Asignaci&oacute;n de Tramite</h2>
<br/>
<!--<span>INICIAR GESTI&Oacute;N DE COBROS</span>-->
<div class="">
   <?php
          $this->widget('zii.widgets.CMenu', array(
            'items'=>array(
                    array(
                            'label'=>CHtml::image(Yii::app()->request->baseUrl."/images/asiganciondetramites.png").'',
                            'url'=>array('/cliente/detalle'),
                    ),
            ),
            'encodeLabel' => false,
        ));
        ?>
</div>



<h2 class="titulo">Actualizaci&oacute;n de Tramite</h2>

<!--<span>INICIAR GESTI&Oacute;N DE COBROS</span>-->
<div class="">
   <?php
          $this->widget('zii.widgets.CMenu', array(
            'items'=>array(
                    array(
                            'label'=>CHtml::image(Yii::app()->request->baseUrl."/images/actualizaciondetramites.png").'',
                            'url'=>array('/cliente/detalle'),
                    ),
            ),
            'encodeLabel' => false,
        ));
        ?>

</div>