
<!DOCTYPE html>
<html lang="es">
	<head><base href="../../">
		<meta charset="utf-8" />
		<title>Autocuidado | HSJD</title>
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="shortcut icon" href="assets/dist/assets/media/logos/favicon.ico" />
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
		<link href="assets/dist/assets/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css" />
		<link href="assets/dist/assets/css/style.bundle.css" rel="stylesheet" type="text/css" />
	</head>
	<?php 
	//echo sys_get_temp_dir();
		$valorEncuestas = 0;
		foreach ($encuesta_hoy as $valor)
		{
			$valorEncuestas = $valor->TOTAL;
		}
		$nombreCompleto = '';
		$elPerfil = '';
		$nombreServicio = '';
		foreach ($datos_funcionario as $valor)
		{
			$nombreCompleto = $valor->NC;
			$elPerfil = $valor->PERFIL_id;
			$nombreServicio = $valor->SERV_descripcion;
		}
	?>
	<body id="kt_body" class="header-fixed header-tablet-and-mobile-fixed toolbar-enabled toolbar-fixed toolbar-tablet-and-mobile-fixed" onload="verEvaluacion()">
		<div class="d-flex flex-column flex-root">
			<div class="page d-flex flex-row flex-column-fluid">
				<div class="wrapper d-flex flex-column flex-row-fluid" id="kt_wrapper">
					<div class="md-1" style="background-image: url('assets/dist/assets/img/header3.png'); background-repeat: no-repeat;background-size: cover; ">
						<br /><br /><br /><br /><br />
						<p style="text-align: right; padding-right: 30px;"><a href="<?= site_url('home')?>" class="nav-link"><i class="fa fa-home fa-lg" aria-hidden="true"></i></a></p>
						<?php 
							if( ($elPerfil == 5) || ($elPerfil == 2))
							{
								echo "<p style='text-align: right; padding-right: 30px;'><a href='/Mantenedor' class='nav-link'><i class='fa fa-cog fa-lg' aria-hidden='true'></i></a></p>";
							}
						?>
						<p style="text-align: right; padding-right: 30px;"><a href="<?= site_url('logout')?>" class="nav-link"><i class="fa fa-power-off fa-lg" aria-hidden="true"></i></a></p>
					</div>
					<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
						<div class="post d-flex flex-column-fluid" id="kt_post">
							<!--begin::Container-->
							
							<div id="kt_content_container" class="container">
								<div class="stepper stepper-pills stepper-column d-flex flex-column flex-xl-row flex-row-fluid" id="kt_create_account_stepper">
									<div class="d-flex justify-content-center bg-white rounded justify-content-xl-start flex-row-auto w-100 w-xl-300px w-xxl-400px me-9">
										<div class="px-6 px-lg-10 px-xxl-15 py-20">
											<div class="stepper-nav">
												<!--STEP 0-->
												<div class="stepper-item current" data-kt-stepper-element="nav">
													<div class="stepper-line w-25px"></div>
													<div class="stepper-icon w-25px h-25px">
														<i class="stepper-check fas fa-check"></i>
														<span class="stepper-number"></span>
													</div>
													<div class="stepper-label">
														<h3 class="stepper-title">Inicio</h3>
														<!--<div class="stepper-desc fw-bold">Setup Your Account Details</div>-->
													</div>
												</div>
												<!--STEP 1-->
												<div class="stepper-item" data-kt-stepper-element="nav">
													<div class="stepper-line w-25px"></div>
													<div class="stepper-icon w-25px h-25px">
														<i class="stepper-check fas fa-check"></i>
														<span class="stepper-number">1</span>
													</div>
													<div class="stepper-label">
														<h3 class="stepper-title">Tos</h3>
														<!--<div class="stepper-desc fw-bold">Setup Your Account Details</div>-->
													</div>
												</div>
												<!--STEP 2-->
												<div class="stepper-item" data-kt-stepper-element="nav">
													<div class="stepper-line w-25px"></div>
													<div class="stepper-icon w-25px h-25px">
														<i class="stepper-check fas fa-check"></i>
														<span class="stepper-number">2</span>
													</div>
													<div class="stepper-label">
														<h3 class="stepper-title">Fiebre</h3>
													</div>
												</div>
												<!--STEP 3-->
												<div class="stepper-item" data-kt-stepper-element="nav">
													<div class="stepper-line w-25px"></div>
													<div class="stepper-icon w-25px h-25px">
														<i class="stepper-check fas fa-check"></i>
														<span class="stepper-number">3</span>
													</div>
													<div class="stepper-label">
														<h3 class="stepper-title">Mialgia</h3>
													</div>
												</div>
												<!--STEP 4-->
												<div class="stepper-item" data-kt-stepper-element="nav">
													<div class="stepper-line w-25px"></div>
													<div class="stepper-icon w-25px h-25px">
														<i class="stepper-check fas fa-check"></i>
														<span class="stepper-number">4</span>
													</div>
													<div class="stepper-label">
														<h3 class="stepper-title">Cefalea</h3>
													</div>
												</div>
												<!--STEP 5 -->
												<div class="stepper-item" data-kt-stepper-element="nav">
													<div class="stepper-line w-25px"></div>
													<div class="stepper-icon w-25px h-25px">
														<i class="stepper-check fas fa-check"></i>
														<span class="stepper-number">5</span>
													</div>
													<div class="stepper-label">
														<h3 class="stepper-title">Odinofagia</h3>
													</div>
												</div>
												<!--STEP 6 -->
												<div class="stepper-item" data-kt-stepper-element="nav">
													<div class="stepper-line w-25px"></div>
													<div class="stepper-icon w-25px h-25px">
														<i class="stepper-check fas fa-check"></i>
														<span class="stepper-number">6</span>
													</div>
													<div class="stepper-label">
														<h3 class="stepper-title">Disnea</h3>
													</div>
												</div>
												<!--STEP 7 -->
												<div class="stepper-item" data-kt-stepper-element="nav">
													<div class="stepper-line w-25px"></div>
													<div class="stepper-icon w-25px h-25px">
														<i class="stepper-check fas fa-check"></i>
														<span class="stepper-number">7</span>
													</div>
													<div class="stepper-label">
														<h3 class="stepper-title">Dolor Toráxico</h3>
													</div>
												</div>
												<!--STEP 8 -->
												<div class="stepper-item" data-kt-stepper-element="nav">
													<div class="stepper-line w-25px"></div>
													<div class="stepper-icon w-25px h-25px">
														<i class="stepper-check fas fa-check"></i>
														<span class="stepper-number">8</span>
													</div>
													<div class="stepper-label">
														<h3 class="stepper-title">Diarrea</h3>
													</div>
												</div>
												<!--STEP 9 -->
												<div class="stepper-item" data-kt-stepper-element="nav">
													<div class="stepper-line w-25px"></div>
													<div class="stepper-icon w-25px h-25px">
														<i class="stepper-check fas fa-check"></i>
														<span class="stepper-number">9</span>
													</div>
													<div class="stepper-label">
														<h3 class="stepper-title">Anosmia</h3>
													</div>
												</div>
												<!--STEP 10 -->
												<div class="stepper-item" data-kt-stepper-element="nav">
													<div class="stepper-line w-25px"></div>
													<div class="stepper-icon w-25px h-25px">
														<i class="stepper-check fas fa-check"></i>
														<span class="stepper-number">10</span>
													</div>
													<div class="stepper-label">
														<h3 class="stepper-title">Congestión nasal</h3>
													</div>
												</div>
												<!--STEP 11 -->
												<div class="stepper-item" data-kt-stepper-element="nav">
													<div class="stepper-line w-25px"></div>
													<div class="stepper-icon w-25px h-25px">
														<i class="stepper-check fas fa-check"></i>
														<span class="stepper-number">11</span>
													</div>
													<div class="stepper-label">
														<h3 class="stepper-title">Nauseas o vómitos</h3>
													</div>
												</div>
												<!-- FINAL -->
												<div class="stepper-item" data-kt-stepper-element="nav">
													<div class="stepper-line w-25px"></div>
													<div class="stepper-icon w-25px h-25px">
														<i class="stepper-check fas fa-check"></i>
														<span class="stepper-number">12</span>
													</div>
													<div class="stepper-label">
														<h3 class="stepper-title">Ageusia</h3>
													</div>
												</div>
											</div>
											<!--end::Nav-->
										</div>
										<!--end::Wrapper-->
									</div>
									<div class="d-flex flex-row-fluid flex-center bg-white rounded">
										<form class="py-20 w-100 w-xl-700px px-9"  id="kt_create_account_form" action="<?= site_url('insert_diagnostico')?>" method="POST">
											<!--STEP 0-->
											<div class="current" data-kt-stepper-element="content">
												<div class="w-100">
													<div class="mb-10" style="text-align:center;">
														<h2 class="fw-bolder align-items-center text-dark">Hola <?php echo $nombreCompleto;?></h2>
														<h2 style="color: #AEAEAE;">(<?php echo $nombreServicio;?>)</h2>
													</div>
													<div class="pb-10 pb-lg-15">
														<h2 class="fw-bolder align-items-center text-dark">¿A continuación se presentaran 12 preguntas para realizar un autodiagnostico sobre sintomas relacionados con el SARS-COV-2, para realizar esta autoevaluación presione en el boton de continuar.</h2>
													</div>
												</div>
											</div>
											<!--STEP 1-->
											<div data-kt-stepper-element="content">
												<div class="w-100">
													<div class="mb-10" style="text-align:center;">
														<img src="assets/dist/assets/img/tos.png" alt="tos" style="width:100px; height:auto;" />
														<input type="hidden" id="valorEncuastas" value="<?php echo $valorEncuestas; ?>">
													</div>
													<div class="pb-10 pb-lg-15">
														<h2 class="fw-bolder d-flex align-items-center text-dark">¿Tiene Tos?
														<i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Pregunta 1"></i></h2>
													</div>
													<div class="fv-row">
														<div class="row">
															<div class="col-lg-6">
																<input type="radio" class="btn-check" name="rb_tos" value="1" checked="checked" id="rb_tos_1" />
																<label class="btn btn-outline btn-outline-dashed btn-outline-default p-7 d-flex align-items-center mb-10" for="rb_tos_1">
																	<span class="me-5">
																		<i class="fas fa-thumbs-up" style="font-size: 28px;"></i>
																	</span>		
																	<span class="d-block fw-bold text-start">
																		<span class="text-dark fw-bolder d-block fs-4 mb-2">Sí</span>
																		<span class="text-gray-400 fw-bold fs-6">Responda afirmativamente si presenta tos.</span>
																	</span>
																</label>
															</div>
															<div class="col-lg-6">
																<input type="radio" class="btn-check" name="rb_tos" value="0" id="rb_tos_2" />
																<label class="btn btn-outline btn-outline-dashed btn-outline-default p-7 d-flex align-items-center" for="rb_tos_2">
																	<span class="me-5">
																		<i class="fas fa-thumbs-down" style="font-size: 28px;"></i>
																	</span>
																	<span class="d-block fw-bold text-start">
																		<span class="text-dark fw-bolder d-block fs-4 mb-2">No</span>
																		<span class="text-gray-400 fw-bold fs-6">Responda negativamente si no presenta tos.</span>
																	</span>
																</label>
															</div>
														</div>
													</div>
												</div>
											</div>
											<!--STEP 2-->
											<div data-kt-stepper-element="content">
												<div class="w-100">
													<div class="mb-10" style="text-align:center;">
														<img src="assets/dist/assets/img/fiebre.png" alt="tos" style="width:100px; height:auto;" />
													</div>
													<div class="pb-10 pb-lg-15">
														<h2 class="fw-bolder d-flex align-items-center text-dark">¿Tiene Fiebre o sensación febril?
														<i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Pregunta 2"></i></h2>
													</div>
													<div class="fv-row">
														<div class="row">
															<div class="col-lg-6">
																<input type="radio" class="btn-check" name="rb_fiebre" value="1" checked="checked" id="rb_fiebre_1" />
																<label class="btn btn-outline btn-outline-dashed btn-outline-default p-7 d-flex align-items-center mb-10" for="rb_fiebre_1">
																	<span class="me-5">
																		<i class="fas fa-thumbs-up" style="font-size: 28px;"></i>
																	</span>		
																	<span class="d-block fw-bold text-start">
																		<span class="text-dark fw-bolder d-block fs-4 mb-2">Sí</span>
																		<span class="text-gray-400 fw-bold fs-6">Responda afirmativamente si presenta sintomas.</span>
																	</span>
																</label>
															</div>
															<div class="col-lg-6">
																<input type="radio" class="btn-check" name="rb_fiebre" value="0" id="rb_fiebre_2" />
																<label class="btn btn-outline btn-outline-dashed btn-outline-default p-7 d-flex align-items-center" for="rb_fiebre_2">
																	<span class="me-5">
																		<i class="fas fa-thumbs-down" style="font-size: 28px;"></i>
																	</span>
																	<span class="d-block fw-bold text-start">
																		<span class="text-dark fw-bolder d-block fs-4 mb-2">No</span>
																		<span class="text-gray-400 fw-bold fs-6">Responda negativamente si no presenta sintomas.</span>
																	</span>
																</label>
															</div>
														</div>
													</div>
												</div>
											</div>
											<!--STEP 3-->
											<div data-kt-stepper-element="content">
												<div class="w-100">
													<div class="mb-10" style="text-align:center;">
														<img src="assets/dist/assets/img/muscular.png" alt="tos" style="width:100px; height:auto;" />
													</div>
													<div class="pb-10 pb-lg-15">
														<h2 class="fw-bolder d-flex align-items-center text-dark">¿Tiene Mialgia?
														<i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Pregunta 3"></i></h2>
													</div>
													<div class="fv-row">
														<div class="row">
															<div class="col-lg-6">
																<input type="radio" class="btn-check" name="rb_mialgia" value="1" checked="checked" id="rb_mialgia_1" />
																<label class="btn btn-outline btn-outline-dashed btn-outline-default p-7 d-flex align-items-center mb-10" for="rb_mialgia_1">
																	<span class="me-5">
																		<i class="fas fa-thumbs-up" style="font-size: 28px;"></i>
																	</span>		
																	<span class="d-block fw-bold text-start">
																		<span class="text-dark fw-bolder d-block fs-4 mb-2">Sí</span>
																		<span class="text-gray-400 fw-bold fs-6">Responda afirmativamente si presenta dolor y malestar en los músculos.</span>
																	</span>
																</label>
															</div>
															<div class="col-lg-6">
																<input type="radio" class="btn-check" name="rb_mialgia" value="0" id="rb_mialgia_2" />
																<label class="btn btn-outline btn-outline-dashed btn-outline-default p-7 d-flex align-items-center" for="rb_mialgia_2">
																	<span class="me-5">
																		<i class="fas fa-thumbs-down" style="font-size: 28px;"></i>
																	</span>
																	<span class="d-block fw-bold text-start">
																		<span class="text-dark fw-bolder d-block fs-4 mb-2">No</span>
																		<span class="text-gray-400 fw-bold fs-6">Responda negativamente si no presenta dolor o malestar en los músculos.</span>
																	</span>
																</label>
															</div>
														</div>
													</div>
												</div>
											</div>
											<!--STEP 4-->
											<div data-kt-stepper-element="content">
												<div class="w-100">
													<div class="mb-10" style="text-align:center;">
														<img src="assets/dist/assets/img/cefalea.png" alt="tos" style="width:120px; height:auto;" />
													</div>
													<div class="pb-10 pb-lg-15">
														<h2 class="fw-bolder d-flex align-items-center text-dark">¿Tiene Cefalea?
														<i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Pregunta 4"></i></h2>
													</div>
													<div class="fv-row">
														<div class="row">
															<div class="col-lg-6">
																<input type="radio" class="btn-check" name="rb_cefalea" value="1" checked="checked" id="rb_cefalea_1" />
																<label class="btn btn-outline btn-outline-dashed btn-outline-default p-7 d-flex align-items-center mb-10" for="rb_cefalea_1">
																	<span class="me-5">
																		<i class="fas fa-thumbs-up" style="font-size: 28px;"></i>
																	</span>		
																	<span class="d-block fw-bold text-start">
																		<span class="text-dark fw-bolder d-block fs-4 mb-2">Sí</span>
																		<span class="text-gray-400 fw-bold fs-6">Responda afirmativamente si presenta cefalea.</span>
																	</span>
																</label>
															</div>
															<div class="col-lg-6">
																<input type="radio" class="btn-check" name="rb_cefalea" value="0" id="rb_cefalea_2" />
																<label class="btn btn-outline btn-outline-dashed btn-outline-default p-7 d-flex align-items-center" for="rb_cefalea_2">
																	<span class="me-5">
																		<i class="fas fa-thumbs-down" style="font-size: 28px;"></i>
																	</span>
																	<span class="d-block fw-bold text-start">
																		<span class="text-dark fw-bolder d-block fs-4 mb-2">No</span>
																		<span class="text-gray-400 fw-bold fs-6">Responda negativamente si no presenta cefalea.</span>
																	</span>
																</label>
															</div>
														</div>
													</div>
												</div>
											</div>
											<!--STEP 5-->
											<div data-kt-stepper-element="content">
												<div class="w-100">
													<div class="mb-10" style="text-align:center;">
														<img src="assets/dist/assets/img/tragar.png" alt="tos" style="width:100px; height:auto;" />
													</div>
													<div class="pb-10 pb-lg-15">
														<h2 class="fw-bolder d-flex align-items-center text-dark">¿Tiene Odinofagia?
														<i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Pregunta 5"></i></h2>
													</div>
													<div class="fv-row">
														<div class="row">
															<div class="col-lg-6">
																<input type="radio" class="btn-check" name="rb_odinofagia" value="1" checked="checked" id="rb_odinofagia_1" />
																<label class="btn btn-outline btn-outline-dashed btn-outline-default p-7 d-flex align-items-center mb-10" for="rb_odinofagia_1">
																	<span class="me-5">
																		<i class="fas fa-thumbs-up" style="font-size: 28px;"></i>
																	</span>		
																	<span class="d-block fw-bold text-start">
																		<span class="text-dark fw-bolder d-block fs-4 mb-2">Sí</span>
																		<span class="text-gray-400 fw-bold fs-6">Responda afirmativamente si presenta dolor al tragar alimentos sólidos y líquidos.</span>
																	</span>
																</label>
															</div>
															<div class="col-lg-6">
																<input type="radio" class="btn-check" name="rb_odinofagia" value="0" id="rb_odinofagia_2" />
																<label class="btn btn-outline btn-outline-dashed btn-outline-default p-7 d-flex align-items-center" for="rb_odinofagia_2">
																	<span class="me-5">
																		<i class="fas fa-thumbs-down" style="font-size: 28px;"></i>
																	</span>
																	<span class="d-block fw-bold text-start">
																		<span class="text-dark fw-bolder d-block fs-4 mb-2">No</span>
																		<span class="text-gray-400 fw-bold fs-6">Responda afirmativamente si presenta dolor al tragar alimentos sólidos y líquidos.</span>
																	</span>
																</label>
															</div>
														</div>
													</div>
												</div>
											</div>
											<!--STEP 6-->
											<div data-kt-stepper-element="content">
												<div class="w-100">
													<div class="mb-10" style="text-align:center;">
														<img src="assets/dist/assets/img/disnea.png" alt="tos" style="width:120px; height:auto;" />
													</div>
													<div class="pb-10 pb-lg-15">
														<h2 class="fw-bolder d-flex align-items-center text-dark">¿Tiene Disnea/Dificultad respiratoria?
														<i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Pregunta 6"></i></h2>
													</div>
													<div class="fv-row">
														<div class="row">
															<div class="col-lg-6">
																<input type="radio" class="btn-check" name="rb_disnea" value="1" checked="checked" id="rb_disnea_1" />
																<label class="btn btn-outline btn-outline-dashed btn-outline-default p-7 d-flex align-items-center mb-10" for="rb_disnea_1">
																	<span class="me-5">
																		<i class="fas fa-thumbs-up" style="font-size: 28px;"></i>
																	</span>		
																	<span class="d-block fw-bold text-start">
																		<span class="text-dark fw-bolder d-block fs-4 mb-2">Sí</span>
																		<span class="text-gray-400 fw-bold fs-6">Responda afirmativamente si presenta disnea.</span>
																	</span>
																</label>
															</div>
															<div class="col-lg-6">
																<input type="radio" class="btn-check" name="rb_disnea" value="0" id="rb_disnea_2" />
																<label class="btn btn-outline btn-outline-dashed btn-outline-default p-7 d-flex align-items-center" for="rb_disnea_2">
																	<span class="me-5">
																		<i class="fas fa-thumbs-down" style="font-size: 28px;"></i>
																	</span>
																	<span class="d-block fw-bold text-start">
																		<span class="text-dark fw-bolder d-block fs-4 mb-2">No</span>
																		<span class="text-gray-400 fw-bold fs-6">Responda negativamente si no presenta disnea.</span>
																	</span>
																</label>
															</div>
														</div>
													</div>
												</div>
											</div>
											<!--STEP 7-->
											<div data-kt-stepper-element="content">
												<div class="w-100">
													<div class="mb-10" style="text-align:center;">
														<img src="assets/dist/assets/img/pecho.png" alt="tos" style="width:100px; height:auto;" />
													</div>
													<div class="pb-10 pb-lg-15">
														<h2 class="fw-bolder d-flex align-items-center text-dark">¿Tiene dolor toráxico?
														<i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Pregunta 7"></i></h2>
													</div>
													<div class="fv-row">
														<div class="row">
															<div class="col-lg-6">
																<input type="radio" class="btn-check" name="rb_toraxico" value="1" checked="checked" id="rb_toraxico_1" />
																<label class="btn btn-outline btn-outline-dashed btn-outline-default p-7 d-flex align-items-center mb-10" for="rb_toraxico_1">
																	<span class="me-5">
																		<i class="fas fa-thumbs-up" style="font-size: 28px;"></i>
																	</span>		
																	<span class="d-block fw-bold text-start">
																		<span class="text-dark fw-bolder d-block fs-4 mb-2">Sí</span>
																		<span class="text-gray-400 fw-bold fs-6">Responda afirmativamente si presenta dolor toráxico.</span>
																	</span>
																</label>
															</div>
															<div class="col-lg-6">
																<input type="radio" class="btn-check" name="rb_toraxico" value="0" id="rb_toraxico_2" />
																<label class="btn btn-outline btn-outline-dashed btn-outline-default p-7 d-flex align-items-center" for="rb_toraxico_2">
																	<span class="me-5">
																		<i class="fas fa-thumbs-down" style="font-size: 28px;"></i>
																	</span>
																	<span class="d-block fw-bold text-start">
																		<span class="text-dark fw-bolder d-block fs-4 mb-2">No</span>
																		<span class="text-gray-400 fw-bold fs-6">Responda negativamente si no presenta dolor toráxico.</span>
																	</span>
																</label>
															</div>
														</div>
													</div>
												</div>
											</div>
											<!--STEP 8-->
											<div data-kt-stepper-element="content">
												<div class="w-100">
													<div class="mb-10" style="text-align:center;">
														<img src="assets/dist/assets/img/diarrea.png" alt="tos" style="width:120px; height:auto;" />
													</div>
													<div class="pb-10 pb-lg-15">
														<h2 class="fw-bolder d-flex align-items-center text-dark">¿Tiene Diarrea?
														<i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Pregunta 8"></i></h2>
													</div>
													<div class="fv-row">
														<div class="row">
															<div class="col-lg-6">
																<input type="radio" class="btn-check" name="rb_diarrea" value="1" checked="checked" id="rb_diarrea_1" />
																<label class="btn btn-outline btn-outline-dashed btn-outline-default p-7 d-flex align-items-center mb-10" for="rb_diarrea_1">
																	<span class="me-5">
																		<i class="fas fa-thumbs-up" style="font-size: 28px;"></i>
																	</span>		
																	<span class="d-block fw-bold text-start">
																		<span class="text-dark fw-bolder d-block fs-4 mb-2">Sí</span>
																		<span class="text-gray-400 fw-bold fs-6">Responda afirmativamente si presenta diarrea.</span>
																	</span>
																</label>
															</div>
															<div class="col-lg-6">
																<input type="radio" class="btn-check" name="rb_diarrea" value="0" id="rb_diarrea_2" />
																<label class="btn btn-outline btn-outline-dashed btn-outline-default p-7 d-flex align-items-center" for="rb_diarrea_2">
																	<span class="me-5">
																		<i class="fas fa-thumbs-down" style="font-size: 28px;"></i>
																	</span>
																	<span class="d-block fw-bold text-start">
																		<span class="text-dark fw-bolder d-block fs-4 mb-2">No</span>
																		<span class="text-gray-400 fw-bold fs-6">Responda negativamente si no presenta diarrea.</span>
																	</span>
																</label>
															</div>
														</div>
													</div>
												</div>
											</div>
											<!--STEP 9-->
											<div data-kt-stepper-element="content">
												<div class="w-100">
													<div class="mb-10" style="text-align:center;">
														<img src="assets/dist/assets/img/anosmia.png" alt="tos" style="width:100px; height:auto;" />
													</div>
													<div class="pb-10 pb-lg-15">
														<h2 class="fw-bolder d-flex align-items-center text-dark">¿Tiene Anosmia?
														<i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Pregunta 9"></i></h2>
													</div>
													<div class="fv-row">
														<div class="row">
															<div class="col-lg-6">
																<input type="radio" class="btn-check" name="rb_anosmia" value="1" checked="checked"  id="rb_anosmia_1" />
																<label class="btn btn-outline btn-outline-dashed btn-outline-default p-7 d-flex align-items-center mb-10" for="rb_anosmia_1">
																	<span class="me-5">
																		<i class="fas fa-thumbs-up" style="font-size: 28px;"></i>
																	</span>		
																	<span class="d-block fw-bold text-start">
																		<span class="text-dark fw-bolder d-block fs-4 mb-2">Sí</span>
																		<span class="text-gray-400 fw-bold fs-6">Responda afirmativamente si presenta Anosmia (Pérdida parcial o completa del sentido del olfato).</span>
																	</span>
																</label>
															</div>
															<div class="col-lg-6">
																<input type="radio" class="btn-check" name="rb_anosmia" value="0" id="rb_anosmia_2" />
																<label class="btn btn-outline btn-outline-dashed btn-outline-default p-7 d-flex align-items-center" for="rb_anosmia_2">
																	<span class="me-5">
																		<i class="fas fa-thumbs-down" style="font-size: 28px;"></i>
																	</span>
																	<span class="d-block fw-bold text-start">
																		<span class="text-dark fw-bolder d-block fs-4 mb-2">No</span>
																		<span class="text-gray-400 fw-bold fs-6">Responda negativamente si no presenta Anosmia (Pérdida parcial o completa del sentido del olfato).</span>
																	</span>
																</label>
															</div>
														</div>
													</div>
												</div>
											</div>
											<!--STEP 10-->
											<div data-kt-stepper-element="content">
												<div class="w-100">
													<div class="mb-10" style="text-align:center;">
														<img src="assets/dist/assets/img/CNasal.png" alt="cnasal" style="width:150px; height:auto;" />
													</div>
													<div class="pb-10 pb-lg-15">
														<h2 class="fw-bolder d-flex align-items-center text-dark">¿Tiene Congestión nasal?
														<i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Pregunta 10"></i></h2>
													</div>
													<div class="fv-row">
														<div class="row">
															<div class="col-lg-6">
																<input type="radio" class="btn-check" name="rb_nasal" value="1" checked="checked"  id="rb_nasal_1" />
																<label class="btn btn-outline btn-outline-dashed btn-outline-default p-7 d-flex align-items-center mb-10" for="rb_nasal_1">
																	<span class="me-5">
																		<i class="fas fa-thumbs-up" style="font-size: 28px;"></i>
																	</span>		
																	<span class="d-block fw-bold text-start">
																		<span class="text-dark fw-bolder d-block fs-4 mb-2">Sí</span>
																		<span class="text-gray-400 fw-bold fs-6">Responda afirmativamente si presenta congestión nasal.</span>
																	</span>
																</label>
															</div>
															<div class="col-lg-6">
																<input type="radio" class="btn-check" name="rb_nasal" value="0" id="rb_nasal_2" />
																<label class="btn btn-outline btn-outline-dashed btn-outline-default p-7 d-flex align-items-center" for="rb_nasal_2">
																	<span class="me-5">
																		<i class="fas fa-thumbs-down" style="font-size: 28px;"></i>
																	</span>
																	<span class="d-block fw-bold text-start">
																		<span class="text-dark fw-bolder d-block fs-4 mb-2">No</span>
																		<span class="text-gray-400 fw-bold fs-6">Responda negativamente si no presenta congestión nasal.</span>
																	</span>
																</label>
															</div>
														</div>
													</div>
												</div>
											</div>
											<!--STEP 11-->
											<div data-kt-stepper-element="content">
												<div class="w-100">
													<div class="mb-10" style="text-align:center;">
														<img src="assets/dist/assets/img/Nauseas.png" alt="nauseas" style="width:150px; height:auto;" />
													</div>
													<div class="pb-10 pb-lg-15">
														<h2 class="fw-bolder d-flex align-items-center text-dark">¿Presenta Nauseas o vómitos?
														<i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Pregunta 11"></i></h2>
													</div>
													<div class="fv-row">
														<div class="row">
															<div class="col-lg-6">
																<input type="radio" class="btn-check" name="rb_nauseas" value="1" checked="checked"  id="rb_nauseas_1" />
																<label class="btn btn-outline btn-outline-dashed btn-outline-default p-7 d-flex align-items-center mb-10" for="rb_nauseas_1">
																	<span class="me-5">
																		<i class="fas fa-thumbs-up" style="font-size: 28px;"></i>
																	</span>		
																	<span class="d-block fw-bold text-start">
																		<span class="text-dark fw-bolder d-block fs-4 mb-2">Sí</span>
																		<span class="text-gray-400 fw-bold fs-6">Responda afirmativamente si presenta nauseas o vómitos.</span>
																	</span>
																</label>
															</div>
															<div class="col-lg-6">
																<input type="radio" class="btn-check" name="rb_nauseas" value="0" id="rb_nauseas_2" />
																<label class="btn btn-outline btn-outline-dashed btn-outline-default p-7 d-flex align-items-center" for="rb_nauseas_2">
																	<span class="me-5">
																		<i class="fas fa-thumbs-down" style="font-size: 28px;"></i>
																	</span>
																	<span class="d-block fw-bold text-start">
																		<span class="text-dark fw-bolder d-block fs-4 mb-2">No</span>
																		<span class="text-gray-400 fw-bold fs-6">Responda negativamente si no presenta nauseas o vómitos.</span>
																	</span>
																</label>
															</div>
														</div>
													</div>
												</div>
											</div>
											<!--STEP 12-->
											<div data-kt-stepper-element="content">
												<div class="w-100">
													<div class="mb-10" style="text-align:center;">
														<img src="assets/dist/assets/img/anosmia.png" alt="tos" style="width:100px; height:auto;" />
													</div>
													<div class="pb-10 pb-lg-15">
														<h2 class="fw-bolder d-flex align-items-center text-dark">¿Tiene Ageusia?
														<i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Pregunta 12"></i></h2>
													</div>
													<div class="fv-row">
														<div class="row">
															<div class="col-lg-6">
																<input type="radio" class="btn-check" name="rb_ageusia" value="1" id="rb_ageusia_1" />
																<label class="btn btn-outline btn-outline-dashed btn-outline-default p-7 d-flex align-items-center mb-10" for="rb_ageusia_1">
																	<span class="me-5">
																		<i class="fas fa-thumbs-up" style="font-size: 28px;"></i>
																	</span>		
																	<span class="d-block fw-bold text-start">
																		<span class="text-dark fw-bolder d-block fs-4 mb-2">Sí</span>
																		<span class="text-gray-400 fw-bold fs-6">Responda afirmativamente si presenta Ageusia (Ausencia o pérdida casi completa del sentido del gusto).</span>
																	</span>
																</label>
															</div>
															<div class="col-lg-6">
																<input type="radio" class="btn-check" name="rb_ageusia" value="0" id="rb_ageusia_2" />
																<label class="btn btn-outline btn-outline-dashed btn-outline-default p-7 d-flex align-items-center" for="rb_ageusia_2">
																	<span class="me-5">
																		<i class="fas fa-thumbs-down" style="font-size: 28px;"></i>
																	</span>
																	<span class="d-block fw-bold text-start">
																		<span class="text-dark fw-bolder d-block fs-4 mb-2">No</span>
																		<span class="text-gray-400 fw-bold fs-6">Responda negativamente si no presenta Ageusia (Ausencia o pérdida del sentido del gusto)</span>
																	</span>
																</label>
															</div>
														</div>
													</div>
												</div>
											</div>
											<div class="d-flex flex-stack pt-10">
												<div class="mr-2">
													<button type="button" class="btn btn-lg btn-light-primary me-3"  data-kt-stepper-action="previous" onclick="validaVolver();">
														<span class="svg-icon svg-icon-4 me-1">
															<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
																<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																	<polygon points="0 0 24 0 24 24 0 24" />
																	<rect fill="#000000" opacity="0.3" transform="translate(15.000000, 12.000000) scale(-1, 1) rotate(-90.000000) translate(-15.000000, -12.000000)" x="14" y="7" width="2" height="10" rx="1" />
																	<path d="M3.7071045,15.7071045 C3.3165802,16.0976288 2.68341522,16.0976288 2.29289093,15.7071045 C1.90236664,15.3165802 1.90236664,14.6834152 2.29289093,14.2928909 L8.29289093,8.29289093 C8.67146987,7.914312 9.28105631,7.90106637 9.67572234,8.26284357 L15.6757223,13.7628436 C16.0828413,14.136036 16.1103443,14.7686034 15.7371519,15.1757223 C15.3639594,15.5828413 14.7313921,15.6103443 14.3242731,15.2371519 L9.03007346,10.3841355 L3.7071045,15.7071045 Z" fill="#000000" fill-rule="nonzero" transform="translate(9.000001, 11.999997) scale(-1, -1) rotate(90.000000) translate(-9.000001, -11.999997)" />
																</g>
															</svg>
														</span>
													Volver</button>
												</div>
												<div>
													<button type="submit" class="btn btn-lg btn-primary me-3" id="btn_enviar" style="display: none;">
														<span class="indicator-label">Enviar
															<span class="svg-icon svg-icon-3 ms-2 me-0">
																<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
																	<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																		<polygon points="0 0 24 0 24 24 0 24" />
																		<rect fill="#000000" opacity="0.5" transform="translate(8.500000, 12.000000) rotate(-90.000000) translate(-8.500000, -12.000000)" x="7.5" y="7.5" width="2" height="9" rx="1" />
																		<path d="M9.70710318,15.7071045 C9.31657888,16.0976288 8.68341391,16.0976288 8.29288961,15.7071045 C7.90236532,15.3165802 7.90236532,14.6834152 8.29288961,14.2928909 L14.2928896,8.29289093 C14.6714686,7.914312 15.281055,7.90106637 15.675721,8.26284357 L21.675721,13.7628436 C22.08284,14.136036 22.1103429,14.7686034 21.7371505,15.1757223 C21.3639581,15.5828413 20.7313908,15.6103443 20.3242718,15.2371519 L15.0300721,10.3841355 L9.70710318,15.7071045 Z" fill="#000000" fill-rule="nonzero" transform="translate(14.999999, 11.999997) scale(1, -1) rotate(90.000000) translate(-14.999999, -11.999997)" />
																	</g>
																</svg>
															</span>
														</span>
														<span class="indicator-progress">Espere porfavor...
																<span class="spinner-border spinner-border-sm align-middle ms-2"></span>
														</span>
													</button>
													<button type="button" class="btn btn-lg btn-primary" data-kt-stepper-action="next" >Continuar
														<span class="svg-icon svg-icon-4 ms-1 me-0">
															<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
																<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																	<polygon points="0 0 24 0 24 24 0 24" />
																	<rect fill="#000000" opacity="0.5" transform="translate(8.500000, 12.000000) rotate(-90.000000) translate(-8.500000, -12.000000)" x="7.5" y="7.5" width="2" height="9" rx="1" />
																	<path d="M9.70710318,15.7071045 C9.31657888,16.0976288 8.68341391,16.0976288 8.29288961,15.7071045 C7.90236532,15.3165802 7.90236532,14.6834152 8.29288961,14.2928909 L14.2928896,8.29289093 C14.6714686,7.914312 15.281055,7.90106637 15.675721,8.26284357 L21.675721,13.7628436 C22.08284,14.136036 22.1103429,14.7686034 21.7371505,15.1757223 C21.3639581,15.5828413 20.7313908,15.6103443 20.3242718,15.2371519 L15.0300721,10.3841355 L9.70710318,15.7071045 Z" fill="#000000" fill-rule="nonzero" transform="translate(14.999999, 11.999997) scale(1, -1) rotate(90.000000) translate(-14.999999, -11.999997)" />
																</g>
															</svg>
														</span>
													</button>
												</div>
											</div>
										</form>
									</div>
								</div>
							</div>

							<div id="container-mensaje" class="container" style="display: none; text-align:center;" >
								<div class="w-lg-600px bg-white rounded shadow-sm p-10 p-lg-15 mx-auto">
                                    <div class="text-center mb-10">
                                        <h1 class="text-dark mb-3">Autodiagnostico realizado</h1>
                                    </div>
                                    <div class="text-center mb-10">
                                        <div class="text-gray-400 fw-bold fs-4">Usted ya realizo su evaluacion el dia de hoy, le recordamos que solo se permite una evaluacion por día.<br />Si necesita ver sus encuestas anteriores, puede visitar la seccion de Evaluaciones para ver el historial.</div>
                                    </div>
                                    <div class="d-flex flex-wrap justify-content-center pb-lg-0">
                                        <button onclick="window.location.href='/Estadisticas'" class="btn btn-lg btn-light-primary fw-bolder">Ver Evaluaciones</button>
                                    </div>
                                </div>
							</div>
						</div>
					</div>
					<div class="footer py-4 d-flex flex-lg-column" id="kt_footer">
						<div class="container-fluid d-flex flex-column flex-md-row align-items-center justify-content-between">
							<div class="text-dark order-2 order-md-1">
								<span class="text-muted fw-bold me-1">2021©</span>
								<a href="" target="_blank" class="text-gray-800 text-hover-primary">Unidad de Informática HSJD</a>
							</div>
							<ul class="menu menu-gray-600 menu-hover-primary fw-bold order-1">
								<li class="menu-item">
									<a href="mailto:soportehsjd@redsalud.gov.cl" target="_blank" class="menu-link px-2">soportehsjd@redsalud.gov.cl</a>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div id="kt_scrolltop" class="scrolltop" data-kt-scrolltop="true">
			<span class="svg-icon">
				<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
					<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
						<polygon points="0 0 24 0 24 24 0 24" />
						<rect fill="#000000" opacity="0.5" x="11" y="10" width="2" height="10" rx="1" />
						<path d="M6.70710678,12.7071068 C6.31658249,13.0976311 5.68341751,13.0976311 5.29289322,12.7071068 C4.90236893,12.3165825 4.90236893,11.6834175 5.29289322,11.2928932 L11.2928932,5.29289322 C11.6714722,4.91431428 12.2810586,4.90106866 12.6757246,5.26284586 L18.6757246,10.7628459 C19.0828436,11.1360383 19.1103465,11.7686056 18.7371541,12.1757246 C18.3639617,12.5828436 17.7313944,12.6103465 17.3242754,12.2371541 L12.0300757,7.38413782 L6.70710678,12.7071068 Z" fill="#000000" fill-rule="nonzero" />
					</g>
				</svg>
			</span>
		</div>
		<script>
			function verEvaluacion()
			{
				var valor = $('#valorEncuastas').val();

				if( valor == 0)
				{
					$('#kt_content_container').show();
					$('#container-mensaje').hide();
				}
				else
				{
					$('#kt_content_container').hide();
					$('#container-mensaje').show();
				}
				
			}

			function validaVolver()
			{
				$('#btn_enviar').hide();
				$('#rb_ageusia_1').prop('checked',false);
				$('#rb_ageusia_2').prop('checked',false);
			}
		</script>
		<script src="assets/dist/assets/plugins/global/plugins.bundle.js"></script>
		<script src="assets/dist/assets/js/scripts.bundle.js"></script>
		<script src="assets/dist/assets/js/custom/modals/create-account.js"></script>
		<script src="assets/dist/assets/js/custom/widgets.js"></script>
		<script src="assets/dist/assets/js/custom/apps/chat/chat.js"></script>
		<script src="assets/dist/assets/js/custom/modals/create-app.js"></script>
		<script src="assets/dist/assets/js/custom/modals/upgrade-plan.js"></script>


		<script>
			$(document).ready(function()
			{	
				$("input[name=rb_ageusia]").change(function () 
				{	 
					$('#btn_enviar').show();
				});
			});
		</script>
	</body>
</html>