<div class="col-sm-0"></div>
<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Usuarios</h4>
            <p class="card-description">
                <!-- Add class <code>.table</code> -->
                Usuarios Registrados
            </p>
           
            <div class="table-responsive">
                <table class="table table-striped text-center">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Usuario</th>
                            <th>Nombre</th>
                            <th>Fecha Registro</th>
                            <th>Perfil</th>

                           
                        </tr>
                    </thead>
                    <tbody>

                        <?php
                        if (headers_sent()) {
                            $usuarios = new UsuarioC();
                            $usuarios->GetAll();
                        }

                        ?>

                    </tbody>
                </table>
            </div>
      
        </div>
    </div>
</div>
<div class="col-sm-0"></div>

<?php
$delete = new UsuarioC();
$delete->DeleteU();
?>
