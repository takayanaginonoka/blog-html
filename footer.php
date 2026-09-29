<footer class="section footer">
    <div class="container">
        <button class="pagetop" type="button">
            <img src="images/topButton.png" alt="" class="top-btn">
        </button>
        <div class="footer-logo">
            <img src="<?php echo esc_url(get_theme_file_uri('images/logo.svg')) ?>" alt="happost">
        </div>
        <div class="grid-2-center">
            <ul class="footer-nav">
                <li><a href="index.html#blog">BLOG</a></li>
                <li><a href="index.html#keyword">KEYWORD</a></li>
                <li><a href="index.html#profile">PROFILE</a></li>
            </ul>
            <div class="sns-group">
                <img src="<?php echo esc_url(get_theme_file_uri('images/x.png')) ?>" alt="x" class="x">
                <img src="<?php echo esc_url(get_theme_file_uri('images/Instagram.png')) ?>" alt="Instagram">
            </div>
        </div>
        <p><small>&copy;2026&ensp;HAPPOST</small></p>
    </div>
</footer>
<?php wp_footer(); ?>
</body>

</html>