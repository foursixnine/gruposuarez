<?php $form=$this->beginWidget('booster.widgets.TbActiveForm',array(
/*	'id'=>'tramite-pasos-form',
	'enableAjaxValidation'=>false,
     'type' => 'inline',
     'htmlOptions' => array('class' => 'well'),*/

		'id' =>'tramite-pasos-form',
		'type' => 'horizontal',
	
   
)); 
 
?>
<?php
$this->menu=array(
array('label'=>'Volver','url'=>array('tramite/admin')),

);
?>

<!----------------------------------------------------------------------------------->

<button type="button" class="btn btn-warning">Actualizaci&oacute;n de Tramite</button>

 
        <br/>
        <?php echo $form->textAreaGroup(
			$model,
			'descripcion',
			array(
				'wrapperHtmlOptions' => array(
					'class' => 'col-sm-5',
				),
				'widgetOptions' => array(
					'htmlOptions' => array('rows' => 5),
				)
			)
		); ?>
	
        <?php echo $form->textFieldGroup($model,'casa_entregada',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5')))); ?>           
        <br/>        
        <?php echo CHtml::submitButton('GUARDAR',array('name'=>'updatetramite')); ?>

<?php $this->endWidget(); ?>
<br/>

<!-------------------BITACORA DEL TRAMITE--------------------------------->
<?php $collapse = $this->beginWidget('booster.widgets.TbCollapse'); ?>

<div class="panel-group" id="accordion">
    
  <div class="panel panel-default">
    <div class="panel-heading">
      <h1 class="panel-title">
        <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
          ACTIVIDAD DEL TRAMITE
        </a>
      </h1>
    </div>
    <div id="collapseOne" class="panel-collapse collapse in">
      


            <?php $this->widget('booster.widgets.TbGridView',array(
            'id'=>'tramite-actividad-grid',
            'dataProvider'=>$tramitesactividad,
            'columns'=>array(
                            'idPaso.descripcion',
                            'idEstado.descripcion',
                            'observaciones',
                            'fecha_tramite_actividad',                              
                            )
                        )   
                );?>
    
    
    
    </div>
    </div>

    
 <!-------------------------PASO 1------------------------>
 
 
 
   <div class="panel panel-default">
    <div class="panel-heading">
      <h1 class="panel-title">
        <a data-toggle="collapse" data-parent="#accordion" href="#collapseDos">
          PASO 1
        </a>
      </h1>
    </div>
    <div id="collapseDos" class="panel-collapse collapse in">
      <div class="panel-body">
       
           <?php 
         
           foreach ($tramitesliquidados as $valor=>$clave) {    
             
            if($clave['id_paso']==1){
                
            echo $message = "<table>
                                <tr>
                                    <td><strong>Fecha de Inicio del Tramite:</strong></td>
                                    <td> ".$clave['fecha_inicio']."</td>
                                </tr>
                                <tr>
                                    <td><strong>Fecha Cambio de Paso:</strong></td>
                                    <td> ".$clave['fecha_paso']."</td>
                                </tr>                           
                           </table>";
                                    }
            }

        ?>  
      </div>
    </div>
  </div>
 
 <!--------------------------------PASO 2-------------------------------------------->
  <div class="panel panel-default">
    <div class="panel-heading">
      <h2 class="panel-title">
        <a data-toggle="collapse" data-parent="#accordion" href="#collapseTres">
          PASO 2
        </a>
      </h2>
    </div>
    <div id="collapseTres" class="panel-collapse collapse">
      <div class="panel-body">
        
                 <?php 
         
           foreach ($tramitesliquidados as $valor=>$clave) {    
             
            if($clave['id_paso']==2){
                
            echo $message = "<table>
                                <tr>
                                    <td><strong>Fecha de Inicio del Tramite:</strong></td>
                                    <td> ".$clave['fecha_inicio']."</td>
                                </tr>
                                <tr>
                                    <td><strong>Fecha Cambio de Paso:</strong></td>
                                    <td> ".$clave['fecha_paso']."</td>
                                </tr>                           
                           </table>";
                                    }
            }

        ?> 
          
      </div>
    </div>
  </div>
 
 <!--------------------------------------------->
  <div class="panel panel-default">
    <div class="panel-heading">
      <h2 class="panel-title">
        <a data-toggle="collapse" data-parent="#accordion" href="#collapseCuatro">
          PASO 3
        </a>
      </h2>
    </div>
    <div id="collapseCuatro" class="panel-collapse collapse">
      <div class="panel-body">
               <?php 
         
           foreach ($tramitesliquidados as $valor=>$clave) {    
             
            if($clave['id_paso']==1){
                
            echo $message = "<table>
                                <tr>
                                    <td><strong>Fecha de Inicio del Tramite:</strong></td>
                                    <td> ".$clave['fecha_inicio']."</td>
                                </tr>
                                <tr>
                                    <td><strong>Fecha Cambio de Paso:</strong></td>
                                    <td> ".$clave['fecha_paso']."</td>
                                </tr>                           
                           </table>";
                                    }
            }

        ?> 
      </div>
    </div>
  </div>
</div>
<?php $this->endWidget(); ?>