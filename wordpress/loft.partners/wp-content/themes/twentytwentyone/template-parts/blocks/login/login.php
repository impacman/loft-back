<?php

/**
 * Login Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'login-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'section-auth';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}

// Load values and assign defaults.
$title = get_field('login_title');
$accent_link = get_field('login_accent_link');
$btn = get_field('login_btn');
$link = get_field('login_link');
$error = get_field('login_error');

?>
<section id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">
	
    <div class="stage" style="background-image: url(<?php echo get_template_directory_uri(); ?>/assets/img/main/bg.png);">
        <div class="container">

            <div class="stage__items">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/main/chip-1.png" alt="alt" class="stage__item rotating img-responsive">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/main/chip-2.png" alt="alt" class="stage__item rotating img-responsive">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/main/chip-3.png" alt="alt" class="stage__item rotating img-responsive">
            </div>

        </div>
    </div>

    <div class="container">

        <?php if($title): ?>
            <h1 class="page-title"><?php echo $title; ?></h1>
        <?php endif; ?>
            
        <form class="form-auth form" action="/client/partner/sign_in" name="formLogin">
            <input type="hidden" value="<?php echo $error; ?>" class="single-error">
            <?php if(have_rows('login_controls')): ?>
                <div class="form-auth__controls form__controls">
                    <div class="form-auth__row form__row row">
                        <?php while(have_rows('login_controls')): the_row(); 
                            $type = get_sub_field('type');
                            $type_input;
                            $placeholder = get_sub_field('placeholder');
                            $name = get_sub_field('name');
                            $error_validation = get_sub_field('error_validation');
                            $type_validation = 'shortStr';
                            $error_notmatches = get_sub_field('error_notmatches');
                            if($type === 'text') {
                                $type_input = 'text';
                                $type_validation = 'shortStr';
                            } else if($type === 'email') {
                                $type_input = 'email';
                                $type_validation = 'email';
                            } else if($type === 'password') {
                                $type_input = 'password';
                                $type_validation = 'notEmpty';
                            } else if($type === 'password2') {
                                $type_input = 'password';
                            } else if($type === 'code') {
                                $type_input = 'text';
                            }
                            ?>
                            <div class="form-auth__col form__col col-12">
                                <div class="form-auth__group form__group">
                                    <input
                                        type="<?php echo $type_input; ?>"
                                        class="form-auth__control form__control control"
                                        autocomplete="off"
                                        placeholder="<?php echo $placeholder; ?>"
                                        name="<?php echo $name; ?>"
                                        <?php echo $type !== 'code' ? 'data-required="'. $type_validation .'"' : '' ?>
                                        <?php echo $type !== 'code' ? 'data-invalid-message="'. $error_validation .'"' : '' ?>
                                        <?php echo $error_notmatches ? 'data-password-notmatches="' . $error_notmatches . '"' : '' ?>
                                    >
                                </div>
                            </div>
                        <?php endwhile; ?>
                    </div>
                </div>
            <?php endif; ?>
            
            <?php if($accent_link): ?>
                <div class="form-auth__restore-password-wrap form__restore-password-wrap">
                    <a href="<?php echo $accent_link['url']; ?>" class="form-auth__restore-password form__restore-password"><?php echo $accent_link['title']; ?></a>
                </div>
            <?php endif; ?>

            <?php if($btn): ?>
                <div class="form-auth__btns form__btns">
                    <button type="submit" class="form-auth__btn form__btn btn btn-lg btn-accent" disabled><?php echo $btn; ?></button>
                </div>
            <?php endif; ?>

            <?php if($link): ?>
                <div class="form-auth__links form__links">
                    <a href="<?php echo $link['url']; ?>" class="form-auth__link form__link"><?php echo $link['title']; ?></a>
                </div>
            <?php endif; ?>

        </form>

    </div>
</section>