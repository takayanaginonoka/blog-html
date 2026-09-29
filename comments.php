<?php
if (post_password_required()) {
    return;
}
?>

<div id="comments" class="comments-area">

    <?php

    function reorder_comment_field($fields)
    {
        $new_fields = array(
            'author'  => $fields['author'],
            'email'   => $fields['email'],
            'url'     => $fields['url'],
            'cookies' => $fields['cookies'],
            'comment' => $fields['comment'],
        );

        return $new_fields;
    }
    $args = array(
        'title_reply'          => '',
        'comment_notes_before' => '',
        'comment_notes_after'  => '',
        // 名前入力欄（元のHTMLクラスをそのまま使用）
        'fields' => array(
            'author' =>
            '<div class="grid-2-one">
                <label for="author">お名前（ニックネーム）</label>
                <input id="author" name="author" type="text" class="form-input" placeholder="お名前（ニックネーム）を入力してください" value="" required>
            </div>',
            'email'   => '',
            'url'     => '',
            'cookies' => '',
        ),
        // コメント入力欄（元のHTMLクラスをそのまま使用）
        'comment_field' =>
        '<div class="grid-2-one">
            <label for="comment">コメント内容</label>
            <textarea id="comment" name="comment" class="form-input" required></textarea>
        </div>',
        // 送信ボタン
        'submit_button' =>
        '<button name="%1$s" type="submit" id="%2$s" class="btn">%4$s</button>',
        'label_submit' => 'SEND',
    );


    add_filter('comment_form_fields', 'reorder_comment_field');

    comment_form($args);


    ?>

    <!-- 投稿されたコメントの一覧を表示する箇所 -->
    <?php if (have_comments()) : ?>
        <h3 class="single-content-h3" style="margin-top: 3rem;">COMMENTS</h3>
        <ol class="comment-list" style="margin-top: 1rem; list-style: none;">
            <?php
            wp_list_comments(array(
                'style'       => 'ol',
                'short_ping'  => true,
                'avatar_size' => 0,
            ));
            ?>
        </ol>
    <?php endif; ?>

</div>