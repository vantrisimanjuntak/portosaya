<?php
/**
 * Add theme dashboard page
 *
 * @package EightyDays
 */

/**
 * Dashboard class.
 */
class Penci_Soledad_Dashboard {
	private $theme;
	private $slug;

	public function __construct() {
		$this->theme = wp_get_theme();
		$this->slug  = $this->theme->template;
		$this->load_files();

		if ( current_user_can( 'manage_options' ) ) {
			add_action( 'admin_menu', array( $this, 'add_menu' ) );
			add_action( 'admin_bar_menu', array( $this, 'add_bar_menu' ), 999 );
		}
		add_action( 'admin_enqueue_scripts', array( $this, 'enqueue_scripts' ) );
		add_action( 'admin_init', array( $this, 'redirect' ) );
		add_filter( 'upload_mimes', array( $this, 'custom_mime_types' ) );
	}

	function load_files() {
		require_once dirname( __FILE__ ) . '/inc/custom_fonts.php';
		require_once dirname( __FILE__ ) . '/inc/require-activation.php';
		require_once dirname( __FILE__ ) . '/inc/white-label.php';
	}

	public function custom_mime_types( $mime_types ) {
		$mime_types['woff'] = 'application/x-font-woff';
		$mime_types['svg']  = 'image/svg+xml';

		return $mime_types;
	}

	/**
	 * Add theme dashboard page.
	 */
	public function add_menu() {

		$wel_page_title      = $this->get_wel_page_title();
		$wel_page_title_html = $wel_page_title;
		if ( penci_is_new_update() ) {
			$wel_page_title_html = $wel_page_title . ' <span class="update-plugins"><span class="update-count">Update</span></span>';
		}
		add_menu_page( $wel_page_title, $wel_page_title_html, 'manage_options', 'soledad_dashboard_welcome', array(
			$this,
			'dashboard_welcome'
		), null, 3 );
		add_submenu_page( 'soledad_dashboard_welcome', esc_html__( 'Custom fonts', 'soledad' ), esc_html__( 'Custom Fonts', 'soledad' ), 'manage_options', 'soledad_custom_fonts', array(
			$this,
			'custom_fonts'
		) );

		$this->replace_text_submenu();

		add_action( 'admin_init', array( $this, 'update' ) );
	}

	public function get_wel_page_title() {
		$wel_page_title = get_theme_mod( 'admin_wel_page_title' );

		return $wel_page_title ? $wel_page_title : 'Soledad';
	}

	public function replace_text_submenu() {
		global $submenu;
		$submenu['soledad_dashboard_welcome'][0][0] = esc_html__( 'Welcome', 'soledad' );
	}

	public function update() {
		if ( ! empty( $_POST ) && isset( $_POST['_page'] ) && $_POST['_page'] === 'soledad_custom_fonts' ) {
			$data = $_POST;

			$fonts = array();

			foreach ( $_POST as $key => $value ) {
				if ( strpos( $key, 'soledad_' ) !== false ) {
					$fonts[ $key ] = $value;
				}
			}
			penci_update_option( $fonts );

			wp_safe_redirect( admin_url( 'admin.php?page=soledad_custom_fonts' ) );
			exit;
		}
	}

	function penci_update_option( $data ) {
		$old = penci_get_option();

		$data = array_merge( $old, (array) $data );

		update_option( 'penci_soledad_options', $data );
	}

	function penci_get_option( $key = null, $default = false ) {
		static $data;

		$data = get_option( 'penci_soledad_options' );

		if ( empty( $data ) ) {
			return array();
		}

		if ( $key === null ) {
			return $data;
		}

		if ( isset( $data[ $key ] ) ) {
			return $data[ $key ];
		}

		return get_option( $key, $default );
	}

	public function add_bar_menu() {
		global $wp_admin_bar;
		if ( ! is_super_admin() || ! is_admin_bar_showing() ) {
			return;
		}
		$wp_admin_bar->add_menu( array(
			'parent' => 'site-name',
			'id'     => 'soledad-dashboard',
			'title'  => $this->get_wel_page_title(),
			'href'   => admin_url( 'admin.php?page=soledad_dashboard_welcome' )
		) );
	}

	/**
	 * Show dashboard page.
	 */
	public function dashboard_welcome() {
		?>
        <div class="wrap about-wrap penci-about-wrap">
			<?php include get_template_directory() . '/inc/dashboard/sections/welcome.php'; ?>
			<?php include get_template_directory() . '/inc/dashboard/sections/getting-started.php'; ?>
        </div>
		<?php
	}

	public function custom_fonts() {
		?>
        <div class="wrap about-wrap penci-about-wrap">
			<?php include get_template_directory() . '/inc/dashboard/sections/welcome.php'; ?>
			<?php include get_template_directory() . '/inc/dashboard/sections/custom-fonts.php'; ?>
        </div>
		<?php
	}

