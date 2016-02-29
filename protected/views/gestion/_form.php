<?php $form=$this->beginWidget('booster.widgets.TbActiveForm',array(
	'id'=>'gestion-form',
	'enableAjaxValidation'=>false,
));
 ?>
 
<script>
$(function(){
    $('select#Gestion_llamada_voz').prop('disabled', true);
    $('select#Gestion_contactado_llamada').change(function () {
        
        //alert("Entre a la funcion");
        
       // document.getElementById('Gestion_contactado_llamada').value;
        $valor=(document.getElementById('Gestion_contactado_llamada').value);
      //alert($valor);
        if($valor==2){
    $('select#Gestion_llamada_voz').attr("disabled", false);
            //$('select#Gestion_llamada_voz').prop('disabled', false);
        }else{
    $('select#Gestion_llamada_voz').attr("disabled", true);
           // $('select#Gestion_llamada_voz').prop('disabled', true); 
        
        }
        
    });
    
        
    $('select#Gestion_id_gestion_llamadas').click(function () {
       
       
       document.getElementById('Gestion_id_gestion_llamadas').value;
        $valor=(document.getElementById('Gestion_id_gestion_llamadas').value);
    // alert( $valor);
           if($valor==1){
                document.getElementById('treinta').style.display='block';
           }else{
                document.getElementById('treinta').style.display='none';
           }
           
           if($valor==2){
                document.getElementById('sesenta').style.display='block';
           }else{
                document.getElementById('sesenta').style.display='none';
           }
           
           if($valor==3){
                document.getElementById('noventa').style.display='block';
           }else{
                document.getElementById('noventa').style.display='none';
           }
           
           if($valor==5){
                document.getElementById('cientoveinte').style.display='block';
           }else{
                document.getElementById('cientoveinte').style.display='none';
           }
});

});
</script>     
 <?php  $id=$cliente->id_cliente; ?>
 <?php  $idgs=$cliente->id_cliente_gs; ?>
 <?php   $crm_proyecto=$cliente->id_proyecto; ?>
<?php  $model->id_crm_proyecto=$crm_proyecto; ?>
   <?php  $model->id_cliente=$id; ?>
 <?php   $model->id_cliente_gs=$idgs; ?>
<div class="panel-group" id="accordion">
  <!--<div class="panel panel-default">-->
  <div class="panel panel-primary">
    <div class="panel-heading">
      <h2 class="panel-title">
        <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
          #ID<?php echo $id; ?> - <?php echo $cliente->nombre;?> - 
             <?php 
         
                        if ($cliente->proyecto!=""){
                                echo $cliente->proyecto; 
                        }
	
	     ?>
        </a>
    
      </h2>
    </div>
      
<div id="collapseOne" class="panel-collapse collapse in">
      
