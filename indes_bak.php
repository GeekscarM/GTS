<?php
    @include './database/config.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AMCARE - Bitácora de Visitas</title>
    <link rel="stylesheet" type="" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">        
    <link href="css/style.css" rel="stylesheet">        
    <link href="css/style_header.css" rel="stylesheet">        
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>    
</head>
<body>
    
    <?php include './php/headers/header_index.php'; ?>

    <!-- Visit Form -->
    <div class="form-container">
        <!--<form action="saveVisit.php" action="https://formsubmit.co/22836dfdacbcbff186a2646e0667c62f" method="POST" autocomplete="off">-->
            <form action="saveVisit.php" method="POST" autocomplete="off">

            <h2>¿Nuestros especialistas se encontraban en recorrido durante tu visita <br>a AMCARE?</h2>
            <p>Antes de retirarte por favor registra los datos solicitados en el<br> siguiente formulario y te contactaremos a la brevedad posible.                       
            
            
            <section class="form-section">                
                <input type="text" class="form_input" name="login" placeholder="¿Cuál  es tu login?" required>
            </section>

            <section class="form-section">                
                <textarea class="reason" name="reason" id="reason" cols="50" rows="3" placeholder="Cuéntanos el motivo de tu visita" required></textarea>
            </section>  

            <section class="form-section">
                <input type="submit" class="submit-form-btn" name="submit" value="Registrar Visita">
            </section>

        </form>
    </div>    
        
</body>
</html>