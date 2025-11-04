<?php
    #Invoke Database Connection File
    @include './database/config.php';

    session_start();

    #Function: User creation
    if(isset($_POST['submit'])){
        $username = mysqli_real_escape_string($conn, $_POST['name']);
        $password = md5($_POST['password']);
        $cpassword = md5($_POST['cpassword']);        

        #Query: List all users in the database
        $select = " SELECT * FROM users WHERE username = '$username' && password = '$password' ";
        $result = mysqli_query($conn, $select);

        #Validation: Checks if user already exists
        if(mysqli_num_rows($result) > 0){            
            $error[] = 'El Usuario Ya Existe';
        }else{
            #Password does not match
            if($password != $cpassword){
                $error[] = 'Contraseña Incorrecta';
            }else{
                #User creation
                $insert = "INSERT INTO users(username, password) VALUES('$username', '$password')";
                mysqli_query($conn, $insert);                
                header('Location:index.php');
            }
        }
    };
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Registro de Usuarios</title>        
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Font Awesome CDN -->
        <link rel="stylesheet" type="" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
        <!-- Star Wars Glyph Icons -->
        <link rel="stylesheet" href="css/sw-glyphicons/css/starwars-glyphicons.css">
        <!-- Custom CSS -->
        <link href="css/style_header.css" rel="stylesheet">        
        <link href="css/style_login.css" rel="stylesheet">        
    </head>

    <body>

        <!-- Displays header on top of the page -->
        <?php include './php/headers/header_full.php'; ?>
    
        <!-- Main Container -->
        <div class="signup-form-container">
            <!-- Form: User Creation -->
            <form action="" method="post">
                <h3>Registrar Usuario</h3>
                <?php
                    if(isset($error)){
                        foreach( $error as $error){
                            echo '<span class ="home-error-msg">'.$error.'</span>';
                        };
                    };
                ?>
                <!-- Form: User Creation Controls -->
                <input type="text" name="name" required placeholder="Nombre de usuario">
                <input type="password" name="password" required placeholder="Contraseña">
                <input type="password" name="cpassword" required placeholder="Confirmar Contraseña">                                
                <input type="submit" name="submit" value="Registrar" class="signup-form-btn">                
            </form>
        </div>
    </body>
</html>