var images = new Array();
var y = 1;
var side = 0;
var len = 0;
var h = 0;
$(document).ready(function() {
	//Cookie policy
	$.cookieBar({bottom: true, fixed: true});
	//Header
	if(!WURFL.is_mobile){
		$('nav').removeClass('on');
		$('.slide .image').css('top', '96px');
		adaptNav();
	}
	//Language
	$('.regions-container .regions').click(function(){
		$(this).siblings('.regions-dropdown').toggle();	
	});
	//Read more section
	var readHeight = $('.hidden').height();
	$('.hidden').css('height', '0px');
	var toggle = 0;
	$('.more').click(function(e){
		e.preventDefault(); 
		if(toggle == 0){
			toggle = 1;
			$('.hidden').animate({'opacity': 1, 'height': readHeight+'px'}, 750);
			$('.more i').addClass('roto');
		} else{
			toggle = 0;
			$('.hidden').animate({'opacity': 0, 'height': '0px'}, 750);
			$('.more i').removeClass('roto'); 
		}
	});
	//Load images
	len = $('.slide .image img').length;
	$('.slide .image img').each(function(i){
		images.push($(this).attr('src'));
		if(i != 0) $(this).remove();
		if(i == 1) $('.slide').append('<div class="image le"><img src="' + images[i] + '" /></div>');
		if(i == len-1) $('.slide').append('<div class="image ri"><img src="' + images[i] + '" /></div>');
	});
	//Set sizes
	side = ($(window).width() - 1026) / 2;
	$('.slide .left').css('width', side+'px');
	$('.slide .right').css('width', side+'px');
	$('.slide .image').not('.le').not('.ri').css('left', side+'px');
	$('.slide .le').css('left', side-1026+'px');
	$('.slide .ri').css('right', side-1026+'px');
	$(window).resize(function(){
		side = ($(window).width() - 1026) / 2;
		$('.slide .left').css('width', side+'px');
		$('.slide .right').css('width', side+'px');
		$('.slide .image').not('.le').not('.ri').css('left', side+'px');
		$('.slide .le').css('left', side-1026+'px');
		$('.slide .ri').css('right', side-1026+'px');
	});
	//Intervals
	var slideInterval = setInterval(function(){ slide(); if(y < len-1) y++; else y = 0; }, 3000);
	$('.slide .fa-angle-left').click(function(){
		clearInterval(slideInterval);
		if(y > 0) y--; else y = len-1;
		slide();	
		slideInterval = setInterval(function(){ if(y < len-1) y++; else y = 0; slide(); }, 3000);
	});
	$('.slide .fa-angle-right').click(function(){
		clearInterval(slideInterval);
		if(y < len-1) y++; else y = 0;
		slide();	
		slideInterval = setInterval(function(){ if(y < len-1) y++; else y = 0; slide(); }, 3000);
	});
	//Contact Form
	validateThis();
	//Contact map
	mapThis();
	//Scroll to sections
	if(window.mozInnerScreenX == null) var moz = 0; else var moz = 48;
	if($(window).width() <= 680) var psh = 0; else psh = 48;
	$('nav ul li a[href^="#"]').on('click',function (e) {
	    e.preventDefault();
	    var target = this.hash,
	    $target = $(target);
	    $('html, body').stop().animate({
	        'scrollTop': $target.offset().top - psh + moz
	    }, 900, 'swing', function () {
	        window.location.hash = target;
	    });
	});
	//Scroll news
	//var newsInterval = setInterval(function(){ thisNews(); }, 3000);
});
function slide(){
	var x = y - 1; if(x == -1) x = len-1;
	var z = y + 1; if(z == len) z = 0;
	oldLe = $('.slide .le');
	oldImage = $('.slide .image').not('.le').not('.ri');
	oldRi = $('.slide .ri');
	thisLe = $('<div class="image le" style="opacity:0;"><img src="' + images[x] + '" /></div>');
	thisImage = $('<div class="image" style="opacity:0;"><img src="' + images[y] + '" /></div>');
	thisRi = $('<div class="image ri" style="opacity:0;"><img src="' + images[z] + '" /></div>');
	$('.slide').append(thisLe);
	thisLe.css('left', side-1026+'px');
	$('.slide').append(thisImage);
	thisImage.css('left', side+'px');
	$('.slide').append(thisRi);
	thisRi.css('right', side-1026+'px');
	oldLe.stop().animate({'opacity': 0}, 750, function(){ $(this).remove(); });
	oldImage.stop().animate({'opacity': 0}, 750, function(){ $(this).remove(); });
	oldRi.stop().animate({'opacity': 0}, 750, function(){ $(this).remove(); });
	thisLe.stop().animate({'opacity': 1}, 750);
	thisImage.stop().animate({'opacity': 1}, 750);
	thisRi.stop().animate({'opacity': 1}, 750);
}
function validateThis(){
	$('.contactform').validate({
	  rules: {
	   name: {
		minlength: 2,
		required: true
	   },
	   email: {
		required: true,
		email: true
	   },
	   message: {
		minlength: 10,
		required: true
	   }
	  },
	  highlight: function(element) {
	   $(element).closest('.control-group').removeClass('success').addClass('error');
	  },
	  success: function(element) {
	   element.text('OK!').addClass('valid').closest('.control-group').removeClass('error').addClass('success');
	  }, 
	  submitHandler: function( form ) {
			$.ajax({
				url : 'contact.php',
				data : $('.contactform').serialize(),
				type: 'POST',
				success : function(data){
				 $('.contactform').fadeOut('slow');
				 $('.cfmessage').html(data);
				}
			})
			return false;
		 }
	  
	 });
}
function mapThis(){
	var mapCanvas = document.getElementById('gmap_canvas');
	//Default
	var latLang = new google.maps.LatLng(53.1065457, -2.4710336);
	var mapOptions = {
		center: latLang,
		zoom: 12,
		mapTypeId: google.maps.MapTypeId.ROADMAP,
		boxStyle: { 
		  width: "120px"
		  ,height: "66px"
		}
	}
	var map = new google.maps.Map(mapCanvas, mapOptions);
	var addr = '<b>Wheelwash Limited</b><br />Pyms Lane<br />Crewe, Cheshire<br />CW1 3PJ';
	var infowindow = new google.maps.InfoWindow({
		content: addr
	});
	var marker = new google.maps.Marker({
		position: latLang,
		map: map,
		title: 'Agriwash'
	});
	infowindow.open(map,marker);
	/*
	$('.contact').find('.country').click(function(e) {
		e.preventDefault();
		var sel = $(this).attr('data');
		switch (sel) { 
			case 'canada':				
				$('.contact .country').not(this).removeClass('active');
				$(this).addClass('active');
				$('.contact').find('.cname').html('Benjamin Taylor');
				$('.contact').find('.cnumber').html('Telephone<br />000 000 0000');
				$('.contact').find('.caddr').html('Address<br />' + addr);
				
				$('.contact .map').animate({'opacity': 0}, 500, function() {
					$('#gmap_canvas').empty();
					
					var latLang = new google.maps.LatLng(42.3053376, -74.0093195);
					var mapOptions = {
						center: latLang,
						zoom: 8,
						mapTypeId: google.maps.MapTypeId.ROADMAP
					}
					map = new google.maps.Map(mapCanvas, mapOptions);
					var addr = 'Manchester Metropolitan University<br />Cheshire Campus<br />Crewe Green Rd<br />CW1 5DU';
					var infowindow = new google.maps.InfoWindow({
						content: addr
					});
					var marker = new google.maps.Marker({
						position: latLang,
						map: map,
						title: 'Agriwash'
					});
					infowindow.open(map,marker);
					$('.contact .map').css({'opacity': 1});
				});
				break;
			case 'gbritain':
				$('.contact .country').not(this).removeClass('active');
				$(this).addClass('active');
				$('.contact').find('.cname').html('Benjamin J Taylor');
				$('.contact').find('.cnumber').html('Telephone<br />000 000 0000');
				$('.contact').find('.caddr').html('Address<br />' + addr);
				
				$('.contact .map').animate({'opacity': 0}, 500, function() {
					$('#gmap_canvas').empty();
					
					var latLang = new google.maps.LatLng(42.3053376, -74.0093195);
					var mapOptions = {
						center: latLang,
						zoom: 8,
						mapTypeId: google.maps.MapTypeId.ROADMAP
					}
					map = new google.maps.Map(mapCanvas, mapOptions);
					var addr = 'Manchester Metropolitan University<br />Cheshire Campus<br />Crewe Green Rd<br />CW1 5DU';
					var infowindow = new google.maps.InfoWindow({
						content: addr
					});
					var marker = new google.maps.Marker({
						position: latLang,
						map: map,
						title: 'Agriwash'
					});
					infowindow.open(map,marker);
					$('.contact .map').css({'opacity': 1});
				});
				break;
		}
	});*/
}
function thisNews(){
	if(Math.abs($('.newsection .wrap').margin().top) < $('.newsection .wrap').innerHeight()-150){
		$('.newsection .wrap').animate({'opacity': 0, 'margin-top': '-=150px'}, 500, function(){
			$(this).animate({'opacity': 1, 'margin-top': '-=150px'}, 500);
		});	
	} else {
		$('.newsection .wrap').animate({'opacity': 0, 'margin-top': '0px'}, 500, function(){
			$(this).animate({'opacity': 1}, 500);
		});	
	}
}
//Remove Console Errors
(function(){var e;var t=function(){};var n=["assert","clear","count","debug","dir","dirxml","error","exception","group","groupCollapsed","groupEnd","info","log","markTimeline","profile","profileEnd","table","time","timeEnd","timeStamp","trace","warn"];var r=n.length;var i=window.console=window.console||{};while(r--){e=n[r];if(!i[e]){i[e]=t}}})()

//Adapt Header
function adaptNav(){
	$(window).scroll(function (event) {
		if($(window).scrollTop() >= 48) $('nav').addClass('on'); else $('nav').removeClass('on');
	});
}