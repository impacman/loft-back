<!doctype html>
<html <?php language_attributes(); ?> <?php twentytwentyone_the_html_classes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<!-- Disable tap highlight on IE -->
	<meta name="msapplication-tap-highlight" content="no">
	<!-- for Chrome on Android -->
	<meta name="mobile-web-app-capable" content="yes">
	<!-- for Safari on iOS -->
	<meta name="apple-mobile-web-app-capable" content="yes">
	<meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<?php if(get_field('show_preloader', 'option')): ?>
	<?php if(have_rows('preloader', 'option')): ?>
		<div class="preloader-wrap">
			<div class="preloader">
				<?php while(have_rows('preloader', 'option')): the_row(); 
					$img = get_sub_field('img');
					?>
					<img src="<?php echo $img['url']; ?>" alt="<?php echo $img['alt']; ?>" class="preloader__img img-responsive">
				<?php endwhile; ?>
			</div>
			<script src="<?php echo get_template_directory_uri(); ?>/assets/js/preloader.min.js"></script>
		</div>
	<?php endif; ?>
<?php endif; ?>

<header class="header">
    <div class="header__container container">

		<button class="header__hamburger hamburger hamburger--spring" type="button">
			<span class="hamburger-box">
				<span class="hamburger-inner"></span>
			</span>
		</button>

		<?php if($logo = get_field('header_logo', 'option')): ?>
			<a href="<?php echo home_url('/'); ?>" class="header__logo">
				<img src="<?php echo $logo['url']; ?>" alt="<?php echo $logo['alt']; ?>" class="img-responsive">
			</a>
		<?php endif; ?>

		<?php echo loft_polylang_languages(); ?>

		<?php if(have_rows('header_buttons', 'option')): ?>
			<div class="header__btns">
				<?php while(have_rows('header_buttons', 'option')): the_row(); 
					$link = get_sub_field('link');
					if($link) {
						$link_url = $link['url'];
						$link_title = $link['title'];
						$link_target = $link['target'] ? $link['target'] : '_self';
					}
					$type = get_sub_field('type');
					$hide = get_sub_field('hide');
					$modal_id = get_sub_field('modal_id');
					$is_modal = get_sub_field('modal');
					$show_modal;
					if($is_modal === 'Да') {
						$show_modal = true;
					} else {
						$show_modal = false;
					}
					$class = '';
					if($hide === 'Да') {
						$class = ' header__btn_login';
					}
					?>

					<?php if($show_modal): ?>
						<button type="button" class="header__btn<?php echo $class; ?> btn btn-lg <?php echo $type; ?>" data-micromodal-trigger="<?php echo $modal_id; ?>"><?php echo esc_html($link_title); ?></button>
					<?php else: ?>
						<a href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr( $link_target ); ?>" class="header__btn<?php echo $class; ?> btn btn-lg <?php echo $type; ?>"><?php echo esc_html($link_title); ?></a>
					<?php endif; ?>
				<?php endwhile; ?>
			</div>
		<?php endif; ?>

    </div>
</header>

<div class="mobile-menu">
	<div class="mobile-menu__header">
		<button class="mobile-menu__hamburger hamburger hamburger--spring is-active" type="button">
			<span class="hamburger-box">
				<span class="hamburger-inner"></span>
			</span>
		</button>

		<?php if($logo = get_field('mobile_logo', 'option')): ?>
			<a href="<?php echo home_url('/'); ?>" class="mobile-menu__logo">
				<img src="<?php echo $logo['url']; ?>" alt="<?php echo $logo['alt']; ?>" class="img-responsive">
			</a>
		<?php endif; ?>
	</div>

	<?php if(has_nav_menu('sidemenu')): ?>
		<?php
		wp_nav_menu([
			'theme_location'  => 'sidemenu',
			'menu'            => '',
			'container'       => 'nav',
			'container_class' => 'mobile-menu__nav nav-mobile-menu',
			'container_id'    => '',
			'menu_class'      => 'nav-mobile-menu__list',
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
	<?php endif; ?>

	<?php if(have_rows('mobile_buttons', 'option')): ?>
		<div class="mobile-menu__btns">
			<?php while(have_rows('mobile_buttons', 'option')): the_row();
				$link = get_sub_field('link');
				if($link) {
					$link_url = $link['url'];
					$link_title = $link['title'];
					$link_target = $link['target'] ? $link['target'] : '_self';
				}
				$type = get_sub_field('type');
				$modal_id = get_sub_field('modal_id');
				$is_modal = get_sub_field('modal');
				$show_modal;
				if($is_modal === 'Да') {
					$show_modal = true;
				} else {
					$show_modal = false;
				}
				?>
				<?php if($show_modal): ?>
					<div class="mobile-menu__btn-wrap">
						<button type="button" class="mobile-menu__btn btn btn-lg <?php echo $type; ?>" data-micromodal-trigger="<?php echo $modal_id; ?>"><?php echo esc_html($link_title); ?></button>
					</div>
				<?php else: ?>
					<div class="mobile-menu__btn-wrap">
						<a href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr( $link_target ); ?>" class="mobile-menu__btn btn btn-lg <?php echo $type; ?>"><?php echo esc_html($link_title); ?></a>
					</div>
				<?php endif; ?>
			<?php endwhile; ?>
		</div>
	<?php endif; ?>

	<?php if(have_rows('mobile_contacts', 'option')): ?>
		<div class="mobile-menu__contacts contacts">
			<div class="contacts__row row">
				<?php while(have_rows('mobile_contacts', 'option')): the_row(); 
					$link = get_sub_field('link');
					$icon = get_sub_field('icon');
					$contact = get_sub_field('contact');
					$value = get_sub_field('value');
					?>
					<div class="contacts__col col-xl-4 col-6">
						<a href="<?php echo $link; ?>" class="contacts__item item-contacts" target="_blank">
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