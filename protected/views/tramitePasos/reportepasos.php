
<?php 
$x=0;
if($reportepasos!==null){

    ?>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
                <meta http-equiv="Content-Language" content="pt-br, pt">
                 
 

</head>
<table border="1">

    <tr>
        
       

<td colspan="6"  align="center">
    <br/>
<div style='background-color:#CCC'><STRONG>REPORTE DE PASOS</STRONG></div>
    <BR>
   
  <p><h2>GRUPO SUAREZ</h2></p>
         </td>
    </tr>
     
    
    <tr>
                <th>PROYECTO</th>  
                <th>MES</th>
                <th>ID PROYECTO</th>       
                <th>PASO</th>
                <th>TOTAL PASOS</th>  
                <th>TOTAL LIQUIDADO</th>  
    </tr>
    
    <?php foreach ($reportepasos as $value) {
               
     ?>
            <tr <?php echo ($x++)%2==0?"style='background-color:#CCC'":"";?>>
                <td><?php echo $value['titulo'];?></td>
                <td><?php echo $value['nommes'];?></td> 
                <td><?php echo $value['crmproyecto']; ?></td>
                <td><?php echo $value['descripcion']; ?></td>
                <td><?php echo $value['totalpaso']; ?></td>
                <td><?php echo $value['total_liquidado']; ?></td>
            </tr>
            
    <?php } ?>  



            </table>
    
<?php }?>