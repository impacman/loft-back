<?php

/**
 * Register Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'register-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'section-callback';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}

// Load values and assign defaults.
$title = get_field('register_title');
$btn = get_field('register_btn');
$link = get_field('register_link');

?>
<section id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">
    <div class="container">

        <div class="row justify-content-center">
            <div class="col-xl-8">
                <?php if($title): ?>
                    <h2 class="section-title"><?php echo $title; ?></h2>
                <?php endif; ?>

                <form class="form-join form" autocomplete="off" action="/client/partner" name="formJoin">
                    <input type="hidden" class="register-msg" value="<?php the_field('register_msg'); ?>">

                    <?php if(have_rows('register_controls')): ?>
                        <div class="form-join__controls form__controls">
                            <div class="form-join__row form__row row">
                                <?php while(have_rows('register_controls')): the_row(); ?>
                                    <?php if(get_row_layout() == 'input'):
                                        $type = get_sub_field('type');
                                        $placeholder = get_sub_field('placeholder');
                                        $name = get_sub_field('name');
                                        $error_validation = get_sub_field('error_validation');
                                        $type_validation = 'shortStr';
                                        $error_notmatches = get_sub_field('error_notmatches');
                                        if($type === 'text') {
                                            $type_validation = 'shortStr';
                                        } else if($type === 'email') {
                                            $type_validation = 'email';
                                        } else if($type === 'password') {
                                            $type_validation = 'notEmpty';
                                        } else if($type === 'password2') {
                                            $type = 'password';
                                        }

                                        $server_errors = '';
                                        if(have_rows('errors_server')):
                                            while (have_rows('errors_server')) : the_row();
                                                if(get_row_layout() == 'blank'):
                                                    $text = get_sub_field('text');
                                                    $server_errors .= ' data-blank="'.$text.'" ';
                                                elseif(get_row_layout() == 'not_found'): 
                                                    $text = get_sub_field('text');
                                                    $server_errors .= ' data-not-found="'.$text.'" ';
                                                elseif(get_row_layout() == 'wrong_email'): 
                                                    $text = get_sub_field('text');
                                                    $server_errors .= ' data-wrong-email="'.$text.'" ';
                                                elseif(get_row_layout() == 'too_short'): 
                                                    $text = get_sub_field('text');
                                                    $server_errors .= ' data-too-short="'.$text.'" ';
                                                elseif(get_row_layout() == 'too_long'): 
                                                    $text = get_sub_field('text');
                                                    $server_errors .= ' data-too-long="'.$text.'" ';
                                                elseif(get_row_layout() == 'too_long_70'): 
                                                    $text = get_sub_field('text');
                                                    $server_errors .= ' data-too-long-s="'.$text.'" ';
                                                elseif(get_row_layout() == 'not_matches'): 
                                                    $text = get_sub_field('text');
                                                    $server_errors .= ' data-not-matches-server="'.$text.'" ';
                                                endif;
                                            endwhile;
                                        endif;

                                        ?>
                                        <div class="form-join__col form__col col-md-6">
                                            <div class="form-join__group form__group">
                                                <input type="<?php echo $type; ?>" class="form-join__control form__control control" autocomplete="off" placeholder="<?php echo $placeholder; ?>" name="<?php echo $name; ?>" data-required="<?php echo $type_validation; ?>" data-invalid-message="<?php echo $error_validation; ?>" <?php echo $error_notmatches ? 'data-password-notmatches="' . $error_notmatches . '"' : '' ?> <?php echo $server_errors; ?>>
                                            </div>
                                        </div>
                                    <?php elseif(get_row_layout() == 'contact_type'): 
                                        $default = get_sub_field('default');
                                        $messenger = get_sub_field('messenger');
                                        $skype = get_sub_field('skype');
                                        ?>
                                        <div class="form-join__col form__col col-md-6">
                                            <div class="form-join__group form__group">
                                                <select class="form-join__select form__select select">
                                                    <option value="telegram" <?php echo $default === $messenger ? 'selected' : '' ?>><?php echo $messenger; ?></option>
                                                    <option value="skype" <?php echo $default === $skype ? 'selected' : '' ?>><?php echo $skype; ?></option>
                                                </select>
                                            </div>
                                        </div>
                                    <?php endif; ?>
                                <?php endwhile; ?>
                            </div>
                        </div>
                    <?php endif; ?>

                    <?php if(have_rows('register_checkboxes')): ?>
                        <div class="form-join__checkboxes form__checkboxes">
                            <?php while(have_rows('register_checkboxes')): the_row(); 
                                $name = get_sub_field('name');
                                $text = get_sub_field('text');
                                $checked = get_sub_field('checked');
                                ?>
                                <label class="form-join__checkbox form__checkbox checkbox">
                                    <input type="checkbox" class="checkbox__input" <?php echo $checked ? 'checked' : '' ?> name="<?php echo $name; ?>">
                                    <span class="checkbox__box"></span>
                                    <span class="checkbox__text"><?php echo $text; ?></span>
                                </label>
                            <?php endwhile; ?>
                        </div>
                    <?php endif; ?>
                        
                    <?php if($btn): ?>
                        <div class="form-join__btns form__btns">
                            <button type="submit" class="form-join__btn form__btn btn btn-lg btn-accent" disabled><?php echo $btn; ?></button>
                        </div>
                    <?php endif; ?>

                    <?php if($link): ?>
                        <div class="form-join__links form__links">
                            <a href="<?php echo $link['url']; ?>" class="form-join__link form__link"><?php echo $link['title']; ?></a>
                        </div>
                    <?php endif; ?>

                </form>

            </div>
        </div>

    </div>
</section>