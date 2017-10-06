<?php if ($wp_query->max_num_pages >1): ?>
	<?php
	global $wp_query;
	$big = 999999999;
		$args = array(
			'base'         => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
			'format'       => '?page=%#%',
			'current' => max( 1, get_query_var('paged') ),
			'total' => $wp_query->max_num_pages,
			'end_size'     => 1,
			'mid_size'     => 2,
			'prev_next'    => True,
			'prev_text'    => __('<'),
			'next_text'    => __('>'),
			'type'         => 'list',
			'add_args'     => False,
			'add_fragment' => '',
			'before_page_number' => '',
			'after_page_number' => ''
		);
	?>

	<div class="row justify-content-sm-center text-center mt-5">
		<article class="col-sm-10">
			<?php $paginacion = paginate_links( $args ); ?>
			<?php echo str_replace("<ul class='page-numbers'>",'<ul class="blog__pagination">',$paginacion); ?>
		</article>
	</div>
<?php endif ?>