	/**
	 * Enqueue scripts for dashboard page.
	 *
	 * @param string $hook Page hook.
	 */
	public function enqueue_scripts( $hook ) {

		wp_enqueue_media();
		wp_enqueue_style( "dashboard-style", get_template_directory_uri() . '/inc/dashboard/css/dashboard-style.css?v=8.0.7' );
		wp_enqueue_script( "soledad-button-script", get_template_directory_uri() . '/inc/woocommerce/js/jquery-grid-picker.js?v=8.0.7', array( 'jquery' ) );
		wp_enqueue_script( "soledad-dashboard-script", get_template_directory_uri() . '/inc/dashboard/js/script.js?v=8.0.7', array( 'jquery' ) );

		$localize_script = array(
			'ajaxUrl' => admin_url( 'admin-ajax.php' ),
			'nonce'   => wp_create_nonce( 'ajax-nonce' ),
			'domain'  => get_home_url( '/' )
		);
		wp_localize_script( "soledad-dashboard-script", 'PENCIDASHBOARD', $localize_script );
	}

	/**
	 * Redirect to dashboard page after theme activation.
	 */
	public function redirect() {
		global $pagenow;
		if ( is_admin() && isset( $_GET['activated'] ) && 'themes.php' === $pagenow ) {
			wp_safe_redirect( admin_url( "admin.php?page=soledad_dashboard_welcome" ) );
			exit;
		}
	}
}

if ( ! function_exists( 'penci_update_option' ) ) {
	function penci_update_option( $data ) {
		$old = penci_get_option();
		$old = $old ? $old : array();

		$data = array_merge( $old, (array) $data );

		update_option( 'penci_soledad_options', $data );
	}
}

if ( ! function_exists( 'penci_is_plugin_active' ) ) {
	function penci_is_plugin_active( $class, $slug ) {
		return $class->is_plugin_active( $slug );
	}
}

function penci_update_toolbar_link( $wp_admin_bar ) {
	$tgm_instance    = TGM_Plugin_Activation::get_instance();
	$default_plugins = [
		'penci-shortcodes',
		'vafpress-post-formats-ui-develop',
		'penci-soledad-slider',
		'penci-portfolio',
		'penci-recipe',
		'penci-review',
		'penci-soledad-demo-importer',
		'penci-soledad-amp',
	];

	foreach ( $tgm_instance->plugins as $id => $detail ) {
		if ( in_array( $id, $default_plugins ) && penci_is_plugin_active( $tgm_instance, $id ) && $tgm_instance->does_plugin_require_update( $id ) ) {
			$penci_icon = '<svg style="position: relative; top:4px;margin-right: 5px;" version="1.0" xmlns="http://www.w3.org/2000/svg" width="18px" height="18px" viewBox="0 0 26.000000 26.000000" preserveAspectRatio="xMidYMid meet">
				<g transform="translate(0.000000,26.000000) scale(0.100000,-0.100000)" fill="#ffffff" stroke="none">
					<path d="M72 202 l-62 -60 0 -66 0 -66 125 0 125 0 0 61 0 61 -63 65 -62 64
				-63 -59z m73 28 c3 -5 -3 -10 -15 -10 -12 0 -18 5 -15 10 3 6 10 10 15 10 5 0
				12 -4 15 -10z m57 -57 c34 -33 36 -38 20 -49 -14 -10 -21 -8 -45 12 -36 31
				-62 30 -93 -1 -21 -21 -28 -23 -44 -13 -19 12 -18 14 17 50 51 52 92 52 145 1z
				m-77 -93 c0 -59 -1 -60 -27 -60 -26 0 -28 3 -28 42 0 24 7 49 17 60 28 32 38
				21 38 -42z m49 44 c10 -9 16 -33 16 -60 0 -40 -2 -44 -25 -44 -24 0 -25 3 -25
				60 0 62 7 71 34 44z m-130 -20 c9 -8 16 -31 16 -50 0 -27 -4 -34 -20 -34 -17
				0 -20 7 -20 50 0 28 2 50 4 50 3 0 12 -7 20 -16z m201 -34 c0 -44 -3 -50 -20
				-50 -18 0 -20 5 -17 38 4 35 17 62 31 62 3 0 6 -22 6 -50z"></path>
					<path d="M90 70 c0 -5 5 -10 10 -10 6 0 10 5 10 10 0 6 -4 10 -10 10 -5 0 -10
				-4 -10 -10z"></path>
				</g>
			</svg>';

			$args = array(
				'id'    => 'penci-update-notice',
				'title' => $penci_icon . ' Soledad - Notifications',
				'href'  => '#',
				'meta'  => array(
					'class' => 'penci-update-notice-button',
					'title' => 'Soledad - Notifications',
				)
			);
			$wp_admin_bar->add_node( $args );

			$args = array(
				'id'     => 'penci-update-notice-link',
				'title'  => 'Some Plugins Need to Update',
				'href'   => admin_url( 'themes.php?page=tgmpa-install-plugins&plugin_status=update' ),
				'parent' => 'penci-update-notice',
				'meta'   => array(
					'class' => 'penci-update-notice-btn',
					'title' => 'Some Plugins Need to Update'
				)
			);
			$wp_admin_bar->add_node( $args );
		}
	}
}

add_action( 'admin_bar_menu', 'penci_update_toolbar_link', 50 );
