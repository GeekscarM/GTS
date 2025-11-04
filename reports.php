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
        <title>Reportes</title>
        <link href="css/style.css" rel="stylesheet">        
        <link href="css/style_header.css" rel="stylesheet">        
        <link href="css/style_report.css" rel="stylesheet">        
        <link rel="stylesheet" type="" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"> 
    </head>
    <body>

    <?php include './php/headers/header_full.php'; ?>

        <div class="container_report">
            <section class="products">
                <span>&nbsp;</span>
                <h1 class="heading">Reportes</h1>
                <span> </span>
                <h2 class="heading-h2">Seleccionar tipo de reporte</h2>

                <div class="btn-container">
                    <a href="table_day.php" class="report-btn">Del Día</a>        
                    <a href="table_week.php" class="report-btn">Semanal</a>        
                    <a href="table_month.php" class="report-btn">Mensual</a>        
                    <a href="table_all.php" class="report-btn">General</a>        
                </div>                
            </section>
        </div>

        <!-- Custom JS -->
        <script src="js/script.js"></script>           
    </body>
</html>