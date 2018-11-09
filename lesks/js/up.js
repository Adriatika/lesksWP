jQuery(function($){
	$(window).scroll(function(){
		var bottomOffset = $(window).height();
		console.log('scrollOnTop = '+ $(document).scrollTop());
		console.log('height = '+ $(document).height());
		console.log('windowHeight = '+ $(window).height());
		if($(document).scrollTop() > (0.5*bottomOffset)){
			$('.main__upArrow').addClass('arrowPosition');			
	}else if($(document).scrollTop() < (0.5*bottomOffset)){
		$('.main__upArrow').removeClass('arrowPosition');
	}
	if(($(document).scrollTop() + bottomOffset+300) > ($(document).height())){
				$('.main__upArrow').removeClass('arrowPosition');		
			}
});
});