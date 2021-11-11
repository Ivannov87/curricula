<?php
session_start();
session_destroy();
?>


<div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="content-wrapper d-flex align-items-center auth px-0">
            <div class="row w-100 mx-0">

                <div class="col-lg-4 mx-auto">
                    <div class="auth-form-light text-left py-5 px-4 px-sm-5">


                        <h1 class="fw-light text-center">Haz cerrado sesión.</h1>
                        <form method="post" action="index.php?root=ingreso">
                        <div class="mt-3">
                            <button type="submit" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn text-white">Iniciar Sesión</button>
                        </div>
                        </form>
                    </div>

                </div>
                <!-- Elemento para acceder al mensaje -->
                <div class="jq-toast-wrap">
                </div>
            </div>
        </div>
    </div>
    <!-- content-wrapper ends -->
</div>
<!-- container-scroller -->