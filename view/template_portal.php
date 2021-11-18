<!DOCTYPE html>
<html lang="es">

<head>
	<meta charset="utf-8">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<title>Gestión Carrera IC</title>
	<meta name="description" content="Fomento Educativo Politécnico A.C.">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="shortcut icon" type="image/x-icon" href="view/img/fepac_new_.png" class="border rounded-circle">

	<!-- <link rel="stylesheet" type="text/css" href="view/css/estilos.css"> -->
	<!-- Bootstrap -->
	<link rel="stylesheet" type="text/css" href="view/css/bootstrap.min.css">

	<!-- Admin -->
	<link rel="stylesheet" href="view/vendors/feather/feather.css">
	<link rel="stylesheet" href="view/vendors/mdi/css/materialdesignicons.min.css">
	<link rel="stylesheet" href="view/vendors/ti-icons/css/themify-icons.css">
	<link rel="stylesheet" href="view/vendors/typicons/typicons.css">
	<link rel="stylesheet" href="view/vendors/simple-line-icons/css/simple-line-icons.css">
	<link rel="stylesheet" href="view/vendors/css/vendor.bundle.base.css">
	<link rel="stylesheet" href="view/css/vertical-layout-light/style.css">
	<link rel="stylesheet" href="view/vendors/datatables.net-bs4/dataTables.bootstrap4.css">
	<link rel="stylesheet" href="js/select.dataTables.min.css">

	<!-- Notifications -->
	<link rel="stylesheet" href="view/vendors/jquery-toast-plugin/jquery.toast.min.css">

	<!-- Bootstrap -->
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="view/js/popper.min.js"></script>
	<script src="view/js/bootstrap.min.js"></script>

</head>

<body>

	<!-- <form method="post" action=""> -->
	<div class="container-scroller">

		<?php
		include "modules/banner.php";
		?>

		<div class="container-fluid page-body-wrapper">

			<!-- Carga el menu -->
			<?php
			include "modules/menu.php";
			?>


			<div class="main-panel">
				<div class="content-wrapper">
					<div class="row">

						<!-- Carga Contenido de cada pagina -->
						<?php
						$roots = new Roots();
						$roots->InicioRoot();
						?>

					</div>
				</div>
				<!-- content-wrapper ends -->
				<!-- partial:partials/_footer.html -->
				<footer class="footer">
					<div class="d-sm-flex justify-content-center align-items-center">
						<span class=" d-flex text-center"><a class=" d-flex text-center" href="https://khosting.com.mx">Khosting de México</a> &nbsp; Copyright © 2021. All rights reserved.</span>
					</div>
				</footer>
				<!-- partial -->
			</div>
			<!-- main-panel ends -->
		</div>
		<!-- page-body-wrapper ends -->
	</div>
	<!-- </form> -->

	<!-- JS -->
	<script src="view/vendors/js/vendor.bundle.base.js"></script>
	<script src="vendors/chart.js/Chart.min.js"></script>
	<script src="view/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
	<script src="view/vendors/progressbar.js/progressbar.min.js"></script>
	<script src="view/js/off-canvas.js"></script>
	<script src="view/js/hoverable-collapse.js"></script>
	<script src="view/js/template.js"></script>
	<script src="view/js/settings.js"></script>
	<script src="view/js/todolist.js"></script>
	<script src="view/js/dashboard.js"></script>
	<script src="view/js/Chart.roundedBarCharts.js"></script>

	<!-- Notification -->
	<script src="view/vendors/jquery-toast-plugin/jquery.toast.min.js"></script>
	<script src="view/js/notification.js"></script>
	<script src="view/js/toastDemo.js"></script>
	
</body>


<script type="text/javascript">
	$(document).ready(function() {
		//funcion para cerrar todas las alertas despues de 3 segundos
		setTimeout(function() {
			$(".alert").alert('close');
		}, 3000);

		$(function() {
			$('.active').removeClass('active');
			$('div.show').removeClass('show');
		});
	});
</script>


</html>