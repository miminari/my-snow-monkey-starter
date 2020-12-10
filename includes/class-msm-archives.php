<?php
/**
 * アーカイブページのカスタマイズ関連クラス.
 *
 * @since      0.0.1
 *
 * @package    my-snow-monkey
 * @subpackage includes
 */

if ( ! class_exists( 'Msm_Archives' ) ) {
	/**
	 * Msm Remove
	 */
	class Msm_Archives {
		/**
		 * Init
		 */
		public function init() {
			// アーカイブスタイルをsimpleに、homeのアーカイブスタイルをrich-mediaに変更.
			add_filter(
				'snow_monkey_get_template_part_args',
				function( $args ) {
					if ( 'template-parts/archive/entry/content/content' === $args['slug'] ) {
						if ( is_home() ) {
							$args['vars']['_entries_layout'] = 'rich-media';
						} else {
							$args['vars']['_entries_layout'] = 'simple';
						}
					}
					return $args;
				},
				11
			);
			// タイトルの文字長を 65 文字にする.
			add_filter(
				'snow_monkey_entry_summary_title_num_words',
				function( $num ) { // phpcs:ignore Generic.CodeAnalysis.UnusedFunctionParameter.Found
					return class_exists( 'multibyte_patch' ) ? 32 : 65;
				},
				11,
				1
			);
			// アーカイブの上部のカスタマイズ.
			add_action(
				'snow_monkey_prepend_archive_entry_content',
				function() {
					return;
				},
				11
			);
		}
	}
}
