<?php
#　初期設定(名声の名前は被らないようにしよう「例：mytheme_〇〇」)
function mytheme_setup()
{
    add_theme_support('post-thumbnails'); // アイキャッチ画像を有効化
    add_theme_support('title-tag'); // <title>タグの出力をWordPressに任せる（必須）
    add_theme_support('automatic-feed-links'); // RSSフィードのリンクを自動出力（必須）
    add_theme_support('wp-block-styles'); // ブロックエディタの基本スタイルをテーマに適用（Gutenberg対応）
    add_theme_support('responsive-embeds'); // YouTubeなどの埋め込み動画をレスポンシブ対応にする

    // HTML5準拠のマークアップを有効化（現代のテーマ開発で必須）
    add_theme_support('html5', array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
        'style',
        'script'
    ));

    // 絵文字のスクリプトとスタイルを削除（読み込み速度向上）
    remove_action('wp_head', 'print_emoji_detection_script', 7);
    remove_action('admin_print_scripts', 'print_emoji_detection_script');
    remove_action('wp_print_styles', 'print_emoji_styles');
    remove_action('admin_print_styles', 'print_emoji_styles');

    // セキュリティ強化
    remove_action('wp_head', 'wp_generator'); // WordPressのバージョン情報を削除
    remove_action('wp_head', 'rsd_link'); // EditURI（RSD）のリンクを削除
    remove_action('wp_head', 'wlwmanifest_link'); // wlwmanifest（Windows Live Writer）のリンクを削除


}
add_action('after_setup_theme', 'mytheme_setup');

/**
 * タイトルの区切り文字を変更
 */
function mytheme_change_title_separator($sep)
{
    return ' | ';
}
add_filter('document_title_separator', 'mytheme_change_title_separator');

/**
 * CSSとJavaScriptの読み込み
 */
function mytheme_enqueue_scripts()
{

    wp_enqueue_style('my-reset', 'https://cdn.jsdelivr.net/npm/destyle.css/destyle.min.css');

    wp_enqueue_style('my-style', get_stylesheet_uri(), array('my-reset'), filemtime(get_theme_file_path('/style.css')));

    wp_enqueue_style('my-googlefont', 'https://fonts.googleapis.com/css2?family=M+PLUS+Rounded+1c&family=Zen+Kaku+Gothic+New:wght@400;500;700&display=swap');

    wp_enqueue_script('my-script', get_theme_file_uri('/script.js'), array('jquery'), filemtime(get_theme_file_path('/script.js')), true);
}
add_action('wp_enqueue_scripts', 'mytheme_enqueue_scripts');
