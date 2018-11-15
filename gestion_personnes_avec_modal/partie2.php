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
		<title>Tp-partie2</title>
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
		        <a class="nav-link" href="../gestion_personnes_sans_modal/partie1.php?page=1">Partie 1</a>
		      </li>
		      <li class="nav-item">
		        <a class="nav-link" href="partie2.php?page=1">Partie 2</a>
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
	    		<h5 class="card-title">
	    			Partie 2
	    			<button class="btn btn-info btn-link float-sm-right" data-toggle="modal" data-target="#createModal">
						<i class="fa fa-1x fa-user"></i> Nouveau personne
					</button>
	    		</h5>
	  		</div>
	  		<div class="modal fade" id="createModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			  	<div class="modal-dialog modal-dialog-centered" role="document">
			    	<div class="modal-content">
			      		<div class="modal-header">
			        		<h5 class="modal-title" id="exampleModalLabel">Add new article</h5>
			        		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			          			<span aria-hidden="true">&times;</span>
			        		</button>
			      		</div>
			      		<form method="POST" action="Engine.php">
			      			<div class="modal-body">
			    				<div class="form-group">
					    			<label for="newCin">Cin :</label>
					    			<input type="text" class="form-control" id="newCin" placeholder="Entrer CIN" name="cin" value="">
					    		</div>
					    		<div class="form-group">
					    			<label for="newNom">Nom :</label>
					    			<input type="text" class="form-control" id="newNom" placeholder="Entrer nom" name="nom" value="">
					    		</div>
					    		<div class="form-group">
					    			<label for="newTel">Tel :</label>
			    					<input type="text" class="form-control" id="newTel" placeholder="Entrer tel" name="tel" value="">
					    		</div>
					    		<div class="form-group">
					    			<label for="newAdresse">Adresse :</label>
					    			<input type="text" class="form-control" id="newAdresse" placeholder="Enter adresse" name="adresse" value="">
					    		</div>
				      		</div>
				      		<div class="modal-footer">
				        		<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				        		<button type="submit" class="btn btn-primary" name="create">Save</button>
				      		</div>
			    		</form>
			    	</div>
			  	</div>
			</div>
	  		<div class="card-body">
				<table class="table table-hover table-bordered">
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
							<tr>
								<th scope="row">
									<p class="form-control"><?= $row->getCin(); ?></p>
								</th>
								<td>
									<p class="form-control"><?= $row->getNom(); ?></p>
								</td>
								<td>
									<p class="form-control"><?= $row->getTel(); ?></p>
								</td>
								<td>
									<p class="form-control"><?= $row->getAdresse(); ?></p>
								</td>
								<td>
									<button class="btn btn-info btn-link" data-toggle="modal" data-target="#infoModal<?= $row->getCin() ?>">
										<i class="fa fa-1x fa-search"></i> Info
									</button>
									<button class="btn btn-warning btn-link" data-toggle="modal" data-target="#modifyModal<?= $row->getCin(); ?>">
										<i class="fa fa-1x fa-pencil"></i> Modifier
									</button>
									<button class="btn btn-danger btn-link" data-toggle="modal" data-target="#deleteModal<?= $row->getCin(); ?>">
										<i class="fa fa-1x fa-trash"></i> Supprimer
									</button>
								</td>
							</tr>
						<?php endforeach;?>
					</tbody>
				</table>
				<nav style="display: flex; justify-content: center;">
					<ul class="pagination">
						<li class="page-item">
							<?php if ($_GET['page'] <= 1): ?>
								<a class="page-link" href="partie2.php?page=1"><</a>
							<?php else : ?>
								<a class="page-link" href="partie2.php?page=<?= ($pageno - 1) ?>"><</a>
							<?php endif ?>
						</li>
						<?php foreach (range(1, $total_pages) as $value): ?>
							<li class="page-item"><a href="partie2.php?page=<?= $value ?>" class="page-link"><?= $value ?></a></li>
						<?php endforeach ?>
						<li class="page-item">
							<?php if ($_GET['page'] > ($total_pages - 1)): ?>
								<a class="page-link" href="partie2.php?page=<?= $total_pages ?>">></a>
							<?php else : ?>
								<a class="page-link" href="partie2.php?page=<?= ($pageno + 1) ?>">></a>
							<?php endif ?>
						</li>
					</ul>
				</nav>
				<?php foreach ($rows as $row) : ?>
					<div class="modal fade" id="infoModal<?= $row->getCin(); ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
						<div class="modal-dialog" role="document">
						   	<div class="modal-content">
						      	<div class="modal-header">
						        	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						          		<span aria-hidden="true">&times;</span>
						        	</button>
						      	</div>
						      	<div class="modal-body">
							      	<div class="card text-center" style="margin: 30px 70px;">
										<div class="card-header">
									    	<h5 class="card-title">info</h5>
										    <h6 class="card-subtitle mb-2 text-muted">Information sur le personne</h6>
									  	</div>
									  	<div class="card-body">
											<h5 class="card-title"><?= $row->getNom(); ?></h5>
											<p class="card-text">
												<h6>CIN : <?= $row->getCin(); ?></h6>
												<h6>Numero de télephone : <?= $row->getTel(); ?></h6>
												<h6>Adresse : <?= $row->getAdresse(); ?></h6>
											</p>
										</div>
									</div>
							    </div>
							    <div class="modal-footer">
							        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
							    </div>
						    </div>
						</div>
					</div>
					<div class="modal fade" id="modifyModal<?= $row->getCin(); ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
						<div class="modal-dialog" role="document">
						   	<div class="modal-content">
						      	<div class="modal-header">
						        	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						          		<span aria-hidden="true">&times;</span>
						        	</button>
						      	</div>
						      	<form method="POST" action="Engine.php">
						      		<div class="modal-body">
					    				<div class="form-group">
					    					<label for="newCin">Cin :</label>
					    					<input type="text" class="form-control" id="newCin" placeholder="Entrer CIN" name="cin" value="<?= $row->getCin(); ?>">
					    				</div>
					    				<div class="form-group">
					    					<label for="newNom">Nom :</label>
					    					<input type="text" class="form-control" id="newNom" placeholder="Entrer nom" name="nom" value="<?= $row->getNom(); ?>">
					    				</div>
					    				<div class="form-group">
					    					<label for="newTel">Tel :</label>
			    							<input type="text" class="form-control" id="newTel" placeholder="Entrer tel" name="tel" value="<?= $row->getTel(); ?>">
					    				</div>
					    				<div class="form-group">
					    					<label for="newAdresse">Adresse :</label>
					    					<input type="text" class="form-control" id="newAdresse" placeholder="Enter adresse" name="adresse" value="<?= $row->getTel(); ?>">
					    				</div>
						      		</div>
							      	<div class="modal-footer">
							        	<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
							        	<button type="submit" class="btn btn-primary" name="modify">Modify</button>
							      	</div>
						    	</form>
						    </div>
						</div>
					</div>
					<div class="modal fade" id="deleteModal<?= $row->getCin(); ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
						<div class="modal-dialog" role="document">
						   	<div class="modal-content">
						      	<div class="modal-header">
						        	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						          		<span aria-hidden="true">&times;</span>
						        	</button>
						      	</div>
						      	<form method="POST" action="Engine.php">
						      		<div class="modal-body">
						      			<input type="text" name="cin" hidden="hidden" value="<?= $row->getCin(); ?>">
						    			<h5>Confirmer la suppression de ce personne :</h5>
							      	</div>
							      	<div class="modal-footer">
							        	<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
							        	<button type="submit" class="btn btn-primary" name="delete">Delete</button>
							      	</div>
						    	</form>
						    </div>
						</div>
					</div>
				<?php endforeach ?>
			</div>
		</div>

		<script type="text/javascript" src="assets/js/jquery.min.js"></script>
		<script type="text/javascript" src="assets/js/popper.min.js"></script>
		<script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
	</body>
</html>