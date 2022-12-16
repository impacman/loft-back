<?php

/**
 * News Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'news-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'section-news';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}

// Load values and assign defaults.
$title = get_field('news_title');
?>

<section id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">
    <div class="container">

        <?php if($title): ?>
            <h2 class="section-title"><?php echo $title; ?></h2>
        <?php endif; ?>

        <?php if(have_rows('news_news')): ?>
            <div class="row justify-content-center">
                <div class="col-xl-8">
                    <div class="slider-news slider swiper">
                        <div class="slider-news__items slider__items swiper-wrapper">
                        <?php while(have_rows('news_news')): the_row(); 
                            $post = get_sub_field('post');
                            ?>
                            <div class="slider-news__slide slider__slide swiper-slide">
                                <a href="<?php echo get_the_permalink($post); ?>" class="card card_md">
                                    <?php if($img = get_the_post_thumbnail_url($post)): ?>
                                        <div class="card__img-wrap">
                                            <img src="<?php echo $img; ?>" alt="<?php echo $post->post_title; ?>" class="card__img img-responsive">
                                            <span class="card__date title"><?php echo get_the_date('d.m', $post); ?></span>
                                        </div>
                                    <?php else: ?>
                                        <span class="card__date card__date_static title"><?php echo get_the_date('d.m', $post); ?></span>
                                    <?php endif; ?>
                                    <div class="card__title title"><?php echo $post->post_title; ?></div>
                                    <div class="card__text-wrap">
                                        <p><?php echo mb_strimwidth(get_the_excerpt($post), 0, 270); ?></p>
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
            </div>
        <?php endif; ?>

    </div>
</section>