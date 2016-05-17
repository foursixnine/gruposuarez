
<?php 
$x=0;
if($data!==null){
$sumc=0;
$sum30=0;
$sum60=0;
$sum90=0;
$sum120=0;
$sumtv=0;
    ?>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
                <meta http-equiv="Content-Language" content="pt-br, pt">
                 


</head>
<table border="1">

    <tr>
        
       

<td colspan="12"  align="center">
    <br/>
<div style='background-color:#CCC'><STRONG>REPORTE DE CLIENTE MOROSIDAD</STRONG></div>
    <BR>
   
  <p><h2>GRUPO SUAREZ</h2></p>
         </td>
    </tr>
     
    
    <tr>
        <th>NOMBRE CLIENTE</th>
        <th>CORREO</th>
        <th>ID PROYECTO</th>
        <th>PROYECTO</th>  
        <th>STATUS DE LOTE</th> 
        <th>NUM DE PROPIEDAD</th>
        <th>CARTERA CORRIENTE</th>
        <th>CARTERA 30</th>
        <th>CARTERA 60</th>
        <th>CARTERA 90</th>        
        <th>CARTERA 120</th>
        <th>TOTAL VENCIDO</th>
        


            
         
    </tr>
    
    <?php foreach ($data as $value) {
             //   if($value['cartera_corriente'] > 1){
                 //   $sumc+=$value['cartera_corriente'];
               // }    
                    
               // if($value['cartera_30_dias'] > 1){
                   //  $sum30+=$value['cartera_30_dias'];
              //  }
               
                //if($value['cartera_60_dias'] > 1){
                     //$sum60+=$value['cartera_60_dias'];
               // }

             //   if($value['cartera_90_dias'] > 1){
                      $sum90+=$value['cartera_90_dias'];
            //    }
                
            //    if($value['cartera_120_dias'] > 1){
                      $sum120+=$value['cartera_120_dias'];
             //   }
             //     if($value['total_vencido'] > 1){
                //     $sumtv+=$value['total_vencido'];
              //  }
                /*
                $sum30+=$value['cartera_30_dias'];
                $sum60+=$value['cartera_60_dias'];
                $sum90+=$value['cartera_90_dias'];
                $sum120+=$value['cartera_120_dias'];
                $sumtv+=$value['total_vencido'];*/
                $sumc+=$value['cartera_corriente'];
                $sum30+=$value['treinta'];
                $sum60+=$value['sesenta'];
                $sum90+=$value['noventa'];
                $sum120+=$value['cientoveinte'];
                $sumtv+=$value['suma'];
     ?>
            <tr <?php echo ($x++)%2==0?"style='background-color:#CCC'":"";?>>
                <td><?php echo $value['nombre_de_empresa'];?></td>
                <td><?php echo $value['correo'];?></td> 
                <td><?php echo $value['id_proyecto']; ?></td>
                <td><?php echo $value['proyecto']; ?></td>
                <td><?php echo $value['status_de_lote']; ?></td>
                <td><?php echo $value['numero_de_lote']; ?></td>
                <td><?php echo $value['cartera_corriente'];?></td>
                <td><?php echo $value['cartera_30_dias'];?></td>
                <td><?php echo $value['cartera_60_dias'];?></td>
                <td><?php echo $value['cartera_90_dias']; ?></td>
                <td><?php echo $value['cartera_120_dias']; ?></td>
                <td><?php echo $value['total_vencido']; ?></td>
                
            </tr>
            
    <?php } ?>  

            <tr>
                <td colspan="11" align="right"><b>CARTERA CORRIENTE</b></td>
                <td><?php echo $sumc; ?></td>
            </tr>


            <tr>
                <td colspan="11" align="right"><b>CARTERA 30</b></td>
                <td><?php echo $sum30; ?></td>
            </tr>


            <tr>
                <td colspan="11" align="right"><b>CARTERA 6O</b></td>
                <td><?php echo $sum60; ?></td>
            </tr>

            <tr>
                <td colspan="11" align="right"><b>CARTERA 9O</b></td>
                <td><?php echo $sum90; ?></td>
            </tr>  

            <tr>
                <td colspan="11" align="right"><b>CARTERA 12O</b></td>
                <td><?php echo $sum120; ?></td>
            </tr> 
            <tr>
                <td colspan="11" align="right"><b>TOTAL VENCIDO</b></td>
                <td><?php echo $sumtv; ?></td>
            </tr>
            </table>
    
<?php }?>

