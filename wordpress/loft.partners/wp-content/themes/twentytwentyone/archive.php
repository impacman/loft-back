<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_One
 * @since Twenty Twenty-One 1.0
 */

get_header();

$description = get_the_archive_description();
?>

<div class="content-page">
	<?php if (have_posts()) : ?>
		<section class="section-posts">
			<div class="container">
		
				<h1 class="page-title"><?php echo get_the_archive_title(); ?></h1>
				<?php if ($description): ?>
					<div class="page-description"><?php echo wp_kses_post(wpautop( $description)); ?></div>
				<?php endif; ?>

				<div class="cards">
					<div class="cards__row row">
						<?php while (have_posts()) : ?>
							<?php the_post(); ?>
							<div class="cards__col col-xl-4 col-md-6">
								<a href="<?php the_permalink(); ?>" class="cards__item card card_sm">
									<?php if($img = get_the_post_thumbnail_url()): ?>
										<div class="card__img-wrap">
											<img src="<?php echo $img; ?>" alt="<?php echo get_the_title(); ?>" class="card__img img-responsive">
											<span class="card__date title"><?php echo get_the_date('d.m'); ?></span>
										</div>
									<?php else: ?>
										<span class="card__date card__date_static title"><?php echo get_the_date('d.m'); ?></span>
									<?php endif; ?>
									<div class="card__title title"><?php the_title(); ?></div>
									<div class="card__text-wrap">
										<p><?php echo mb_strimwidth(get_the_excerpt(), 0, 350); ?></p>
									</div>
									<?php if($btn = get_field('recommendations_btn', 'option')): ?>
										<div class="card__btn-wrap">
											<span class="card__btn btn btn-sm btn-accent"><?php echo $btn; ?></span>
										</div>
									<?php endif; ?>
								</a>
							</div>
						<?php endwhile; ?>
					</div>
				</div>
		
			</div>
		</section>
	<?php else: ?>
		<?php get_template_part('template-parts/content/content-none'); ?>
	<?php endif; ?>
</div>

<?php get_footer(); ?>
