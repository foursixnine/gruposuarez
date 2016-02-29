<?php
$this->breadcrumbs=array(
	'Metases'=>array('index'),
	'Create',
);

$this->menu=array(
array('label'=>'List Metas','url'=>array('index')),
array('label'=>'Manage Metas','url'=>array('admin')),
);
?>
<br/>
<button type="button" class="btn btn-warning">CREAR META</button>


<?php echo $this->renderPartial('_form', array('model'=>$model,
                                               'proyect01'=>$proyect01,
                                               'proyect02'=>$proyect02,
                                                'proyect03'=>$proyect03,
                                                'proyect04'=>$proyect04,
                                                'proyect05'=>$proyect05,
                                                'proyect06'=>$proyect06,
                                                'proyect07'=>$proyect07,
                                                'proyect09'=>$proyect09,
                                                'proyect11'=>$proyect11,
                                                'proyect12'=>$proyect12,
                                                'proyect13'=>$proyect13,
                                                'proyect14'=>$proyect14,
        'carteracorriente1'=>$carteracorriente1,
        'carteracorriente2'=>$carteracorriente2,
        'carteracorriente3'=>$carteracorriente3,
        'carteracorriente4'=>$carteracorriente4,
        'carteracorriente5'=>$carteracorriente5,
        'carteracorriente6'=>$carteracorriente6,
        'carteracorriente7'=>$carteracorriente7,
        'carteracorriente9'=>$carteracorriente9,
        'carteracorriente11'=>$carteracorriente11,
        'carteracorriente12'=>$carteracorriente12,
        'carteracorriente13'=>$carteracorriente13,
        'carteracorriente14'=>$carteracorriente14,
    
    
    )); ?>