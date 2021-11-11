<form method="post" action="">
	<div class="container-scroller">
		<div class="container-fluid page-body-wrapper full-page-wrapper">
			<div class="content-wrapper d-flex align-items-center auth px-0">
				<div class="row w-100 mx-0">
					<div class="col-lg-4 mx-auto">
						<div class="auth-form-light text-left py-5 px-4 px-sm-5">
							<div class="brand-logo">
								<img src="view/img/fepac_new_.png" alt="logo">
							</div>
							<!-- <h4>Hello! let's get started</h4>
              <h6 class="fw-light">Sign in to continue.</h6> -->
							<h6 class="fw-light">Ingresa tus credenciales para continuar.</h6>
							<!-- <form class="pt-3"> -->
								<div class="form-group">
									<input type="email" class="form-control form-control-lg" id="exampleInputEmail1" name="usuarioI" placeholder="Usuario" required>
								</div>
								<div class="form-group">
									<input type="password" class="form-control form-control-lg" id="exampleInputPassword1" name="claveI" placeholder="Contraseña" required>
								</div>
								<div class="mt-3">
									<button class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn text-white">Ingresar</button>
								</div>
						</div>

					</div>
					<!-- Elemento para acceder al mensaje -->
					<div class="jq-toast-wrap">
					</div>
				</div>
			</div>
		</div>
		<!-- content-wrapper ends -->
	</div>
	<!-- container-scroller -->
</form>


<?php

$ingreso = new AdminC();
$ingreso->Login();
