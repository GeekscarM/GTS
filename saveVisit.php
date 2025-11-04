<?php
    @include './database/config.php';
    date_default_timezone_set('America/Mexico_City');

    $msg = "Tu visita ha sido registrada. Gracias.";

    if (isset($_POST['submit'])) {
        $login = $_POST['login'];
        $reason = $_POST['reason'];   
        
        //Inicia Nueva Función para captura de checkkboxes de motivos de la consulta
        $motivos = $_POST['motivos'];
        //Termina Nueva Función para captura de checkkboxes de motivos de la consulta

        
        $insert_query = "INSERT INTO visitas (login, reason, motivos) VALUES ('$login', '$reason', '$motivos')";        

        if ($conn->query($insert_query) === TRUE) {            
                echo '<script> alert("Tu visita ha sido registrada. Gracias."); window.location.href="index.php"</script>';                
        } else {
            echo "Error: " . $insert_query . "<br>" . $conn->error;
        }
    }
?>