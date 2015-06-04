<?php $form=$this->beginWidget('booster.widgets.TbActiveForm',array(
	'id'=>'gestion-form',
	'enableAjaxValidation'=>false,
));
 ?>
 
<script>
$(function(){
        $('select#Gestion_llamada_voz').prop('disabled', true);
    $('select#Gestion_contactado_llamada').change(function () {
        
        alert("Entre a la funcion");
        
       // document.getElementById('Gestion_contactado_llamada').value;
        $valor=(document.getElementById('Gestion_contactado_llamada').value);
         alert($valor);
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
     alert( $valor);
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
           
           if($valor==4){
                document.getElementById('cientoveinte').style.display='block';
           }else{
                document.getElementById('cientoveinte').style.display='none';
           }
});

});
</script>     
 <?php  $id=$cliente->ID_CLIENTE; ?>
   <?php  $model->id_cliente=$id; ?>
<div class="panel-group" id="accordion">
  <!--<div class="panel panel-default">-->
  <div class="panel panel-primary">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
          #ID<?php echo $id; ?> - <?php echo $cliente->NOMBRE;?> - 
             <?php 
         
                        if ($cliente->PROYECTO!=""){
                                echo $cliente->PROYECTO; 
                        }
	
																		?>
        </a>
    
      </h4>
    </div>
    <div id="collapseOne" class="panel-collapse collapse in">
      
<?php $form->errorSummary($model); ?>

		<?php echo $form->hiddenField($model,'id_cliente', array('class'=>'span5')) ?>

  
  
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
      /*
        $this->widget(
            'booster.widgets.TbSelect2',
            array(
                'name' => 'contactado_llamada',
                'id' => 'contactado_llamada',
                'data' => array('1' => 'SI', '2' => 'NO'),
                'htmlOptions' => array(
                    'placeholder' => "----",
                    
                    
                   // 'id' => 'contacto_llamada'
                ),
            )
        );*/
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
	
                    $this->widget(
                      'booster.widgets.TbSelect2', array(
                      'model' => $model,
                //      'id'=>'id_cartera',                            
                      'attribute' => 'id_gestion_llamadas',
                      'data' => CHtml::listData(Gestionllamadas::model()->findAll(), 'id_gestion_llamadas', 'descripcion'),
                      'options' => array(
                        'placeholder' => "Gestión Llamadas",
                       /* 'allowClear'=>true,
                        'minimumInputLength'=>2,*/
                      ),
                      'htmlOptions'=>array(
                        'style'=>'width:380px',
                      ),
                    ));
          
        ?>
        <div id="treinta" style="display:none;">
            <br/>
            <p><strong style="color:blue">SCRIPT PARA 30 D&Iacute;AS</strong></p>
            
            <div class="panel panel-info"><p>
                    <strong>1.1 SALUDAR </strong><br/>
                    Buenos días - tardes!<br/>
                    Señor(a) <strong><?php echo $cliente->NOMBRE; ?><br/></strong>
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
            <p><strong style="color:blue">SCRIPT PARA 60 D&Iacute;AS</strong></p>
            
            <div class="panel panel-info"><p>
                    <strong>1.1 SALUDAR </strong><br/>
                    Buenos días - tardes!<br/>
                    Señor(a) <strong><?php echo $cliente->NOMBRE; ?><br/></strong>
                    Gusto en saludarle.<br/>
                    <strong>1.2. PRESENTARSE </strong>
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
                </p></div>
        
        </div>
        
        <div id="noventa" style="display:none;">
            <p>90 D&iacute;as</p>
                      <br/>
            <p><strong style="color:blue">SCRIPT PARA 90 D&Iacute;AS</strong></p>
            
            <div class="panel panel-info"><p>
                    <strong>1.1 SALUDAR </strong><br/>
                    Buenos días - tardes!<br/>
                    Señor(a) <strong><?php echo $cliente->NOMBRE; ?><br/></strong>
                    Gusto en saludarle.<br/>
                    <strong>1.2. PRESENTARSE </strong>
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
                </p></div>
        
        </div>
        
        <div id="cientoveinte" style="display:none;">
            <p>120 D&iacute;as</p>
            <p><input type="text" name="otro" class="input" value="120" /></p>
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
<br />
<br />

	<?php $this->widget('booster.widgets.TbButton', array(
			'buttonType'=>'submit',
			'context'=>'primary',
			'label'=>$model->isNewRecord ? 'Create' : 'Save',
		)); ?>

    </div>
    </div>
  </div>



