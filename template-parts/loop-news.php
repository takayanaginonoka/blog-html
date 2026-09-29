<article class="grid-2">
    <div class="news-img">
        <?php if (has_post_thumbnail()):
            the_post_thumbnail('thumbnail');
        else: ?>
            <img src="<?php echo esc_url(get_theme_file_uri('images/zenkiMain.png')) ?>" alt="">
        <?php endif ?>
    </div>
    <div>
        <?php
        $categories = get_the_category();
        if (! empty($categories)) :
        ?>
            <span class="news-category">
                <?php echo esc_html($categories[0]->name); ?>
            </span>
        <?php endif; ?>
        <p><?php the_title(); ?></p>
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
            <time datetime="<?php echo get_the_date('Y-m-d'); ?>">
                <?php the_time('Y.n.j') ?>
            </time>
        </span>
    </div>
</article>