<style>
.btn-cobros { 
  color: #F4F0FA; 
  background-color: #5CBD1B; 
  border-color: #09B3AB; 
} 
 
.btn-cobros:hover, 
.btn-cobros:focus, 
.btn-cobros:active, 
.btn-cobros.active, 
.open .dropdown-toggle.btn-cobros { 
  color: #F4F0FA; 
  background-color: #49247A; 
  border-color: #09B3AB; 
} 
 
.btn-cobros:active, 
.btn-cobros.active, 
.open .dropdown-toggle.btn-cobros { 
  background-image: none; 
} 
 
.btn-cobros.disabled, 
.btn-cobros[disabled], 
fieldset[disabled] .btn-cobros, 
.btn-cobros.disabled:hover, 
.btn-cobros[disabled]:hover, 
fieldset[disabled] .btn-cobros:hover, 
.btn-cobros.disabled:focus, 
.btn-cobros[disabled]:focus, 
fieldset[disabled] .btn-cobros:focus, 
.btn-cobros.disabled:active, 
.btn-cobros[disabled]:active, 
fieldset[disabled] .btn-cobros:active, 
.btn-cobros.disabled.active, 
.btn-cobros[disabled].active, 
fieldset[disabled] .btn-cobros.active { 
  background-color: #5CBD1B; 
  border-color: #09B3AB; 
} 
 
.btn-cobros .badge { 
  color: #5CBD1B; 
  background-color: #F4F0FA; 
}
</style>

<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;
?>

<h1>Bienvenido <i><?php echo CHtml::encode(Yii::app()->name); ?></i></h1>

<p></p>

<p></p>
<ul>
	<!--<li>View file: <code><?php echo __FILE__; ?></code></li>
	<li>Layout file: <code><?php echo $this->getLayoutFile('main'); ?></code></li>-->
</ul>

<!--.row-->
<table align="center">
<tr>
	<td>
        <?php
          $this->widget('zii.widgets.CMenu', array(
            'items'=>array(
                    array(
                            'label'=>CHtml::image(Yii::app()->request->baseUrl."/images/cobros.png").'',
                            'url'=>array('/clientes'),
                    ),
            ),
            'encodeLabel' => false,
        ));
        ?>
    </td>
    
	<td>
        <?php
          $this->widget('zii.widgets.CMenu', array(
            'items'=>array(
                    array(
                            'label'=>CHtml::image(Yii::app()->request->baseUrl."/images/tramites.png").'',
                            'url'=>array('/clientes'),
                    ),
            ),
            'encodeLabel' => false,
        ));
        ?>
    </td>
    
	<td>
        <?php
          $this->widget('zii.widgets.CMenu', array(
            'items'=>array(
                    array(
                            'label'=>CHtml::image(Yii::app()->request->baseUrl."/images/soporte.png").'',
                            'url'=>array('/gestionllamadas/'),
                    ),
            ),
            'encodeLabel' => false,
        ));
        ?>
    </td>    

</tr>
</table>

</p>
