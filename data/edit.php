<?php

    include("./conection.php");

    //var_dump($_POST);
    $id             = $_POST['id'];
    $nombre         = $_POST['name'];
    $apellido       = $_POST['last_name'];
    $correo         = $_POST['email'];
    $rol            = $_POST['rol'];

    var_dump($_POST);

    if (isset($_POST['btn_edit'])) {
        
        $regexName = "/^[a-zA-ZáéíóúÁÉÍÓÚñÑ\s]+$/";
        $regexLastN = "/^[a-zA-ZáéíóúÁÉÍÓÚñÑ\s]+$/";
        $regexPass = "/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]{8,}$/";

        if (preg_match($regexName, $nombre) && preg_match($regexLastN, $apellido) && filter_var($correo, FILTER_VALIDATE_EMAIL)) {

            $consulta = $conn->prepare("UPDATE usuarios SET nombre = ?, apellido = ?, correo = ?, rol = ? WHERE id = ?");

            $consulta->bind_param("ssssi", $nombre, $apellido, $correo, $rol, $id);
            $consulta->execute();

            if ($consulta == true) {
                echo "<script>
                        window.location = '../pages/config.php';
                        alert('Usuario editado');
                    </script>";
            } else {
                echo "<script>
                        alert('Error al editar');
                    </script>";
            }

            $consulta->close();
            $conn->close();

        } else {
            echo "<script>
                    window.location = '../pages/config.php';
                    alert('Error al registrar');
                </script>";
        }

    }