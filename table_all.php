<?php
    @include './database/config.php';
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
    <head>        
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE-edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Reporte Del Día</title>
        <link href="css/style.css" rel="stylesheet">        
        <link href="css/style_report.css" rel="stylesheet">        
        <link href="css/style_header.css" rel="stylesheet">        
        <link rel="stylesheet" type="" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"> 
    </head>
    <body>

        <?php include './php/headers/header_full.php'; ?>

        <div class="container-report-table">
            <section class="products">
                <h1 class="heading">Lista General de Visitas</h1>

                <div class="btn-container">
                    <a href="excel_report_all.php" onclick="confirmation2()" class="report-btn">Descargar Reporte</a>        
                    <a href="mailto:?subject=Reporte General de Visitas -  AMCARE&body=Adjunto encontrarás el Reporte General de Registros de la Bitácora de Visitas a AMCARE. %0D%0A%0D%0APuedes utilizar Excel para abir el archivo adjunto; si al hacerlo aparece una advertencia símplemente presiona en el botón SÍ y podrás consultarlo. %0D%0A¡Que tengas un excelente turno!" class="report-btn"><i class="fa-solid fa-envelope"></i> Abrir correo</a>
                </div>
                <section class="report-container">
                    <table class="report-table">
                        <tr class="report-tr">
                            <th class="report-th">Fecha</th>                            
                            <th class="report-th">Hora</th>
                            <th class="report-th"># Visita</th>
                            <th class="report-th">Motivo Visita</th>                            
                            <th class="report-th">Login</th>
                            <th class="report-th">Nombre</th>
                            <th class="report-th">Manager</th>                                                        
                            <th class="report-th">Shift</th>                                                        
                            <th class="report-th">Job Title</th>                            
                        </tr>
                            <?php
                                // SQL QUERY Used to enable Date filtering using the DATE SELECTION INPUT //
                                // $ordersList = mysqli_query($conn, "SELECT * FROM `order` WHERE `order_date` = '$input_date'"); //
                                $ordersList = mysqli_query($conn, "SELECT 
                                VI.date,
                                VI.time,
                                VI.id,
                                VI.reason,    
                                VI.login,
                                EM.name, 
                                EM.manager,
                                EM.shift,
                                EM.jobTitle    
                            FROM visitas VI
                            LEFT JOIN employees EM on EM.login = VI.login                            
                            ORDER BY VI.date DESC, VI.TIME DESC");
                                    while ($row = mysqli_fetch_array($ordersList)) {
                            ?>
                        <tr class="report-tr">
                            <td class="report-td"> <?php echo $row[1]?> </td>                            
                            <td class="report-td"> <?php echo $row[0]?> </td>                            
                            <td class="report-td"> <?php echo $row[2]?> </td>                            
                            <td class="report-td"> <?php echo $row[3]?> </td>                            
                            <td class="report-td"> <?php echo $row[4]?> </td>                            
                            <td class="report-td"> <?php echo $row[5]?> </td>                            
                            <td class="report-td"> <?php echo $row[6]?> </td>                            
                            <td class="report-td"> <?php echo $row[7]?> </td>                            
                            <td class="report-td"> <?php echo $row[8]?> </td>                            
                        </tr>
                        <?php } ?>                        
                    </table>                    
                </section>
                <div class="btn-next">
                    <a href="reports.php" class="btn">Regresar</a>    
                </div>
            </section>
        </div>

        <!-- Custom JS -->
        <script src="js/script.js"></script>           
    </body>
</html>