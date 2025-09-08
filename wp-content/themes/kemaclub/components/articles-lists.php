<div class="mainpage-bottom">
    <div class="mainpage-bottom__article">
        <h3 class="mainpage-bottom__column-title">
            <a class="more-posts-link" href="/novosti">
                <?php echo 'Новости' ?>
            </a>
        </h3>
        <?php echo do_shortcode('[display-posts category="novosti" posts_per_page="4" order="DESC" orderby="date" include_content="false" display-posts wrapper="div"]'); ?>
    </div>
    <div class="mainpage-bottom__article">
        <h3 class="mainpage-bottom__column-title">
            <a class="more-posts-link" href="/stati">
                <?php echo 'Статьи' ?>
            </a>
        </h3>
        <?php echo do_shortcode('[display-posts category="stati" posts_per_page="4" order="DESC" orderby="date" include_content="false" display-posts wrapper="div"]'); ?>
    </div>
</div>