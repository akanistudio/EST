<?php

// Add Shortcode
function est_shortcode( $atts ) {

	// Attributes
	extract( shortcode_atts(
		array(
			'id' => ''
		), $atts )
	);

require_once plugin_dir_path(__FILE__) . '/twig/init.php';

$site = new OurTwigProxy();
$loader = new Twig_Loader_Filesystem(dirname(__FILE__) . '/templates');
$twig = new Twig_Environment($loader, array(
            'cache' => false
        ));

global $wp_query;

if($id!="") {

	echo file_handler($id);

	$template = get_field('twig_template',$id,false);

	$twig = new \Twig_Environment(
		new \Twig_Loader_String(),
		array('debug' => true));
	$twig->addExtension(new Twig_Extension_Debug());
	return $rendered = $twig->render(
	  $template,
	  array('site' => $site)
	);
}

}
add_shortcode( 'est', 'est_shortcode' );

/*
For $_POST variables use this :

{{ app.request.parameter.get("page") }}
For $_GET variables use this :

{{ app.request.query.get("page") }}
For $_COOKIE variables use this :

{{ app.request.cookies.get("page") }}
For $_SESSION variables use this :

{{ app.request.session.get("page") }}
*/

?>