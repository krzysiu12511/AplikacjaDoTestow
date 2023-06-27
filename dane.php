<?php
include_once('script.php');

	
?>
<html>
	<head>
    <meta charset="UTF-8">
		<title>eSchool</title>
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet">
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
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
        <nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top gradient-custom one-edge-shadow">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">eSchool</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">
                <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="collapsibleNavbar">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" style="width:120px;" href="index.php">Strona główna</a>
                        </li>
                        <?php
                            if(isset($_SESSION['User']))
                            {
                            if($_SESSION['Nauczyciel'] == 1){
                        ?>
                         <li class="nav-item dropdown">
                         <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">Testy</a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="test.php">Utówrz Test</a></li>
                                <li><a class="dropdown-item" href="pytania.php">Dodaj pytanie</a></li>
                            
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="grupy.php">Grupy</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="oceny.php">Oceny</a>
                        </li>
                        <?php }
                        else{
                        ?>
                            <li class="nav-item">
                            <a class="nav-link" style="width:145px;" href="index.php">Moje sprawdziany</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" style="width:105px;" href="moje_oceny.php">Moje Oceny</a>
                            </li>
                        <?php
                        }
                        } ?>
                        
                    </ul>
                </div>
                <?php
                if(isset($_SESSION['User']))
                {
                ?>
                <div class="navbar-collapse collapse w-100 order-3 dual-collapse2" id="collapsibleNavbar">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle active" href="#" role="button" data-bs-toggle="dropdown">Witaj <?php echo $_SESSION['User']; ?> ! </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="dane.php">Moje dane</a></li>
                                <!--<li><a class="dropdown-item" href="#">Zmień hasło</a></li>-->
                            </ul>
                        </li>
                        <li class="nav-item"><?php echo '<a href="script.php?logout" class="nav-link" style="color:red; font-weight: 600;">Wyloguj</a>';?></li>
                    </ul>
                </div>
                <?php
                }else{
                ?>
                <div class="navbar-collapse collapse w-100 order-3 dual-collapse2" id="collapsibleNavbar">
                    <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="register.php">Zarejestruj się</a></li>
                        <li class="nav-item"><a class="nav-link" href="login.php">Zaloguj się</a></li>
                    </ul>
                </div>
                <?php
                }
                ?>
                
            </div>
        </nav>

        
        <section class="py-5 gradient-custom" style="min-height:900px; margin-top:50px;">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-sm-12 col-md-12">
                        <h1 class="fw-light center-text">Moje Dane</h1>
                    </div>
                </div>
            </div>
                <?php 
                $result = mysqli_query($conn, "SELECT Imie,Nazwisko,email,haslo FROM users WHERE ID = '$_SESSION[Userid]'");
                while ($row = mysqli_fetch_array($result)) {
                    $imie = $row["Imie"];
                    $nazwisko = $row["Nazwisko"];
                    $email = $row["email"];
                    $haslo = $row["haslo"];
                }
                ?>
            <div class="mojedane">
                <div class="container">
                    <div class="row">
                        <input type="hidden" id ="id" value="<?php echo $_SESSION['Userid']?>">
                        <div class="col-12 col-sm-6 col-md-6">
                            <p>Imie:</p>
                        </div>
                        <div class="col-12 col-sm-6 col-md-6">
                            <p id="imie"><?php echo $imie?></p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 col-sm-6 col-md-6">
                            <p>Nazwisko:</p>
                        </div>
                        <div class="col-12 col-sm-6 col-md-6">
                            <p id="nazwisko"><?php echo $nazwisko?></p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 col-sm-6 col-md-6">
                            <p>Email:</p>
                        </div>
                        <div class="col-12 col-sm-6 col-md-6">
                            <p id="email"><?php echo $email?></p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 col-sm-6 col-md-6">
                            <p>Haslo:</p>
                        </div>
                        <div class="col-12 col-sm-6 col-md-6">
                            <p id="haslo"><?php echo $haslo?></p>
                        </div>
                    </div>
                    <div class="row center-text">
                        <div class="col-12 col-sm-12 col-md-12">
                        <button type="submit" class="edytujdane btn btn-warning" name='kategoria'>Edytuj</button>
                        </div>
                    </div>
                </div>
            </div>
            
        </section>

        <footer id="sticky-footer" class="flex-shrink-0 py-4 bg-dark text-white-50">
            <div class="container text-center">
                <small>Copyright &copy; Your Website</small>
                <?php 
                $test = "UPDATE users SET Imie='$imie',Nazwisko='$nazwisko',email='$email',haslo='$haslo' Where users.ID='$id'";
                echo $test;
                ?>
            </div>
        </footer>

	</body>
</html>