<?php
// Output messages
$responses = [];
// Check if the form was submitted
if (isset($_POST['arrival'], $_POST['departure'], $_POST['first_name'], $_POST['last_name'], $_POST['email'], $_POST['phone'], $_POST['adults'], $_POST['room_pref'])) {
	// Process form data
	// Assign POST variables
	$arrival = htmlspecialchars($_POST['arrival'], ENT_QUOTES);
	$departure = htmlspecialchars($_POST['departure'], ENT_QUOTES);
	$first_name = htmlspecialchars($_POST['first_name'], ENT_QUOTES);
	$last_name = htmlspecialchars($_POST['last_name'], ENT_QUOTES);
	$email = htmlspecialchars($_POST['email'], ENT_QUOTES);
	$phone = htmlspecialchars($_POST['phone'], ENT_QUOTES);
	$adults = htmlspecialchars($_POST['adults'], ENT_QUOTES);
	$room_pref = htmlspecialchars($_POST['room_pref'], ENT_QUOTES);
	// Validate email adress
	if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
		$responses[] = 'Correo electrónico no válido';
	}
	// First name must contain only alphabet characters.
	if (!preg_match('/^[a-zA-Z]+$/', $first_name)) {
		$responses[] = 'El nombre solo puede tener caracteres';
	}
	// Last name must contain only alphabet characters.
	if (!preg_match('/^[a-zA-Z]+$/', $last_name)) {
		$responses[] = 'El apellido solo puede tener caracteres ';
	}
	// If there are no errors
	if (!$responses) {
		// Where to send the mail? It should be your email address
		$to      = 'isanchezm421@gmail.com';
		// Mail from
		$from    = 'reservaciones@avenidaflores.com';
		// Mail subject
		$subject = 'Un cliente ha enviado una reservación';
		// Mail headers
		$headers = 'From: ' . $from . "\r\n" . 'Reply-To: ' . $from . "\r\n" . 'Return-Path: ' . $from . "\r\n" . 'X-Mailer: PHP/' . phpversion() . "\r\n" . 'MIME-Version: 1.0' . "\r\n" . 'Content-Type: text/html; charset=UTF-8' . "\r\n";
		// Capture the email template file as a string
		ob_start();
		include 'email-template.php';
		$email_template = ob_get_clean();
		// Try to send the mail
		if (mail($to, $subject, $email_template, $headers)) {
			// Success
			$responses[] = 'Reservación enviada';
		} else {
			// Fail; problem with the mail server...
			$responses[] = 'La reservación no pudo ser enviada';
		}
	}
}
?>
<!DOCTYPE html>
<html lang="en">
<!-- Basic -->

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">

	<!-- Mobile Metas -->
	<meta name="viewport" content="width=device-width, user-scalable=no">
	<!-- Site Metas -->
	<meta name="google-site-verification" content="I5igHeYs_-gPE2J85hsvrwtChh_u4WoPwSA5QNY2K6o" />
	<title>Apartamentos Atenas</title>
