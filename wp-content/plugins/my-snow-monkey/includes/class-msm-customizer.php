<?php
/**
 * The file that defines the core plugin class
 *
 * @since      0.0.1
 *
 * @package    my-snow-monkey
 * @subpackage my-snow-monkey/includes
 */

if ( ! class_exists( 'Msm_Customizer' ) ) {
	/**
	 * Tokion Customizer
	 */
	class Msm_Customizer {
		/**
		 * Init
		 */
		public function init() {
			// カスタムCSS, JSの読み込み.
			add_action(
				'wp_enqueue_scripts',
				function () {
					if ( 'WP_DEBUG' ) {
						// Debug Mode.
						wp_enqueue_style( 'msm-style', MSM_CUSTOMIZER_URL . '/build/style.css', false, filemtime( MSM_CUSTOMISER_PATH . '/build/style.css' ) );
						wp_enqueue_script( 'msm-main-script', MSM_CUSTOMIZER_URL . '/build/main.js', array(), filemtime( MSM_CUSTOMISER_PATH . '/build/main.js' ), true );
					} else {
						// Release Mode.
						wp_enqueue_style( 'msm-style', MSM_CUSTOMIZER_URL . '/build/style.min.css', false, filemtime( MSM_CUSTOMISER_PATH . '/build/style.min.css' ) );
						wp_enqueue_script( 'msm-main-script', MSM_CUSTOMIZER_URL . '/build/main.min.js', array(), filemtime( MSM_CUSTOMISER_PATH . '/build/main.min.js' ), true );
					}
				},
				12
			);
		}
	}
}