<?php $form->errorSummary($model); ?>

		<?php //echo $form->hiddenField($model,'id_cliente', array('class'=>'span5')) ?>
        
                <?php echo $form->hiddenField($model,'id_crm_proyecto', array('class'=>'span5')) ?>
                <?php //echo $form->hiddenField($model,'id_cliente_gs', array('class'=>'span5')) ?>
 
   <?php //$model->fecha_creacion='2015-07-14';?>
              <?php echo $form->hiddenField($model,'fecha_creacion', array('class'=>'span5')) ?>
   <?php echo $form->hiddenField($model,'id_cliente', array('class'=>'span5')) ?>
        <?php echo $form->hiddenField($model,'id_cliente_gs', array('class'=>'span5')) ?>
  <b><?php echo $form->labelEx($model, 'Contactado');?></b><br />
  
      <?php
            
           $this->widget(
            'booster.widgets.TbSelect2',
                         array(
      'model'=>$model,
  'attribute'=>'contactado_llamada',
                           
  'data'=>array(
    1=>'Si',
    2=>'No',
  ),
              'htmlOptions' => array(
                    'placeholder' => "----",
                            
            
                ),
                             )
); 
     
     ?>
   <br />
       <b><?php echo $form->labelEx($model, 'Mensaje de voz');?></b>
        <br />
      <?php
           $this->widget(
            'booster.widgets.TbSelect2',
                         array(
      'model'=>$model,
  'attribute'=>'llamada_voz',
                            
  'data'=>array(
    1=>'Si',
    2=>'No',
  ),
              'htmlOptions' => array(
                    'placeholder' => "----",
                            
            
                ),
                             )
); 
 /*
        $this->widget(
            'booster.widgets.TbSelect2',
            array(
                  'model' => $model,
                'name' => 'llamada_voz',
                'id' => 'llamada_voz',
                'data' => array(1 => 'SI', 2 => 'NO'),
                'htmlOptions' => array(
                    'placeholder' => "----",
                            
            
                ),
            )
        );*/
     ?>
    <br />
    <b><?php echo $form->labelEx($model, 'Acuerdo');?></b>
        <br />
        <!-- Auto Completar Acuerdo de Cobros -->     
        <?php
                    $this->widget(
                      'booster.widgets.TbSelect2', array(
                      'model' => $model,
                      'attribute' => 'id_acuerdo_cobros',
                      'data' => CHtml::listData(AcuerdoCobros::model()->findAll(), 'id_acuerdo_cobros', 'descripcion'),
                      'options' => array(
                      'placeholder' => "ACUERDO",
                       /* 'allowClear'=>true,
                        'minimumInputLength'=>2,*/
                      ),
                      'htmlOptions'=>array(
                        'style'=>'width:380px',
                      ),
                    ));
        ?>
        <br/>
        
   
    <?php echo $form->error($model,'id_acuerdo_cobros'); ?>
    
	<?php echo $form->datePickerGroup($model,'fecha_acuerdo',
    array('widgetOptions'=>array('options'=>array(
                                 'format' => 'yyyy-mm-dd'
    ),
            'htmlOptions'=>array('class'=>'span5')), 
            'prepend'=>'<i class="glyphicon glyphicon-calendar"></i>', 
            'append'=>'Haga click en el Mes o A&ntilde;o para seleccionar uno diferente')); 
    ?>
        <br />
        <b><?php echo $form->labelEx($model, 'Script para llamadas');?></b><br/>
	<?php
	$model->id_gestion_llamadas=3;
                    $this->widget(
                      'booster.widgets.TbSelect2', array(
                      'model' => $model,                                          
                      'attribute' => 'id_gestion_llamadas',
                      'data' => CHtml::listData(Gestionllamadas::model()->findAll(), 'id_gestion_llamadas', 'descripcion'),
                      'options' => array(
                       'placeholder' => "Gestión Llamadas",
                      ),
                      'htmlOptions'=>array(
                        'style'=>'width:380px',
                      ),
                    ));
          
        ?>
        <div id="treinta" style="display:none;">
            <br/>
            <p><strong style="color:blue">Llamada para cuando la letra esté entre 30 d&iacute;as</strong></p>
            
            <div class="panel panel-info"><p>
                    <strong>1.1 SALUDAR </strong><br/>
                    Buenos días - tardes!<br/>
                    Señor(a) <strong><?php echo $cliente->nombre; ?><br/></strong>
                    Gusto en saludarle.<br/>
                    <strong>1.2. PRESENTARSE </strong>
                    Le saluda -----,<br/> de parte de Grupo Suárez.<br/>
                    El motivo de mi llamada es para notificarle 
                    que su letra con monto correspondiente a ------ ha vencido el día -----. <br/>
                    Le recuerdo que tiene hasta el 30 de este mes para poder realizar su pago. 
                    Puede venir personalmente a nuestras oficinas en Vía España, Edificio 
                    los Toneles Planta Baja para pagarlo o realizar una transferencia a cuenta directa. 
                    Me gustaría confirmar la fecha en la que realizará este abono, con el fin de evitar que caiga en
                    incumplimiento esta letra. <br/>

                    <strong>1.3. DESPEDIRSE Y AGRADECER </strong>
                </p></div>
        

        </div>
        
        <div id="sesenta" style="display:none;">
            
                  <br/>
                  <p><strong style="color:blue">2. Llamada para cuando la letra esté en 60 d&iacute;as</strong></p>
            
            <div class="panel panel-info"><p>
                    <strong>2.1 SALUDAR </strong><br/>
                    Buenos días - tardes!<br/>
                    Señor(a) <strong><?php echo $cliente->nombre; ?><br/></strong>
                    Gusto en saludarle.<br/>
                    <strong>2.2. PRESENTARSE </strong><br/>
                    Le saluda <?php echo Yii::app()->user->isGuest; ?>,<br/> de parte de Grupo Suárez.<br/>
                    El motivo de mi llamada es para notificarle que su 
                    letra con monto correspondiente a ------ ha vencido el día -----. Su pago ha pasado el plazo de los 30 días y está 
                    generando un incumplimiento en su cuenta. Para poder resolver esto puede venir personalmente a pagar en nuestras oficinas 
                    en Vía España,Edificio los Toneles Planta Baja o realizar una transferencia a cuenta directa. 
                    Me gustaría confirmar la fecha en la que realizará el pago de esta 
                    letra, con el fin de evitar que caiga en un segundo incumplimiento. <br/>
                    <strong>2.3 DESPEDIRSE Y AGRADECER</strong>

                </p></div>
        
        </div>
        
        <div id="noventa" style="display:block;">
            
                      <br/>
                      <p><strong style="color:blue">3. Llamada para cuando la letra esté entre 61-90 d&iacute;as:</strong></p>
            
            <div class="panel panel-info"><p>
                    <strong>3.1 SALUDAR </strong><br/>
                    Buenos días - tardes!<br/>
                    Señor(a) <strong><?php echo $cliente->nombre; ?><br/></strong>
                    Gusto en saludarle.<br/>
                    <strong>3.2. PRESENTARSE </strong>
                    Le saluda -----,<br/> de parte de Grupo Suárez.<br/>
                    El motivo de mi llamada es para notificarle que su letra con 
                    monto correspondiente a ------ ha vencido el día -----. Su pago ha pasado el 
                    plazo de los 60 días por lo que tiene dos incumplimientos de pago de letra. 
                    Quisiera confirmar la fecha efectiva del pago para actualizar el estado de su 
                    cartera y evitar un posible retiro del proyecto. Sin embargo, me gustaría
                    conocer si ha tenido alguna situación 
                    especial por la cual no ha podido realizar sus pagos a tiempo. <br/>

                    <strong>3.3. SOLICITAR RAZON DE DEMORA </strong><br/>
                    
                    Entiendo su situación, tiene alguna propuesta de pago en mente para que pueda 
                    establecer un  acuerdo con usted y no nos veamos perjudicados?<br/>
                    
                    <strong>3.4. PAUSA DE 3 SEGUNDOS PARA VER SI CLIENTE PROPONE EL PAGO DEL MONTO PENDIENTE</strong><br/>
                    <p>Si la respuesta es negativa: </p>
                    <br/>
                    <p>
                    Entiendo su situación, tiene alguna propuesta de pago en mente para que pueda 
                    establecer un  acuerdo con usted y no nos veamos perjudicados?<br/>
                    Ante su negativo no tenemos más opción que establecer como fecha de pago el ---- (fecha). Le reitero que mi 
                    intención no es perjudicarlo sino tener la mejor relación comercial con usted, por esto esperamos su colaboración con 
                    el pago oportuno de su deuda.
                    </p>
                    <br/>
                    <p>Si la respuesta es positiva: </p><br/>
                    <p>Esperaré su pago el día ----- con $ ----- (Monto).</p><br/>
                    <strong>3..5. DESPEDIRSE Y AGRADECER</strong>
            </div>
        
        </div>
        
        <div id="cientoveinte" style="display:none;">
            
            <p><strong style="color:blue">4. Llamada para cuando la letra esté entre 91-120 d&iacute;as:</strong><br/>
                    <div class="panel panel-info">
                        <p>
                
