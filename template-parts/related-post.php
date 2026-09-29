<section class="related-posts">
    <h2>関連記事</h2>

    <?php
    // 1. 今見ている記事のカテゴリー情報を取得
    $categories = get_the_category();

    // カテゴリーが存在する場合のみサブループを実行
    if (! empty($categories)) :
        $cat_id = $categories[0]->term_id; // 1つ目のカテゴリーのIDを取得

        // 2. 条件を指定
        $args = array(
            'post_type'      => 'post',
            'cat'            => $cat_id,
            'posts_per_page' => 3,
            'post__not_in'   => array(get_the_ID()), // 今の記事IDを除外
            'orderby'        => 'rand',                // ランダム表示
        );

        $related_query = new WP_Query($args);

        if ($related_query->have_posts()) :
            while ($related_query->have_posts()) : $related_query->the_post();
    ?>
                <!-- パーツの呼び出し -->
                <?php get_template_part('template-parts/loop', 'post'); ?>

    <?php
            endwhile;
            wp_reset_postdata(); // リセット
        endif;
    endif;
    ?>
</section>