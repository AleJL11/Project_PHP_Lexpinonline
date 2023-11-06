<?php

include("../components/components_pages/header.php");
include("../components/components_pages/sidebar.php");
include("../data/conection.php");

$id = $_REQUEST['ID'];

$consulta = $conn->prepare("SELECT * FROM usuarios WHERE id = ?");
$consulta->bind_param("s", $id);
$consulta->execute();
$resultado = $consulta->get_result();

?>

<div class="home_content">

    <div class="text">EDITAR USUARIO</div>

    <div class="container_info-config">

        <section class="edit">

            <?php

            while ($row = $resultado->fetch_assoc()) { ?>

                <form action="../data/edit.php" method="POST" class="register__form">

                    <input type="hidden" name="id" value="<?php echo $row['id']; ?>">

                    <div class="register">

                        <div class="register__box">

                            <i class="fa-regular fa-user register__icon"></i>

                            <div class="register__box-input">
                                <input type="text" name="name" class="register__input" value="<?= $row['nombre'] ?>">
                                <label for="name" class="register__label">Nombre</label>
                            </div>

                        </div>

                        <div class="register__box">

                            <i class="fa-regular fa-user register__icon"></i>

                            <div class="register__box-input">
                                <input type="text" name="last_name" class="register__input" value="<?= $row['apellido'] ?>">
                                <label for="last_name" class="register__label">Apellido</label>
                            </div>

                        </div>

                        <div class="register__box">

                            <i class="fa-regular fa-envelope register__icon"></i>

                            <div class="register__box-input">
                                <input type="email" name="email" class="register__input" value="<?= $row['correo'] ?>">
                                <label for="email" class="register__label">Correo</label>
                            </div>

                        </div>

                        <div class="register__box">

                            <i class="fa-regular fa-user register__icon"></i>

                            <div class="register__box-input">
                                <span class="register__label-select">
                                    Tipo de usuario:
                                </span>
                                <select class="register__select" name="rol">

                                    <?php

                                    if ($row['rol'] == "usuario") {
                                        echo "<option value='usuario' class='register__option' selected>Usuario</option>";
                                        echo "<option value='administrador' class='register__option'>Administrador</option>";
                                    } else {
                                        echo "<option value='usuario' class='register__option'>Usuario</option>";
                                        echo "<option value='administrador' class='register__option' selected>Administrador</option>";
                                    }

                                    ?>

                                </select>
                            </div>

                        </div>

                        <button type="submit" class="register__button" name="btn_edit">Editar</button>

                    </div>

                <?php

            }

                ?>

                </form>

        </section>

    </div>

</div>