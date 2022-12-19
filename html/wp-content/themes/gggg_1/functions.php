<?php

function load_assets()
{
    $uri = get_template_directory_uri();

    // Scripts
    wp_enqueue_script('googleapis-jquery', '//ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js', array(), '3.5.1', true);
    wp_enqueue_script('viewport-extra', '//cdn.jsdelivr.net/npm/viewport-extra@1.0.4/dist/viewport-extra.min.js', array(), '1.0.4', false);
    wp_enqueue_script('simplebar', 'https://cdn.jsdelivr.net/npm/simplebar@latest/dist/simplebar.min.js', array(), '1.0.4', false);
    wp_enqueue_script('slick-carousel', '//cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js', array(), '1.8.1', true);
    wp_enqueue_script('clipbord', 'https://cdn.jsdelivr.net/npm/clipboard@2.0.8/dist/clipboard.min.js', array(), '2,0,8', true);
    wp_enqueue_script('main', $uri . '/js/main.js', array(), '1.0.0', true);
    if (is_page('donate') || is_page('contact')) {

        wp_enqueue_script('lp-main', $uri . '/lp-assets/js/babel/main.js', array(), '1.0.0', true);
    }
    if (is_single()) {
        wp_enqueue_script('single', $uri . '/js/single.js', array(), '1.0.0', true);
    }

    // Styles
    wp_enqueue_style('slick1.9.0', '//cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css');
    wp_enqueue_style('slick-theme1.9.0', '//cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.min.css');
    wp_enqueue_style('simplebar', 'https://cdn.jsdelivr.net/npm/simplebar@latest/dist/simplebar.css');
    wp_enqueue_style('common-css', $uri . '/css/common.css', array(), '1.1.2');
    if (is_singular()) {
        wp_enqueue_style('single-css', $uri . '/css/pages/single.css', array(), '1.1.2');
    }
    if (is_post_type_archive("our-business")) {
        wp_enqueue_style('our-business-css', $uri . '/css/pages/our-business.css', array(), '1.1.2');
    }
    if (is_page('about')) {
        wp_enqueue_style('about-css', $uri . '/css/pages/about.css', array(), '1.1.2');
    }
    if (is_page('problem')) {
        wp_enqueue_style('problem-css', $uri . '/css/pages/problem.css', array(), '1.1.2');
    }
    if (is_page('donate') || is_page('contact')) {
        wp_enqueue_style('lp-css', $uri . '/lp-assets/css/common.css', array(), '1.1.2');
    }
    if (is_page('contact')) {
        wp_enqueue_style('problem-css', $uri . '/css/pages/contact.css', array(), '1.1.2');
    }
    if (is_404()) {
        wp_enqueue_style('not-found-css', $uri . '/css/pages/not-found.css', array(), '1.1.2');
    }
    if (is_home() || is_archive() || is_search()) {
        // wp_enqueue_style('single-css', $uri . '/css/pages/single.css', array(), '1.0.0');
        wp_enqueue_style('archive-css', $uri . '/css/pages/archive.css', array(), '1.1.2');
    }
    if (is_category()) {
        // wp_enqueue_style('single-css', $uri . '/css/pages/single.css', array(), '1.0.0');
        wp_enqueue_style('archive-css', $uri . '/css/pages/archive.css', array(), '1.1.2');
    }
}
add_action('wp_enqueue_scripts', 'load_assets');


// カスタム投稿タイプ 「私たちの事業(our-business)」 と、そのカスタム分類(our-business_cat)を追加
add_action('init', 'create_post_type');

add_theme_support('post-thumbnails');

