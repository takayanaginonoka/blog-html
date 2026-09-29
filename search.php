<?php get_header(); ?>
<main class="main">
    <div class="section main-visual">
        <div class="letter-animation">
            <div class="letter-photos">
                <img src="<?php echo esc_url(get_theme_file_uri('images/local7.png')) ?>" alt="" class="photo photo1">
                <img src="<?php echo esc_url(get_theme_file_uri('images/localMain.png')) ?>" alt="" class="photo photo2">
            </div>
            <div class="letter-envelope">
                <img src="<?php echo esc_url(get_theme_file_uri('images/letter1.png')) ?>" alt="" class="letter-part letter1">
                <img src="<?php echo esc_url(get_theme_file_uri('images/letter2.png')) ?>" alt="" class="letter-part letter2">
                <img src="<?php echo esc_url(get_theme_file_uri('images/letter3.png')) ?>" alt="" class="letter-part letter3">
                <img src="<?php echo esc_url(get_theme_file_uri('images/letter4.png')) ?>" alt="" class="letter-part letter4">
                <img src="<?php echo esc_url(get_theme_file_uri('images/letter5.png')) ?>" alt="" class="letter-part letter5">
                <img src="<?php echo esc_url(get_theme_file_uri('images/letter6.png')) ?>" alt="" class="letter-part letter6">
            </div>
        </div>
        <section class="section news-parent">
            <div class="news">
                <h2>NEWS</h2>
                <?php
                // 最新記事を1件取得する条件
                $news_args = array(
                    'post_type'      => 'post',      // 通常の投稿
                    'posts_per_page' => 1,           // 1件のみ取得
                    'orderby'        => 'date',      // 日付順
                    'order'          => 'DESC',      // 新しい順
                );


                $news_query = new WP_Query($news_args);

                if ($news_query->have_posts()) :
                    while ($news_query->have_posts()) : $news_query->the_post(); ?>
                        <a href="<?php the_permalink(); ?>">
                            <?php get_template_part('template-parts/loop', 'news'); ?>
                        </a>
                    <?php
                    endwhile;
                    wp_reset_postdata(); // ループのリセット（必須）
                    ?>
                <?php else: ?>
                    <?php get_template_part('template-parts/loop', 'not'); ?>
                <?php endif; ?>
            </div>
        </section>
    </div>
    <section class="section bg-white topics">
        <div class="container">
            <h2>TOPICS</h2>
            <div class="grid-2">
                <!-- サブループの書き方（概要） -->
                <?php
                // 1. 取得したい記事の「条件」を配列で指定する
                $args = array(
                    'post_type'      => 'post',
                    'tag'            => 'pickup', // タグのスラッグを指定
                    'posts_per_page' => 3,
                );

                // 2. 条件をセットして新しいループ（サブループ）を作る
                $custom_query = new WP_Query($args);

                // 3. サブループを開始
                if ($custom_query->have_posts()) :
                    while ($custom_query->have_posts()) : $custom_query->the_post();
                ?>
                        <a href="<?php the_permalink(); ?>">
                            <!-- 記事の出力 -->
                            <?php get_template_part('template-parts/loop', 'pickup'); ?>
                        </a>
                    <?php
                    endwhile;
                    // 4. 【重要】サブループが終わったら、必ずメインループのデータにリセットする
                    wp_reset_postdata();
                else:
                    ?>
                    <?php get_template_part('template-parts/loop', 'not'); ?>
                <?php endif; ?>
            </div>
            <div class="ride-img">
                <img src="<?php echo esc_url(get_theme_file_uri('images/ride.png')) ?>" alt="">
            </div>
        </div>
    </section>
    <section class="section blog" id="blog">
        <div class="container">
            <h2>BLOG</h2>
            <p class="archive=title">
                「<?php echo get_search_query(); ?>」の検索結果
            </p>
            <div class="grid-2">
                <div>
                    <?php get_sidebar(); ?>
                </div>
                <div class="grid-3 shift">
                    <?php if (have_posts()):
                        while (have_posts()):
                            the_post();
                    ?>
                            <a href="<?php the_permalink(); ?>" class="blog">
                                <?php get_template_part('template-parts/loop', 'post') ?>
                            </a>
                        <?php endwhile; ?>
                        <div class="page-group">
                            <?php the_posts_pagination(
                                array(
                                    'prev_text' => '←',
                                    'next_text' => '→',
                                    'type' => 'list',
                                    'mid_size' => 1
                                )
                            ); ?>
                        </div>
                    <?php else: ?>
                        <?php get_template_part('template-parts/loop', 'not') ?> <?php endif; ?>
                </div>
                <div class="character-img">
                    <img src="<?php echo esc_url(get_theme_file_uri('images/character.png')) ?>" alt="">
                </div>
            </div>
    </section>
    <section class="section bg-white" id="keyword">
        <div class="container">
            <h2>KEY WORD</h2>
            <div class="flex">
                <span class="keyword">#日常</span>
                <span class="keyword">#勉強</span>
                <span class="keyword">#UI/UX</span>
                <span class="keyword">#グルメ</span>
                <span class="keyword">#HTML</span>
                <span class="keyword">#CSS</span>
                <span class="keyword">#Java Script</span>
                <?php  ?>
            </div>
        </div>
    </section>
    <section class="section profile" id="profile">
        <div class="container">
            <h2>PROFILE</h2>
            <div class="profile-card grid-2-one">
                <div class="profile-content">
                    <h3>TAKAYANAGI</h3>
                    <p>トライデントコンピューター専門学校<br>Webデザイン学科</p>
                    <div>
                        <p>寝ることとアイドルが好き<br>趣味は映画鑑賞でAmazonプライムで映画を観ています</p>
                    </div>
                </div>
                <div class="profile-img">
                    <img src="<?php echo esc_url(get_theme_file_uri('images/profile.png')) ?>" alt="">
                </div>
            </div>
        </div>
    </section>
</main>
<?php get_footer(); ?>