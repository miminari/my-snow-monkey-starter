<?php
/**
 * The file that defines the core plugin class
 *
 * @since      0.0.2
 *
 * @package    my-snow-monkey
 * @subpackage includes
 */

if ( ! class_exists( 'Msm_Customizer' ) ) {
	/**
	 * Msm Customizer
	 */
	class Msm_Customizer {
		/**
		 * Init
		 */
		public static function init() {
			// カスタムCSS, JSの読み込み.
			add_action(
				'wp_enqueue_scripts',
				function () {
					if ( WP_DEBUG ) {
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
			// カスタムカラーをエディターに反映.
			$colors = self::get_custom_color();
			add_filter(
				'snow_monkey_editor_color_palette',
				function () use ( $colors ) {
					return $colors;
				}
			);
			/**
			 * Add custom editor style
			 * カスタムエディタースタイルを反映.
			 */
			add_action(
				'enqueue_block_editor_assets',
				function() {
					wp_enqueue_style(
						'msm-editor-style',
						MSM_CUSTOMIZER_URL . '/build/editor-style.css',
						false,
						filemtime(MSM_CUSTOMISER_PATH . '/build/editor-style.css')
					);
				}
			);
		}

		/**
		 * 外部JSONからカスタムカラーを取得する.
		 */
		private static function get_custom_color() {
			$url        = MSM_CUSTOMISER_PATH . '/color-config.json';
			$colors     = self::get_json_data( $url );
			$arr_colors = array();
			foreach ( $colors as $slug => $color ) {
				$this_color   = array(
					'name'  => $slug,
					'slug'  => $slug,
					'color' => $color,
				);
				$arr_colors[] = $this_color;
			}
			return $arr_colors;
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