4.1 SALUDAR 

Buenos días - tardes!

Señor(a) --------- (Nombre de la Persona)

Gusto en saludarle.

4.2. PRESENTARSE 

Le saluda -----, de parte de Grupo Suárez. El motivo de mi llamada es para notificarle que su letra con 
monto correspondiente a ------ ha vencido el día -----. Su pago ha pasado el plazo de los 90 días por lo 
que tiene tres incumplimientos de pago de letra. Tiene alguna propuesta de pago en mente para que pueda 
establecer un acuerdo con usted y no vernos perjudicados? 

4.3. PAUSA DE 3 SEGUNDOS PARA VER SI CLIENTE PROPONE EL PAGO DEL MONTO PENDIENTE. 

Si la respuesta es negativa: 
Ante su negativo no tengo más opción que establecer como fecha límite de pago el ---- (fecha). 
Le reitero que mi intención no es perjudicarlo sino tener la mejor relación comercial con usted, 
pero al haberse vencido el plazo de los 90 días, me veré en la obligación de pasar su caso a Ventas para ser 
analizado y evaluar los pasos a seguir con su cuenta con la posibilidad de que sea retirado del proyecto. Una vez más, 
le reitero que me gustaría evitar esta situación, por lo que respetuosamente le solicito realizar su pago antes del día ---- 
del mes-----. Tenga en cuenta que esta es la última fecha establecida para su pago 
antes de enviar su caso al comité como le acabo de especificar. 

