<div class="col-sm-3"></div>
<div class="col-6 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Generar</h4>
            <p class="card-description">
                Permisos
            </p>

            <form class="forms-sample" method="POST" enctype="multipart/form-data">


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
                    <input type="hidden" id="area" name="areaId" required />
                </div>

                <div class="form-group">
                    <label for="Uselect">Usuario</label>
                    <select class="form-control form-control" id="Uselect">
                        <?php
                        $usuarios = new UsuarioC();
                        $usuarios->LoadUC();
                        ?>
                    </select>
                    <input type="hidden" id="usuario" name="usuarioId" required />
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
            $('#usuario').val('1');
            //alert($('#area').val());
        });

        $('#Aselect').on('change', function() {
            var area = this.value;
            //alert(area);
            $('#area').val(area);
        });

        $('#Uselect').on('change', function() {
            var usuario = this.value;
            //alert(area);
            $('#usuario').val(usuario);
        });

    });
</script>
