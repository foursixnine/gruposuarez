<?php
$this->menu=array(
array('label'=>'Asignar Proyecto a Cobradora','url'=>array('metas/admin')),

);
?>


<button type="button" class="btn btn-warning">C&#193;LCULO DE REMUNERACI&#211;N COBRADORA</button>

<?php

 
$this->widget('booster.widgets.TbGridView',array(
'id'=>'usuarios-grid',
'dataProvider'=>$cobradora->projectcobrador(),
//'filter'=>$model,
'columns'=>
        array(
		
		'idUsuario.nombre',
		'idUsuario.apellido',
		
            'mes0.descripcion',
'buttons' => 
   array(
            'class'=>'CButtonColumn',
                        'template' => '{iniciar_calculo}',
                        'buttons' => array(
                             'iniciar_calculo' => array(
                                    'label'=>'Calcular Remuneración',
                                    'imageUrl'=>Yii::app()->request->baseUrl.'/images/calculo.png',
                                    'url'=>'Yii::app()->createUrl("/calculoRemuneracion/cobradoraproyectosall/",array("id"=>$data["id_usuario"],"mes"=>$data["mes"]))',
                                    
                        ),
                        /*     'ver_proyectos' => array(
                                    'label'=>'Ver Proyectos Asociados',
                                    'imageUrl'=>Yii::app()->request->baseUrl.'/images/view_source.png',
                                    'url'=>'Yii::app()->createUrl("/calculoRemuneracion/proyectoscobradoras/",array("id"=>$data["id_usuario"]))',
                                                                                                                                //("foo/foo",array("int"=>"1","cfm"=>"8"));
                        )  */
                            )
            ), 

		

),
));

?>
