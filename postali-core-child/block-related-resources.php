<?php
$current_page_id = get_the_ID();
$current_page_categories = get_the_terms($current_page_id, 'category');

$args = [
    'post_type' => ['post', 'page'],
    'posts_per_page' => 4,
    'post_status' => 'publish',
    'order' => 'DESC',
    'tax_query' => [
        [
            'taxonomy' => 'category',
            'field'    => 'id',
            'terms'    => wp_list_pluck($current_page_categories, 'term_id'),
            'operator' => 'IN',
        ],
    ],
    'post__not_in' => [$current_page_id]
];
$posts = get_posts($args);

if( $posts ) : ?>
    <div class="posts-wrapper related-posts">
        <?php foreach ($posts as $post) : 
            $post_type = get_post_type(); 
            switch( $post_type) {
                case 'post':
                    $post_type = 'Blogs';
                    break;
                case 'page':
                    $post_type = 'Pages';
                    break;
            }
            
            ?>
            <div class="post">
                <div class="copy-wrapper">
                    <a href="<?php echo get_the_permalink($post->ID); ?>"></a>
                    <p class="type"><?php echo $post_type; ?></p>
                    <p class="title"><?php echo $post->post_title; ?></p>
                    <p class="view-more">View Our <?php echo $post_type; ?></p>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
<?php endif; wp_reset_postdata();?>