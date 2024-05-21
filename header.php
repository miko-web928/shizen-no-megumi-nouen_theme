<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="format-detection" content="telephone=no,email=no,address=no"> <!-- リンク不要の記述 -->

    <link rel="icon" href="<?php echo get_template_directory_uri(); ?>/img/favicon.ico">
    <link rel="apple-touch-icon" href="<?php echo get_template_directory_uri(); ?>/img/apple-touch-icon.png">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Archivo+Narrow:ital,wght@0,400..700;1,400..700&display=swap" rel="stylesheet">

    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <header <?php if (!is_front_page()) : ?> id="header-common" <?php else : ?> id="header" <?php endif; ?>>

        <div <?php if (!is_front_page()) : ?> class="header-common__container" <?php else : ?> class="header__container" <?php endif; ?>>
            <div <?php if (!is_front_page()) : ?> class="header-common header__wrapper" <?php else : ?> class="header header__wrapper" <?php endif; ?>>
                <h1 class="header__logo"><a href="<?php echo esc_url(home_url('/')); ?>"><img src="<?php echo get_template_directory_uri(); ?>/img/logo.svg" alt="自然の恵み農園"></a></h1>
                <nav class="header__nav header__pc">
                    <div>
                        <?php
                        $args = [
                            'menu' => 'ヘッダーPCメニュー',
                            'menu_class' => '',
                            'container' => false,
                            'items_wrap' => '<ul class="header__pc-menu">%3$s</ul>',
                        ];
                        wp_nav_menu($args);
                        ?>
                        <div class="header__nav-butoon">
                            <button class="nav__list--ac-color"><a href="<?php echo get_permalink(17); ?>">お問い合わせ</a></button>
                        </div>
                    </div>
                </nav>
                <!-- sp版ハンバーガーメニュー -->
                <div class="menu-btn">
                    <span></span>
                    <span></span>
                </div>
                <nav class="header__sp">
                    <?php
                    $args = [
                        'menu' => 'ヘッダーSPメニュー',
                        'menu_class' => '',
                        'container' => false,
                        'link_after' => '<span class="nav__list-yazirusi"></span>',
                        'items_wrap' => '<ul class="header__sp-menu">%3$s</ul>',
                    ];
                    wp_nav_menu($args);
                    ?>
                    <div class="header__sp-item">
                        <p>
                            問い合わせ電話<br>
                            <span class="tel-number">123-4567-8910</span>
                        </p>
                        <p class="time">【受付時間】<br>
                            10:00 ~ 18:00（土日祝を除く）
                        </p>
                        <div class="button ac-color">
                            <a href="<?php echo get_permalink(17); ?>">お問い合わせ</a>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
    </header>

    <?php get_template_part('template-parts/breadcrumb'); ?>