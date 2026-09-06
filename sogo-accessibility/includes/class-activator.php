<?php

/**
 * Fired during plugin activation
 *
 * @link       http://sogo.co.il
 * @since      1.0.0
 *
 * @package    Sogo_accessibility
 * @subpackage Sogo_accessibility/includes
 */

/**
 * Fired during plugin activation.
 *
 * This class defines all code necessary to run during the plugin's activation.
 *
 * @since      1.0.0
 * @package    Sogo_accessibility
 * @subpackage Sogo_accessibility/includes
 * @author     Oren <oren@sogo.co.il>
 */
class Sogo_accessibility_Activator {

	/**
	 * Short Description. (use period)
	 *
	 * Long Description.
	 *
	 * @since    1.0.0
	 */
	/**
	 * Option holding the state of the activation notification prompt.
	 * '1' = still to ask, '0' = the administrator has answered.
	 */
	const NOTICE_OPTION = 'sogo_accessibility_activation_notice';

	/**
	 * Address the activation notification is sent to.
	 */
	const NOTIFY_ADDRESS = 'wpmaster@sogo.co.il';

	/**
	 * Short Description. (use period)
	 *
	 * Long Description.
	 *
	 * @since    1.0.0
	 */
	public static function activate() {

		// Only flag that we should ask. Nothing leaves the site until an
		// administrator explicitly agrees on the admin notice.
		add_option( self::NOTICE_OPTION, '1' );
	}

	/**
	 * Ask the administrator whether we may notify SOGO about this activation.
	 *
	 * @since    2.2
	 */
	public static function activation_notice() {

		if ( ! current_user_can( 'manage_options' ) ) {
			return;
		}

		if ( '1' !== get_option( self::NOTICE_OPTION ) ) {
			return;
		}

		$yes = wp_nonce_url( add_query_arg( 'sogo_acc_notify', '1' ), 'sogo_acc_notify' );
		$no  = wp_nonce_url( add_query_arg( 'sogo_acc_notify', '0' ), 'sogo_acc_notify' );

		echo '<div class="notice notice-info"><p>';

		printf(
			/* translators: 1: site address, 2: administrator e-mail address, 3: recipient address */
			esc_html__( 'Thank you for installing SOGO Accessibility. May we let SOGO know you activated it? This sends your site address (%1$s) and administrator e-mail address (%2$s) to %3$s. Nothing is sent unless you choose "Notify SOGO", and the plugin works exactly the same either way.', 'sogoacc' ),
			esc_html( home_url() ),
			esc_html( get_option( 'admin_email' ) ),
			esc_html( self::NOTIFY_ADDRESS )
		);

		echo '</p><p>';
		echo '<a href="' . esc_url( $yes ) . '" class="button button-primary">' . esc_html__( 'Notify SOGO', 'sogoacc' ) . '</a> ';
		echo '<a href="' . esc_url( $no ) . '" class="button">' . esc_html__( 'No thanks', 'sogoacc' ) . '</a>';
		echo '</p></div>';
	}

	/**
	 * Act on the administrator's answer to the activation notice.
	 *
	 * @since    2.2
	 */
	public static function handle_activation_notice() {

		if ( ! isset( $_GET['sogo_acc_notify'] ) ) {
			return;
		}

		if ( ! current_user_can( 'manage_options' ) ) {
			return;
		}

		check_admin_referer( 'sogo_acc_notify' );

		if ( '1' === $_GET['sogo_acc_notify'] ) {
			self::send_activation_notification();
		}

		// Answered either way, so do not ask again.
		update_option( self::NOTICE_OPTION, '0' );

		wp_safe_redirect( remove_query_arg( array( 'sogo_acc_notify', '_wpnonce' ) ) );
		exit;
	}

	/**
	 * Send the activation notification. Only ever called after the
	 * administrator has agreed on the activation notice.
	 *
	 * @since    2.2
	 */
	private static function send_activation_notification() {

		try {
			$message = "Site: ". home_url(). "\n\r";
			$message .= "email: ". get_option('admin_email');
			wp_mail( self::NOTIFY_ADDRESS, "Accessibility Plugin was activated", $message );
		} catch (Exception $e) {
			// do noting
		}
	}

}
