$(document).ready(function() {

	$('.post-content').find('img').each(function() {
		var w = $(this).width();
		if(w > 640){
			$(this).css('margin-left', -((w - 640)/2) );
		}		
	});
	
});