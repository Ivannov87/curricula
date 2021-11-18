<div class="col-sm-2"></div>
<div class="col-lg-8 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Cargados</h4>
            <p class="card-description">
                <!-- Add class <code>.table</code> -->
                Tus archivos
            </p>
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Documento</th>
                            <th>Versión</th>
                            <th>Descripción del cambio</th>
                            <th>Fecha Registro</th>
                        </tr>
                    </thead>
                    <tbody>



                        <?php


                        if (!isset($_SESSION)) {
                            session_start();
                            if (!empty($_SESSION["userId"])) {
                                $cargados = new ArchivoC();
                                $cargados->GetCharged($_SESSION["usrId"]);
                            }
                        }
                        ?>


                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<div class="col-sm-2"></div>