<?php

/**
 * Showcase Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'showcase-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'section-showcase';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}

// Load values and assign defaults.
$title = get_field('showcase_title');
$text = get_field('showcase_text');
$btn = get_field('showcase_btn');
$img = get_field('showcase_img');
$modal_id = get_field('showcase_modal_id');
$is_modal = get_field('showcase_modal');
$show_modal;
if($is_modal === 'Да') {
    $show_modal = true;
} else {
    $show_modal = false;
}

?>
<section id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">
    <div class="stage">
        <div class="container">

            <div class="stage__items">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/main/chip-1.png" alt="alt" class="stage__item rotating img-responsive">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/main/chip-2.png" alt="alt" class="stage__item rotating img-responsive">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/main/chip-3.png" alt="alt" class="stage__item rotating img-responsive">
            </div>

        </div>
    </div>

    <div class="container">

        <div class="showcase">
            <?php if($img): ?>
                <div class="showcase__img-wrap">
                    <img src="<?php echo $img['url']; ?>" alt="<?php echo $img['alt']; ?>" class="showcase__img img-responsive">
                </div>
            <?php endif; ?>
            <h1 class="showcase__title page-title"><?php echo $title; ?></h1>
            <div class="showcase__text-wrap">
                <?php echo $text; ?>
            </div>
            <?php if($btn):
                $btn_url = $btn['url'];
                $btn_title = $btn['title'];
                $btn_target = $btn['target'] ? $btn['target'] : '_self';
                
            ?>
            <div class="showcase__btn-wrap">
                <?php if($show_modal): ?>
                    <button type="button" class="showcase__btn btn btn-lg btn-accent" data-micromodal-trigger="<?php echo $modal_id; ?>"><?php echo esc_html($btn_title); ?></button>
                <?php else: ?>
                    <a href="<?php echo esc_url($btn_url); ?>" target="<?php echo esc_attr( $btn_target ); ?>" class="showcase__btn btn btn-lg btn-accent"><?php echo esc_html($btn_title); ?></a>
                <?php endif; ?>
            </div>
            <?php endif; ?>
        </div>

    </div>
</section>