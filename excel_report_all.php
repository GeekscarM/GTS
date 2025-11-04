<?php
    @include './database/config.php';
    $Date = date('m/d/Y');
    header('Content-Type: application/xls');
    header('Content-Disposition: attachment; filename='.$Date.'_Reporte_General_Mindfulness.xls');
?>

<table class="report-table">
    <tr>
        <th class="report-th">Fecha</th>
        <th class="report-th">Hora</th>
        <th class="report-th"># Visita</th>
        <th class="report-th">Login</th> 
        <th class="report-th">Nombre</th>       
        <th class="report-th">Turno</th>
        <th class="report-th">Job Title</th>
        <th class="report-th">Manager</th>    
        <th class="report-th">Motivo Visita</th>      
    </tr>
        <?php                                
             $ordersList = mysqli_query($conn, "SELECT 
             VI.date,
             VI.time,
             VI.id,
             VI.login,
             EM.name, 
             EM.shift,
             EM.jobTitle,
             EM.manager,
             VI.reason  
         FROM visitas VI
         LEFT join employees EM on EM.login = VI.login");
                while ($row = mysqli_fetch_array($ordersList)) {
        ?>
    <tr class="report-tr">
        <td> <?php echo $row[0]?> </td>                            
        <td> <?php echo $row[1]?> </td>                            
        <td> <?php echo $row[2]?> </td>                            
        <td> <?php echo $row[3]?> </td>        
        <td> <?php echo $row[4]?> </td>        
        <td> <?php echo $row[5]?> </td>        
        <td> <?php echo $row[6]?> </td>        
        <td> <?php echo $row[7]?> </td>        
        <td> <?php echo $row[8]?> </td>        
    </tr>
    <?php } ?>
</table>