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
        <?php
            $id = $_GET['id'];
            $result = mysqli_query($conn, "SELECT Nazwa FROM testy WHERE ID = '$id'");
            $row = mysqli_fetch_row($result);
            $nazwa = $row[0];
        ?>    
        <section class="py-5 gradient-custom" style="min-height:900px; padding-top:50px;">
            <div class="row d-flex justify-content-center" style="margin:20px;">
                <div class="col-12 col-sm-12 col-md-6">
                    <div class="container">
                        <div class="row">
                            <div class="col-12 col-sm-12 col-md-12">
                                <h1 class="fw-light center-text"><?php echo $nazwa?></h1>
                            </div>
                        </div>
                    </div>
                    <?php
                        $result = mysqli_query($conn, "SELECT id_pytania FROM pytanie_w_tescie WHERE id_testu = '$id'");
                        $pytania_array = array();
                        while($row = mysqli_fetch_assoc($result)){
                            $idp = $row["id_pytania"];
                            array_push($pytania_array,$idp);
                        }
                        $ilosc_pytan = count($pytania_array);
                        $min = 0;
                        $max = $ilosc_pytan-1;
                        for($i = 0; $i < $ilosc_pytan; $i++){
                            $losowa = rand($min,$max);
                            $nr = $i +1;
                    ?>
                    <div class="test pytanie<?php echo$nr ?>">
                        <div class="container">
                            <div class="row">
                                <div class="col-12 col-sm-12 col-md-12">
                                    <?php
                                    $result = mysqli_query($conn, "SELECT pytanie FROM pytania WHERE ID = '$pytania_array[$losowa]'");
                                    $row = mysqli_fetch_row($result);
                                    $nazwa = $row[0];
                                    echo $nr.".".$nazwa; ?>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 col-sm-12 col-md-12">
                                    <?php
                                    $result = mysqli_query($conn, "SELECT odpowiedz,poprawna FROM odpowiedzi WHERE id_pytania = '$pytania_array[$losowa]'");
                                    $odpowiedzi_array = array();
                                    $poprawna_array = array();
                                    while($row = mysqli_fetch_assoc($result)){
                                        array_push($odpowiedzi_array,$row["odpowiedz"]);
                                        array_push($poprawna_array,$row["poprawna"]);
                                    }
                                    $ilosc_odp = count($odpowiedzi_array);
                                    $mino = 0;
                                    $maxo = $ilosc_odp-1;
                                    for($j = 0 ; $j < $ilosc_odp;$j++){
                                        $losowao = rand($mino,$maxo);
                                        ?>
                                            <div class="col-12 col-sm-12 col-md-12"><input type="radio" id="Odpowiedzi" name="Odpowiedzi<?php echo $nr?>" value="<?php echo $poprawna_array[$losowao]?>"> <label> <?php echo $odpowiedzi_array[$losowao] ?></label></div>
                                        <?php
                                     array_splice($poprawna_array, $losowao, 1);
                                     array_splice($odpowiedzi_array, $losowao, 1);
                                     $maxo = $maxo -1;
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <?php
                    array_splice($pytania_array, $losowa, 1);
                    $max = $max -1;
                    } 
                    ?>
                    <input type="hidden" name="ilosc_pytan" id="ilosc_pytan" value="<?php echo $nr ?>">
                    <input type="hidden" name="id_testu" id="id_testu" value="<?php echo $id ?>">
                    <input type="hidden" name="id_user" id="id_user" value="<?php echo $_SESSION['Userid'] ?>">
                    <div class="row center-text">
                        <div class="col-12 col-sm-12 col-md-12">
                            <button class="btn btn-success btn-sm zakonczTest" type="submit" name="kategoria" value="Zakoncz">Prześlij Odpowiedzi</button>
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