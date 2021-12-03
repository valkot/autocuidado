
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
		<link href="assets/dist/assets/css/datatables.min.css" rel="stylesheet" type="text/css" />
		<script type="text/javascript" charset="utf8" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.11.3/jquery.js"></script>
		<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/plug-ins/1.11.1/sorting/date-de.js"></script>
		<script>
			$(document).ready( function () 
			{
			$('#table_id').DataTable( {
  					"searching": false,
				  	"columnDefs": [ { type: 'de_date', 'targets': [0] } ],
   					"order": [[ 0, 'desc' ]]
				});
			});
			
		</script>
	</head>
	<?php 
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
	<body id="kt_body" class="header-fixed header-tablet-and-mobile-fixed toolbar-enabled toolbar-fixed toolbar-tablet-and-mobile-fixed">
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
								<div class="stepper stepper-pills stepper-column d-flex flex-column flex-xl-row flex-row-fluid" id="kt_create_account_stepper"2>
									
									<div class="flex-row-fluid flex-center bg-white rounded">
										<div class="card-body table-responsive p-0">
											<table id="table_id" class="table table-hover text-center display dataTable">
											<thead>
												<tr>
												<th>FECHA</th>
												<th>TOS</th>
												<th>FIEBRE</th>
												<th>MIALGIA</th>
												<th>CEFALEA</th>
												<th>ODINOFAGIA</th>
												<th>DISNEA</th>
												<th style="width:auto;text-align:center;">DOLOR<br />TORAXICO</th>
												<th>DIARREA</th>
												<th>ANOSMIA</th>
												<th>CONGESTIÓN NASAL</th>
												<th>NAUSEAS O VÓMITO</th>
												<th>AGEUSIA</th>
												</tr>
											</thead>
											<tbody>
												<?php 
												$votoSI = 'assets/dist/assets/img/votoSI.png';
												$votoNO = 'assets/dist/assets/img/votoNO.png';
												foreach($encuestas as $row)
												{
												echo "<tr>";
													echo "<td style='text-align: center; vertical-align: middle; background-color: #transparent;'> $row->fecha </td>";

													if($row->EVAL_1 == 0)
													{echo "<td style='text-align: center; vertical-align: middle; background-color: #transparent;'> <img src='$votoNO' width='20' height='20' alt='NO' data-toggle='tooltip' data-placement='top' title='NO' /> </td>";}
													else
													{echo "<td style='text-align: center; vertical-align: middle; background-color: #transparent;'> <img src='$votoSI' width='20' height='20' alt='SI' data-toggle='tooltip' data-placement='top' title='SI' /> </td>";}
													
													if($row->EVAL_2 == 0)
													{echo "<td style='text-align: center; vertical-align: middle; background-color: #transparent;'> <img src='$votoNO' width='20' height='20' alt='NO' data-toggle='tooltip' data-placement='top' title='NO' /> </td>";}
													else
													{echo "<td style='text-align: center; vertical-align: middle; background-color: #transparent;'> <img src='$votoSI' width='20' height='20' alt='SI' data-toggle='tooltip' data-placement='top' title='SI' /> </td>";}

													if($row->EVAL_3 == 0)
													{echo "<td style='text-align: center; vertical-align: middle; background-color: #transparent;'> <img src='$votoNO' width='20' height='20' alt='NO' data-toggle='tooltip' data-placement='top' title='NO' /> </td>";}
													else
													{echo "<td style='text-align: center; vertical-align: middle; background-color: #transparent;'> <img src='$votoSI' width='20' height='20' alt='SI' data-toggle='tooltip' data-placement='top' title='SI' /> </td>";}

													if($row->EVAL_4 == 0)
													{echo "<td style='text-align: center; vertical-align: middle; background-color: #transparent;'> <img src='$votoNO' width='20' height='20' alt='NO' data-toggle='tooltip' data-placement='top' title='NO' /> </td>";}
													else
													{echo "<td style='text-align: center; vertical-align: middle; background-color: #transparent;'> <img src='$votoSI' width='20' height='20' alt='SI' data-toggle='tooltip' data-placement='top' title='SI' /> </td>";}

													if($row->EVAL_5 == 0)
													{echo "<td style='text-align: center; vertical-align: middle; background-color: #transparent;'> <img src='$votoNO' width='20' height='20' alt='NO' data-toggle='tooltip' data-placement='top' title='NO' /> </td>";}
													else
													{echo "<td style='text-align: center; vertical-align: middle; background-color: #transparent;'> <img src='$votoSI' width='20' height='20' alt='SI' data-toggle='tooltip' data-placement='top' title='SI' /> </td>";}

													if($row->EVAL_6 == 0)
													{echo "<td style='text-align: center; vertical-align: middle; background-color: #transparent;'> <img src='$votoNO' width='20' height='20' alt='NO' data-toggle='tooltip' data-placement='top' title='NO' /> </td>";}
													else
													{echo "<td style='text-align: center; vertical-align: middle; background-color: #transparent;'> <img src='$votoSI' width='20' height='20' alt='SI' data-toggle='tooltip' data-placement='top' title='SI' /> </td>";}

													if($row->EVAL_7 == 0)
													{echo "<td style='text-align: center; vertical-align: middle; background-color: #transparent;'> <img src='$votoNO' width='20' height='20' alt='NO' data-toggle='tooltip' data-placement='top' title='NO' /> </td>";}
													else
													{echo "<td style='text-align: center; vertical-align: middle; background-color: #transparent;'> <img src='$votoSI' width='20' height='20' alt='SI' data-toggle='tooltip' data-placement='top' title='SI' /> </td>";}

													if($row->EVAL_8 == 0)
													{echo "<td style='text-align: center; vertical-align: middle; background-color: #transparent;'> <img src='$votoNO' width='20' height='20' alt='NO' data-toggle='tooltip' data-placement='top' title='NO' /> </td>";}
													else
													{echo "<td style='text-align: center; vertical-align: middle; background-color: #transparent;'> <img src='$votoSI' width='20' height='20' alt='SI' data-toggle='tooltip' data-placement='top' title='SI' /> </td>";}

													if($row->EVAL_9 == 0)
													{echo "<td style='text-align: center; vertical-align: middle; background-color: #transparent;'> <img src='$votoNO' width='20' height='20' alt='NO' data-toggle='tooltip' data-placement='top' title='NO' /> </td>";}
													else
													{echo "<td style='text-align: center; vertical-align: middle; background-color: #transparent;'> <img src='$votoSI' width='20' height='20' alt='SI' data-toggle='tooltip' data-placement='top' title='SI' /> </td>";}

													if($row->EVAL_10 == 0)
													{echo "<td style='text-align: center; vertical-align: middle; background-color: #transparent;'> <img src='$votoNO' width='20' height='20' alt='NO' data-toggle='tooltip' data-placement='top' title='NO' /> </td>";}
													else
													{echo "<td style='text-align: center; vertical-align: middle; background-color: #transparent;'> <img src='$votoSI' width='20' height='20' alt='SI' data-toggle='tooltip' data-placement='top' title='SI' /> </td>";}

													if($row->EVAL_11 == 0)
													{echo "<td style='text-align: center; vertical-align: middle; background-color: #transparent;'> <img src='$votoNO' width='20' height='20' alt='NO' data-toggle='tooltip' data-placement='top' title='NO' /> </td>";}
													else
													{echo "<td style='text-align: center; vertical-align: middle; background-color: #transparent;'> <img src='$votoSI' width='20' height='20' alt='SI' data-toggle='tooltip' data-placement='top' title='SI' /> </td>";}

													if($row->EVAL_12 == 0)
													{echo "<td style='text-align: center; vertical-align: middle; background-color: #transparent;'> <img src='$votoNO' width='20' height='20' alt='NO' data-toggle='tooltip' data-placement='top' title='NO' /> </td>";}
													else
													{echo "<td style='text-align: center; vertical-align: middle; background-color: #transparent;'> <img src='$votoSI' width='20' height='20' alt='SI' data-toggle='tooltip' data-placement='top' title='SI' /> </td>";}

													
													//echo "<td><input type='checkbox' name='chb_$row->POST_id' id='chb_$row->POST_id' data-size='normal' onchange='sumar();' data-toggle='toggle' data-on-text='SÍ' data-off-text='NO' data-on-color='success' data-bootstrap-switch ></td>";
												// echo "<td style='text-align: center; vertical-align: middle; background-color: #transparent;'>$row->POST_id</td>";
												echo "</tr>";
												}
												?>
											</tbody>
											</table>
										</div>
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
		
		<script src="assets/dist/assets/js/jquery.dataTables.js"></script>
		


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