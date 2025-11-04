<?php
    @include './database/config.php';
    date_default_timezone_set('America/Mexico_City');

    $msg = "Tu visita ha sido registrada. Gracias.";

    if (isset($_POST['submit'])) {
        $login = $_POST['login'];
        $reason = $_POST['reason'];
        $area = $_POST['area'];
        $checkIn = $_POST['checkInContainer'];
        $checkOut = $_POST['checkOutContainer'];
        $checkInTime = strtotime($checkIn = $_POST['checkInContainer']);	
        $checkOutTime = strtotime($checkOut = $_POST['checkOutContainer']);
        $duration = ($checkOutTime - $checkInTime)/60;
        
        $insert_query = "INSERT INTO visitas (login, reason, area, checkIn, checkOut, duration) VALUES ('$login', '$reason', '$area', CAST('$checkIn' as TIME), CAST('$checkOut' AS TIME), $duration)";        

        if ($conn->query($insert_query) === TRUE) {            
                echo '<script> alert("Tu visita ha sido registrada. Gracias."); window.location.href="index.php"</script>';                
        } else {
            echo "Error: " . $insert_query . "<br>" . $conn->error;
        }
    }

    $command = escapeshellcmd('mailV2.py');
    $output = shell_exec($command);
?>




