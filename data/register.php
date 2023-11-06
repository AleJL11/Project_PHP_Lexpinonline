<?php

    include("./conection.php");

    $name           = $_POST['name'];
    $last_name      = $_POST['last_name'];
    $email          = $_POST['email'];
    $password       = $_POST['pass'];
    $repeat_pass    = $_POST['repeat_pass'];
    $rol            = $_POST['rol'];
    
    if (isset($_POST['register_btn'])) {
        
        $regexName = "/^[a-zA-ZáéíóúÁÉÍÓÚñÑ\s]+$/";
        $regexLastN = "/^[a-zA-ZáéíóúÁÉÍÓÚñÑ\s]+$/";
        $regexPass = "/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]{8,}$/";

        if ($password === $repeat_pass) {
            
            if (preg_match($regexName, $name) && preg_match($regexLastN, $last_name) && filter_var($email, FILTER_VALIDATE_EMAIL) && preg_match($regexPass, $password)) {

                $password = password_hash($password, PASSWORD_BCRYPT);
                $consulta = $conn->prepare("INSERT INTO usuarios (nombre, apellido, correo, clave, rol) VALUES (?, ?, ?, ?, ?)");
                $consulta->bind_param("sssss", $name, $last_name, $email, $password, $rol);
                $consulta->execute();

                if ($consulta == true) {
                    echo "<script>
                            window.location = '../index.php';
                            alert('Registro exitoso');
                        </script>";
                }

                $consulta->close();
                $conn->close();

                /*$to         = $email;
                $subject    = "Registro exitoso";
                $message    = "Gracias por registrarte en nuestra web".$name." ".$last_name;
                
                $headers    = "From: alejandro020215@gmail.com\r\n";
                $headers    .= "Reply-To: alejandro020215@gmail.com\r\n";
                $headers    .= "Content-Type: text/html\r\n";

                if (mail($to, $subject, $message, $headers)) {
                    echo "Enviado";
                } else {
                    echo "No enviado";
                }*/

            } else {
                echo "No valido";
            }

        } else {
            echo "Las contraseñas no coinciden";
        }

    }