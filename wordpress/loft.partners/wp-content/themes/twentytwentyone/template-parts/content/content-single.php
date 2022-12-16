<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_One
 * @since Twenty Twenty-One 1.0
 */
?>
<div id="post-<?php the_ID(); ?>" <?php post_class('content-page'); ?>>
	<section class="section-post">
		<div class="container">
	
			<h1 class="page-title"><?php echo get_the_category()[0]->name; ?></h1>
			
			<div class="content-card card card_lg">
				<?php if($img = get_the_post_thumbnail_url()): ?>
					<div class="card__img-wrap">
						<img src="<?php echo $img; ?>" alt="<?php echo get_the_title(); ?>" class="card__img img-responsive">
						<span class="card__date title"><?php echo get_the_date('d.m'); ?></span>
					</div>
				<?php else: ?>
					<span class="card__date card__date_static title"><?php echo get_the_date('d.m'); ?></span>
				<?php endif; ?>
				<div class="card__title title"><?php echo get_the_title(); ?></div>
				<div class="card__text-wrap content">
					<?php the_content(); ?>
				</div>
			</div>
	
		</div>
	</section>
	
	<?php get_template_part('template-parts/related-posts/related-posts'); ?>
</div>