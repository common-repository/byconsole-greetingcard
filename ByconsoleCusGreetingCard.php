<?php



if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly /** 



/*



* Plugin Name: Complimentary greetings card for WooCommerce



* Plugin URI: https://www.plugins.byconsole.com/product/woocommerce-personalized-greeting-card/ 



* Description: Let your customers select a greeting card to be sent with order. 



* Version: 1.0.2



* Author: Mrinmoy Dalabar 



* Author URI: https://plugins.byconsole.com 



* Text Domain: ByConsoleCusGreeting



* Domain Path: /languages



* License: GPL2 



*/



function byconsolecusgreetingcard_add_style() {

	

	wp_enqueue_style('byconsolecusgreetingcard_stylesheet', plugins_url('css/style.css', __FILE__));

	

	}

	

add_action( 'wp_enqueue_scripts', 'byconsolecusgreetingcard_add_style' ); 



function byconsolecusgreetingcard_add_scripts() {



	wp_register_script('byconsolecusgreetingcard_preview_script', plugins_url('js/card-preview.js', __FILE__), array('jquery'),'1.12', true);



	wp_enqueue_script('byconsolecusgreetingcard_preview_script');

}







add_action('wp_enqueue_scripts', 'byconsolecusgreetingcard_add_scripts'); 



add_action( 'woocommerce_after_order_notes', 'byconsole_customer_greeting_card_field',99 );



function byconsole_customer_greeting_card_field()



{ 





?>

<div class="select_demo_card_section">

    <h3>Select your card</h3>

    <?php		



     $byconsole_greetings_card_options_array=array();



	 $checkbox_one=get_option("byconsolecusgreeting_card_one_check_box");



	 $checkbox_two=get_option("byconsolecusgreeting_card_two_check_box");



	 $checkbox_three=get_option("byconsolecusgreeting_card_three_check_box");



	 $checkbox_four=get_option("byconsolecusgreeting_card_four_check_box");



 	 $greeting_card_option_one_text=get_option("byconsolecusgreeting_card_option_one_text");



	 $greeting_card_option_one_val=get_option("byconsolecusgreeting_card_pdf_one");





	if(!empty($checkbox_one)&& !empty($greeting_card_option_one_text)  && !empty($greeting_card_option_one_val)){



	$byconsole_greetings_card_options_array[$greeting_card_option_one_val]=$greeting_card_option_one_text;



	}



	



	$greeting_card_option_two_text=get_option("byconsolecusgreeting_card_option_two_text");



	$greeting_card_option_two_val=get_option("byconsolecusgreeting_card_pdf_two");



	if(!empty($checkbox_two) && !empty($greeting_card_option_two_text)  && !empty($greeting_card_option_two_val)){



	$byconsole_greetings_card_options_array[$greeting_card_option_two_val]=$greeting_card_option_two_text;



	}



	$greeting_card_option_three_text=get_option("byconsolecusgreeting_card_option_three_text");



	$greeting_card_option_three_val=get_option("byconsolecusgreeting_card_pdf_three");



	if(!empty($checkbox_three)&& !empty($greeting_card_option_three_text)  && !empty($greeting_card_option_three_val)){



	$byconsole_greetings_card_options_array[$greeting_card_option_three_val]=$greeting_card_option_three_text;



	}



	$greeting_card_option_four_text=get_option("byconsolecusgreeting_card_option_four_text");



	$greeting_card_option_four_val=get_option("byconsolecusgreeting_card_pdf_four");



	if(!empty($checkbox_four)&& !empty($greeting_card_option_four_text)  && !empty($greeting_card_option_four_val)){



	$byconsole_greetings_card_options_array[$greeting_card_option_four_val]=$greeting_card_option_four_text;



	}



	woocommerce_form_field("byconsolecusgreetcard_radio_box", array(



	'type'              => 'radio',



	'class'             => array('byconsolecusgreetcard_radio_box'),



	'label'             => '',



	'label_class'       => 'byconsolecusgreetcard_radio_box',



	'options'           => $byconsole_greetings_card_options_array,



	));







?>



<!--<button id="byconsole_cusgcard_trigger" style="display:none;"><a href="#a">Preview</a></button>-->

<a href="#a" id="byconsole_cusgcard_trigger" style="display:none;">Preview</a>



<div id="byconsole_cusgcard_contenier" style="display:none;">



	<span class="byconsole_card_cross">X</span>



    <iframe id="byconsole_cusgcard_iframe" scrolling="auto" style="height:300px; width:483px; border:1px solid #666CCC" src=""></iframe>    



</div>



	<input type="radio" name="byconsolecusgreetcard_hidden_radio_box_val" id="byconsolecusgreetcard_hidden_radio_box_val" value="" style="display:none;" /> 



    <div id="result_text_value" style="background:#0FF;width: 100px;"></div>



</div>



<?php 

if(empty($byconsole_greetings_card_options_array)){?>



<style>	



	.select_demo_card_section{ display:none;}



</style>



<?php



	}

}



