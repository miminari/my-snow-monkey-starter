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
 * Version:           1.0.1
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
$msm_customizer = new Msm_Customizer();
$msm_customizer->init();

/*
 * カスタムテンプレートを利用しない場合はコメントアウト
 */
require MSM_CUSTOMISER_PATH . '/includes/class-msm-template.php';
$msm_template = new Msm_Template();
$msm_template->init();

/*
 * アーカイブ系をカスタムしない場合はコメントアウト
 */
require MSM_CUSTOMISER_PATH . '/includes/class-msm-archives.php';
$msm_archives = new Msm_Archives();
$msm_archives->init();

/*
 * ブロックスタイルをカスタムしない場合はコメントアウト
 */
require MSM_CUSTOMISER_PATH . '/includes/class-msm-block-styles.php';
$msm_block_styles = new Msm_Block_Styles();

/*
 * ブロックパターンをカスタムしない場合はコメントアウト
 */
require MSM_CUSTOMISER_PATH . '/includes/class-msm-block-pattern.php';
$msm_block_pattern = new Msm_Block_Pattern();
