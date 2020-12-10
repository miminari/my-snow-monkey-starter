<?php
/**
 * ブロックのカスタマイズ関連クラス.
 *
 * @since      0.0.1
 *
 * @package    my-snow-monkey
 * @subpackage includes
 */

if ( ! class_exists( 'Msm_Block_Styles' ) ) {
	/**
	 * Msm Block Styles
	 */
	class Msm_Block_Styles {
		/**
		 * construct
		 */
		public function __construct() {
			add_action( 'after_setup_theme', array( $this, 'block_style_setup' ) );
		}

		/**
		 * Add block styles
		 */
		public function block_style_setup() {
			/**
			 * wp-block-button
			 */
			register_block_style(
				'core/button',
				array(
					'name'  => 'your-button',
					'label' => 'custom button',
				)
			);
		}
	}
}
