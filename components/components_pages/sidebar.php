<?php

include("../components/components_pages/header.php");

?>

<div class="sidebar">

    <div class="logo_content">
        <div class="logo">
            <i class="fa-solid fa-square-parking"></i>
            <div class="logo_name">Mucuritas 2</div>
        </div>
        <i class="fa-solid fa-bars" id="btn"></i>
    </div>

    <ul class="nav_list">
        <li>
            <a href="../pages/home.php">
                <i class="fa-solid fa-border-all"></i>
                <span class="links_name">Inicio</span>
            </a>
            <span class="tooltip">Inicio</span>
        </li>
        <li>
            <a href="#">
                <i class="fa-regular fa-user"></i>
                <span class="links_name">Usuario</span>
            </a>
            <span class="tooltip">Usuario</span>
        </li>
        <li>
            <a href="#">
                <i class="fa-regular fa-message"></i>
                <span class="links_name">Mensajes</span>
            </a>
            <span class="tooltip">Mensajes</span>
        </li>
        <li>
            <a href="../pages/config.php">
                <i class="fa-solid fa-gear"></i>
                <span class="links_name">Configuración</span>
            </a>
            <span class="tooltip">Configuración</span>
        </li>
    </ul>

    <div class="profile_content">
        <div class="profile">
            <div class="profile_details">
                <img src="" alt="">
                <div class="name_job">
                    <div class="name">Alejandro</div>
                </div>
            </div>
            <a href="../data/logout.php" class="log_out">
                <i class="fa-solid fa-arrow-right-from-bracket fa-flip-horizontal" id="log_out"></i>
            </a>
            
        </div>
    </div>

</div>

<?php

include("../components/components_pages/footer.php");

?>