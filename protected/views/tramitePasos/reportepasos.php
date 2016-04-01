
<?php 
setlocale(LC_TIME,"es_ES");
setlocale(LC_TIME, 'spanish');
$x=0;
if($reportepasos!==null){

    ?>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
                <meta http-equiv="Content-Language" content="pt-br, pt">
                 
 

</head>
<table border="1">

    <tr>
        
       

<td colspan="5"  align="center">
    <br/>
<div style='background-color:#CCC'><STRONG>REPORTE DE LIQUIDACION</STRONG></div>
    <BR>
   
  <p><h2>GRUPO SUAREZ</h2></p>
         </td>
    </tr>
     
    
    <tr>
                <th>PROYECTO</th>  
                <th>MES</th>
                <th>FECHA LIQUIDACION</th>
                <th>N° de LOTE</th>  
                <th>PRECIO TOTAL DE VENTA</th>  
                <th>PRECIO MONTO LIQUIDACION</th>  
    </tr>
       

    <?php foreach ($reportepasos as $value) {
      

                $totalventatp=0; $tliquidadotp=0;
                $totalventatp+=$value['totalventa'];
                $tliquidadotp+=$value['totalliquidado'];
     ?>
            <tr <?php echo ($x++)%2==0?"style='background-color:#CCC'":"";?>>
                <td><?php echo $value['titulo'];?></td>
                <td>
                      <?php 
                        if($value['mes']==1){
                             echo "ENERO";            
                        }                        
                        if($value['mes']==2){
                             echo "FEBRERO";  
                        }
                        if($value['mes']==3){
                             echo "MARZO";  
                        }
                        if($value['mes']==4){
                             echo "ABRIL";  
                        }
                        if($value['mes']==5){
                             echo "MAYO";  
                        }
                        if($value['mes']==6){
                             echo "JUNIO";  
                        }
                        if($value['mes']==7){
                             echo "JULIO";  
                        } 
                        if($value['mes']==8){
                             echo "AGOSTO";  
                        } 
                        if($value['mes']==9){
                             echo "SEPTIEMBRE";  
                        } 
                        if($value['mes']==10){
                             echo "OCTUBRE";  
                        } 
                        if($value['mes']==11){
                             echo "NOVIEMBRE";  
                        } 
                        if($value['mes']==12){
                             echo "DICIEMBRE";  
                        } 
                      ?>
                </td> 
                <td><?php echo $value['fechafin'];?></td>
                <td><?php echo $value['lote'];?></td> 
                <td>$<?php echo $value['totalventa']; ?></td>
                <td>$<?php echo $value['totalliquidado']; ?></td>
            </tr>
            
    <?php } ?>  



            </table>
    
<?php }?>