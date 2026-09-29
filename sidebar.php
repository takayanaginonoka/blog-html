<select required class="form-input" onchange="if (this.value) window.location.href=this.value;">
    <!-- ALL選択時：投稿一覧ページ（またはトップページ）のURLを指定 -->
    <option value="<?php echo esc_url(get_post_type_archive_link('post')); ?>">ALL</option>

    <?php
    // 現在表示しているカテゴリーのIDを取得（選択状態を維持するため）
    $current_cat = get_queried_object();
    $current_cat_id = isset($current_cat->term_id) ? $current_cat->term_id : 0;

    $categories = get_categories(array(
        'hide_empty' => false,
    ));

    foreach ($categories as $category) :
        // 現在開いているカテゴリーページの場合は selected を付与
        $selected = ($current_cat_id === $category->term_id) ? 'selected' : '';
    ?>
        <option value="<?php echo esc_url(get_category_link($category->term_id)); ?>" <?php echo $selected; ?>>
            <?php echo esc_html($category->name); ?>
        </option>
    <?php endforeach; ?>
</select>
<div class="blog-category form-input">
    <ul class="blog-category-back">
        <!-- パソコン版：ALLの項目を追加 -->
        <li class="<?php echo (!is_category()) ? 'current-cat' : ''; ?>">
            <a href="<?php echo esc_url(get_post_type_archive_link('post')); ?>">ALL</a>
        </li>

        <!-- WordPressから自動出力されるカテゴリーリスト -->
        <?php wp_list_categories(array(
            'title_li' => '',
        )); ?>
    </ul>
</div>
<div>
    <?php get_search_form(); ?>
</div>