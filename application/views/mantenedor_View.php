
<!DOCTYPE html>
<html lang="es">
	<head><base href="../">
		<meta charset="utf-8" />
		<title>Autocuidado | Mantenedor</title>
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="shortcut icon" href="assets/dist/assets/media/logos/favicon.ico" />
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
		<link href="assets/dist/assets/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css" />
		<link href="assets/dist/assets/css/style.bundle.css" rel="stylesheet" type="text/css" />
        <link href="assets/dist/assets/css/toastr.min.css" rel="stylesheet" />

        <link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/dist/assets/css/jquery.dataTables.css'; ?>">
        <script type="text/javascript" charset="utf8" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.11.3/jquery.js"></script>
        <script>
        $(document).ready( function () 
        {
        $('#table_id').DataTable();
        } );
        </script>
        <script type="text/javascript" charset="utf8" src="<?php echo base_url().'assets/dist/assets/js/jquery.dataTables.js'; ?>"></script>
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">
	</head>
    <?php
    foreach ($datos_funcionario as $valor)
		{
			$nombreCompleto = $valor->NC;
			$elPerfil = $valor->PERFIL_id;
			$nombreServicio = $valor->SERV_descripcion;
            $servicioID = $valor->SERV_id;
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
							if( ($elPerfil == 5) || ($elPerfil == 2) )
							{
								echo "<p style='text-align: right; padding-right: 30px;'><a href='/Mantenedor' class='nav-link'><i class='fa fa-cog fa-lg' aria-hidden='true'></i></a></p>";
							}
						?>
						<p style="text-align: right; padding-right: 30px;"><a href="<?= site_url('logout')?>" class="nav-link"><i class="fa fa-power-off fa-lg" aria-hidden="true"></i></a></p>
					</div>
                    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
                        <div class="post d-flex flex-column-fluid" id="kt_post">
							<div id="kt_content_container" class="container">
                                <div class="card mb-5 mb-xl-8">
									<div class="card-header border-0 pt-5">
										<div class="card-toolbar">
											<div class="menu-item px-3">
												<div class="menu-content px-3 py-3">
													<a class="btn btn-primary btn-sm px-4" href="Mantenedor/agregarFuncionario">Agregar</a>
												</div>
											</div>	
										</div>
									</div>
									<div class="card-body py-3">
                                        <div class="body table-responsive">
                                            <h2 style="text-align: center;">Listado de Funcionarios</h2>
                                            <br />
                                            <table  id="table_id" class="display dataTable"  style="font-size: 12px; margin: auto;"> 
                                                <?php 
                                                if($elPerfil > 3)
                                                {
                                                    echo "<thead>";
                                                        echo "<tr>";
                                                            echo "<th style='text-align: center;'>RUN</th>";
                                                            echo "<th style='text-align: center;'>NOMBRE</th>";
                                                            echo "<th style='text-align: center;'>CALIDAD JURIDICA</th>";
                                                            echo "<th style='text-align: center;'>ESTAMENTO</th>";
                                                            echo "<th style='text-align: center;'>ESTADO</th>";
                                                            echo "<th style='text-align: center;'></th>";
                                                            echo "<th style='text-align: center;'></th>";
                                                        echo "</tr>";
                                                    echo "</thead>";
                                                    echo "<tbody>";
                                                        foreach($load_funcionarios as $row)
                                                        {
                                                            echo "<tr id='$row->USR_id'>";
                                                                echo "<td style='text-align: center; vertical-align: middle; background-color: #transparent;'> $row->USR_run </td>";
                                                                echo "<td style='text-align: center; vertical-align: middle; background-color: #transparent;'> $row->NC </td>";
                                                                echo "<td style='text-align: center; vertical-align: middle; background-color: #transparent;'> $row->CJ_tipo </td>";
                                                                echo "<td style='text-align: center; vertical-align: middle; background-color: #transparent;'> $row->ESTAM_tipo </td>";
                                                                echo "<td style='text-align: center; vertical-align: middle; background-color: #transparent;'> $row->EST_tipo </td>";
                                                                
                                                                echo "<form action='Mantenedor/editUsuario' method='post'>";
                                                                echo "<td><button type='submit' name='btnM' id='btnM' value='$row->USR_id' class='btn bg-orange waves-effect' data-toggle='tooltip' data-placement='top' title='Editar Usuario' style='width: 25px; height: 22px; border-radius: 7px;'><i class='material-icons' style='font-size: 16px; margin: -25px -8px -5px -5px;'>create</i></button></td>";
                                                                echo "</form>";

                                                                echo "<td><button type='submit' class='btn btn-danger btnE' onclick='eliminaRegistro(".$row->USR_id.");' data-toggle='tooltip' data-placement='top' title='Eliminar Funcionario' style='width: 25px; height: 22px; border-radius: 7px;'><i class='material-icons' style='font-size: 16px; margin: -25px -8px -5px -5px;'>delete_sweep</i></button></td>";
                                                            echo "</tr>";
                                                        }
                                                    echo "</tbody>";
                                                }
                                                else
                                                {
                                                    echo "<thead>";
                                                        echo "<tr>";
                                                            echo "<th style='text-align: center;'>RUN</th>";
                                                            echo "<th style='text-align: center;'>NOMBRE</th>";
                                                            echo "<th style='text-align: center;'>CALIDAD JURIDICA</th>";
                                                            echo "<th style='text-align: center;'>ESTAMENTO</th>";
                                                            echo "<th style='text-align: center;'>ESTADO</th>";
                                                        echo "</tr>";
                                                    echo "</thead>";
                                                    echo "<tbody>";
                                                        foreach($load_funcionarios_perfilados as $row)
                                                        {
                                                            echo "<tr id='$row->USR_id'>";
                                                                echo "<td style='text-align: center; vertical-align: middle; background-color: #transparent;'> $row->USR_run </td>";
                                                                echo "<td style='text-align: center; vertical-align: middle; background-color: #transparent;'> $row->NC </td>";
                                                                echo "<td style='text-align: center; vertical-align: middle; background-color: #transparent;'> $row->CJ_tipo </td>";
                                                                echo "<td style='text-align: center; vertical-align: middle; background-color: #transparent;'> $row->ESTAM_tipo </td>";
                                                                echo "<td style='text-align: center; vertical-align: middle; background-color: #transparent;'> $row->EST_tipo </td>";
                                                            echo "</tr>";
                                                        }
                                                    echo "</tbody>";
                                                }
                                                
                                                ?>
											</table>
										</div>
									</div>
								</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="assets/dist/assets/js/custom/authentication/sign-up/general.js"></script>
		<script src="assets/dist/assets/js/scripts.bundle.js"></script>
        <script src="assets/dist/assets/js/toastr.min.js"></script>
        <script src="assets/dist/assets/js/sweetalert.min.js"></script>

        <script>
            function eliminaRegistro(valor)
            { 
                var ruta = 'Mantenedor/delUsuario/'+valor;
                swal({
                    title: "Eliminar registro",
                    text: "Seguro que desea eliminar el usuario",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                    })
                    .then((willDelete) => {
                    if (willDelete) 
                    {
                        window.location.href = ruta;
                        Command: toastr["success"]("El usuario fue eliminado satisfactoriamente.", "ELIMINADO")

                        toastr.options = 
                        {
                        "closeButton": false,
                        "debug": false,
                        "newestOnTop": false,
                        "progressBar": true,
                        "positionClass": "toast-top-right",
                        "preventDuplicates": false,
                        "onclick": null,
                        "showDuration": "300",
                        "hideDuration": "2000",
                        "timeOut": "3000",
                        "extendedTimeOut": "2000",
                        "showEasing": "swing",
                        "hideEasing": "linear",
                        "showMethod": "fadeIn",
                        "hideMethod": "fadeOut"
                        }
                    } 
                    else 
                    {
                        //swal("Your imaginary file is safe!");
                        Command: toastr["warning"]("Borrado de registro cancelado.", "CANCELADO")

                        toastr.options = 
                        {
                        "closeButton": false,
                        "debug": false,
                        "newestOnTop": false,
                        "progressBar": true,
                        "positionClass": "toast-top-right",
                        "preventDuplicates": false,
                        "onclick": null,
                        "showDuration": "300",
                        "hideDuration": "2000",
                        "timeOut": "3000",
                        "extendedTimeOut": "2000",
                        "showEasing": "swing",
                        "hideEasing": "linear",
                        "showMethod": "fadeIn",
                        "hideMethod": "fadeOut"
                        }
                    }
                    });
            }
        </script>
    </body>
</html>