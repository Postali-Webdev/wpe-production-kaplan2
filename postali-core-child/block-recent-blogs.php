<?php
$args = [
    'post_type' => 'post',
    'posts_per_page' => 3,
    'post_status' => 'publish',
    'order' => 'DESC'
];
$posts = get_posts($args);

if( $posts ) : ?>
    <div class="posts-wrapper">
        <?php foreach ($posts as $post) : ?>
            <div class="post">
                <a href="<?php echo get_the_permalink($post->ID); ?>"></a>
                <div class="img-wrapper">
                    <?php echo get_the_post_thumbnail($post->ID, 'full'); ?>
                </div>
                <div class="copy-wrapper">
                    <p class="date"><?php echo get_the_date('F j, Y', $post->ID); ?></p>
                    <p class="title"><?php echo $post->post_title; ?></p>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
<?php endif; wp_reset_postdata();?>