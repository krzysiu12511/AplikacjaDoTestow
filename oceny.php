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
                            <a class="nav-link active" href="oceny.php">Oceny</a>
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
            <div class="row  d-flex justify-content-center" style="margin:20px;">
                <!--srodek-->
                <div class="col-12 col-sm-12 col-md-11">
                    <div class="container">
                        <div class="row">
                            <div class="col-12 col-sm-12 col-md-12">
                                <h1 class="fw-light center-text">Lista Ocen</h1>
                            </div>
                        </div>
                    </div>
                    <div class="mojegrupy">
                        <div class="container">
                            <div class="row">
                                <form action="" method="get" enctype="multipart/form-data" >
                                    <select id='Grupa_oceny' name='Grupa' style="min-width:100%; padding:15px 0 15px 15px ;font-size:20px;"onchange="this.form.submit()">
                                    <option value='0'>Wybierz grupe</option>
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
                                    <?php 
                                    if(isset($_GET['Grupa'])){
                                       ?> <select id='test_oceny' name='test' style=" min-width:49%;padding:15px 0 15px 15px;font-size:20px;margin-top:10px;" onchange="this.form.submit()">
                                        <option value='0'>Wybierz Test</option>
                                            <?php 
                                            $id_grupy = $_GET['Grupa'];
                                            $result = mysqli_query($conn,"SELECT t.ID,t.Nazwa FROM testy t Where t.id_grupy = '$id_grupy' order by Nazwa");
                                                while($row = mysqli_fetch_assoc($result)){
                                                    $id = $row['ID'];
                                                    $nazwa = $row['Nazwa'];
                                                    $wybierz = '' ;
                                                    if($_GET['test'] == $id)
                                                    {
                                                        $wybierz = 'selected';
                                                    }
                                                    echo "<option value='$id' $wybierz>".$nazwa."</option>";
                                                }
                                            ?> 
                                        </select>
                                        <select id='uczen_oceny' name='uczen' style=" min-width:50%;float:right;padding:15px 0 15px 15px;font-size:20px;margin-top:10px;" onchange="this.form.submit()">
                                        <option value='0'>Wybierz ucznia</option>
                                            <?php 
                                            $id_grupy = $_GET['Grupa'];
                                            $result = mysqli_query($conn,"SELECT u.ID,u.Imie,u.Nazwisko FROM users u INNER JOIN uczen_w_grupie uc on u.ID = uc.id_user Where id_grupy = '$id_grupy' Order by u.Imie");
                                                while($row = mysqli_fetch_assoc($result)){
                                                    $id = $row['ID'];
                                                    $imie = $row['Imie'];
                                                    $nazwisko = $row['Nazwisko'];
                                                    $wybierz = '' ;
                                                    if($_GET['uczen'] == $id)
                                                    {
                                                        $wybierz = 'selected';
                                                    }
                                                    echo "<option value='$id' $wybierz>".$imie." ".$nazwisko."</option>";
                                                }
                                            ?> 
                                        </select><?php
                                    }
                                    ?>
                                    
                                </form>
                                
                            </div>
                            
                            <?php
                            if(!isset($_GET['Grupa'])){

                            }else{
                                if(isset($_GET['Grupa']) && isset($_GET['test'])){
                                    $id_testu = $_GET['test'];
                                    $resultl = mysqli_query($conn,"SELECT u.ID,t.ID as test,t.Nazwa,u.Imie,u.Nazwisko,o.ocena,t.waga FROM ocena o INNER JOIN users u ON o.id_user = u.ID INNER JOIN testy t ON o.id_testu = t.ID WHERE t.ID='$id_testu'");
                                    ?>
                                            <div class="row">
                                                <div class="col-3 col-sm-3 col-md-3">
                                                    <p>Imie:</p>
                                                </div>
                                                <div class="col-3 col-sm-3 col-md-3">
                                                    <p>Nazwisko:</p>
                                                </div>
                                                <div class="col-2 col-sm-2 col-md-2">
                                                    <p>Ocena:</p>
                                                </div>
                                                <div class="col-2 col-sm-2 col-md-2">
                                                    <p>Waga:</p>
                                                </div>
                                                <div class="col-1 col-sm-1 col-md-1">
                                                    <p></p>
                                                </div>
                                            </div><?php
                                            $tempa = array();
                                            $wagi = array();
                                            
                                    while ($row = mysqli_fetch_array($resultl)) {
                                        $id = $row["ID"];
                                        $id_testu= $row["test"];
                                        $imie = $row["Imie"];
                                        $nazwisko = $row["Nazwisko"];
                                        $ocena = $row["ocena"];
                                        $waga = $row["waga"];
                                        $nazwa = $row["Nazwa"];
                                        $temp = $ocena * $waga;
                                        array_push($tempa, $temp);
                                        array_push($wagi,$waga);
                                        if(mysqli_num_rows($resultl)>0){
                                            ?>
                                            <div class="row">
                                                <div class="col-3 col-sm-3 col-md-3">
                                                    <p><?php echo $imie ?></p>
                                                </div>
                                                <div class="col-3 col-sm-3 col-md-3">
                                                    <p><?php echo $nazwisko ?></p>
                                                </div>
                                                <div class="col-2 col-sm-2 col-md-2">
                                                    <p><?php echo $ocena ?></p>
                                                </div>
                                                <div class="col-2 col-sm-2 col-md-2">
                                                    <p><?php echo $waga ?></p>
                                                </div>
                                                <div class="col-1 col-sm-1 col-md-1">
                                                    <?php 
                                                    if (str_contains($nazwa, 'poprawa')) { 
                                                    }
                                                    else {
                                                        
                                                    ?>
                                                    <input type="hidden" value="<?php echo $id_testu; ?>" id="test">
                                                    <button type="submit" class="poprawa btn btn-primary btn-sm" name='kategoria' id="<?php echo $id; ?>">Poprawa</button>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                        <?php
                                        }
                                    }
                                    $obroty = count($wagi);
                                    if($obroty != 0){
                                    $srednia = 0;
                                    $temp = 0;
                                    $wagitemp = 0;
                                    for($i =0; $i < $obroty;$i++){
                                            $a = $tempa[$i];
                                            $temp += $a;
                                            $b = $wagi[$i];
                                            $wagitemp += $b;
                                    }
                                    $srednia = $temp/$wagitemp;
                                    ?>
                                        <div class="row">
                                                <div class="col-6 col-sm-6 col-md-6">
                                                    <p>Średnia zadania:</p>
                                                </div>
                                                <div class="col-5 col-sm-5 col-md-5">
                                                    <p><?php echo round($srednia, 2) ?></p>
                                                </div>
                                               
                                        </div>
                                    <?php
                                    }}
                            
				                elseif(isset($_GET['Grupa']) && isset($_GET['uczen'])){
                                    $id_cznia = $_GET['uczen'];
                                    $resultl = mysqli_query($conn,"SELECT u.ID,t.ID as test,u.Imie,u.Nazwisko,o.ocena,t.waga,t.Nazwa FROM ocena o INNER JOIN users u ON o.id_user = u.ID INNER JOIN testy t ON o.id_testu = t.ID WHERE o.id_user='$id_cznia' ORDER BY t.Nazwa");
                                    ?>
                                            <div class="row">
                                                <div class="col-5 col-sm-5 col-md-5">
                                                    <p>Nazwa testu:</p>
                                                </div>
                                                <div class="col-3 col-sm-3 col-md-3">
                                                    <p>Ocena:</p>
                                                </div>
                                                <div class="col-2 col-sm-2 col-md-2">
                                                    <p>Waga:</p>
                                                </div>
                                                <div class="col-1 col-sm-1 col-md-1">
                                                    <p></p>
                                                </div>
                                            </div><?php
                                        $tempa = array();
                                        $wagi = array();
                                    while ($row = mysqli_fetch_array($resultl)) {
                                        $id = $row["ID"];
                                        $id_testu= $row["test"];
                                        $ocena = $row["ocena"];
                                        $nazwa = $row["Nazwa"];
                                        $waga = $row["waga"];
                                        $temp = $ocena * $waga;
                                        array_push($tempa, $temp);
                                        array_push($wagi,$waga);
                                        
                                        if(mysqli_num_rows($resultl)>0){
                                            ?>
                                            <div class="row">
                                                
                                                <div class="col-5 col-sm-5 col-md-5">
                                                    <p><?php echo $nazwa ?></p>
                                                </div>
                                                <div class="col-3 col-sm-3 col-md-3">
                                                    <p><?php echo $ocena ?></p>
                                                </div>
                                                <div class="col-2 col-sm-2 col-md-2">
                                                    <p><?php echo $waga ?></p>
                                                </div>
                                                <div class="col-1 col-sm-1 col-md-1">
                                                <?php 
                                                    if (str_contains($nazwa, 'poprawa')) { 
                                                    }
                                                    else {

                                                    
                                                    ?>
                                                    <input type="hidden" value="<?php echo $id_testu; ?>" id="test">
                                                    <button type="submit" class="poprawa btn btn-primary btn-sm" name='kategoria' id="<?php echo $id; ?>">Poprawa</button>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                        <?php
                                        }
                                    }
                                    $obroty = count($wagi);
                                    if($obroty != 0){
                                    $srednia = 0;
                                    $temp = 0;
                                    $wagitemp = 0;
                                    for($i =0; $i < $obroty;$i++){
                                            $a = $tempa[$i];
                                            $temp += $a;
                                            $b = $wagi[$i];
                                            $wagitemp += $b;
                                    }
                                    $srednia = $temp/$wagitemp;
                                    ?>
                                        <div class="row">
                                                <div class="col-6 col-sm-6 col-md-6">
                                                    <p>Średnia ucznia:</p>
                                                </div>
                                                <div class="col-5 col-sm-5 col-md-5">
                                                    <p><?php echo round($srednia, 2) ?></p>
                                                </div>
                                               
                                        </div>
                                    <?php
                                }}else {
                                    $id_grupy = $_GET['Grupa'];
                                    $resultl = mysqli_query($conn,"SELECT u.ID,t.ID as test,u.Imie,u.Nazwisko,o.ocena,t.waga,t.Nazwa FROM ocena o INNER JOIN users u ON o.id_user = u.ID INNER JOIN testy t ON o.id_testu = t.ID INNER JOIN uczen_w_grupie uw ON uw.id_user = u.ID WHERE uw.id_grupy='$id_grupy' ORDER BY u.ID ASC,t.Nazwa");
                                        ?>  <div class = "row">
                                                <div class="col-2 col-sm-2 col-md-2">
                                                    <p>Imie:</p>
                                                </div>
                                                <div class="col-2 col-sm-2 col-md-2">
                                                    <p>Nazwisko:</p>
                                                </div>
                                                <div class="col-5 col-sm-5 col-md-5">
                                                    <p>Nazwa testu:</p>
                                                </div>
                                                <div class="col-1 col-sm-1 col-md-1">
                                                    <p>Ocena:</p>
                                                </div>
                                                <div class="col-1 col-sm-1 col-md-1">
                                                    <p>Waga:</p>
                                                </div>
                                                <div class="col-1 col-sm-1 col-md-1">
                                                    <p></p>
                                                </div>
                                            </div>
                                            <?php
                                    while ($row = mysqli_fetch_array($resultl)) {
                                        $id = $row["ID"];
                                        $id_testu= $row["test"];
                                        $imie = $row["Imie"];
                                        $nazwisko = $row["Nazwisko"];
                                        $ocena = $row["ocena"];
                                        $nazwa = $row["Nazwa"];
                                        $waga = $row["waga"];
                                        if(mysqli_num_rows($resultl)>0){
                                            ?>
                                            <div class="row">
                                                <div class="col-2 col-sm-2 col-md-2">
                                                    <p><?php echo $imie ?></p>
                                                </div>
                                                <div class="col-2 col-sm-2 col-md-2">
                                                    <p><?php echo $nazwisko ?></p>
                                                </div>
                                                <div class="col-5 col-sm-5 col-md-5">
                                                    <p><?php echo $nazwa ?></p>
                                                </div>
                                                <div class="col-1 col-sm-1 col-md-1">
                                                    <p><?php echo $ocena ?></p>
                                                </div>
                                                <div class="col-1 col-sm-1 col-md-1">
                                                    <p><?php echo $waga ?></p>
                                                </div>
                                                <div class="col-1 col-sm-1 col-md-1">
                                                <?php 
                                                    if (str_contains($nazwa, 'poprawa')) {}
                                                    else {
                                                    ?>
                                                    <input type="hidden" value="<?php echo $id_testu; ?>" id="test">
                                                    <button type="submit" class="poprawa btn btn-primary btn-sm" name='kategoria' id="<?php echo $id; ?>">Poprawa</button>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                        <?php
                                        }
                                    }
                                }
                            }
                            ?>
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