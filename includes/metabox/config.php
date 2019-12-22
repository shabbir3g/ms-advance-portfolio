<?php 


add_action( 'cmb2_admin_init', 'ms_advance_portfolio_metabox' );

function ms_advance_portfolio_metabox(){

	$prefix = "_pref_";

	$cmb_demo = new_cmb2_box( array(
		'id'            => 'portfolio_options',
		'title'         => esc_html__( 'MS Advance Portfolio Options', 'msportfolio' ),
		'object_types'  => array( 'ms_portfolio' ), // Post type
		
	) );

	$cmb_demo->add_field( array(
		'name'       => esc_html__( 'Provided Service', 'msportfolio' ),
		'desc'       => esc_html__( 'You can add provided service here', 'msportfolio' ),
		'id'         => $prefix.'provided_service',
		'type'       => 'text'
	) );

	$cmb_demo->add_field( array(
		'name'       => esc_html__( 'Client Name', 'msportfolio' ),
		'desc'       => esc_html__( 'You can add Client Name here', 'msportfolio' ),
		'id'         => $prefix.'client_name',
		'type'       => 'text'
	) );

	$cmb_demo->add_field( array(
		'name'       => esc_html__( 'Protfolio Images', 'msportfolio' ),
		'desc'       => esc_html__( 'You can add Protfolio Images here', 'msportfolio' ),
		'id'         => $prefix.'portfolio_images',
		'type'       => 'file_list'
	) );

	$cmb_demo->add_field( array(
		'name'       => esc_html__( 'Portfolio Description', 'msportfolio' ),
		'desc'       => esc_html__( 'You can add Portfolio Description here', 'msportfolio' ),
		'id'         => $prefix.'portfolio_description',
		'type'       => 'wysiwyg'
	) );

}