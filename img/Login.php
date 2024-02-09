<?php
    include "Modulos/Login/Validar.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Iniciar Sesión</title>
    <!-- Bootstrap core CSS -->
    <link href="Recursos/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Fontawesome CSS -->
    <link href="Recursos/css/all.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="Recursos/css/style.css" rel="stylesheet">
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
							<li><i class="fas fa-phone fa-rotate-90"></i> +593 3 3730880</li>
							<li><i class="fas fa-map-marker-alt"></i> Av. Antonio José de Sucre</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
     <!-- full Title -->
    <div class="full-title">
		<div class="container">
			<h1 class="mt-4 mb-3">INICIAR SESIÓN</h1>
			<div class="breadcrumb-main">
				<ol class="breadcrumb">
					<li class="breadcrumb-item active">Iniciar Sesión</li> 
					<li class="breadcrumb-item"><a href="Registrarse.html">Registrarse</a></li>
				</ol>
			</div>
		</div>
	</div>
        <div style="text-align: center;" class="contact-main">
            <div style="text-align: center;" class="container col-lg-8 mb-4 ">
                <!-- Content Row -->

                <!-- Map Column -->

                <h3>Inicia Sesión en nuestro consultorio Tecnológico</h3>
                <form method="post" name="login">
                    <div class="control-group form-group">
                        <div class="controls">
                            <input type="text" id="Usuario" name="Usuario" placeholder="Usuario" class="form-control"   data-validation-required-message="Por favor ingrese su usuario." required>
                            <p class="help-block"></p>
                        </div>
                    </div>
                    <div class="control-group form-group">
                        <div class="controls">
                            <input type="password" id="Contrasena" name="Contrasena" placeholder="Password" class="form-control"   data-validation-required-message="Por favor ingrese su contraseña." required>
                        </div>
                    </div>
                    <?php if ($msg != "") echo $msg . "<br><br>"; ?>
                    
                    <div id="success"></div>
                    <!-- For success/fail messages -->
                    <button  type="submit" class="btn btn-blue text-center"  name="submit" value="Log In">Ingresar</button> 
                </form>

            </div>
            <!-- /.container -->
        </div>
        <!--footer starts from here-->
<footer class="footer">
        <div class="container bottom_border">
            <div class="row">
				<div class="col-lg-3 col-md-6 col-sm-6 col">
					<h5 class="headin5_amrc col_white_amrc pt2">Contáctanos</h5>

					<p class="mb10">También puedes acceder a todas nuestras plataformas digitales a continuación y ponerte en contacto con nosotros y poderte ayudar en cualquier duda.</p>
					<ul class="footer-social">
						<li><a class="facebook hb-xs-margin" href="https://www.facebook.com/unach.ec/"><span class="hb hb-xs spin hb-facebook"><i class="fab fa-facebook-f"></i></span></a></li>
						<li><a class="twitter hb-xs-margin" href="https://twitter.com/Unach_ec?ref_src=twsrc%5Egoogle%7Ctwcamp%5Eserp%7Ctwgr%5Eautho"><span class="hb hb-xs spin hb-twitter"><i class="fab fa-twitter"></i></span></a></li>
						<li><a class="instagram hb-xs-margin" href="https://www.instagram.com/unach.ec/?hl=es"><span class="hb hb-xs spin hb-instagram"><i class="fab fa-instagram"></i></span></a></li>
						<li><a class="googleplus hb-xs-margin" href="https://www.youtube.com/c/rrppUnachRiobamba"><span class="hb hb-xs spin hb-google-plus"><i class="fab fa-youtube"></i></span></a></li>
					</ul>
				</div>	
				<div class="col-lg-3 col-md-6 col-sm-6">
					<h5 class="headin5_amrc col_white_amrc pt2">Carreras</h5>
				
					<ul class="footer_ul_amrc">
						<li><a href="#"><i class="fas fa-long-arrow-alt-right"></i>Ingeniería TI</a></li>
						<li><a href="#"><i class="fas fa-long-arrow-alt-right"></i>Telecomunicaciones</a></li>
						<li><a href="#"><i class="fas fa-long-arrow-alt-right"></i>Ingeniería Industrial</a></li>
						<li><a href="#"><i class="fas fa-long-arrow-alt-right"></i>Ingeniería Civil</a></li>
						<li><a href="#"><i class="fas fa-long-arrow-alt-right"></i>Arquitectura</a></li>
						<li><a href="#"><i class="fas fa-long-arrow-alt-right"></i>Ingeniería Ambiental</a></li>
						<li><a href="#"><i class="fas fa-long-arrow-alt-right"></i>Ingeniería Agroindustrial</a></li>
					</ul>
	
				</div>
				<div class="col-lg-3 col-md-6 col-sm-6">
					<h5 class="headin5_amrc col_white_amrc pt2">Proyectos</h5>
				
					<ul class="footer_ul_amrc">
						<li><a href="#"><i class="fas fa-long-arrow-alt-right"></i>Jovenes Mujeres Emprendedoras</a></li>
						<li><a href="#"><i class="fas fa-long-arrow-alt-right"></i>Buenas Practicas de Granjas Lecheras</a></li>
						<li><a href="#"><i class="fas fa-long-arrow-alt-right"></i>Productores de Lacteos</a></li>
						<li><a href="#"><i class="fas fa-long-arrow-alt-right"></i>Sistema Autónomo Ambiental</a></li>
						<li><a href="#"><i class="fas fa-long-arrow-alt-right"></i>Gestión de la Información del Ambiente</a></li>
						<li><a href="#"><i class="fas fa-long-arrow-alt-right"></i>Junta de Agua de Parroquias</a></li>
						<li><a href="#"><i class="fas fa-long-arrow-alt-right"></i>Conservación de Carreteras</a></li>
					</ul>
				</div>
                <div class="col-lg-3 col-md-6 col-sm-6">
					<h5 class="headin5_amrc col_white_amrc pt2">Proyectos</h5>
					<ul class="footer_ul_amrc">
						<li><a href="#"><i class="fas fa-long-arrow-alt-right"></i>Mejoramiento de Vivienda</a></li>
						<li><a href="#"><i class="fas fa-long-arrow-alt-right"></i>Urbano Arquitectonico Colta</a></li>
						<li><a href="#"><i class="fas fa-long-arrow-alt-right"></i>Gestion de Mantenimiento para los Equipos de Penipe</a></li>
						<li><a href="#"><i class="fas fa-long-arrow-alt-right"></i>Salud Ocupacional Mercado Mayorista</a></li>
						<li><a href="#"><i class="fas fa-long-arrow-alt-right"></i>Sistema Autonomo Ambiental</a></li>
					</ul>
				</div>
			</div>
		</div>
        <div class="container">
            <p class="copyright text-center">Los derechos de autor corresponde a la &copy; UNIVERSIDAD NACIONAL DE CHIMBORAZO <a href="https://www.unach.edu.ec/">"UNACH"</a>
            </p>
        </div>
    </footer>
    </div>
    <!-- Bootstrap core JavaScript -->
    <script src="Recursos/vendor/jquery/jquery.min.js"></script>
    <script src="Recursos/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Contact form JavaScript -->
    <script src="Recursos/js/jqBootstrapValidation.js"></script>
    <script src="Recursos/js/contact_me.js"></script>
    <script src="Recursos/js/jquery.appear.js"></script>
    <script src="Recursos/js/script.js"></script>

</body>
</html>


