<?php get_header(); ?>

<main>
    <!-- お知らせ -->
    <section id="category" class="category container">
        <div class="category__wrapper">
            <h2 class="category__title"><span>お知らせ一覧</span></h2>
            <!-- <div class="tab"> -->
            <!-- タブを構成するブロック -->
            <div class="slide__tabs-wrap">
                <ul class="js-tabs slide__tabs">
                    <a class="tab-item" href="<?php echo home_url('/news'); ?>">すべて</a>
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
                </ul>
            </div>

            <!-- コンテンツを構成するブロック -->
            <div class="tab-contents-wrap slide__list js-slider">

                <div class="tab-contents">
                    <?php
                    $args = [
                        'post_type' => 'post',
                        // 'category' => '1, 2, 3, 7',
                        'order' => 'desc',
                        'posts_per_page' => 10,
                        'paged' => $paged,
                    ];
                    $allpost_query = new WP_Query($args);
                    if ($allpost_query->have_posts()) :
                    ?>
                        <?php while ($allpost_query->have_posts()) : $allpost_query->the_post(); ?>
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

                        <div class="pnavi">
                            <?php //ページリスト表示処理
                            global $wp_rewrite;
                            $paginate_base = get_pagenum_link(1);
                            if (strpos($paginate_base, '?') || !$wp_rewrite->using_permalinks()) {
                                $paginate_format = '';
                                $paginate_base = add_query_arg('paged', '%#%');
                            } else {
                                $paginate_format = (substr($paginate_base, -1, 1) == '/' ? '' : '/') .
                                    user_trailingslashit('page/%#%/', 'paged');
                                $paginate_base .= '%_%';
                            }
                            echo paginate_links(array(
                                'base' => $paginate_base,
                                'format' => $paginate_format,
                                'total' => $allpost_query->max_num_pages,
                                'mid_size' => 1,
                                'current' => ($paged ? $paged : 1),
                                'prev_text' => '< 前へ',
                                'next_text' => '次へ >',
                            )); ?>
                        </div>
                    <?php endif; ?>

                    <?php wp_reset_postdata(); ?>
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
                    <div class="news-item">
                        <div class="news-image"><img src="img/no-image.png" alt=""></div>
                        <!-- tab用カテゴリー -->
                        <span class="news-item__category--sp">カテゴリー3</span>
                        <div class="news-text__overflow">
                            <div class="news-text">
                                <p class="news-item__date-category">
                                    YYYY.MM.DD<span class="news-item__category">カテゴリー3</span>
                                </p>
                                <p class="news-item__title">タイトルが入ります。タイトルが入ります。タイトルが入ります。</p>
                                <p class="news-item__textarea">
                                    本文の抜粋が入ります。本文の抜粋が入ります。本文の抜粋が入ります。本文の抜粋が入ります。本文の抜粋が入ります。本文の抜粋が入ります。本文の抜粋が入ります。本文の抜粋が入ります。本文の抜粋が入ります。
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="pagination">
                        <div class="nav-links">
                            <ul class="page-number">
                                <!-- <li>
                                            <a class="page-numbers prev" href="">
                                                &lt;
                                            </a>
                                        </li> -->
                                <li>
                                    <a class="page-numbers" href="">1
                                    </a>
                                </li>
                                <!-- <li>
                                            <a class="page-numbers" href="">2
                                            </a>
                                        </li>
                                        <li>
                                            <a class="page-numbers next" href="">
                                                &gt;
                                            </a>
                                        </li> -->
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- </div> -->
        </div>
    </section>


    <?php get_template_part('template-parts/contact') ?>
</main>

<?php get_footer(); ?>