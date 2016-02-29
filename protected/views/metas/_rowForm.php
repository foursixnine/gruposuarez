<?php $row_id = "metas-" . $key ?>
<div class='row-fluid' id="<?php echo $row_id ?>">
    <?php
    echo $form->hiddenField($model, "[$key]id_meta");
   // echo $form->updateTypeField($model, $key, "id_meta", array('key' => $key));
    ?>
    <div class="span3">
        <?php
        echo $form->labelEx($model, "[$key]monto");
        echo $form->textField($model, "[$key]monto");
        echo $form->error($model, "[$key]monto");
        ?>
 
    </div>
 
    <div class="span3">
        <?php
        echo $form->labelEx($model, "[$key]porcentaje_meta");
        echo $form->textField($model, "[$key]porcentaje_meta");
        echo $form->error($model, "[$key]porcentaje_meta");
        ?>
    </div>
 
    <div class="span3">
        <?php
     /*   echo $form->labelEx($model, "[$key]schedule");
 
        $this->widget('zii.widgets.jui.CJuiDatePicker', array(
            'model' => $model,
            'attribute' => "[$key]schedule",
            'options' => array(
                'showAnim' => 'fold',
            ),
            'htmlOptions' => array(
                'style' => 'height:20px;'
            ),
        ));
        echo $form->error($model, "[$key]schedule");*/
        ?>
 
 
    </div>
    <div class="span2">
 
            <?php echo $form->deleteRowButton($row_id, $key); ?>
        </div>
</div>