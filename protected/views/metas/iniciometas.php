<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>


<span class="label label-success">META CORRIENTE</span>
<div class="well">
   <?php
          $this->widget('zii.widgets.CMenu', array(
            'items'=>array(
                    array(
                            'label'=>CHtml::image(Yii::app()->request->baseUrl."/images/carteracorriente.png").'',
                            'url'=>array('/metas/carteracorriente'),
                    ),
            ),
            'encodeLabel' => false,
        ));
        ?>
</div>

<span class="label label-success">META VENCIDAD</span>
<div class="well">
    <?php
          $this->widget('zii.widgets.CMenu', array(
            'items'=>array(
                    array(
                            'label'=>CHtml::image(Yii::app()->request->baseUrl."/images/vencida.png").'',
                            'url'=>array('/metas/carteravencida'),
                    ),
            ),
            'encodeLabel' => false,
        ));
        ?>
</div>


<span class="label label-success">CALCULO REMUNERACI&Oacute;N</span>
<div class="well">
    <?php
          $this->widget('zii.widgets.CMenu', array(
            'items'=>array(
                    array(
                            'label'=>CHtml::image(Yii::app()->request->baseUrl."/images/remuneracion.png").'',
                            'url'=>array('/usuarios/listarusuarioremuneracion'),
                    ),
            ),
            'encodeLabel' => false,
        ));
        ?>
</div>
