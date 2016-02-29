<div class="col-sm-6" style="background-color:#dff0d8;">
        <div class="list-group">
        <a href="#" class="list-group-item list-group-item-info">
            <strong>CARTERA VENCIDAD</strong>
        </a>
 <?php 
 $sumcorriente=0;
 $cobradoc=0;
 $sum=0;
 $mes_actual= date("n");
 ?>
 
          
            
            <?php //var_dump($cartera_corriente);die;?>
            <?php  foreach($cartera_vencidad as $data){ ?>
           
       
           <table class="list-group-item">
                                        <tr>                     
                       <td colspan="8">
                       <a href="#" class="list-group-item list-group-item-heading">
            <strong><?php echo $data->idCrmProyecto->titulo; ?> </strong>
        </a>
                       
                       
                       </td>
                    </tr> 
                    <tr>
                        <td>
                            <?php            
                                echo CHtml::label('Meta:   ', '????');
                            ?>
                        </td>

                        <td>
                            <strong><font color="#610B0B">$
                             <?php
                                echo number_format($data->monto_mes_proyecto,2,'.',',');
                             ?>
                            </strong></font>
                        </td>
                    </tr>  
                    
                    <tr>
                        <td>
                            <?php            
                                echo CHtml::label('Cobrado:   ', '????');
                            ?>
                        </td>

                        <td><?php  //echo $cobrado;  
                             if($data->mes ==$mes_actual){
                                   $cobrado = Yii::app()->dbconix->createCommand()
                                   ->select('sum(p.monto)')
                                   ->from('payments p, quotes_details qd')
                                   ->where(' p.Abono_Reff=qd.Bill and fecha BETWEEN '. "'2015-09-01'".' and '. "'2015-09-31'".' and project = '."'".$data->id_crm_proyecto."'")
                                   ->queryScalar();
                             } ?>
                            <strong><font color="#610B0B">$
                                <?php 
                                echo number_format($cobrado,2,'.',',');
                                 ?>
                            </strong></font>
                        </td>
                    </tr>                
                     <tr>
                        <td>
                            <?php            
                                echo CHtml::label('Cumplido', '????');
                            ?>
                        </td>

                        <td>
                               <strong><font color="#610B0B">
                                <?php $porcentajev = $cobrado / $data->monto_mes_proyecto * 100;?>
                                     <?php echo number_format($porcentajev, 2, '.', '');?>   %
                                   </strong></font>
                            <?php $sum+=$porcentajev/$count_proyecto_vencida;?>
                        </td>
                    </tr>
                       
           </table>
 <?php } ?>        

            
        </div>
</div>
                
