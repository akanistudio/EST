<?php  
/* 
Plugin Name: WP Est by Rav
Version: 0.2 
Description: Wyświetla oferty nieruchomości z użyciem szablonów Twig. 
Author: R. Wojciechowicz
Author URI: http://www.appsolution.pl/ 
Plugin URI: http://www.appsolution.pl/ 
*/  

/* Version check */  
global $wp_version;  
  
$exit_msg = ' 
WP EST by Rav requires WordPress 2.5 or newer. 
<a href="http://codex.wordpress.org/Upgrading_WordPress"> 
Please update!</a>';  
  
if (version_compare($wp_version, "2.5", "<"))  
{  
 exit($exit_msg);  
} 

/*
define( 'ACF_LITE' , true );
if(!class_exists('acf')){
	include_once('plugins/advanced-custom-fields/acf.php' );
}
if( !function_exists('acf_register_repeater_field') ){
	include_once('plugins/acf-repeater/acf-repeater.php' );
}
if( !function_exists('acfgp_register_fields') ){
	include_once('plugins/acf-gallery/acf-gallery.php');
}
if( !function_exists('register_options_page') ){
	include_once('plugins/acf-options-page/acf-options-page.php');
}*/
//Dodanie funkcjonalności ACF
//include_once('advanced-custom-fields/acf.php');
//Panel ACF niewidoczny
//define( 'ACF_LITE', true );
//Dodanie własnych pól do ACF
require_once('acf_types.php');
//dodanie własnych custom postów
require_once('post_types.php');
//obsługa załączonych plików
require_once('file_handler.php');
//Dodanie szablonów Twig
require_once('twig_init.php');
?>