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
                            <a class="nav-link dropdown-toggle active" href="#" role="button" data-bs-toggle="dropdown">Testy</a>
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
            <div class="row" style="margin:20px;">
                <!--lewo-->
                <div class="col-12 col-sm-12 col-md-4">
                    <div class="container">
                        <div class="row">
                            <div class="col-12 col-sm-12 col-md-12">
                                <h1 class="fw-light center-text">Dodaj Pytanie</h1>
                            </div>
                        </div>
                    </div>
                    <div class="mojepytania">
                        <div class="container">
                            <div class="row">
                                    <div class="row form DodajUcznia">
                                        <div class="col-12 col-sm-12 col-md-12 center-text">
                                        <select id='Kategoria' name='Kategoria' style="padding:10px 0 10px 5px;font-size:20px;width:100%;">
                                            <option value=''>Wybierz Kategorie</option>
                                                <?php $result = mysqli_query($conn,"SELECT * FROM kategorie");
                                                    while($row = mysqli_fetch_assoc($result)){
                                                    $id = $row['ID'];
                                                    $nazwa = $row['Nazwa'];
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
                                        <div class="col-12 col-sm-12 col-md-12 pytania">
                                            <labe>Pytanie:</labe>
                                            <input type="text" class="form-control" id="Pytanie" placeholder="Treść Pytania" name="Pytanie">
                                        </div>
                                        <div class="col-12 col-sm-12 col-md-12 pytania">
                                        <form>
                                            <fieldset id="group1">
                                                <label>Odpowiedzi: </label>
                                                <div class="row">
                                                    <div class="col-1 col-sm-1 col-md-1"><input type="radio" id="A" name="Odpowiedzi" value="A"></div>
                                                    <div class="col-11 col-sm-11 col-md-11"><input type="text" class="form-control" for="A" id="odpA" placeholder="Odpowiedź A" name="A"></div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-1 col-sm-1 col-md-1"><input type="radio" id="B" name="Odpowiedzi" value="B"></div>
                                                    <div class="col-11 col-sm-11 col-md-11"><input type="text" class="form-control" for="B" id="odpB" placeholder="Odpowiedź B" name="B"></div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-1 col-sm-1 col-md-1"><input type="radio" id="C" name="Odpowiedzi" value="C"></div>
                                                    <div class="col-11 col-sm-11 col-md-11"><input type="text" class="form-control" for="C" id="odpC" placeholder="Odpowiedź C" name="C"></div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-1 col-sm-1 col-md-1"><input type="radio" id="D" name="Odpowiedzi" value="D"></div>
                                                    <div class="col-11 col-sm-11 col-md-11"><input type="text" class="form-control" for="D" id="odpD" placeholder="Odpowiedź D" name="D"></div>
                                                </div>
                                            </fieldset>
                                        </form>
                                        </div>
                                        <div class="col-12 col-sm-12 col-md-12 center-text">
                                            <button type='submit' class='DodajPytanieA DodajPytanie center-text btn-sm btn btn-success' name='kategoria' id='DodajUcznia'>Dodaj Pytanie</button>
                                        </div>
                                    </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!--srodek-->
                <div class="col-12 col-sm-12 col-md-5">
                    <div class="container">
                        <div class="row">
                            <div class="col-12 col-sm-12 col-md-12">
                                <h1 class="fw-light center-text">Lista pytań</h1>
                            </div>
                        </div>
                    </div>
                    <div class="mojegrupy">
                        <div class="container">
                            <div class="row">
                                <form action="" method="get" enctype="multipart/form-data" >
                                    <select id='Kategoria' name='Kategoria' style="min-width:100%; padding:10px 0 10px 5px ;font-size:24px;" onchange="this.form.submit()">
                                    <option value='0' >Wybierz Kategorie</option>
                                        <?php $result = mysqli_query($conn,"SELECT * FROM kategorie");
                                            while($row = mysqli_fetch_assoc($result)){
                                                $id = $row['ID'];
                                                $nazwa = $row['Nazwa'];
                                                $wybierz = '' ;
                                                if($_GET['Kategoria'] == $id)
                                                {
                                                    $wybierz = 'selected';
                                                }
                                                echo "<option value='$id' $wybierz>".$nazwa."</option>";
                                            }
                                        ?> 
                                    </select>
                                </form>
                                <div class="col-9 col-sm-9 col-md-9">
                                    <p>Pytania</p>
                                </div>
                                <div class="col-2 col-sm-2 col-md-2">
                                </div>
                            </div>
                            <?php
				                $id_kategorii = 0;
				                if(isset($_GET['Kategoria']))$id_kategorii = $_GET['Kategoria'];
                                    $resultl = mysqli_query($conn,"SELECT ID,pytanie FROM pytania WHERE id_kategori='$id_kategorii'");
                                    while ($row = mysqli_fetch_array($resultl)) {
                                        $id = $row["ID"];
                                        $pytanie = $row["pytanie"];
                                        if(mysqli_num_rows($resultl)>0){
                                            ?>
                                            <div class="row">
                                                <div class="col-10 col-sm-10 col-md-10">
                                                    <input type="hidden" id="id" value="<?php echo $id; ?>">
                                                    <p class="pytanie"><?php echo $pytanie ?></p>
                                                </div>
                                                <div class="col-2 col-sm-2 col-md-2">
                                                    <button type="submit" class="hidePytanie btn btn-danger btn-sm" name='kategoria'>Usun</button>
                                                    <button type="submit" class="edytujPytanie btn btn-warning btn-sm" name='kategoria' style ="margin-top:5px">Edytuj</button>
                                                </div>
                                                <?php 
                                                $result = mysqli_query($conn,"SELECT ID,poprawna,odpowiedz FROM odpowiedzi WHERE id_pytania='$id'");
                                                $i = 0;
                                                $array_id = ["A","B","C","D"];
                                                while ($row = mysqli_fetch_array($result)) {
                                                    $id = $row["ID"];
                                                    $poprawna = $row["poprawna"];
                                                    $odpowiedz = $row["odpowiedz"];
                                                    $A = $odpowiedz;
                                                    $id_A = $id;
                                                    if($poprawna == 1){
                                                        ?>
                                                        <div class="col-10 col-sm-10 col-md-10 poprawna">
                                                            <input type="hidden" id="<?php echo $array_id[$i]?>" value="<?php echo $id; ?>">
                                                            <p class="<?php echo $array_id[$i]?>"><?php echo $odpowiedz ?></p>
                                                        </div>
                                                        <?php
                                                    }
                                                    else {
                                                        ?>
                                                        <div class="col-10 col-sm-10 col-md-10">
                                                            <input type="hidden" id="<?php echo $array_id[$i]?>" value="<?php echo $id; ?>">
                                                            <p class="<?php echo $array_id[$i]?>"><?php echo $odpowiedz ?></p>
                                                        </div>
                                                    <?php }
                                                    $i += 1;
                                                    } ?>
                                            </div>
                                        <?php
                                        }
                                    }
                            ?>
                        </div>
                    </div>
                </div>

                <!--prawo-->
                <div class="col-12 col-sm-12 col-md-3" >
                    <div class="container" >
                        <div class="row">
                            <div class="col-12 col-sm-12 col-md-12">
                                <h1 class="fw-light center-text">Kategorie</h1>
                            </div>
                        </div>
                    </div>
                    <div class="grupy">
                        <div class="container">
                            <div class="row">
                                <div class="col-12 col-sm-12 col-md-12">
                                    <p>Nazwa:</p>
                                </div>
                            </div>
                            <?php 
                            $result = mysqli_query($conn, "SELECT ID,Nazwa FROM kategorie");
                            while ($row = mysqli_fetch_assoc($result)) {
                                $ID = $row["ID"];
                                $Nazwa = $row["Nazwa"];
                            ?>
                            <div class="row">
                                <input type="hidden" name="ID" id="ID" value="<?php echo $ID?>">
                                <div class="col-10 col-sm-10 col-md-10">
                                    <p><?php echo $Nazwa?></p>
                                </div>
                                <div class="col-2 col-sm-2 col-md-2">
                                    <button type="submit" class="hideKategoria btn btn-danger btn-sm" name='kategoria' id="<?php echo $ID; ?>">Usun</button>
                                </div>
                            </div>
                            <?php
                            }
                            ?>
                            <div class="row center-text">
                                <div class="col-12 col-sm-12 col-md-12">
                                    <input type="text" class="form-control" id="Nazwa" placeholder="Nazwa Kategori" name="Nazwa">
                                </div>
                                <div class="col-12 col-sm-12 col-md-12">
                                    <button type='submit' class='DodajKategorieA DodajKategorie btn-sm btn btn-success' name='kategoria' id='DodajKategorie'>Dodaj Kategorie</button>
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