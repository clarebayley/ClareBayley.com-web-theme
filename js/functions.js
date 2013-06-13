var AgeCookieName = "ClareBayleyDotComNsfwContent";

$(document).ready(function() {

	$('.nsfw').show();

	//center all images larger than post container
	$('.post-content').find('img').each(function() {
		var w = $(this).width();
		if(w > 640){
			$(this).css('margin-left', -((w - 640)/2) );
		}		
	});
	
	//set margins on NSFW warning box (only on homepage)
	if ($('#warningtext').length > 0) {
		var headerHeight = $('#header').outerHeight();
		var postheaderHeight = $('.post-header').outerHeight();
		var windowHeight = $(window).height();
		var warningHeight = $('#warningtext').outerHeight();
		
		var newMargin = (windowHeight - warningHeight - headerHeight - postheaderHeight - 30) / 2;
		$('#warningtext').css('margin',newMargin + 'px 0');
	}

	//console.log($.cookie(AgeCookieName))
	if (!$.cookie(AgeCookieName)) {
		hideNsfw();
		$('#nsfw-controls #toggle-container.noCookie').click(function(){
			showAgeCheck();
		});
	}else if ($.cookie(AgeCookieName) == "yes"){
		$('#nsfw-controls #toggle #nsfw-check').attr('checked','yes');
		enableToggle();
	}else{
		hideNsfw();
		enableToggle();
	}
	
	//initialize NSFW slider checkbox
	$('#nsfw-check').iphoneStyle({
		checkedLabel: 'NSFW',
		uncheckedLabel: 'SFW'
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
			$(this).after("<span class='sfw'>"+text+"</span>");
			$(this).hide();
		}
	});
}

function showNsfw(){
		$('.sfw').hide();
		$('.nsfw').show();
}

function enableToggle(){

	$('#nsfw-controls #toggle-container').off('click');
	$('#nsfw-controls #toggle #nsfw-check').css('pointer-events','all');

	$('#nsfw-controls #toggle #nsfw-check').removeAttr('disabled');

	$('#nsfw-controls #toggle').click(function(){

		//TODO - check cookie instead of is visible
		if ($.cookie(AgeCookieName) == "yes"){
			hideNsfw();
			$.cookie(AgeCookieName, "no", {expires: 365});
		}else{
			showNsfw();
			$.cookie(AgeCookieName, "yes", {expires: 365});
		}
		
	});
}

function showAgeCheck(){

$('body').prepend("<div id='age_check'><div id='age_check-header'>Wait a sec!</div>You're about to expose material that may be inappropriate for minors. Are you of legal age to continue?<div id='age_check-yes'>Yes, I'm over 18</div><div id='age_check-no'>No, nevermind</div></div>");

$('#age_check-no').click(function(){
	$('#age_check').remove();
});

$('#age_check-yes').click(function(){
	
	$.cookie(AgeCookieName, "no", {expires: 365});
	
	enableToggle();

	$('#nsfw-controls #toggle #nsfw-check').trigger('click');

	
	$('#age_check').remove();
	
	
	
});

}

