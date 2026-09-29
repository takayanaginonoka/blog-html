<div class="page-group pagination">
    <?php
    previous_post_link(
        '%link',
        '<span class="page-box"><span class="arrow arrow-prev"></span></span><span class="page-text">PREV</span>'
    );
    next_post_link(
        '%link',
        '<span class="page-text">NEXT</span><span class="page-box"><span class="arrow arrow-next"></span></span>'
    );
    ?>
</div>
<a href="<?php echo esc_url((home_url('/#blog'))) ?>" class="btn">ALL</a>