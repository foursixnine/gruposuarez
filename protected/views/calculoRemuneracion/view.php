<?php
$this->breadcrumbs=array(
	'Calculo Remuneracions'=>array('index'),
	$model->id_calculo_remuneracion,
);

$this->menu=array(
array('label'=>'Listar Remuneraciones','url'=>array('index')),
//array('label'=>'Calcular Bono','url'=>array('calculoRemuneracion/calcularbono','id'=>$model->id_meta)),

);
?>
<br/>
<h2 class="titulo">C&aacute;lculo Remuneraci&oacute;n #<?php echo $model->id_calculo_remuneracion; ?></h2>

<?php $this->widget('booster.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
	
		'idUsuario.nombre',
		'resultado',
                'resultadov',
		'peso',
                'peso1',
		'cumplimiento',
),
)); ?>

<br/>
<h2 class="titulo">Bono a Pagar</h2>
 <?php

         //     var_dump($gestion_old);die;
          foreach ($tablar as $row) {
           $cumplimiento=(int)$model->cumplimiento;
            $pagar=(int)$row['porcentaje']; //echo (int)$model->cumplimiento;die;
       
              
                if (($cumplimiento) >= ($pagar)) { 
                    ?>    
                    <div>
                                <div class='list-group'>
                                
                            <table>
                                <tr>                     
                                        <td>
                                            
                                            <img src='<?php echo Yii:: app() ->baseUrl.'/images/bonos.png' ?>' alt='Bono a Pagar' height='42' width='42' />                
                                           
                                        
                                            
                                            <strong><?php echo $row['porcentaje']; ?></strong>
                                       
                                        </td>
                                </tr> 
                            </table>
                        </div>
                        </div>
<?php
                   break;

                }
         
          }

        ?>