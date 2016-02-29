<script>
$(function(){
  $('#demo').on('hide.bs.collapse', function () {
    $('#button').html('<span class="glyphicon glyphicon-collapse-down"></span> Show');
  })
  $('#demo').on('show.bs.collapse', function () {
    $('#button').html('<span class="glyphicon glyphicon-collapse-up"></span> Hide');
  })
})
</script>

<?php
if($tab){
    $tab1=false;
    $tab2=true;
  
}else{
  //  var_dump($tab);  die;   
    $tab1=true;
    $tab2=false;

}
    
Yii::app()->clientScript->registerCoreScript('jquery');
$this->widget('bootstrap.widgets.TbTabs', array(
    'tabs'=>array(
        array(
            'id'=>'tab1',
            'active'=>$tab1,
            'label'=>'INICIAR TRAMITE',
            'content'=>$this->renderPartial("_form", array(
                                                                     'model'=>$model,
                                                                     'tramite' => $tramite,
                                                                     'pasos'=>$pasos,
                                                                     'tramite_actividad'=>$tramite_actividad,
                'tramitesactividad'=>$tramitesactividad,
                ),true),
            
        ),
       
        array(
            'id'=>'tab2',
            'active'=>$tab2,
            'label'=>'DATOS DEL TRAMITE',
              'content'=>$this->renderPartial("_datosgenerales", array(
                  'tramite' => $tramite, 
                  'calle'=>$calle,
                  'model_adic'=>$model_adic,
                  'tramite_datosgenerales'=>$tramite_datosgenerales,
                                                                       ),true),               

        ), 
        array(
            'id'=>'tab3',
            'active'=>false,
            'label'=>'BITACORA',
                 'content'=>$this->renderPartial("_datosbitacora", array(
                                            'tramiteold' => $tramiteold,
                                            'tramite' => $tramite,
                                            'duracionpasos'=>$duracionpasos,
                                            'pasos'=>$pasos,
                                            'tramite_actividad'=>$tramite_actividad,
                     ),true),

        ),      
        array(
            'id'=>'tab4',
            'active'=>false,
            'label'=>'SEGUIMIENTO',
                 'content'=>$this->renderPartial("_chat", array('chat' => $chat,
                                                                'chat_mostrar'=>$chat_mostrar, 
                     
                     ),true),

        ),   
    ), 
)); 
    
   
?>








        
