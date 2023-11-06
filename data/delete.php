<?php

    include("./conection.php");

    $id = $_REQUEST['ID'];

    $consulta = $conn->prepare("DELETE FROM usuarios WHERE id = ?");
    $consulta->bind_param("s", $id);
    $consulta->execute();

    if ($consulta == true) {
        echo "<script>
            alert('Registro Eliminado');
            window.location = '../pages/config.php';
        </script>";
    } else {
        echo "<script>
            alert('Error al Eliminar');
            window.location = '../pages/config.php';
        </script>";
    }

    $consulta->close();
    $conn->close();