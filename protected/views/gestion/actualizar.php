<?php $form=$this->beginWidget('booster.widgets.TbActiveForm',array(
    'id'=>'gestion-form',
    'enableAjaxValidation'=>false,
)); ?>

<p class="help-block">Fields with <span class="required">*</span> are required.</p>

<?php echo $form->errorSummary($model); ?>

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
        
    <?php echo $form->datePickerGroup($model,'fecha_acuerdo',
    array('widgetOptions'=>array('options'=>array(
                                 'format' => 'yyyy-mm-dd'
    ),
            'htmlOptions'=>array('class'=>'span5')), 
            'prepend'=>'<i class="glyphicon glyphicon-calendar"></i>', 
            'append'=>'Haga click en el Mes o A&ntilde;o para seleccionar uno diferente')); 
    ?>
        <br />
<br/>
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


    <?php echo $form->textFieldGroup($model,'id_cliente',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5')))); ?>

    <?php echo $form->textFieldGroup($model,'id_crm_proyecto',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5')))); ?>


    <?php echo $form->datePickerGroup($model,'fecha_creacion',
    array('widgetOptions'=>array('options'=>array(
                                 'format' => 'yyyy-mm-dd'
    ),
            'htmlOptions'=>array('class'=>'span5')), 
            'prepend'=>'<i class="glyphicon glyphicon-calendar"></i>', 
            'append'=>'Haga click en el Mes o A&ntilde;o para seleccionar uno diferente')); 
    ?>
        <br />
<div class="form-actions">
    <?php $this->widget('booster.widgets.TbButton', array(
            'buttonType'=>'submit',
            'context'=>'primary',
            'label'=>$model->isNewRecord ? 'Create' : 'Actualizar',
        )); ?>
</div>

<?php $this->endWidget(); ?>