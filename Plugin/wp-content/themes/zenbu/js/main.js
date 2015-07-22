jQuery(document).ready(function(){

	// menu hover
	jQuery('.menutop li').hover(function(){
		jQuery(this).children('a').addClass('hover');
		jQuery(this).children('.sub-menu').stop().slideDown(200);
	}, function(){
		jQuery(this).children('a').removeClass('hover');
		jQuery(this).children('.sub-menu').stop().slideUp(200);
	});
	// menutopmob drop down
	jQuery('a.menuicon').click(function(eventObject) {
		eventObject.preventDefault();
	}).toggle(function(){
		jQuery(this).parents('.menu_container').addClass('hover');
		jQuery(this).parents('.menu_container').children('.menutopmob').stop().slideDown(200);
	}, function(){
		jQuery(this).parents('.menu_container').removeClass('hover');
		jQuery(this).parents('.menu_container').children('.menutopmob').stop().slideUp(200);
	});
	
	// scroll page script
	jQuery('a.scrolltop').click(function(eventObject) {
		eventObject.preventDefault();
		var anchor = jQuery(this);
		var scrollTo = jQuery(anchor.attr('href')).offset().top;
		jQuery('html, body').stop().animate({
			scrollTop: scrollTo
		}, 500);
	});
	
	// input focus
	jQuery(".searchform .search_field, .comment-form :text, .comment-form textarea, .contactform .text, .contactform .textarea").focus(function(){
		var value = jQuery(this).attr("value");
		if (value == "")
		var attrfor = jQuery(this).attr('id');
		jQuery("label[for=" + attrfor + "]").css({"display":"none"});
	});
	jQuery(".searchform .search_field, .comment-form :text, .comment-form textarea, .contactform .text, .contactform .textarea").blur(function(){
		var value = jQuery(this).attr("value");
		if (value == "")
		var attrfor = jQuery(this).attr('id');
		jQuery("label[for=" + attrfor + "]").css({"display":"block"});
	});

	// some css fix
	jQuery('.sub-menu li:first-child').addClass('first');
	
}); //Final ready