<?php

// add mmenu

add_action('admin_menu','byconsole_cus_greeting_add_plugin_menu');

function byconsole_cus_greeting_add_plugin_menu(){

	add_menu_page( 'ByConsole Cus Greeting', 'ByConsole Cus Greeting', 'manage_options', 'byconsole_cus_greeting_settings', 'byconsole_cus_greeting_admin_general_settings_form' );

	}

		function byconsole_cus_greeting_admin_general_settings_form()

	{

		?>

			<div class="wrap">

			<h1>ByConsole Cus Greeting Settings Pannel</h1>

             <div class="" style="width:20%; float:right;">

            <input type="button" value="Get Pro version" onClick="getproFunction()"  id="byconsolecusgreeting_get_pro_version" style="background-color:#ffa500; color:#fff; font-size:18px; cursor: pointer;"/>

			<style>

			#byconsolecusgreeting_get_pro_version:hover{background-color:#fff !important; color:#ffa500 !important; border:1px solid #ffa500;}

            </style>

            <div class="">

            <ul>

            <li><?php echo __('Get pro version and let your customers to create greeting card with their own name, images and , message:','ByConsoleCusGreeting');?><li>

            <li><?php echo __('1)Let your customers to create greeting card with following options:','ByConsoleCusGreeting');?></li>

            <li><?php echo __('-Sender Name','ByConsoleCusGreeting');?></li>

            <li><?php echo __('-Receiver Name','ByConsoleCusGreeting');?></li>

            <li><?php echo __('-Sender image','ByConsoleCusGreeting');?></li>

            <li><?php echo __('-Receiver image','ByConsoleCusGreeting');?></li>

            <li><?php echo __('-Card message texts','ByConsoleCusGreeting');?></li>

            <li><?php echo __('-Card message texts alignment','ByConsoleCusGreeting');?></li>

            <li><?php echo __('-Card message texts font size','ByConsoleCusGreeting');?></li>

            <li><?php echo __('-Highlight sender name with color','ByConsoleCusGreeting');?></li>

            <li><?php echo __('-Highlight receiver name with color','ByConsoleCusGreeting');?></li>

            <li><?php echo __('2) Option to preview of the newly created greeting card / gift message.','ByConsoleCusGreeting');?></li>

			<li><?php echo __('3) Customers can create the greeting card with a number of combination of contents, image, colors and font size but the last one will be passed along with the order details.','ByConsoleCusGreeting');?></li>

            <li><?php echo __('4) Greeting card will be given in pdf format on order details page for both admin and customer as well as in both order mail too.','ByConsoleCusGreeting');?></li>

            </ul>

            </div>

            <input type="button" value="Get Pro version" onClick="getproFunction()"  id="byconsolecusgreeting_get_pro_version" style="background-color:#ffa500; color:#fff; font-size:18px; cursor: pointer;"/>

 </div>

 <script>

 function getproFunction() {

 window.open("https://www.plugins.byconsole.com/product/woocommerce-personalized-greeting-card/");

   }

  </script>

<div class="" style="width:80%; float:left;">

				<form method="post" class="form_theme_panal" action="options.php">

				<?php

					settings_fields("byconsolecusgreetingsection");

					do_settings_sections("byconsole-cus-greeting-options");      

					submit_button(); 

				?>          

			</form>

            </div>

			</div>

		<?php

	}


function byconsolecusgreeting_card_option_text()

 {

?>

 <input type="text" name="byconsolecusgreeting_card_option_text" id="byconsolecusgreeting_card_option_text" style="width:30%; padding:7px;" value="<?php printf( __('%s','ByConsole'),get_option('byconsolecusgreeting_card_option_text')); ?>" />	

<?php }


