<?php
$this->breadcrumbs=array(
	'Remuneración'=>array('index'),
	'Calculo Remuneración',
);

$this->menu=array(
	array('label'=>'Volver','url'=>array('/gestion/index')),
    
);
?>

<br/>
<?php

$this->widget('bootstrap.widgets.TbTabs', array(
    'tabs'=>array(
            array(
            'id'=>'tab1',
            'active'=>true,
            'label'=>'CALCULO REMUNERACION',
            'content'=>$this->renderPartial("_formall", array(
                                                                'model'=>$model,            
                    'cartera_vencidad'=>$cartera_vencidad,
                    'cobrado'=>$cobrado,
                    'tablar'=>$tablar,
                    'count_proyecto_vencida'=>$count_proyecto_vencida,
                    'count_proyecto_corriente'=>$count_proyecto_corriente,
                    'cartera_corriente'=>$cartera_corriente,
                    'pivote_inicio_mes'=> $pivote_inicio_mes,
                    'pivote_final_mes'=>$pivote_final_mes,
                    'id'=>$id,
                  'pago_remu'=>$pago_remu,
                  //  'meta_corriente'=>$meta_corriente,

                                                                    ),true),
            ),
            array(
            'id'=>'tab2',
            'active'=>false,
            'label'=>'CART. VENCIDA',
            'content'=>$this->renderPartial("_carteravencida", array(
                                                                'model'=>$model,            
                                                       //         'metas'=>$metas,
                                                                'cobrado'=>$cobrado,
                                                                'tablar'=>$tablar,
                                                                'pivote_inicio_mes'=> $pivote_inicio_mes,
                                                                'pivote_final_mes'=>$pivote_final_mes, 
                                                                'cartera_vencidad'=>$cartera_vencidad,
                                                                'count_proyecto_vencida'=>$count_proyecto_vencida,

                                                                    ),true),
        ),
      /*  array(
            'id'=>'tab3',
            'active'=>false,
            'label'=>'CART. CORRIENTE',
            'content'=>$this->renderPartial("_carteracorriente", array(
                                                                'model'=>$model,
                                                                'cobrado'=>$cobrado,
                                                                'tablar'=>$tablar,
                                                                'pivote_inicio_mes'=> $pivote_inicio_mes,
                                                                'pivote_final_mes'=>$pivote_final_mes,
                                                                'cartera_corriente'=>$cartera_corriente,
                                                                'count_proyecto_corriente'=>$count_proyecto_corriente,
                                                                    ),true),              
        ),*/ 
         array(
            'id'=>'tab3',
            'active'=>false,
            'label'=>'TRASLADO DE CARTERA',
            'content'=>$this->renderPartial("_incrementodecremento", array(
                                                                'model'=>$model,
                                                                'cobrado'=>$cobrado,
                                                                'tablar'=>$tablar,
                                                                'pivote_inicio_mes'=> $pivote_inicio_mes,
                                                                'pivote_final_mes'=>$pivote_final_mes,
                                                                'cartera_corriente'=>$cartera_corriente,
                                                                'cartera_vencidad'=>$cartera_vencidad,
                                                                'count_proyecto_corriente'=>$count_proyecto_corriente,
                                                                'count_proyecto_vencida'=>$count_proyecto_vencida,
                                                                    ),true),               
        ),
              

    ),
)); 
?>

 