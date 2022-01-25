<div class="col-sm-3"></div>
<div class="col-6 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Cargar</h4>
            <p class="card-description">
                Documento
            </p>
            <form class="forms-sample" method="POST" enctype="multipart/form-data">

                <div class="form-group">
                    <label for="exampleFormControlFile1">Elige un documento</label>
                    <!-- <input type="file" accept=".pdf,.doc,.docx" class="form-control-file" id="documentoI" name="documentoI" required> -->
                    <input type="file" accept="application/pdf" class="form-control-file" id="documentoI" name="documentoI" required>
                </div>
                <div class="form-group">
                    <label for="Aselect">Área</label>
                    <select class="form-control form-control" id="Aselect">
                        <?php
                        $areas = new AreaC();
                        $areas->LoadAP();
                        ?>
                    </select>
                    <input type="hidden" id="area" name="areaId" required />
                </div>
                <div class="form-group">
                    <label for="exampleMateria">Materia</label>
                    <input type="text" class="form-control" id="materiaI" placeholder="materiaI" name="materiaI" required>
                </div>
                <div class="form-group">
                    <label for="exampleInputDesc1">Breve descripción del documento o cambio</label>
                    <input type="text" class="form-control" id="cambioI" placeholder="Descripción" name="cambioI" required>
                </div>
                <div class="form-group">
                    <label for="exampleInputName1">Subido por</label>
                    <input type="text" class="form-control" id="usuarioI" placeholder="Name" name="usuarioI" value="<?php print $_SESSION["Usr"] ?>" readonly required>
                    <input type="hidden" id="usuarioIdI" name="usuarioIdI" value="<?php print $_SESSION["usrId"] ?>" />
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-primary me-2">Enviar</button>
                    <a class="btn btn-light" href="inicio.php?root=principal">Cancelar</a>
                </div>
            </form>
        </div>
    </div>

</div>
<div class="col-sm-3"></div>

<script type="text/javascript">
    $(document).ready(function() {

        $(function() {
            $('#area').val('1');
            //alert($('#area').val());
        });

        $('#Aselect').on('change', function() {
            var area = this.value;
            //alert(area);
            $('#area').val(area);
        });
    });
</script>

<?php

$registrar = new ArchivoC();
$registrar->InsertF();

?>