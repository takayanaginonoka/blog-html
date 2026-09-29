                    <article class="topics-card">
                        <div class="topics-card-img">
                            <?php if (has_post_thumbnail()):
                                the_post_thumbnail('thumbnail');
                            else: ?>
                                <img src="<?php echo esc_url(get_theme_file_uri('images/zenkiMain.png')) ?>" alt="">
                            <?php endif ?>
                            <?php
                            $categories = get_the_category();
                            if (! empty($categories)) :
                            ?>
                                <span class="blog-card-category">
                                    <?php echo esc_html($categories[0]->name); ?>
                                </span>
                            <?php endif; ?>
                        </div>
                        <h3><?php the_title(); ?></h3>
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
                    </article>