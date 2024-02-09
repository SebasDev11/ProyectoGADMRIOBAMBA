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
	<link href="../../Recursos/css/all.css" rel="stylesheet">
	<!-- Owl Carousel CSS -->
	<link href="../../Recursos/css/owl.carousel.min.css" rel="stylesheet">
	<!-- Owl Carousel CSS -->
	<link href="../../Recursos/css/jquery.fancybox.min.css" rel="stylesheet">
	<!-- Custom styles for this template -->
	<link href="../../Recursos/css/style.css" rel="stylesheet">
	<link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.css" />
    
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
                    } elseif ($nivel == "Socio") {
                    ?>
                    <li class="nav-item">
                    <a class="nav-link" href="../Modulos/Certificado/Reportes/pdf/reporte_pdf.php?nivel=Socio">Certificados</a>
                    </li>
                    <?php
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
				<button type="button" style="background: #008d;" id="add_button" data-toggle="modal" data-target="#userModal" class="btn btn-info ">Agregar Usuario</button>
			</div>
            <div align="left">
                <h5>Exportar datos como :</h5>
                <a type="button" style="background: #FF0000;" href="Reportes/pdf/reporte_pdf.php" id="add_button" class="btn btn-info ">PDF</a>
            </div>
			<br /><br />
			<table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
					    <th width="10%">Nombre </th>
						<th >Apellido</th>
                        <th >Cedula</th>
						<th >Correo</th>
                        <th >Usuario</th>
						<th >Nivel</th>
						<th >Contraseña</th>
                        <th >Opciones</th>
                    </tr>
                </thead>
                <tbody>
					<?php
						$statement = $conn->prepare("SELECT * FROM usuario");
						$statement->execute();
						$result = $statement->fetchAll();
						$a=0;
						while ($a< count($result))
                          {
							echo'<tr>
								<td align="center"><a>'.$result[$a]["Nombre"].'</a></td>
								<td align="center"><a>'.$result[$a]["Apellido"].'</a</td>
                                <td align="center"><a>'.$result[$a]["Cedula"].'</a</td>
								<td align="center"><a>'.$result[$a]["Correo"].'</a></td>
                                <td align="center"><a>'.$result[$a]["Usuario"].'</a></td>
								<td align="center"><a>'.$result[$a]["Nivel"].'</a></td>
								<td align="center"><a>'.$result[$a]["Contrasena"].'</a></td>
								<td align="center"> <button type="button" name="update"  id="'.$result[$a]["Id_Usuario"].'" class="btn btn-warning btn-xs update"><i type="button"  class="fa fa-edit btn-xs"></i></button> <button type="button" id="'.$result[$a]["Id_Usuario"].'" name="delete" class="btn btn-danger btn-xs delete"><i type="button"  class="fa fa-trash btn-xs "></i></button></td>
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
                                    <h4 class="modal-title">Agregar Usuario</h4>    
                                    <button type="button" class="close" data-dismiss="modal">&times;</button> 
                                </div>
                                <div class="modal-body">
                                    <div class="form-row">
                                    <label>Nombre</label>
                                        <input type="text" name="Nombre" id="Nombre" placeholder="Nombre" class="form-control"  required />
                                    </div>
                                    <div class="form-row">
                                    <label>Apellido</label>
                                        <input type="text" name="Apellido" id="Apellido" placeholder="Apellido" class="form-control"  required />
                                    </div>
                                    <div class="form-row">
                                    <label>Cédula</label>
                                        <input type="text" name="Cedula" id="Cedula" placeholder="Cedula" class="form-control" maxlength="10" required pattern="[0-9]{10}" title="La cédula debe contener exactamente 10 dígitos numéricos." />
                                    </div>
                                    <div class="form-row">
                                    <label >Correo</label>
                                        <input type="email" name="Correo" id="Correo" placeholder="Correo" class="form-control"  required /> 
                                    </div>
                                    <div class="form-row">
                                    <label >Usuario</label>
                                        <input type="text" name="Usuario" id="Usuario" placeholder="Usuario" class="form-control"  required />
                                    </div>
                                    <div class="form-row">
                                        <div class="col-sm-12 col-md-12 ">
                                        <label>Nivel</label>
                                        <select name="Nivel" id="Nivel" class="form-control"  required>
                                            <option value="Administrador">Administrador</option>
                                            <option value="Socio">Socio</option>
                                            <option value="Usuario">Usuario</option>
                                        </select>
                                    </div>
                                        <div class="col-sm-12 col-md-12 ">
                                            <label>Contraseña</label>
                                           <input type="password" name="Contrasena" id="Contrasena" placeholder="Contrasena" class="form-control"  required />
                                        </div>
                                    </div>
                                    <a style="color:#FFFF;">.</a>
                                </div>
                                <div class="modal-footer">
                                    <input type="hidden" name="Id_Usuario" id="Id_Usuario" />
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
        $('.modal-title').text("Agregar Usuario");
        $('#action').val("Guardar");
        $('#operation').val("Add");
    });


    $(document).on('submit', '#user_form', function(event) {
        event.preventDefault();
        var Nombre = $('#Nombre').val();
        var Apellido = $('#Apellido').val();
        var Cedula = $('#Cedula').val();
        var Correo = $('#Correo').val();
        var Usuario = $('#Usuario').val();
        var Nivel = $('#Nivel').val();
        var Contraseña = $('#Contrasena').val();
        if (Nombre != '' && Apellido != '' && Cedula != '' && Correo != '' && Usuario != '' && Nivel != '' && Contraseña != '') {
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
        var Id_Usuario = $(this).attr("id");
        $.ajax({
            url: "Recursos/php/Buscar.php",
            method: "POST",
            data: { Id_Usuario: Id_Usuario },
            dataType: "json",
            success: function(data) {
                $('#userModal').modal('show');
                $('#Nombre').val(data.Nombre);
                $('#Apellido').val(data.Apellido);
                $('#Cedula').val(data.Cedula);
                $('#Correo').val(data.Correo);
                $('#Usuario').val(data.Usuario);
                $('#Nivel').val(data.Nivel);
                $('#Contrasena').val(data.Contrasena);
                $('.modal-title').text("Modificar Usuario");
                $('#Id_Usuario').val(Id_Usuario);
                $('#action').val("Guardar");
                $('#operation').val("Edit");
            }
        })
    });

    $(document).on('click', '.delete', function() {
    var Id_Usuario = $(this).attr("id");

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
                data: { Id_Usuario: Id_Usuario },
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