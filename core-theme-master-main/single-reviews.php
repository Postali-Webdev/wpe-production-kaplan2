<?php
/**
 * Single Review
 *
 * @package Postali Parent
 * @author Postali LLC
 */



get_header();?>



<div class="body-container">

    <?php get_template_part('block','banner'); ?>

    <section class="main-content">
        <div class="container">
            <div class="columns">
                <div class="column-66 block">
                    <?php while( have_posts() ) : the_post(); ?>
                        <article>
                            <?php the_field('copy'); ?>
                            <div class="author-wrapper">
                                <p><strong><?php the_field('author'); ?></strong></p>
                                <?php if( get_field('review_source_logo') ) : $review_img = get_field('review_source_logo'); ?>
                                    <img src="<?php echo $review_img['url']; ?>">
                                <?php endif; ?>
                             </div>
                        </article>
                    <?php endwhile; wp_reset_postdata(); ?>
                    <div class="spacer-30"></div>
                    <a href="/reviews/" class="btn">View All Reviews</a>
                </div>
                <div class="column-33 sidebar-block block">
                    <?php get_template_part('block','sidebar'); ?>
                </div>
            </div>
        </div>
    </section>

    <?php if(get_field('include_awards','options')) : ?>
        <?php get_template_part('block','awards'); ?>
    <?php endif; ?>

</div>

<?php get_footer();?>