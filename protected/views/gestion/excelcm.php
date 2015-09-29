
<?php 
$x=0;
if($data!==null){

    ?>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
                <meta http-equiv="Content-Language" content="pt-br, pt">
                 


</head>
<table border="1">

    <tr>
        
       

<td colspan="9" color="">
    <br/>
<div style='background-color:#CCC'><STRONG>REPORTE DE GESTION</STRONG></div>
    <BR>
   
  <p><h2>GRUPO SUAREZ</h2></p>
         </td>
    </tr>
     
    
    <tr>
        <th>ID GESTION</th>
        <th>ID PROYECTO</th>
        <th>PROYECTO</th>
        <th>NUM DE PROPIEDAD</th>  
        <th>NOMBRE CLIENTE</th>
        <th>ACUERDO</th>
        <th>FECHA DE ACUERDO</th>
        <th>CUMPLIMIENTO</th>        
        <th>OBSERVACIONES</th>
        


            
         
    </tr>
    
    <?php foreach ($data as $value) {
   
        
     ?>
            <tr <?php echo ($x++)%2==0?"style='background-color:#CCC'":"";?>>
                <td><?php echo $value['nombre_de_empresa'];?></td>
                <td><?php echo $value['correo'];?></td> 
                <td><?php echo $value['id_proyecto']; ?></td>
                <td><?php echo $value['proyecto']; ?></td>
                <td><?php echo $value['numero_de_lote']; ?></td>
                <td><?php echo $value['cartera_30_dias'];?></td>
                <td><?php echo $value['cartera_60_dias'];?></td>
                <td><?php echo $value['cartera_90_dias']; ?></td>
                <td><?php echo $value['cartera_120_dias']; ?></td>
                <td><?php echo $value['total_vencido']; ?></td>
             

                
            </tr>
    <?php } ?>  
</table>
    
<?php }?>