function byconsolecusgreeting_card_option_one()

 {

	 $byconsolecusgreeting_card_one_check_box_val=get_option('byconsolecusgreeting_card_one_check_box');	

?>

<input type="checkbox" value="yes" name="byconsolecusgreeting_card_one_check_box" <?php if($byconsolecusgreeting_card_one_check_box_val == 'yes') { ?> checked="checked" <?php }?>   />

<label>Enabled</label>


<br /><br />

<input type="text" name="byconsolecusgreeting_card_option_one_text" id="byconsolecusgreeting_card_option_one_text" style="width:30%; padding:7px;" value="<?php printf( __('%s','ByConsole'),get_option('byconsolecusgreeting_card_option_one_text')); ?>" />	

<label>(Card Type ie; Birthday wish/Thanks giving/marriage anniversary.... )</label>

<br /><br />

<label>Card one</label> &nbsp <label style="color:grey">(*Please put different file URL for each type of card)</label> &nbsp <label style="color:red">(*Please put only source file full URL, ie; http://your-awesome-site.tld/wp-content/uploads/2017/04/xxxx.pdf )</label>

<?php

 $onecard_editor = array(    

'wpautop' => true,

'textarea_rows' => '4',

'textarea_name' => 'byconsolecusgreeting_card_pdf_one',

'media_buttons' => true,

'editor_class' => 'required editorMCE',

'quicktags' => true); 

$onecard_id = "card_pdf_one";

wp_editor(get_option('byconsolecusgreeting_card_pdf_one'), $onecard_id,$settings = $onecard_editor);  

}


function byconsolecusgreeting_card_option_two()

 {

	 $byconsolecusgreeting_card_two_check_box_val=get_option('byconsolecusgreeting_card_two_check_box');	

?>

<input type="checkbox" value="yes" name="byconsolecusgreeting_card_two_check_box" <?php if($byconsolecusgreeting_card_two_check_box_val == 'yes') { ?> checked="checked" <?php }?>   />

<label>Enabled</label>

<br /><br />

<input type="text" name="byconsolecusgreeting_card_option_two_text" id="byconsolecusgreeting_card_option_two_text" style="width:30%; padding:7px;" value="<?php printf( __('%s','ByConsole'),get_option('byconsolecusgreeting_card_option_two_text')); ?>" />	

<label>(Card Type ie; Birthday wish/Thanks giving/marriage anniversary....)</label>

<br /><br />

<label>Card two</label>  &nbsp <label style="color:grey">(*Please put different file URL for each type of card)</label> &nbsp <label style="color:red">(*Please put only source file full URL, ie; http://your-awesome-site.tld/wp-content/uploads/2017/04/xxxx.pdf )</label>

<?php

$cardtwo_editor = array(    

'wpautop' => true,

'textarea_rows' => '4',

'textarea_name' => 'byconsolecusgreeting_card_pdf_two',

'media_buttons' => true,

'editor_class' => 'required editorMCEE',

'quicktags' => true); 

$twocard_id = "card_pdf_two";

wp_editor(get_option('byconsolecusgreeting_card_pdf_two'), $twocard_id,$settings = $cardtwo_editor);  

}


function byconsolecusgreeting_card_option_three()

 {

	 $byconsolecusgreeting_card_three_check_box_val=get_option('byconsolecusgreeting_card_three_check_box');	

?>

<input type="checkbox" value="yes" name="byconsolecusgreeting_card_three_check_box" <?php if($byconsolecusgreeting_card_three_check_box_val == 'yes') { ?> checked="checked" <?php }?>   />

<label>Enabled</label>

<br /><br />

<input type="text" name="byconsolecusgreeting_card_option_three_text" id="byconsolecusgreeting_card_option_three_text" style="width:30%; padding:7px;" value="<?php printf( __('%s','ByConsole'),get_option('byconsolecusgreeting_card_option_three_text')); ?>" />	

<label>(Card Type ie; Birthday wish/Thanks giving/marriage anniversary....)</label>

<br /><br />

<label>Card three</label> &nbsp <label style="color:grey">(*Please put different file URL for each type of card)</label> &nbsp <label style="color:red">(*Please put only source file full URL, ie; http://your-awesome-site.tld/wp-content/uploads/2017/04/xxxx.pdf )</label>

<?php

$cardthree_editor = array(    

'wpautop' => true,

'textarea_rows' => '4',

'textarea_name' => 'byconsolecusgreeting_card_pdf_three',

'media_buttons' => true,

'editor_class' => 'required editorMCEE',

'quicktags' => true); 

$threecard_id = "card_pdf_three";

wp_editor(get_option('byconsolecusgreeting_card_pdf_three'), $threecard_id,$settings = $cardthree_editor);  

}


function byconsolecusgreeting_card_option_four()

 {

	 $byconsolecusgreeting_card_four_check_box_val=get_option('byconsolecusgreeting_card_four_check_box');	

?>

<input type="checkbox" value="yes" name="byconsolecusgreeting_card_four_check_box" <?php if($byconsolecusgreeting_card_four_check_box_val == 'yes') { ?> checked="checked" <?php }?>   />

<label>Enabled</label>

<br /><br />

<input type="text" name="byconsolecusgreeting_card_option_four_text" id="byconsolecusgreeting_card_option_four_text" style="width:30%; padding:7px;" value="<?php printf( __('%s','ByConsole'),get_option('byconsolecusgreeting_card_option_four_text')); ?>" />	

<label>(Card Type ie; Birthday wish/Thanks giving/marriage anniversary....)</label>

<br /><br />

<label>Card four</label> &nbsp <label style="color:grey">(*Please put different file URL for each type of card)</label> &nbsp <label style="color:red">(*Please put only source file full URL, ie; http://your-awesome-site.tld/wp-content/uploads/2017/04/xxxx.pdf)</label>

<?php

$cardfour_editor = array(    

'wpautop' => true,

'textarea_rows' => '4',

'textarea_name' => 'byconsolecusgreeting_card_pdf_four',

'media_buttons' => true,

'editor_class' => 'required editorMCEE',

'quicktags' => true); 

$fourcard_id = "card_pdf_four";

wp_editor(get_option('byconsolecusgreeting_card_pdf_four'), $fourcard_id,$settings = $cardfour_editor);  

}

add_action('admin_init', 'Byconsole_cus_greeting_plugin_settings_fields');

function Byconsole_cus_greeting_plugin_settings_fields()

	{

	add_settings_section("byconsolecusgreetingsection", "All Settings", null, "byconsole-cus-greeting-options");

	add_settings_field("byconsolecusgreeting_card_option_text", "Card option label :", "byconsolecusgreeting_card_option_text", "byconsole-cus-greeting-options", "byconsolecusgreetingsection");

	add_settings_field("byconsolecusgreeting_card_option_one", "Greeting card option one :", "byconsolecusgreeting_card_option_one", "byconsole-cus-greeting-options", "byconsolecusgreetingsection");

	add_settings_field("byconsolecusgreeting_card_option_two", "Greeting card option two :", "byconsolecusgreeting_card_option_two", "byconsole-cus-greeting-options", "byconsolecusgreetingsection");

	add_settings_field("byconsolecusgreeting_card_option_three", "Greeting card option three :", "byconsolecusgreeting_card_option_three", "byconsole-cus-greeting-options", "byconsolecusgreetingsection");

	add_settings_field("byconsolecusgreeting_card_option_four", "Greeting card option four :", "byconsolecusgreeting_card_option_four", "byconsole-cus-greeting-options", "byconsolecusgreetingsection");


    register_setting("byconsolecusgreetingsection", "byconsolecusgreeting_card_option_text");

	register_setting("byconsolecusgreetingsection", "byconsolecusgreeting_card_one_check_box");

	register_setting("byconsolecusgreetingsection", "byconsolecusgreeting_card_option_one_text");

	register_setting("byconsolecusgreetingsection", "byconsolecusgreeting_card_pdf_one");

	register_setting("byconsolecusgreetingsection", "byconsolecusgreeting_card_two_check_box");

	register_setting("byconsolecusgreetingsection", "byconsolecusgreeting_card_option_two_text");

	register_setting("byconsolecusgreetingsection", "byconsolecusgreeting_card_pdf_two");

	register_setting("byconsolecusgreetingsection", "byconsolecusgreeting_card_three_check_box");

	register_setting("byconsolecusgreetingsection", "byconsolecusgreeting_card_option_three_text");

	register_setting("byconsolecusgreetingsection", "byconsolecusgreeting_card_pdf_three");

	register_setting("byconsolecusgreetingsection", "byconsolecusgreeting_card_four_check_box");

	register_setting("byconsolecusgreetingsection", "byconsolecusgreeting_card_option_four_text");

	register_setting("byconsolecusgreetingsection", "byconsolecusgreeting_card_pdf_four");


	}

?>