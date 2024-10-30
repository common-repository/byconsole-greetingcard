jQuery(document).ready(function() {



	jQuery("#byconsole_cusgcard_trigger").click(function(){







					var pdf_link_Content = jQuery("#pdf_mylink").attr("href");







					jQuery("#byconsole_cusgcard_contenier").css("display", "block");  




					//alert('pdf_link_Content-'+ pdf_link_Content);


					jQuery("#byconsole_cusgcard_iframe").attr("src", pdf_link_Content)    







				}); 

 

	jQuery("input:radio[name=byconsolecusgreetcard_radio_box]").click(function() {



		var byconsolecusgreetcard_radio_box_value = jQuery(this).val();

	//alert(byconsolecusgreetcard_radio_box_value);
		var cardSplitVal = byconsolecusgreetcard_radio_box_value.split('"');
		
		console.log(cardSplitVal);

		//alert('byconsolecusgreetcard_radio_box_value-' + byconsolecusgreetcard_radio_box_value);



		jQuery("#byconsole_cusgcard_trigger").css("display","block");	



		
		var totalSrc = cardSplitVal[1];

		//jQuery("#byconsole_cusgcard_iframe").attr("src", byconsolecusgreetcard_radio_box_value);
		jQuery("#byconsole_cusgcard_iframe").attr("src", totalSrc);



			



		



		var pdf_link_Content = jQuery("#byconsole_cusgcard_iframe").attr("src");

		//alert('pdf_link_Content - '+pdf_link_Content);

	  	jQuery('#byconsolecusgreetcard_hidden_radio_box_val').val(pdf_link_Content);



	});



	jQuery(".byconsole_card_cross").click(function(){					



		jQuery("#byconsole_cusgcard_contenier").css("display" , "none");



	});



});	

  

