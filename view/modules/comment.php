<div class="col-sm-3"></div>
<div class="col-6 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Comentario</h4>
            
            <form class="forms-sample" method="POST">


                <div class="form-group">
                    <label for="Aselect">Usuario</label>
                    <select class="form-control form-control" id="Uselect">
                        <?php
                        if (headers_sent()) {
                            $usuarios =  new UsuarioC();
                            $usuarios->LoadUD();
                        }
                        ?>
                    </select>
                    <input type="hidden" id="usuario" name="UsuarioI" required />
                </div>
                <div class="form-group">
                   <textarea class="form-control form-control" id="comment" name="CommentI" style="height: 200px;" placeholder="Comentario..." ></textarea>
                </div>
                <button type="submit" class="btn btn-primary me-2">Enviar</button>
                <a class="btn btn-light" href="inicio.php?root=principal">Cancelar</a>
            </form>
        </div>
    </div>
</div>
<div class="col-sm-3"></div>

<script type="text/javascript">
    $(document).ready(function() {

        $(function() {
            $('#Uselect[0]').change();
            var val = $('#Uselect option').eq(0).val();
            //alert(val);
            $('#usuario').val(val);
            $('#DescripcionI').val('');
        });

        $('#Uselect').on('change', function() {
            var usuario = this.value;
            //alert(usuario);
            $('#usuario').val(usuario);
        });
       

    });
</script>

<?php
$com = new CommentC();
$com->InsertComment();
?>