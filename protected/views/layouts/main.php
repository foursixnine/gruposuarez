<?php /* @var $this Controller */ ?>
<!DOCTYPE html>
<html lang="<?php echo Yii::app()->language;?>">
<head>
    <meta charset="utf-8">

	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
    <meta charset="<?php echo Yii::app()->charset;?>">
</head>   

<body>
 <header> 



<header>
<?php
$this->widget(
    'booster.widgets.TbNavbar',
    array(
        'type' => 'inverse',
      //  'brand' => 'Grupo Suarez',
       // 'brandUrl' => CHtml::image(Yii::app()->getBaseUrl().'/images/logo.jpg'),
        'brand' =>  '<img src ="' . Yii::app()->request->baseUrl . '/images/logo.png" />',
        'brandUrl' => 'http://www.gsuarez.com/',
        'collapse' => true, // requires bootstrap-responsive.css
        'fixed' => false,
        'fluid' => true,
        'items' => array(
            array(
                'class' => 'booster.widgets.TbMenu',
                'type' => 'navbar',
                'items' => array(
                    array('label' => 'Inicio', 'url' => '/gruposuarez', 'active' => true),
                    array('label' => 'Gestion', 'url' => '/gruposuarez/gestion'),
                    array(
                        'label' => 'Soporte',
                        'url' => '#',                    
                        'items' => array(
                         array('label' => '** PROYECTOS **'),                          
                            array('label' => '1. Acuerdo de Cobros', 'url' => '/gruposuarez/acuerdocobros'),
                            array('label' => '2. Gestion Llamadas', 'url' => '/gruposuarez/gestionllamadas'),
                            array('label' => '3. Gestion Correos', 'url' => '/gruposuarez/gestioncorreos'),
                            array('label' => '4. Cartera', 'url' => '/gruposuarez/cartera'),
                            array('label' => '5. Proyectos', 'url' => '/gruposuarez/proyecto'),                        
                            '---',
                            array('label' => '** USUARIOS **'),
                            array('label' => 'Usuarios', 'url' => '/gruposuarez/usuarios'),
                            array(
                                'label' => 'Roles',
                                'url' => '#'
                            ),
                              '---',
                            array('label' => '** Metas **'),
                            array('label' => 'Table de Referecnia - Bono', 'url' => '/gruposuarez/tipoCartera'),
                            array(
                                'label' => 'Plan de Remuneración',
                                'url' => '/gruposuarez/pagoRemuneracion'
                            ),
                        )
                    ),
                ),
            ),
            '<form class="navbar-form navbar-left" action=""><div class="form-group"><input type="text" class="form-control" placeholder="Search"></div></form>',
            array(
                'class' => 'booster.widgets.TbMenu',
                'type' => 'navbar',
                'htmlOptions' => array('class' => 'pull-right'),
                'items' => array(
                    array('label' => 'Link', 'url' => '#'),
                    '---',
                    array(
                        'label' => 'Dropdown',
                        'url' => '#',
                        'items' => array(
                            array('label' => 'Action', 'url' => '#'),
                            array('label' => 'Another action', 'url' => '#'),
                            array(
                                'label' => 'Something else here',
                                'url' => '#'
                            ),
                            '---',
                            array('label' => 'Separated link', 'url' => '#'),
                        )
                    ),
                ),
            ),
        ),
    )
);
?>
 </header>                              
                                
<div class="container" id="main">
 <?php if(isset($this->breadcrumbs)):?>
 <?php $this->widget('bootstrap.widgets.TbBreadcrumbs', array(
 'links'=>$this->breadcrumbs,
 )); ?>
 <?php endif?>
 <?php echo $content; ?>
 <hr>
 <footer>
 Copyright &copy; <?php echo date('Y'); ?> Valor Technology |  All Rights Reserved.<br/>
 <?php //echo Yii::powered(); ?>
 </footer>
 
</div>

</body>
</html>
