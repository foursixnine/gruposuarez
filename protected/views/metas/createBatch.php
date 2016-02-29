<?php $form=$this->beginWidget('booster.widgets.TbActiveForm',array(
	'id'=>'metas-form',
	'enableAjaxValidation'=>false,
)); ?>

<script>
$(document).ready(function(){
	$("#addCF").click(function(){
		$("#customFields").append('<tr valign="top"><th scope="row"><label for="customFieldName">Custom Field</label></th><td><input type="text" class="code" id="customFieldName" name="customFieldName[]" value="" placeholder="Input Name" /> &nbsp; <input type="text" class="code" id="customFieldValue" name="customFieldValue[]" value="" placeholder="Input Value" /> &nbsp; <a href="javascript:void(0);" class="remCF">Remove</a></td></tr>');
		$(".remCF").on('click',function(){
			$(this).parent().parent().remove();
		});
	});
});
</script>
<?php echo $form->errorSummary($model); ?>
        <?php echo $form->checkboxListGroup(
			$model,
			'mes',
			array(
				'widgetOptions' => array(
                                   // 'data' => array(1,2,3,4)
					'data' => array(1 => 'Enero',
                                                        2=>'Febrero',
                                                        3=>'Marzo',
                                                        4=>'Abril',
                                                        5=>'Mayo',
                                                        6=>'Junio',
                                                        7=>'Julio',
                                                        8=>'Agosto',
                                                        9=>'Septiembre',
                                                        10=>'Octubre',
                                                        11=>'Noviembre',
                                                        12=>'Diciembre',
                                                        )
				),
				'inline'=>false
			)
	   ); 
        ?>  


<table class="form-table" id="customFields">
	<tr valign="top">
		<th scope="row"><label for="customFieldName">Metas</label></th>
		<td>
			<input type="text" class="code" id="customFieldName" name="customFieldName[]" value="" placeholder="Input Name" /> &nbsp;
		<?php echo $form->textFieldGroup($model,'monto',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'code')))); ?>


                        <input type="text" class="code" id="customFieldValue" name="customFieldValue[]" value="" placeholder="Input Value" /> &nbsp;
			<a href="javascript:void(0);" id="addCF">Add</a>
		</td>
	</tr>
</table>

<div class="form-actions">
	<?php $this->widget('booster.widgets.TbButton', array(
			'buttonType'=>'submit',
			'context'=>'primary',
			'label'=>$model->isNewRecord ? 'Create' : 'Save',
		)); ?>
</div>

<?php $this->endWidget(); ?>