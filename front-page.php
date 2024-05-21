<?php get_header(); ?>

<main>
    <!-- fv -->
    <section id="fv">
        <div class="fv__inner">
            <div class="fv__img">
                <img src="<?php echo get_template_directory_uri(); ?>/img/FV.jpg" alt="">
            </div>
            <div class="fv__content">
                <div class="fv__content-item">
                    <img class="fv__logo" src="<?php echo get_template_directory_uri(); ?>/img/logo-2.svg" alt="自然の恵み農園">
                    <h2>自然の恵みを感じ、<br>
                        豊かな未来を。
                    </h2>
                </div class="fv__content-item">

                <!-- スクロールダウン -->
                <div class="scroll">
                    <a href="#about">SCROLL</a>
                </div>
                <!-- 新着記事 -->
                <article class="new-articles">
                    <?php
                    $args = [
                        'post_type' => 'post',
                        'posts_per_page' => 1,
                        'order' => 'desc',
                    ];
                    $articles_query = new WP_Query($args);
                    if ($articles_query->have_posts()) :
                    ?>
                        <?php while ($articles_query->have_posts()) : $articles_query->the_post(); ?>
                            <a href="<?php the_permalink(); ?>">
                                <div>
                                    <p class="article__title">News</p>
                                    <p class="article__date"><?php the_time(get_option('date_format')); ?></p>
                                </div>
                                <p class="article__content"><?php  echo mb_strimwidth( strip_tags( get_the_title() ), 0, 36, '…', 'UTF-8' ); ?></p>
                            </a>
                        <?php endwhile; ?>
                    <?php endif; ?>
                    <?php wp_reset_postdata(); ?>
                </article>
            </div>
        </div>
    </section>

    <!-- about -->
    <section id="about" class="section__wrapper--1">
        <h3 class="about__logo"><img src="<?php echo get_template_directory_uri(); ?>/img/logo.svg" alt=""></h3>
        <img class="about__img--01 fadeIn fadeIn1s" src="<?php echo get_template_directory_uri(); ?>/img/about-image01.png" alt="">
        <img class="about__img--02 fadeIn fadeIn2s" src="<?php echo get_template_directory_uri(); ?>/img/about-image02.png" alt="">
        <div class="about__text">
            <p>
                自然の恵み農園は、<br>
                自然の恵みと動物の尊さが調和する特別な場所です。<br>
                新鮮で美味しい農産物を栽培し、心温まる動物たちと触れ合える場所でもあります。
            </p>
            <p>
                自然の恵みを受け、動物たちとの特別なひとときを楽しんでいただける場所として、<br>
                私たちは誇りを持って活動をしています。<br>
                一緒に自然と動物の美しさを共有しましょう。
            </p>
        </div>
        <img class="about__img--03 fadeIn fadeIn3s" src="<?php echo get_template_directory_uri(); ?>/img/about-image03.png" alt="">
        <img class="about__img--04 fadeIn fadeIn4s" src="<?php echo get_template_directory_uri(); ?>/img/about-image04.png" alt="">
    </section>

    <!-- 活動紹介 -->
    <section id="works" class="works works__wrapper">
        <h3 class="works__title"><span>活動紹介</span></h3>
        <div class="slide__tabs-wrap works__category">
            <ul class="js-tabs slide__tabs">
                <li class="tab-item works__category-item">農園</li>
                <li class="tab-item works__category-item">牧場</li>
                <li class="tab-item works__category-item">オンライン販売</li>
            </ul>
        </div>
        <div class="tab-contents-wrap slide__list js-slider">
            <div class="tab-contents">
                <div class="works__text-wrap">
                    <p class="works__text">
                        私たちは、「持続可能な農業」を掲げて、自然の恵みに感謝しながら、農作物を育てています。 無農薬で、体にも環境にも優しく、季節ごとに異なる品種を育て、提供しています。
                        ぜひ一度、農園にお越し頂き、自分の手で収穫した新鮮な野菜、果物をお召し上がりください。
                    </p>
                </div>
                <div class="slider slider__nouen">
                    <div><img src="<?php echo get_template_directory_uri(); ?>/img/work-nouen01.png" alt="" /></div>
                    <div><img src="<?php echo get_template_directory_uri(); ?>/img/work-nouen02.png" alt="" /></div>
                    <div><img src="<?php echo get_template_directory_uri(); ?>/img/work-nouen03.png" alt="" /></div>
                    <div><img src="<?php echo get_template_directory_uri(); ?>/img/work-nouen04.png" alt="" /></div>
                </div>
            </div>
            <div class="tab-contents">
                <div class="works__text-wrap">
                    <p class="works__text">
                        私たちの牧場は、自然と動物との共存を尊重し、持続可能な農業の原則に基づいて運営されています。 広々とした環境で、動物たちとのふれ合いを通じて、自然の恵みと動物の尊さを感じ、
                        心温まるひとときを過ごしていただけます。
                    </p>
                </div>
                <div class="slider slider__bokujo">
                    <div><img src="<?php echo get_template_directory_uri(); ?>/img/work-bokujo01.png" alt="" /></div>
                    <div><img src="<?php echo get_template_directory_uri(); ?>/img/work-bokujo02.png" alt="" /></div>
                    <div><img src="<?php echo get_template_directory_uri(); ?>/img/work-bokujo03.png" alt="" /></div>
                    <div><img src="<?php echo get_template_directory_uri(); ?>/img/work-bokujo04.png" alt="" /></div>
                </div>
            </div>
            <div class="tab-contents">
                <div class="works__text-wrap">
                    <p class="works__text">
                        自然の恵み農園から直接お届けする、新鮮で美味しい農産物と 手作りのジャムやバターなどの加工品を提供しています。 自然の恩恵をご自宅でお楽しみいただけます。
                    </p>
                </div>
                <div class="slider slider__ec">
                    <div><img src="<?php echo get_template_directory_uri(); ?>/img/work-ec01.png" alt="" /></div>
                    <div><img src="<?php echo get_template_directory_uri(); ?>/img/work-ec02.png" alt="" /></div>
                    <div><img src="<?php echo get_template_directory_uri(); ?>/img/work-ec03.png" alt="" /></div>
                    <div><img src="<?php echo get_template_directory_uri(); ?>/img/work-ec04.png" alt="" /></div>
                </div>
            </div>
        </div>
    </section>

    <!-- よくあるご質問 -->
    <section id="faq" class="faq section__wrapper--1">
        <h3 class="faq__title"><span>よくあるご質問</span></h3>
        <div class="accordion__wrapper">
            <dl class="accordion-list">
                <dt class="accordion-title js-accordion-title faq-item__q">
                    <p class="faq-item__q-head">Q</p>
                    <p class="faq-item__q-text">農園で提供される季節ごとの野菜や果物の品種は何ですか？</p>
                </dt>
                <dd class="accordion-text">
                    <div class="faq-item__a">
                        <p class="faq-item__a-head">A</p>
                        <div class="faq-item__a-text">
                            はい、私たちの農園では有機栽培の原則に従って野菜と果物を栽培しています。<br>
                            化学肥料や農薬を極力使用せず、土壌と作物の健康を第一に考えております。
                        </div>
                    </div>
                </dd>
            </dl>
            <dl class="accordion-list">
                <dt class="accordion-title js-accordion-title faq-item__q">
                    <p class="faq-item__q-head">Q</p>
                    <p class="faq-item__q-text">農園での見学や体験ツアーは行っていますか？</p>
                </dt>
                <dd class="accordion-text">
                    <div class="faq-item__a">
                        <p class="faq-item__a-head">A</p>
                        <div class="faq-item__a-text">
                            はい、農園での見学や体験ツアーを随時開催しています。<br>
                            農場の日常や農作業を親しみやすく説明し、実際に農園での体験を楽しむことができます。
                        </div>
                    </div>
                </dd>
            </dl>
            <dl class="accordion-list">
                <dt class="accordion-title js-accordion-title faq-item__q">
                    <p class="faq-item__q-head">Q</p>
                    <p class="faq-item__q-text">オンラインで注文した農産物はどのように配送されますか？</p>
                </dt>
                <dd class="accordion-text">
                    <div class="faq-item__a">
                        <p class="faq-item__a-head">A</p>
                        <div class="faq-item__a-text">
                            オンラインで注文いただいた農産物は、専用の梱包で新鮮さを保ったまま、<br>
                            指定された配送先にお届けします。
                        </div>
                    </div>
                </dd>
            </dl>
            <dl class="accordion-list">
                <dt class="accordion-title js-accordion-title faq-item__q">
                    <p class="faq-item__q-head">Q</p>
                    <p class="faq-item__q-text">農園で提供される季節ごとの野菜や果物の品種は何ですか？</p>
                </dt>
                <dd class="accordion-text">
                    <div class="faq-item__a">
                        <p class="faq-item__a-head">A</p>
                        <div class="faq-item__a-text">
                            春にはイチゴ、夏にはトマトや茄子、秋にはカボチャやリンゴ、冬にはブロッコリーやみかん<br>
                            など、季節に応じた野菜、果物を提供、収穫体験することができます。
                        </div>
                    </div>
                </dd>
            </dl>
        </div>
    </section>

    <!-- お知らせ -->
    <section id="news" class="news container">
        <div class="news-contents">
            <div class="news__left news__wrapper">
                <h3 class="news__title"><span>お知らせ</span></h3>
                <p class="news__text">
                    季節の農作物のお知らせ、見学ツアーのご案内、<br>
                    オンライン販売セールのお知らせなど、自然の恵み農園<br>
                    の最新情報をお届けします。<br>
                </p>
            </div>
            <div class="news__right">
                <dl>
                    <?php
                    $args = [
                        'post_type' => 'post',
                        'posts_per_page' => 3,
                        'order' => 'desc',
                    ];
                    $news_query = new WP_Query($args);
                    if ($news_query->have_posts()) :
                    ?>
                        <?php while ($news_query->have_posts()) : $news_query->the_post(); ?>
                            <div class="news__item">
                                <dt>
                                    <?php the_time(get_option('date_format')); ?>
                                    <?php
                                    $categories = get_the_category();
                                    if ($categories) :
                                    ?>
                                        <span>
                                            <?php foreach ($categories as $category) : ?>
                                                <?php echo $category->name; ?>
                                            <?php endforeach; ?>
                                        </span>
                                    <?php endif; ?>
                                </dt>
                                <dd>
                                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                </dd>
                            </div>
                        <?php endwhile; ?>
                    <?php endif; ?>

                    <?php wp_reset_postdata(); ?>
                </dl>
            </div>
            <div class="button">
                <a href="<?php echo get_permalink(13); ?>">View More</a>
            </div>
        </div>
    </section>

    <!-- アクセス -->
    <section id="access" class="access section__wrapper--1">
        <h3 class="access__title"><span>アクセス</span></h3>

        <div class="access__content">
            <table class="access__table">
                <tr>
                    <th class="address-1">会社名</th>
                    <td class="address-1">株式会社自然の恵み農園</td>
                </tr>
                <tr>
                    <th>所在地</th>
                    <td>〒123-4567 千葉県〇〇市××町1丁目23-45</td>
                </tr>
                <tr>
                    <th>電話番号</th>
                    <td>012-3456-7890</td>
                </tr>
                <tr>
                    <th class="address-4">営業時間</th>
                    <td class="address-4">10:00〜18:00（土日祝を除く）</td>
                </tr>
                <tr>
                    <th class="th-map">Googleマップ<br><a href="https://maps.app.goo.gl/eTBUgJG9nEYkF1XN7" target="_blank">拡大地図を表示</a></th>
                    <td class="td-map"><iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3237.607033112253!2d140.05896327623395!3d35.76046232561688!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x60227e5329d23245%3A0xd4cde63c28d3f984!2z44G144Gq44Gw44GX44Ki44Oz44OH44Or44K744Oz5YWs5ZyS!5e0!3m2!1sja!2sjp!4v1709278501213!5m2!1sja!2sjp" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe></td>
                </tr>
                <tr class="access__tr-spmap">
                    <td class="td-map--colspan" colspan="2">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3237.607033112253!2d140.05896327623395!3d35.76046232561688!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x60227e5329d23245%3A0xd4cde63c28d3f984!2z44G144Gq44Gw44GX44Ki44Oz44OH44Or44K744Oz5YWs5ZyS!5e0!3m2!1sja!2sjp!4v1709278501213!5m2!1sja!2sjp" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </td>
                    <td class="td-map--sp">
                    </td>
                </tr>
            </table>
        </div>

    </section>

    <?php get_template_part('template-parts/contact') ?>
</main>

<?php get_footer(); ?>