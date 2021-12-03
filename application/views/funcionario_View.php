
<!DOCTYPE html>
<html lang="es">
	<head><base href="../../../">
		<meta charset="utf-8" />
		<title>HSJD | Permisos Funcionarios</title>
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="shortcut icon" href="assets/dist/assets/media/logos/favicon.ico" />
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
		<link href="assets/dist/assets/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css" />
		<link href="assets/dist/assets/css/style.bundle.css" rel="stylesheet" type="text/css" />
	</head>
	<?php $url = base_url().'Inicio';?>
	<body id="kt_body" class="bg-white">
		<div class="d-flex flex-column flex-root">
			<div class="d-flex flex-column flex-lg-row flex-column-fluid">
				<div class="d-flex flex-column flex-lg-row-auto w-xl-600px positon-xl-relative" style="background-color: #F2C98A">
					<div class="d-flex flex-column position-xl-fixed top-0 bottom-0 w-xl-600px scroll-y">
						<div class="d-flex flex-row-fluid flex-column text-center p-10 pt-lg-20">
							<a href="index.html" class="py-9">
								<img alt="Logo" src="assets/dist/assets/media/logos/logo-3.svg" class="h-70px" />
							</a>
							<h1 class="fw-bolder fs-2qx pb-5 pb-md-10" style="color: #986923;">Formulario de solicitid de certificado complementario para traslado de funcionarios del HSJD</h1>
							<p class="fw-bold fs-2" style="color: #986923;">Favor de completar todos los campos</p>
						</div>
						<div class="d-flex flex-row-auto bgi-no-repeat bgi-position-x-center bgi-size-contain bgi-position-y-bottom min-h-100px min-h-lg-350px" style="background-image: url(assets/dist/assets/media/illustrations/checkout.png)"></div>
					</div>
				</div>
				<div class="d-flex flex-column flex-lg-row-fluid py-10">
					<div class="d-flex flex-center flex-column flex-column-fluid">
						<div class="w-lg-800px p-10 p-lg-15 mx-auto">
							<form class="form w-100" action="Funcionario/insert_funcionario/"  method="POST"  id="kt_sign_up_form">
                                <div class="row fv-row mb-7">
                                    <div class="col-xl-2">
                                    </div>
                                    <div class="col-xl-8">
										<label class="required form-label fw-bolder text-dark fs-6">RUN</label>
										<input class="form-control form-control-lg form-control-solid text-center fs-3" type="text" style="text-transform:uppercase" onkeypress="soloNumeros(event)" onkeyup="formatearRut(this.value);" onblur="validarRut(this.value);" maxlength="12" name="txt_run" id="txt_run" required />
									</div>
                                    <div class="col-xl-2">
                                    </div>
                                </div>
								<div class="row fv-row mb-7" style="text-align: center;">
                                    <div class="col-xl-12">
										<label style="color: #E6E6E6; font-weight:bold; font-size: 18px;" id="lbl_nombre" name="lbl_nombre"></label>
									</div>
                                </div>
                                <div class="row fv-row mb-7">
                                    <div class="col-xl-12">
										<label class="required form-label fw-bolder text-dark fs-6">Dirección</label>
										<input class="form-control form-control-lg form-control-solid" type="text" placeholder="" name="txt_direccion" onclick="validaFuncionario();" style="text-transform:uppercase" required/>
									</div>
                                </div>
								<div class="row fv-row mb-7">
                                    <div class="col-md-6 fv-row">
										<label class="required fs-6 fw-bold mb-2">Región</label>
											<select class="form-select form-select-solid" data-control="select2" data-hide-search="false" name="cmb_region" id="cmb_region" required>
                                                <?php
													echo"<option value=''>Seleccione una región</option>";
                                                    foreach($regiones as $key => $value)
                                                    {
                                                        echo"<option value='$value->REG_id'>$value->REG_nombre</option>";
                                                    }
                                                ?>
											</select>
									</div>
									<div class="col-md-6 fv-row">
										<label class="required fs-6 fw-bold mb-2">Comuna</label>
											<select class="form-select form-select-solid" data-control="select2" data-hide-search="false" data-placeholder="Seleccione una comuna" name="cmb_comuna" id="cmb_comuna" required>
											</select>
									</div>
								</div>
								<div class="fv-row mb-7">
									<label class="required form-label fw-bolder text-dark fs-6">Email</label>
									<input class="form-control form-control-lg form-control-solid" type="email" placeholder="" name="txt_email" id="txt_email" onclick="validaFuncionario();" autocomplete="off" required />
								</div>
                                <div class="fv-row mb-7">
									<label class="required form-label fw-bolder text-dark fs-6">Confirmar Email</label>
									<input class="form-control form-control-lg form-control-solid" type="email" placeholder="" name="txt_email2" id="txt_email2" autocomplete="off" onblur="validarEmail();" required />
								</div>

								<div class="text-center">
									<button type="submit" id="submit" class="btn btn-lg btn-primary" data-toggle='tooltip' data-placement='top' title='Guardar información' onclick="botoneria();" disabled>
										<span class="indicator-label">Enviar</span>
										<span class="indicator-progress">Espere ...
										<span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
									</button>
									<button type="button" id="btnEsperar" class="btn btn-lg btn-primary" data-toggle='tooltip' data-placement='top' title='Espere...' style="display: none;" disabled>
										<span class="indicator-label">Espere...</span>
										<span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
									</button>
									<button type="button" id="volver"  class="btn btn-lg btn-secondary" onclick="location.href='<?php echo $url; ?>'" data-toggle='tooltip' data-placement='top' title='Volver al inicio'>
										<span class="indicator-label">Volver</span>
									</button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
		<script src="assets/dist/assets/plugins/global/plugins.bundle.js"></script>
		<script src="assets/dist/assets/js/scripts.bundle.js"></script>
		<script src="assets/dist/assets/js/custom/authentication/sign-up/general.js"></script>
        <script src="assets/dist/assets/js/validaciones.js"></script>


		<script src="assets/dist/assets/js/custom/modals/new-address.js"></script>
		<script src="assets/dist/assets/js/custom/widgets.js"></script>
		<script src="assets/dist/assets/js/custom/apps/chat/chat.js"></script>
		<script src="assets/dist/assets/js/custom/modals/create-app.js"></script>
		<script src="assets/dist/assets/js/custom/modals/upgrade-plan.js"></script>
	</body>
</html>