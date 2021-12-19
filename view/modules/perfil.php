<div class="col-12 grid-margin stretch-card">
	<div class="card">
		<div class="card-body">
			<h4 class="card-title">Perfiles</h4>
			<p class="card-description">
				Registro de Perfil
			</p>
			<form class="forms-sample" method="POST">
				<div class="form-group">
					<label for="DescripcionI">Descripción</label>
					<input type="text" class="form-control" id="DescripcionI" name="DescripcionI" placeholder="Descripción" required>
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
			$('#DescripcionI').val('');
		});
	});
</script>
<?php
$perfil = new PerfilC();
$perfil->InsertP();
?>