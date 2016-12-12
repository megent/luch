//Запрет копирования
function click(e)  
{if (document.all) {if (event.button == 2) {return false;}}  
if (document.layers) {if (e.which == 3) {return false;}}}  
if (document.layers) {document.captureEvents(Event.MOUSEDOWN);}  
document.onmousedown=click;  
function notcopy()
{return false}

$(document).ready(function() {

	//Запрет перехода по ссылке
	$("a.noclick").click(function(event) {
		event.preventDefault();
	});
	//$(".parallax").interactive_bg(); /*Вызов паралакса на главной*/
	
	$('.extlink') //обработка внешних ссылок. внешние ссылки оформлять ввиде "<span class="extlink" data-href="куда_ведет_ссылка">текст_ссылки</span>
		.click( function(){
			window.open($(this).attr("data-href"), '_blank');
		});
		
	$('.inlink') //обработка внутренних ссылок. внешние ссылки оформлять ввиде "<span class="inlink" data-href="куда_ведет_ссылка">текст_ссылки</span>
		.click( function(){
			window.open($(this).attr("data-href"), '_self');
		});
	
	$('.tube_txt').hide();
	$('.video-item').hover(
	function(){
		$(this).find('.tube_txt').stop(true, true).slideDown(200);
	},
	function(){
		$(this).find('.tube_txt').stop(true, true).delay(200).slideUp(200);
	});
	
	$('.el-show-it').hide();
	//Правые плавающие кнопки
	$('footer').after('<div class="pl-st pl-btn1 open-vform-raschet"><span>Расчет стоимости</span></div>');
	$('.pl-btn1').after('<div class="pl-st pl-btn2 open-vform-callback"><span>Заказать звонок</span></div>');
	$('.pl-btn2').after('<div class="pl-st pl-btn3"><span><a href="/vopros-otvet/">Задать вопрос</a></span></div>');
	$('.pl-btn3').after('<div class="pl-st pl-btn4 open-vform-zakaz"><span>Отправить заявку</span></div>');
	
	$('.pl-st span').hide();
	$('.pl-st').hover(
	function(){
		$(this).find('span').stop(true, true).show(200);
	},
	function(){
		$(this).find('span').stop(true, true).delay(300).hide(200);
	});
	//END//Правые плавающие кнопки
	
	//Аккардион
    /*Скрывает при загрузке все списки*/
	$('.accordion > li ul')
		.click(function(event){
			event.stopPropagation();
		})
		//.filter(':not(:active)') //не закрывать первый список
		//.not(".active")
		.filter(".active")
		.show();
	
	$('.accordion .selected').show();
		
	//$('.accordion > li, .accordion > li > ul > li').click(function(){
	$('.accordion > li').click(function(){
         if ($(this).hasClass('selected')) {
            $('.accordion > li').removeClass('selected');
        } else {
            $(this).addClass('selected');
        };
        /*Не позволяет раскрывать сразу 2 списка*/
		var selfClick = $(this).find('ul:first').is(':visible');
		if(!selfClick) {
			$(this)
				.parent()
				.find('> li ul:visible')
				.slideToggle();
                
                $('.accordion > li').removeClass('selected');
                $(this).addClass('selected');
		};
        /*Раскрывает/закрывает списки в тексте*/
		$(this)
		  .find('ul:first')
		  .stop(true, true)
		  .slideToggle();
	});
    /*END Аккардион*/
    
    /*Раскрывает отзывы слева*/
    $('.otz-cont-hide').hide();
    $('.otz-show').click(
        function(){
            var old_text = "Весь отзыв";	//Посмотреть отзыв
            var new_text = "Скрыть отзыв";	//Скрыть отзыв

            if ($('.otz-cont-hide').hasClass("selected")) {	//Если отзыв открыт, то закрываем его
                $('.otz-cont-hide').stop(false, true).slideUp(500);
                $('.otz-cont-hide').removeClass("selected");
                $(this).text(old_text);							//Пишет у кнопки - Посмотреть отзыв
            } else {
                $(this).text(new_text)
                $(this).siblings('.otz-cont-hide').stop(false, true).slideDown(500);	//Скрвает все отзывы
                $('.otz-cont-hide').addClass("selected");		//Удаляет класс открытых отзывов
            }
        }
    );
	  
    //Скрытие/раскрытие блоков по умолчанию
	if(location.href != 'http://otoplenieru.ru/#dom'){
		$('.lnk-hide').hide();
	};
	//$(".lnk-show").after('<span class="lnk-podpis">Показать</span>');
	
	$('.lnk-podpis').click(function(){ $(this).hide(); $('.lnk-hide').stop(false, true).slideDown(300); });
	
    
	//Пдключение fancybox
	if ('ontouchstart' in document.documentElement){
		$('.fancy').fancybox({
			prevEffect: 'fade',
			nextEffect: 'fade',
			helpers : {
				overlay: {
					locked: false
				}
			},
			afterShow: function() {
				$('.fancybox-outer a, .fancybox-close').removeAttr('title');
				// swipe for fancybox
				if ('ontouchstart' in document.documentElement){
					$('.fancybox-nav').css('display','none');
					$('.fancybox-wrap').swipe({
						swipe : function(event, direction) {
							if (direction === 'right' || direction === 'up') {
								$.fancybox.prev( direction );
							} else {
								$.fancybox.next( direction );
							}
						}
					});
				}
			}
		});
	} else {
		$('.fancy').fancybox({
			padding : 0,
			loop: false,
			helpers: {
				overlay: {
					locked: false
				}
			}
		});
	};
	
	$('.fancy-video').fancybox({
		openEffect  : 'none',
		closeEffect : 'none',
		helpers : {
			overlay: {
				locked: false
			},
			media : {}
		}
	});
	
	//** Подключение карусели
	$('.carusel-cert').slick({
		infinite: false,
		slidesToShow: 3,
		slidesToScroll: 1,
		variableWidth: true,
		autoplay: true,
		autoplaySpeed: 5000
	});
    $('.slider-one').slick({
		infinite: true,
		slidesToShow: 1,
		slidesToScroll: 1,
		variableWidth: true,
		autoplay: true,
		autoplaySpeed: 4000
	});
    $('.port-carusel').slick({
		infinite: true,
		slidesToShow: 1,
		slidesToScroll: 1,
		variableWidth: true,
		prevArrow: '<button type="button" data-role="none" class="port-prev" aria-label="previous"></button>',
		nextArrow: '<button type="button" data-role="none" class="port-next" aria-label="next"></button>'
		//autoplay: true,
		//autoplaySpeed: 4000
	});
	$('.carusel-otziv').slick({
		// infinite: false,
		speed: 500,
		slidesToShow: 1,
		adaptiveHeight: false,
		variableWidth: true,
		// prevArrow: '<button type="button" data-role="none" class="otz-prev" aria-label="previous">Вернуться</button>',
		nextArrow: '<button type="button" data-role="none" class="otz-next" aria-label="next">Ещё отзыв</button>',
		autoplay: true,
		autoplaySpeed: 5000
	});
	$('.otz-next').click( /*Если нажать на Еще отзыв, скрывается открытый ранее отзыв*/
        function(){
			$('.otz-cont-hide').removeClass("selected");
			$('.otz-cont-hide').slideUp(500);
			$('.otz-show').text("Весь отзыв");
		}
    );
	$('.main-akcii-carusel').slick({
		// infinite: false,
		speed: 500,
		slidesToShow: 1,
		//adaptiveHeight: true,
		//variableWidth: true,
		prevArrow: '<button type="button" data-role="none" class="akcii-prev" aria-label="previous"></button>',
		nextArrow: '<button type="button" data-role="none" class="akcii-next" aria-label="next">Следующая</button>',
		autoplay: true,
		autoplaySpeed: 5000
	});
	//**//
	
});