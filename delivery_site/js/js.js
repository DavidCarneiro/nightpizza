	jQuery(document).ready(function(){
		jQuery('#form').submit(function(){
			var dados = jQuery( this ).serialize();
 
			jQuery.ajax({
				type: "POST",
				url: "processa.php",
				data: dados,
				success: function( data )
				{
					$('#resultado').html(data);
				}
			});
			
			return false;
		});
	});