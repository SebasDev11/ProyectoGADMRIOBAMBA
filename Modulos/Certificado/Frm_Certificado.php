<?php
include "../../DAO/DAO.php";
$nivel=$_GET["nivel"];
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">
	<title> CONSULTORIOS TECNOLÓGICOS FACULTAS DE INGENIERÍA</title>
	<link rel="shortcut icon" href="../../Recursos/images/Lunach.png">
	<!-- Bootstrap core CSS -->
	<link href="../../Recursos/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<!-- Fontawesome CSS -->
	<!-- Owl Carousel CSS -->
	<link href="../../Recursos/css/owl.carousel.min.css" rel="stylesheet">
	<!-- Owl Carousel CSS -->
	<link href="../../Recursos/css/jquery.fancybox.min.css" rel="stylesheet">

    <link href="../../Recursos/fontawesome/css/all.css" rel="stylesheet">

	<!-- Custom styles for this template -->
	<link href="../../Recursos/css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.css" />

    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

    <script type="text/javascript">
        /// some script

        // jquery ready start
        $(document).ready(function() {
            // jQuery code

            //////////////////////// Prevent closing from click inside dropdown
            $(document).on('click', '.dropdown-menu', function(e) {
                e.stopPropagation();
            });

            // make it as accordion for smaller screens
            if ($(window).width() < 992) {
                $('.dropdown-menu a').click(function(e) {
                    e.preventDefault();
                    if ($(this).next('.submenu').length) {
                        $(this).next('.submenu').toggle();
                    }
                    $('.dropdown').on('hide.bs.dropdown', function() {
                        $(this).find('.submenu').hide();
                    })
                });
            }

        }); // jquery end
    </script>
