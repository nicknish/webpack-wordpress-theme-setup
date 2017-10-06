<?php get_header(); ?>
	<div class="error__wrapper">
		<div class="error__header">
			<h1>404</h1>
		</div>
		<div class="error__footer">
			<img src="<?php echo get_template_directory_uri(); ?>/assets/img/404.gif">
			<p class="text-center mt-3">
				<a href="<?= get_post_type_archive_link( 'project' ); ?>" class="btn btn-default btn-default-custom">Home</a>
			</p>
		</div>
	</div>
<?php get_footer(); ?>