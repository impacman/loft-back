<footer class="footer">
	<div class="footer__container container">

		<div class="footer__row row">
			<?php if($copyright = get_field('footer_copyright', 'option')): ?>
				<div class="footer__col footer__col_copyright">
					<p class="footer__copyright"><?php echo $copyright; ?></p>
				</div>
			<?php endif; ?>
			<?php if(have_rows('footer_socials', 'option')): ?>
				<div class="footer__col footer__col_socials">
					<div class="footer__socials socials">
						<?php while(have_rows('footer_socials', 'option')): the_row(); 
							$link = get_sub_field('link');
							$svg = get_sub_field('icon');
							?>
							<a href="<?php echo $link; ?>" class="socials__item item-social" target="_blank">
								<svg class="item-social__icon" role="img">
									<use href="<?php echo get_template_directory_uri(); ?>/assets/img/svg-sprite/sprite.svg<?php echo $svg; ?>"></use>
								</svg>
							</a>
						<?php endwhile; ?>
					</div>
				</div>
			<?php endif; ?>
			<?php if(have_rows('footer_links', 'option')): ?>
				<div class="footer__col footer__col_links">
					<ul class="footer__links">
						<?php while(have_rows('footer_links', 'option')): the_row(); 
							$link = get_sub_field('link');
							$link_url = $link['url'];
							$link_title = $link['title'];
							$link_target = $link['target'] ? $link['target'] : '_self';
							?>
							<li><a href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html($link_title); ?></a></li>
						<?php endwhile; ?>
					</ul>
				</div>
			<?php endif; ?>
		</div>

	</div>
</footer>

<?php if(has_nav_menu('sidemenu')): ?>
	<aside class="panel-sidebar">
		<?php
		wp_nav_menu([
			'theme_location'  => 'sidemenu',
			'menu'            => '',
			'container'       => 'nav',
			'container_class' => 'panel-sidebar__nav',
			'container_id'    => '',
			'menu_class'      => 'panel-sidebar__list',
			'menu_id'         => '',
			'echo'            => true,
			'fallback_cb'     => 'wp_page_menu',
			'before'          => '',
			'after'           => '',
			'link_before'     => '',
			'link_after'      => '',
			'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
			'depth'           => 0,
			'walker'          => '',
		]);
		?>
	</aside>
<?php endif; ?>

<div class="mm-modal micromodal-slide" id="modal-login" aria-hidden="true">
	<div class="mm-modal__overlay" tabindex="-1" data-micromodal-close>
		<div class="mm-modal__wrapper" role="dialog" aria-modal="true">
			<div class="mm-modal__inner modal-auth modal">
				<div class="modal-auth__inner modal__inner">
					<h2 class="modal-auth__title page-title"><?php echo get_field('modal_login_title', 'option'); ?></h2>

					<form class="modal-auth__form form-auth form form_dark" action="/client/partner/sign_in" name="modalFormLogin">
						<input type="hidden" value="<?php echo get_field('modal_login_error', 'option'); ?>" class="single-error">
						<?php if(have_rows('modal_login_controls', 'option')): ?>
							<div class="form-auth__controls form__controls">
								<div class="form-auth__row form__row row">
									<?php while(have_rows('modal_login_controls', 'option')): the_row(); 
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
													class="form-auth__control form__control control control_dark"
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
						<?php if($accent_link = get_field('modal_login_accent_link', 'option')): ?>
							<div class="form-auth__restore-password-wrap form__restore-password-wrap">
								<button type="button" class="form-auth__restore-password form__restore-password"><?php echo $accent_link; ?></button>
							</div>
						<?php endif; ?>
						<?php if($btn = get_field('modal_login_btn', 'option')): ?>
							<div class="form-auth__btns form__btns">
								<button type="submit" class="form-auth__btn form__btn btn btn-lg btn-accent" disabled><?php echo $btn; ?></button>
							</div>
						<?php endif; ?>
						<?php if($link = get_field('modal_login_link', 'option')): ?>
							<div class="form-auth__links form__links">
								<a href="<?php echo $link['url']; ?>" class="form-auth__link form__link"><?php echo $link['title']; ?></a>
							</div>
						<?php endif; ?>
					</form>
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

<div class="mm-modal micromodal-slide" id="modal-restore-password" aria-hidden="true">
	<div class="mm-modal__overlay" tabindex="-1" data-micromodal-close>
		<div class="mm-modal__wrapper" role="dialog" aria-modal="true">
			<div class="mm-modal__inner modal-auth modal">
				<div class="modal-auth__inner modal__inner">
				<h2 class="modal-auth__title page-title"><?php echo get_field('modal_restore_title', 'option'); ?></h2>

					<form class="modal-auth__form form-auth form form_dark" action="/client/partner/password" name="modalFormRestorePassword">
						<input type="hidden" class="modal-restore-msg" value="<?php the_field('modal_restore_msg', 'option'); ?>">
						<?php if(have_rows('modal_restore_controls', 'option')): ?>
							<div class="form-auth__controls form__controls">
								<div class="form-auth__row form__row row">
									<?php while(have_rows('modal_restore_controls', 'option')): the_row(); 
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
												<input type="<?php echo $type; ?>" class="form-auth__control form__control control control_dark" autocomplete="off" placeholder="<?php echo $placeholder; ?>" name="<?php echo $name; ?>" data-required="<?php echo $type_validation; ?>" data-invalid-message="<?php echo $error_validation; ?>" <?php echo $error_notmatches ? 'data-password-notmatches="' . $error_notmatches . '"' : '' ?> <?php echo $server_errors; ?>>
											</div>
										</div>
									<?php endwhile; ?>
								</div>
							</div>
						<?php endif; ?>
						<?php if($btn = get_field('modal_restore_btn', 'option')): ?>
							<div class="form-auth__btns form__btns">
								<button type="submit" class="form-auth__btn form__btn btn btn-lg btn-accent" disabled><?php echo $btn; ?></button>
							</div>
						<?php endif; ?>
					</form>
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

<?php wp_footer(); ?>
</body>
</html>