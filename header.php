<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charaset') ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/destyle.css/destyle.min.css">
    <meta name="description" content="<?php bloginfo('description') ?>">
    <?php wp_head() ?>
</head>

<body <?php body_class() ?>>
    <?php wp_body_open(); ?>
    <header class="header">
        <h1 class="header-logo"><a href="<?php echo esc_url(home_url('/')); ?>"><img src="<?php echo esc_url(get_theme_file_uri('images/logo.svg')) ?>" alt="happost"></a></h1>

        <input type="checkbox" class="drawer-checkbox" id="drawer-checkbox">
        <label for="drawer-checkbox" class="drawer-btn">
            <span></span>
            <span></span>
            <span></span>
        </label>
        <nav class="gnav">
            <ul>
                <li><a href="<?php echo esc_url(home_url('/#blog')); ?>">BLOG</a></li>
                <li><a href="<?php echo esc_url(home_url('/#keyword')); ?>">KEYWORD</a></li>
                <li><a href="<?php echo esc_url(home_url('/#profile')); ?>">PROFILE</a></li>
            </ul>
        </nav>
    </header>