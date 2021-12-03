
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
	$laSuma = 0;
	foreach($cardinalidad_respuestas as $value)
	{
		$laSuma = $value->SUMA;  
	}
	$laSumaCardinal=0;
	foreach($ver_respuestas as $value)
	{
		$laSumaCardinal = $value->EVAL_2 + $value->EVAL_9 + $value->EVAL_12; 
	}
	
	?>
	<body id="kt_body" class="header-fixed header-tablet-and-mobile-fixed toolbar-enabled toolbar-fixed toolbar-tablet-and-mobile-fixed">
		<div class="d-flex flex-column flex-root">
			<div class="page d-flex flex-row flex-column-fluid">
				<div class="wrapper d-flex flex-column flex-row-fluid" id="kt_wrapper">
					<div class="md-1" style="background-image: url('assets/dist/assets/img/header3.png'); background-repeat: no-repeat;background-size: cover; ">
						<br /><br /><br /><br /><br />
						<p style="text-align: right; padding-right: 30px;"><a href="<?= site_url('home')?>" class="nav-link"><i class="fa fa-home fa-lg" aria-hidden="true"></i></a></p>
						<p style="text-align: right; padding-right: 30px;"><a href="<?= site_url('logout')?>" class="nav-link"><i class="fa fa-power-off fa-lg" aria-hidden="true"></i></a></p>
					</div>
					<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
						<div class="post d-flex flex-column-fluid" id="kt_post">
							<!--begin::Container-->
							
							<div id="kt_content_container" class="container">
								<input type="hidden" id="txt_valor" name="txt_valor" value="<?php echo $laSuma; ?>" />
								<input type="hidden" id="txt_cardinal" name="txt_cardinal" value="<?php echo $laSumaCardinal; ?>" />
                                <div class="w-lg-500px bg-white rounded shadow-sm p-10 p-lg-15 mx-auto" id="contenedor_positivo" style="display:none;">
                                    <div class="text-center mb-10">
                                        <h1 class="text-dark mb-3">Autochequeo finalizado</h1>
                                        <div class="text-gray-400 fw-bold fs-4">Gracias por realizar el autodiagnostico.</div>
                                    </div>
									<div class="text-center mb-10">
										<img src="assets/dist/assets/img/warning.png" alt="" style="width:200px; height:auto;">
									</div>
                                    <div class="text-center mb-10">
                                        <div class="text-gray-400 fw-bold fs-4">Su chequeo de síntomas Covid-19 resulto positivo. Se recomienda que se realice un PCR a la brevedad.</div>
                                    </div>
                                    <div class="d-flex flex-wrap justify-content-center pb-lg-0">
                                        <button onclick="window.location.href='/Estadisticas'" class="btn btn-lg btn-light-primary fw-bolder">Ver Evaluaciones</button>
                                    </div>
                                </div>

								<div class="w-lg-500px bg-white rounded shadow-sm p-10 p-lg-15 mx-auto" id="contenedor_negativo" style="display:none;">
                                    <div class="text-center mb-10">
                                        <h1 class="text-dark mb-3">Autochequeo finalizado</h1>
                                        <div class="text-gray-400 fw-bold fs-4">Gracias por realizar el autodiagnostico.</div>
                                    </div>
									<div class="text-center mb-10">
										<img src="assets/dist/assets/img/info.png" alt="" style="width:200px; height:auto;">
									</div>
                                    <div class="text-center mb-10">
                                        <div class="text-gray-400 fw-bold fs-4">Su chequeo de síntomas covid-19 está negativo. Recuerde: utilizar correctamente la mascarilla,  mantener la distancia de seguridad, lavar frecuentemente sus manos, evitar aglomeraciones y ambientes mal ventilados
.</div>
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

		<script src="assets/dist/assets/plugins/global/plugins.bundle.js"></script>
		<script src="assets/dist/assets/js/scripts.bundle.js"></script>
		<script src="assets/dist/assets/js/custom/modals/create-account.js"></script>
		<script src="assets/dist/assets/js/custom/widgets.js"></script>
		<script src="assets/dist/assets/js/custom/apps/chat/chat.js"></script>
		<script src="assets/dist/assets/js/custom/modals/create-app.js"></script>
		<script src="assets/dist/assets/js/custom/modals/upgrade-plan.js"></script>

        <script>
			var valor = $('#txt_valor').val();
			var valorCardinal = $('#txt_cardinal').val();

			if( (valor >= 2) || (valorCardinal > 0) )
			{
				$('#contenedor_positivo').show();
				$('#contenedor_negativo').hide();
			}
			else 
			{
				$('#contenedor_positivo').hide();
				$('#contenedor_negativo').show();
			}
/*
            var timer = setTimeout(function() {
                window.location='Estadisticas'
            }, 5000);
			*/
        </script>

	</body>
</html>