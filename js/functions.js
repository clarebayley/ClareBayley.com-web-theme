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
	
	var newMargin = (windowHeight - warningHeight - headerHeight - postheaderHeight - 30) / 2;
	
	$('#warningtext').css('margin',newMargin + 'px 0');
	
	$('#nsfw-check').iphoneStyle({
		checkedLabel: 'NSFW',
		uncheckedLabel: 'SFW'
	});
	
	$('#nsfw-controls #toggle-container.noCookie').click(function(){
		showAgeCheck();
	});
	
	
	$('#nsfw-controls #toggle').click(function(){
	
	
		if ($('img.nsfw').is(':visible')){
			hideNsfw();
		}else{
			showNsfw();
		}
		
	});
	
	hideNsfw();
	
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

function showAgeCheck(){

$('body').prepend("<div id='age_check'><div id='age_check-header'>Wait a sec!</div>You're about to expose material that may be inappropriate for minors. Are you of legal age to continue?<div id='age_check-yes'>Yes, I'm over 18</div><div id='age_check-no'>No, nevermind</div></div>");

$('#age_check-no').click(function(){
	$('#age_check').remove();
});

$('#age_check-yes').click(function(){
	$('#nsfw-controls #toggle-container').off('click');
	$('#nsfw-controls #toggle').css('pointer-events','all');
	
	$('#nsfw-controls #toggle').trigger('click');
	
	$('#age_check').remove();
	
});

}

