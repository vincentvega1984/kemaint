<div class="mainpage-bottom">
    <div class="mainpage-bottom__article">
        <h3 class="mainpage-bottom__column-title">
            <a class="more-posts-link" href="/news">
                <?php echo 'Latest News' ?>
            </a>
        </h3>
        <?php echo do_shortcode('[display-posts category="news" posts_per_page="4" order="DESC" orderby="date" include_content="false" display-posts wrapper="div"]'); ?>
    </div>
</div>