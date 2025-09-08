<?php

// Секция настроек шаблона

function kemaclub_main_settings($wp_customize) {

    // Добавили секцию в настройках шаблона  
    $wp_customize->add_section('kemaclub_settings_section', array(
        'title'          => 'Настройки Kemaclub'
    ));

    // Добавили поле для ввода телефона
    $wp_customize->add_setting('phone_setting', array(
        'default'        => '+7-495-109-1818',
    ));

    $wp_customize->add_control('phone_setting', array(
        'label'   => 'Телефон',
        'section' => 'kemaclub_settings_section',
        'type'    => 'text',
    ));

	// Добавили поле для ввода адреса
    $wp_customize->add_setting('adress_setting', array(
        'default'        => 'г. Москва, ул. Суворовская, дом 6',
    ));

    $wp_customize->add_control('adress_setting', array(
        'label'   => 'Адрес',
        'section' => 'kemaclub_settings_section',
        'type'    => 'text',
    ));

	// Добавили поле для ввода email
	$wp_customize->add_setting('email_setting', array(
		'default'        => 'info@kemaclub.ru',
	));

	$wp_customize->add_control('email_setting', array(
		'label'   => 'Почта',
		'section' => 'kemaclub_settings_section',
		'type'    => 'text',
	));

	// Добавили поле для ввода url основного телеграм канала
	$wp_customize->add_setting('telegram_main_url_setting', array(
		'default'        => 'https://t.me/kemaclub_official',
	));

	$wp_customize->add_control('telegram_main_url_setting', array(
		'label'   => 'Основной телеграм канал',
		'section' => 'kemaclub_settings_section',
		'type'    => 'text',
	));

	// Добавили поле для ввода url дополнительного телеграм канала
	$wp_customize->add_setting('telegram_additional_url_setting', array(
		'default'        => 'https://t.me/Kemaclub_food',
	));

	$wp_customize->add_control('telegram_additional_url_setting', array(
		'label'   => 'Дополнительный телеграм канал',
		'section' => 'kemaclub_settings_section',
		'type'    => 'text',
	));

	// Добавили поле для ввода url телеграм чат бота
	$wp_customize->add_setting('telegram_chat_url_setting', array(
		'default'        => 'https://t.me/kemaclub_bot',
	));

	$wp_customize->add_control('telegram_chat_url_setting', array(
		'label'   => 'Телеграм чат-бот',
		'section' => 'kemaclub_settings_section',
		'type'    => 'text',
	));

	// Добавили поле для ввода url телеграм нейро бота
	$wp_customize->add_setting('telegram_ai_url_setting', array(
		'default'        => 'https://t.me/kemaAroma_bot',
	));

	$wp_customize->add_control('telegram_ai_url_setting', array(
		'label'   => 'Телеграм нейро-бот',
		'section' => 'kemaclub_settings_section',
		'type'    => 'text',
	));

	// Добавили поле для загрузки логотипа в шапке
	$wp_customize->add_setting('logo_header_image', array(
		'default'        => '',
	));

	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'logo_header_image', array(
		'label'    => 'Лого в шапке',
		'section'  => 'kemaclub_settings_section',
		'settings' => 'logo_header_image',
	)));

	// Добавили поле для ввода названия языка в шапке
	$wp_customize->add_setting('lang_switcher_ru_name_setting', array(
		'default'        => 'Rus',
	));

	$wp_customize->add_control('lang_switcher_ru_name_setting', array(
		'label'   => 'Переключение языков в шапке, русский язык',
		'section' => 'kemaclub_settings_section',
		'type'    => 'text',
	));

	// Добавили поле для ввода названия языка в шапке
	$wp_customize->add_setting('lang_switcher_eng_name_setting', array(
		'default'        => 'Eng',
	));

	$wp_customize->add_control('lang_switcher_eng_name_setting', array(
		'label'   => 'Переключение языков в шапке, английский язык',
		'section' => 'kemaclub_settings_section',
		'type'    => 'text',
	));

	// Добавили поле для ввода url русской версии сайта
	$wp_customize->add_setting('lang_switcher_ru_url_setting', array(
		'default'        => 'https://kemaclub.ru/',
	));

	$wp_customize->add_control('lang_switcher_ru_url_setting', array(
		'label'   => 'Переключение языков в шапке, русский url',
		'section' => 'kemaclub_settings_section',
		'type'    => 'text',
	));

	// Добавили поле для ввода url английской версии сайта
	$wp_customize->add_setting('lang_switcher_eng_url_setting', array(
		'default'        => 'https://kemafrance.com/',
	));

	$wp_customize->add_control('lang_switcher_eng_url_setting', array(
		'label'   => 'Переключение языков в шапке, английский url',
		'section' => 'kemaclub_settings_section',
		'type'    => 'text',
	));

	// Добавили поле для загрузки логотипа в футере
	$wp_customize->add_setting('logo_footer_image', array(
		'default'        => '',
	));

	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'logo_footer_image', array(
		'label'    => 'Лого в шапке',
		'section'  => 'kemaclub_settings_section',
		'settings' => 'logo_footer_image',
	)));

	// Добавили поле для ввода адреса
	$wp_customize->add_setting('address_setting', array(
		'default' => '',
		'sanitize_callback' => 'wp_kses_post'
	));

	$wp_customize->add_control('address_setting', array(
		'label'   => 'Адрес',
		'section' => 'kemaclub_settings_section',
		'type' => 'textarea',
		'description' => 'Можно использовать HTML-разметку'
	));

	// Добавили поле для ввода графика работы
	$wp_customize->add_setting('jobtime_setting', array(
		'default' => '',
		'sanitize_callback' => 'wp_kses_post'
	));

	$wp_customize->add_control('jobtime_setting', array(
		'label'   => 'График работы',
		'section' => 'kemaclub_settings_section',
		'type' => 'textarea',
		'description' => 'Можно использовать HTML-разметку'
	));

	// Добавили поля для исключения категорий из поиска

	$wp_customize->add_section('search_settings', array(
        'title' => 'Настройки поиска',
        'priority' => 30,
    ));

	$wp_customize->add_setting('excluded_search_categories', array(
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    
    $wp_customize->add_control('excluded_search_categories', array(
        'label' => 'Исключить категории из поиска (ID через запятую)',
        'section' => 'search_settings',
        'type' => 'text',
    ));

	// Добавили переключатель для Jivosite

    $wp_customize->add_setting( 'jivosite_switcher', array(
        'default'   => true,
        'transport' => 'refresh',
    ) );

    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'jivosite_switcher', array(
        'label'    => 'Включить Jivosite',
        'section'  => 'kemaclub_settings_section',
		'settings' => 'jivosite_switcher',
        'type'     => 'checkbox',
    ) ) );

	// Добавили переключатель для вывода похожих товаров

    $wp_customize->add_setting( 'related_products_switcher', array(
        'default'   => true,
        'transport' => 'refresh',
    ) );

    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'related_products_switcher', array(
        'label'    => 'Включить вывод похожих продуктов',
        'section'  => 'kemaclub_settings_section',
		'settings' => 'related_products_switcher',
        'type'     => 'checkbox',
    ) ) );

	// Добавили количество выводимых похожих товаров

	$wp_customize->add_setting('related_products_count', array(
        'default'           => 4,
        'sanitize_callback' => 'absint',
        'transport'         => 'refresh',
    ));
    
    $wp_customize->add_control('related_products_count', array(
        'label'       => 'Количество похожих товаров',
        'description' => 'Укажите сколько похожих товаров выводить на странице',
        'section'     => 'kemaclub_settings_section',
        'type'        => 'number',
        'input_attrs' => array(
            'min'  => 1,
            'max'  => 12,
            'step' => 1,
        ),
    ));

	// Добавили переключатель для вывода похожих постов

    $wp_customize->add_setting( 'related_posts_switcher', array(
        'default'   => true,
        'transport' => 'refresh',
    ) );

    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'related_posts_switcher', array(
        'label'    => 'Включить вывод похожих постов',
        'section'  => 'kemaclub_settings_section',
		'settings' => 'related_posts_switcher',
        'type'     => 'checkbox',
    ) ) );

	// Добавили количество выводимых похожих постов
	
	$wp_customize->add_setting('related_posts_count', array(
        'default'           => 4,
        'sanitize_callback' => 'absint',
        'transport'         => 'refresh',
    ));
    
    $wp_customize->add_control('related_posts_count', array(
        'label'       => 'Количество похожих постов',
        'description' => 'Укажите сколько похожих постов выводить на странице',
        'section'     => 'kemaclub_settings_section',
        'type'        => 'number',
        'input_attrs' => array(
            'min'  => 1,
            'max'  => 8,
            'step' => 1,
        ),
    ));
}

