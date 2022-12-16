<?php

/**
 * Faq Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create class attribute allowing for custom "className" and "align" values.
$className = 'section-faq';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}

// Load values and assign defaults.
$title = get_field('faq_title');

?>
<section id="faq" class="<?php echo esc_attr($className); ?>">
    <div class="container">

        <?php if($title): ?>
            <h2 class="section-title"><?php echo $title; ?></h2>
        <?php endif; ?>

        <?php if(have_rows('faq_faqs')): ?>
            <div class="row justify-content-center">
                <div class="col-xl-8">
                    <div class="faq">
                        <div class="faq__items">
                            <?php while(have_rows('faq_faqs')): the_row(); 
                                $question = get_sub_field('question');
                                $answer = get_sub_field('answer');
                                ?>
                                <div class="faq__item item-faq">
                                    <div class="item-faq__header">
                                        <div class="item-faq__title title"><?php echo $question; ?></div>
                                        <div class="item-faq__toggle toggle">
                                            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/icons/arrow-right.svg" alt="alt" class="toggle__icon">
                                        </div>
                                    </div>
                                    <div class="item-faq__body">
                                        <?php echo $answer; ?>
                                    </div>
                                </div>
                            <?php endwhile; ?>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>

    </div>
</section>