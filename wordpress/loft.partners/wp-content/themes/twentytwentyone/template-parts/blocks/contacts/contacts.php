<?php

/**
 * Contacts Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create class attribute allowing for custom "className" and "align" values.
$className = 'section-contacts';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}

// Load values and assign defaults.
$title = get_field('contacts_title');

?>
<section id="contacts" class="<?php echo esc_attr($className); ?>">
    <div class="container">

        <?php if($title): ?>
            <h2 class="section-title"><?php echo $title; ?></h2>
        <?php endif; ?>

        <?php if(have_rows('contacts_contacts')): ?>
            <div class="contacts">
                <div class="contacts__row row">
                    <?php while(have_rows('contacts_contacts')): the_row(); 
                        $link = get_sub_field('link');
                        $icon = get_sub_field('icon');
                        $contact = get_sub_field('contact');
                        $value = get_sub_field('value');
                        $target = get_sub_field('target');
                        $target_val = $target ? '_blank' : '_self';
                        ?>
                        <div class="contacts__col col-xl-4 col-6">
                            <a href="<?php echo $link; ?>" class="contacts__item item-contacts" target="<?php echo $target_val; ?>">
                                <img src="<?php echo $icon['url']; ?>" alt="<?php echo $icon['alt']; ?>" class="item-contacts__icon img-responsive">
                                <div class="item-contacts__content">
                                    <div class="item-contacts__title"><?php echo $contact; ?></div>
                                    <div class="item-contacts__value title"><?php echo $value; ?></div>
                                </div>
                            </a>
                        </div>
                    <?php endwhile; ?>
                </div>
            </div>
        <?php endif; ?>

    </div>
</section>