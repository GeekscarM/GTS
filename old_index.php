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
        <form action="saveVisit.php" method="POST" autocomplete="off">

            <h2>¿Nuestros especialistas se encontraban en recorrido durante tu visita a AMCARE?</h2>
            <p>Antes de retirarte por favor llena los datos que se solicitan en el<br>siguiente formulario y te contactaremos a la brevedad posible.            
            
            <section class="form-section">                
                <button type="button" class="action_button" name="checkInBtn" id="checkInBtn" onclick="checkInTime()">
                    <img src="./images/check-in.png" title="Presiona para registrar entrada">
                </button>
                <textarea name="checkInContainer" id="checkInContainer" cols="11" rows="1" placeholder="Da clic en la puerta azul para registrar la hora de ingreso"></textarea>
                
                <script type="text/javascript">
                    var timeIn;

                    function ItsShowTimeIn(){
                            var dateIn = new Date();
                            var hIn = dateIn.getHours();
                            var mIn = dateIn.getMinutes();
                            var sIn = dateIn.getSeconds();

                            hIn = (hIn < 10) ? "0" + hIn : hIn;
                            mIn = (mIn < 10) ? "0" + mIn : mIn;
                            sIn = (sIn < 10) ? "0" + sIn : sIn;
                            timeIn = hIn + ":" + mIn + ":" + sIn;

                            setTimeout(ItsShowTimeIn, 1000);
                    }

                    function checkInTime(){  
                    document.getElementById("checkInContainer").innerText = timeIn;    
                    }

                    ItsShowTimeIn();
                </script>
            </section>
            
            <section class="form-section">                
                <input type="text" class="form_input" name="login" placeholder="¿Cuál  es tu login?" required>
            </section>
            
            <section class="form-section">   
                    <select class="form_select" name="area" id="area">
                        <option selected disabled> Selecciona tu equipo </option>
                                        <?php
                                            $query = mysqli_query($conn, "SELECT area FROM `areas` order by area");
                                            if(mysqli_num_rows($query) > 0) {
                                                while($row = mysqli_fetch_assoc($query)){
                                                    echo "<option value='" . $row["area"] . "'>" . $row["area"] . "</option>";
                                                }
                                            }                        
                                        ?>
                    </select>
            </section>

            <section class="form-section">                
                <textarea class="reason" name="reason" id="reason" cols="50" rows="3" placeholder="Cuéntanos el motivo de tu visita" required></textarea>
            </section>  
            
            <section class="form-section">
                <button type="button" class="action_button" name="checkOutBtn" id="checkOutBtn" onclick="checkOutTime()">
                    <img src="./images/check-out.png" title="Presiona para registrar salida">
                </button>
                <textarea name="checkOutContainer" id="checkOutContainer" cols="11" rows="1" placeholder="Da clic en la puerta roja para registrar la hora de salida"></textarea>

                <script type="text/javascript">
                    var timeOut;

                    function ItsShowTimeOut(){
                            var dateOut = new Date();
                            var hOut = dateOut.getHours();
                            var mOut = dateOut.getMinutes();
                            var sOut = dateOut.getSeconds();

                            hOut = (hOut < 10) ? "0" + hOut : hOut;
                            mOut = (mOut < 10) ? "0" + mOut : mOut;
                            sOut = (sOut < 10) ? "0" + sOut : sOut;
                            timeOut = hOut + ":" + mOut + ":" + sOut;

                            setTimeout(ItsShowTimeOut, 1000);
                    }

                    function checkOutTime(){
                    document.getElementById("checkOutContainer").innerText = timeOut;  
                    }

                    ItsShowTimeOut();
                </script>
            </section>
                        
                      

            <section class="form-section">
                <input type="submit" class="submit-form-btn" name="submit" value="Registrar Visita">
            </section>

        </form>
    </div>    
        
</body>
</html>