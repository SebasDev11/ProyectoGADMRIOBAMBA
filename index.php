<?php
session_start();
if (empty($_SESSION["Nivel"])) {
header("Location: Login.php");
exit();
}

$a =   $_SESSION['Nivel'];
$nivel =   $_SESSION['Nivel'];


$enlaceUsuarios = "Modulos/Usuario/Frm_Usuario.php?nivel=Administrador";
$enlaceCooperativas = "Modulos/Cooperativa/Frm_Cooperativa.php?nivel=Administrador";
$enlaceVehiculos = "Modulos/Vehiculo/Frm_Vehiculo.php?nivel=Administrador";
$enlaceCertificados = "Modulos/Certificado/Frm_Certificado.php?nivel=Administrador";

$enlaceCertificadosSocio = "Modulos/Certificado/Reportes/pdf/Buscar_C.php?nivel=Socio";
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">
	<title> CONSULTORIOS TECNOLÓGICOS FACULTAS DE INGENIERÍA</title>
	<link rel="shortcut icon" href="Recursos/images/Lunach.png">
	<!-- Bootstrap core CSS -->
	<link href="Recursos/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<!-- Fontawesome CSS -->
	<link href="Recursos/css/all.css" rel="stylesheet">
	<!-- Owl Carousel CSS -->
	<link href="Recursos/css/owl.carousel.min.css" rel="stylesheet">
	<!-- Owl Carousel CSS -->
	<link href="Recursos/css/jquery.fancybox.min.css" rel="stylesheet">
	<!-- Custom styles for this template -->
	<link href="Recursos/css/style.css" rel="stylesheet">
    
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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
<script>
Swal.fire({
    position: "center",
    icon: "success",
    title: 'Bienvenido al Sistema',
    showConfirmButton: false,
    timer: 1500
});
</script>
<div class="wrapper-main">
	<!-- Top Bar -->
	<div class="top-bar">
		<div class="container">
			<div class="row">
				<div class="col-lg-6">
					<div class="social-media">
						<ul>
						<li><a href="https://www.facebook.com/MovilidadRiobamba" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
							<li><a href="https://twitter.com/unach_ec?lang=es" target="_blank"><i class="fab fa-twitter"></i></a></li>
							<li><a href="https://www.youtube.com/user/rrppunach/featured" target="_blank"><i class="fab fa-youtube"></i></a></li>
							<li><a href="https://ec.linkedin.com/school/universidad-nacional-de-chimborazo/?trk=public_profile_topcard-school" target="_blank"><i class="fab fa-linkedin-in"></i></a></li>
							<li><a href="https://www.instagram.com/unach.ec/?hl=es-la&uid=b9285b28-f15f-4385-be22-49a2398a9135" target="_blank"><i class="fab fa-instagram"></i></a></li>
						</ul>
					</div>
				</div>
				<div class="col-lg-6">
					<div class="contact-details">
						<ul>
							<li><i class="fas fa-phone fa-rotate-90"></i> +593 99 920 9969</li>
							<li><i class="fas fa-map-marker-alt"></i> Av. Edelberto Bonilla Oleas</li>
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
				<img id="logounach" src="Recursos/Images/LogoRiobamba2023.png" alt="logo"/>
            </a>
            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
				<span class="fas fa-bars"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
				<ul class="navbar-nav ml-auto">
					<li class="nav-item">
						<a class="nav-link active" href="index.php">Inicio</a>
					</li>
				<?php
            		if($nivel=="Administrador")
            		{
						?>
					<li class="nav-item dropdown">
                    	<a class="nav-link" href="#" id="navbarDropdownBlog" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Registro <i class="fas fa-sort-down"></i></a>
                    	<ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
							<li><a class="dropdown-item" href="Modulos/Usuario/Frm_Usuario.php?nivel=Administrador">Usuarios</a></li>
                      		<li><a class="dropdown-item" href="Modulos/Cooperativa/Frm_Cooperativa.php?nivel=Administrador">Cooperativas</a></li>
							<li><a class="dropdown-item" href="Modulos/Vehiculo/Frm_Vehiculo.php?nivel=Administrador">Vehiculos</a></li>
                      		<li><a class="dropdown-item" href="Modulos/Certificado/Frm_Certificado.php?nivel=Administrador">Certificados</a></li>
                        </ul>
                    </li>

				
					<?php
					} elseif ($nivel=="Socio") {
					?>
					<li class="nav-item">
					<a class="nav-link" href="Modulos/Certificado/Reportes/pdf/Buscar_C.php?nivel=Socio">Certificados</a>
					</li>
					<?php
					}
					?>
                    <li class="nav-item">
                        <a class="nav-link" href="Logout.php">Cerrar Sesión</a>
                    </li>
				</ul>
            </div>
        </div>
    </nav>
    <header class="slider-main">
        <div id="carouselExampleIndicators" class="carousel slide carousel-fade" data-ride="carousel">
            <ol class="carousel-indicators">
               <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
               <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
               <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner" role="listbox">
               <!-- Slide One - Set the background image for this slide in the line below -->
               <div class="carousel-item active" style="background-image: url('Recursos/images/fondocarrousel2.png')">
                  <div class="carousel-caption d-none d-md-block">
                     <h3>BIENVENIDOS AL GAD MOVILIDAD DE RIOBAMBA</h3>
                     <p>Noticias Importantes</p>
                  </div>
               </div>
               <!-- Slide Two - Set the background image for this slide in the line below -->
               <div class="carousel-item" style="background-image: url('Recursos/images/fondocarrousel3.png')">
                  <div class="carousel-caption d-none d-md-block">
                     <h3>RECIBE TU CERTIFICADO</h3>
                     <p>Noticias Importantes</p>
                  </div>
               </div>
               <!-- Slide Three - Set the background image for this slide in the line below -->
               <div class="carousel-item" style="background-image: url('Recursos/images/fondocarrousel2.png')">
                  <div class="carousel-caption d-none d-md-block">
                     <h3>GAD MOVILIDAD</h3>
                     <p>Noticias Importantes</p>
                  </div>
               </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
				<span class="carousel-control-prev-icon" aria-hidden="true"></span>
				<span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
				<span class="carousel-control-next-icon" aria-hidden="true"></span>
				<span class="sr-only">Next</span>
            </a>
        </div>
    </header>
