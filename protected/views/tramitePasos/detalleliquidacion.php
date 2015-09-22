<?php
$this->widget(
    'booster.widgets.TbWizard',
    array(
        'type' => 'tabs', // 'tabs' or 'pills'
        'tabs' => array(
                array('label' => 'Paso 1', 'content' => $this->renderPartial('_paso1', array('user'=>$user, 'form'=>$form),true), 'active' => true),
                array('label' => 'Paso 2', 'content' => $this->renderPartial('_paso2', array('user' => $user, 'form'=>$form),true)),
        ),
    )
);

?>
 