
<!DOCTYPE html>
<html lang="es">
	<head><base href="../../../">
		<meta charset="utf-8" />
		<title>HSJD | Notificación Funcionarios</title>
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
						<div class="w-lg-1280px p-10 p-lg-2 mx-auto">
							<form class="form w-100" action="Notificacion/insert_funcionario/"  method="POST"  id="kt_sign_up_form">
                                <div class="row fv-row mb-7">
                                    <div class="col-xl-12">
                                        <!-- Notificador -->
                                        <div class="notice d-flex bg-light-warning rounded border-warning border border-dashed mb-2 p-3">
											<span class="svg-icon svg-icon-2tx svg-icon-warning me-4">
												<svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
													<circle fill="#000000" opacity="0.3" cx="12" cy="12" r="10"></circle>
													<rect fill="#000000" x="11" y="7" width="2" height="8" rx="1"></rect>
													<rect fill="#000000" x="11" y="16" width="2" height="2" rx="1"></rect>
												</svg>
											</span>
											<div class="d-flex flex-stack flex-grow-1">
                                                <div class="d-flex flex-column flex-column-fluid">
                                                    <div class="mb-3 mb-md-0 fw-bold">
														<h4 class="text-gray-800 fw-bolder">Datos del Notificador</h4>
													</div>
                                                    <div class="row fv-row mb-7">
                                                        <div class="col-xl-3">
                                                        </div>
                                                        <div class="col-xl-6">
                                                            <label class="required form-label fw-bolder text-dark fs-6">Email</label>
                                                            <input class="form-control text-center fs-4" type="email"  maxlength="60" onblur="permisosNotificar(this.value);" name="txt_emailNotificador" id="txt_emailNotificador" required />
                                                        </div>
                                                        
                                                        <div class="col-xl-3">
                                                        </div>
                                                    </div>
                                                </div>
											</div>
										</div>

                                        <div class="notice d-flex bg-light-primary rounded border-primary border border-dashed mb-2 p-3">
                                            <span class="svg-icon svg-icon-2tx svg-icon-primary me-4">
												<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
													<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
														<rect x="0" y="0" width="24" height="24"></rect>
														<path d="M4,4 L11.6314229,2.5691082 C11.8750185,2.52343403 12.1249815,2.52343403 12.3685771,2.5691082 L20,4 L20,13.2830094 C20,16.2173861 18.4883464,18.9447835 16,20.5 L12.5299989,22.6687507 C12.2057287,22.8714196 11.7942713,22.8714196 11.4700011,22.6687507 L8,20.5 C5.51165358,18.9447835 4,16.2173861 4,13.2830094 L4,4 Z" fill="#000000" opacity="0.3"></path>
														<path d="M11.1750002,14.75 C10.9354169,14.75 10.6958335,14.6541667 10.5041669,14.4625 L8.58750019,12.5458333 C8.20416686,12.1625 8.20416686,11.5875 8.58750019,11.2041667 C8.97083352,10.8208333 9.59375019,10.8208333 9.92916686,11.2041667 L11.1750002,12.45 L14.3375002,9.2875 C14.7208335,8.90416667 15.2958335,8.90416667 15.6791669,9.2875 C16.0625002,9.67083333 16.0625002,10.2458333 15.6791669,10.6291667 L11.8458335,14.4625 C11.6541669,14.6541667 11.4145835,14.75 11.1750002,14.75 Z" fill="#000000"></path>
													</g>
												</svg>
											</span>
											<div class="d-flex flex-stack flex-grow-1">
                                                <div class="d-flex flex-column flex-column-fluid">
                                                    <div class="mb-3 mb-md-0 fw-bold">
														<h4 class="text-gray-800 fw-bolder">Datos del Funcionario</h4>
													</div>
                                                    <div class="row fv-row mb-7">
                                                        <div class="col-xl-4">
                                                        </div>
                                                        <div class="col-xl-4">
                                                            <label class="required form-label fw-bolder text-dark fs-6">RUN</label>
                                                            <input class="form-control text-center fs-4" type="text" style="text-transform:uppercase;" onkeypress="soloNumeros(event)" onkeyup="formatearRut(this.value);" onblur="validarRut(this.value);" maxlength="12" name="txt_run" id="txt_run" required />
                                                        </div>
                                                        <div class="col-xl-4">
                                                        </div>
                                                    </div>
                                                    <div class="row fv-row mb-7" style="text-align: center;">
                                                        <div class="col-xl-12">
                                                            <label style="color: #E6E6E6; font-weight:bold; font-size: 18px;" id="lbl_nombre" name="lbl_nombre"></label>
                                                        </div>
                                                    </div>
                                                    <!-- Ingreso manual -->
                                                    <div id="contenedorIM" style="display: none;">
                                                        <div class="row fv-row mb-7">
                                                            <div class="col-xl-4">
                                                                <label class="required form-label fw-bolder text-dark fs-6">Nombre</label>
                                                                <input class="form-control text-center fs-4" type="text" style="text-transform:uppercase;" name="txt_nombre" id="txt_nombre" required>
                                                            </div>
                                                            <div class="col-xl-4">
                                                                <label class="required form-label fw-bolder text-dark fs-6">Paterno</label>
                                                                <input class="form-control text-center fs-4" type="text" style="text-transform:uppercase;" name="txt_paterno" id="txt_paterno" required>
                                                            </div>
                                                            <div class="col-xl-4">
                                                                <label class="required form-label fw-bolder text-dark fs-6">Materno</label>
                                                                <input class="form-control text-center fs-4" type="text" style="text-transform:uppercase;" name="txt_materno" id="txt_materno" required>
                                                            </div>
                                                        </div>
                                                        <div class="row fv-row mb-7">
                                                            <div class="col-xl-4">
                                                            <label class="required fs-6 fw-bold mb-2">Cargo</label>
                                                                <select class="form-select" data-control="select2" data-hide-search="true" name="cmb_cargo" id="cmb_cargo" required>
                                                                    <option value="0">Seleccione una opción</option>    
                                                                    <option value="INTRA-HOSPITALARIO">INTRA-HOSPITALARIO</option>
                                                                    <option value="EXTRA-HOSPITALARIO">EXTRA-HOSPITALARIO</option>
                                                                </select>
                                                            </div>
                                                            <div class="col-xl-4">
                                                            <label class="required fs-6 fw-bold mb-2">Estamento</label>
                                                                <select class="form-select" data-control="select2" data-hide-search="true" name="cmb_estamento" id="cmb_estamento" required>
                                                                    <option value="0" selected>Seleccione una opción</option>   
                                                                    <?php 
                                                                    foreach($estamentos as $value)
                                                                    {
                                                                        echo "<option value='$value->ESTAM_id'>$value->ESTAM_tipo</option>";
                                                                    }
                                                                    ?>
                                                                </select>
                                                            </div>
                                                            <div class="col-xl-4">
                                                            <label class="required fs-6 fw-bold mb-2">Calidad Juridica</label>
                                                                <select class="form-select" data-control="select2" data-hide-search="true" name="cmb_calidadJuridica" id="cmb_calidadJuridica" required>
                                                                    <option value="0">Seleccione una opción</option>    
                                                                    <?php 
                                                                    foreach($calidad_juridica as $value)
                                                                    {
                                                                        echo "<option value='$value->CJ_id'>$value->CJ_tipo</option>";
                                                                    }
                                                                    ?>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- fin ingreso manual -->
                                                    <div class="row fv-row mb-7">
                                                        <div class="col-md-4 fv-row">
                                                            <label class="required fs-6 fw-bold mb-2">Tipo de Contacto</label>
                                                            <select class="form-select" data-control="select2" data-hide-search="true" data-placeholder="Seleccione una opción" name="cmb_tipoContacto" id="cmb_tipoContacto" required>
                                                                <option value="">Seleccione una opción</option>    
                                                                <option value="INTRA-HOSPITALARIO">INTRA-HOSPITALARIO</option>
                                                                <option value="EXTRA-HOSPITALARIO">EXTRA-HOSPITALARIO</option>
                                                            </select>
                                                        </div>
                                                        <div class="col-md-4 fv-row">
                                                            <label class="required fs-6 fw-bold mb-2">Sintomatología</label>
                                                            <select class="form-select" data-control="select2" data-hide-search="true" data-placeholder="Seleccione una opción" name="cmb_sintomatologia" id="cmb_sintomatologia" required>
                                                                <option value="">Seleccione una opción</option>    
                                                                <option value="SINTOMATICO">SINTOMATICO</option>
                                                                <option value="ASINTOMATICO">ASINTOMATICO</option>
                                                            </select>
                                                        </div>
                                                        <div class="col-xl-4">
                                                            <label class="required form-label fw-bolder text-dark fs-6">Telefono</label>
                                                            <input class="form-control text-center fs-6" type="text"  name="txt_telefono" id="txt_telefono" onkeypress="soloNumeros(event)" maxlength="9" required />
                                                        </div>
                                                    </div>
                                                    <div class="row fv-row mb-7">
                                                        <div class="col-md-3 fv-row">
                                                            <label class="required fs-6 fw-bold mb-2">Dias perdidos</label>
                                                            <select class="form-select" data-control="select2" data-hide-search="true" data-placeholder="Seleccione dias" name="cmb_diasPerdidos" id="cmb_diasPerdidos" required>
                                                                <option value="">Seleccione dias</option>  
                                                                <?php
                                                                for($i=1; $i<=90; $i++)
                                                                {
                                                                    if($i == 1)
                                                                    {
                                                                        echo "<option value='$i'>$i día</option>";
                                                                    }
                                                                    else
                                                                    {
                                                                        echo "<option value='$i'>$i días</option>";
                                                                    }
                                                                }
                                                                ?>  
                                                            </select>
                                                        </div>
                                                        <div class="col-xl-3">
                                                            <label class="required form-label fw-bolder text-dark fs-6">PCR(+)/contacto estrecho</label>
                                                            <input class="form-control text-center fs-6" type="date"  name="txt_pcr" id="txt_pcr" onblur="activaNotificacion();" required />
                                                        </div>
                                                        <div class="col-xl-3">
                                                            <label class="required form-label fw-bolder text-dark fs-6">Fecha Ultimo dia trabajado</label>
                                                            <input class="form-control text-center fs-6" type="date"  name="txt_diaTrabajado" id="txt_diaTrabajado" required />
                                                        </div> 
                                                        <div class="col-md-3 fv-row">
                                                            <label class="required fs-6 fw-bold mb-2">Tipo de caso</label>
                                                            <select class="form-select" data-control="select2" data-hide-search="true" data-placeholder="Seleccione una opción" name="cmb_tipoCaso" id="cmb_tipoCaso" required>
                                                                <option value="">Seleccione una opción</option>    
                                                                <option value="CASO POSITIVO">CASO POSITIVO</option>
                                                                <option value="CONTACTO ESTRECHO">CONTACTO ESTRECHO</option>
                                                            </select>
                                                        </div>   
                                                    </div>
                                                    <div class="row fv-row mb-7">
                                                        <div class="col-xl-12">
                                                            <label class="required form-label fw-bolder text-dark fs-6">Observaciones</label>
                                                            <textarea class="form-control mb-8" rows="5" placeholder="" id="txt_observacion" name="txt_observacion" style="text-transform:uppercase;"></textarea>
                                                        </div>
                                                    </div>
                                                </div>
											</div>
										</div>
                                    </div>
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