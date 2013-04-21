$(document).ready(function() {

	$('.post-content').find('img').each(function() {
		var w = $(this).width();
		if(w > 640){
			$(this).css('margin-left', -((w - 640)/2) );
		}		
	});
	
	var headerHeight = $('#header').outerHeight();
	var postheaderHeight = $('.post-header').outerHeight();
	var windowHeight = $(window).height();
	var warningHeight = $('#warningtext').outerHeight();
	
	var newMargin = (windowHeight - warningHeight - headerHeight - postheaderHeight - 25) / 2;
	
	$('#warningtext').css('margin',newMargin + 'px 0');
	
	$('#nsfw-check').iphoneStyle({
		checkedLabel: 'NSFW',
		uncheckedLabel: 'SFW'
	});
	
	$('#nsfw-controls #toggle').click(function(){
		if ($('img.nsfw').is(':visible')){
			hideNsfw();
		}else{
			showNsfw();
		}
	});
	
});


function hideNsfw(){
	$('img.nsfw').each(function(){
		if($(this).next().hasClass('sfw')){
			$(this).next().show();
			$(this).hide();
		}else{
			var h = $(this).outerHeight();
			var w = $(this).outerWidth();
			$(this).after("<img style='width:"+w+"px; height:"+h+"px; background-color:#000;' class='sfw' />")
			$(this).hide();
		}
	});
	
	$('a.nsfw').each(function(){
		$(this).hide();	
		if($(this).next().hasClass('sfw')){
			$(this).next().show();
			$(this).hide();
		}else{
			var text = $(this).text();
			$(this).after("<span class='sfw'>"+text+"</span>")
			$(this).hide();
		}
	});
}

function showNsfw(){
		$('.sfw').hide();
		$('.nsfw').show();
}