<?php $form=$this->beginWidget('booster.widgets.TbActiveForm',array(
	'id'=>'metas-form',
	'enableAjaxValidation'=>false,
)); ?>
 
    <p class="note">Fields with <span class="required">*</span> are required.</p>
 
    <div class="row">
        <?php echo $form->labelEx($model,'name'); ?>
        <?php echo $form->textField($model,'name',array('size'=>50,'maxlength'=>50)); ?>
        <?php echo $form->error($model,'name'); ?>
    </div>
    <div class="row">
        <?php echo $form->labelEx($model,'surname'); ?>
        <?php echo $form->textField($model,'surname',array('size'=>50,'maxlength'=>50)); ?>
        <?php echo $form->error($model,'surname'); ?>
    </div>
    <div class="row">
        <?php echo $form->labelEx($model,'email'); ?>
        <?php echo $form->textField($model,'email',array('size'=>50,'maxlength'=>50)); ?>
        <?php echo $form->error($model,'email'); ?>
    </div>
 
    
    <h2>Home Address Below</h2> 
 
    <div class="row">
        <?php echo $form->labelEx($addressModel_1,'[1]street'); ?>
        <?php echo $form->textField($addressModel_1,'[1]street'); ?>
        <?php echo $form->error($addressModel_1,'[1]street'); ?>
    </div>
    <div class="row">
        <?php echo $form->labelEx($addressModel_1,'[1]city'); ?>
        <?php echo $form->textField($addressModel_1,'[1]city'); ?>
        <?php echo $form->error($addressModel_1,'[1]city'); ?>
    </div>  
    <div class="row">
        <?php echo $form->labelEx($addressModel_1,'[1]state'); ?>
        <?php echo $form->textField($addressModel_1,'[1]state'); ?>
        <?php echo $form->error($addressModel_1,'[1]state'); ?>
    </div>
 

    <h2>Company Address Below</h2>
 
    <div class="row">
        <?php echo $form->labelEx($addressModel_2,'[2]street'); ?>
        <?php echo $form->textField($addressModel_2,'[2]street'); ?>
        <?php echo $form->error($addressModel_2,'[2]street'); ?>
    </div>
    <div class="row">
        <?php echo $form->labelEx($addressModel_2,'[2]city'); ?>
        <?php echo $form->textField($addressModel_2,'[2]city'); ?>
        <?php echo $form->error($addressModel_2,'[2]city'); ?>
    </div>  
    <div class="row">
        <?php echo $form->labelEx($addressModel_2,'[2]state'); ?>
        <?php echo $form->textField($addressModel_2,'[2]state'); ?>
        <?php echo $form->error($addressModel_2,'[2]state'); ?>
    </div>
 
    <div class="row buttons">
        <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
    </div>
 
<?php $this->endWidget(); ?>
 
</div><!-- form -->