<?php get_header(); ?>

<h2>PAGE(page.php) - remove this in production</h2>

<div class="single-container">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <?php if ( have_posts() ): ?>
                    <?php while( have_posts() ): the_post(); ?>
                        <div class="title-part">
                            <h2 class="opensans-bold"><?php the_title(); ?></h2>
                            <p class="date opensans-bold"><?php the_date(); ?> <span class="opensans-light">by</span> <?php the_author(); ?></p>
                        </div>
                        <div class="content-part">
                            <?php the_content(); ?>
                        </div>
                    <?php endwhile ?>
                <?php endif ?>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
</div>

<?php get_footer();