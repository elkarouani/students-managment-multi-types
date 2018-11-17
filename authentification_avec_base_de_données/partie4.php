<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" href="assets/css/bootstrap4.min.css">
		<link rel="stylesheet" href="assets/css/font-awesome.css">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta http-equiv="X-UA-Compatible" content="IE-edge">
		<meta charset="utf-8">
		<title>Tp-partie4</title>
	</head>
	<header>
		<nav class="navbar navbar-expand-sm navbar-dark bg-dark">
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
		        <a class="nav-link" href="../gestion_personnes_avec_modal/partie2.php?page=1">Partie 2</a>
		      </li>
		      <li class="nav-item">
		        <a class="nav-link" href="../authentification_sans_base_de_données/partie3.php?page=1">Partie 3</a>
		      </li>
		      <li class="nav-item">
		        <a class="nav-link" href="partie4.php?page=1">Partie 4</a>
		      </li>
		    </ul>
		  </div>
		</nav>
	</header>
	<body>
		<br>
		<?php  
			require_once('User.php');

			if(isset($_POST['sign'])){
				$_name = $_POST['name'];
				$_email = $_POST['email'];
				$_password = $_POST['password'];
				$_rePassword = $_POST['re-password'];

				$data = User::getUserByEmail($_email);

				if ($data) {
					echo '<h5 class="text-warning border-warning text-center">email used before !!</h5>';
				}else{
					if(!filter_var($_email, FILTER_VALIDATE_EMAIL)){
						echo '<h5 class="text-warning border-warning text-center">invalid email !!</h5>';
					}elseif ($_password !== $_rePassword) {
						echo '<h5 class="text-warning border-warning text-center">Please, enter the same passwords !!</h5>';	
					}else{
						User::setUser(array(
							'name' => $_name,
							'email' => $_email,
							'password' => $_password
						));
						echo '<h5 class="text-success border-success text-center">Sign up successfully, go ahead on Log in</h5>';
					}
				}
			}

			if (isset($_POST['log'])) {
				$_email = $_POST['email'];
				$_password = $_POST['password'];

				$data = User::getUserByEmail($_email);

				if (!$data || $data['password'] !== $_password) {
					echo '<h5 class="text-warning border-warning text-center">Email or password wrong, if you are new, go ahead and Sign up !!</h5>';
				}else{
					echo '<h5 class="text-success border-success text-center">You are successfully Loged in</h5>';	
				}
			}
		?>
		<div class="card text-center" style="margin: 30px 170px;">
			<div class="card-header">
	    		<ul class="nav nav-tabs card-header-tabs">
	    			<li class="nav-item">
	    				<?php if ($_GET['page'] == 1): ?>
	    					<a class="nav-link active" href="partie4.php?page=1">Log in</a>
	    				<?php else :?>
	    					<a class="nav-link" href="partie4.php?page=1">Log in</a>
	    				<?php endif ?>
	    			</li>
	    			<li class="nav-item">
	    				<?php if ($_GET['page'] == 2): ?>
	    					<a class="nav-link active" href="partie4.php?page=2">Sign up</a>
	    				<?php else :?>
	    					<a class="nav-link" href="partie4.php?page=2">Sign up</a>
	    				<?php endif ?>
	    			</li>
	    		</ul>
	  		</div>
	  		<div class="card-body">
	  			<?php if ($_GET['page'] == 1): ?>
	    			<div class="card text-center" style="margin: 30px 250px;">
						<div class="card-header">
				    		<h5 class="card-title">Log in</h5>
				  		</div>
				  		<form method="POST">
				  			<div class="card-body">
				  				<div class="form-group">
					    			<label for="newEmail">Email :</label>
					    			<input type="text" class="form-control" id="newEmail" placeholder="Entrer email" name="email" value="">
					    		</div>
					    		<div class="form-group">
					    			<label for="newPassword">Password :</label>
					    			<input type="password" class="form-control" id="newPassword" placeholder="Entrer password" name="password" value="">
					    		</div>
					    		<div class="form-group float-left">
					    			<!-- <input type="checkbox" id="newPassword" placeholder="Entrer password" name="password" value=""> -->
					    			<!-- <label for="newPassword">Remember me</label> -->
					    		</div>
					    		<!-- <br> -->
							</div>
							<div class="card-footer">
								<button type="submit" name="log" class="btn btn-primary">Login</button>
								<!-- <a class="text-primary" href="#" style="margin-left: 10px;">Forgot Your Password?</a> -->
							</div>
				  		</form>
					</div>
	    		<?php endif ?>
	    		<?php if ($_GET['page'] == 2): ?>
	    			<div class="card text-center" style="margin: 30px 250px;">
						<div class="card-header">
				    		<h5 class="card-title">Sign up</h5>
				  		</div>
				  		<form method="POST">
				  			<div class="card-body">
				  				<div class="form-group">
					    			<label for="newEmail">Name :</label>
					    			<input type="text" class="form-control" id="newName" placeholder="Entrer name" name="name" value="">
					    		</div>
				  				<div class="form-group">
					    			<label for="newEmail">Email :</label>
					    			<input type="text" class="form-control" id="newEmail" placeholder="Entrer email" name="email" value="">
					    		</div>
					    		<div class="form-group">
					    			<label for="newPassword">Password :</label>
					    			<input type="password" class="form-control" id="newPassword" placeholder="Entrer password" name="password" value="">
					    		</div>
					    		<div class="form-group">
					    			<label for="newConfirmPassword">Confirm Password :</label>
					    			<input type="password" class="form-control" id="newConfirmPassword" placeholder="Confirm password" name="re-password" value="">
					    		</div>
							</div>
							<div class="card-footer">
								<button type="submit" name="sign" class="btn btn-primary">Sign up</button>
							</div>
				  		</form>
					</div>
	    		<?php endif ?>
			</div>
		</div>
		</script>
		<script type="text/javascript" src="assets/js/jquery.min.js"></script>
		<script type="text/javascript" src="assets/js/popper.min.js"></script>
		<script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
	</body>
</html>
