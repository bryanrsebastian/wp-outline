<?php get_header(); ?>

<h2>ARCHIVE(archive.php) - remove this in production</h2>

<div class="archive-container">
	<div class="container">
		<div class="row">
			<?php if ( have_posts() ): ?>
				<?php while( have_posts() ): the_post(); ?>
					<div class="col-md-4 col-xs-6">
						<div class="post-item">
							<div class="details">
								<h2><?php echo $post->post_title ?></h2>
								<p class="excerpt"><?php echo $post->post_excerpt ?></p>
							</div>
							<a href="<?php echo get_permalink( $post->ID ); ?>" class="text-center fade-effect">READ MORE</a>
						</div>
					</div>
				<?php endwhile ?>
				<div class="clearfix"></div>
			<?php endif ?>
		</div>
	</div>
</div>

<?php get_footer();