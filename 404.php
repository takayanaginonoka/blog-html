<?php get_header(); ?>
<main class="main">
    <div class="container">
        <h2 class="error-h2">404</h2>
        <p class="error-p">お探しのページは見つかりませんでした。<br>URLが間違っているか、ページが移動または削除された可能性があります。</p>
        <img src="<?php echo esc_url(get_theme_file_uri('images/character_404.png')) ?>" alt="" class="error-img">
        <p><a href="<?php echo esc_url(home_url('/')); ?>" class="erorr-link">トップページへ戻る</a></p>
    </div>
</main>
<?php get_footer(); ?>