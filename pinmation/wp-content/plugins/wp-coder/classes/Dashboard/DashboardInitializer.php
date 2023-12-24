<?php

namespace WPCoder\Dashboard;

defined( 'ABSPATH' ) || exit;

use WPCoder\WPCoder;

class DashboardInitializer {

	public static function init(): void {
		self::header();
		echo '<div class="wrap wowp-wrap">';
//		self::menu();
//		self::include_pages();
		echo '</div>';
	}

	public static function header(): void {
		$logo_url = self::logo_url();
		$add_url  = add_query_arg( [
			'page'   => WPCoder::SLUG,
			'tab'    => 'settings',
			'action' => 'new'
		], admin_url( 'admin.php' ) );
		?>

            <div class="wowp-header-border"></div>
            <div class="wowp-header">
                <div class="wowp-logo">
                    <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 64 64"><title>64px_code</title><rect data-element="frame" x="0" y="0" width="64" height="64" rx="13" ry="13" stroke="none" fill="#007ea1"></rect><g transform="translate(12.8 12.8) scale(0.6)" fill="#ffffff"><path d="M19.562 18.75a2 2 0 0 0-2.811-.312l-15.001 12a2 2 0 0 0 0 3.124l15 12a1.997 1.997 0 0 0 2.811-.312 2 2 0 0 0-.312-2.811L6.201 32.001l13.048-10.438a2 2 0 0 0 .312-2.811z" fill="#ffffff"></path><path d="M47.25 18.438a2 2 0 1 0-2.499 3.123l13.048 10.438-13.048 10.438a2 2 0 0 0 2.499 3.123l15-12a2 2 0 0 0 0-3.124l-15-12z" fill="#FF6B6B"></path><path d="M39.539 5.074a2 2 0 0 0-2.465 1.387l-14 50a2 2 0 0 0 3.852 1.079l14-50.001a2 2 0 0 0-1.387-2.465z" fill="#FF6B6B"></path></g></svg>
                </div>
                <h1><?php echo esc_html( WPCoder::info('name') ); ?> <sup
                            class="wowp-version"><?php echo esc_html( WPCoder::info('version') ); ?></sup></h1>

				<?php do_action( WPCoder::PREFIX . '_admin_header_links' ); ?>
            </div>


		<?php
	}

	public static function logo_url(): string {
		$logo_url = WPCoder::url() . 'assets/img/plugin-logo.png';
		if ( filter_var( $logo_url, FILTER_VALIDATE_URL ) !== false ) {
			return $logo_url;
		}

		return '';
	}

	public static function menu(): void {

		$pages = DashboardHelper::get_files( 'pages' );
		unset($pages["3"], $pages["4"]);

		$current_page = self::get_current_page();

		$action = ( isset( $_REQUEST["action"] ) ) ? sanitize_text_field( $_REQUEST["action"] ) : '';

		echo '<h2 class="nav-tab-wrapper wowp-nav-tab-wrapper">';
		foreach ( $pages as $key => $page ) {
			$class = ( $page['file'] === $current_page ) ? ' nav-tab-active' : '';
			$id    = '';

			if ( $action === 'update' && $page['file'] === 'settings' ) {
				$id           = ( isset( $_REQUEST["id"] ) ) ? absint( $_REQUEST["id"] ) : '';
				$page['name'] = __( 'Update', 'wpcoder' ) . ' #' . $id;
			} elseif ( $page['file'] === 'settings' && ( $action !== 'new' && $action !== 'duplicate' ) ) {
				continue;
			}

			echo '<a class="nav-tab' . esc_attr( $class ) . '" href="' . esc_url( Link::menu( $page['file'], $action, $id ) ) . '">' . esc_html( $page['name'] ) . '</a>';
		}
		echo '</h2>';


	}

	public static function include_pages(): void {
		$current_page = self::get_current_page();

		$pages   = DashboardHelper::get_files( 'pages' );
		$default = DashboardHelper::first_file( 'pages' );

		$current = DashboardHelper::search_value( $pages, $current_page ) ? $current_page : $default;

		$file = DashboardHelper::get_file( $current, 'pages' );


		if ( $file !== false ) {
			$file = apply_filters( WPCoder::PREFIX . '_admin_filter_file', $file, $current );

			$page_path = DashboardHelper::get_folder_path( 'pages' ) . '/' . $file;

			if ( file_exists( $page_path ) ) {
				require_once $page_path;
			}
		}

	}


	public static function get_current_page(): string {
		$default = DashboardHelper::first_file( 'pages' );

		return ( isset( $_REQUEST["tab"] ) ) ? sanitize_text_field( $_REQUEST["tab"] ) : $default;
	}


}