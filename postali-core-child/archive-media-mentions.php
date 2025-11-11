<?php
/**
 * Template Name: Media Mentions
 * 
 * @package Postali Child
 * @author Postali LLC
 */

$args = array (
	'post_type' => 'media-mentions',
	'post_per_page' => '10',
	'post_status' => 'publish',
	'order' => 'DESC',
    'paged' => $paged
);
$the_query = new WP_Query($args);

get_header(); ?>

<div class="body-container">

    <?php get_template_part('block','banner'); ?>
    <section class="main-content">
        <div class="container">
            <div class="columns">
                <div class="column-66">
                    <?php while( $the_query->have_posts() ) : $the_query->the_post(); ?>
                        <article>
                            <h2><?php the_title(); ?></h2>
                            <?php if( get_field('article_image') ) : $article_img = get_field('article_image'); ?>
                                <img src="<?php echo $article_img['url']; ?>">
                            <?php endif; ?>
                            <?php the_field('article_copy'); ?>
                            <a href="<?php the_field('article_link'); ?>" target="_blank" class="btn">Read More</a>
                        </article>
                    <?php endwhile; wp_reset_postdata(); ?>
                    <div class="spacer-60"></div>
                    <?php the_posts_pagination([
                        'prev_text' => '',
                        'next_text' => ''
                    ]); ?>
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

<?php get_footer(); ?>