<div class="col-12 grid-margin stretch-card">
	<div class="card">
		<div class="card-body">
			<h4 class="card-title">Áreas</h4>
			<p class="card-description">
				Editar de área
			</p>
			<form class="forms-sample" method="POST">


				<?php
				$edit  = new AreaC();
				$edit->EditA();

				$update = new AreaC();
				$update->UpdateA();

				?>

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