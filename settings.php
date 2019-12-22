<?php 


defined( 'ABSPATH' ) or die( 'No script kiddies please!' );


	class Portfolio{

		public function __construct(){

			if(file_exists(dirname(__FILE__). "/includes/metabox/init.php")){

				require_once( dirname(__FILE__). "/includes/metabox/init.php");

			}

			if(file_exists(dirname(__FILE__). "/includes/metabox/config.php")){

				require_once( dirname(__FILE__). "/includes/metabox/config.php");

			}

			if(file_exists(dirname(__FILE__). "/index.php")){

				require_once( dirname(__FILE__). "/index.php");

			}


			add_action('init', array($this, 'ms_advance_portfolio'));


			add_action('wp_enqueue_scripts', array($this, 'ms_advance_portfolio_script_and_style'));

		}


		public function ms_advance_portfolio_script_and_style(){




			wp_enqueue_style('ms_portfolio_fontawesome',PLUGINS_URL('assets/css/fontawesome-all.min.css',__FILE__));
			wp_enqueue_style('ms_portfolio_carousel',PLUGINS_URL('assets/css/owl.carousel.min.css',__FILE__));
			wp_enqueue_style('ms_portfolio_default',PLUGINS_URL('assets/css/owl.theme.default.min.css',__FILE__));
			wp_enqueue_style('ms_portfolio_bootstrap',PLUGINS_URL('assets/css/bootstrap.min.css',__FILE__));
			wp_enqueue_style('ms_portfolio_grid',PLUGINS_URL('assets/css/bootstrap-grid.min.css',__FILE__));
			wp_enqueue_style('ms_portfolio_reboot',PLUGINS_URL('assets/css/bootstrap-reboot.min.css',__FILE__));
			wp_enqueue_style('ms_portfolio_bootstrap.map',PLUGINS_URL('assets/css/bootstrap.min.css.map',__FILE__));
			wp_enqueue_style('ms_portfolio_magnific',PLUGINS_URL('assets/css/magnific-popup.css',__FILE__));
			wp_enqueue_style('ms_portfolio_main',PLUGINS_URL('assets/css/main.css',__FILE__));



			wp_enqueue_script('ms_portfolio_magnific',PLUGINS_URL('assets/js/jquery.magnific-popup.min.js',__FILE__), array('jquery'));
			wp_enqueue_script('ms_portfolio_bootstrap',PLUGINS_URL('assets/js/bootstrap.min.js',__FILE__), array('jquery'));
			wp_enqueue_script('ms_portfolio_bootstrap.bundle',PLUGINS_URL('assets/js/bootstrap.bundle.min.js',__FILE__), array('jquery'));
			wp_enqueue_script('ms_portfolio_carousel',PLUGINS_URL('assets/js/owl.carousel.min.js',__FILE__), array('jquery'));
			wp_enqueue_script('ms_portfolio_mixitup',PLUGINS_URL('assets/js/mixitup.min.js',__FILE__), array('jquery'));
			wp_enqueue_script('ms_portfolio_script',PLUGINS_URL('assets/js/script.js',__FILE__), array('jquery'));





			

		}

		public function ms_advance_portfolio(){

				$labels = array(
					'name'               => __( 'Portfolio', 'msportfolio' ),
					'singular_name'      => __( 'Portfolio', 'msportfolio' ),
					'menu_name'          => __( 'Portfolio', 'msportfolio' ),
					'name_admin_bar'     => __( 'Portfolio', 'msportfolio' ),
					'add_new'            => __( 'Add Portfolio', 'msportfolio' ),
					'add_new_item'       => __( 'Add New Portfolio', 'msportfolio' ),
					'new_item'           => __( 'New Portfolio', 'msportfolio' ),
					'edit_item'          => __( 'Edit Portfolio', 'msportfolio' ),
					'view_item'          => __( 'View Portfolio', 'msportfolio' ),
					'all_items'          => __( 'All Portfolio', 'msportfolio' ),
					'search_items'       => __( 'Search Portfolio', 'msportfolio' ),
					'parent_item_colon'  => __( 'Parent Portfolio:', 'msportfolio' ),
					'not_found'          => __( 'No Portfolio found.', 'msportfolio' ),
					'not_found_in_trash' => __( 'No Portfolio found in Trash.', 'msportfolio' )
				);

				$args = array(
					'labels'             => $labels,
					'description'        => __( 'Description.', 'msportfolio' ),
					'public'             => true,
					'publicly_queryable' => true,
					'show_ui'            => true,
					'show_in_menu'       => true,
					'query_var'          => true,
					'rewrite'            => array( 'slug' => 'Portfolio' ),
					'capability_type'    => 'post',
					'has_archive'        => true,
					'hierarchical'       => false,
					'menu_position'      => null,
					'menu_icon'      	 => 'dashicons-schedule',
					'supports'           => array( 'title','thumbnail' )
				);

				register_post_type( 'ms_portfolio', $args );



				$label = array(
					'name'              => _x( 'Category', 'msportfolio' ),
					'singular_name'     => _x( 'Category', 'msportfolio' ),
					'search_items'      => __( 'Search Category', 'msportfolio' ),
					'all_items'         => __( 'All Categories', 'msportfolio' ),
					'parent_item'       => __( 'Parent Category', 'msportfolio' ),
					'parent_item_colon' => __( 'Parent Category:', 'msportfolio' ),
					'edit_item'         => __( 'Edit Category', 'msportfolio' ),
					'update_item'       => __( 'Update Category', 'msportfolio' ),
					'add_new_item'      => __( 'Add New Category', 'msportfolio' ),
					'new_item_name'     => __( 'New Category Name', 'msportfolio' ),
					'menu_name'         => __( 'Category', 'msportfolio' ),
				);

				$arg = array(
					'hierarchical'      => true,
					'labels'            => $label,
					'show_ui'           => true,
					'show_admin_column' => true,
					'query_var'         => true,
					'rewrite'           => array( 'slug' => 'portfolio-category' ),
				);

				register_taxonomy( 'portfolio_category', array( 'ms_portfolio' ), $arg );


			}



		


			

	}

	$portfolio = new Portfolio();


	
	

