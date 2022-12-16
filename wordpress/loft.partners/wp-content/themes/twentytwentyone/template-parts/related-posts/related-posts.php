<?php
$related_posts = get_posts(array(
    'numberposts' => 3,
    'category'    => 0,
    'orderby'     => 'date',
    'order'       => 'DESC',
    'include'     => array(),
    'exclude'     => array(),
    'meta_key'    => '',
    'meta_value'  =>'',
    'post_type'   => 'post',
    'suppress_filters' => true,
));
?>     

<section class="section-post-recommendations">
    <div class="container">

        <?php if($title = get_field('recommendations_title', 'option')): ?>
            <h2 class="page-title"><?php echo $title; ?></h2>
        <?php endif; ?>

        <?php if($related_posts): ?>
            <div class="cards">
                <div class="cards__row row">
                    <?php foreach($related_posts as $post):
                        setup_postdata($post);
                    ?>
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
                    <?php endforeach; ?>
                </div>
            </div>
        <?php endif; ?>
        
        <?php wp_reset_postdata(); ?>

    </div>
</section>