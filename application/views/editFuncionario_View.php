
<!DOCTYPE html>
<html lang="es">
	<head><base href="../../../">
		<meta charset="utf-8" />
		<title>Autocuidado | Edit Funcionario </title>
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="shortcut icon" href="assets/dist/assets/media/logos/favicon.ico" />
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
		<link href="assets/dist/assets/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css" />
		<link href="assets/dist/assets/css/style.bundle.css" rel="stylesheet" type="text/css" />
	</head>
	<?php 
		$url = base_url().'Mantenedor';
		$ID = '';
        $run ='';
        $nombre = '';
        $paterno = '';
        $materno = '';
        $cjID = '';
        $cjTipo ='';
        $estamID = '';
        $estamTipo = '';
        $servID = '';
        $servTipo = '';
        $genID = '';
        $genTipo = '';
        $regID = '';
        $regTipo = '';
        $comID = '';
        $comTipo = '';
        $email = '';

        foreach($data as $value)
        {
            $ID = $value->USR_id;
            $run = $value->USR_run;
            $nombre = $value->USR_nombre;
            $paterno = $value->USR_paterno;
            $materno = $value->USR_materno;
            $cjID = $value->CJ_id;
            $cjTipo = $value->CJ_tipo;
            $estamID = $value->ESTAM_id;
            $estamTipo = $value->ESTAM_tipo;
            $servID = $value->SERV_id;
            $servTipo = $value->SERV_descripcion;
            $genID = $value->GEN_id;
            $genTipo = $value->GEN_tipo;
            $regID = $value->REG_id;
            $regTipo = $value->REG_nombre;
            $comID = $value->COM_id;
            $comTipo = $value->COM_nombre;
            $email = $value->USR_email;
        }
	?>
	<body id="kt_body" class="bg-white">
		<div class="d-flex flex-column flex-root">
			<div class="d-flex flex-column flex-lg-row flex-column-fluid">
				<div class="d-flex flex-column flex-lg-row-auto w-xl-600px positon-xl-relative" style="background-color: #F2C98A">
					<div class="d-flex flex-column position-xl-fixed top-0 bottom-0 w-xl-600px scroll-y">
						<div class="d-flex flex-row-fluid flex-column text-center p-10 pt-lg-20">
							<a href="index.html" class="py-9">
								<img alt="Logo" src="assets/dist/assets/media/logos/logo-3.svg" class="h-70px" />
							</a>
							<h1 class="fw-bolder fs-2qx pb-5 pb-md-10" style="color: #986923;">Mantenedor de usuarios</h1>
							<p class="fw-bold fs-2" style="color: #986923;">Favor de llenar todos los campos
							</p>
						</div>
						<div class="d-flex flex-row-auto bgi-no-repeat bgi-position-x-center bgi-size-contain bgi-position-y-bottom min-h-100px min-h-lg-350px" style="background-image: url(assets/media/illustrations/checkout.png)"></div>
					</div>
				</div>
				<div class="d-flex flex-column flex-lg-row-fluid py-10">
					<div class="d-flex flex-center flex-column flex-column-fluid">
						<div class="w-lg-800px p-10 p-lg-15 mx-auto">
							<form class="form w-100" action="Mantenedor/update_funcionario/"  method="POST"  id="kt_sign_up_form">
								<div class="mb-10 text-center">
									<h1 class="text-dark mb-3">Editar funcionario </h1>
								</div>
								<div class="d-flex align-items-center mb-10">
									<div class="border-bottom border-gray-300 mw-50 w-100"></div>
									<span class="fw-bold text-gray-400 fs-7 mx-2"></span>
									<div class="border-bottom border-gray-300 mw-50 w-100"></div>
								</div>
                                <div class="fv-row mb-7">
									<label class="required form-label fw-bolder text-dark fs-6">RUN</label>
									<input class="form-control form-control-lg form-control-solid" type="text" placeholder="RUN" name="txt_run" id="txt_run" value="<?php echo $run; ?>" autocomplete="off" style="text-transform:uppercase; text-alig:center;" onkeypress="soloNumeros(event)" onkeyup="formatearRut(this.value);" onblur="validarRutFuncionario(this.value);" maxlength="12" required />
								</div>
                                <div class="fv-row mb-7">
									<label class="required form-label fw-bolder text-dark fs-6">Nombres</label>
									<input class="form-control form-control-lg form-control-solid" type="text" placeholder="" name="txt_nombre" id="txt_nombre" value="<?php echo $nombre; ?>" maxlength="60" style="text-transform:uppercase" autocomplete="off" required />
								</div>
								<div class="row fv-row mb-7">
									<div class="col-xl-6">
										<label class="required form-label fw-bolder text-dark fs-6">Apellido Paterno</label>
										<input class="form-control form-control-lg form-control-solid" type="text" placeholder="" name="txt_paterno" id="txt_paterno" value="<?php echo $paterno; ?>" maxlength="30" style="text-transform:uppercase" autocomplete="off" required />
									</div>
									<div class="col-xl-6">
										<label class="required form-label fw-bolder text-dark fs-6">Apellido Materno</label>
										<input class="form-control form-control-lg form-control-solid" type="text" placeholder="" name="txt_materno" id="txt_materno" value="<?php echo $materno; ?>" maxlength="30" style="text-transform:uppercase" autocomplete="off" required />
									</div>
								</div>
                                <div class="row fv-row mb-7">
									<div class="col-xl-6">
                                        <label class="required fs-6 fw-bold mb-2">Calidad Juridica</label>
										<select class="form-select form-select-solid" data-control="select2" data-hide-search="false" name="cmb_cj" id="cmb_cj" required>
                                        <?php
                                            if($cjID != 0)
                                            {
                                                echo"<option value='$cjID'>$cjTipo</option>";
                                                foreach($calidad_juridica as $key => $value)
                                                {
                                                    echo"<option value='$value->CJ_id'>$value->CJ_tipo</option>";
                                                }
                                            }
                                            else
                                            {
                                                echo"<option value=''>Seleccione una opci??n</option>";
                                                foreach($calidad_juridica as $key => $value)
                                                {
                                                    echo"<option value='$value->CJ_id'>$value->CJ_tipo</option>";
                                                }
                                            }
											
                                        ?>
										</select>
									</div>
									<div class="col-xl-6">
										<label class="required fs-6 fw-bold mb-2">Estamento</label>
										<select class="form-select form-select-solid" data-control="select2" data-hide-search="false" name="cmb_estamento" id="cmb_estamento" required>
                                        <?php
                                            if($estamID != 0)
                                            {
                                                echo"<option value='$estamID'>$estamTipo</option>";
                                                foreach($estamento as $key => $value)
                                                {
                                                    echo"<option value='$value->ESTAM_id'>$value->ESTAM_tipo</option>";
                                                }
                                            }
                                            else
                                            {
                                                echo"<option value=''>Seleccione una opci??n</option>";
                                                foreach($estamento as $key => $value)
                                                {
                                                    echo"<option value='$value->ESTAM_id'>$value->ESTAM_tipo</option>";
                                                }
                                            }
											
                                        ?>
										</select>
									</div>
								</div>
								<div class="row fv-row mb-7">
									<div class="col-xl-6">
                                        <label class="required fs-6 fw-bold mb-2">Servicio/Unidad</label>
										<select class="form-select form-select-solid" data-control="select2" data-hide-search="false" name="cmb_servicio" id="cmb_servicio" required>
                                        <?php
                                            if($servID != 0)
                                            {
                                                echo"<option value='$servID'>$servTipo</option>";
                                                foreach($load_servicios as $key => $value)
												{
													echo"<option value='$value->SERV_id'>$value->SERV_descripcion</option>";
												}
                                            }
                                            else
                                            {
                                                echo"<option value=''>Seleccione una opci??n</option>";
                                                foreach($load_servicios as $key => $value)
												{
													echo"<option value='$value->SERV_id'>$value->SERV_descripcion</option>";
												}
                                            }	
                                        ?>
										</select>
									</div>
									<div class="col-xl-6">
										<label class="required fs-6 fw-bold mb-2">Genero</label>
										<select class="form-select form-select-solid" data-control="select2" data-hide-search="false" name="cmb_genero" id="cmb_genero" required>
                                        <?php
                                            if($genID != 0)
                                            {
                                                echo"<option value='$genID'>$genTipo</option>";
                                                foreach($load_generos as $key => $value)
                                                {
                                                    echo"<option value='$value->GEN_id'>$value->GEN_tipo</option>";
                                                }
                                            }
                                            else
                                            {
                                                echo"<option value=''>Seleccione una opci??n</option>";
                                                foreach($load_generos as $key => $value)
                                                {
                                                    echo"<option value='$value->GEN_id'>$value->GEN_tipo</option>";
                                                }
                                            }
											
                                        ?>
										</select>
									</div>
								</div>
								<div class="row fv-row mb-7">
									<div class="col-xl-6">
                                        <label class="required fs-6 fw-bold mb-2">Regi??n</label>
										<select class="form-select form-select-solid" data-control="select2" data-hide-search="false" name="cmb_region" id="cmb_region" required>
                                        <?php
                                            if($regID != 0)
                                            {
                                                echo"<option value='$regID'>$regTipo</option>";
                                                foreach($load_regiones as $key => $value)
                                                {
                                                    echo"<option value='$value->REG_id'>$value->REG_nombre</option>";
                                                }
                                            }
                                            else
                                            {
                                                echo"<option value=''>Seleccione una opci??n</option>";
                                                foreach($load_regiones as $key => $value)
                                                {
                                                    echo"<option value='$value->REG_id'>$value->REG_nombre</option>";
                                                }
                                            }
                                        ?>
										</select>
									</div>
									<div class="col-xl-6">
										<label class="required fs-6 fw-bold mb-2">Comuna</label>
										<select class="form-select form-select-solid" data-control="select2" data-hide-search="false" name="cmb_comuna" id="cmb_comuna" onchange="validaCampos();" required>
                                        <?php
                                            if($comID != 0)
                                            {
                                                echo"<option value='$comID'>$comTipo</option>";
                                            }
                                            else
                                            {
                                                echo"<option value=''>Seleccione una opci??n</option>";  
                                            }
											
                                           
                                        ?>
										</select>
									</div>
								</div>
								<div class="fv-row mb-7">
									<label class="required form-label fw-bolder text-dark fs-6">E-mail</label>
									<input class="form-control form-control-lg form-control-solid" type="email" placeholder="" value="<?php echo $email; ?>" name="txt_email" id="txt_email" maxlength="80" style="text-transform:lowercase" autocomplete="off" />
								</div>
								<div class="text-center">
									<button type="submit" id="submit" onclick="mensajeSave();" class="btn btn-lg btn-primary">
										<span class="indicator-label">Guardar</span>
									</button>
									<button type="button" id="volver"  class="btn btn-lg btn-secondary" onclick="location.href='<?php echo $url; ?>'" data-toggle='tooltip' data-placement='top' title='Volver al mantenedor'>
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
	</body>
</html>