<?php $form=$this->beginWidget('booster.widgets.TbActiveForm',array(
	'id'=>'gestion-form',
	'enableAjaxValidation'=>false,
));
 ?>
 
<script>
$(function(){
    $('select#llamada_voz').prop('disabled', true);
    $('select#contactado_llamada').click(function () {
        document.getElementById('contactado_llamada').value;
        $valor=(document.getElementById('contactado_llamada').value);
        //alert($valor);
        if($valor==2){
          //  alert("Es NO");
            $('select#llamada_voz').prop('disabled', false);
        }
        if(valor==1){
                 alert("Es SIIIIIIIIIIIII");
            $('select#llamada_voz').prop('disabled', true); 
        }
        
    });
    $('select#Cartera_id_cartera').click(function () {
       
       // alert("HOLAAA :*");
       document.getElementById('Cartera_id_cartera').value;
        $valor=(document.getElementById('Cartera_id_cartera').value);
    
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
 <?php  $id=$cliente->id_cliente; ?>
   <?php  $model->id_cliente=$id; ?>
<div class="panel-group" id="accordion">
  <!--<div class="panel panel-default">-->
  <div class="panel panel-primary">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
          #ID<?php echo $id; ?> - <?php echo $cliente->nom_cliente;?> - 
             <?php 
         
                        if ($cliente->idProyecto->titulo!=""){
                                echo $cliente->idProyecto->titulo; 
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
                'name' => 'contactado_llamada',
                'id' => 'contactado_llamada',
                'data' => array('1' => 'SI', '2' => 'NO'),
                'htmlOptions' => array(
                    'placeholder' => "----",
                    
                    
                   // 'id' => 'contacto_llamada'
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
                'name' => 'llamada_voz',
                'id' => 'llamada_voz',
                'data' => array(1 => 'SI', 2 => 'NO'),
                'htmlOptions' => array(
                    'placeholder' => "----",
                            
            
                ),
            )
        );
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
                      'model' => $cartera,
                //      'id'=>'id_cartera',                            
                      'attribute' => 'id_cartera',
                      'data' => CHtml::listData(Cartera::model()->findAll(), 'id_cartera', 'descripcion'),
                      'options' => array(
                        'placeholder' => "Cartera",
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
                    Señor(a) <strong><?php echo $cliente->nom_cliente; ?><br/></strong>
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
                    Señor(a) <strong><?php echo $cliente->nom_cliente; ?><br/></strong>
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
                <p><input type="text" name="otro" class="input" value="90" /></p>
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
			'nom_cliente',
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
			'ape_cliente',
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
			'ruc',
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
        if ($cliente->idProyecto->titulo!=""){
                    echo $form->textFieldGroup(
			$cliente->idProyecto,
			'titulo',
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
        if ($cliente->correo!=""){
           echo $form->textFieldGroup($cliente,'correo',
							array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5'))));
            
                     
            
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
 }else{
	  echo '<p>"No pose email"</p>';
	  $this->widget(
    'booster.widgets.TbBadge',
    array(
        'context' => 'success',
        // 'default', 'success', 'info', 'warning', 'danger'
        'label' => 'SMS',
    )
);
	 
 } 
    ?>
          <br/>
            <?php echo CHtml::label('Telef. Casa:   ', '????'); ?><br/>
           
         
      
            
            
           <?php echo CHtml::label('Telefono Celular', '????'); ?><br/>
            
            <?php echo CHtml::label('Otro', '????'); ?></br>
            
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
       if ($cliente->referencia!=""){
           
                     //Parentesco
             
          
        echo $form->textFieldGroup(
			$cliente,
			'parentesco',
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
			'referencia',
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
			'telef_referecia',
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

                        <td><?php  echo "---";  ?></td>
                    </tr>    
                    <!--Fecha Ingreos Tramite -->
                    <tr>
                        <td>
                            <?php            
                                echo CHtml::label('Fecha de Ultimo Pago','',array('size'=>12));
                            ?>
                        </td>

                        <td><?php echo "---";  ?></td>
                    </tr>
                    
                                
                    <tr>
                        <td>
                            <?php            
                                echo CHtml::label('Monto Abono','',array('size'=>12));
                            ?>
                        </td>

                        <td><?php echo "---"; ?></td>
                    </tr>
                    
                    <tr>
                        <td><?php            
                           echo CHtml::label('Cantidad Cuotas Abono','',array('size'=>12)); ?>
                        </td>            
                        <td><?php echo "---"; ?></td>
                    </tr>
                    
                    <tr>
                        <td><?php            
                           echo CHtml::label('Fecha Pago Abono','',array('size'=>8));  ?>
                        </td>            
                        <td><?php echo "---"; ?></td>
                    </tr>  
                    
                                <tr>
                        <td><?php            
                           echo CHtml::label('Monto Mejoras','',array('size'=>8)); ?>
                        </td>            
                        <td><?php echo "---"; ?></td>
                    </tr> 
                    
                                <tr>
                        <td><?php            
                           echo CHtml::label('Cantidad Cuotas Mejoras ','',array('size'=>8)); ?>
                        </td>            
                        <td><?php echo "---"; ?></td>
                    </tr> 
                    
                    
                                <tr>
                        <td><?php            
                           echo CHtml::label('Fecha pago mejoras','',array('size'=>8)); ?>
                        </td>            
                        <td><?php echo "---"; ?></td>
                    </tr>
                    
                                <tr>
                        <td><?php            
                           echo CHtml::label('Monto Mensualidad Abono','',array('size'=>8)); ?>
                        </td>            
                        <td><?php echo "---"; ?></td>
                    </tr> 
  
                  
                <div id="demo" class="collapse">   
                    <tr>
                        <td><?php            
                           echo CHtml::label('Monto Mensualidad Mejoras','',array('size'=>8)); ?>
                        </td>            
                        <td><?php echo "---"; ?></td>
                    </tr> 
                    
                    <tr>
                        <td><?php            
                           echo CHtml::label('0-30','',array('size'=>8)); ?>
                        </td>            
                        <td><?php echo "---"; ?></td>
                    </tr> 
                    
                    
                    <tr>
                        <td><?php            
                           echo CHtml::label('31-60','',array('size'=>8)); ?>
                        </td>            
                        <td><?php echo "---"; ?></td>
                    </tr> 
                    
                    <tr>
                        <td><?php            
                           echo CHtml::label('61-90','',array('size'=>8)); ?>
                        </td>            
                        <td><?php echo "---"; ?></td>
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