Si la respuesta es positiva: 

Esperaré su pago el día ----- con $ ----- (Monto).

4.4. DESPEDIRSE Y AGRADECER
                
                            
                        </p>    
                    </div>

                
            </p>
        </div>
        
        <br/><br/>
        <?php echo $form->textAreaGroup(
			$model,
			'observaciones',
			array(
				'wrapperHtmlOptions' => array(
					'class' => 'col-sm-5',
				),
				'widgetOptions' => array(
					'htmlOptions' => array('rows' => 5),
				)
			)
		); ?>
<br/>
<br/>

	<?php $this->widget('booster.widgets.TbButton', array(
			'buttonType'=>'submit',
			'context'=>'primary',
			'label'=>$model->isNewRecord ? 'Crear Gestión' : 'Save',
		)); ?>

    </div>
    </div>
  </div>



<!--  DATOS CLIENTES  -->	
<?php $collapse = $this->beginWidget('booster.widgets.TbCollapse'); ?>

  <div class="panel panel-default">
    <div class="panel-heading">
      <h2 class="panel-title">
        <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
          DATOS GENERALES
        </a>
      </h2>
    </div>
    <div id="collapseTwo" class="panel-collapse collapse">
      <div class="panel-body">
        <?php 
        //Nombre Cliente
        echo $form->textFieldGroup(
			$cliente,
			'nombre',
			array(
				'wrapperHtmlOptions' => array(
					'class' => 'col-sm-5',
				),
				'widgetOptions' => array(
					'htmlOptions' => array('disabled' => true)
				)
			)
		);
        //Apellido Cliente
        echo $form->textFieldGroup(
			$cliente,
			'apellido',
			array(
				'wrapperHtmlOptions' => array(
					'class' => 'col-sm-5',
				),
				'widgetOptions' => array(
					'htmlOptions' => array('disabled' => true)
				)
			)
		); 
        
        //RUC
        echo $form->textFieldGroup(
			$cliente,
			'cedula',
			array(
				'wrapperHtmlOptions' => array(
					'class' => 'col-sm-5',
				),
				'widgetOptions' => array(
					'htmlOptions' => array('disabled' => true)
				)
			)
		);
        //Nombre Nacionalidad
        echo $form->textFieldGroup(
			$cliente,
			'nacionalidad',
			array(
				'wrapperHtmlOptions' => array(
					'class' => 'col-sm-5',
				),
				'widgetOptions' => array(
					'htmlOptions' => array('disabled' => true)
				)
			)
		);
        
        //Sexo
        echo $form->textFieldGroup(
			$cliente,
			'sexo',
			array(
				'wrapperHtmlOptions' => array(
					'class' => 'col-sm-5',
				),
				'widgetOptions' => array(
					'htmlOptions' => array('disabled' => true)
				)
			)
		);

       //Si posse proyecto muetro etiqueta
        if ($cliente->numero_de_lote!=""){
                    echo $form->textFieldGroup(
      $cliente,
      'numero_de_lote',
      array(
        'wrapperHtmlOptions' => array(
          'class' => 'col-sm-5',
        ),
        'widgetOptions' => array(
          'htmlOptions' => array('disabled' => true)
        )
      )
      );
      }
    
      

        //Si posse proyecto muetro etiqueta
        if ($cliente->proyecto!=""){
                    echo $form->textFieldGroup(
			$cliente,
			'proyecto',
			array(
				'wrapperHtmlOptions' => array(
					'class' => 'col-sm-5',
				),
				'widgetOptions' => array(
					'htmlOptions' => array('disabled' => true)
				)
			)
		);
             
        }
        
        ?>
    </div>
    </div>
  </div>
  
  
  <div class="panel panel-info">
    <div class="panel-heading">
      <h2 class="panel-title">
        <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree">
          DATOS CONTACTO
        </a>
      </h2>
    </div>
    <div id="collapseThree" class="panel-collapse collapse">
      <div class="panel-body">
	    <?php 
	    //Si posse proyecto muetro etiqueta
                
            echo $form->textFieldGroup(
			$cliente,
			'correo',
			array(
				'wrapperHtmlOptions' => array(
					'class' => 'col-sm-5',
				),
				'widgetOptions' => array(
					'htmlOptions' => array('disabled' => true)
				)
			)
		);                     
            
            $this->widget(
                    'booster.widgets.TbBadge',
                    array(
                        'context' => 'info',
                        // 'default', 'success', 'info', 'warning', 'danger'
                        'label' => 'Email',
                    )
            );

           $this->widget(
                   'booster.widgets.TbBadge',
                    array(
                        'context' => 'success',
                        // 'default', 'success', 'info', 'warning', 'danger'
                        'label' => 'SMS',
                    )
            );
  
        
            echo $form->textFieldGroup(
			$cliente,
			'numero_casa',
			array(
				'wrapperHtmlOptions' => array(
					'class' => 'col-sm-5',
				),
				'widgetOptions' => array(
					'htmlOptions' => array('disabled' => true)
				)
			)
		);
      
            echo $form->textFieldGroup(
			$cliente,
			'numero_celular',
			array(
				'wrapperHtmlOptions' => array(
					'class' => 'col-sm-5',
				),
				'widgetOptions' => array(
					'htmlOptions' => array('disabled' => true)
				)
			)
		);
         
            
            echo $form->textFieldGroup(
			$cliente,
			'numero_adicional',
			array(
				'wrapperHtmlOptions' => array(
					'class' => 'col-sm-5',
				),
				'widgetOptions' => array(
					'htmlOptions' => array('disabled' => true)
				)
			)
		);
         ?>
          
        <?php //echo $form->textFieldGroup($cliente,'telefono',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5')))); ?>
      </div>
    </div>
  </div>
  
  <div class="panel panel-warning">
    <div class="panel-heading">
      <h2 class="panel-title">
        <a data-toggle="collapse" data-parent="#accordion" href="#collapseFour">
          DATOS REFERENCIA
        </a>
      </h2>
    </div>
    <div id="collapseFour" class="panel-collapse collapse">
      <div class="panel-body">
       
      <?php 
       if ($cliente->referencia_1!=""){
           
                     //Parentesco
                echo $form->textFieldGroup(
			$cliente,
			'referencia_1',
			array(
				'wrapperHtmlOptions' => array(
					'class' => 'col-sm-5',
				),
				'widgetOptions' => array(
					'htmlOptions' => array('disabled' => true)
				)
			)
		); 
                
              echo $form->textFieldGroup(
			$cliente,
			'relacion_ref_1',
			array(
				'wrapperHtmlOptions' => array(
					'class' => 'col-sm-5',
				),
				'widgetOptions' => array(
					'htmlOptions' => array('disabled' => true)
				)
			)
		);   
                  echo $form->textFieldGroup(
			$cliente,
			'telefono_ref_1',
			array(
				'wrapperHtmlOptions' => array(
					'class' => 'col-sm-5',
				),
				'widgetOptions' => array(
					'htmlOptions' => array('disabled' => true)
				)
			)
		);
        echo $form->textFieldGroup(
			$cliente,
			'referencia_2',
			array(
				'wrapperHtmlOptions' => array(
					'class' => 'col-sm-5',
				),
				'widgetOptions' => array(
					'htmlOptions' => array('disabled' => true)
				)
			)
		); 
        
        echo $form->textFieldGroup(
			$cliente,
			'relacion_ref_2',
			array(
				'wrapperHtmlOptions' => array(
					'class' => 'col-sm-5',
				),
				'widgetOptions' => array(
					'htmlOptions' => array('disabled' => true)
				)
			)
		);  
        
        echo $form->textFieldGroup(
			$cliente,
			'telefono_ref_2',
			array(
				'wrapperHtmlOptions' => array(
					'class' => 'col-sm-5',
				),
				'widgetOptions' => array(
					'htmlOptions' => array('disabled' => true)
				)
			)
		);
       }else{
        echo '<p>No Posee</p>';
        
       } 
      ?>  
      </div>
    </div>
  </div>
  
    <div class="panel panel-danger">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a data-toggle="collapse" data-parent="#accordion" href="#collapseFive">
          ULTIMOS CONTACTOS
        </a>
      </h4>
    </div>
    <div id="collapseFive" class="panel-collapse collapse">
      <div class="panel-body">
        <?php 
         //     var_dump($gestion_old);die;
          foreach ($gestion_old as $row) {

            echo $message = "<table><tr>
                            <td><strong>Fecha de Acuerdo:</strong></td>
                            <td style='border: 1px solid #E2E2E2; height:30px; padding-left:5px; padding-right: 5px;'> ".$row['fecha_acuerdo']."</td>
                            </tr>
                            <tr>
                            <td><strong>Observaciones:</strong></td>
                            <td style='border: 1px solid #E2E2E2; height:30px; padding-left:5px; padding-right: 5px;'> ".$row['observaciones']."</td>
                            </tr>
                            <tr>
                             <td><strong>Tipo de Contacto:</strong></td>
                             <td style='border: 1px solid #E2E2E2; height:30px; padding-left:5px; padding-right: 5px;'>
                             
                             </td><br/>
                            
                        </tr></table>";
        }

        ?>  
      </div>
    </div>
  </div>

    <div class="panel panel-info">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a data-toggle="collapse" data-parent="#accordion" href="#collapseSix">
          DATOS COBROS
        </a>
      </h4>
    </div>
    <div id="collapseSix" class="panel-collapse collapse">
      <div class="panel-body">
   
            <table width="100%" height="100%" cellpadding="0" cellspacing="0">
                <tbody>
                        
                    <tr>
                        <td>
                            <?php            
                                echo CHtml::label('Monto Ultimo Pago','',array('size'=>12)); 
                            ?>
                        </td>

                        <td colspan="2"><strong><font color="#610B0B">$<?php  echo $cliente->monto_ultimo_pago;  ?></font> </strong></td>
                    </tr>    
                    <!--Fecha Ingreos Tramite -->
                    <tr>
                        <td>
                            <?php            
                                echo CHtml::label('Fecha de Ultimo Pago','',array('size'=>12));
                            ?>
                        </td>

                        <td colspan="2"><?php echo $cliente->fecha_ultimo_pago;  ?></td>
                    </tr>
                    
                                
                    <tr>
                        <td>
                            <?php            
                                echo CHtml::label('Monto Cuota Abono','',array('size'=>12));
                            ?>
                        </td>

                        <td colspan="2"><strong><font color="#610B0B">$ <?php echo $cliente->total; ?></font> </strong></td>
                    </tr>
                    
                    <tr>
                        <td><?php            
                           echo CHtml::label('Cantidad Cuotas Abono','',array('size'=>12)); ?>
                        </td>            
                        <td colspan="2"><?php echo $cliente->cantidad_de_quotas; ?></td>
                    </tr>
                    
        
                      <tr>
                        <td><?php            
                           echo CHtml::label('Día de Pago','',array('size'=>8));  ?>
                        </td>            
                        <td colspan="2"><?php echo date("d", strtotime($cliente->fecha_de_pago_abono));  ?> </td>
                    </tr>  
                                <tr>
                        <td><?php            
                           echo CHtml::label('Cantidad Cuotas Mejoras ','',array('size'=>8)); ?>
                        </td>            
                        <td colspan="2"><?php echo $cliente->cantidad_de_quotas_mejoras; ?></td>
                    </tr> 
                    
                    <!--OJOOO-->
                    <tr>
                        <td><?php            
                           echo CHtml::label('Fecha pago mejoras','',array('size'=>8)); ?>
                        </td>            
                        <td colspan="2"><?php echo $cliente->fecha_de_pago_abono; ?></td>
                    </tr>
                    
                    <tr>
                        <td><?php            
                           echo CHtml::label('Monto Mensualidad Abono','',array('size'=>8)); ?>
                        </td>            
                        <td colspan="2"><strong><font color="#610B0B">$ <?php echo $cliente->monto_quota_abono; ?> </font> </strong></td>
                    </tr> 
  
                  
     
                    <tr>
                        <td><?php            
                           echo CHtml::label('Monto Mensualidad Mejoras','',array('size'=>8)); ?>
                        </td>      
                        <?php if ($cliente->monto_cuota_mejoras!=""){?>
                        <td><strong><font color="#610B0B">$ <?php echo $cliente->monto_cuota_mejoras; ?></font> </strong></td>
                        <?php } ?>
                        <td><strong><font color="#610B0B"><?php echo $cliente->monto_cuota_mejoras; ?></td>
                    </tr> 
            
                    <tr>
                        <td><?php            
                           echo CHtml::label('0-30','',array('size'=>8)); ?>
                        </td>           
                 
                        <td><strong><font color="#610B0B">$ <?php echo $cliente->cartera_30_dias; ?></font> </strong></td>
                    </tr> 
                    
                    
                    <tr>
                        <td><?php            
                           echo CHtml::label('31-60','',array('size'=>8)); ?>
                        </td>            
                        <td><strong><font color="#610B0B">$ <?php echo $cliente->cartera_60_dias; ?></font> </strong></td>
                    </tr> 
                    
                    <tr>
                        <td><?php            
                           echo CHtml::label('61-90','',array('size'=>8)); ?>
                        </td>            
                        <td><strong><font color="#610B0B">$ <?php echo $cliente->cartera_90_dias; ?></font> </strong></td>
                    </tr>
                    
                    <tr>
                        <td><?php            
                           echo CHtml::label('91-120','',array('size'=>8)); ?>
                        </td>            
                        <td><strong><font color="#610B0B">$ <?php echo $cliente->cartera_120_dias; ?></font> </strong></td>
                    </tr> 
                  
                    <tr>
                        <td><?php            
                           echo CHtml::label('Total Vencido','',array('size'=>8)); ?>
                        </td>            
                        <td><strong><font color="#610B0B">$ <?php echo $cliente->total_vencido; ?></font> </strong></td>
                    </tr>
                     <tr>
                        <td><?php            
                           echo CHtml::label('Total Abonado','',array('size'=>8)); ?>
                        </td>            
                        <td><strong><font color="#610B0B">$ <?php echo $totalabonadof; ?></font> </strong></td>
                    </tr>                 
                </tbody>
            </table>     
      </div>
    </div>
  </div>
<?php $this->endWidget(); ?>

 
<!-------------------------- FIN DATOS CLIENTES ----------------------------------------------->
<!--</fieldset>-->
<?php $this->endWidget(); ?>
