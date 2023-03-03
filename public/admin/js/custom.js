$(document).ready(function(){

	//Add Product Heights
	$(".add-more-height").click(function(){ 
	  var html = $(".height-copy").html();
	  $(".after-add-more-height div.input-group:last-child").after(html);
	});
	$("body").on("click",".remove-height",function(){ 
	  $(this).parents(".height-control-group").remove();
	});

	//Add Product Width
	$(".add-more-width").click(function(){ 
	  var html = $(".width-copy").html();
	  $(".after-add-more-width div.input-group:last-child").after(html);
	});
	$("body").on("click",".remove-width",function(){ 
	  $(this).parents(".width-control-group").remove();
	});

	//Add Product length
	$(".add-more-length").click(function(){ 
	  var html = $(".length-copy").html();
	  $(".after-add-more-length div.input-group:last-child").after(html);
	});
	$("body").on("click",".remove-length",function(){ 
	  $(this).parents(".length-control-group").remove();
	});

	//Add Product thickness
	$(".add-more-thickness").click(function(){ 
	  var html = $(".thickness-copy").html();
	  $(".after-add-more-thickness div.input-group:last-child").after(html);
	});
	$("body").on("click",".remove-thickness",function(){ 
	  $(this).parents(".thickness-control-group").remove();
	});

	//Add Product size
	$(".add-more-size").click(function(){ 
	  var html = $(".size-copy").html();
	  $(".after-add-more-size div.input-group:last-child").after(html);
	});
	$("body").on("click",".remove-size",function(){ 
	  $(this).parents(".size-control-group").remove();
	});

	//Add Product color
	$(".add-more-color").click(function(){ 
	  var html = $(".color-copy").html();
	  $(".after-add-more-color div.input-group:last-child").after(html);
	});
	$("body").on("click",".remove-color",function(){ 
	  $(this).parents(".color-control-group").remove();
	});

}); 	

/*function addMoreAttribute(attributeName){
	var html = $("."+attributeName+"-copy").html();
	$(".after-add-more-"+attributeName+" div.input-group:last-child").after(html);
}

function removeAttribute(attributeName){
	$(this).parents("."+attributeName+"-control-group").remove();
}*/

function remove_prduct_image(id){
	var baseUrl = $('head base').attr('href');
	if(confirm('Are you sure to remove this product image?')){
		// AJAX request
        $.ajax({
           url: baseUrl+'/products/removeproductimage/'+id,
           type: 'get',
           dataType: 'json',
           success: function(response){
           	if(response!=null){
           		$(".remove-product-image-"+response.id).remove();
           	}
           	
           }
        });
	}
}

function remove_prduct_attribute(id,attributeName){
	var baseUrl = $('head base').attr('href');
	if(confirm('Are you sure to remove this '+attributeName+ ' attribute?')){
		//$(".remove-"+attributeName+"-"+id).remove();
		// AJAX request
        $.ajax({
           url: baseUrl+'/products/removeproductattr/'+id+'/'+attributeName,
           type: 'get',
           dataType: 'json',
           success: function(response){
           	if(response!=null){
           		$(".remove-"+response.attributeName+"-"+response.id).remove();
           	}
           	
           }
        });
	}
}


function remove_gallary_image(id){
	var baseUrl = $('head base').attr('href');
	if(confirm('Are you sure to remove this gallery image?')){
		// AJAX request
        $.ajax({
           url: baseUrl+'/gallary/removegallaryimage/'+id,
           type: 'get',
           dataType: 'json',
           success: function(response){
           	if(response!=null){
           		$(".remove-gallary-image-"+response.id).remove();
           	}
           	
           }
        });
	}
}