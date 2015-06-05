jQuery(document).ready(function() {
	
	$( "#datepicker" ).datepicker();
	$( "#datepicker2" ).datepicker();
	
	$('.main_slider_left_carousel').slick({
		dots: true,
		infinite: true,
		speed: 600,
		slide: '.main_slider_left_carousel_slide',
		slidesToShow: 1,
		slidesToScroll: 1,
		touchMove: false,
		arrow: true
	});
	
	$('.main_slider_right_carousel').slick({
		dots: true,
		infinite: true,
		speed: 600,
		slide: '.main_slider_right_carousel_slide',
		slidesToShow: 1,
		slidesToScroll: 1,
		touchMove: false,
		arrow: true
	});
	
	$('.main_bl_leaders_carousel').slick({
		dots: true,
		infinite: true,
		speed: 600,
		slide: '.main_bl_leaders_carousel_slide',
		slidesToShow: 4,
		slidesToScroll: 1,
		touchMove: false,
		arrow: true
	});
	
	$('.p_about_stuff_carousel').slick({
		dots: true,
		infinite: true,
		speed: 600,
		slide: '.p_about_stuff_slide',
		slidesToShow: 3,
		slidesToScroll: 1,
		touchMove: false,
		arrow: true
	});
	
	
	$('.products_carousel').slick({
		dots: true,
		infinite: true,
		speed: 600,
		slide: '.products_slide',
		slidesToShow: 3,
		slidesToScroll: 1,
		touchMove: false,
		arrow: true
	});
	
	$('.products_carousel_two').slick({
		dots: true,
		infinite: true,
		speed: 600,
		slide: '.products_slide_two',
		slidesToShow: 3,
		slidesToScroll: 1,
		touchMove: false,
		arrow: true
	});
	
	$('.photo_carousel').slick({
		dots: true,
		infinite: true,
		speed: 600,
		slide: '.photo_slide',
		slidesToShow: 3,
		slidesToScroll: 1,
		touchMove: false,
		arrow: true
	});
	
	$('.one_pr_tab span').on('click', function(){
		
		$('.one_pr_tab').removeClass('one_pr_tab_active');
		$(this).parent().addClass('one_pr_tab_active');
		$('.one_pr_cont_active').removeClass('one_pr_cont_active');
		$('.one_pr_cont:eq(' + $(this).parent().index() + ')').addClass('one_pr_cont_active');
			
	});
	
	
});

ymaps.ready(init);
var myMap,
	myPlacemark_one;

function init(){     
	
	myMap = new ymaps.Map('YMapsID', {
		center: [55.16490551, 61.39410884],
		zoom: 15
	});
						
	myPlacemark_one = new ymaps.Placemark([55.16490551, 61.39410884], {}, {
		iconImageHref: 'img/ico_map.png',
		iconImageSize: [47, 36],
		iconImageOffset: [0,-35]
	});
	
	myMap.geoObjects.add(myPlacemark_one);
	
}




