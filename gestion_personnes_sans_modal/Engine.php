<?php require_once('Personne.php') ?>
<?php if (isset($_POST['read'])) : ?>
	<!DOCTYPE html>
	<html>
		<head>
			<link rel="stylesheet" href="assets/css/bootstrap4.min.css">
			<link rel="stylesheet" href="assets/css/font-awesome.css">
			<meta name="viewport" content="width=device-width, initial-scale=1">
			<meta http-equiv="X-UA-Compatible" content="IE-edge">
			<meta charset="utf-8">
			<title>Engine</title>
		</head>
		<header>
			<nav class="navbar navbar-expand-sm navbar-dark bg-dark" style="border-radius: 5px;">
			  <a class="navbar-brand" href="../index.php">Tp-php</a>
			  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
			    <span class="navbar-toggler-icon"></span>
			  </button>
			  <div class="collapse navbar-collapse" id="navbarNav">
			    <ul class="navbar-nav">
			      <li class="nav-item active">
			        <a class="nav-link" href="../index.php">Home <span class="sr-only">(current)</span></a>
			      </li>
			      <li class="nav-item">
			        <a class="nav-link" href="partie1.php?page=1">Partie 1</a>
			      </li>
			      <li class="nav-item">
			        <a class="nav-link" href="../gestion_personnes_avec_modal/partie2.php?page=1">Partie 2</a>
			      </li>
			      <li class="nav-item">
			        <a class="nav-link" href="../authentification_sans_base_de_données/partie3.php?page=1">Partie 3</a>
			      </li>
			      <li class="nav-item">
			        <a class="nav-link" href="../authentification_avec_base_de_données/partie4.php?page=1">Partie 4</a>
			      </li>
			    </ul>
			  </div>
			</nav>
		</header>
		<body>
			<div class="card text-center" style="margin: 30px 70px;">
				<div class="card-header">
		    		<h5 class="card-title">info</h5>
			    	<h6 class="card-subtitle mb-2 text-muted">Information sur le personne</h6>
		  		</div>
		  			<div class="card-body">
						<h5 class="card-title"><?= $_POST['nom']; ?></h5>
						<p class="card-text">
							<h6>CIN : <?= $_POST['cin']; ?></h6>
							<h6>Numero de télephone : <?= $_POST['tel']; ?></h6>
							<h6>Adresse : <?= $_POST['adresse']; ?></h6>
						</p>
					</div>
			</div>
			<script type="text/javascript" src="assets/js/jquery.min.js"></script>
			<script type="text/javascript" src="assets/js/popper.min.js"></script>
			<script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
		</body>
	</html>
<?php endif; ?>
<?php 
	if (isset($_POST['modify'])) {
		$personne = Personne::getPersonneByCin($_POST['cin']);
		$personne->update($_POST['cin'], $_POST['nom'], $_POST['tel'], $_POST['adresse']);
		header('location: update-success.php');
	} 
					
	if (isset($_POST['delete'])) {
		$personne = Personne::getPersonneByCin($_POST['cin']);
		$personne->delete($_POST['cin']);
		header('location: delete-success.php');
	}

	if (isset($_POST['create'])) {
		$p = new Personne();
		$p->setCin($_POST['cin']);$p->setNom($_POST['nom']);$p->setTel($_POST['tel']);$p->setAdresse($_POST['adresse']);
		$p->create();
		header('location: create-success.php');
	 } 
?>