<?php

include("./components/header.php");

?>

<div class="login">

    <form action="./data/login.php" method="post" class="login__form">

        <h2 class="login__title">Iniciar Sesión</h2>

        <div class="login__content">

            <div class="login__box">

                <i class="fa-regular fa-user login__icon"></i>

                <div class="login__box-input">
                    <input type="text" name="email_login" class="login__input" required>
                    <label for="user" class="login__label">Correo</label>
                </div>

            </div>

            <div class="login__box">

                <i class="fa-solid fa-lock login__icon"></i>

                <div class="login__box-input">
                    <input type="password" name="pass_login" class="login__input" required>
                    <label for="pass" class="login__label">Contraseña</label>
                    <i class="fa-regular fa-eye login__eye" id="eye"></i>
                </div>

            </div>

        </div>

        <button type="submit" class="login__button" name="login_btn">Iniciar Sesión</button>

        <!-- Button Modal -->
        <button type="button" class="btn btn-primary login__button" data-bs-toggle="modal" data-bs-target="#exampleModal">
            Registrarse
        </button>

    </form>

</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Registrar Usuario</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <form action="./data/register.php" method="POST" class="register__form">

                    <div class="register">

                        <div class="register__box">

                            <i class="fa-regular fa-user register__icon"></i>

                            <div class="register__box-input">
                                <input type="text" name="name" class="register__input" required>
                                <label for="user" class="register__label">Nombre</label>
                            </div>

                        </div>

                        <div class="register__box">

                            <i class="fa-regular fa-user register__icon"></i>

                            <div class="register__box-input">
                                <input type="text" name="last_name" class="register__input" required>
                                <label for="user" class="register__label">Apellido</label>
                            </div>

                        </div>

                        <div class="register__box">

                            <i class="fa-regular fa-envelope register__icon"></i>

                            <div class="register__box-input">
                                <input type="email" name="email" class="register__input" required>
                                <label for="user" class="register__label">Correo</label>
                            </div>

                        </div>

                        <div class="register__box">

                            <i class="fa-regular fa-user register__icon"></i>

                            <div class="register__box-input">
                                <span class="register__label-select">
                                    Tipo de usuario:
                                </span>
                                <select class="register__select" name="rol">
                                    <option value="administrador" class="register__option">Administrador</option>
                                    <option value="usuario" class="register__option" selected>Usuario</option>
                                </select>
                            </div>

                        </div>

                        <div class="register__box">

                            <i class="fa-solid fa-lock register__icon"></i>

                            <div class="register__box-input">
                                <input type="password" name="pass" class="register__input" required>
                                <label for="pass" class="register__label">Contraseña</label>
                                <i class="fa-regular fa-eye register__eye" id="eye"></i>
                            </div>

                        </div>

                        <div class="register__box">

                            <i class="fa-solid fa-lock register__icon"></i>

                            <div class="register__box-input">
                                <input type="password" name="repeat_pass" class="register__input" required>
                                <label for="pass" class="register__label">Repetir Contraseña</label>
                                <i class="fa-regular fa-eye register__eye" id="eye"></i>
                            </div>

                        </div>

                        <button type="submit" class="login__button" name="register_btn">Crear</button>

                    </div>

                </form>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
            </div>
        </div>
    </div>
</div>
<?php

include("./components/footer.php");

?>