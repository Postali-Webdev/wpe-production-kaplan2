<?php 

$block_offset = $args['data']['offset'];
$block_link = $args['data']['link'];
$args = [
    'post_type' => 'reviews',
    'post_per_page' => '6',
    'post_status' => 'publish',
    'order' => 'DESC',
    'offset' => $block_offset,
    'meta_query' => array(
        array(
            'key'     => 'feature_in_slider', // The name of your ACF field
            'value'   => 1,  // The value you're looking for
            'compare' => '=', // The comparison operator (e.g., '=', 'LIKE', '>', 'IN')
            'type'    => 'NUMERIC', // The data type (e.g., 'CHAR', 'NUMERIC', 'DATE')
        ),
    ),
];
$reviews = new WP_Query($args);
?>

<?php if ( is_page_template('page-interior.php') ) :
    if( $reviews->have_posts() ) :  ?>
    <div class="reviews-wrapper">
        <div class="title-wrapper">
            <p class="reviews-title">Client Reviews</p>
        </div>
        <div class="reviews-slider">
            <?php while( $reviews->have_posts() ) : $reviews->the_post(); 
                $author = get_field('author');
                $copy = get_field('copy');
                $img = get_field('review_source_logo');
            ?>
                <div class="review">
                    <img src="/wp-content/uploads/2025/05/Group-1266.svg" alt="star reviews">
                    <div class="copy">
                        <p><span>"</span><?php echo $copy; ?><span>"</span></p>
                    </div>
                    <p class="author"><?php echo $author; ?></p>
                    <image class="review-icon" src="<?php echo $img; ?>" alt="review platform icon">
                </div>
            <?php endwhile; ?>
        </div>
        <div class="btn-wrapper">
            <div class="arrow-btn-wrapper">
                <div class="review-arrow-btn review-prev"></div>
                <div class="review-arrow-btn review-next"></div>
            </div>
        </div>
    </div>
    <?php endif; wp_reset_postdata();
else : 
    if( $reviews->have_posts() ) :  ?>
    <div class="reviews-wrapper">
        <div class="title-wrapper">
            <p class="reviews-title">Client Reviews</p>
        </div>
        <div class="reviews-slider">
            <?php while( $reviews->have_posts() ) : $reviews->the_post(); 
                $author = get_field('author');
                $copy = get_field('copy');
                $img = get_field('review_source_logo');
            ?>
                <div class="review">
                    <img src="/wp-content/uploads/2025/05/Group-1266.svg" alt="star reviews">
                    <div class="copy">
                        <p><span>"</span><?php echo $copy; ?><span>"</span></p>
                    </div>
                    <p class="author"><?php echo $author; ?></p>
                    <image class="review-icon" src="<?php echo $img; ?>" alt="review platform icon">
                </div>
            <?php endwhile; ?>
        </div>
        <div class="btn-wrapper">
            <div class="arrow-btn-wrapper">
                <div class="review-arrow-btn review-prev"></div>
                <div class="review-arrow-btn review-next"></div>
            </div>
            <a href="<?php echo $block_link['url']; ?>" class="btn"><?php echo $block_link['title']; ?></a>
        </div>
    </div>
    <?php endif; wp_reset_postdata();
endif;
