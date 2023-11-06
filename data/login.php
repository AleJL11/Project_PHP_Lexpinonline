<?php

    session_start();

    include('./conection.php');

    $email      = $_POST['email_login'];
    $password   = $_POST['pass_login'];

    echo "<br>".$email;
    echo "<br>".$password."<br>";

    if (isset($_POST["login_btn"])) {


        $consulta = $conn->prepare("SELECT id, nombre, apellido, correo, clave, rol FROM usuarios WHERE correo = ?");
        $consulta->bind_param("s", $email);
        $consulta->execute();
        $resultado = $consulta->get_result();

        while ($row = $resultado->fetch_assoc()) {
            $clave_encriptada = $row['clave'];

            if (password_verify($password, $clave_encriptada)) {
                //echo "<br>contraseña correcta";
                echo "<br>".$_SESSION['id']         = $row['id'];
                echo "<br>".$_SESSION['nombre']     = $row['nombre'];
                echo "<br>".$_SESSION['apellido']   = $row['apellido'];
                echo "<br>".$_SESSION['correo']     = $row['correo'];
                echo "<br>".$_SESSION['clave']      = $row['clave'];
                echo "<br>".$_SESSION['rol']        = $row['rol'];
                header("Location: ../pages/home.php");
            } else {
                echo "contraseña incorrecta";
            }
        }

    }