<!--TARJETAS -->
<div class="services-bar">
            <div class="container">
                <div class="row">
                    <?php
                    if ($nivel == "Socio") {
                    ?>
                        <div class="col-lg-3 mb-4 mx-auto text-center">
                            <div class="Tarjeta h-100">
                                <div class="Tarjeta-img">
                                    <a href="<?php echo $enlaceCertificadosSocio; ?>">
                                        <img class="img-fluid" src="Recursos/images/Certificados.png" alt="" />
                                    </a>
                                </div>
                            </div>
                        </div>
                    <?php
                    } elseif ($nivel == "Administrador") {
                    ?>
                        <div class="col-lg-3 mb-4">
                            <div class="Tarjeta h-100">
                                <div class="Tarjeta-img">
                                    <a href="<?php echo $enlaceUsuarios; ?>">
                                        <img class="img-fluid" src="Recursos/images/Usuarios.png" alt="" />
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 mb-4">
                            <div class="Tarjeta h-100">
                                <div class="Tarjeta-img">
                                    <a href="<?php echo $enlaceCooperativas; ?>">
                                        <img class="img-fluid" src="Recursos/images/Cooperativas.png" alt="" />
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 mb-4">
                            <div class="Tarjeta h-100">
                                <div class="Tarjeta-img">
                                    <a href="<?php echo $enlaceVehiculos; ?>">
                                        <img class="img-fluid" src="Recursos/images/Vehiculos.png" alt="" />
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 mb-4">
                            <div class="Tarjeta h-100">
                                <div class="Tarjeta-img">
                                    <a href="<?php echo $enlaceCertificados; ?>">
                                        <img class="img-fluid" src="Recursos/images/Certificados.png" alt="" />
                                    </a>
                                </div>
                            </div>
                        </div>
                    <?php
                    }
                    ?>
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
<script src="Recursos/vendor/jquery/jquery.min.js"></script>
<script src="Recursos/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="Recursos/js/imagesloaded.pkgd.min.js"></script>
<script src="Recursos/js/isotope.pkgd.min.js"></script>
<script src="Recursos/js/filter.js"></script>
<script src="Recursos/js/jquery.appear.js"></script>
<script src="Recursos/js/owl.carousel.min.js"></script>
<script src="Recursos/js/jquery.fancybox.min.js"></script>
<script src="Recursos/js/script.js"></script>
</body>
</html>