//Save the order meta with field value

add_action( 'woocommerce_checkout_update_order_meta', 'byconsolecusgeetcard_checkout_field_update_order_meta' );



function byconsolecusgeetcard_checkout_field_update_order_meta( $order_id ) {	



$byconsolecusgreetcard_radio_box = wp_kses_post($_POST['byconsolecusgreetcard_radio_box']);

$byconsolecusgreetcard_radio_box_explode = explode('"',$byconsolecusgreetcard_radio_box);

$byconsolecusgreetcard_radio_box_explode_val =$byconsolecusgreetcard_radio_box_explode['1'];



//update_post_meta( $order_id, '_byconsole_free_plugin_greeting_card_link', $_POST['byconsolecusgreetcard_radio_box'] );

update_post_meta( $order_id, '_byconsole_free_plugin_greeting_card_link', $byconsolecusgreetcard_radio_box_explode_val );



}



add_action( 'woocommerce_admin_order_data_after_shipping_address', 'byconsolecusgeetcard_checkout_field_display_admin_order_meta', 10, 1 );



function byconsolecusgeetcard_checkout_field_display_admin_order_meta($order){



	$order_id = version_compare( WC_VERSION, '3.0.0', '<' ) ? $order->id : $order->get_id();



	$card_link_to_order_page =  get_post_meta( $order_id, '_byconsole_free_plugin_greeting_card_link', true );	



	if(!empty($card_link_to_order_page)){



	echo '<p><strong>'.__('View Card').'</strong> : <a href="'.esc_url($card_link_to_order_page).'" target="_blank" >Click Here.</a>';



	}

}



//add_action( 'woocommerce_order_items_table', 'byconsolecusgeetcard_checkout_field_display_user_order_meta', 10, 1 );

add_action( 'woocommerce_order_details_after_order_table_items', 'byconsolecusgeetcard_checkout_field_display_user_order_meta', 10, 1 );



function byconsolecusgeetcard_checkout_field_display_user_order_meta($order){

	

	$order_id = version_compare( WC_VERSION, '3.0.0', '<' ) ? $order->id : $order->get_id();



	$card_link_to_order_page =  get_post_meta( $order_id, '_byconsole_free_plugin_greeting_card_link', true );	



	if(!empty($card_link_to_order_page)){



	echo '<p><strong>'.__('View Card').'</strong> : <a href="'.esc_url($card_link_to_order_page).'" target="_blank" >Click Here.</a>';



	}



}



add_action( "woocommerce_email_after_order_table", 'byconsolecusgeetcard_email_after_checkout', 10, 1);



function byconsolecusgeetcard_email_after_checkout($order ) {

	

	$order_id = version_compare( WC_VERSION, '3.0.0', '<' ) ? $order->id : $order->get_id();



	$card_link_to_order_page =  get_post_meta( $order_id, '_byconsole_free_plugin_greeting_card_link', true );	



	if(!empty($card_link_to_order_page)){



	echo '<p><strong>'.__('View Card').'</strong> : <a href="'.esc_url($card_link_to_order_page).'" target="_new">Click Here To View The Card.</a>';



	}



 }



include('inc/admin.php');



?>