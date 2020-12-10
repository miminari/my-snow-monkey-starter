<?php
/**
 * ブロックパターンのカスタマイズ関連クラス.
 *
 * @since      0.0.1
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
		public function __construct() {
			add_action( 'after_setup_theme', array( $this, 'remove_core_block_patterns' ), 11 );
			add_action( 'init', array( $this, 'register_block_pattern_category' ) );
			add_action( 'init', array( $this, 'register_block_patterns' ) );
		}

		/**
		 * Remove core block patterns
		 */
		public function remove_core_block_patterns() {
			remove_theme_support( 'core-block-patterns' );
		}

		/**
		 * Register custom block pattern category
		 */
		public function register_block_pattern_category() {
			register_block_pattern_category(
				'msn',
				array( 'label' => 'My Snow Monkey' )
			);
		}

		/**
		 * Register custom block pattern category
		 */
		public function register_block_patterns() {
			register_block_pattern(
				'msn/hero',
				$this->get_json_data( MSM_CUSTOMISER_PATH . '/block-pattern/hero.json' )
			);
		}

		/**
		 * 外部JSONを指定して配列を返す.
		 *
		 * @param string $url json file's url.
		 */
		private function get_json_data( $url ) {
			$json = file_get_contents( $url ); // phpcs:ignore WordPress.WP.AlternativeFunctions.file_get_contents_file_get_contents
			$arr  = json_decode( $json, true );
			return $arr;
		}

	}
}
