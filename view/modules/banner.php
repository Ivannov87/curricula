<?php
if (!isset($_SESSION)) {
    session_start();
    if (!$_SESSION["Ingreso"]) {
        header("location:index.php?root=ingreso");
        exit();
    }
} else {
    header("location:index.php?root=ingreso");
    exit();
}
?>

<nav class="navbar default-layout col-lg-12 col-12 p-0 fixed-top d-flex align-items-top flex-row">
    <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-start">
        <div class="me-3">
            <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-bs-toggle="minimize">
                <span class="icon-menu"></span>
            </button>
        </div>
        <div>
            <a class="navbar-brand brand-logo" href="inicio.php?root=principal">
                <!-- <img src="view/img/fepac_new_.png" alt="logo" /> -->
                FEPAC
            </a>
            <a class="navbar-brand brand-logo-mini" href="inicio.php?root=principal">
                <img src="view/img/fepac_new_.png" alt="logo" />
            </a>
        </div>
    </div>
    <div class="navbar-menu-wrapper d-flex align-items-top">

        <ul class="navbar-nav ms-auto">
            <li class="nav-item dropdown d-none d-lg-block user-dropdown">
                <a class="nav-link" id="UserDropdown" href="#" data-bs-toggle="dropdown" aria-expanded="false">
                    <!-- Settings -->
                    <img class="img-xs rounded-circle" src="view/img/b1_48.png" alt="Profile image">
                </a>
                <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="UserDropdown">
                    <div class="dropdown-header text-center">
                        <!-- Einstein -->
                        <img class="img-md rounded-circle" src="view/img/einstein.png" alt="Profile image">
                        
                            <p class="mb-1 mt-3 font-weight-semibold"><?php print $_SESSION["Nom"];?></p>
                            <p class="fw-light text-muted mb-0"><?php print $_SESSION["Usr"];?></p>
                        
                    </div>
                    <a class="dropdown-item" href="index.php?root=salir"><i class="dropdown-item-icon mdi mdi-power text-primary me-2"></i>Salir</a>
                </div>
            </li>
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-bs-toggle="offcanvas">
            <span class="mdi mdi-menu"></span>
        </button>
    </div>
</nav>