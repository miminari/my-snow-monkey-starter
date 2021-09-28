<?php
/**
 * ブロックパターンのカスタマイズ関連クラス.
 *
 * @since      0.0.2
 *
 * @package    my-snow-monkey
 * @subpackage includes
 */

if ( ! class_exists( 'Msm_Block_Pattern' ) ) {
	/**
	 * Msm Blocks
	 */
	class Msm_Block_Pattern {
		/**
		 * construct
		 */
		public static function init() {
			add_action( 'after_setup_theme', array( get_called_class(), 'remove_core_block_patterns' ), 11 );
			add_action( 'init', array( get_called_class(), 'register_block_pattern_category' ) );
			add_action( 'init', array( get_called_class(), 'register_block_patterns' ) );
		}

		/**
		 * Remove core block patterns
		 */
		public static function remove_core_block_patterns() {
			remove_theme_support( 'core-block-patterns' );
		}

		/**
		 * Register custom block pattern category
		 */
		public static function register_block_pattern_category() {
			register_block_pattern_category(
				'msn',
				array( 'label' => 'My Snow Monkey' )
			);
		}

		/**
		 * Register custom block pattern category
		 */
		public static function register_block_patterns() {
			register_block_pattern(
				'msn/hero',
				self::get_json_data( MSM_CUSTOMISER_PATH . '/block-pattern/hero.json' )
			);
		}

		/**
		 * 外部JSONを指定して配列を返す.
		 *
		 * @param string $url json file's url.
		 */
		private static function get_json_data( $url ) {
			$json = file_get_contents( $url ); // phpcs:ignore WordPress.WP.AlternativeFunctions.file_get_contents_file_get_contents
			$arr  = json_decode( $json, true );
			return $arr;
		}

	}
}
