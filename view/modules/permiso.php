<div class="col-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Permisos</h4>
            <p class="card-description">
                Registro de Permiso
            </p>
            <form class="forms-sample" method="POST">


                <div class="form-group">
                    <label for="Aselect">Usuario</label>
                    <select class="form-control form-control" id="Uselect">
                        <?php
                        if (headers_sent()) {
                            $usuarios =  new UsuarioC();
                            $usuarios->LoadAll();
                        }
                        ?>
                    </select>
                    <input type="hidden" id="usuario" name="UsuarioI" required />
                </div>

                <div class="form-group">
                    <label for="Aselect">Área</label>
                    <select class="form-control form-control" id="Aselect">
                        <?php
                        if (headers_sent()) {
                            $areas =  new AreaC();
                            $areas->LoadA();
                        }
                        ?>
                    </select>
                    <input type="hidden" id="area" name="AreaI" required />
                </div>
                <button type="submit" class="btn btn-primary me-2">Enviar</button>
                <a class="btn btn-light" href="inicio.php?root=principal">Cancelar</a>
            </form>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function() {

        $(function() {

            $('#Uselect').val("1").change();
            $('#Aselect').val("1").change();

        });

        $('#Uselect').on('change', function() {
            var usuario = this.value;
            //alert(usuario);
            $('#usuario').val(usuario);
        });
        $('#Aselect').on('change', function() {
            var area = this.value;
            //alert(area);
            $('#area').val(area);
        });

    });
</script>
<?php
$permiso = new PermisoC();
$permiso->InsertPermiso();
?>