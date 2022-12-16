<?php

/**
 * Restore Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'restore-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'section-restore-password';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}

// Load values and assign defaults.
$title = get_field('restore_title');
$btn = get_field('restore_btn');

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
            
        <form class="form-auth form" action="/client/partner/password" name="formRestorePassword">
            <input type="hidden" class="restore-msg" value="<?php the_field('restore_msg'); ?>">
            <?php if(have_rows('restore_controls')): ?>
                <div class="form-auth__controls form__controls">
                    <div class="form-auth__row form__row row">
                        <?php while(have_rows('restore_controls')): the_row(); 
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
                            <div class="form-auth__col form__col col-12">
                                <div class="form-auth__group form__group">
                                    <input type="<?php echo $type; ?>" class="form-auth__control form__control control" autocomplete="off" placeholder="<?php echo $placeholder; ?>" name="<?php echo $name; ?>" data-required="<?php echo $type_validation; ?>" data-invalid-message="<?php echo $error_validation; ?>" <?php echo $error_notmatches ? 'data-password-notmatches="' . $error_notmatches . '"' : '' ?> <?php echo $server_errors; ?>>
                                </div>
                            </div>
                        <?php endwhile; ?>
                    </div>
                </div>
            <?php endif; ?>

            <?php if($btn): ?>
                <div class="form-auth__btns form__btns">
                    <button type="submit" class="form-auth__btn form__btn btn btn-lg btn-accent" disabled><?php echo $btn; ?></button>
                </div>
            <?php endif; ?>

        </form>

    </div>
</section>