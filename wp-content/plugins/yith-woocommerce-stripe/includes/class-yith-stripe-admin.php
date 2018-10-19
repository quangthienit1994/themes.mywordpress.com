<?php
/**
 * Main class
 *
 * @author Your Inspiration Themes
 * @package YITH WooCommerce Stripe
 * @version 1.0.0
 */

if ( ! defined( 'YITH_WCSTRIPE' ) ) {
	exit;
} // Exit if accessed directly

if( ! class_exists( 'YITH_WCStripe_Admin' ) ){
	/**
	 * WooCommerce Stripe main class
	 *
	 * @since 1.0.0
	 */
	class YITH_WCStripe_Admin {

		/**
		 * @var $_premium string Premium tab template file name
		 */
		protected $_premium = 'premium.php';

		/**
		 * @var string Premium version landing link
		 */
		protected $_premium_landing = 'https://yithemes.com/themes/plugins/yith-woocommerce-stripe/';

		/**
		 * @var string Plugin official documentation
		 */
		protected $_official_documentation = 'https://yithemes.com/docs-plugins/yith-woocommerce-stripe/';

		/**
		 * Constructor.
		 *
		 * @return \YITH_WCStripe_Admin
		 * @since 1.0.0
		 */
		public function __construct() {
			// register gateway panel
			add_action( 'admin_menu', array( $this, 'register_panel' ), 5 );
			add_action( 'yith_woocommerce_stripe_premium', array( $this, 'premium_tab' ) );

			// register panel
			$action = 'yith_wcstripe_gateway';
			if ( defined( 'YITH_WCSTRIPE_PREMIUM' ) ) {
				$action .= YITH_WCStripe_Premium::addons_installed() ? '_addons' : '_advanced';
			}
			add_action( $action . '_settings_tab', array( $this, 'print_panel' ) );
			add_action( 'woocommerce_admin_order_data_after_order_details', array( $this, 'capture_status' ) );

			// register pointer
			add_action( 'admin_init', array( $this, 'register_pointer' ) );

			//Add action links
			add_filter( 'yith_show_plugin_row_meta', array( $this, 'plugin_row_meta' ), 10, 5 );
			add_filter( 'plugin_action_links_' . plugin_basename( YITH_WCSTRIPE_DIR . '/' . basename( YITH_WCSTRIPE_FILE ) ), array( $this, 'action_links' ) );
		}

		/**
		 * Register subpanel for YITH Stripe into YI Plugins panel
		 *
		 * @return void
		 * @since 2.0.0
		 */
		public function register_panel() {
			$admin_tabs = apply_filters( 'yith_stripe_admin_panels', array(
				'settings' => __( 'Settings', 'yith-woocommerce-stripe' )
			) );

			if ( defined( 'YITH_WCSTRIPE_FREE_INIT' ) ) {
				$admin_tabs['premium'] = __( 'Premium Version', 'yith-woocommerce-stripe' );
			}

			$args = array(
				'create_menu_page' => true,
				'parent_slug'   => '',
				'page_title'    => __( 'Stripe', 'yith-woocommerce-stripe' ),
				'menu_title'    => __( 'Stripe', 'yith-woocommerce-stripe' ),
				'capability'    => 'manage_options',
				'parent'        => '',
				'parent_page'   => 'yith_plugin_panel',
				'links'         => $this->get_panel_sidebar_link(),
				'page'          => 'yith_wcstripe_panel',
				'admin-tabs'    => $admin_tabs,
				'options-path'  => YITH_WCSTRIPE_INC . 'plugin-options'
			);

			/* === Fixed: not updated theme  === */
			if( ! class_exists( 'YIT_Plugin_Panel_WooCommerce' ) ) {
				require_once( YITH_WCSTRIPE_DIR . 'plugin-fw/lib/yit-plugin-panel-wc.php' );
			}

			$this->_panel = new YIT_Plugin_Panel_WooCommerce( $args );
		}

		/**
		 * Add the widget of "Important Links" inside the admin sidebar
		 * @return array
		 */
		public function get_panel_sidebar_link() {
			return array(
				array(
					'url'   => $this->_official_documentation,
					'title' => __( 'Plugin Documentation', 'yith-woocommerce-stripe' )
				),
				array(
					'url'   => $this->_premium_landing,
					'title' => __( 'Discover the premium version', 'yith-woocommerce-stripe' )
				),
				array(
					'url'   => $this->_premium_landing.'#tab-free_vs_premium_tab',
					'title' => __( 'Free Vs Premium', 'yith-woocommerce-stripe' )
				),
				array(
					'url'   => 'http://plugins.yithemes.com/yith-woocommerce-request-a-quote/',
					'title' => __( 'Premium live demo', 'yith-woocommerce-stripe' )
				),
				array(
					'url'   => 'https://wordpress.org/support/plugin/yith-woocommerce-request-a-quote',
					'title' => __( 'WordPress support forum', 'yith-woocommerce-stripe' )
				),
				array(
					'url'   => $this->_official_documentation . '/05-changelog.html',
					'title' => sprintf( __( 'Changelog (current version %s)', 'yith-woocommerce-stripe' ), YITH_WCSTRIPE_VERSION )
				),
			);
		}

		/**
		 * Print custom tab of settings for Stripe subpanel
		 *
		 * @return void
		 * @since 1.0.0
		 */
		public function print_panel() {
			$panel_template = YITH_WCSTRIPE_DIR . '/templates/admin/settings-tab.php';

			if ( ! file_exists( $panel_template ) ) {
				return;
			}

			global $current_section;
			$current_section = 'yith_wcstripe_gateway';

			if ( defined( 'YITH_WCSTRIPE_PREMIUM' ) ) {
				$current_section .= YITH_WCStripe_Premium::addons_installed() ? '_addons' : '_advanced';
			}

			WC_Admin_Settings::get_settings_pages();

			if( ! empty( $_POST ) ) {
				$gateways = WC()->payment_gateways()->payment_gateways();
				$gateways[ YITH_WCStripe::$gateway_id ]->process_admin_options();
			}

			include_once( $panel_template );
		}

		/**
		 * Add capture information in order box
		 *
		 * @param $order WC_Order
		 * @since 1.0.0
		 */
		public function capture_status( $order ) {
			if ( yit_get_prop( $order, 'payment_method' ) != YITH_WCStripe::$gateway_id ) {
				return;
			}

			?>
			<div style="clear:both"></div>
			<h4><?php _e( 'Authorize & Capture status', 'yith-woocommerce-stripe' ) ?></h4>
			<p class="form-field form-field-wide order-captured">
				<?php 'yes' == yit_get_prop( $order, '_captured' ) ? _e( 'Captured', 'yith-woocommerce-stripe' ) : _e( 'Authorized only (not captured yet)', 'yith-woocommerce-stripe' ) ?>
			</p>
			<?php
		}

		/**
		 * Action Links
		 *
		 * add the action links to plugin admin page
		 *
		 * @param $links | links plugin array
		 *
		 * @return   mixed Array
		 * @since    1.0
		 * @author   Andrea Grillo <andrea.grillo@yithemes.com>
		 * @return mixed
		 * @use plugin_action_links_{$plugin_file_name}
		 */
		public function action_links( $links ) {
			$links = yith_add_action_links( $links, 'yith_wcstripe_panel', defined( 'YITH_WCSTRIPE_PREMIUM' ) );
			return $links;
		}

		/**
		 * plugin_row_meta
		 *
		 * add the action links to plugin admin page
		 *
		 * @param $plugin_meta
		 * @param $plugin_file
		 * @param $plugin_data
		 * @param $status
		 *
		 * @return   Array
		 * @since    1.0
		 * @author   Andrea Grillo <andrea.grillo@yithemes.com>
		 * @use plugin_row_meta
		 */
		public function plugin_row_meta( $new_row_meta_args, $plugin_meta, $plugin_file, $plugin_data, $status, $init_file = 'YITH_WCSTRIPE_INIT' ) {
			if ( defined( $init_file ) && constant( $init_file ) == $plugin_file ) {
				$new_row_meta_args['slug'] = 'yith-woocommerce-stripe';

			}

			if ( defined( 'YITH_WCSTRIPE_PREMIUM' ) ) {
				$new_row_meta_args['is_premium'] = true;

			}

			return $new_row_meta_args;
		}

		/**
		 * Register the pointer for the settings page
		 *
		 * @since 1.0.0
		 */
		public function register_pointer() {
			if ( ! class_exists( 'YIT_Pointers' ) ) {
				include_once( '../plugin-fw/lib/yit-pointers.php' );
			}

			$args[] = array(
				'screen_id'  => 'plugins',
				'pointer_id' => 'yith_wcstripe_panel',
				'target'     => '#toplevel_page_yit_plugin_panel',
				'content'    => sprintf( '<h3> %s </h3> <p> %s </p>',
					'YITH WooCommerce Stripe',
					__( 'In YITH Plugins tab you can find YITH WooCommerce Stripe options. From this menu you can access all settings of YITH plugins activated.', 'yith-woocommerce-stripe' )
				),
				'position'   => array( 'edge' => 'left', 'align' => 'center' ),
				'init'       => defined( 'YITH_WCSTRIPE_PREMIUM' ) ? YITH_WCSTRIPE_INIT : YITH_WCSTRIPE_FREE_INIT
			);

			YIT_Pointers()->register( $args );
		}

		/**
		 * Premium Tab Template
		 *
		 * Load the premium tab template on admin page
		 *
		 * @return   void
		 * @since    1.0
		 * @author   Andrea Grillo <andrea.grillo@yithemes.com>
		 */

		public function premium_tab() {
			$premium_tab_template = YITH_WCSTRIPE_DIR . 'templates/admin/' . $this->_premium;
			if ( file_exists( $premium_tab_template ) ) {
				include_once( $premium_tab_template );
			}
		}

		/**
		 * Get the premium landing uri
		 *
		 * @since   1.0.0
		 * @author  Andrea Grillo <andrea.grillo@yithemes.com>
		 * @return  string The premium landing link
		 */
		public function get_premium_landing_uri() {
			return defined( 'YITH_REFER_ID' ) ? $this->_premium_landing . '?refer_id=' . YITH_REFER_ID : $this->_premium_landing;
		}
	}
}