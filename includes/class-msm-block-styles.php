<?php
/**
 * ブロックのカスタマイズ関連クラス.
 *
 * @since      0.0.2
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
		public static function init() {
			add_action( 'after_setup_theme', array( get_called_class(), 'block_style_setup' ) );
		}

		/**
		 * Add block styles
		 */
		public static function block_style_setup() {
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
