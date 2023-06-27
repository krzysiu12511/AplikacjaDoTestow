<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "test";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

session_start();
$kategoria='';
if(isset($_POST["kategoria"])){
	$kategoria = $_POST["kategoria"];}
		
if(isset($_GET["kategoria"])){
	$kategoria = $_GET["kategoria"];}

if($kategoria == "Zaloguj"){
    $Login = $_POST["Login"];
    $Paswd = $_POST["Paswd"];
    $result = mysqli_query($conn, "SELECT ID FROM users WHERE email='$Login' AND haslo='$Paswd'");
    //$row = mysqli_fetch_array($result);
    //$id = $row['id'];
    $ile_u = mysqli_num_rows($result);
    if ($ile_u > 0){
        $result = mysqli_query($conn, "SELECT ID,Imie,nauczyciel FROM users WHERE email='$Login' AND haslo='$Paswd'");
        while ($row = mysqli_fetch_array($result)) {
            $id = $row['ID'];
            $imie = $row["Imie"];
            $nauczyciel = $row["nauczyciel"];
        }
        $_SESSION['User']=$imie;
        $_SESSION['Userid']=$id;
        $_SESSION['Nauczyciel']=$nauczyciel;
        header("location:index.php");
    } 
    else{header("location:login.php");}
}

if($kategoria == "Rejestracja"){
    $Imie = $_POST["Imie"];
    $Nazwisko = $_POST["Nazwisko"];
    $Login = $_POST["Login"];
    $Paswd = $_POST["Paswd"];
    if(isset($_POST['Nauczyciel']) && 
    $_POST['Nauczyciel'] == 'Tak') 
    {
        mysqli_query($conn, "INSERT INTO users SET Imie='$Imie', Nazwisko='$Nazwisko',email='$Login', haslo='$Paswd', Nauczyciel=1");
    }else{
        mysqli_query($conn, "INSERT INTO users SET Imie='$Imie', Nazwisko='$Nazwisko',email='$Login', haslo='$Paswd', Nauczyciel=0");
    }
    header("location:login.php");
}



//AJAX JS--------------------------------------------------------

if($kategoria == "usunAjax"){
    $id = $_POST['id'];
    mysqli_query($conn,"DELETE FROM uczen_w_grupie WHERE id_user ='$id'");
    echo 1;
}

if($kategoria == "usunAjaxGrupa"){
    $id = $_POST['id'];
    mysqli_query($conn,"DELETE FROM grupy WHERE ID ='$id'");
    mysqli_query($conn,"DELETE FROM uczen_w_grupie WHERE id_grupy ='$id'");
    echo 1;
}

if($kategoria == "usunAjaxKategoria"){
    $id = $_POST['id'];
    $result = mysqli_query($conn,"SELECT ID FROM pytania WHERE id_kategori ='$id'");
    while ($row = mysqli_fetch_assoc($result)) {
        $idp = $row["ID"];
        mysqli_query($conn,"DELETE FROM odpowiedzi WHERE id_pytania ='$idp'");
    }
    mysqli_query($conn,"DELETE FROM pytania WHERE id_kategori ='$id'");
    mysqli_query($conn,"DELETE FROM kategorie WHERE ID ='$id'");
    echo 1;
}

if($kategoria == "usunAjaxPytanie"){
    $id = $_POST['id'];
    mysqli_query($conn,"DELETE FROM odpowiedzi WHERE id_pytania ='$id'");
    mysqli_query($conn,"DELETE FROM pytania WHERE ID ='$id'");
    echo 1;
}





if($kategoria == "DodajGrupeAjax"){
    $Nazwa = $_POST["Nazwa"];
    $id_users = $_POST["id_user"];
    $result = mysqli_query($conn, "SELECT Nazwa FROM grupy WHERE Nazwa='$Nazwa'");
    $row = mysqli_fetch_array($result);
    if(!$row){
        $zapisz = mysqli_query($conn, "INSERT INTO grupy SET Nazwa='$Nazwa', id_users='$id_users'");
    }else{
        $zapisz = 0;
    }
   
    $tab = array(
        "stan" => $zapisz
    );
    echo json_encode($tab);
}

if($kategoria == "DodajKategorieAjax"){
    $Nazwa = $_POST["Nazwa"];
    $result = mysqli_query($conn, "SELECT Nazwa FROM kategorie WHERE Nazwa='$Nazwa'");
    $row = mysqli_fetch_array($result);
    if(!$row){
        $zapisz = mysqli_query($conn, "INSERT INTO kategorie SET Nazwa='$Nazwa'");
    }else{
        $zapisz = 0;
    }
   
    $tab = array(
        "stan" => $zapisz
    );
    echo json_encode($tab);
}



