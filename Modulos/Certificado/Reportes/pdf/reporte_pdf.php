<?php
include "../../../../DAO/DAO.php";
include 'plantilla.php';
$nivel = isset($_GET["nivel"]) && $_GET["nivel"] === "Socio" ? "Socio" : "Administrador";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        $cedula = isset($_POST['cedula']) ? $_POST['cedula'] : '';
        $certificadoSeleccionado = isset($_POST['certificado']) ? $_POST['certificado'] : '';

        $query = "SELECT certificado.*, usuario.Apellido, usuario.Nombre as Nombre_Usuario, usuario.Cedula, vehiculo.Numero_resolucion,
                    vehiculo.Fecha_resolucion, cooperativa.Id_Cooperativa, cooperativa.Ruc,
                    vehiculo.Id_Vehiculo, vehiculo.Anio, vehiculo.Placa, vehiculo.Sticker, vehiculo.Marca,
                    cooperativa.Nombre AS nombre_cooperativa
                    FROM certificado
                    INNER JOIN usuario ON certificado.Id_Usuario = usuario.Id_Usuario
                    INNER JOIN vehiculo ON certificado.Id_Vehiculo = vehiculo.Id_Vehiculo
                    LEFT JOIN cooperativa ON usuario.Id_Usuario = cooperativa.Id_Usuario
                    WHERE (certificado.Numero_certificacion = :certificadoSeleccionado OR :certificadoSeleccionado = '')
                    OR (usuario.Cedula = :cedula OR :cedula = '')";

        $stmt = $conn->prepare($query);

        $stmt->bindParam(':cedula', $cedula, PDO::PARAM_STR);
        $stmt->bindParam(':certificadoSeleccionado', $certificadoSeleccionado, PDO::PARAM_STR);
        $stmt->execute();

        $certificado = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($certificado) {
            CertificadoPDF::generarCertificado($certificado);
        } else {
            echo 'Certificado no encontrado.';
        }
    } catch (PDOException $e) {
        echo 'Error al obtener los datos del certificado: ' . $e->getMessage();
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>CONSULTORIOS TECNOLÓGICOS FACULTAD DE INGENIERÍA</title>
    <link rel="shortcut icon" href="../../Recursos/images/Lunach.png">
    <!-- Bootstrap core CSS -->
    <link href="../../../../Recursos/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Fontawesome CSS -->
    <!-- Owl Carousel CSS -->
    <link href="../../../../Recursos/css/owl.carousel.min.css" rel="stylesheet">
    <!-- Owl Carousel CSS -->
    <link href="../../../../Recursos/css/jquery.fancybox.min.css" rel="stylesheet">

    <link href="../../../../Recursos/fontawesome/css/all.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../../../../Recursos/css/style.css" rel="stylesheet">
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
        });
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
                <img id="logounach" src="../../../../Recursos/images/LogoRiobamba2023.png" alt="logo"/>
            </a>
            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <span class="fas fa-bars"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link active" href="../../../../index.php">Inicio</a>
                    </li>
                    <?php
                        if($nivel=="Administrador")
                        {
                    ?>
                    <li class="nav-item dropdown">
                        <a class="nav-link" href="#" id="navbarDropdownBlog" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Registro <i class="fas fa-sort-down"></i></a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <li><a class="dropdown-item" href="../../../../Usuario/Frm_Usuario.php?nivel=Administrador">Usuario</a></li>
                            <li><a class="dropdown-item" href="../../../Cooperativa/Frm_Cooperativa.php?nivel=Administrador">Cooperativa</a></li>
                            <li><a class="dropdown-item" href="../../../Vehiculo/Frm_Vehiculo.php?nivel=Administrador">Vehiculos</a></li>
                            <li><a class="dropdown-item" href="../../../Certificado/Frm_Certificado.php?nivel=Administrador">Certificados</a></li>
                        </ul>
                    </li>
                    <?php
                    } elseif ($nivel == "Socio") {
                    ?>
                    <li class="nav-item">
                    <a class="nav-link" href="../../../../Modulos/Certificado/Reportes/pdf/reporte_pdf.php?nivel=Socio">Certificados</a>
                    </li>
                    <?php
                    }
                    ?>
                    <li class="nav-item">
                        <a class="nav-link" href="../../../../Logout.php">Cerrar Sesión</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
<!-- Certificado -->
<div class="container mt-5 text-center">
        <h2>Filtrar Certificados</h2>
        <form method="post" action="" class="text-start">
        <div class="mb-3">
        <label for="cedula" class="form-label">Cédula del Socio:</label>
        <select name="cedula" class="form-select">
        <?php
        try {
            $queryCedulas = "SELECT DISTINCT Cedula FROM usuario WHERE EXISTS (SELECT 1 FROM certificado WHERE certificado.Id_Usuario = usuario.Id_Usuario)";
            $resultCedulas = $conn->query($queryCedulas);

            while ($rowCedula = $resultCedulas->fetch(PDO::FETCH_ASSOC)) {
                echo '<option value="' . $rowCedula['Cedula'] . '">' . $rowCedula['Cedula'] . '</option>';
            }
        } catch (PDOException $e) {
            echo 'Error al obtener las cédulas: ' . $e->getMessage();
        }
        ?>
        </select>
        </div>
            <div class="mb-3">
                <label for="certificado" class="form-label">Número de Certificado:</label>
                <select name="certificado" class="form-select" required>
                    <?php
                    try {
                        $queryCertificados = "SELECT DISTINCT Numero_certificacion FROM certificado";
                        $resultCertificados = $conn->query($queryCertificados);

                        while ($rowCertificado = $resultCertificados->fetch(PDO::FETCH_ASSOC)) {
                            echo '<option value="' . $rowCertificado['Numero_certificacion'] . '">' . $rowCertificado['Numero_certificacion'] . '</option>';
                        }
                    } catch (PDOException $e) {
                        echo 'Error al obtener los certificados: ' . $e->getMessage();
                    }
                    ?>
                </select>
            </div>
            <button type="submit" class="btn btn-primary" style="background-color: #e83f44; color: #fff;">Filtrar Certificados</button>
        </form>
    </div>
<div class="container">
    <a type="button" style="background: #223260; margin-left: 100px; margin-top: 4em;" href="../../../../Modulos/Certificado/Frm_Certificado.php?nivel=Administrador" id="add_button" class="btn btn-info">Regresar</a>
</div>

<!-- Contact Us -->
<div class="touch-line">
		<div class="container">
			<div class="row">
				<div class="col-md-8">
				<p>Estamos en Desarrollo. #Desarrollo.</p>
				</div>
				<div class="col-md-4">
				<a class="btn btn-lg btn-secondary btn-block" href="http://www.gadmriobamba.gob.ec/"> www.gadmriobamba.gob.ec </a>
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
<script src="../../../../Recursos/vendor/jquery/jquery.min.js"></script>
<script src="../../../../Recursos/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="../../../../Recursos/js/imagesloaded.pkgd.min.js"></script>
<script src="../../../../Recursos/js/isotope.pkgd.min.js"></script>
<script src="../../../../Recursos/js/filter.js"></script>
<script src="../../../../Recursos/js/jquery.appear.js"></script>
<script src="../../../../Recursos/js/owl.carousel.min.js"></script>
<script src="../../../../Recursos/js/jquery.fancybox.min.js"></script>

<script src="../../../../Recursos/Librerias/plugins/datatables/jquery.dataTables.min.js"></script>
