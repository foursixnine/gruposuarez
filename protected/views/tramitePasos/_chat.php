<?php $form=$this->beginWidget('booster.widgets.TbActiveForm',array(
	'id'=>'chat-form',
	'enableAjaxValidation'=>false,
    'htmlOptions' => array(
        'enctype' => 'multipart/form-data',
    ),
)); ?>



<p class="help-block">Fields with <span class="required">*</span> are required.</p>

<?php echo $form->errorSummary($chat); ?>
<?php echo $chat->id_chat; ?>  

	<?php //echo $form->textFieldGroup($chat,'descripcion',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5')))); ?>
        <?php echo $form->textAreaGroup(
			$chat,
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
	<?php //echo $form->textFieldGroup($chat,'id',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5')))); ?>

	<?php //echo $form->textFieldGroup($chat,'archivo',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5')))); ?>

	
<div class="form-actions">

        <?php echo CHtml::submitButton('Comentario',array('name'=>'chat')); ?>
      
</div>

<?php $this->endWidget(); ?>


<?php 
$this->widget('booster.widgets.TbGridView',array(
'id'=>'chat-grid',
'dataProvider'=>$chat_mostrar,
'columns'=>array(
		
		'descripcion',
	

),
));
      /*
         //     var_dump($gestion_old);die;
          foreach ($chat_mostrar as $row) {

            echo $message = "<table><tr>
                            <td><strong>Comentario:</strong></td>
                            <td style='border: 1px solid #E2E2E2; height:30px; padding-left:5px; padding-right: 5px;'> ".$row['descripcion']."</td>
                            </tr>
                            
                            <tr>
                             <td><strong>Tramitador:</strong></td>
                             <td style='border: 1px solid #E2E2E2; height:30px; padding-left:5px; padding-right: 5px;'>
                             
                             </td><br/>
                            
                             </tr>
                        </table>";
        }*/
        

/*
$this->widget('zii.widgets.TbGridView', array(
    'data'=>$chat_mostrar,
    'attributes'=>array(
        'descripcion',

    ),
));
?>