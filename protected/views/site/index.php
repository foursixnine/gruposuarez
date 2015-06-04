<head>
    <?php
    /* @var $this SiteController */
    $this->pageTitle=Yii::app()->name;
$cs = Yii::app()->clientScript;
$cs->scriptMap = array(
'jquery.js' => Yii::app()->request->baseUrl.'/js/jquery.js',
'jquery.yii.js' => Yii::app()->request->baseUrl.'/js/jquery.min.js',
);
$cs->registerCoreScript('jquery');
$cs->registerCoreScript('jquery.ui');    
?>
    <!-- blueprint CSS framework -->
    
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/screen.css" media="screen, projection" />
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css" media="print" />
    <!--[if lt IE 8]>
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" media="screen, projection" />
    <![endif]-->
    <?php Yii::app()->clientScript->registerCoreScript('jquery'); ?>
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css" />
    <link rel="shortcut icon" href="<?php echo Yii::app()->request->baseUrl; ?>/images/gacela.ico">
    <p><h3><?php echo CHtml::encode(Yii::app()->name); ?></p></h3>                


</head>


<body>

<ul>
	<!--<li>View file: <code><?php echo __FILE__; ?></code></li>
	<li>Layout file: <code><?php echo $this->getLayoutFile('main'); ?></code></li>-->
</ul>

<!--.row-->
<?php //echo CHtml::image(Yii::app()->getBaseUrl() . '/images/logo.png');?>

<table align="center">
<tr>
	<td>
        <?php
          $this->widget('zii.widgets.CMenu', array(
            'items'=>array(
                    array(
                            'label'=>CHtml::image(Yii::app()->request->baseUrl."/images/cobros.png").'',
                            'url'=>array('#'),                    
                    ),
            ),
            'encodeLabel' => false,
        ));
        ?>
    </td>


    <td>
    <div class="form-actions">
    <?php
 
$this->widget(
    'booster.widgets.TbButton',
    array(
        'buttonType'=>'link',
        'label' => 'GESTION',
        'size' => 'large',
        'url'=>$this->createUrl('/gestion'),
        'context' => 'success',
    )
); echo ' ';
        ?>
</div>
    </td>
    
    <td>   
    <div class="form-actions">
    <?php
 
$this->widget(
    'booster.widgets.TbButton',
    array(
        'buttonType'=>'link',
        'label' => 'TABLERO',
        'size' => 'large',
        'url'=>$this->createUrl('/tablero'),
        'context' => 'success',
    )
); echo ' ';
        ?>
</div>
    </td>
        
    <td>
        <div class="form-actions">
    <?php
 
$this->widget(
    'booster.widgets.TbButton',
    array(
        'buttonType'=>'link',
        'label' => 'METAS',
        'size' => 'large',
        'url'=>$this->createUrl('/metas'),
        'context' => 'success',
    )
); echo ' ';
        ?>
</div>
    </td>


	<!--<td><button class="btn btn-success btn-large">ADMIN <i class="icon-white icon-wrench"></i></button></td>-->
</tr>
  <!--
<tr>

	<td>
        <?php
         /* $this->widget('zii.widgets.CMenu', array(
            'items'=>array(
                    array(
                            'label'=>CHtml::image(Yii::app()->request->baseUrl."/images/tramites.png").'',
                            'url'=>array('/clientes'),
                    ),
            ),
            'encodeLabel' => false,
        ));
     */   ?>
    </td>
  
    <td><button class="btn btn-info btn-large">TRAMITES <i class="icon-white icon-flag"></i></button></td>
        <td><button class="btn btn-info btn-large">POR DEFINIR <i class="icon-white icon-flag"></i></button></td>
            <td><button class="btn btn-info btn-large">POR DEFINIR <i class="icon-white icon-flag"></i></button></td>
 </tr>   -->
	<td>
        <?php
         /* $this->widget('zii.widgets.CMenu', array(
            'items'=>array(
                    array(
                            'label'=>CHtml::image(Yii::app()->request->baseUrl."/images/soporte.png").'',
                            'url'=>array('/gestionllamadas/'),
                    ),
            ),
            'encodeLabel' => false,
        ));*/
        ?>
    </td>    

</tr>
</table>

</p>
</body>