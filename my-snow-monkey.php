<?php
/**
 * The plugin Snow Monkey Customizer
 *
 * @link              http://www.tokion.jp
 * @package           my-snow-monkey
 *
 * @wordpress-plugin
 * Plugin Name:       My Snow Monkey Starter Kit
 * Description:       Let's customize Snow Monkey.
 * Version:           1.0.2
 * Author:            Photosynthesic
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       msm
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Snow Monkey 以外のテーマを利用している場合は有効化してもカスタマイズが反映されないようにする
 */
$msm_theme = wp_get_theme( get_template() );
if ( 'snow-monkey' !== $msm_theme->template && 'snow-monkey/resources' !== $msm_theme->template ) {
	return;
}

define( 'MSM_CUSTOMIZER_URL', untrailingslashit( plugin_dir_url( __FILE__ ) ) );
define( 'MSM_CUSTOMISER_PATH', untrailingslashit( plugin_dir_path( __FILE__ ) ) );

require MSM_CUSTOMISER_PATH . '/includes/class-msm-customizer.php';
Msm_Customizer::init();

/*
 * ブロックスタイルをカスタムしない場合はコメントアウト
 */
require MSM_CUSTOMISER_PATH . '/includes/class-msm-block-styles.php';
Msm_Block_Styles::init();

/*
 * ブロックパターンをカスタムしない場合はコメントアウト
 */
require MSM_CUSTOMISER_PATH . '/includes/class-msm-block-pattern.php';
Msm_Block_Pattern::init();

/*
 * アーカイブ系をカスタムしない場合はコメントアウト
 */
// require MSM_CUSTOMISER_PATH . '/includes/class-msm-archives.php';
// Msm_Archives::init();

/*
 * カスタムテンプレートを利用しない場合はコメントアウト
 */
// require MSM_CUSTOMISER_PATH . '/includes/class-msm-template.php';
// Msm_Template::init();

/*
 * カスタム投稿タイプをカスタムしない場合はコメントアウト
 */
require MSM_CUSTOMISER_PATH . '/includes/class-msm-custom-post.php';
Msm_Custom_Post::init();