add_action('customize_register', 'kemaclub_main_settings');

// Секция настроек статических характеристик продукта

function kemaclub_static_product_attributes_customize_register($wp_customize) {

    $wp_customize->add_section('static_product_attributes_section', array(
        'title' => 'Статические характеристики продукта',
        'priority' => 190,
    ));

    $attributes = [
        'manufacturer' => ['label' => 'Производитель', 'value' => 'Россия'],
        'brand' => ['label' => 'Бренд', 'value' => 'Kema Club'],
        'expiry' => ['label' => 'Срок годности', 'value' => '12 месяцев'],
        'storage' => ['label' => 'Условия хранения', 'value' => 'Хранить в сухом месте при 12-25°C'],
    ];

    foreach ($attributes as $id => $defaults) {
        // Настройка для Label
        $wp_customize->add_setting("attribute_{$id}_label", array(
            'default' => $defaults['label'],
            'transport' => 'refresh',
            'sanitize_callback' => 'sanitize_text_field',
        ));
        $wp_customize->add_control("attribute_{$id}_label_control", array(
            'label' => "Название характеристики ({$defaults['label']})",
            'section' => 'static_product_attributes_section',
            'settings' => "attribute_{$id}_label",
            'type' => 'text',
        ));

        // Настройка для Value
        $wp_customize->add_setting("attribute_{$id}_value", array(
            'default' => $defaults['value'],
            'transport' => 'refresh',
            'sanitize_callback' => 'wp_kses_post',
        ));
        $wp_customize->add_control("attribute_{$id}_value_control", array(
            'label' => "Значение ({$defaults['label']})",
            'section' => 'static_product_attributes_section',
            'settings' => "attribute_{$id}_value",
            'type' => $id === 'storage' ? 'textarea' : 'text',
        ));
    }

	// Добавили поле для ввода информации об оптовом заказе на странице товара

	$wp_customize->add_setting('wholesale_order_setting', array(
		'default' => 	'<p>Минимальная сумма заказа составляет 20 000 рублей. Для каждой позиции установлены минимальные объемы отгрузки: отдушка — 1 кг, эфирное масло — 100 мл.</p>
						<p>Клиенты из стран СНГ с НДС 0% могут оформить заказ от 50 000 рублей. Также доступна стандартная минимальная сумма с НДС 20%.</p>
						<p>Если ваш заказ превышает 50 кг по одной позиции, мы готовы предложить гибкие условия. Индивидуальные скидки обсуждаются с учетом объема заказа, регулярности поставок и долгосрочных планов.</p>
						<p>Мы стремимся создать выгодные условия для партнеров, предлагая конкурентоспособные цены, удобные логистические решения и быструю обработку заказов. Наши специалисты помогут рассчитать оптимальные условия и найти лучшие решения для вашего бизнеса.</p>',
		'sanitize_callback' => 'wp_kses_post'
	));

	$wp_customize->add_control('wholesale_order_setting', array(
		'label'   => 'Информации об оптовом заказе',
		'section' => 'static_product_attributes_section',
		'type' => 'textarea',
		'description' => 'Можно использовать HTML-разметку'
	));

	// Добавили возможность выбора записи из которой берется информация об оплате и доставке на странице товара

    $wp_customize->add_setting('embedded_post_id', array(
        'default' => '',
        'transport' => 'refresh',
        'sanitize_callback' => 'absint',
    ));

    $wp_customize->add_control('embedded_post_id_control', array(
        'label' => 'Запись с информацией об оплате и доставке',
        'section' => 'static_product_attributes_section',
        'settings' => 'embedded_post_id',
        'type' => 'select',
        'choices' => get_posts_choices(),
    ));
}
add_action('customize_register', 'kemaclub_static_product_attributes_customize_register');

// Функция для выбора постов в настройках

function get_posts_choices() {
    $posts = get_posts(array(
        'post_type' => 'post',
        'numberposts' => -1,
        'post_status' => 'publish',
    ));

    $choices = array('' => '— Не выбрано —');
    foreach ($posts as $post) {
        $choices[$post->ID] = $post->post_title . ' (ID: ' . $post->ID . ')';
    }

    return $choices;
}