<?php
if(function_exists("register_field_group"))
{
	register_field_group(array (
		'id' => 'acf_est',
		'title' => 'EST',
		'fields' => array (
			array (
				'key' => 'field_55a659c2f4e10',
				'label' => 'JS i CSS',
				'name' => 'js_i_css',
				'type' => 'repeater',
				'instructions' => 'Pliki js i css, które mają być załączone do szablonu.',
				'sub_fields' => array (
					array (
						'key' => 'field_55a76e6d8ca92',
						'label' => 'Url do pliku',
						'name' => 'url_do_pliku',
						'type' => 'text',
						'column_width' => 70,
						'default_value' => '',
						'placeholder' => 'Url do pliku',
						'prepend' => '',
						'append' => '',
						'formatting' => 'none',
						'maxlength' => '',
					),
					array (
						'key' => 'field_55a6afb8db365',
						'label' => 'Typ',
						'name' => 'typ',
						'type' => 'select',
						'instructions' => 'Typ pliku',
						'column_width' => 20,
						'choices' => array (
							'JavaScript' => 'JavaScript',
							'CSS' => 'CSS',
						),
						'default_value' => 'JavaScript',
						'allow_null' => 1,
						'multiple' => 0,
					),
					array (
						'key' => 'field_55a6ae385f569',
						'label' => 'Tryb kompatybilny',
						'name' => 'tryb_kompatybilny',
						'type' => 'true_false',
						'instructions' => 'zaznacz jeśli są błędy na stronie',
						'column_width' => 10,
						'message' => '',
						'default_value' => 0,
					),
				),
				'row_min' => 0,
				'row_limit' => '',
				'layout' => 'table',
				'button_label' => 'Dodaj rząd',
			),
			array (
				'key' => 'field_55a6595cab87d',
				'label' => 'Twig template',
				'name' => 'twig_template',
				'type' => 'textarea',
				'required' => 1,
				'default_value' => '',
				'placeholder' => '',
				'maxlength' => '',
				'rows' => 20,
				'formatting' => 'none',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'est',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'normal',
			'layout' => 'no_box',
			'hide_on_screen' => array (
			),
		),
		'menu_order' => 0,
	));
}
?>