</head>
<body>
<div class="wrapper-main">
	<!-- Top Bar -->
	<div class="top-bar">
		<div class="container">
			<div class="row">
				<div class="col-lg-6">
					<div class="social-media">
						<ul>
							<li><a href="https://www.facebook.com/unach.ec/?uid=b9285b28-f15f-4385-be22-49a2398a9135"><i class="fab fa-facebook-f"></i></a></li>
							<li><a href="https://twitter.com/unach_ec?lang=es"><i class="fab fa-twitter"></i></a></li>
							<li><a href="https://www.youtube.com/user/rrppunach/featured"><i class="fab fa-youtube"></i></a></li>
							<li><a href="https://ec.linkedin.com/school/universidad-nacional-de-chimborazo/?trk=public_profile_topcard-school"><i class="fab fa-linkedin-in"></i></a></li>
							<li><a href="https://www.instagram.com/unach.ec/?hl=es-la&uid=b9285b28-f15f-4385-be22-49a2398a9135"><i class="fab fa-instagram"></i></a></li>
						</ul>
					</div>
				</div>
				<div class="col-lg-6">
					<div class="contact-details">
						<ul>
							<li><i class="fas fa-phone fa-rotate-90"></i> +593 3 3730880</li>
							<li><i class="fas fa-map-marker-alt"></i> Av. Antonio José de Sucre</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-light top-nav">
        <div class="container">
            <a class="navbar-brand" href="https://www.unach.edu.ec/">
				<img id="logounach" src="../../Recursos/images/LogoRiobamba2023.png" alt="logo"/>
            </a>
            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
				<span class="fas fa-bars"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
				<ul class="navbar-nav ml-auto">
					<li class="nav-item">
						<a class="nav-link active" href="../../index.php">Inicio</a>
					</li>
                <?php
            		if($nivel=="Administrador")
            		{
              	?>	

					<li class="nav-item dropdown">
                    	<a class="nav-link" href="#" id="navbarDropdownBlog" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Registro <i class="fas fa-sort-down"></i></a>
                    	<ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <li><a class="dropdown-item" href="../Usuario/Frm_Usuario.php?nivel=Administrador">Usuarios</a></li>
                      	    <li><a class="dropdown-item" href="../Cooperativa/Frm_Cooperativa.php?nivel=Administrador">Cooperativas</a></li>
                      		<li><a class="dropdown-item" href="../Vehiculo/Frm_Vehiculo.php?nivel=Administrador">Vehiculos</a></li>
							<li><a class="dropdown-item" href="../Certificado/Frm_Certificado.php?nivel=Administrador">Certificados</a></li>
                        </ul>
                    </li>

				<?php
            		}elseif($nivel=="Socio")
					{
						echo'<li class="nav-item dropdown">
                    	<a class="nav-link" href="#" id="navbarDropdownBlog" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Registro <i class="fas fa-sort-down"></i></a>
                    	<ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                      		<li><a class="dropdown-item" href="Modulos/Usuario/Frm_Usuario.php?nivel=Administrador">Usuario</a></li>
							<li><a class="dropdown-item" href="Modulos/Cooperativa/Frm_Cooperativa.php?nivel=Administrador">Cooperativa</a></li>
                      		<li><a class="dropdown-item" href="Modulos/Vehiculo/Frm_Vehiculo.php?nivel=Administrador">Vehiculos</a></li>
							<li><a class="dropdown-item" href="Modulos/Certificado/Frm_Certificado.php?nivel=Administrador">Certificados</a></li>
                        </ul>
                    	</li>';
					}
          		?>
                    <li class="nav-item">
                        <a class="nav-link" href="../../Logout.php">Cerrar Sesión</a>
                    </li>
				</ul>
            </div>
        </div>
    </nav>
    <div id="data" class="container box">
		<div class="table-responsive">
			
			<div align="right">
				<button type="button" style="background: #008d;" id="add_button" data-toggle="modal" data-target="#userModal" class="btn btn-info ">Agregar Certificado</button>
			</div>
            <div align="left">
                <h5>Ir a Certificados:</h5>
                <a type="button" style="background: #e83f44;" href="Reportes/pdf/reporte_pdf.php?nivel=Administrador" id="add_button" class="btn btn-info ">Certificados</a>
                <a type="button" style="background: #223260;" href="Reportes/pdf/Buscar_C.php?nivel=Administrador" id="add_button" class="btn btn-info ">Buscar Certificados</a>
            </div>
			<br /><br />
			<table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                    <th width="10%">Número Certificado</th>
                    <th>Socio</th>
                    <th>Apellido</th>
                    <th>Cédula</th>
                    <th>Número Resolución</th>
                    <th>Fecha Resolución</th>
                    <th>Cooperativa</th>
                    <th>Ruc</th>
                    <th>Vehiculo</th>
                    <th>Anio</th>
                    <th>Placa</th>
                    <th>Número Sticker</th>
                    <th>Fecha de Emisión</th>
                    <th>Opciones</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    $statement = $conn->prepare("SELECT c.*, u.Nombre as NombreUsuario, u.Apellido as ApellidoUsuario,
                    u.Cedula as CedulaUsuario, v.Marca as MarcaVehiculo, v.Anio, v.Placa, v.Sticker, v.Numero_resolucion as NumeroResolucionVehiculo,
                    v.Fecha_resolucion as FechaResolucionVehiculo, co.Nombre as NombreCooperativa, co.Ruc as RucCooperativa
                    FROM certificado c
                    INNER JOIN usuario u ON c.Id_Usuario = u.Id_Usuario
                    INNER JOIN vehiculo v ON c.Id_Vehiculo = v.Id_Vehiculo
                    INNER JOIN cooperativa co ON c.Id_Cooperativa = co.Id_Cooperativa");
                    $statement->execute();
                    $result = $statement->fetchAll();
                    $a = 0;
                                while ($a < count($result)) {
                                echo '<tr>
                                <td align="center"><a>' . $result[$a]["Numero_certificacion"] . '</a></td>
                                <td align="center"><a>' . $result[$a]["NombreUsuario"] . '</a></td>
                                <td align="center"><a>' . $result[$a]["ApellidoUsuario"] . '</a></td>
                                <td align="center"><a>' . $result[$a]["CedulaUsuario"] . '</a></td>
                                <td align="center"><a>' . $result[$a]["NumeroResolucionVehiculo"] . '</a></td>
                                <td align="center"><a>' . $result[$a]["FechaResolucionVehiculo"] . '</a></td>
                                <td align="center"><a>' . $result[$a]["NombreCooperativa"] . '</a></td>
                                <td align="center"><a>' . $result[$a]["RucCooperativa"] . '</a></td>
                                <td align="center"><a>' . $result[$a]["MarcaVehiculo"] . '</a></td>
                                <td align="center"><a>' . $result[$a]["Anio"] . '</a></td>
                                <td align="center"><a>' . $result[$a]["Placa"] . '</a></td>
                                <td align="center"><a>' . $result[$a]["Sticker"] . '</a></td>
                                <td align="center"><a>' . $result[$a]["fecha_emision"] . '</a></td>
								<td align="center"> <button type="button" name="update"  id="'.$result[$a]["Id_Certificado"].'" class="btn btn-warning btn-xs update"><i type="button"  class="fa fa-edit btn-xs"></i></button> <button type="button" id="'.$result[$a]["Id_Certificado"].'" name="delete" class="btn btn-danger btn-xs delete"><i type="button"  class="fa fa-trash btn-xs "></i></button></td>
							</tr>';
							$a ++;
						}
					?>
				</tbody>
			</table>
		</div>
	</div>


    <div class="blog-slide">
            <div id="userModal" class="modal fade">
                <div class="modal-dialog">
                        <form method="post" id="user_form" enctype="multipart/form-data">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title">Agregar certificado</h4>
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>
                                <div class="modal-body">
                                    <div class="form-row">
                                    <label>Número Certificación</label>
                                        <input type="text" name="Numero_certificacion" id="Numero_certificacion" placeholder="Numero_certificacion" class="form-control"  required />
                                    </div>
                                    <!-- Seleccionar Nombre Socio -->
                                    <div class="form-row">
                                        <label>Seleccionar Nombre Socio</label>
                                        <select name="Id_Usuario" id="Id_Usuario" class="form-control" required onchange="getSocioInfo()">
                                            <?php
                                            $statementUsuarios = $conn->prepare("SELECT Id_Usuario, Nombre FROM usuario WHERE Nivel = 'Socio'");
                                            $statementUsuarios->execute();
                                            $usuarios = $statementUsuarios->fetchAll();

                                            foreach ($usuarios as $usuario) {
                                                echo '<option value="' . $usuario["Id_Usuario"] . '">' . $usuario["Nombre"] . '</option>';
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="form-row">
                                    <label>Apellido del Socio</label>
                                    <select name="Apellido" id="Apellido" class="form-control" required>
                                        <?php
                                        $statementUsuarios = $conn->prepare("SELECT Apellido FROM usuario WHERE Nivel = 'Socio'");
                                        $statementUsuarios->execute();
                                        $usuarios = $statementUsuarios->fetchAll();

                                        foreach ($usuarios as $usuario) {
                                            echo '<option value="' . $usuario["Apellido"] . '">' . $usuario["Apellido"] . '</option>';
                                        }
                                        ?>
                                    </select>
                                    </div>
                                    <div class="form-row">
                                    <label>Cédula del Socio</label>
                                    <select name="Cedula" id="Cedula" class="form-control" required>
                                        <?php
                                        $statementUsuarios = $conn->prepare("SELECT Cedula FROM usuario WHERE Nivel = 'Socio'");
                                        $statementUsuarios->execute();
                                        $usuarios = $statementUsuarios->fetchAll();

                                        foreach ($usuarios as $usuario) {
                                            echo '<option value="' . $usuario["Cedula"] . '">' . $usuario["Cedula"] . '</option>';
                                        }
                                        ?>
                                    </select>
                                    </div>
                                    <div class="form-row">
                                    <label>Número de Resolución</label>
                                    <select name="Numero_resolucion" id="Numero_resolucion" class="form-control" required>
                                        <?php
                                        $statementResolucion = $conn->prepare("SELECT Numero_resolucion FROM vehiculo");
                                        $statementResolucion->execute();
                                        $Resoluciones = $statementResolucion->fetchAll();

                                        foreach ($Resoluciones as $Resolucion) {
                                            echo '<option value="' . $Resolucion["Numero_resolucion"] . '">' . $Resolucion["Numero_resolucion"] . '</option>';
                                        }
                                        ?>
                                    </select>
                                    </div>
                                    <div class="form-row">
                                    <label>Fecha de Resolución</label>
                                    <select name="Fecha_resolucion" id="Fecha_resolucion" class="form-control" required>
                                        <?php
                                        $statementFecha_resolucion = $conn->prepare("SELECT Fecha_resolucion FROM vehiculo");
                                        $statementFecha_resolucion->execute();
                                        $Fecha_resoluciones = $statementFecha_resolucion->fetchAll();

                                        foreach ($Fecha_resoluciones as $Fecha_resolucion) {
                                            echo '<option value="' . $Fecha_resolucion["Fecha_resolucion"] . '">' . $Fecha_resolucion["Fecha_resolucion"] . '</option>';
                                        }
                                        ?>
                                    </select>
                                    </div>
                                    <div class="form-row">
                                    <label>Nombre de la Cooperativa</label>
                                    <select name="Id_Cooperativa" id="Id_Cooperativa" class="form-control" required>
                                        <?php
                                        $statementCooperativas = $conn->prepare("SELECT Id_Cooperativa, Nombre FROM cooperativa");
                                        $statementCooperativas->execute();
                                        $cooperativas = $statementCooperativas->fetchAll();

                                        foreach ($cooperativas as $cooperativa) {
                                            echo '<option value="' . $cooperativa["Id_Cooperativa"] . '">' . $cooperativa["Nombre"] . '</option>';
                                        }
                                        ?>
                                    </select>
                                    </div>
                                    <div class="form-row">
                                    <label>Ruc</label>
                                    <select name="Ruc" id="Ruc" class="form-control" required>
                                        <?php
                                        $statementRuc = $conn->prepare("SELECT Ruc FROM cooperativa");
                                        $statementRuc->execute();
                                        $rucs = $statementRuc->fetchAll();

                                        foreach ($rucs as $ruc) {
                                            echo '<option value="' . $ruc["Ruc"] . '">' . $ruc["Ruc"] . '</option>';
                                        }
                                        ?>
                                    </select>
                                    </div>
                                    <div class="form-row">
                                    <label>Marca Vehículo</label>
                                    <select name="Id_Vehiculo" id="Id_Vehiculo" class="form-control" required>
                                        <?php
                                        $statementVehiculos = $conn->prepare("SELECT Id_Vehiculo, Marca FROM vehiculo");
                                        $statementVehiculos->execute();
                                        $vehiculos = $statementVehiculos->fetchAll();

                                        foreach ($vehiculos as $vehiculo) {
                                            echo '<option value="' . $vehiculo["Id_Vehiculo"] . '">' . $vehiculo["Marca"] . '</option>';
                                        }
                                        ?>
                                    </select>
                                    </div>
                                    <div class="form-row">
                                    <label>Año Vehículo</label>
                                    <select name="Anio" id="Anio" class="form-control" required>
                                        <?php
                                        $statementVehiculosAnio = $conn->prepare("SELECT Anio FROM vehiculo");
                                        $statementVehiculosAnio->execute();
                                        $vehiculosAnio = $statementVehiculosAnio->fetchAll();

                                        foreach ($vehiculosAnio as $vehiculoAnio) {
                                            echo '<option value="' . $vehiculoAnio["Anio"] . '">' . $vehiculoAnio["Anio"] . '</option>';
                                        }
                                        ?>
                                    </select>
                                    </div>
                                    <div class="form-row">
                                    <label>Placa Vehículo</label>
                                    <select name="Placa" id="Placa" class="form-control" required>
                                        <?php
                                        $statementVehiculosPlaca = $conn->prepare("SELECT Placa FROM vehiculo");
                                        $statementVehiculosPlaca->execute();
                                        $vehiculosPlaca = $statementVehiculosPlaca->fetchAll();

                                        foreach ($vehiculosPlaca as $vehiculoPlaca) {
                                            echo '<option value="' . $vehiculoPlaca["Placa"] . '">' . $vehiculoPlaca["Placa"] . '</option>';
                                        }
                                        ?>
                                    </select>
                                    </div>
                                    <div class="form-row">
                                    <label>Sticker Vehículo</label>
                                    <select name="Sticker" id="Sticker" class="form-control" required>
                                        <?php
                                        $statementVehiculosSticker = $conn->prepare("SELECT Sticker FROM vehiculo");
                                        $statementVehiculosSticker->execute();
                                        $vehiculosSticker = $statementVehiculosSticker->fetchAll();

                                        foreach ($vehiculosSticker as $vehiculoSticker) {
                                            echo '<option value="' . $vehiculoSticker["Sticker"] . '">' . $vehiculoSticker["Sticker"] . '</option>';
                                        }
                                        ?>
                                    </select>
                                    </div>
                                    <div class="form-row">
                                    <label>Fecha de Emisión</label>
                                        <input type="text" name="fecha_emision" id="fecha_emision" placeholder="fecha_emision" class="form-control"  required />
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <input type="hidden" name="Id_Certificado" id="Id_Certificado" />
                                    <input type="hidden" name="operation" id="operation" />
                                    <input type="submit" style="background: #008d;" name="action" id="action" class="btn btn-success" value="Agregar" />
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                                </div>
                            </div>
                        </form>
                </div>
            </div>
	</div>
<!-- Contact Us -->
<div class="touch-line">
		<div class="container">
			<div class="row">
				<div class="col-md-8">
				   <p>Estamos en Desarrollo. #Desarrollo.</p>
				</div>
				<div class="col-md-4">
				   <a class="btn btn-lg btn-secondary btn-block" href="https://www.unach.edu.ec/"> www.gadmriobamba.gob.ec </a>
				</div>
			</div>
		</div>
	</div>
    <!-- /.container -->
    <!--footer starts from here-->
    <footer class="footer">
        <div class="container bottom_border">
            <div class="row">
				<div class="col-lg-3 col-md-6 col-sm-6 col container">
					<h5 class="headin5_amrc col_white_amrc pt2">Contáctanos</h5>

					<p class="mb10">También puedes acceder a todas nuestras plataformas digitales a continuación y ponerte en contacto con nosotros y poderte ayudar en cualquier duda.</p>
					<ul class="footer-social">
						<li><a class="facebook hb-xs-margin" href="https://www.facebook.com/MovilidadRiobamba/"><span class="hb hb-xs spin hb-facebook"><i class="fab fa-facebook-f"></i></span></a></li>
						<li><a class="twitter hb-xs-margin" href="https://twitter.com/unach_ec?lang=es"><span class="hb hb-xs spin hb-twitter"><i class="fab fa-twitter"></i></span></a></li>
						<li><a class="instagram hb-xs-margin" href="https://www.instagram.com/unach.ec/?hl=es"><span class="hb hb-xs spin hb-instagram"><i class="fab fa-instagram"></i></span></a></li>
						<li><a class="googleplus hb-xs-margin" href="https://www.youtube.com/c/rrppUnachRiobamba"><span class="hb hb-xs spin hb-google-plus"><i class="fab fa-youtube"></i></span></a></li>
					</ul>
				</div>
			</div>
		</div>
        <div class="container">
            <p class="copyright text-center">Los derechos de autor corresponde a la &copy; UNIVERSIDAD NACIONAL DE CHIMBORAZO <a href="https://www.unach.edu.ec/">"UNACH"</a>
            </p>
        </div>
    </footer>
<!-- Bootstrap core JavaScript -->
<script src="../../Recursos/vendor/jquery/jquery.min.js"></script>
<script src="../../Recursos/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="../../Recursos/js/imagesloaded.pkgd.min.js"></script>
<script src="../../Recursos/js/isotope.pkgd.min.js"></script>
<script src="../../Recursos/js/filter.js"></script>
<script src="../../Recursos/js/jquery.appear.js"></script>
<script src="../../Recursos/js/owl.carousel.min.js"></script>
<script src="../../Recursos/js/jquery.fancybox.min.js"></script>


<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="../../Recursos/Librerias/plugins/datatables/jquery.dataTables.min.js"></script>


</body>
</html>
    <!-- jQuery UI y configuración del Datepicker -->
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script>
    $(document).ready(function() {
        // Inicializar el Datepicker
        $("#fecha_emision").datepicker({
            dateFormat: 'dd MM yy',
            onSelect: function(dateText, inst) {
                // Obtener la fecha como objeto Date
                var date = $(this).datepicker('getDate');

                // Obtener día, mes y año
                var day = date.getDate();
                var month = date.toLocaleString('default', { month: 'long' });
                var year = date.getFullYear();

                // Formatear la fecha
                var formattedDate = 'Riobamba, ' + day + ' de ' + month + ' de ' + year;

                // Colocar la fecha formateada en el campo de entrada
                $("#fecha_emision").val(formattedDate);
            }
        });

        // Resto del código...
    });
</script>

<script>
		$(function () {
			$("#example1").DataTable();
			$('#example2').DataTable({
			"paging": true,
			"lengthChange": false,
			"searching": false,
			"ordering": true,
			"info": true,
			"autoWidth": false
			});
		});
</script>

<script>
	$(document).ready(function() {
    $('#add_button').click(function() {
        $('#user_form')[0].reset();
        $('.modal-title').text("Agregar Certificado");
        $('#action').val("Guardar");
        $('#operation').val("Add");
    });


    $(document).on('submit', '#user_form', function(event) {
        event.preventDefault();
        var Numero_certificacion = $('#Numero_certificacion').val();
        var Id_Usuario = $('#Id_Usuario').val();
        var Apellido = $('#Apellido').val();
        var Cedula = $('#Cedula').val();
        var Numero_resolucion = $('#Numero_resolucion').val();
        var Fecha_resolucion = $('#Fecha_resolucion').val();
        var Id_Cooperativa = $('#Id_Cooperativa').val();
        var Ruc = $('#Ruc').val();
        var Id_Vehiculo = $('#Id_Vehiculo').val();
        var Anio = $('#Anio').val();
        var Placa = $('#Placa').val();
        var Sticker = $('#Sticker').val();
        var fecha_emision = $('#fecha_emision').val();
        if (Numero_certificacion != '' && Id_Usuario != '' && Apellido != '' && Cedula != '' && Numero_resolucion != '' && Fecha_resolucion != '' && Id_Cooperativa != ''
        && Ruc != '' && Id_Vehiculo != '' && Anio != '' && Placa != '' && Sticker != '' && fecha_emision != '') {
            $.ajax({
                url: "Recursos/php/insertar.php",
                method: 'POST',
                data: new FormData(this),
                contentType: false,
                processData: false,
                success: function(response) {
                var result = JSON.parse(response);
                if (result.success) {
                    // SweetAlert2 para éxito
                    Swal.fire({
                        title: 'Éxito',
                        text: result.message,
                        icon: 'success',
                        showConfirmButton: false,
                        timer: 2000
                    }).then(() => {
                        $('#user_form')[0].reset();
                        $('#userModal').modal('hide');
                        $("#data").load(" #data", function() {
                            // Volver a inicializar DataTable después de cargar los datos
                            $("#example1").DataTable().destroy();
                            $("#example1").DataTable();
                            });
                    });
                } else {
                    // SweetAlert2 para error
                    Swal.fire({
                        title: 'Error',
                        text: result.message,
                        icon: 'error',
                        confirmButtonText: "Volver a intentar",
                        confirmButtonColor: "#00214c"
                    });
                }
            }
        });
    } else {
        alert("Existen campos vacíos");
    }
});
    $(document).on('click', '.update', function() {
        var Id_Certificado = $(this).attr("id");
        $.ajax({
            url: "Recursos/php/Buscar.php",
            method: "POST",
            data: { Id_Certificado:Id_Certificado },
            dataType: "json",
            success: function(data) {
                $('#userModal').modal('show');
                $('#Numero_certificacion').val(data.Numero_certificacion);
                $('#Id_Usuario').val(data.Id_Usuario);
                $('#Apellido').val(data.Apellido);
                $('#Cedula').val(data.Cedula);
                $('#Numero_resolucion').val(data.Numero_resolucion);
                $('#Fecha_resolucion').val(data.Fecha_resolucion);
                $('#Id_Cooperativa').val(data.Id_Cooperativa);
                $('#Ruc').val(data.Ruc);
                $('#Id_Vehiculo').val(data.Id_Vehiculo);
                $('#Anio').val(data.Anio);
                $('#Placa').val(data.Placa);
                $('#Sticker').val(data.Sticker);
                $('#fecha_emision').val(data.fecha_emision);
                $('.modal-title').text("Modificar Certificado");
                $('#Id_Certificado').val(Id_Certificado);
                $('#action').val("Guardar");
                $('#operation').val("Edit");
            }
        })
    });

    $(document).on('click', '.delete', function() {
    var Id_Certificado = $(this).attr("id");

    // Utilizar SweetAlert2 para la confirmación
    Swal.fire({
        title: "¿Realmente quieres eliminar el registro?",
        text: "El registro será eliminado permanentemente",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Si",
        cancelButtonText: "No"
    }).then((result) => {
        if (result.isConfirmed) {
            // Si se confirma, realizar la eliminación
            $.ajax({
                url: "Recursos/php/Eliminar.php",
                method: "POST",
                data: { Id_Certificado: Id_Certificado },
                dataType: "json",
                success: function(data) {
                    if (data.success) {
                        // Mostrar segundo cuadro de diálogo después de eliminar con éxito
                        Swal.fire({
                            title: "Eliminado",
                            text: "Registro eliminado satisfactoriamente.",
                            icon: "success"
                        }).then(() => {
                            // Actualizar la tabla o hacer cualquier otra acción necesaria
                            $("#data").load(" #data", function() {
                            // Volver a inicializar DataTable después de cargar los datos
                            $("#example1").DataTable().destroy();
                            $("#example1").DataTable();
                            });
                        });
                    } else {
                        Swal.fire({
                            title: "Error",
                            text: data.message,
                            icon: "error"
                        });
                    }
                },
                error: function() {
                    Swal.fire({
                        title: "Error",
                        text: "Error en la consulta",
                        icon: "error"
                    });
                }
            });
        }
    });
});
});
</script>

<!-- Script JavaScript -->
<script>
$(document).ready(function() {
    // ... Otro código ...

    // Evento change en el campo Id_Usuario
    $(document).on('change', '#Id_Usuario', function() {
        getSocioInfo();
    });

    // Función para obtener la información del socio
    function getSocioInfo() {
        var selectedUserId = $('#Id_Usuario').val();

        // Realizar la solicitud AJAX para obtener la información del socio
        $.ajax({
            url: "Recursos/php/ObtenerInformacionSocio.php",
            method: "POST",
            data: { Id_Usuario: selectedUserId },
            dataType: "json",
            success: function(data) {
                console.log(data); // Muestra la respuesta en la consola del navegador

                // Llenar la información en los campos correspondientes
                $('#Apellido').val(data.Apellido);
                $('#Cedula').val(data.Cedula);
                $('#Numero_resolucion').val(data.Resolucion);
                $('#Fecha_resolucion').val(data.Fecha_Resoluciones);
                $('#Id_Cooperativa').val(data.Id_Cooperativa);
                $('#Ruc').val(data.RucV);
                $('#Id_Vehiculo').val(data.Id_Vehiculo);
                $('#Anio').val(data.AnioVehiculo);
                $('#Placa').val(data.PlacaVehiculo);
                $('#Sticker').val(data.StickerVehiculo);
            },
            error: function(xhr, status, error) {
                console.error("Error al obtener la información del socio: " + error);
            }
        });
    }
});
</script>
