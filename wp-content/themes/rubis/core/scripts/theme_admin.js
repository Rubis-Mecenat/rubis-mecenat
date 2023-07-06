jQuery(document).ready(function(){
	
	jQuery("#footer-nav-page").change(function(){
		if(jQuery(this).val() == ""){
			jQuery(this).remove();
			updateFooterNavPages();
		}else{
			if(jQuery("#footer-nav-pages select").last().val() != "") addFooterNavPage();
			updateFooterNavPages();
		}
	});
	createFooterNavPages();
	
	updateCurrentForm(jQuery("#" + jQuery("#ts-current-tab").val()));
	
	jQuery(".ts-footer-widgets-layout").click(function(){
		jQuery(".ts-footer-widgets-layout").removeClass("selected");
		jQuery(this).addClass("selected");
		jQuery("#footer_widgets_layout").val(jQuery(this).attr("data-val"));
	});
	
	jQuery(".ts-theme-options-tab").click(function(){
		updateCurrentForm(this);
	});
	
	jQuery(".ts-submit").click(function(){
		jQuery("#ts-theme-options").submit();
	});
	
	jQuery('#ts-theme-options input[type=checkbox]').each(function(){
		var hi = jQuery(this).after("<input name = '" + jQuery(this).attr("name") + "' type='hidden'/>");
		jQuery(this).removeAttr("name").change(function(){
			jQuery(this).next().val(jQuery(this).is(":checked") ? "on" : "off");
		});
		jQuery(this).change();
	});
	
	jQuery('#ts-theme-options').submit(function(){
		var success = jQuery("#ts-theme-options-footer .ts-success");
		var error = jQuery("#ts-theme-options-footer .ts-error");
		var spinner = jQuery("#ts-theme-options-footer .ts-ajax-feedback");
		var data = jQuery(this).serialize();

		spinner.css("visibility" , "visible");
		success.fadeOut(0);
		error.fadeOut(0);
		jQuery.post(ajaxurl , data , function(response){
			spinner.css("visibility" , "hidden");
			if(response != 1 && response != 2){
				error.fadeIn(150);
				setTimeout(function(){
					error.fadeOut(150);
					} , 3000);
			}else{
				success.fadeIn(150);
				setTimeout(function(){
					success.fadeOut(150);
					} , 3000);
			}
		});
		return false;
	});
});

function createFooterNavPages(){
	var pages = jQuery("#footer_nav").val();
	
	if(pages){
		pages = pages.split(",");
	}else{
		return addFooterNavPage();
	}
	
	jQuery("#footer-nav-pages").empty();
	for(var i = 0 ; i < pages.length ; i++){
		addFooterNavPage(pages[i]);
	}
	addFooterNavPage();
}

function updateFooterNavPages(){
	var pages = jQuery("#footer-nav-pages select");
	var val = [];
	
	for(var i = 0 ; i < pages.size() ; i++){
		if(pages.eq(i).val() != ""){
			val.push(pages.eq(i).val());
		}
	}
	
	jQuery("#footer_nav").val(val.join(","));
}

function addFooterNavPage(index){
	var page = jQuery("#footer-nav-page").clone(true);
	if(index) page.children("option[value=" + index + "]").attr("selected" , "selected");
	page.removeAttr("id").css("margin-bottom" , "10px").appendTo(jQuery("#footer-nav-pages"));
}

function updateCurrentForm(tab){
	if(jQuery(tab).hasClass("ts-active")) return;
	
	jQuery("#ts-current-tab").val(jQuery(tab).attr("id"));
	jQuery(".ts-theme-options-tab").removeClass("ts-active");
	jQuery(tab).addClass("ts-active");
	jQuery("#" + jQuery(tab).attr("id") + "-options").fadeIn(250);
	jQuery(".ts-options-table").not("#" + jQuery(tab).attr("id") + "-options").hide();
}