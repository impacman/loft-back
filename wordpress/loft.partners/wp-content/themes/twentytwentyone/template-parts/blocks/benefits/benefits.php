<?php

/**
 * Benefits Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create class attribute allowing for custom "className" and "align" values.
$className = 'section-benefits';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}

// Load values and assign defaults.
$title = get_field('benefits_title');

?>
<section id="benefits" class="<?php echo esc_attr($className); ?>">
    <div class="container">

        <?php if($title): ?>
            <h2 class="section-title"><?php echo $title; ?></h2>
        <?php endif; ?>

        <?php if(have_rows('benefits_benefits')): ?>
            <div class="benefits">
                <div class="benefits__row row">
                    <?php while(have_rows('benefits_benefits')): the_row(); 
                        $img = get_sub_field('img');
                        $title = get_sub_field('title');
                        $text = get_sub_field('text');
                        ?>
                        <div class="benefits__col col-xl-4 col-md-6">
                            <div class="benefits__item item-benefit">
                                <?php if($img): ?>
                                    <div class="item-benefit__img-wrap">
                                        <img src="<?php echo $img['url']; ?>" alt="<?php echo $img['alt']; ?>" class="item-benefit__img img-responsive">
                                    </div>
                                <?php endif; ?>
                                <div class="item-benefit__content">
                                    <div class="item-benefit__title title"><?php echo $title; ?></div>
                                    <div class="item-benefit__text"><?php echo $text; ?></div>
                                </div>
                            </div>
                        </div>
                    <?php endwhile; ?>
                </div>
            </div>
        <?php endif; ?>

    </div>
</section>