<!-----------------------------  DATOS CLIENTES  ------------------------------------->	
<?php $collapse = $this->beginWidget('booster.widgets.TbCollapse'); ?>

  <div class="panel panel-success">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
          DATOS GENERALES
        </a>
      </h4>
    </div>
    <div id="collapseTwo" class="panel-collapse collapse">
      <div class="panel-body">
        <?php 
        //Nombre Cliente
        echo $form->textFieldGroup(
			$cliente,
			'NOMBRE',
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
			'APELLIDO',
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
			'CEDULA',
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
			'NACIONALIDAD',
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
			'SEXO',
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
        if ($cliente->PROYECTO!=""){
                    echo $form->textFieldGroup(
			$cliente,
			'PROYECTO',
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
      <h4 class="panel-title">
        <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree">
          DATOS CONTACTO
        </a>
      </h4>
    </div>
    <div id="collapseThree" class="panel-collapse collapse">
      <div class="panel-body">
	    <?php 
	    //Si posse proyecto muetro etiqueta
                
            echo $form->textFieldGroup(
			$cliente,
			'CORREO',
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
			'NUMERO_CASA',
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
			'NUMERO_CELULAR',
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
			'NUMERO_ADICIONAL',
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
      <h4 class="panel-title">
        <a data-toggle="collapse" data-parent="#accordion" href="#collapseFour">
          DATOS REFERENCIA
        </a>
      </h4>
    </div>
    <div id="collapseFour" class="panel-collapse collapse">
      <div class="panel-body">
       
      <?php 
       if ($cliente->REFERENCIA_1!=""){
           
                     //Parentesco
                echo $form->textFieldGroup(
			$cliente,
			'REFERENCIA_1',
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
			'RELACION_REF_1',
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
			'TELEFONO_REF_1',
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
			'REFERENCIA_2',
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
			'RELACION_REF_2',
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
			'TELEFONO_REF_2',
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
        
       if ($fecha_acuerdo!=""){
             '<br/>';  echo $fecha_acuerdo;'<br/>';
       '<br/>';    '<br/>';    echo "   -   Tipo Contacto: Mensaje de Voz";   '<br/>';  
              '<br/>';  
              ?>
       <br/><br/><?php   echo "2015-03-10";'<br/>'; echo "   -   Tipo Contacto: Llamada de Voz";   '<br/>';  
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
   
            <table class="list-group-item">
                <tbody>
                    <tr>
                        <td>
                            <?php            
                                echo CHtml::label('Monto Ultimo Pago','',array('size'=>12)); 
                            ?>
                        </td>

                        <td><?php  echo $cliente->MONTO_ULTIMO_PAGO;  ?></td>
                    </tr>    
                    <!--Fecha Ingreos Tramite -->
                    <tr>
                        <td>
                            <?php            
                                echo CHtml::label('Fecha de Ultimo Pago','',array('size'=>12));
                            ?>
                        </td>

                        <td><?php echo $cliente->FECHA_ULTIMO_PAGO;  ?></td>
                    </tr>
                    
                                
                    <tr>
                        <td>
                            <?php            
                                echo CHtml::label('Monto Abono','',array('size'=>12));
                            ?>
                        </td>

                        <td><?php echo $cliente->TOTAL; ?></td>
                    </tr>
                    
                    <tr>
                        <td><?php            
                           echo CHtml::label('Cantidad Cuotas Abono','',array('size'=>12)); ?>
                        </td>            
                        <td><?php echo $cliente->CANTIDAD_DE_QUOTAS; ?></td>
                    </tr>
                    
                    <tr>
                        <td><?php            
                           echo CHtml::label('Fecha Pago Abono','',array('size'=>8));  ?>
                        </td>            
                        <td><?php echo $cliente->FECHA_DE_PAGO_ABONO; ?></td>
                    </tr>  
                    
                                <tr>
                        <td><?php            
                           echo CHtml::label('Monto Mejoras','',array('size'=>8)); ?>
                        </td>            
                        <td><?php echo $cliente->MONTO_MEJORAS; ?></td>
                    </tr> 
                    
                                <tr>
                        <td><?php            
                           echo CHtml::label('Cantidad Cuotas Mejoras ','',array('size'=>8)); ?>
                        </td>            
                        <td><?php echo $cliente->CANTIDAD_DE_QUOTAS_MEJORAS; ?></td>
                    </tr> 
                    
                    <!--OJOOO-->
                                <tr>
                        <td><?php            
                           echo CHtml::label('Fecha pago mejoras','',array('size'=>8)); ?>
                        </td>            
                        <td><?php echo $cliente->FECHA_DE_PAGO_ABONO; ?></td>
                    </tr>
                    
                                <tr>
                        <td><?php            
                           echo CHtml::label('Monto Mensualidad Abono','',array('size'=>8)); ?>
                        </td>            
                        <td><?php echo $cliente->MONTO_QUOTA_ABONO; ?></td>
                    </tr> 
  
                  
                <div id="demo" class="collapse">   
                    <tr>
                        <td><?php            
                           echo CHtml::label('Monto Mensualidad Mejoras','',array('size'=>8)); ?>
                        </td>            
                        <td><?php echo $cliente->MONTO_CUOTA_MEJORAS; ?></td>
                    </tr> 
            
                    <tr>
                        <td><?php            
                           echo CHtml::label('0-30','',array('size'=>8)); ?>
                        </td>            
                        <td><?php echo $cliente->CARTERA_30_DIAS; ?></td>
                    </tr> 
                    
                    
                    <tr>
                        <td><?php            
                           echo CHtml::label('31-60','',array('size'=>8)); ?>
                        </td>            
                        <td><?php echo $cliente->CARTERA_60_DIAS; ?></td>
                    </tr> 
                    
                    <tr>
                        <td><?php            
                           echo CHtml::label('61-90','',array('size'=>8)); ?>
                        </td>            
                        <td><?php echo $cliente->CARTERA_90_DIAS; ?></td>
                    </tr> 
                        <tr>
                        <td><?php            
                           echo CHtml::label('91-120','',array('size'=>8)); ?>
                        </td>            
                        <td><?php echo $cliente->CARTERA_120_DIAS; ?></td>
                    </tr> 
                  </div>
                </tbody>
            </table>     
      </div>
    </div>
  </div>
<?php $this->endWidget(); ?>

 
<!-------------------------- FIN DATOS CLIENTES ----------------------------------------------->
<!--</fieldset>-->
<?php $this->endWidget(); ?>