<meta name="description" content="Complejo de apartamentos más lujoso de Atenas">
<link rel="canonical" href="https://www.avenidaflores.com/" />
<meta name=”robots” content=”noindex, nofollow”>
<meta name=”robots” content=”index, follow”> 
	<meta name="keywords" content="">
	<meta name="description" content="">
	<meta name="author" content="">

	<!-- Site Icons -->
	<link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<!-- Site CSS -->
	<link rel="stylesheet" href="css/style.css">
	<!-- Pickadate CSS -->
	<link rel="stylesheet" href="css/classic.css">
	<link rel="stylesheet" href="css/classic.date.css">
	<link rel="stylesheet" href="css/classic.time.css">
	<!-- Responsive CSS -->
	<link rel="stylesheet" href="css/responsive.css">
	<!-- Custom CSS -->
	<link rel="stylesheet" href="css/custom.css">
	<link rel="shortcut icon" type="image/x-icon" href="images/favicon.ico" />
	<!--
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.2/css/all.css" rel="stylesheet">

    [if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>
		<!-- Start header -->
		<header class="top-navbar">
		<nav class="navbar navbar-expand-lg navbar-light bg-light">
			<div class="container">
			<div>
				<a href="index.html"><img src="images/logo.png" id="logo"></a>
		  </div>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbars-rs-food"
					aria-controls="navbars-rs-food" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse" id="navbars-rs-food">



					<ul class="navbar-nav ml-auto">


						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle idioma" key="idioma" href="#" id="dropdown-a"
								data-toggle="dropdown">Idioma</a>
	
	
							<div class="dropdown-menu" aria-labelledby="dropdown-a">
								<a class="dropdown-item translate" id="es" href="#">Español</a>
	
								<a class="dropdown-item translate" id="en" href="en/reservacion">English</a>
	
	
								
	
							</div>
						</li>


						<li class="nav-item"><a class="nav-link idioma" key="inicio" href="index.html">Inicio</a>
						</li>


						<li class="nav-item"><a class="nav-link idioma" key="apartamentos"
								href="apartamentos.html">Apartamentos</a></li>


						<li class="nav-item"><a class="nav-link idioma" key="sobrenosotros" href="info.html">Sobre
								Nosotros</a></li>



												<li class="nav-item"><a class="nav-link idioma" key="mapa" href="mapa.html">Mapa</a>

						<li class="nav-item active"><a class="nav-link idioma" key="reservacion"
								href="reservacion">Reservación</a></li>


						<li class="nav-item"><a class="nav-link idioma" key="galeria" href="galeria.html">Galería</a>
						</li>
					</ul>
				</div>
			</div>
		</nav>
	</header>
	<!-- End header -->

	<!-- Start All Pages -->
	<div class="all-page-title page-breadcrumb">
		<div class="container text-center">
			<div class="row">
				<div class="col-lg-12">
					<h1>Reservación</h1>
				</div>
			</div>
		</div>
	</div>
	<!-- End All Pages -->

	<!-- Start Reservation -->
	<div class="reservation-box">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="heading-title text-center">
						<h2>Reservación Avenida Flores</h2>
						<p>Reserva un apartamento</p>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-12 col-sm-12 col-xs-12">
					<div class="contact-block">
						<form method="post" action="">
							<div class="row">
								<div class="col-md-6">
									<h3>Reservar</h3>
									<div class="col-md-12">
										<div class="form-group">
											<input id="arrival" class="datepicker form-control" name="arrival" placeholder="Fecha entrada" required>

										</div>
									</div>

									<div class="col-md-12">
										<div class="form-group">
											<input id="departure" class="datepicker form-control" name="departure" placeholder="Fecha salida" required>

										</div>
									</div>


									<div class="col-md-12">
										<div class="form-group">
											<select class="custom-select form-control" id="adults" placeholder="Cantidad" name="adults" required>
												<option disabled selected>Cantidad de personas</option>
												<option value="1">1</option>
												<option value="2">2</option>
												<option value="3">3</option>
												<option value="4">4</option>
											</select>

										</div>
									</div>
									
									<div class="col-md-12">
										<div class="form-group">
											<select class="custom-select d-block form-control" id="room_pref" placeholder="Apartamento" name="room_pref" required>
												<option disabled selected>Apartamento</option>
												<option value="Amueblado">Amueblado</option>
												<option value="Sin muebles">Sin muebles</option>

											</select>

										</div>
									</div>
								</div>
								<div class="col-md-6">

									<h3>Información de contacto</h3>
									<div class="col-md-12">
										<div class="form-group">
											<input type="text" class="form-control" id="first_name" name="first_name" placeholder="Nombre" required>

										</div>
									</div>
									<div class="col-md-12">
										<div class="form-group">
											<input type="text" class="form-control" id="last_name" name="last_name" placeholder="Apellido" required>

										</div>
									</div>
									<div class="col-md-12">
										<div class="form-group">
											<input type="email" placeholder="Correo" id="email" class="form-control" name="email" required>

										</div>
									</div>
									<div class="col-md-12">
										<div class="form-group">
											<input type="tel" placeholder="Teléfono" id="phone" class="form-control" name="phone" required>

										</div>
									</div>
								</div>
								<?php if ($responses) : ?>
									<p class="responses"><?php echo implode('<br>', $responses); ?></p>
								<?php endif; ?>
								<div class="col-md-12">
									<div class="submit-button text-center">
										<button class="btn btn-common" id="submit" type="submit">Ver disponibilidad</button>
										<div id="msgSubmit" class="h3 text-center hidden"></div>
										<div class="clearfix"></div>
									</div>
								</div>



							</div>
					</div>
				</div>

				</form>
			</div>
		</div>
	</div>
	
	<!-- End Reservation -->



	<!-- Start Contact info -->
	<div class="contact-imfo-box">
		<div class="container">
			<div class="row">
				<div class="col-md-4">
					<i class="fa fa-volume-control-phone"></i>
					<div class="overflow-hidden">
						<h4>Teléfono</h4>
						<p class="lead">
						<p class="lead">Cel: (+506) 8659-9865 </p>
<p class="lead">Cel: (+506) 6148-7593 </p>
						</p>
					</div>
				</div>
				<div class="col-md-4">
					<i class="fa fa-envelope"></i>
					<div class="overflow-hidden">
						<h4>Correo</h4>
						<p class="lead">
							info@avenidaflores.com
						</p>
					</div>
				</div>
				<div class="col-md-4">
					<i class="fa fa-map-marker"></i>
					<div class="overflow-hidden">
						<h4>Ubicación</h4>
						<p class="lead">
							Atenas, Costa Rica
						</p>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- End Contact info -->

	<!-- Start Footer -->
	<footer class="footer-area bg-f">
		<div class="container">
			<div class="row">


				<div class="col-lg-3 col-md-6">
					<h3>Sobre Nosótros</h3>
					<div class="text-justify">
					<p class="lead">Apartamentos Avenida Flores<br>
						El complejo de apartamentos más lujoso de Atenas</p>
				</div>
				</div>

				<div class="col-lg-3 col-md-6">
					<h3>Contacto</h3>
					<p class="lead">Avenida Flores</p>
					<p class="lead">Cel: (+506) 8659-9865 </p>
<p class="lead">Cel: (+506) 6148-7593 </p>
					<p class="lead">info@avenidaflores.com</p>
				</div>

				<div class="col-lg-3 col-md-6">
					<h3>Ubicación</h3>
					<p class="lead">Atenas, Costa Rica</p>
 					<p class="lead"><a href="mapa.html">Ver mapa</a></p>
				</div>

				<div class="col-lg-3 col-md-6">
					<h3>Redes Sociales</h3>
					<p class="lead">Contáctanos</p>
					<ul class="list-inline f-social">
						<li class="list-inline-item"><a href="https://www.facebook.com/" target="_blank"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
						<li class="list-inline-item"><a href="https://wa.me/50686162043?text=Voy%20a%20reservar%20un%20apartamento" target="_blank"><i class="fa fa-whatsapp" aria-hidden="true"></i></a></li>
					</ul>
				</div>
			</div>
		</div>

		<div class="copyright">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<p class="company-name"> &copy; 2021 Avenida Flores | Diseñada por <a href="https://sgsolutionscr.com" target="_blank">SG Solutions</a>

					</div>
				</div>
			</div>
		</div>

	</footer>
	<!-- End Footer -->

	<div class="fv-sbuttons-main">
		<a href="https://wa.me/50686599865?text=Voy%20a%20reservar%20un%20apartamento" class="fv-sbutton" target="_blank"><i class="fa fa-whatsapp"></i></a><a href="https://www.facebook.com/" class="fv-sbutton" target="_blank"><i class="fa fa-facebook-f"></i></a>

		<a target="_blank" class="fv-sbutton"><i class="fa fa-share-alt"></i></a>
	</div>

	<a href="#" id="back-to-top" title="Back to top" style="display: none;">&uarr;</a>

	 <!-- ALL JS FILES -->
	<script src="js/jquery-3.2.1.min.js"></script>
	<script src="js/popper.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<!-- ALL PLUGINS -->
	<script src="js/jquery.superslides.min.js"></script>
	<script src="js/images-loded.min.js"></script>
	<script src="js/isotope.min.js"></script>
	<script src="js/baguetteBox.min.js"></script>
	<script src="js/picker.js"></script>
	<script src="js/picker.date.js"></script>
	<script src="js/picker.time.js"></script>
	<script src="js/legacy.js"></script>
	<script src="js/form-validator.min.js"></script>
	<script src="js/contact-form-script.js"></script>
	<script src="js/custom.js"></script>

	<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
	<script src="https://kit.fontawesome.com/6428a330e0.js" crossorigin="anonymous"></script>
 </body>

</html>