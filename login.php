<?php
    @include './database/config.php';

    #Verifies User & Password data to start and store a Session
    session_start();

    if(isset($_POST['submit'])){

        #Stores User & Password data
        $username = mysqli_real_escape_string($conn, $_POST['username']);
        $pass = md5($_POST['password']);        

        #Query for existing Username and Password
        $select = " SELECT * FROM users WHERE username = '$username' && password = '$pass' ";

        #Executes query using the database connection
        $result = mysqli_query($conn, $select);

        #Validation for user type
        if(mysqli_num_rows($result) > 0){            
            
            $row = mysqli_fetch_array($result);

            header('location:reports.php');

            # User not found
            } else {
                $error[] = 'Usuario o Contraseña Incorrectos';
            }        
    };
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
        <link href="css/style_login.css" rel="stylesheet">        
        <link rel="stylesheet" type="" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"> 
    </head>
    <body>

        <?php include './php/headers/header_full.php'; ?>

        <!-- Container for Login Form -->
        <div class="login-form-container">
            <form action="" method="post">
                <h3>Iniciar Sesión</h3>                
                
                <!-- Displays a message whenever user is not found during validation -->
                <?php
                    if(isset($error)){
                        foreach( $error as $error){
                            echo '<span class ="login-error-msg">'.$error.'</span>';
                        };
                    };
                ?>
                
                <!-- login Form controls -->
                <input class="input_box" type="text" name="username" required placeholder="Nombre de usuario"  autocomplete="off" autofocus>
                <input class="input_box" type="password" name="password" required placeholder="Contraseña"  autocomplete="off">
                <input type="submit" name="submit" value="Ingresar" class="login-form-btn">                
            </form>
        </div>      
    </body>
</html>