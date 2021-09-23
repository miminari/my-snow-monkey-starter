<?php
/**
 * The file that defines custom post types
 *
 * @since      0.0.1
 *
 * @package    my-snow-monkey
 * @subpackage includes
 */

if ( ! class_exists( 'Msm_Custom_Post' ) ) {
	/**
	 * Msm Custom Post
	 */
	class Msm_Custom_Post {

		/**
		 * construct
		 */
		public function __construct() {
			// カスタム投稿タイプの追加.
			add_action( 'init', array( $this, 'create_msm_post_types' ) );
			// カスタムタクソノミーの追加.
			add_action( 'init', array( $this, 'create_msm_gallery_taxonomies' ) );
		}
		/**
		 * カスタム投稿タイプの設定.
		 */
		public function create_msm_post_types() {
			// Add gallery post type.
			$gallery_labels = array(
				'name'               => _x( 'ギャラリー', 'post type general name', 'msm' ),
				'singular_name'      => _x( 'Gallery', 'post type singular name', 'msm' ),
				'add_new'            => _x( '新規追加', 'gallery', 'msm' ),
				'add_new_item'       => __( '新規にギャラリーを追加', 'msm' ),
				'edit_item'          => __( 'ギャラリーを編集', 'msm' ),
				'new_item'           => __( 'New Gallery', 'msm' ),
				'view_item'          => __( 'ギャラリーを見る', 'msm' ),
				'search_items'       => __( 'ギャラリーを検索', 'msm' ),
				'not_found'          => __( 'ギャラリーが見つかりません', 'msm' ),
				'not_found_in_trash' => __( 'No galleries found in Trash', 'msm' ),
				'parent_item_colon'  => '',
			);
			$gallery_args   = array(
				'labels'             => $gallery_labels,
				'public'             => true,
				'publicly_queryable' => true,
				'show_ui'            => true,
				'show_in_rest'       => true,
				'query_var'          => true,
				'rewrite'            => array( 'slug' => 'gallery-archives' ),
				'hierarchical'       => false,
				'menu_position'      => null,
				'capability_type'    => 'post',
				'supports'           => array( 'title', 'excerpt', 'editor', 'thumbnail' ),
				'menu_icon'          => 'dashicons-format-gallery',
				'has_archive'        => true,
			);
			register_post_type( 'gallery', $gallery_args );
		}
		/**
		 * Create FAQ taxonomy.
		 */
		public function create_msm_faq_taxonomies() {
				register_taxonomy(
					'faqtype',
					'faq',
					array(
						'hierarchical'   => true,
						'label'          => 'カテゴリー',
						'singular_label' => 'カテゴリー',
						'rewrite'        => true,
					)
				);

		}
		/**
		 *  Add gallery taxonomy
		 */
		public function create_msm_gallery_taxonomies() {
			register_taxonomy(
				'phototype',
				'gallery',
				array(
					'label'          => 'タグ',
					'singular_label' => 'タグ',
					'rewrite'        => true,
				)
			);
		}
	}
}
