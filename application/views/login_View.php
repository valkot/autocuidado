<!DOCTYPE html>
<html lang="es">
<?php header( 'X-Frame-Options: SAMEORIGIN' ); ?>
	<head><base href="../../../">
		<meta charset="utf-8" />
		<title>Autocuidado | Login</title>
    <link rel="canonical" href="Https://preview.keenthemes.com/metronic8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="shortcut icon" href="assets/dist/assets/media/logos/favicon.ico" />
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
		<link href="assets/dist/assets/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css" />
		<link href="assets/dist/assets/css/style.bundle.css" rel="stylesheet" type="text/css" />
	</head>
	<body id="kt_body" class="bg-dark">
		<div class="d-flex flex-column flex-root">
			<div class="d-flex flex-column flex-column-fluid bgi-position-y-bottom position-x-center bgi-no-repeat bgi-size-contain bgi-attachment-fixed" style="background-size1: 100% 50%; background-image: url(assets/dist/assets/media/misc/outdoor.png)">
			<div class="d-flex flex-center flex-column flex-column-fluid p-10 pb-lg-20">
					<a href="Inicio" class="mb-12">
						<img alt="Logo" src="assets/dist/assets/media/logos/logo-3.svg" class="h-45px" />
					</a>
					<div class="w-lg-500px bg-white rounded shadow-sm p-10 p-lg-15 mx-auto">
            <form id="sign_in" action="<?= site_url('authenticate')?>" class="form w-100" method="POST">
							<div class="text-center mb-10">
								<h1 class="text-dark mb-3">Login Autocuidado HSJD</h1>
							</div>
							<div class="fv-row mb-10">
								<label class="form-label fs-6 fw-bolder text-dark">RUN</label>
								<input class="form-control form-control-lg form-control-solid" type="text" name="username" id="username" placeholder="Run" data-toggle='tooltip' data-placement='top' title='Ingrese el Run' onkeypress="soloNumeros(event)" onkeyup="formatearRut(this.value);" onblur="validarRut(this.value);" maxlength="12" style="text-align: center; color: black; font-size: 20px; font-weight: bold; text-transform: uppercase;" required autocomplete="off" />
							</div>
							<div class="fv-row mb-10">
								<div class="d-flex flex-stack mb-2">
									<label class="form-label fw-bolder text-dark fs-6 mb-0">Contraseña</label>
								</div>
								<input class="form-control form-control-lg form-control-solid" type="password" name="password" id="password" placeholder="CONTRASEÑA" data-toggle='tooltip' data-placement='top' title='Ingrese la contraseña' maxlength="20" style="text-align: center; color: black; font-size: 20px; font-weight: bold;" autocomplete="off" />
							</div>
              <div class="fv-row mb-10">
                <table style="margin: 0px auto;">
                    <tbody>
                        <tr>
                            <td><?php //echo $this->recaptcha->render(); ?></td>
                        </tr>
                    </tbody>
                </table> 
              </div>
              <div class="text-center">
                <button type="submit" id="btn_enviar" class="btn btn-lg btn-primary w-100 mb-5">
                  <span class="indicator-label">Ingresar</span>
                </button>
              </div>
						</form>
						<div class="text-center">
							<button  id="btn_tutorial" class="btn btn-sm btn-outline-info w-50 mb-2" onclick="window.open('/assets/tutorial/tutorial_autocuidado.html','_blank');">
							<span class="indicator-label">Tutorial</span>
							</button>
						</div>
					</div>
				</div>
			</div>
		</div>
		<script src="assets/dist/assets/plugins/global/plugins.bundle.js"></script>
		<script src="assets/dist/assets/js/scripts.bundle.js"></script>
		<script src="assets/dist/assets/js/custom/authentication/sign-in/general.js"></script>
    	<script src="assets/dist/assets/js/validacion_login.js"></script>
	</body>
</html>