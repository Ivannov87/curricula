

<div class="col-12 grid-margin stretch-card">
	<div class="card">
		<div class="card-body">
			<h4 class="card-title">Usuarios</h4>
			<p class="card-description">
				Registro de usuario
			</p>
			<form class="forms-sample" method="POST">

			<div class="form-group">
					<label for="UsuarioI">Usuario</label>
					<input type="email" class="form-control" id="UsuarioI" name="UsuarioI" placeholder="ejemplo@ejemplo.com" required>
				</div>

				<div class="form-group">
					<label for="PassI">Contraseña</label>
					<input type="password" class="form-control" id="PassI" name="PassI" placeholder="Contraseña" required>
				</div>

				<div class="form-group">
					<label for="NombreI">Nombre</label>
					<input type="text" class="form-control" id="NombreI" name=NombreI placeholder="Name" required>
				</div>
				
				<div class="form-group">
                    <label for="Aselect">Perfil</label>
                    <select class="form-control form-control" id="Pselect">
                        <?php
                        if (headers_sent()) {
                            $perfiles =  new PerfilC();
                            $perfiles->LoadP();
                        }
                        ?>
                    </select>
                    <input type="hidden" id="perfil" name="PerfilI" required />
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
            //$('#perfil').val('2');
			$('#Pselect').val("2").change();
			$('#UsuarioI').val('');
			$('#PassI').val('');
			$('#NombreI').val('');
        });

        $('#Pselect').on('change', function() {
            var perfil = this.value;
            //alert(perfil);
            $('#perfil').val(perfil);
        });

    });
</script>
<?php 
 $usuario = new UsuarioC();
 $usuario->InsertU();
?>