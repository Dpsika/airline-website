<?php
/**
 * Redux_Travelpayouts Network Class
 *
 * @class Redux_Travelpayouts_Network
 * @version 4.0.0
 * @package Redux_Travelpayouts Framework/Classes
 */

defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'Redux_Travelpayouts_Network', false ) ) {

	/**
	 * Class Redux_Travelpayouts_Network
	 */
	class Redux_Travelpayouts_Network extends Redux_Travelpayouts_Class {

		/**
		 * Redux_Travelpayouts_Network constructor.
		 *
		 * @param object $parent TravelpayoutsSettingsFramework pointer.
		 */
		public function __construct( $parent ) {
			parent::__construct( $parent );

			if ( 'network' === $parent->args['database'] && $parent->args['network_admin'] ) {
				add_action(
					'network_admin_edit_Redux_Travelpayouts_' . $parent->args['opt_name'],
					array(
						$this,
						'save_network_page',
					),
					10,
					0
				);

				// phpcs:ignore Generic.Strings.UnnecessaryStringConcat
				add_action( 'admin' . '_bar' . '_menu', array( $this, 'network_admin_bar' ), 999 );
			}
		}

		/**
		 * Add node to network admin bar.
		 *
		 * @param object $wp_admin_bar Admin bar.
		 */
		public function network_admin_bar( $wp_admin_bar ) {
			$core = $this->core();

			$args = array(
				'id'     => $core->args['opt_name'] . '_network_admin',
				'title'  => $core->args['menu_title'],
				'parent' => 'network-admin',
				'href'   => network_admin_url( 'settings.php' ) . '?page=' . $core->args['page_slug'],
				'meta'   => array( 'class' => 'redux-network-admin' ),
			);

			$wp_admin_bar->add_node( $args );
		}

		/**
		 * Saves network options.
		 */
		public function save_network_page() {
			$core = $this->core();

			if ( isset( $_POST[ $core->args['opt_name'] ] ) ) { // phpcs:ignore WordPress.Security.NonceVerification
				$opt_name = sanitize_text_field( wp_unslash( $_POST[ $core->args['opt_name'] ] ) ); // phpcs:ignore WordPress.Security.NonceVerification
			}

			$data = $core->options_class->validate_options( $opt_name );

			if ( ! empty( $data ) ) {
				$core->options_class->set( $data );
			}

			wp_safe_redirect(
				add_query_arg(
					array(
						'page'    => $core->args['page_slug'],
						'updated' => 'true',
					),
					network_admin_url( 'settings.php' )
				)
			);

			exit();
		}
	}
}
