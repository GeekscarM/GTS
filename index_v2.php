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

            <h2>Bitácora de Visitas <br> AMCARE</h2>
            <p>Por favor registra los datos de cada visita a AMCARE.                       
            
            
            <section class="form-section">                
                <input type="text" class="form_input" name="login" placeholder="Login del Asociado" required>
            </section>

            <section class="form-section">                                
                <select name="listaShifts" id="listaShifts">
                    <option selected disabled>Turno</option>
                    <?php
                        $query = mysqli_query($conn, "SELECT shift_code FROM `shifts` ORDER BY shift_code");
                        if(mysqli_num_rows($query) > 0) {
                            while($row = mysqli_fetch_assoc($query)){                                
                                echo "<option value='" . $row["diagnostic"] . "'>" . $row["diagnostic"] . "</option>";                                                                                                
                            }                            
                        }                                                                                                            
                    ?>            
                </select>

            <section class="form-section">                
                <input type="text" class="form_input" name="allergies" placeholder="Login del Asociado" required>
            </section>

            <section class="form-section">                
                <textarea class="reason" name="reason" id="reason" cols="50" rows="3" placeholder="¿Qué síntomas presenta el visitante?" required></textarea>
            </section> 

            <section class="form-section">                                
                <select name="listaDiagnostico" id="listaDiagnostico">
                    <option selected disabled>Diagnóstico</option>
                    <?php
                        $query = mysqli_query($conn, "SELECT diagnostic FROM `diagnostics` ORDER BY diagnostic");
                        if(mysqli_num_rows($query) > 0) {
                            while($row = mysqli_fetch_assoc($query)){                                
                                echo "<option value='" . $row["diagnostic"] . "'>" . $row["diagnostic"] . "</option>";                                                                                                
                            }                            
                        }                                                                                                            
                    ?>            
                </select>
                
                <select name="sistemaAfectado" id="sistemaAfectado">
                    <option selected disabled>Sistema Afectado</option>
                    <?php
                        $query = mysqli_query($conn, "SELECT DISTINCT affectedSystem FROM `diagnostics` ORDER BY affectedSystem");
                        if(mysqli_num_rows($query) > 0) {
                            while($row = mysqli_fetch_assoc($query)){                                
                                echo "<option value='" . $row["affectedSystem"] . "'>" . $row["affectedSystem"] . "</option>";                                                                                                
                            }                            
                        }                                                                                                            
                    ?>            
                </select>
                
            </section>

            <section class="form-section">
                <input type="submit" class="submit-form-btn" name="submit" value="Registrar Visita">
            </section>

        </form>
    </div>    
        
</body>
</html>