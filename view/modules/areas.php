
<div class="col-sm-0"></div>
<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Áreas</h4>
            <p class="card-description">
                <!-- Add class <code>.table</code> -->
                Áreas Registradas
            </p>
           
            <div class="table-responsive">
                <table class="table table-striped text-center">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Descripción</th>
                            <th>Editar</th>
                           
                        </tr>
                    </thead>
                    <tbody>

                        <?php
                        if (headers_sent()) {
                            $areas = new AreaC();
                            $areas->GetAll();
                        }

                        ?>

                    </tbody>
                </table>
            </div>
      
        </div>
    </div>
</div>
<div class="col-sm-0"></div>