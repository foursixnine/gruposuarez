<?php 
 
function dias_transcurridos($fecha_i,$fecha_f)
{
	$dias	= (strtotime($fecha_i)-strtotime($fecha_f))/86400;
	$dias 	= abs($dias); $dias = floor($dias);		
	return $dias;
}
// Ejemplo de uso:
?>

<button type="button" class="btn btn-warning">BITACORA DEL TRAMITE</button>

<table>
        <thead>
        <th>N Paso</th>
        <th>Nombre del Paso</th>
        <th>Tiempo Estandar</th>
        <th>Tiempo Real</th>
        <th>Fecha Inicio Paso</th>
        <th>Fecha Cambio Paso</th>
        <th>Indicador</th>
       </thead>          
   
       
        <?php 
                                    foreach ($pasos as $nompaso) {?>
       <tr>
           <td style='border: 1px solid #E2E2E2; height:30px; padding-left:5px; padding-right: 5px;'><?php echo $nompaso['id_paso']; ?></td>
            <td style='border: 1px solid #E2E2E2; height:30px; padding-left:5px; padding-right: 5px;'>


                                       <?php echo $nompaso['descripcion']; ?>
                                     

            </td>
                                    
      
       
      
           <td style='border: 1px solid #E2E2E2; height:30px; padding-left:5px; padding-right: 5px;'>
               
               <?php 
                                        
                                     
                                    
                                          foreach ($duracionpasos as $tiempo) {
                                           
                                            if($tiempo['id_paso'] == $nompaso['id_paso'])
                                                      echo $tiempo['duracion'];
                                            
                                        }   
                                             
               ?> 
                                             
             </td> 
             
             <td style='border: 1px solid #E2E2E2; height:30px; padding-left:5px; padding-right: 5px;'>
                 <?php
               
                  foreach ($tramiteold as $row) {
                        if($nompaso['id_paso'] == $row['id_paso']){
                            if($row['fecha_paso']==""){                            
                                echo $dias_transc_now=dias_transcurridos($row['fecha_inicio'],date("Y-m-d"));      
                            }else{
                                echo $dias_transcurridos=dias_transcurridos($row['fecha_inicio'],$row['fecha_paso']);      
                            }
                 ?> 
             </td>
             <td style='border: 1px solid #E2E2E2; height:30px; padding-left:5px; padding-right: 5px;'>
            <?php
                        echo $row['fecha_inicio']; 
                   
              
              ?>
             </td>     
             <td style='border: 1px solid #E2E2E2; height:30px; padding-left:5px; padding-right: 5px;'>
              <?php echo $row['fecha_paso']; 
              
              
              ?>
                 
             </td> 
             <td style='border: 1px solid #E2E2E2; height:30px; padding-left:5px; padding-right: 5px;'>
                                        <?php 
                                        
                                     
                                          foreach ($duracionpasos as $tiempo){
                                           
                                            if(($row['id_paso'] == $tiempo['id_paso'])){
                                                      $time=$tiempo['duracion'];
                                           
                                               if($row['fecha_paso']==""){
                                                   if($dias_transc_now < $time){
                                                        echo "A Tiempo"; 
                                                   }else{
                                                        echo "Atrasado"; 
                                                   }      
                                                   
                                                   
                                               }elseif($dias_transcurridos < $time){
                                                           echo "A Tiempo"; 
                                                    }else{
                                                           echo "Atrasado"; 
                                               }
                                            }
                                              
                                        }   
                      
                  
                }
                
                  }
                  
                ?>  
                  
               
                                        
                                     
                                       </td>
             
             
       </tr>
        <?php }?>
</table>
