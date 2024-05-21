<!-- yoast_breadcrumb -->
<?php if (!is_front_page()) : ?>
    <div class="breadcrumbs">
        <div class="container">
            <?php
            if (function_exists('yoast_breadcrumb')) {
                yoast_breadcrumb('<p id="breadcrumbs">');
            }
            ?>
        </div>
    </div>
<?php endif; ?>