if($kategoria == "DodajUczniaAjax"){
    $id_grupy = $_POST["id_grupy"];
    $id_ucznia = $_POST["id_ucznia"];
    $result = mysqli_query($conn, "SELECT ID FROM uczen_w_grupie WHERE id_grupy='$id_grupy' AND id_user='$id_ucznia'");
    $row = mysqli_fetch_array($result);
    
    if(!$row){
        $zapisz = mysqli_query($conn, "INSERT INTO uczen_w_grupie SET id_grupy='$id_grupy', id_user='$id_ucznia'");
    }else{
        $zapisz = 0;
    }
    
    $tab = array(
        "stan" => $zapisz
    );
    echo json_encode($tab);
}


if($kategoria == "DodajPytanieAjax"){
    $id_kategori = $_POST["id_kategori"];
    $ans = $_POST["ans"];
    $odpA = $_POST["odpA"];
    $odpB = $_POST["odpB"];
    $odpC = $_POST["odpC"];
    $odpD = $_POST["odpD"];
    $checked = $_POST["checked"];
    
    $zapisz = mysqli_query($conn, "INSERT INTO pytania SET id_kategori='$id_kategori', pytanie='$ans'");

    $result = mysqli_query($conn, "SELECT max(ID) FROM pytania");
    $row = mysqli_fetch_row($result);
    $id = $row[0];
    
    if($checked == "A")
    {
        $result =mysqli_query($conn, "INSERT INTO odpowiedzi SET id_pytania='$id', poprawna=b'1',odpowiedz='$odpA'");
    }else{
        $result =mysqli_query($conn, "INSERT INTO odpowiedzi SET id_pytania='$id', poprawna=b'0',odpowiedz='$odpA'");
    }
    if($checked == "B")
    {
        $result =mysqli_query($conn, "INSERT INTO odpowiedzi SET id_pytania='$id', poprawna=b'1',odpowiedz='$odpB'");
    }else{
        $result =mysqli_query($conn, "INSERT INTO odpowiedzi SET id_pytania='$id', poprawna=b'0',odpowiedz='$odpB'");
    }
    if($odpC != null || $odpC != ""){
        if($checked == "C")
        {
            $result =mysqli_query($conn, "INSERT INTO odpowiedzi SET id_pytania='$id', poprawna=b'1',odpowiedz='$odpC'");
        }else{
            $result =mysqli_query($conn, "INSERT INTO odpowiedzi SET id_pytania='$id', poprawna=b'0',odpowiedz='$odpC'");
        }
    }
    if($odpD != null || $odpD != ""){
        if($checked == "D")
        {
            $result =mysqli_query($conn, "INSERT INTO odpowiedzi SET id_pytania='$id', poprawna=b'1',odpowiedz='$odpD'");
        }else{
            $result =mysqli_query($conn, "INSERT INTO odpowiedzi SET id_pytania='$id', poprawna=b'0',odpowiedz='$odpD'");
        }
    }
    
   
    $tab = array(
        "stan" => $zapisz
    );
    echo json_encode($tab);
}

if($kategoria == "edytujPytanieAjax"){
    $id = $_POST['id'];
    $quea = $_POST["quea"];
    $id_A = $_POST['id_A'];
    $A = $_POST["Aa"];
    $id_B = $_POST['id_B'];
    $B = $_POST["Ba"];
    $id_C = $_POST['id_C'];
    $C = $_POST["Ca"];
    $id_D = $_POST['id_D'];
    $D = $_POST["Da"];
    
    $zapisz = mysqli_query($conn,"UPDATE pytania SET pytanie='$quea' Where pytania.ID='$id'");
    mysqli_query($conn,"UPDATE odpowiedzi SET odpowiedz='$A' Where odpowiedzi.ID='$id_A'");
    mysqli_query($conn,"UPDATE odpowiedzi SET odpowiedz='$B' Where odpowiedzi.ID='$id_B'");
    mysqli_query($conn,"UPDATE odpowiedzi SET odpowiedz='$C' Where odpowiedzi.ID='$id_C'");
    mysqli_query($conn,"UPDATE odpowiedzi SET odpowiedz='$D' Where odpowiedzi.ID='$id_D'");
    
    echo 1;
}

if($kategoria == "edytujdaneAjax"){
    $id = $_POST['id'];
    $imie = $_POST["imie"];
    $nazwisko = $_POST['nazwisko'];
    $email = $_POST["email"];
    $haslo = $_POST['haslo'];

    $zapisz = mysqli_query($conn,"UPDATE users SET Imie='$imie',Nazwisko='$nazwisko',email='$email',haslo='$haslo' Where users.ID='$id'");
    
    echo 1;
}




