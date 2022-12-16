<?php

/**
 * documents Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create class attribute allowing for custom "className" and "align" values.
$className = 'section-documents';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}

// Load values and assign defaults.
$title = get_field('documents_title');

?>
<section id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">
    <div class="container">

        <?php if($title): ?>
            <h1 class="page-title"><?php echo $title; ?></h1>
        <?php endif; ?>

        <?php if(have_rows('documents')):
            $index = 0;
            ?>
            <div class="row justify-content-center">
                <div class="col-xl-8">
                    <div class="documents">
                        <?php while(have_rows('documents')): the_row(); 
                            $index++;
                            $icon = get_sub_field('icon');
                            $title = get_sub_field('title');
                            $document = get_sub_field('content');
                            $id = "modal-" . $index;
                            ?>
                            <button type="button" class="documents__item item-document" data-micromodal-trigger="<?php echo $id; ?>">
                                <?php if($icon): ?>
                                    <span class="item-document__icon-wrap">
                                        <img src="<?php echo $icon['url']; ?>" alt="<?php echo $icon['alt']; ?>" class="item-document__icon img-responsive">
                                    </span>
                                <?php endif; ?>
                                <span class="item-document__text title"><?php echo $title; ?></span>
                            </button>
                            <?php if($document): ?>
                                <div class="mm-modal micromodal-slide" id="<?php echo $id; ?>" aria-hidden="true">
                                    <div class="mm-modal__overlay" tabindex="-1" data-micromodal-close>
                                        <div class="mm-modal__wrapper" role="dialog" aria-modal="true">
                                            <div class="mm-modal__inner modal-content modal">
                                                <div class="modal-content__inner modal__inner">
                                                    <div class="modal-content__content content">
                                                        <?php echo $document; ?>
                                                    </div>
                                                </div>
                                                <button class="modal__close" aria-label="Close modal" data-micromodal-close>
                                                    <svg role="img">
                                                        <use href="<?php echo get_template_directory_uri(); ?>/assets/img/svg-sprite/sprite.svg#close"></use>
                                                    </svg>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endif; ?>
                        <?php endwhile; ?>
                    </div>
                </div>
            </div>
        <?php endif; ?>

    </div>
</section>