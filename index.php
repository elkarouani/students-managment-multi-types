<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" href="assets/css/bootstrap4.min.css">
		<link rel="stylesheet" href="assets/css/font-awesome.css">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta http-equiv="X-UA-Compatible" content="IE-edge">
		<meta charset="utf-8">
		<title>Tp-partie1</title>
	</head>
	<header>
		<nav class="navbar navbar-expand-sm navbar-dark bg-dark" style="border-radius: 5px;">
		  <a class="navbar-brand" href="index.php">Tp-php</a>
		  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
		    <span class="navbar-toggler-icon"></span>
		  </button>
		  <div class="collapse navbar-collapse" id="navbarNav">
		    <ul class="navbar-nav">
		      <li class="nav-item active">
		        <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
		      </li>
		      <li class="nav-item">
		        <a class="nav-link" href="gestion_personnes_sans_modal/partie1.php?page=1">Partie 1</a>
		      </li>
		      <li class="nav-item">
		        <a class="nav-link" href="gestion_personnes_avec_modal/partie2.php?page=1">Partie 2</a>
		      </li>
		      <li class="nav-item">
		        <a class="nav-link" href="authentification_sans_base_de_données/partie3.php?page=1">Partie 3</a>
		      </li>
		      <li class="nav-item">
		        <a class="nav-link" href="authentification_avec_base_de_données/partie4.php?page=1">Partie 4</a>
		      </li>
		    </ul>
		  </div>
		</nav>
	</header>
	<body>
		<div class="card text-center" style="margin: 30px 70px;">
			<div class="card-header">
	    		<h5 class="card-title">Home</h5>
		    	<h6 class="card-subtitle mb-2 text-muted">Cette application web permet la gestion des personnes qui ont un CIN, un nom, un numéro de téléphone, une adresse, couvert tous les fonctionnalités CRUD {Create, Read, Update, Delete} concernant les infos de ces personnes.</h6>
	  		</div>
	  		<div class="card-body">
				<h4 class="card-subtitle mb-2 text-muted">Naviguer sur une partie :</h4>
				<br><br>
				<div class="row justify-content-center">
					<div class="col-md-8">
						<div class="card-columns">
							<div class="card">
								<div class="card-header">
									<h5 class="card-title">Partie 1</h5>
									<h6 class="card-subtitle mb-2 text-muted">Gestion sans modal</h6>
								</div>
								<div class="card-body" style="background-color: #e9ecef;">
									<a href="gestion_personnes_sans_modal/partie1.php?page=1" class="card-link btn btn-info btn-link">Entrer</a>
								</div>
							</div>
							<div class="col-md-6"></div>
							<div class="card">
								<div class="card-header">
									<h5 class="card-title">Partie 2</h5>
									<h6 class="card-subtitle mb-2 text-muted">Gestion avec modal</h6>
								</div>
								<div class="card-body" style="background-color: #e9ecef;">
									<a href="gestion_personnes_avec_modal/partie2.php?page=1" class="card-link btn btn-info btn-link">Entrer</a>
								</div>
							</div>
						</div>
					</div>
				</div>
				<br>
				<div class="row justify-content-center">
					<div class="col-md-8">
						<div class="card-columns">
							<div class="card">
								<div class="card-header">
									<h5 class="card-title">Partie 3</h5>
									<h6 class="card-subtitle mb-2 text-muted">Authentification sans Base de données</h6>
								</div>
								<div class="card-body" style="background-color: #e9ecef;">
									<a href="authentification_sans_base_de_données/partie3.php?page=1" class="card-link btn btn-info btn-link">Entrer</a>
								</div>
							</div>
							<div class="col-md-6"></div>
							<div class="card">
								<div class="card-header">
									<h5 class="card-title">Partie 4</h5>
									<h6 class="card-subtitle mb-2 text-muted">Authentification avec Base de données</h6>
								</div>
								<div class="card-body" style="background-color: #e9ecef;">
									<a href="authentification_avec_base_de_données/partie4.php?page=1" class="card-link btn btn-info btn-link">Entrer</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		</script>
		<script type="text/javascript" src="assets/js/jquery.min.js"></script>
		<script type="text/javascript" src="assets/js/popper.min.js"></script>
		<script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
	</body>
</html>