<!doctype html>
<?php
session_start();
?>
<html>
	<head>
    <meta charset="UTF-8">
		<title>eSchool</title>
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet">
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta charset="utf-8">
		<link rel="stylesheet" href="style.css" >
		<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
		
		<script src="https://momentjs.com/downloads/moment.js"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
		<script src="jquery-3.6.1.min.js"></script>
		<script src="jquery.js"></script>
	</head>
	<body>
		<section class="vh-100 gradient-custom">
			<div class="container py-5 h-100">
				<div class="row d-flex justify-content-center align-items-center h-100">
					<div class="col-12 col-md-8 col-lg-6 col-xl-5">
						<div class="card bg-dark text-white" style="border-radius: 1rem;">
							<div class="card-body p-5 text-center">
							<form action="script.php" method="post" enctype="multipart/form-data">
								<div class="mb-md-4 mt-md-3 pb-4">
									<h2 class="fw-bold mb-2 text-uppercase">Logowanie</h2>
									<p class="text-white-50 mb-4">Wpisz Login oraz Hasło!</p>
									<div class="form-outline form-white mb-4">
										<input type="email" id="typeEmailX" class="form-control form-control-lg" placeholder="Login" name="Login" required/>
										<label class="form-label" for="typeEmailX">Login</label>
									</div>
									<div class="form-outline form-white mb-4">
										<input type="password" id="typePasswordX" class="form-control form-control-lg" placeholder="Hasło" name="Paswd" required/>
										<label class="form-label" for="typePasswordX">Hasło</label>
									</div>
									<button class="btn btn-outline-light btn-lg px-4" type="submit" name="kategoria" value="Zaloguj">Zaloguj</button>
								</div>
								<div>
									<p class="mb-0">Nie masz konta? <a href="register.php" class="text-white-50 fw-bold">Zarejestruj się</a></p>
								</div>
							</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
	</body>
</html>
