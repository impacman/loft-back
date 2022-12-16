<?php

add_action('acf/init', 'my_acf_init_block_types');
function my_acf_init_block_types() {
    if(function_exists('acf_register_block_type')) {
        acf_register_block_type(array(
            'name'              => 'showcase',
            'title'             => 'Первый экран',
            'description'       => 'Блок: Первый экран.',
            'render_template'   => 'template-parts/blocks/showcase/showcase.php',
            'category'          => 'acf-blocks',
            'icon'              => 'admin-home',
            'keywords'          => array( 'showcase', 'quote' ),
			'align' => 'full'
        ));
        acf_register_block_type(array(
            'name'              => 'ticker',
            'title'             => 'Бегущая строка из фишек',
            'description'       => 'Блок: Бегущая строка из фишек.',
            'render_template'   => 'template-parts/blocks/ticker/ticker.php',
            'category'          => 'acf-blocks',
            'icon'              => 'ellipsis',
            'keywords'          => array( 'ticker', 'quote' ),
			'align' => 'full'
        ));
        acf_register_block_type(array(
            'name'              => 'benefits',
            'title'             => 'Преимущества',
            'description'       => 'Блок: Преимущества.',
            'render_template'   => 'template-parts/blocks/benefits/benefits.php',
            'category'          => 'acf-blocks',
            'icon'              => 'thumbs-up',
            'keywords'          => array( 'benefits', 'quote' ),
			'align' => 'full'
        ));
        acf_register_block_type(array(
            'name'              => 'terms',
            'title'             => 'Условия',
            'description'       => 'Блок: Условия.',
            'render_template'   => 'template-parts/blocks/terms/terms.php',
            'category'          => 'acf-blocks',
            'icon'              => 'analytics',
            'keywords'          => array( 'terms', 'quote' ),
			'align' => 'full'
        ));
        acf_register_block_type(array(
            'name'              => 'faq',
            'title'             => 'FAQ',
            'description'       => 'Блок: FAQ.',
            'render_template'   => 'template-parts/blocks/faq/faq.php',
            'category'          => 'acf-blocks',
            'icon'              => 'editor-help',
            'keywords'          => array( 'faq', 'quote' ),
			'align' => 'full'
        ));
        acf_register_block_type(array(
            'name'              => 'news',
            'title'             => 'Новости',
            'description'       => 'Блок: Новости.',
            'render_template'   => 'template-parts/blocks/news/news.php',
            'category'          => 'acf-blocks',
            'icon'              => 'slides',
            'keywords'          => array( 'news', 'quote' ),
			'align' => 'full'
        ));
        acf_register_block_type(array(
            'name'              => 'contacts',
            'title'             => 'Контакты',
            'description'       => 'Блок: Контакты.',
            'render_template'   => 'template-parts/blocks/contacts/contacts.php',
            'category'          => 'acf-blocks',
            'icon'              => 'phone',
            'keywords'          => array( 'contacts', 'quote' ),
			'align' => 'full'
        ));
        acf_register_block_type(array(
            'name'              => 'register',
            'title'             => 'Регистрация',
            'description'       => 'Блок: Регистрация.',
            'render_template'   => 'template-parts/blocks/register/register.php',
            'category'          => 'acf-blocks',
            'icon'              => 'businessman',
            'keywords'          => array( 'register', 'quote' ),
			'align' => 'full'
        ));
        acf_register_block_type(array(
            'name'              => 'login',
            'title'             => 'Логин',
            'description'       => 'Блок: Логин.',
            'render_template'   => 'template-parts/blocks/login/login.php',
            'category'          => 'acf-blocks',
            'icon'              => 'admin-network',
            'keywords'          => array( 'login', 'quote' ),
			'align' => 'full'
        ));
        acf_register_block_type(array(
            'name'              => 'restore',
            'title'             => 'Смена пароля',
            'description'       => 'Блок: Смена пароля.',
            'render_template'   => 'template-parts/blocks/restore/restore.php',
            'category'          => 'acf-blocks',
            'icon'              => 'shield',
            'keywords'          => array( 'restore', 'quote' ),
			'align' => 'full'
        ));
        acf_register_block_type(array(
            'name'              => 'documents',
            'title'             => 'Документы',
            'description'       => 'Блок: Документы.',
            'render_template'   => 'template-parts/blocks/documents/documents.php',
            'category'          => 'acf-blocks',
            'icon'              => 'admin-page',
            'keywords'          => array( 'documents', 'quote' ),
			'align' => 'full'
        ));
    }
}

if(function_exists('acf_add_options_page')) {
	acf_add_options_page(array(
		'page_title' 	=> 'Глобальные настройки сайта',
		'menu_title'	=> 'Глобальные настройки',
		'menu_slug' 	=> 'theme-general-settings',
		'capability'	=> 'edit_posts',
		'redirect'		=> false
	));
}

add_action('enqueue_block_editor_assets','add_block_editor_assets', 10, 0);
function add_block_editor_assets(){
	wp_enqueue_style('block_editor_css', get_template_directory_uri() . '/assets/css/acf.css');
	wp_enqueue_script('swiper', get_template_directory_uri() . '/assets/js/swiper-bundle.min.js');
	wp_enqueue_script('block_editor_js', get_template_directory_uri() . '/assets/js/editor-acf-blocks.js', array('jquery'), '', true);
}

add_filter('acf/settings/show_admin', '__return_false');