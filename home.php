<?php get_header(); ?>

<main>
    <?php get_template_part('template-parts/breadcrumb.php') ?>

    <!-- お知らせ -->
    <section id="category" class="category container">
        <div class="category__wrapper">
            <h2 class="category__title"><span>お知らせ一覧</span></h2>
            <!-- <div class="tab"> -->
            <!-- タブを構成するブロック -->
            <div class="slide__tabs-wrap">
                <div class="js-tabs slide__tabs">
                    <div class="tab-item">すべて</div>
                    <?php
                    $cats = get_categories(array(
                        'child_of' => '7',
                    ));
                    foreach ($cats as $cat) {
                        $current_cat_class = '';
                        if (is_category($cat->term_id)) {
                            $current_cat_class = ' selected';
                        }
                        echo '<div class="tab-item' . $current_cat_class . '">' . $cat->name . '</div>';
                    }
                    ?>
                </div>
            </div>

            <!-- コンテンツを構成するブロック -->
            <div class="tab-contents-wrap slide__list js-slider">

                <div class="tab-contents">
                    <?php if (have_posts()) : ?>
                        <?php while (have_posts()) : the_post(); ?>
                            <div class="news-item">
                                <div class="news-image">
                                    <a href="<?php the_permalink(); ?>">
                                        <?php if (has_post_thumbnail()) : ?>
                                            <?php the_post_thumbnail(); ?>
                                        <?php else : ?>
                                            <img src="<?php echo get_template_directory_uri(); ?>/img/no-image.png" alt="">
                                        <?php endif; ?>
                                    </a>
                                </div>
                                <!-- tab用カテゴリー -->
                                <?php
                                $categories = get_the_category();
                                if ($categories) :
                                ?>
                                    <span class="news-item__category--sp">
                                        <?php foreach ($categories as $category) : ?>
                                            <?php echo $category->name; ?>
                                        <?php endforeach; ?>
                                    </span>

                                    <div class="news-text__overflow">
                                        <div class="news-text">
                                            <p class="news-item__date-category">
                                                <?php the_time(get_option('date_format')); ?>
                                                <span class="news-item__category">
                                                    <?php foreach ($categories as $category) : ?>
                                                        <?php echo $category->name; ?>
                                                    <?php endforeach; ?>
                                                </span>
                                            </p>
                                            <a href="<?php the_permalink(); ?>">
                                                <p class="news-item__title"><?php the_title(); ?></p>
                                                <div class="news-item__textarea">
                                                    <?php the_excerpt(); ?>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                <?php endif; ?>
                            </div>
                        <?php endwhile; ?>
                    <?php endif; ?>

                    <?php the_posts_pagination(
                        array(
                            'mid_size'      => 2, // 現在ページの左右に表示するページ番号の数
                            'prev_next'     => true, // 「前へ」「次へ」のリンクを表示する場合はtrue
                            'prev_text'     => ('&lt;'), // 「前へ」リンクのテキスト
                            'next_text'     => ('&gt;'), // 「次へ」リンクのテキスト
                            'type'          => 'list', // 戻り値の指定 (plain/list)
                            'show_all' => false,
                        )
                    ); ?>
                </div>

                <div class="tab-contents">
                    <?php
                    $args = [
                        'post_type' => 'post',
                        'category_name' => 'category1',
                        'order' => 'desc',
                        'posts_per_page' => 10,
                        'paged' => $paged,
                    ];
                    $post1_query = new WP_Query($args);
                    if ($post1_query->have_posts()) :
                    ?>
                        <?php while ($post1_query->have_posts()) : $post1_query->the_post(); ?>
                            <div class="news-item">
                                <div class="news-image">
                                    <a href="<?php the_permalink(); ?>">
                                        <?php if (has_post_thumbnail()) : ?>
                                            <?php the_post_thumbnail(); ?>
                                        <?php else : ?>
                                            <img src="<?php echo get_template_directory_uri(); ?>/img/no-image.png" alt="">
                                        <?php endif; ?>
                                    </a>
                                </div>
                                <!-- tab用カテゴリー -->
                                <?php
                                $categories = get_the_category();
                                if ($categories) :
                                ?>
                                    <span class="news-item__category--sp">
                                        <?php foreach ($categories as $category) : ?>
                                            <?php echo $category->name; ?>
                                        <?php endforeach; ?>
                                    </span>

                                    <div class="news-text__overflow">
                                        <div class="news-text">
                                            <p class="news-item__date-category">
                                                <?php the_time(get_option('date_format')); ?>
                                                <span class="news-item__category">
                                                    <?php foreach ($categories as $category) : ?>
                                                        <?php echo $category->name; ?>
                                                    <?php endforeach; ?>
                                                </span>
                                            </p>
                                            <a href="<?php the_permalink(); ?>">
                                                <p class="news-item__title"><?php the_title(); ?></p>
                                                <div class="news-item__textarea">
                                                    <?php the_excerpt(); ?>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                <?php endif; ?>
                            </div>
                        <?php endwhile; ?>

                        <?php the_posts_pagination(
                            array(
                                'mid_size'      => 2, // 現在ページの左右に表示するページ番号の数
                                'prev_next'     => true, // 「前へ」「次へ」のリンクを表示する場合はtrue
                                'prev_text'     => ('&lt;'), // 「前へ」リンクのテキスト
                                'next_text'     => ('&gt;'), // 「次へ」リンクのテキスト
                                'type'          => 'list', // 戻り値の指定 (plain/list)
                                'show_all'      => false,
                                'total'         => $post1_query->max_num_pages,
                            )
                        ); ?>
                    <?php endif; ?>

                    <?php wp_reset_postdata(); ?>
                </div>
                <div class="tab-contents">
                    <?php
                    $args = [
                        'post_type' => 'post',
                        'category_name' => 'category2',
                        'order' => 'desc',
                        'posts_per_page' => 10,
                        'paged' => $paged,
                    ];
                    $post2_query = new WP_Query($args);
                    if ($post2_query->have_posts()) :
                    ?>
                        <?php while ($post2_query->have_posts()) : $post2_query->the_post(); ?>
                            <div class="news-item">
                                <div class="news-image">
                                    <a href="<?php the_permalink(); ?>">
                                        <?php if (has_post_thumbnail()) : ?>
                                            <?php the_post_thumbnail(); ?>
                                        <?php else : ?>
                                            <img src="<?php echo get_template_directory_uri(); ?>/img/no-image.png" alt="">
                                        <?php endif; ?>
                                    </a>
                                </div>
                                <!-- tab用カテゴリー -->
                                <?php
                                $categories = get_the_category();
                                if ($categories) :
                                ?>
                                    <span class="news-item__category--sp">
                                        <?php foreach ($categories as $category) : ?>
                                            <?php echo $category->name; ?>
                                        <?php endforeach; ?>
                                    </span>

                                    <div class="news-text__overflow">
                                        <div class="news-text">
                                            <p class="news-item__date-category">
                                                <?php the_time(get_option('date_format')); ?>
                                                <span class="news-item__category">
                                                    <?php foreach ($categories as $category) : ?>
                                                        <?php echo $category->name; ?>
                                                    <?php endforeach; ?>
                                                </span>
                                            </p>
                                            <a href="<?php the_permalink(); ?>">
                                                <p class="news-item__title"><?php the_title(); ?></p>
                                                <div class="news-item__textarea">
                                                    <?php the_excerpt(); ?>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                <?php endif; ?>
                            </div>
                        <?php endwhile; ?>

                        <?php the_posts_pagination(
                            array(
                                'mid_size'      => 2, // 現在ページの左右に表示するページ番号の数
                                'prev_next'     => true, // 「前へ」「次へ」のリンクを表示する場合はtrue
                                'prev_text'     => ('&lt;'), // 「前へ」リンクのテキスト
                                'next_text'     => ('&gt;'), // 「次へ」リンクのテキスト
                                'type'          => 'list', // 戻り値の指定 (plain/list)
                                'show_all'      => false,
                                'total'         => $post2_query->max_num_pages,
                            )
                        ); ?>
                    <?php endif; ?>

                    <?php wp_reset_postdata(); ?>
                </div>
                <div class="tab-contents">
                    <?php
                    $args = [
                        'post_type' => 'post',
                        'category_name' => 'category3',
                        'order' => 'desc',
                        'posts_per_page' => 10,
                        'paged' => $paged,
                    ];
                    $post3_query = new WP_Query($args);
                    if ($post3_query->have_posts()) :
                    ?>
                        <?php while ($post3_query->have_posts()) : $post3_query->the_post(); ?>
                            <div class="news-item">
                                <div class="news-image">
                                    <a href="<?php the_permalink(); ?>">
                                        <?php if (has_post_thumbnail()) : ?>
                                            <?php the_post_thumbnail(); ?>
                                        <?php else : ?>
                                            <img src="<?php echo get_template_directory_uri(); ?>/img/no-image.png" alt="">
                                        <?php endif; ?>
                                    </a>
                                </div>
                                <!-- tab用カテゴリー -->
                                <?php
                                $categories = get_the_category();
                                if ($categories) :
                                ?>
                                    <span class="news-item__category--sp">
                                        <?php foreach ($categories as $category) : ?>
                                            <?php echo $category->name; ?>
                                        <?php endforeach; ?>
                                    </span>

                                    <div class="news-text__overflow">
                                        <div class="news-text">
                                            <p class="news-item__date-category">
                                                <?php the_time(get_option('date_format')); ?>
                                                <span class="news-item__category">
                                                    <?php foreach ($categories as $category) : ?>
                                                        <?php echo $category->name; ?>
                                                    <?php endforeach; ?>
                                                </span>
                                            </p>
                                            <a href="<?php the_permalink(); ?>">
                                                <p class="news-item__title"><?php the_title(); ?></p>
                                                <div class="news-item__textarea">
                                                    <?php the_excerpt(); ?>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                <?php endif; ?>
                            </div>
                        <?php endwhile; ?>

                        <?php the_posts_pagination(
                            array(
                                'mid_size'      => 2, // 現在ページの左右に表示するページ番号の数
                                'prev_next'     => true, // 「前へ」「次へ」のリンクを表示する場合はtrue
                                'prev_text'     => ('&lt;'), // 「前へ」リンクのテキスト
                                'next_text'     => ('&gt;'), // 「次へ」リンクのテキスト
                                'type'          => 'list', // 戻り値の指定 (plain/list)
                                'show_all'      => false,
                                'total'         => $post3_query->max_num_pages,
                            )
                        ); ?>
                    <?php endif; ?>

                    <?php wp_reset_postdata(); ?>
                </div>
            </div>
            <!-- </div> -->
        </div>
    </section>


    <?php get_template_part('template-parts/contact') ?>
</main>

<?php get_footer(); ?>