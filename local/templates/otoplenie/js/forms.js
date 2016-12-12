$(document).ready(function() {
	//** Для страницы Вопрос-ответ
	$('.faq-otvet-item').hide();
	$('.show-otvet').click(function(){
		$(this).hide();
		$(this).siblings('.faq-otvet-item').slideDown();
	});
	
	/*$('.show-otvet').click(
		function(){
			if ($(this).siblings('.faq-otvet-item').hasClass("selected")) {	//Если ответ открыт, то закрываем его
				//$(this).siblings('.faq-otvet-item').stop(false, true).slideUp(500);
				//$(this).siblings('.faq-otvet-item').removeClass("selected");
				//$(this).text(old_text);							//Пишет у кнопки - Посмотреть ответ
				//$(this).siblings('.hide-otvet').show();
			} else {
				$('.show-otvet').show();	//Всем кнопкам посмотреть ответ
				$('.faq-otvet-item').hide();
				//$('.faq-otvet-item').stop(false, true).slideUp(500);	//Скрвает все ответы
				//$('.faq-otvet-item').removeClass("selected");		//Удаляет класс открытых ответов
				
				$(this).siblings('.faq-otvet-item').stop(false, true).slideDown(500);
				$(this).siblings('.faq-otvet-item').addClass("selected");
				$(this).hide();
				$(this).siblings('.hide-otvet').show();							//Пишет у кнопки - Скрыть ответ
			}
		}
	);*/
	
	//**для формы
		//Для чекбокса
	$('.form-wrap-check').toggle(
		function(){
			$(this).addClass('no-check');
			$(".form-style #btn-send").hide();
		}, 
		function(){
			$(this).removeClass('no-check');
			$(".form-style #btn-send").show();
		}
	);
		//для открытия всей формы
	$('.lnk-show-form').click(function(){
		$(this).hide();
		$('.lnk-hide-form').show();
		$(this).siblings('.form-separ').slideDown();
		$(this).siblings('.form-style').slideDown();
	});
		//для скрытия всей формы
	$('.lnk-hide-form').hide(); //Скрывает по умолчанию кнопку "скрыть форму"
	$('.form-separ').hide(); //Скрывает по умолчанию разделитель формы
	$('.form-style').hide(); //Скрывает по умолчанию всю форму
	$('.lnk-hide-form').click(function(){
		$(this).hide();
		$('.lnk-show-form').show();
		$(this).siblings('.form-separ').slideUp();
		$(this).siblings('.form-style').slideUp();
	});
	//**//
	
	////** Начало - Блок обработки форм **////
	
	/*Вызов формы обратного звонка*/
		//Отлавливание case 'form_call'
		$('.open-vform-callback').click(function(){
			$(".bl-forms").queue(function () { // добавим в очередь
				$('.bl-forms-wrap').empty();
				$(this).stop(true, true).slideDown(300);
				$.ajax({
					method: 'post',
					data: ({'action':'form_call'}),
					url: '/local/templates/otoplenie/ajax/callback.php',
					cache: false,
					dataType: 'html'
				}).done(function(html) {
					$('.bl-forms-wrap').html(html);
				});
			});
		});

		//Отправка полей в форму
		$(document).on('submit','form#vform-callback' , function(){
			var selection = 0;
			if($('#cf_phone').val() == ""){
				if($('#vf_fio').val() == ""){
					$('#vf_fio').addClass("error"); 
					$('.form-atten').css('display','block');
					$( "#vf_fio" ).focus();
					selection+=1;
				} else {
					$('#vf_fio').removeClass("error"); 
					$('.form-atten').hide();
				};
				if($('#vf_tel').val() == ""){ 
					$('#vf_tel').addClass("error"); 
					$('.form-atten').css('display','block'); 
					selection+=1;
				} else { 
					$('#vf_tel').removeClass("error"); 
					$('.form-atten').hide();
				};
				
				// Очистка выделения незаполненных обязательных полей
				$('input.error:empty').change(function() {
					$(this).removeClass('error');
				});

				if(!selection){
					$.ajax({
					method: 'post',
					data: ({'action':'vbtn-send','name':$('#vf_fio').val(),'phone':$('#vf_tel').val(),'url':location.href}),
					url: '/local/templates/otoplenie/ajax/callback.php',
					cache: false,
					dataType: 'html'
				}).done(function(html) {
					$('.bl-forms-wrap')
						.html(html)
						.delay(10000)
						.queue(function(next) {
							$(".bl-forms").fadeOut(300);
						});
				});
				};
			};
			return false;
		});
	/*Конец формы Обратный звонок*/
	
	/*Вызов формы Заказать расчет*/
		//Отлавливание case 'form_raschet'
		$('.open-vform-raschet').click(function(){
			$(".bl-forms").queue(function () { // добавим в очередь
				$('.bl-forms-wrap').empty();
				$(this).stop(true, true).slideDown(300);
				$.ajax({
					method: 'post',
					data: ({'action':'form_raschet'}),
					url: '/local/templates/otoplenie/ajax/raschet.php',
					cache: false,
					dataType: 'html'
				}).done(function(html) {
					$('.bl-forms-wrap').html(html);
				});
			});
		});
		
		//Отправка полей в форму
		$(document).on('submit','form#vform-raschet' , function(){
			var selection = 0;
			if($('#cf_phone').val() == ""){
				if($('#vf_fio').val() == ""){
					$('#vf_fio').addClass("error"); 
					$('.form-atten').css('display','block');
					$( "#vf_fio" ).focus();
					selection+=1;
				} else {
					$('#vf_fio').removeClass("error"); 
					$('.form-atten').hide();
				};
				if($('#vf_tel').val() == ""){ 
					$('#vf_tel').addClass("error"); 
					$('.form-atten').css('display','block'); 
					selection+=1;
				} else { 
					$('#vf_tel').removeClass("error"); 
					$('.form-atten').hide();
				};
				if($('#vf_kol').val() == ""){ 
					$('#vf_kol').addClass("error"); 
					$('.form-atten').css('display','block'); 
					selection+=1;
				} else { 
					$('#vf_kol').removeClass("error"); 
					$('.form-atten').hide();
				};
				if($('#vf_plosh').val() == ""){ 
					$('#vf_plosh').addClass("error"); 
					$('.form-atten').css('display','block'); 
					selection+=1;
				} else { 
					$('#vf_plosh').removeClass("error"); 
					$('.form-atten').hide();
				};
				
				// Очистка выделения незаполненных обязательных полей
				$('input.error:empty').change(function() {
					$(this).removeClass('error');
				});

				if(!selection){
					$.ajax({
					method: 'post',
					data: ({'action':'vbtn-send','url':location.href,'name':$('#vf_fio').val(),'phone':$('#vf_tel').val(),'kol':$('#vf_kol').val(),'plosh':$('#vf_plosh').val(),'comment':$('#vf_comment').val()}),
					url: '/local/templates/otoplenie/ajax/raschet.php',
					cache: false,
					dataType: 'html'
				}).done(function(html) {
					$('.bl-forms-wrap')
						.html(html)
						.delay(12000)
						.queue(function(next) {
							$(".bl-forms").fadeOut(300);
						});
				});
				};
			};
			return false;
		});
	/*Конец формы Заказать расчет*/
	
	/*Вызов формы Отправить заявку*/
		//Отлавливание case 'form_zakaz'
		$('.open-vform-zakaz').click(function(){
			$(".bl-forms").queue(function () { // добавим в очередь
				$('.bl-forms-wrap').empty();
				$(this).stop(true, true).slideDown(300);
				$.ajax({
					method: 'post',
					data: ({'action':'form_zakaz','tovar':$("h1").html(),'url':location.href}),
					url: '/local/templates/otoplenie/ajax/zakaz.php',
					cache: false,
					dataType: 'html'
				}).done(function(html) {
					$('.bl-forms-wrap').html(html);
				});
			});
		});
		
		//Отправка полей в форму
		$(document).on('submit','form#vform-zakaz' , function(){
			var selection = 0;
			if($('#cf_phone').val() == ""){
				if($('#vf_fio').val() == ""){
					$('#vf_fio').addClass("error"); 
					$('.form-atten').css('display','block');
					$( "#vf_fio" ).focus();
					selection+=1;
				} else {
					$('#vf_fio').removeClass("error"); 
					$('.form-atten').hide();
				};
				if($('#vf_tel').val() == ""){ 
					$('#vf_tel').addClass("error"); 
					$('.form-atten').css('display','block'); 
					selection+=1;
				} else { 
					$('#vf_tel').removeClass("error"); 
					$('.form-atten').hide();
				};
				
				// Очистка выделения незаполненных обязательных полей
				$('input.error:empty').change(function() {
					$(this).removeClass('error');
				});

				if(!selection){
					$.ajax({
					method: 'post',
					data: ({'action':'vbtn-send','url':location.href,'name':$('#vf_fio').val(),'phone':$('#vf_tel').val(),'tovar':$('#vf_tovar').val(),'comment':$('#vf_comment').val()}),
					url: '/local/templates/otoplenie/ajax/zakaz.php',
					cache: false,
					dataType: 'html'
				}).done(function(html) {
					$('.bl-forms-wrap')
						.html(html)
						.delay(12000)
						.queue(function(next) {
							$(".bl-forms").fadeOut(300);
						});
				});
				};
			};
			return false;
		});
	/*Конец формы Отправить заявку*/
	
	/*Обработка формы Задать вопрос*/
		//Отправка полей в форму
		$(document).on('submit','form#form-vopros' , function(){
			var selection = 0;
			if($('#cf_phone').val() == ""){
				if($(".form-wrap-check").is(".no-check")){
					selection+=1;
				}
				if($('#cf_fio').val() == ""){
					$('#cf_fio').addClass("error"); 
					$('.form-atten').css('display','block');
					$( "#vcf_fio" ).focus();
					selection+=1;
				} else {
					$('#cf_fio').removeClass("error"); 
					$('.form-atten').hide();
				};
				if($('#cf_mail').val() == ""){ 
					$('#cf_mail').addClass("error"); 
					$('.form-atten').css('display','block'); 
					selection+=1;
				} else { 
					$('#cf_mail').removeClass("error"); 
					$('.form-atten').hide();
				};
				if($('#cf_comm').val() == ""){ 
					$('#cf_comm').addClass("error"); 
					$('.form-atten').css('display','block'); 
					selection+=1;
				} else { 
					$('#cf_comm').removeClass("error"); 
					$('.form-atten').hide();
				};
				
				// Очистка выделения незаполненных обязательных полей
				$('input.error:empty, textarea.error:empty').change(function() {
					$(this).removeClass('error');
				});

				if(!selection){
					$.ajax({
					method: 'post',
					data: ({'action':'btn-send','name':$('#cf_fio').val(),'phone':$('#cf_mail').val(),'comment':$('#cf_comm').val()}),
					url: '/local/templates/otoplenie/ajax/vopros.php',
					cache: false,
					dataType: 'html'
				}).done(function(html) {
					$('.faq-form')
						.html(html);
						//.delay(10000)
						//.queue(function(next) {
							//$(".bl-forms").hide(300);
						//});
				});
				};
			};
			return false;
		});
	/*Конец формы Задать вопрос*/
	
	/*Обработка формы Отзывы*/
		//Отправка полей в форму
		$(document).on('submit','form#form-otziv' , function(){
			var selection = 0;
			if($('#cf_phone').val() == ""){
				if($(".form-wrap-check").is(".no-check")){
					selection+=1;
				}
				if($('#cf_fio').val() == ""){
					$('#cf_fio').addClass("error"); 
					$('.form-atten').css('display','block');
					$( "#vcf_fio" ).focus();
					selection+=1;
				} else {
					$('#cf_fio').removeClass("error"); 
					$('.form-atten').hide();
				};
				/*if($('#cf_mail').val() == ""){ 
					$('#cf_mail').addClass("error"); 
					$('.form-atten').css('display','block'); 
					selection+=1;
				} else { 
					$('#cf_mail').removeClass("error"); 
					$('.form-atten').hide();
				};*/
				if($('#cf_comm').val() == ""){ 
					$('#cf_comm').addClass("error"); 
					$('.form-atten').css('display','block'); 
					selection+=1;
				} else { 
					$('#cf_comm').removeClass("error"); 
					$('.form-atten').hide();
				};
				
				// Очистка выделения незаполненных обязательных полей
				$('input.error:empty, textarea.error:empty').change(function() {
					$(this).removeClass('error');
				});

				if(!selection){
					$.ajax({
					method: 'post',
					data: ({'action':'btn-send','name':$('#cf_fio').val(),'phone':$('#cf_mail').val(),'comment':$('#cf_comm').val()}),
					url: '/local/templates/otoplenie/ajax/otzivi.php',
					cache: false,
					dataType: 'html'
				}).done(function(html) {
					$('.otziv-form')
						.html(html);
						//.delay(10000)
						//.queue(function(next) {
							//$(".bl-forms").hide(300);
						//});
				});
				};
			};
			return false;
		});
	/*Конец формы Отзывы*/
		
	////** Конец - Блок обработки форм **////
	
});

//Закрывает форму внизу при клике вне его области
jQuery(function($){
	$(document).mouseup(function (e){ // событие клика по веб-документу
		var div = $(".bl-forms"); // тут указываем ID элемента
		if (!div.is(e.target) // если клик был не по нашему блоку
			&& div.has(e.target).length === 0) { // и не по его дочерним элементам
			div.fadeOut(300); // скрываем его
		}
	});
});