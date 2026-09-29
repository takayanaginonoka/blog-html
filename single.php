<?php get_header(); ?>
<main class="main">
    <div class="section main-visual">
        <div class="single-container">
            <h2 class="single-h2"><?php the_title(); ?></h2>
            <div class="flex">
                <?php
                $post_tags = get_the_tags();
                if (! empty($post_tags)) :
                    foreach ($post_tags as $tag) :
                ?>
                        <span class="keyword">#<?php echo esc_html($tag->name); ?></span>
                <?php
                    endforeach;
                endif;
                ?>
            </div>
            <span class="date">
                <time datetime="<?php echo get_the_date('Y-m-d') ?>">
                    <?php the_time('Y.n.j') ?>
                </time>
            </span>
            <div class="main-visual-img">
                <div class="ticker-bg">
                    <div class="ticker-track track-left">
                        <span>BLOG BLOG BLOG BLOG BLOG BLOG </span>
                        <span>BLOG BLOG BLOG BLOG BLOG BLOG </span>
                    </div>
                    <div class="ticker-track track-right">
                        <span>BLOG BLOG BLOG BLOG BLOG BLOG </span>
                        <span>BLOG BLOG BLOG BLOG BLOG BLOG </span>
                    </div>
                </div>
                <?php if (has_post_thumbnail()):
                    the_post_thumbnail('thumbnail');
                else: ?>
                    <img src="<?php echo esc_url(get_theme_file_uri('images/zenkiMain.png')) ?>" alt="">
                <?php endif ?>
            </div>
        </div>
    </div>
    <div class="section contents-back">
        <div class="contents">
            <div class="container">
                <h2>目次</h2>
                <?php echo do_shortcode('[ez-toc]'); ?>
            </div>
        </div>
    </div>
    <?php if (have_posts()):
        while (have_posts()):
            the_post();
    ?>
            <?php get_template_part('template-parts/single', 'post'); ?>
    <?php
        endwhile;
    endif;
    ?>
    <section class="section share">
        <div class="single-container">
            <h3 class="single-content-h3">記事をシェアする</h3>
            <div class="sns-group">
                <!-- X (旧Twitter) シェア -->
                <?php
                $share_url   = urlencode(get_permalink());
                $share_title = urlencode(get_the_title());
                $x_url       = "https://twitter.com/intent/tweet?url={$share_url}&text={$share_title}";
                ?>
                <a href="<?php echo esc_url($x_url); ?>" target="_blank" rel="noopener noreferrer" aria-label="Xでシェア">
                    <img src="<?php echo esc_url(get_theme_file_uri('images/x.png')); ?>" alt="X" class="x">
                </a>

                <!-- Instagram リンク (プロフィールまたはトップへ遷移) -->
                <a href="https://www.instagram.com/あなたのアカウント名/" target="_blank" rel="noopener noreferrer" aria-label="Instagram">
                    <img src="<?php echo esc_url(get_theme_file_uri('images/Instagram.png')); ?>" alt="Instagram">
                </a>

                <!-- URLコピーボタン -->
                <button type="button" id="js-copy-btn" class="copy-btn" data-url="<?php echo esc_url(get_permalink()); ?>" aria-label="URLをコピー">
                    <img src="<?php echo esc_url(get_theme_file_uri('images/link.png')); ?>" alt="link">
                </button>
            </div>
            <!-- コピー完了通知用のメッセージ表示エリア -->
            <p id="js-copy-msg" class="copy-msg" aria-live="polite"></p>

            <?php get_template_part('template-parts/nav', 'single'); ?>
        </div>
    </section>
    <section class="section same-tag bg-white">
        <div class="container">
            <h2>SAME TAG</h2>
            <div class="grid-3">

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
                            <a href="<?php the_permalink(); ?>" class="blog">
                                <?php get_template_part('template-parts/loop', 'post'); ?>
                            </a>

                        <?php
                        endwhile;
                        wp_reset_postdata(); // リセット
                        ?>
                    <?php else: ?>
                        <?php get_template_part('template-parts/loop', 'not'); ?>
                <?php endif;
                endif;
                ?>

            </div>
            <a href="<?php echo esc_url((home_url('/#blog'))) ?>" class="btn">ALL</a>
        </div>
    </section>
    <section class="section comment">
        <div class="container">
            <h2>COMMENT</h2>
            <div class="post-comments">
                <?php
                // コメントが開いているか、コメントが1件以上ある場合に表示
                if (comments_open() || get_comments_number()):
                    comments_template();
                endif;
                ?>
            </div>
        </div>
    </section>
</main>
<?php get_footer(); ?>