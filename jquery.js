$('document').ready(() => {


	$(window).scroll(function(){ 
		if ($(this).scrollTop() > 300) { 
			$('#myBtn').fadeIn(); 
		} else { 
			$('#myBtn').fadeOut(); 
		} 
	});
    $("#myBtn").on("click",function() {
        $("html, body").animate({scrollTop: 0}, 300);
    });

	function removeParam(key, sourceURL) {
		var rtn = sourceURL.split("?")[0],
			param,
			params_arr = [],
			queryString = (sourceURL.indexOf("?") !== -1) ? sourceURL.split("?")[1] : "";
		if (queryString !== "") {
			params_arr = queryString.split("&");
			for (var i = params_arr.length - 1; i >= 0; i -= 1) {
				param = params_arr[i].split("=")[0];
				if (param === key) {
					params_arr.splice(i, 1);
				}
			}
			if (params_arr.length) rtn = rtn + "?" + params_arr.join("&");
		}
		return rtn;
	}

	$('select[id="test_oceny"]').change(function(){
		if($(this).val() != 0) {
				let url = window.location.href;
				var alteredURL = removeParam("uczen", url);
				$('select[name="uczen"]').val("0");
				window.location.href=alteredURL+"&test="+$(this).val();
			} 
		   });
	$('select[id="uczen_oceny"]').change(function(){
		if($(this).val() != 0) {
				let url = window.location.href;
				var alteredURL = removeParam("test", url);
				$('select[name="test"]').val("0");
				window.location.href=alteredURL+"&uczen="+$(this).val();
			} 
		});
	$('select[id="Grupa_oceny"]').change(function(){
		if($(this).val() != 0) {
				let url = window.location.href;
				var alteredURL = removeParam("test", url);
				$('select[name="test"]').val("0");
				alteredURL = removeParam("uczen", alteredURL);
				alteredURL = removeParam("Grupa", alteredURL);
				alteredURL = removeParam("?", alteredURL);
				$('select[name="test"]').val("0");
				window.location.href=alteredURL+"?&Grupa="+$(this).val();
			} 
		});


	
	$('.hide').click(function() {
		var del_id= $(this).attr('id');
        var ele = $(this).parent().parent();
		if (confirm('Usunąć wiersz?')) {
        $.ajax({
			type:'POST',
			url:'script.php',
			data:{'id':del_id,
			'kategoria':"usunAjax"},
			success: function(response){
				if(response == 1){
					ele.css('background','tomato');
					ele.fadeOut(800,function(){
						$(this).remove();
					});
				}else{
					alert("zle ID")
				}
			}
		});
		}
	});

	$('.hideKategoria').click(function() {
		var del_id= $(this).attr('id');
        var ele = $(this).parent().parent();
		console.log(del_id)
		if (confirm('Usunąć Kategorie?')) {
        $.ajax({
			type:'POST',
			url:'script.php',
			data:{'id':del_id,
			'kategoria':"usunAjaxKategoria"},
			success: function(response){
				if(response == 1){
					ele.css('background','tomato');
					ele.fadeOut(800,function(){
						$(this).remove();
					});
				}else{
					alert("zle ID")
				}
			}
		});
		}
	});

	$('.hidePytanie').click(function() {
		var del_id = $(this).parent().parent().find("#id").val();
        var ele = $(this).parent().parent();
		if (confirm('Usunąć pytanie?')) {
        $.ajax({
			type:'POST',
			url:'script.php',
			data:{'id':del_id,
			'kategoria':"usunAjaxPytanie"},
			success: function(response){
				if(response == 1){
					ele.css('background','tomato');
					ele.fadeOut(800,function(){
						$(this).remove();
					});
				}else{
					alert("zle ID")
				}
			}
		});
		}
	});

	$('.hideGrupa').click(function() {
		var del_id= $(this).attr('id');
        var ele = $(this).parent().parent();
		if (confirm('Usunąć wiersz?')) {
        $.ajax({
			type:'POST',
			url:'script.php',
			data:{'id':del_id,
			'kategoria':"usunAjaxGrupa"},
			success: function(response){
				if(response == 1){
					ele.css('background','tomato');
					ele.fadeOut(800,function(){
						$(this).remove();
					});
				}else{
					alert("zle ID")
				}
			}
		});
		}
	});


	$(document).on( "click", ".edytujdane", function() {
		if (confirm('Czy edytować wiersz?')) {
        var imie = $(this).parent().parent().parent().find("#imie").text();
		var nazwisko = $(this).parent().parent().parent().find("#nazwisko").text();
		var email = $(this).parent().parent().parent().find("#email").text();
		var haslo = $(this).parent().parent().parent().find("#haslo").text();
		$(this).parent().parent().parent().find("#imie").html("<input type='text' style='width: 100%;' name='imie' id='imie' value='"+imie+"' required />");
		$(this).parent().parent().parent().find("#nazwisko").html("<input type='text' style='width: 100%;' name='nazwisko' id='nazwisko' value='"+nazwisko+"' required />");
		$(this).parent().parent().parent().find("#email").html("<input type='text' style='width: 100%;' name='email' id='email' value='"+email+"' required />");
		$(this).parent().parent().parent().find("#haslo").html("<input type='text' style='width: 100%;' name='haslo' id='haslo' value='"+haslo+"' required />");
		$(this).parent().html("<button type='submit' class='zapiszdane btn-sm btn btn-success' name='kategoria' id='zapisz'>Zapisz</button> <button type='submit' class='anulujdane btn-sm btn btn-danger' name='kategoria' id='anuluj'>Anuluj</button>");
		}
	});

	$(document).on( "click", ".anulujdane", function() {
		if (confirm('Czy anulować edycje wiersza?')) {
        var imie = $(this).parent().parent().parent().find("input[name='imie']").val();
		var nazwisko = $(this).parent().parent().parent().find("input[name='nazwisko']").val();
		var email = $(this).parent().parent().parent().find("input[name='email']").val();
		var haslo = $(this).parent().parent().parent().find("input[name='haslo']").val();
		$(this).parent().parent().parent().find("#imie").html(imie);
		$(this).parent().parent().parent().find("#nazwisko").html(nazwisko);
		$(this).parent().parent().parent().find("#email").html(email);
		$(this).parent().parent().parent().find("#haslo").html(haslo);
		$(this).parent().html("<button type='submit' class='edytujdane btn btn-warning' name='kategoria'>Edytuj</button>");
		}
	});

	$(document).on( "click", ".zapiszdane", function() {
		if (confirm('Czy zapisać edycje wiersza?')) {
		var id = $(this).parent().parent().parent().find("#id").val();
		var imie = $(this).parent().parent().parent().find("input[name='imie']").val();
		var nazwisko = $(this).parent().parent().parent().find("input[name='nazwisko']").val();
		var email = $(this).parent().parent().parent().find("input[name='email']").val();
		var haslo = $(this).parent().parent().parent().find("input[name='haslo']").val();
        $.ajax({
			type:'POST',
			url:'script.php',
			context:this,
			data:{'id':id,
			'imie':imie,
			'nazwisko':nazwisko,
			'email':email,
			'haslo':haslo,
			'kategoria':"edytujdaneAjax"},
			success: function(response){
				if(response){
					$(this).parent().parent().parent().find("#imie").html(imie);
					$(this).parent().parent().parent().find("#nazwisko").html(nazwisko);
					$(this).parent().parent().parent().find("#email").html(email);
					$(this).parent().parent().parent().find("#haslo").html(haslo);
					$(this).parent().html("<button type='submit' class='edytujdane btn btn-warning' name='kategoria'>Edytuj</button>");
				}else{
					alert("Blad");
				}
			}
		});
		}
	});




	$(document).on( "click", ".edytujPytanie", function() {
		if (confirm('Czy edytować wiersz?')) {
        var que = $(this).parent().parent().find(".pytanie").text();
		var A = $(this).parent().parent().find(".A").text();
		var B = $(this).parent().parent().find(".B").text();
		var C = $(this).parent().parent().find(".C").text();
		var D = $(this).parent().parent().find(".D").text();
		$(this).parent().parent().find(".pytanie").html("<input type='text' style='width: 100%;' name='pytanie' id='pytanie' value='"+que+"' required />");
		$(this).parent().parent().find(".A").html("<input type='text' style='width: 100px;' name='A' id='A' value='"+A+"' required />");
		$(this).parent().parent().find(".B").html("<input type='text' style='width: 100px;' name='B' id='B' value='"+B+"' required />");
		$(this).parent().parent().find(".C").html("<input type='text' style='width: 100px;' name='C' id='C' value='"+C+"' required />");
		$(this).parent().parent().find(".D").html("<input type='text' style='width: 100px;' name='D' id='D' value='"+D+"' required />");
		$(this).parent().html("<button type='submit' class='zapiszPytanie btn-sm btn btn-success' name='kategoria' id='zapisz'>Zapisz</button> <button type='submit' class='anulujPytanie btn-sm btn btn-danger' name='kategoria' id='anuluj' style='margin-top:5px;'>Anuluj</button>");
		}
	});

	$(document).on( "click", ".anulujPytanie", function() {
		if (confirm('Czy anulować edycje wiersza?')) {
		var id = $(this).parent().parent().find("#id").val();
        var que = $(this).parent().parent().find("input[name='pytanie']").val();
		var A = $(this).parent().parent().find("input[name='A']").val();
		var B = $(this).parent().parent().find("input[name='B']").val();
		var C = $(this).parent().parent().find("input[name='C']").val();
		var D = $(this).parent().parent().find("input[name='D']").val();
		$(this).parent().parent().find(".pytanie").html(que);
		$(this).parent().parent().find(".A").html(A);
		$(this).parent().parent().find(".B").html(B);
		$(this).parent().parent().find(".C").html(C);
		$(this).parent().parent().find(".D").html(D);
		$(this).parent().html("<button type='submit' class='hidePytanie btn btn-danger btn-sm' name='kategoria'>Usun</button>  <button type='submit' class='edytujPytanie btn btn-warning btn-sm' name='kategoria' id="+id+" style ='margin-top:5px'>Edytuj</button>");
		}
	});

	$(document).on( "click", ".zapiszPytanie", function() {
		if (confirm('Czy zapisać edycje wiersza?')) {
		var id = $(this).parent().parent().find("#id").val();
        var quea = $(this).parent().parent().find("input[name='pytanie']").val();
		var id_A = $(this).parent().parent().find("#A").val();
		var Aa = $(this).parent().parent().find("input[name='A']").val();
		var id_B = $(this).parent().parent().find("#B").val();
		var Ba = $(this).parent().parent().find("input[name='B']").val();
		var id_C = $(this).parent().parent().find("#C").val();
		var Ca = $(this).parent().parent().find("input[name='C']").val();
		var id_D = $(this).parent().parent().find("#D").val();
		var Da = $(this).parent().parent().find("input[name='D']").val();
        $.ajax({
			type:'POST',
			url:'script.php',
			context:this,
			data:{'id':id,
			'quea':quea,
			'id_A':id_A,
			'Aa':Aa,
			'id_B':id_B,
			'Ba':Ba,
			'id_C':id_C,
			'Ca':Ca,
			'id_D':id_D,
			'Da':Da,
			'kategoria':"edytujPytanieAjax"},
			success: function(response){
				if(response){
					$(this).parent().parent().find(".pytanie").html(quea);
					$(this).parent().parent().find(".A").html(Aa);
					$(this).parent().parent().find(".B").html(Ba);
					if(Ca == null || Ca == ""){
					}else{
						$(this).parent().parent().find(".C").html(Ca);
						if(Da == null || Da == ""){
						}else{
							$(this).parent().parent().find(".D").html(Da);
						}
					}
					$(this).parent().html("<button type='submit' class='hidePytanie btn btn-danger btn-sm' name='kategoria'>Usun</button>  <button type='submit' class='edytujPytanie btn btn-warning btn-sm' name='kategoria' id="+id+" style ='margin-top:5px'>Edytuj</button>");
					alert("Zapisano edycje");
				}else{
					alert("Blad");
				}
			}
		});
		}
	});


    $(document).on( "click", ".DodajGrupeA", function() {
		if (confirm('Czy dodać grupę?')) {
			var Nazwa = $(this).parent().parent().find("#Nazwa").val();
			var id_user = $(this).parent().parent().find("#ID_user").val();
				$.ajax({
					type:'POST',
					url:'script.php',
					context:this,
					data:{'Nazwa':Nazwa,
					'id_user':id_user,
					'kategoria':"DodajGrupeAjax"},
					success: function(response){
						var arr = $.parseJSON(response);
						if(arr.stan == 1){
							alert("Dodano pomyślnie Grupę");
                            location.reload();
						}else{
							alert("Grupa o takiej nazwie istnieje");
						}
					}
				});
		}
	});

	$('.poprawa').click(function() {
		if (confirm('Czy utworzyć poprawę testu?')){
		var uczen= $(this).attr('id');
        var test = $(this).parent().find("#test").val();
        $.ajax({
			type:'POST',
			url:'script.php',
			context:this,
			data:{'uczen':uczen,
			'test':test,
			'kategoria':"PoprawaAjax"},
			success: function(response){
				var arr = $.parseJSON(response);
					if(arr.stan == 1){
						alert("Utworzono pomyślnie poprawę "+arr.name);
                        location.reload();
					}else{
						alert("Poprawa została już utworzona");
					}
			}
		});
		}
	});

	


	$(document).on( "click", ".DodajKategorieA", function() {
		if (confirm('Czy dodać Kategorie?')) {
			var Nazwa = $(this).parent().parent().find("#Nazwa").val();
				$.ajax({
					type:'POST',
					url:'script.php',
					context:this,
					data:{'Nazwa':Nazwa,
					'kategoria':"DodajKategorieAjax"},
					success: function(response){
						var arr = $.parseJSON(response);
						if(arr.stan == 1){
							alert("Dodano pomyślnie Kategorie");
                            location.reload();
						}else{
							alert("Kategoria o takiej nazwie istnieje");
						}
					}
				});
		}
	});

		$(document).on( "click", ".DodajUczniaA", function() {
			if (confirm('Czy dodać ucznia do grupy?')) {
				var id_grupy = $(this).parent().parent().find("#Grupa").val();
				var id_ucznia = $(this).parent().parent().find("#Uczen").val();
				if(id_grupy == null || id_grupy ==0){
					alert("Wybierz grupę");
					$(this).parent().parent().find("#Grupa").css({"color": "red", "font-size": "120%"});
				}else{
					if(id_ucznia == null || id_ucznia == 0){
						alert("Wybierz ucznia");
						$(this).parent().parent().find("#Uczen").css({"color": "red", "font-size": "120%"});
					}else{
						$.ajax({
							type:'POST',
							url:'script.php',
							context:this,
							data:{'id_grupy':id_grupy,
							'id_ucznia':id_ucznia,
							'kategoria':"DodajUczniaAjax"},
							success: function(response){
								var arr = $.parseJSON(response);
								console.log(arr.stan);
								if(arr.stan == 1){
									alert("Dodano pomyślnie ucznia do grupy");
									location.reload();
								}else{
									alert("Dany uczeń znajduje się w tej grupie");
								}
							}
						});
					}
				}
					
			}
		});
		$(document).on( "click", ".DodajTestA", function() {
			if (confirm('Czy utworzyć test?')) {
				var id_kategori = $(this).parent().parent().find("#Kategoria").val();
				var id_grupy = $(this).parent().parent().find("#Grupa").val();
				var waga = $(this).parent().parent().find("#Waga").val();
				var name = $(this).parent().parent().find("#Nazwa").val();
				var ilosc = $(this).parent().parent().find("#Ilosc").val();
				if(id_kategori == null || id_kategori == 0){
					alert("Wybierz kategorie");
					$(this).parent().parent().find("#Kategoria").css({"border": "1px solid red"});
				}else{
					if(id_grupy == null || id_grupy ==0){
						alert("Wybierz grupę");
						$(this).parent().parent().find("#Grupa").css({"border": "1px solid red"});
					}else{
						if(waga == null || waga == 0){
							alert("Wybierz wage testu");
							$(this).parent().parent().find("#Waga").css({"border": "1px solid red"});
						}else{
							if(name ==""|| name ==null){
								alert("Podaj nazwe testu");
								$(this).parent().parent().find("#Nazwa").css({"border": "1px solid red"});
							}
							else{
								if(ilosc == 0 || ilosc == null){
									alert("Podaj ilosc pytań");
									$(this).parent().parent().find("#Ilosc").css({"border": "1px solid red"});
								}
								else{
									$.ajax({
										type:'POST',
										url:'script.php',
										context:this,
										data:{'id_kategori':id_kategori,
											'id_grupy':id_grupy,
											'waga':waga,
											'name':name,
											'ilosc':ilosc,
											'kategoria':"DodajTestAjax"},
											success: function(response){
												var arr = $.parseJSON(response);
												console.log(arr.stan);
												if(arr.stan == 1){
													alert("Utworzono pomyślnie test");
												}else{
													if(arr.ilosc < ilosc){
														alert("W bazie znajduje sie "+arr.ilosc+" pytań, zmien ilosc pytań w komórce");
														$(this).parent().parent().find("#Ilosc").css({"border": "1px solid red"});
													}else{alert("Test o takiej nazwie już istnieje");}
													
													
												}
											}
									});
								}
							}
							
						}
					}
				}
			}
		});
		
		
		$(document).on( "click", ".DodajPytanieA", function() {
			if (confirm('Czy dodać pytanie?')) {
				var id_kategori = $(this).parent().parent().find("#Kategoria").val();
				var ans = $(this).parent().parent().find("#Pytanie").val();
				var odpA = $(this).parent().parent().find("#odpA").val();
				var odpB = $(this).parent().parent().find("#odpB").val();
				var odpC = $(this).parent().parent().find("#odpC").val();
				var odpD = $(this).parent().parent().find("#odpD").val();
				var checked = $('input[name="Odpowiedzi"]:checked').val();
				if(id_kategori == null || id_kategori == 0){
					alert("Wybierz kategorie");
					$(this).parent().parent().find("#Kategoria").css({"border": "1px solid red"});
				}
				else{
					if(ans == "" || ans == null){
						alert("Wpisz pytanie");
						$(this).parent().parent().find("#Pytanie").css({"border": "1px solid red"});
					}else{ 
						if(odpA == "" || odpA == null || odpB == "" || odpB == null){
							alert("Wpisz minimum dwie odpowiedzi");
							$(this).parent().parent().find("#odpA").css({"border": "1px solid red"});
							$(this).parent().parent().find("#odpB").css({"border": "1px solid red"});
						}else{
							if(checked == "C" && odpC == "" || odpC == null){
								alert("Źle wybrana poprawna odpowiedź");
								$('input[name="Odpowiedzi"]:checked').prop('checked', false);
							}else{
								if(checked == "D" && odpD == "" || odpD == null){
									alert("Źle wybrana poprawna odpowiedź");
									$('input[name="Odpowiedzi"]:checked').prop('checked', false);
								}else{
									if(checked == 0 || checked == null){
										alert("Zaznacz która odpowiedź jest poprawna");
									}else{
										$.ajax({
											type:'POST',
											url:'script.php',
											context:this,
											data:{'id_kategori':id_kategori,
											'ans':ans,
											'odpA':odpA,
											'odpB':odpB,
											'odpC':odpC,
											'odpD':odpD,
											'checked':checked,
											'kategoria':"DodajPytanieAjax"},
											success: function(response){
												var arr = $.parseJSON(response);
												console.log(arr.stan);
												if(arr.stan == 1){
													alert("Dodano pomyślnie pytanie i odpowiedzi");
													location.reload();
												}else{
													alert("Blad");
												}
											}
										});
									}
									
								}
							}
						}
					}
				}	
			}
		});

		
		$(document).on( "click", ".zakonczTest", function() {
			if (confirm('Czy zakończyć test')) {
				const ilosc_pytan = $(this).parent().parent().parent().find("#ilosc_pytan").val();
				const id_testu = $(this).parent().parent().parent().find("#id_testu").val();
				const id_user = $(this).parent().parent().parent().find("#id_user").val();
				var punkty = 0;
				for(var i = 0; i<ilosc_pytan;i++){
					var nr = i +1;
					var punkt = $('input[name="Odpowiedzi'+nr+'"]:checked').val();
					punkty += parseInt(punkt);
				}
				var wynik = (punkty/ilosc_pytan)*100;
				var ocena = 0;
				if( 0 <= wynik ){
					ocena = 2;
				}
				if( 50 <= wynik ){
					ocena = 3;
				}
				if( 60 <= wynik ){
					ocena = 3.5;
				}
				if( 70 <= wynik ){
					ocena = 4;
				}
				if( 80 <= wynik){
					ocena = 4.5;
				}
				if( 90 <= wynik ){
					ocena = 5;
				}
				alert('Uzyskano '+punkty+' punktów z '+ilosc_pytan+' możliwych\nWynik wynosi : '+wynik+' ocena to '+ocena);
					$.ajax({
						type:'POST',
						url:'script.php',
						context:this,
						data:{'ilosc_pytan':ilosc_pytan,
						'id_user':id_user,
						'id_testu':id_testu,
						'punkty':punkty,
						'wynik':wynik,
						'ocena':ocena,
						'kategoria':"DodajOceneAjax"},
						success: function(response){
							var arr = $.parseJSON(response);
							if(arr.stan == 1){
								window.location.href="moje_sprawdziany.php";
							}
						}
					});
			}
		});
});