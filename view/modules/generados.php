<div class="col-sm-0"></div>

<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Generados</h4>
            <p class="card-description">
                Todos los archivos
                <!-- <code>.table</code> -->
            </p>
            <div class="table-responsive">
                <table class="table table-striped text-center">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Área</th>
                            <th>Documento</th>
                            <th>Materia</th>
                            <th>Versión</th>
                            <th>Descripción</th>
                            <th>Fecha Registro</th>
                            <th>Usuario</th>
                            <th>Descargar</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php
                       
                                $cargados = new ArchivoC();
                                $cargados->GetDoctos();
                            
                        ?>


                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<div class="col-sm-0"></div>