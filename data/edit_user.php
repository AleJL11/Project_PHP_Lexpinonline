<?php

include("./conection.php");

$id             = $_POST['id'];
$nombre         = $_POST['name'];
$apellidos      = $_POST['last_name'];
$correo         = $_POST['email'];
$nueva_clave    = $_POST['new_pass'];
$re_nueva_clave = $_POST['repeat_new_pass'];
$img            = $_FILES['image']['tmp_name'];
$img_bin        = file_get_contents($img);

if (isset($_POST['guardar_btn'])) {

    $regexName = "/^[a-zA-ZáéíóúÁÉÍÓÚñÑ\s]+$/";
    $regexLastN = "/^[a-zA-ZáéíóúÁÉÍÓÚñÑ\s]+$/";
    $regexPass = "/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]{8,}$/";

    if (preg_match($regexName, $nombre) && preg_match($regexLastN, $apellidos) && filter_var($correo, FILTER_VALIDATE_EMAIL)) {

        $consulta = $conn->prepare("UPDATE usuarios SET nombre = ?, apellido = ?, correo = ?, img = ? WHERE id = ?");
        $consulta->bind_param("sssbi", $nombre, $apellidos, $correo, $img_bin, $id);
        $consulta->execute();
        
        if ($consulta == true) {
            echo "<script>
                    alert('Se ha actualizado el usuario');
                    window.location = '../pages/config.php';
                </script>";
        } else {
            echo "<script>
                    alert('No se ha podido actualizar el usuario');
                    window.location = '../pages/config.php';
                </script>";
        }

        $consulta->close();
        $conn->close();

    } else if ($nueva_clave == $re_nueva_clave) {
        
        if (preg_match($regexName, $nombre) && preg_match($regexLastN, $apellidos) && filter_var($correo, FILTER_VALIDATE_EMAIL) && preg_match($regexPass, $nueva_clave)) {
            
            $nueva_clave    = password_hash($nueva_clave, PASSWORD_BCRYPT);
            $consulta       = $conn->prepare("UPDATE usuarios SET nombre = ?, apellido = ?, correo = ?, clave = ?, img = ? WHERE id = ?");
            $consulta->bind_param("ssssbi", $nombre, $apellidos, $correo, $nueva_clave, $img_bin, $id);
            $consulta->execute();
            
            if ($consulta == true) {
                echo "<script>
                        alert('Se ha actualizado el usuario');
                        window.location = '../pages/config.php';
                    </script>";
            } else {
                echo "<script>
                        alert('No se ha podido actualizar el usuario');
                        window.location = '../pages/config.php';
                    </script>";
            }

            $consulta->close();
            $conn->close();

        } else {
            echo "<script>
                    alert('No se ha podido actualizar el usuario');
                    window.location = '../pages/config.php';
                </script>";
        }

    } else {
        echo "<script>
                alert('Las contraseñas no coinciden');
                window.location = '../pages/config.php';
            </script>";
    }

}
