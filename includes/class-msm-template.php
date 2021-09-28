<?php
/**
 * 固定ページのページテンプレートを使えるようにする.
 *
 * @since      0.0.2
 *
 * @package    my-snow-monkey
 * @subpackage includes
 */

if ( ! class_exists( 'Msm_Template' ) ) {
	/**
	 * Msm Customizer
	 */
	class Msm_Template {
		/**
		 * Init
		 */
		public static function init() {
			add_filter(
				'snow_monkey_template_part_root_hierarchy',
				function( $hierarchy ) {
					$hierarchy[] = untrailingslashit( __DIR__ ) . '/view';
					return $hierarchy;
				}
			);
		}
	}
}
