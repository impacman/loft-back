<?php

/**
 * Terms Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'terms-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'section-terms';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}

// Load values and assign defaults.
$title = get_field('terms_title');

?>
<section id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">
    <div class="container">

        <?php if($title): ?>
            <h2 class="section-title"><?php echo $title; ?></h2>
        <?php endif; ?>

        <?php if(have_rows('terms_terms')): ?>
            <div class="terms">
                <div class="terms__row row">
                    <?php while(have_rows('terms_terms')): the_row(); 
                        $icon = get_sub_field('icon');
                        $title = get_sub_field('title');
                        ?>
                        <div class="terms__col col-lg-4 col-6">
                            <div class="terms__item item-term">
                                <?php if($icon): ?>
                                    <img src="<?php echo $icon['url']; ?>" alt="<?php echo $icon['alt']; ?>" class="item-term__icon img-responsive">
                                <?php endif; ?>
                                <div class="item-term__title title"><?php echo $title; ?></div>
                            </div>
                        </div>
                    <?php endwhile; ?>
                </div>
            </div>
        <?php endif; ?>

        <?php if(have_rows('terms_countries')): ?>
            <div class="countries">
                <div class="countries__row row">
                    <?php while(have_rows('terms_countries')): the_row(); 
                        $flag = get_sub_field('flag');
                        $title = get_sub_field('country');
                        ?>
                        <div class="countries__col">
                            <div class="countries__item item-country">
                                <?php if($flag): ?>
                                    <img src="<?php echo $flag['url']; ?>" alt="<?php echo $flag['alt']; ?>" class="item-country__img img-responsive">
                                <?php endif; ?>
                                <div class="item-country__title"><?php echo $title; ?></div>
                            </div>
                        </div>
                    <?php endwhile; ?>
                </div>
            </div>
        <?php endif; ?>

        <?php if(have_rows('terms_logos')): ?>
            <div class="partners">
                <div class="partners__row row">
                    <?php while(have_rows('terms_logos')): the_row(); 
                        $logo = get_sub_field('logo');
                        ?>
                        <div class="partners__col">
                            <div class="partners__item item-partner">
                                <img src="<?php echo $logo['url']; ?>" alt="<?php echo $logo['alt']; ?>" class="item-partner__img img-responsive">
                            </div>
                        </div>
                    <?php endwhile; ?>
                </div>
            </div>
        <?php endif; ?>

    </div>
</section>