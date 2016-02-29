<?php $form=$this->beginWidget('booster.widgets.TbActiveForm',array(
/*	'id'=>'tramite-pasos-form',
	'enableAjaxValidation'=>false,
     'type' => 'inline',
     'htmlOptions' => array('class' => 'well'),*/

		'id' =>'tramite-pasos-form',
		'type' => 'horizontal',
	   'enableAjaxValidation'=>true

   
)); 
 
?>
<?php
$this->menu=array(
array('label'=>'Volver','url'=>array('tramite/admin')),

);
?>
 

<button type="button" class="btn btn-warning">DATOS DE ENTREGA</button>
       <br/>  
 
        <br/>
        <?php 

        echo $form->textAreaGroup(
			$model,
			'descripcion',

			array(
				'wrapperHtmlOptions' => array(
					'class' => 'col-sm-5',
          'value' => "12",
				),
				'widgetOptions' => array(
					'htmlOptions' => array('rows' => 5),
				)
			)
		); 

	    echo $form->datePickerGroup($model,'fecha_entrega',
                                array('widgetOptions'=>array('options'=>array(
                                                             'format' => 'yyyy-mm-dd'
                                ),
                                'htmlOptions'=>array('class'=>'span5')), 
                                'prepend'=>'<i class="glyphicon glyphicon-calendar"></i>')); 
    
       echo $form->radioButtonListGroup(
			$model,
			'casa_entregada',
			array(
				'widgetOptions' => array(
					'data' => array(
						'SI',
						'NO',
					)
				)
			)
		); ?>
       <br/>     

<?php echo CHtml::submitButton('GUARDAR',array('name'=>'updatetramite')); ?>

<?php $this->endWidget(); ?>
<br/>

<?php $collapse = $this->beginWidget('booster.widgets.TbCollapse'); ?>

<div class="panel-group" id="accordion">
    
  <div class="panel panel-primary">
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

 
 

   <div class="panel panel-success">
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

 
  <div class="panel panel-warning">
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
 

  <div class="panel panel-danger">
    <div class="panel-heading">
      <h2 class="panel-title">
        <a data-toggle="collapse" data-parent="#accordion" href="#collapseCuatro">
          PASO 4
        </a>
      </h2>
    </div>
    <div id="collapseCuatro" class="panel-collapse collapse">
      <div class="panel-body">
               <?php 
         
           foreach ($tramitesliquidados as $valor=>$clave) {    
             
            if($clave['id_paso']==4){
                
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



  <div class="panel panel-info">
    <div class="panel-heading">
      <h2 class="panel-title">
        <a data-toggle="collapse" data-parent="#accordion" href="#collapseCinco">
          PASO 5
        </a>
      </h2>
    </div>
    <div id="collapseCinco" class="panel-collapse collapse">
      <div class="panel-body">
               <?php 
         
           foreach ($tramitesliquidados as $valor=>$clave) {    
             
            if($clave['id_paso']==5){
                
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




  <div class="panel panel-success">
    <div class="panel-heading">
      <h2 class="panel-title">
        <a data-toggle="collapse" data-parent="#accordion" href="#collapseSeis">
          PASO 6
        </a>
      </h2>
    </div>
    <div id="collapseSeis" class="panel-collapse collapse">
      <div class="panel-body">
               <?php 
         
           foreach ($tramitesliquidados as $valor=>$clave) {    
             
            if($clave['id_paso']==6){
                
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




  <div class="panel panel-warning">
    <div class="panel-heading">
      <h2 class="panel-title">
        <a data-toggle="collapse" data-parent="#accordion" href="#collapseSiete">
          PASO 7
        </a>
      </h2>
    </div>
    <div id="collapseSiete" class="panel-collapse collapse">
      <div class="panel-body">
               <?php 
         
           foreach ($tramitesliquidados as $valor=>$clave) {    
             
            if($clave['id_paso']==7){
                
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




  <div class="panel panel-danger">
    <div class="panel-heading">
      <h2 class="panel-title">
        <a data-toggle="collapse" data-parent="#accordion" href="#collapseOcho">
          PASO 8
        </a>
      </h2>
    </div>
    <div id="collapseOcho" class="panel-collapse collapse">
      <div class="panel-body">
               <?php 
         
           foreach ($tramitesliquidados as $valor=>$clave) {    
             
            if($clave['id_paso']==8){
                
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

    <div class="panel panel-info">
    <div class="panel-heading">
      <h2 class="panel-title">
        <a data-toggle="collapse" data-parent="#accordion" href="#collapseNueve">
          PASO 9
        </a>
      </h2>
    </div>
    <div id="collapseNueve" class="panel-collapse collapse">
      <div class="panel-body">
               <?php 
         
           foreach ($tramitesliquidados as $valor=>$clave) {    
             
            if($clave['id_paso']==8){
                
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


  <div class="panel panel-success">
    <div class="panel-heading">
      <h2 class="panel-title">
        <a data-toggle="collapse" data-parent="#accordion" href="#collapseDiez">
          PASO 10
        </a>
      </h2>
    </div>
    <div id="collapseDiez" class="panel-collapse collapse">
      <div class="panel-body">
               <?php 
         
           foreach ($tramitesliquidados as $valor=>$clave) {    
             
            if($clave['id_paso']==10){
                
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



  <div class="panel panel-warning">
    <div class="panel-heading">
      <h2 class="panel-title">
        <a data-toggle="collapse" data-parent="#accordion" href="#collapseOnce">
          PASO 11 
        </a>
      </h2>
    </div>
    <div id="collapseOnce" class="panel-collapse collapse">
      <div class="panel-body">
               <?php 
         
           foreach ($tramitesliquidados as $valor=>$clave) {    
             
            if($clave['id_paso']==10){
                
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