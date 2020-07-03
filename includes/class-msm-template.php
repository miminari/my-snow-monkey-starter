<?php
/**
 * The file that defines the core plugin class
 *
 * @since      0.0.1
 *
 * @package    my-snow-monkey
 * @subpackage includes
 */

if ( ! class_exists( 'Msm_Template' ) ) {
	/**
	 * Msm Customizer
	 */
	class Msm_Template {
		// 固定ページのページテンプレートを使えるようにするフィルター.
		/**
		 * Init
		 */
		public function init() {
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
