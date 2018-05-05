$(document).ready(function(){
	var HeaderTop = $('#BlgHederTop').offset().top;
	var viewport = $( window ).width();
	$(window).scroll(function(){
		if( $(window).scrollTop() > HeaderTop && viewport > 767) {
			$('#BlgHederTop').css({position: 'fixed', top: '0px'});
		} else {
			$('#BlgHederTop').css({position: 'static'});
		}
	})
});

$(function() {
	// при нажатии на кнопку scrollup
	$('.blgScroll').click(function() {
		// переместиться в верхнюю часть страницы
		$("html, body").animate({
			scrollTop:0
		},1000);
	})
})
// при прокрутке окна (window)
$(window).scroll(function() {
	var viewport = $(window).width();
	// если пользователь прокрутил страницу более чем на 200px
	if (($(this).scrollTop()>200 && viewport > 767) || ($(this).scrollTop()>600 && viewport <= 767)){
		// то сделать кнопку scrollup видимой
		$('.blgScroll').fadeIn();
	}
	// иначе скрыть кнопку scrollup
	else {
		$('.blgScroll').fadeOut();
	}
});

$('#BlgToltip').tooltip();

//открыть панель с цветами кнопок
var buttonIsClick = false;
$('#blgIconColor').on('click', function(event){
	if(buttonIsClick) {
		$('#blgIconStyle').css({left: '-120px'});
		buttonIsClick = false;
	} else {
		$('#blgIconStyle').css({left: 0});
		buttonIsClick = true;
	}
})

//клик на Меню
$("#blgMenu").on("click",function(){
	$('.marrow').next('.blg-submenu').slideUp();
	$(".sinmenu").next(".blg-submenu-menu").slideUp();
	$(this).next(".blg-dropdown-menu").slideToggle(500);
});

$('.marrow').on("click",function(){
	$('.marrow').not(this).next('.blg-submenu').slideUp();
	$(".sinmenu").next(".blg-submenu-menu").slideUp();
	$(this).next('.blg-submenu').stop(true, true).slideToggle(400);
	return false;
});
/************** Submenu *************/
$(".sinmenu").on("click",function(){
	$(".sinmenu").not(this).next(".blg-submenu-menu").slideUp();
	$(this).next(".blg-submenu-menu").stop(true, true).slideToggle(400);
	return false;
});

//клик на Меню
//$('#blgMenu').on('click', function(event){
//	$('#blgGeneralMenu').toggleClass('blg-dropdown-menu-hidden');
//	$('.blg-submenu').toggleClass('blg-opacity', false);
//	$('.blg-submenu-menu').toggleClass('blg-opacity', false);
//})
//
////клик на подменю
//$('.marrow').on('click', function(event){
//	$('.blg-submenu').not(this.nextElementSibling).toggleClass('blg-opacity', false);
//	$(this).next().toggleClass('blg-opacity');
//	$('.blg-submenu-menu').toggleClass('blg-opacity', false);
//})
//
////клин на подменю подменю
//$('.sinmenu').on('click', function(event){
//	$('.blg-submenu-menu').not(this.nextElementSibling).toggleClass('blg-opacity', false);
//	$(this).next().toggleClass('blg-opacity');
//})
//
//$('.carousel').carousel({
//	interval: false
//})
