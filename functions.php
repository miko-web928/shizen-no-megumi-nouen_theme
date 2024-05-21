<?php
function theme_setup()
{

  //アイキャッチの有効化
  add_theme_support('post-thumbnails');

  //RSSフィードリンクを自動生成する
  add_theme_support('automatic-feed-links');

  //titleタグを自動生成する
  add_theme_support('title-tag');

  //HTML5によるマークアップを行う
  add_theme_support(
    'html5',
    array(
      'search-form',
      'gallery',
      'caption',
    )
  );

  //メニューを有効化する
  add_theme_support('menus');
  add_theme_support('wp-block-styles');
}

function enqueue_font_awesome()
{
  wp_enqueue_style(
    'font-awesome',
    'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css',
    array(),
    '6.5.1',
    'all'
  );
}
add_action('wp_enqueue_scripts', 'enqueue_font_awesome');
add_action('wp_enqueue_scripts', function () {
  wp_register_style(
    'reset_style',
    'https://cdn.jsdelivr.net/npm/destyle.css@4.0.1/destyle.css',
    array(),
    '4.0.1',
    'all'
  );
  wp_enqueue_style(
    'google-web-fonts',
    'https://fonts.googleapis.com/css2?family=Archivo+Narrow:ital,wght@0,400..700;1,400..700&display=swap',
    array('reset_style'),
    'all'
  );
  wp_enqueue_style(
    'slick',
    'https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css',
    array('reset_style'),
    '1.8.1',
    'all'
  );
  wp_enqueue_style(
    'slick_theme',
    'https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css',
    array('reset_style'),
    '1.8.1',
    'all'
  );
  wp_enqueue_style(
    'main_style',
    get_template_directory_uri() . '/css/style.css',
    array('reset_style'),
    '1.0'
  );
});

add_action('after_setup_theme', 'theme_setup');

function menu_init()
{

  //メニューを有効化する
  register_nav_menus(
    array(
      'header' => 'ヘッダーメニュー',
      'footer' => 'フッターメニュー',
      'header-sp' => 'ヘッダーSPメニュー',
    )
  );
}

add_action('after_setup_theme', 'menu_init');

// グローバルメニューにサブタイトルをつける
add_filter('walker_nav_menu_start_el', 'description_in_nav_menu', 10, 4);
function description_in_nav_menu($item_output, $item){
  return preg_replace('/(<a.*?>[^<]*?)</', '$1' . "<br /><span>{$item->attr_title}</span><", $item_output);
}

// テーマフォルダ内の「my-script.js」を読み込む場合
add_action('wp_enqueue_scripts', function () {
  wp_enqueue_script('script.js', get_template_directory_uri() . '/js/script.js');
  wp_enqueue_script(
    'slick.js',
    'https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js'
  );
  wp_enqueue_script(
    'paginathing.js',
    'https://cdn.jsdelivr.net/gh/alfrcr/paginathing/dist/paginathing.min.js'
  );
});


// contact form7のときには整形機能をオフにする
add_filter('wpcf7_autop_or_not', 'my_wpcf7_autop');
function my_wpcf7_autop()
{
  return false;
}

// add SVG to allowed file uploads
function add_file_types_to_uploads($file_types)
{

  $new_filetypes = array();
  $new_filetypes['svg'] = 'image/svg+xml';
  $file_types = array_merge($file_types, $new_filetypes);

  return $file_types;
}
add_action('upload_mimes', 'add_file_types_to_uploads');

function filter_wpseo_breadcrumb_separator($this_options_breadcrumbs_sep) {
  return '<i class="fa fas fa-chevron-right" style="color: #93c572;"></i>';
};

// add the filter
add_filter('wpseo_breadcrumb_separator', 'filter_wpseo_breadcrumb_separator', 10, 1);

// カテゴリー一覧ページのページネーション
// function () {
//   ('.js-pagination').paginathing({ //親要素のclassを記述
//     perPage: 10, //10件ずつ
//     prevNext: true,
//     firstLast: false,
//     prevText: '&lt;',
//     nextText: '&gt;',
//     containerClass: 'pagination-container', //この辺のクラスは自由に設定
//     ulClass: 'pnavi', //この辺のクラスは自由に設定
//     activeClass: 'current', //この辺のクラスは自由に設定
//   })
// };