function create_post_type()
{
    register_post_type(
        'our-business',
        array(
            'labels' => array(
                'name' => '私たちの事業',
                'singular_name' => '私たちの事業',
                'parent_item_colon' => ''
            ),
            'public' => true,
            'show_ui' => true,
            'query_var' => true,
            'hierarchical' => false,
            'supports' => array('title', 'editor', 'thumbnail'),
            'menu_position' => 5,
            'menu_icon' => 'dashicons-building',
            'has_archive' => true,
            'rewrite' => array('slug' => 'our-business', 'with_front' => 'false'),
            'show_in_rest' => true,
        )
    );

    register_taxonomy('our-business_cat', 'our-business', array(
        'hierarchical' => true,
        'labels' => array(
            'name' => 'カテゴリ',
            'singular_name' => 'カテゴリ',
            'search_items' =>  'カテゴリを検索',
            'all_items' => 'すべてのカテゴリ',
            'parent_item' => '親分類',
            'parent_item_colon' => '親分類：',
            'edit_item' => '編集',
            'update_item' => '更新',
            'add_new_item' => 'カテゴリを追加',
            'new_item_name' => '名前',
        ),
        'show_ui' => true,
        'rewrite' => array(
            'slug' => 'our-business', 'with_front' => true, 'hierarchical' => true
        ),
        'show_in_rest' => true,
    ));

    //スタッフ紹介追加
    register_post_type(
        'staff',
        array(
            'labels' => array(
                'name' => 'スタッフ紹介',
                'singular_name' => 'スタッフ紹介',
                'parent_item_colon' => ''
            ),
            'public' => true,
            'show_ui' => true,
            'query_var' => true,
            'hierarchical' => false,
            'supports' => array('title', 'editor', 'thumbnail'),
            'menu_position' => 6,
            'menu_icon' => 'dashicons-groups',
            'has_archive' => false,
            // 'rewrite' => array(  'slug' => 's', 'with_front' => 'false' ),
            'show_in_rest' => true,
        )
    );

    register_taxonomy('staff_cat', 'staff', array(
        'hierarchical' => false,
        'labels' => array(
            'name' => 'タグ',
            'singular_name' => 'タグ',
            'search_items' =>  'タグを検索',
            'all_items' => 'すべてのタグ',
            'parent_item' => '親分類',
            'parent_item_colon' => '親分類：',
            'edit_item' => '編集',
            'update_item' => '更新',
            'add_new_item' => 'タグを追加',
            'new_item_name' => '名前',
        ),
        'show_ui' => true,
        'rewrite' => array(
            'slug' => 'staff_cat', 'with_front' => true, 'hierarchical' => true
        ),
        'show_in_rest' => true,
    ));

    //採用情報追加
    register_post_type(
        'recruit',
        array(
            'labels' => array(
                'name' => '採用情報',
                'singular_name' => '採用情報',
                'parent_item_colon' => ''
            ),
            'public' => true,
            'show_ui' => true,
            'query_var' => true,
            'hierarchical' => false,
            'supports' => array('title', 'editor', 'thumbnail'),
            'menu_position' => 6,
            'menu_icon' => 'dashicons-buddicons-buddypress-logo',
            'has_archive' => true,
            'rewrite' => array('slug' => 'recruit', 'with_front' => 'false'),
            'show_in_rest' => true,
        )
    );

    register_taxonomy('recruit_cat', 'recruit', array(
        'hierarchical' => true,
        'labels' => array(
            'name' => 'カテゴリ',
            'singular_name' => 'カテゴリ',
            'search_items' =>  'カテゴリを検索',
            'all_items' => 'すべてのカテゴリ',
            'parent_item' => '親分類',
            'parent_item_colon' => '親分類：',
            'edit_item' => '編集',
            'update_item' => '更新',
            'add_new_item' => 'カテゴリを追加',
            'new_item_name' => '名前',
        ),
        'show_ui' => true,
        'rewrite' => array(
            'slug' => 'recruit_cat', 'with_front' => true, 'hierarchical' => true
        ),
        'show_in_rest' => true,
    ));
    register_taxonomy('recruit_tag', 'recruit', array(
        'hierarchical' => false,
        'labels' => array(
            'name' => 'タグ',
            'singular_name' => 'タグ',
            'search_items' =>  'タグを検索',
            'all_items' => 'すべてのタグ',
            'parent_item' => '親分類',
            'parent_item_colon' => '親分類：',
            'edit_item' => '編集',
            'update_item' => '更新',
            'add_new_item' => 'タグを追加',
            'new_item_name' => '名前',
        ),
        'show_ui' => true,
        'rewrite' => array(
            'slug' => 'recruit_tag', 'with_front' => true, 'hierarchical' => true
        ),
        'show_in_rest' => true,
    ));
    register_taxonomy('recruit_related', 'recruit', array(
        'hierarchical' => true,
        'labels' => array(
            'name' => '関連事業',
            'singular_name' => '関連事業',
            'search_items' =>  '関連事業を検索',
            'all_items' => 'すべての関連事業',
            'parent_item' => '親分類',
            'parent_item_colon' => '親分類：',
            'edit_item' => '編集',
            'update_item' => '更新',
            'add_new_item' => '関連事業を追加',
            'new_item_name' => '名前',
        ),
        'show_ui' => true,
        'rewrite' => array(
            'slug' => 'recruit_related', 'with_front' => true, 'hierarchical' => true
        ),
        'show_in_rest' => true,
    ));

    // 記事本文自動抜粋の文字制限 return 文字数
    function my_excerpt_length($length)
    {
        return 140;
    }
    add_filter('excerpt_mblength', 'my_excerpt_length');

    // 記事本文自動抜粋の末尾
    function my_excerpt_more($more)
    {
        return '...';
    }
    add_filter('excerpt_more', 'my_excerpt_more');
}

