<?php
	require_once('Personne.php'); 

	Personne::charger();
	$personnes = Personne::getListe();

	$pageno = $_GET['page'];
	
	$no_of_records_per_page = 3;
	$total_rows = count($personnes);
	$total_pages = ceil($total_rows / $no_of_records_per_page);

	if ($pageno <= $total_pages && $pageno > 0) {
		$offset = $pageno * $no_of_records_per_page;
		$rows = array_slice($personnes, ($offset - $no_of_records_per_page), $no_of_records_per_page);
	}
?>
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
	<body>
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
		<div class="card text-center" style="margin: 30px 70px;">
			<div class="card-header">
	    		<h5 class="card-title">Partie 1</h5>
		    	<h6 class="card-subtitle mb-2 text-muted"></h6>
	  		</div>
	  		<div class="card-body">
				<table class="table table-hover table-bordered" >
					<thead class="thead-dark">
						<tr>
							<th>CIN</th>
							<th>Nom</th>
							<th>Tel</th>
							<th>Adresse</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach ($rows as $row) : ?>
							<form method="POST" action="Engine.php">
								<tr>
									<th scope="row">
										<input readonly="readonly" class="form-control" type="text" name="cin" value="<?= $row->getCin(); ?>">
									</th>
									<td>
										<input class="form-control" type="text" name="nom" value="<?= $row->getNom(); ?>">
									</td>
									<td>
										<input class="form-control" type="text" name="tel" value="<?= $row->getTel(); ?>">
									</td>
									<td>
										<input class="form-control" type="text" name="adresse" value="<?= $row->getAdresse(); ?>">
									</td>
									<td>
										<input class="btn btn-info btn-link" type="submit" name="read" value="Info">
										<input class="btn btn-warning btn-link" type="submit" name="modify" value="Modifier">
										<input class="btn btn-danger btn-link" type="submit" name="delete" value="Supprimer">
									</td>
								</tr>
							</form>
						<?php endforeach;?>
					</tbody>
				</table>
				<nav style="display: flex; justify-content: center;">
					<ul class="pagination">
						<li class="page-item">
							<?php if ($_GET['page'] <= 1): ?>
								<a class="page-link" href="partie1.php?page=1"><</a>
							<?php else : ?>
								<a class="page-link" href="partie1.php?page=<?= ($pageno - 1) ?>"><</a>
							<?php endif ?>
						</li>
						<?php foreach (range(1, $total_pages) as $value): ?>
							<li class="page-item"><a href="partie1.php?page=<?= $value ?>" class="page-link"><?= $value ?></a></li>
						<?php endforeach ?>
						<li class="page-item">
							<?php if ($_GET['page'] > ($total_pages - 1)): ?>
								<a class="page-link" href="partie1.php?page=<?= $total_pages ?>">></a>
							<?php else : ?>
								<a class="page-link" href="partie1.php?page=<?= ($pageno + 1) ?>">></a>
							<?php endif ?>
						</li>
					</ul>
				</nav>
				<table class="table table-hover table-bordered">
					<div class="card-header">
						<h5 class="card-title">Ajouter un personne :</h5>
					</div>
					<thead class="thead-dark">
						<tr>
							<th>CIN</th>
							<th>Nom</th>
							<th>Tel</th>
							<th>Adresse</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<form method="POST" action="Engine.php">
							<tr>
								<th scope="row">
									<input class="form-control" type="text" name="cin" value="">
								</th>
								<td>
									<input class="form-control" type="text" name="nom" value="">
								</td>
								<td>
									<input class="form-control" type="text" name="tel" value="">
								</td>
								<td>
									<input class="form-control" type="text" name="adresse" value="">
								</td>
								<td>
									<input class="btn btn-success btn-link" type="submit" name="create" value="Ajouter">
								</td>
							</tr>
						</form>
					</tbody>
				</table>
			</div>
		</div>
		</script>
		<script type="text/javascript" src="assets/js/jquery.min.js"></script>
		<script type="text/javascript" src="assets/js/popper.min.js"></script>
		<script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
	</body>
</html>