if($kategoria == "PoprawaAjax"){
    $id_uczen = $_POST["uczen"];
    $id_test = $_POST["test"];

    $result = mysqli_query($conn, "SELECT Nazwa,id_kategori,waga,ilosc_pytan FROM testy WHERE ID='$id_test'");
    while ($row = mysqli_fetch_array($result)) {
        $nazwa = $row["Nazwa"];
        $id_kategori = $row["id_kategori"];
        $waga = $row["waga"];
        $ilosc = $row["ilosc_pytan"];
    }
    $name = $nazwa." poprawa";
    $pytania_array = array();
        $pytania = mysqli_query($conn, "SELECT ID FROM pytania WHERE id_kategori='$id_kategori'");
        while ($row = mysqli_fetch_assoc($pytania)) {
            $idp = $row["ID"];
            array_push($pytania_array,$idp);
        }
    $ilosc_pytan = count($pytania_array);
        if($ilosc <= $ilosc_pytan){
            $zapisz = mysqli_query($conn, "INSERT INTO testy SET Nazwa='$name', id_kategori='$id_kategori',waga='$waga',id_grupy=0,ilosc_pytan='$ilosc',id_user='$id_uczen'");
            $result = mysqli_query($conn, "SELECT ID FROM testy WHERE Nazwa='$name'");
            $row = mysqli_fetch_row($result);
            $ID_testu = $row[0];
    
            $min = 0;
            $max = $ilosc_pytan-1;
            for($i = 0;$i < $ilosc;$i++){
                $losowa = rand($min,$max);
                $id_pytania = $pytania_array[$losowa];
                mysqli_query($conn, "INSERT INTO pytanie_w_tescie SET id_testu='$ID_testu', id_pytania='$id_pytania'");
                array_splice($pytania_array, $losowa, 1);
                $max = $max -1;
            }
        }else{
            $zapisz = 0;
        }

    $tab = array(
        "stan" => $zapisz,
        "name" => $name
    );
    echo json_encode($tab);
}

if($kategoria == "DodajTestAjax"){
    $id_kategori = $_POST["id_kategori"];
    $id_grupy = $_POST["id_grupy"];
    $waga = $_POST["waga"];
    $name = $_POST["name"];
    $ilosc = $_POST["ilosc"];
    $pytania_array = array();
        $pytania = mysqli_query($conn, "SELECT ID FROM pytania WHERE id_kategori='$id_kategori'");
        while ($row = mysqli_fetch_assoc($pytania)) {
            $idp = $row["ID"];
            array_push($pytania_array,$idp);
        }
    $ilosc_pytan = count($pytania_array);
    $result = mysqli_query($conn, "SELECT ID FROM testy WHERE Nazwa='$name'");
    $row = mysqli_fetch_array($result);
    if(!$row){
        
        if($ilosc <= $ilosc_pytan){
            $zapisz = mysqli_query($conn, "INSERT INTO testy SET Nazwa='$name', id_kategori='$id_kategori',id_grupy='$id_grupy',waga='$waga',ilosc_pytan='$ilosc',id_user=0");
            $result = mysqli_query($conn, "SELECT ID FROM testy WHERE Nazwa='$name'");
            $row = mysqli_fetch_row($result);
            $ID_testu = $row[0];
    
            $min = 0;
            $max = $ilosc_pytan-1;
            for($i = 0;$i < $ilosc;$i++){
                $losowa = rand($min,$max);
                $id_pytania = $pytania_array[$losowa];
                mysqli_query($conn, "INSERT INTO pytanie_w_tescie SET id_testu='$ID_testu', id_pytania='$id_pytania'");
                array_splice($pytania_array, $losowa, 1);
                $max = $max -1;
            }
        }else{
            $zapisz = 0;
        }
        
    }else{
        $zapisz = 0;
    }
    
    
    $tab = array(
        "stan" => $zapisz,
        "ilosc" => $ilosc_pytan
    );
    echo json_encode($tab);
}

if($kategoria == "DodajOceneAjax"){
    $id_user = $_POST["id_user"];
    $id_testu = $_POST["id_testu"];
    $ilosc_pytan = $_POST["ilosc_pytan"];
    $punkty = $_POST["punkty"];
    $wynik = $_POST["wynik"];
    $ocena = $_POST["ocena"];
    $zapisz = mysqli_query($conn, "INSERT INTO ocena SET id_user='$id_user',id_testu='$id_testu',ilosc_pytan='$ilosc_pytan',punkty='$punkty',wynik='$wynik',ocena='$ocena'");
    $tab = array(
        "stan" => $zapisz
    );
    echo json_encode($tab);
}


if(isset($_GET['logout'])){
    session_destroy();
    header("location:index.php");
}
?>