//検索からカスタム投稿退部除外
function search_exclude_custom_post_type($query)
{
    if ($query->is_search() && $query->is_main_query() && !is_admin()) {
        $query->set('post_type', array('post', 'page', 'our-business'));
    }
}
add_filter('pre_get_posts', 'search_exclude_custom_post_type');

/**
 * ページネーション出力関数
 * $pages : 全ページ数
 * $paged : 現在のページ
 * $range : 左右に何ページ表示するか
 * $show_only : 1ページしかない時に表示するかどうか
 */
function pagination($pages, $paged, $range = 1, $show_only = false)
{

    $pages = (int) $pages;    //float型で渡ってくるので明示的に int型 へ
    $paged = $paged ?: 1;       //get_query_var('paged')をそのまま投げても大丈夫なように
    if ($show_only && $pages === 1) {
        // １ページのみで表示設定が true の時
        echo '<ul class="page__list"><li><a href="" class="page__link selected">1</a></li></ul>';
        return;
    }

    if ($pages === 1) return;    // １ページのみで表示設定もない場合

    if (1 !== $pages) {
        //２ページ以上の時
        echo '<ul class="page__list">';
        if ($paged > 1) {
            // 「前へ」 の表示
            echo '<li><a href="' . get_pagenum_link($paged - 1) . '" class="page__link prev">＜</a></li>';
        }
        if ($paged > $range + 1) {
            // 「最初へ」 の表示
            echo '<li><a href="' . get_pagenum_link(1) . '" class="page__link">1</a></li>';
        }
        if ($paged > $range + 2) {
            // ... の表示
            echo '<li>';
            echo '<div class="page__link disabled"></div>';
            echo '</li>';
        }
        for ($i = 1; $i <= $pages; $i++) {
            if ($i <= $paged + $range && $i >= $paged - $range) {
                // $paged +- $range 以内であればページ番号を出力
                if ($paged === $i) {
                    echo '<li><a class="page__link selected">' . $i . '</a></li>';
                } else {
                    echo '<li><a href="' . get_pagenum_link($i) . '" class="page__link">' . $i . '</a></li>';
                }
            }
        }
        if ($paged + $range + 1 < $pages) {
            // ... の表示
            echo '<li>';
            echo '<div class="page__link disabled"></div>';
            echo '</li>';
        }
        if ($paged + $range < $pages) {
            // 「最後へ」 の表示
            echo '<li><a href="' . get_pagenum_link($pages) . '" class="page__link u-d-n-sp">' . $pages . '</a></li>';
        }
        if ($paged < $pages) {
            // 「次へ」 の表示
            echo '<li><a href="' . get_pagenum_link($paged + 1) . '" class="page__link next">＞</a></li>';
        }
        echo '</ul>';
    }
}


// タイトルフィルター
function change_document_title_parts($title)
{
    if (is_front_page()) {
    } else {
        $title['site'] = 'NPO法人さいたまユースサポートネット';
    }
    return $title;
}
add_filter('document_title_parts', 'change_document_title_parts');

/*
* 現在のページのURL
*
*/
function get_current_link()
{
    return (is_ssl() ? 'https' : 'http') . '://' . $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"];
}

//URLコピーボタンのショートコード
function myshortcode_copy_btn()
{
    $url = get_permalink();
    $uri = get_template_directory_uri();
    return '
    <li><a data-clipboard-text="' . $url . '" class="copy_btn"><img src="' . $uri . '/images/single/btn_share_link_img01.svg" alt="link"></a></li>
    ';
}
add_shortcode('copy_btn', 'myshortcode_copy_btn');
