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
                            <a class="nav-link active" href="grupy.php">Grupy</a>
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
            <div class="row" style="margin:20px;">
                <!--lewo-->
                <div class="col-12 col-sm-3 col-md-3">
                    <div class="container">
                        <div class="row">
                            <div class="col-12 col-sm-12 col-md-12">
                                <h1 class="fw-light center-text">Dodaj do Grupy</h1>
                            </div>
                        </div>
                    </div>
                    <div class="mojegrupy">
                        <div class="container">
                            <div class="row">
                                    <div class="row form DodajUcznia">
                                        <div class="col-12 col-sm-12 col-md-12">
                                        <select id='Grupa' name='Grupa' style="min-width:100%;padding:10px 0 10px 0;font-size:20px;">
                                            <option value='' id="random">Wybierz grupę</option>
                                                <?php $result = mysqli_query($conn,"SELECT * FROM grupy Where id_users = '$_SESSION[Userid]'");
                                                    while($row = mysqli_fetch_assoc($result)){
                                                    $id = $row['ID'];
                                                    $nazwa = $row['Nazwa'];
                                                    $status = $row['id_users'];
                                                    $wybierz = '' ;
                                                    if($_POST['Grupa'] == $id)
                                                    {
                                                        $wybierz = 'selected';
                                                    }
                                                    echo "<option value='$id' $wybierz>".$nazwa."</option>";
                                                    }
                                                ?> 
                                        </select>
                                        </div>
                                        <div class="col-12 col-sm-12 col-md-12">
                                        <select id='Uczen' name='Uczen' style="min-width:100%;padding:10px 0 10px 0;font-size:18px;margin-top:10px;">
                                            <option value=''>Wybierz ucznia</option>
                                                <?php $result = mysqli_query($conn,"SELECT ID,Imie,Nazwisko FROM users Where nauczyciel = 0 ");
                                                //SELECT user.ID FROM users AS user WHERE NOT EXISTS ( SELECT * FROM uczen_w_grupie AS uczen WHERE uczen.id_user = user.ID ) AND user.nauczyciel = 0
                                                    while($row = mysqli_fetch_assoc($result)){
                                                    $id = $row['ID'];
                                                    $imie = $row['Imie'];
                                                    $nazwisko = $row['Nazwisko'];
                                                    if($_POST['Uczen'] == $id)
                                                    {
                                                        $wybierz = 'selected';
                                                    }
                                                    echo "<option value='$id' $wybierz>".$imie." ".$nazwisko."</option>";
                                                    }
                                                ?> 
                                        </select>
                                        </div>
                                        <div class="col-12 col-sm-12 col-md-12 center-text">
                                            <button type='submit' class='DodajUczniaA DodajUcznia btn-sm btn btn-success' name='kategoria' id='DodajUcznia'>Dodaj Ucznia</button>
                                        </div>
                                    </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!--srodek-->
                <div class="col-12 col-sm-5 col-md-6">
                    <div class="container">
                        <div class="row">
                            <div class="col-12 col-sm-12 col-md-12">
                                <h1 class="fw-light center-text">Lista</h1>
                            </div>
                        </div>
                    </div>
                    <div class="mojegrupy">
                        <div class="container">
                            <div class="row">
                                <form action="" method="get" enctype="multipart/form-data" >
                                    <select id='Grupa' name='Grupa' style="min-width:100%; padding:15px 0 15px 15px ;font-size:26px;" onchange="this.form.submit()">
                                    <option value='0' >Wybierz grupę</option>
                                        <?php 
                                        $result = mysqli_query($conn,"SELECT * FROM grupy Where id_users = '$_SESSION[Userid]'");
                                            while($row = mysqli_fetch_assoc($result)){
                                                $id = $row['ID'];
                                                $nazwa = $row['Nazwa'];
                                                $status = $row['id_users'];
                                                $wybierz = '' ;
                                                if($_GET['Grupa'] == $id)
                                                {
                                                    $wybierz = 'selected';
                                                }
                                                echo "<option value='$id' $wybierz>".$nazwa."</option>";
                                            }
                                        ?> 
                                    </select>
                                </form>
                                <div class="col-4 col-sm-4 col-md-4">
                                    <p>Imie:</p>
                                </div>
                                <div class="col-4 col-sm-4 col-md-4">
                                    <p>Nazwisko:</p>
                                </div>
                                <div class="col-2 col-sm-2 col-md-2">
                                </div>
                            </div>
                            <?php
				                $id_grupy = 0;
				                if(isset($_GET['Grupa']))$id_grupy = $_GET['Grupa'];
                                    $resultl = mysqli_query($conn,"SELECT u.ID,u.Imie,u.Nazwisko FROM uczen_w_grupie uw INNER JOIN users u ON uw.id_user = u.ID WHERE id_grupy='$id_grupy'");
                                    while ($row = mysqli_fetch_array($resultl)) {
                                        $id = $row["ID"];
                                        $imie = $row["Imie"];
                                        $nazwisko = $row["Nazwisko"];
                                        if(mysqli_num_rows($resultl)>0){
                                            ?>
                                            <div class="row">
                                                <div class="col-4 col-sm-4 col-md-4">
                                                    <p><?php echo $imie ?></p>
                                                </div>
                                                <div class="col-5 col-sm-5 col-md-5">
                                                    <p><?php echo $nazwisko ?></p>
                                                </div>
                                                <div class="col-2 col-sm-2 col-md-2">
                                                    <button type="submit" class="hide btn btn-danger btn-sm" name='kategoria' id="<?php echo $id; ?>">Usun</button>
                                                </div>
                                            </div>
                                        <?php
                                        }
                                    }
                            ?>
                        </div>
                    </div>
                </div>

                <!--prawo-->
                <div class="col-12 col-sm-4 col-md-3" >
                    <div class="container" >
                        <div class="row">
                            <div class="col-12 col-sm-12 col-md-12">
                                <h1 class="fw-light center-text">Twoje Grupy</h1>
                            </div>
                        </div>
                    </div>
                    <div class="grupy">
                        <div class="container">
                            <div class="row">
                                <div class="col-9 col-sm-9 col-md-9">
                                    <p>Nazwa:</p>
                                </div>
                                <div class="col-1 col-sm-1 col-md-1">
                                </div>
                            </div>
                            <?php 
                            $result = mysqli_query($conn, "SELECT ID,Nazwa FROM grupy WHERE id_users = '$_SESSION[Userid]'");
                            while ($row = mysqli_fetch_assoc($result)) {
                                $ID = $row["ID"];
                                $Nazwa = $row["Nazwa"];
                            ?>
                            <div class="row">
                                <input type="hidden" name="ID" id="ID" value="<?php echo $ID?>">
                                <div class="col-9 col-sm-9 col-md-9">
                                    <p><?php echo $Nazwa?></p>
                                </div>
                                <div class="col-1 col-sm-1 col-md-1">
                                    <button type="submit" class="hideGrupa btn btn-danger btn-sm" name='kategoria' id="<?php echo $ID; ?>">Usun</button>
                                </div>
                            </div>
                            <?php
                            }
                            ?>
                            <div class="row center-text">
                                <div class="col-12 col-sm-12 col-md-12">
                                    <input type="text" class="form-control" id="Nazwa" placeholder="Nazwa Grupy" name="Nazwa">
                                    <input type="hidden" name="ID_user" id="ID_user" value="<?php echo $_SESSION['Userid'] ?>">
                                </div>
                                <div class="col-12 col-sm-12 col-md-12">
                                    <button type='submit' class='DodajGrupeA DodajGrupe btn-sm btn btn-success' name='kategoria' id='DodajGrupe'>Dodaj Grupę</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
        </section>

        <footer id="sticky-footer" class="flex-shrink-0 py-4 bg-dark text-white-50">
            <div class="container text-center">
                <small>Copyright &copy; Your Website</small>
            </div>
        </footer>

	</body>
</html>