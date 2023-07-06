jQuery(document).ready(function($){
	/* Dlist */
	/* create the original item */
	$(".ts-dlist").each(function(){
		var original_item = $(this).children(".ts-dlist-item").first().clone();
		original_item.addClass("ts-dlist-original-item").removeClass("ts-dlist-item").hide().appendTo(this);
		updateDlist($(this));
	});
	
	$(".ts-dlist-item-add").click(function(){
		var p = $(this).closest(".ts-dlist-item");
		var list = $(this).closest(".ts-dlist");
		
		if(list.find(".ts-dlist-item").size() >= list.data("max-items")){
			var msg = list.next().html();
			if(msg) alert(msg);
			return false;
		}
		
		var original_item = list.find(".ts-dlist-original-item");
		var new_item = original_item.clone(true);
		new_item.removeClass("ts-dlist-original-item").addClass("ts-dlist-item").insertAfter(p).slideDown(450).css("opacity", 0).animate({opacity:1});
		
		$(new_item).find(".color").each(function(){
			var input = document.createElement('INPUT');
			$(input).attr("class" , $(this).attr("class"));
			new jscolor.color(input);
			$(this).after(input);
			$(this).remove();
		});
		
		updateDlist(list);
	});
	
	$(".ts-dlist-item-remove").click(function(){
		var p = $(this).closest(".ts-dlist-item");
		var list = $(this).closest(".ts-dlist");
		
		if(list.find(".ts-dlist-item").size() == 1){
			return false;
		}
		
		p.addClass("ts-red").css("opacity", 1).animate({opacity:0} , 250).slideUp(450 , function(){
			p.remove();
			updateDlist(list);
		});
	});
	
	/* Range input */
	$(":range").rangeinput();
	
	/* jQuery hide */
	$(".ts-hide").hide();
	
	/* Select by ID */
	$(".ts-select-by-id").change(function(){
		$("." + $(this).attr("id")).hide();
		$("#" + $(this).val() + "." + $(this).attr("id")).show().fadeOut(0).fadeIn(350);
	});
	$(".ts-select-by-id").change();
	
	/* File ref */
	jQuery(".ts-file-reference-button").click(function(){
		top.ts_file_caller = this;
		tb_show('', 'media-upload.php?ts-upload=true&option_image_upload=1&type=image&tab=library&TB_iframe=1&width=640&height=716');
		return false;
	});
	
	createCustomSidebars();
});

function setFileReference(url){
	top.tb_remove();
	jQuery(top.ts_file_caller).closest(".ts-option").find(".ts-file-reference-field").val(url);
	top.ts_file_caller = null;
}

function updateDlist(list){
	var children = $(list).find(".ts-dlist-item").removeClass("ts-last");
	
	if(children.size() == 1){
		children.addClass("ts-last");
	}
	
	children.each(function(i , obj){
		jQuery(obj).find(".ts-dlist-item-count span").html((i + 1) + "/" + children.size());
	});
}

function registerSidebar(obj){
	var name = jQuery("#ts-sidebar-name").val();
	if(name.length == 0) return jQuery("#ts-sidebar-name").focus();
	var id = name.toLowerCase().split(" ").join("_");
	
	for(var k = 0 ; k < name.length ; k++){
		if(!(name.charCodeAt(k) >= 48 && name.charCodeAt(k) <= 57) && !(name.charCodeAt(k) >= 65 && name.charCodeAt(k) <= 90) && !(name.charCodeAt(k) >= 97 && name.charCodeAt(k) <= 122) && name.charCodeAt(k) != 45 && name.charCodeAt(k) != 95 && name.charCodeAt(k) != 32){
			jQuery(obj).next().addClass("ts-error");
			setTimeout(function(){
				jQuery(obj).next().removeClass("ts-error");
			} , 2000);
			return jQuery("#ts-sidebar-name").focus();
		}
	}
	
	var customSidebars = jQuery("#ts_custom_sidebars").val();
	var customSidebarsList = customSidebars.split("&");
	
	for(k = 0 ; k < customSidebarsList.length ; k++){
		if(String(name).toLowerCase() == String(customSidebarsList[k].split("=")[1]).toLowerCase()){
			return alert("A sidebar named '" + name + "' already exists");
		}
	}
	
	customSidebars += (customSidebars.length > 0 ? "&" : "") + id + "=" + name;
	jQuery("#ts_custom_sidebars").val(customSidebars);
	jQuery("#ts-sidebar-name").val("");
	
	jQuery("#ts-custom-sidebars").append(jQuery(getNewCustomSidebar(id , name)).fadeIn(300));
	jQuery("#ts-custom-sidebars").next().hide().next().show();
}

function deleteSidebar(obj){
	var del = confirm("Delete '" + jQuery(obj).parent().attr("data-name") + "'?");
	if(del){
		jQuery(obj).parent().addClass("ts-red").hide(250 , function(){
			jQuery(this).remove();
			
			var val = "";
			var customSidebars = jQuery("#ts-custom-sidebars .ts-custom-sidebar");
			customSidebars.each(function(){
				val += (val ? "&" : "") + jQuery(this).attr("id").slice(3) + "=" + jQuery(this).attr("data-name");
			});
			jQuery("#ts_custom_sidebars").val(val);
			
			if(customSidebars.length == 0){
				jQuery("#ts-custom-sidebars").next().show().next().hide();
				return;
			}else{
				jQuery("#ts-custom-sidebars").next().hide().next().show();
			}
		});
	}
}

function createCustomSidebars(){
	jQuery("#ts-custom-sidebars").html("");
	var customSidebars = jQuery("#ts_custom_sidebars").val();
	
	if(!customSidebars) return;
	
	if(customSidebars.length == 0){
		jQuery("#ts-custom-sidebars").next().show().next().hide();
		return;
	}else{
		jQuery("#ts-custom-sidebars").next().hide().next().show();
	}
	
	customSidebars = customSidebars.split("&");
	var list = "";
	
	for(var k = 0 ; k < customSidebars.length ; k++){
		list += getNewCustomSidebar(customSidebars[k].split("=")[0] , customSidebars[k].split("=")[1]);
	}
	jQuery("#ts-custom-sidebars").html(list);
}

function getNewCustomSidebar(id , name){
	return "<div class = 'ts-custom-sidebar ts-round' id = 'ts-" + id + "' data-name = '" + name + "'>" + name + "<span class = 'ts-secondary-button ts-red ts-round' onclick = 'deleteSidebar(this);'>Delete</span></div>";
}