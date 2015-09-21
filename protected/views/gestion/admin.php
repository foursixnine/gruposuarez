<?php
$this->breadcrumbs=array(
	'Gestions'=>array('index'),
	'Manage',
);

$this->menu=array(
array('label'=>'List Gestion','url'=>array('index')),
array('label'=>'Create Gestion','url'=>array('create')),
);

$urlJoin = Yii::app()->urlManager->getUrlFormat() == 'path' ? '?' : '&';
Yii::app()->clientScript->registerScript('search', "
    $('#exportToExcel').click(function(){
        window.location = '". $this->createUrl('admin')  . $urlJoin . "' + $(this).parents('form').serialize() + '&export=true';
        return false;
    });
    $('.search-form form').submit(function(){
        $.fn.yiiGridView.update('some-grid', {
            data: $(this).serialize()
        });
        return false;
    });
");
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

<h1>Manage Gestions</h1>

<p>
	You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>
		&lt;&gt;</b>
	or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php /*echo CHtml::link('Advanced Search','#',array('class'=>'search-button btn')); ?>
<div class="search-form" style="display:none">
	<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); */?>
</div><!-- search-form -->

<?php 
/*

$this->widget('booster.widgets.TbGridView',array(
'id'=>'gestion-grid',
'dataProvider'=>$model->noventadias(),
'filter'=>$model,
'columns'=>array(
                'id_cliente',
			
array(
'class'=>'booster.widgets.TbButtonColumn',
),
),
));
*/

/*$this->widget('booster.widgets.TbGridView',array(
'id'=>'gestion-grid',
'dataProvider'=>$model->search(),
'filter'=>$model,
'columns'=>array(
		'id_gestion',
		'id_cliente',
		'contactado_llamada',
		'llamada_voz',
		'id_acuerdo_cobros',
		'fecha_acuerdo',
	
array(
'class'=>'booster.widgets.TbButtonColumn',
),
),
)); */?>

<?php $this->widget('application.components.widgets.tlbExcelView', array(
    'id'                   => 'some-grid',
    'dataProvider'         => $model->search(),
    'grid_mode'            => $production, // Same usage as EExcelView v0.33
    //'template'           => "{summary}\n{items}\n{exportbuttons}\n{pager}",
    'title'                => 'Some title - ' . date('d-m-Y - H-i-s'),
    'creator'              => 'Your Name',
    'subject'              => mb_convert_encoding('Something important with a date in French: ' . utf8_encode(strftime('%e %B %Y')), 'ISO-8859-1', 'UTF-8'),
    'description'          => mb_convert_encoding('Etat de production généré à la demande par l\'administrateur (some text in French).', 'ISO-8859-1', 'UTF-8'),
    'lastModifiedBy'       => 'Some Name',
    'sheetTitle'           => 'Report on ' . date('m-d-Y H-i'),
    'keywords'             => '',
    'category'             => '',
    'landscapeDisplay'     => true, // Default: false
    'A4'                   => true, // Default: false - ie : Letter (PHPExcel default)
    'RTL'                  => false, // Default: false - since v1.1
    'pageFooterText'       => '&RThis is page no. &P of &N pages', // Default: '&RPage &P of &N'
    'automaticSum'         => true, // Default: false
    'decimalSeparator'     => ',', // Default: '.'
    'thousandsSeparator'   => '.', // Default: ','
    //'displayZeros'       => false,
    //'zeroPlaceholder'    => '-',
    'sumLabel'             => 'Column totals:', // Default: 'Totals'
    'borderColor'          => '00FF00', // Default: '000000'
    'bgColor'              => 'FFFF00', // Default: 'FFFFFF'
    'textColor'            => 'FF0000', // Default: '000000'
    'rowHeight'            => 45, // Default: 15
    'headerBorderColor'    => 'FF0000', // Default: '000000'
    'headerBgColor'        => 'CCCCCC', // Default: 'CCCCCC'
    'headerTextColor'      => '0000FF', // Default: '000000'
    'headerHeight'         => 10, // Default: 20
    'footerBorderColor'    => '0000FF', // Default: '000000'
    'footerBgColor'        => '00FFCC', // Default: 'FFFFCC'
    'footerTextColor'      => 'FF00FF', // Default: '0000FF'
    'footerHeight'         => 50, // Default: 20
    'columns'              => $grid // an array of your CGridColumns
)); ?>