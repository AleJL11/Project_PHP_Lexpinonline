<?php

session_start();

include("../components/components_pages/header.php");
include("../components/components_pages/sidebar.php");
include('../data/conection.php');

$id         = $_SESSION['id'];
$usuario    = $_SESSION['nombre'];
$apellido   = $_SESSION['apellido'];
$email      = $_SESSION['correo'];
$rol        = $_SESSION['rol'];
$password   = $_SESSION['clave'];

?>

<div class="home_content">

    <div class="text">CONFIGURACIÓN</div>

    <div class="container_info-config">

        <div class="box_info-config">
            <div class="box_text-config">
                <p class="text_gray">Perfil</p>
                <button type="button" data-bs-toggle="modal" data-bs-target="#exampleModal-perfil">
                    Ver Más
                </button>
            </div>
        </div>

        <!-- MODAL VER PERFIL -->
        <div class="modal fade" id="exampleModal-perfil" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Perfil</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">

                        <div class="perfil" id="perfil">

                            <form action="../data/edit_user.php" method="post" class="perfil__form" enctype="multipart/form-data">
                                <input type="hidden" name="id" value="<?= $id ?>">

                                <!--<div class="perfil__box">

                                    <div class="perfil__box-input">
                                        <input type="file" name="image" class="perfil__input" id="perfil__input">
                                        <label for="image" class="perfil__label">Imagen de perfil</label>
                                    </div>
                                </div>-->

                                <div class="perfil__box">

                                    <div class="perfil__box-input">
                                        <input type="text" name="name" class="perfil__input" placeholder="<?= $usuario ?>" value="<?= $usuario ?>" id="perfil__input" readonly>
                                        <label for="name" class="perfil__label">Nombre</label>
                                    </div>

                                </div>

                                <div class="perfil__box">
                                    <input type="text" name="last_name" class="perfil__input" placeholder="<?= $apellido ?>" value="<?= $apellido ?>" id="perfil__input" readonly>
                                    <label for="last_name" class="perfil__label">Apellido</label>
                                </div>

                                <div class="perfil__box">
                                    <input type="email" name="email" class="perfil__input" placeholder="<?= $email ?>" value="<?= $email ?>" id="perfil__input" readonly>
                                    <label for="email" class="perfil__label">Correo</label>
                                </div>

                                <div class="perfil__box">
                                    <input type="text" name="new_pass" class="perfil__input" placeholder="Contraseña Nueva" id="perfil__input" readonly>
                                    <label for="pass" class="perfil__label">Nueva Contraseña</label>
                                </div>

                                <div class="perfil__box">
                                    <input type="text" name="repeat_new_pass" class="perfil__input" placeholder="Repetir Contraseña" id="perfil__input" readonly>
                                    <label for="pass" class="perfil__label">Repetir Nueva Contraseña</label>
                                </div>

                                <div class="perfil__buttons">

                                    <button type="button" class="perfil__button" id="perfil__button-edit">Editar</button>

                                    <button type="button" class="perfil__button" id="perfil__button-delete">Eliminar</button>

                                    <button type="submit" class="perfil__button" name="guardar_btn">Guardar</button>

                                </div>

                            </form>

                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>

                    </div>
                </div>
            </div>
        </div>

        <?php if ($rol == 'administrador') { ?>
            <section class="table">
                <table class="table_estado" id="table_tUsuarios">
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>Correo</th>
                        <th>Rol</th>
                        <th></th>
                    </tr>
                    <?php
                    //include('../data/conection.php');
                    $consulta = $conn->prepare("SELECT * FROM usuarios");
                    $consulta->execute();
                    $resultado = $consulta->get_result();

                    while ($row = $resultado->fetch_assoc()) { ?>

                        <tr>
                            <td>
                                <?php
                                echo $row['id'];
                                ?>
                            </td>
                            <td>
                                <?php
                                echo $row['nombre'];
                                ?>
                            </td>
                            <td>
                                <?php
                                echo $row['apellido'];
                                ?>
                            </td>
                            <td>
                                <?php
                                echo $row['correo'];
                                ?>
                            </td>
                            <td>
                                <?php
                                echo $row['rol'];
                                ?>
                            </td>
                            <td>
                                <button type="button" class="button_edit">
                                    <a href="./edit.php?ID=<?php echo $row['id']; ?>">
                                        Editar
                                    </a>
                                </button>
                                <button type="button" class="button_edit">
                                    <a href="../data/delete.php echo $row['id']; ?>">
                                        Eliminar
                                    </a>
                                </button>
                            </td>
                        </tr>
                        <!--<tr>
                                <td>
                                    <?php
                                    echo $row['id'];
                                    ?>
                                </td>
                                <td>
                                    <?php
                                    echo $row['nombre'] . " " . $row['apellido'];
                                    ?>
                                </td>
                                <td>27439045</td>
                                <td>2</td>
                                <td>2</td>
                                <td>Enero, Febrero</td>
                                <td>2.000</td>
                                <td>
                                    <button type="button" class="button_edit"  data-bs-toggle="modal" data-bs-target="#exampleModal-tUsuarios">
                                        Editar
                                    </button>
                                </td>
                            </tr>-->
                    <?php
                    }
                    ?>
                </table>
            </section>
        <?php } ?>

    </div>

</div>

<script src="../assets/js/main.js"></script>

<?php

include("../components/components_pages/footer.php");

?>