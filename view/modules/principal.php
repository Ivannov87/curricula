<div class="row">
    <div class="col-sm-3"></div>
    <div class="col-sm-6">
        <div class="card card-rounded">

            <div class="card-body">
                <div>
                    <h4 class="card-title card-title-dash">Estadísticas</h4>
                    <p class="card-subtitle card-subtitle-dash">Archivos</p>
                </div>
                <div class="statistics-details d-flex align-items-center justify-content-between">
                    <div>
                        <p class="statistics-title">Cargados</p>
                        <h3 class="rate-percentage"><?php print $_SESSION["Ups"]; ?></h3>
                        <!-- <p class="text-danger d-flex"><i class="mdi mdi-menu-down"></i><span>-0.5%</span></p> -->
                    </div>
                    <?php if ($_SESSION["IsCoo"] == true) { ?>
                        <div>
                            <p class="statistics-title">Total</p>
                            <h3 class="rate-percentage"><?php print $_SESSION["Tot"]; ?></h3>
                            <!-- <p class="text-success d-flex"><i class="mdi mdi-menu-up"></i><span>+0.1%</span></p> -->
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-3"></div>
</div>
