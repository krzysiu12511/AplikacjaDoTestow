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
                            <a class="nav-link active" style="width:120px;" href="index.php">Strona główna</a>
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
                                <a class="nav-link" style="width:145px;" href="moje_sprawdziany.php">Moje sprawdziany</a>
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

        <header>
            <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
                </div>
                <div class="carousel-inner">
                <div class="carousel-item active" style="background-image: url(photo/avery-evans-OO69OocgC78-unsplash.jpg)">
                    <div class="carousel-caption">
                    <h5>Twoja szkoła on-line</h5>
                    <p></p>
                    </div>
                </div>
                <div class="carousel-item" style="background-image: url(photo/ivan-aleksic-PDRFeeDniCk-unsplash.jpg)">
                    <div class="carousel-caption">
                    <h5>Możliwość rozwoju nie wychodząc z domu !</h5>
                    <p></p>
                    </div>
                </div>
                <div class="carousel-item" style="background-image: url(photo/samantha-borges-EeS69TTPQ18-unsplash.jpg)">
                    <div class="carousel-caption">
                    <h5>Nauka u nas jest dla Ciebie bezpłatna</h5>
                    <p></p>
                    </div>
                </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
                </button>
            </div>
        </header>

        <section class="py-4 gradient-custom" style="min-height:800px;">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-sm-6 col-md-6">
                        <h1 class="fw-light">Nauka zdalna to robienie wszystkiego samemu – MIT</h1>
                    </div>
                    <div class="col-12 col-sm-6 col-md-6">
                        <p class="lead block">Najlepsze kursy i bootcampy z programowania gwarantują opiekę Mentora – osoby, która prowadzi nas krok po kroku przez program nauczania. Taka osoba to największa zaleta korzystania z ogólnodostępnych kursów online – ucząc się nowych rzeczy niejednokrotnie napotykamy ścianę. To te momenty, w których wydaje się nam, że nie ruszymy dalej. Mentor jest po to, by nas zmotywować i pokazać możliwe rozwiązania. Oczywiście jego zadaniem nie jest wbicie nam wiedzy do głowy – jeśli chcemy się czegoś nauczyć, samodzielna praca będzie niezbędna. Niezależnie czy mowa o nauce zdalnej, czy stacjonarnej.</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-sm-6 col-md-6">
                        <h1 class="fw-light">Ucząc się z domu trzeba umieć zorganizować swój czas – FAKT</h1>
                    </div>
                    <div class="col-12 col-sm-6 col-md-6">
                        <p class="lead block">Decydując się na naukę zdalną musimy zapanować nad własnym czasem. Chodząc do szkoły czy na kurs mamy narzucone konkretne godziny i miejsca, w których będziemy pracować. Jeśli wybieramy naukę przez Internet, tylko od nas zależy czy wypracujemy prawidłowe nawyki. Oczywiście wiele bootcampów ma z góry ustalone godziny wykładów czy konsultacji, ale nie oszukujmy się – jeśli przez całą kwarantannę wszystko przekładamy na potem i mamy problem z priorytetyzacją zadań, warto zastanowić się nad swoją organizacją. Na naukę zdalną sami musimy znaleźć czas, wyłuskać wolne godziny spośród natłoku obowiązków. Co oczywiście dla wielu z nas jest zaletą i głównym powodem, dla którego wybieramy uczenie się przez Internet.</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-sm-6 col-md-6">
                        <h1 class="fw-light">Nauka zdalna to dobra opcja dla matek i osób z niepełnosprawnością – FAKT</h1>
                    </div>
                    <div class="col-12 col-sm-6 col-md-6">
                        <p class="lead block">Osoby, które z jakiś powodów nie mogą wychodzić z domu lub muszą podporządkowywać swój wolny czas innym, szczególnie zyskają ucząc się zdalnie. Niesie to za sobą jeszcze jedną wielką zaletę: jeśli mogliśmy nauczyć się czegoś zdalnie, to znaczy, że zapewne w danym zawodzie też będziemy mogli zdalnie pracować.</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-sm-6 col-md-6">
                        <h1 class="fw-light">Nauka zdalna to robienie wszystkiego samemu – MIT</h1>
                    </div>
                    <div class="col-12 col-sm-6 col-md-6">
                        <p class="lead block">Najlepsze kursy i bootcampy z programowania gwarantują opiekę Mentora – osoby, która prowadzi nas krok po kroku przez program nauczania. Taka osoba to największa zaleta korzystania z ogólnodostępnych kursów online – ucząc się nowych rzeczy niejednokrotnie napotykamy ścianę. To te momenty, w których wydaje się nam, że nie ruszymy dalej. Mentor jest po to, by nas zmotywować i pokazać możliwe rozwiązania. Oczywiście jego zadaniem nie jest wbicie nam wiedzy do głowy – jeśli chcemy się czegoś nauczyć, samodzielna praca będzie niezbędna. Niezależnie czy mowa o nauce zdalnej, czy stacjonarnej.</p>
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