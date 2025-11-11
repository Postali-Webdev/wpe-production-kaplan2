<?php
/**
 * Template Name: Resources
 * @package Postali Child
 * @author Postali LLC
**/
get_header();?>

<div class="body-container">

    <?php 
    
    get_template_part('block','banner'); ?>

    <section class="main-content">
        <div class="container">
            <div class="columns">
                <div class="column-66 block">
                    <?php the_field('top_copy_block'); ?>
                </div>
                <?php if( have_rows('on_page_nav') ) : ?>
                <div class="column-33 sidebar-block block">
                    <p>On Page Navigation</p>
                    <div class="on-page-nav">
                        <?php while( have_rows('on_page_nav') ) : the_row(); 
                            $label = get_sub_field('label'); 
                            $anchor_link = get_sub_field('anchor_link'); ?>
                            <a href="#<?php echo $anchor_link; ?>" class="nav-btn"><?php echo $label; ?></a>
                        <?php endwhile; ?>
                    </div>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </section>
    
    <?php if(get_field('include_awards','options')) : ?>
        <?php get_template_part('block','awards'); ?>
    <?php endif; ?>

    <section class="main-content">
        <div class="container">
            <div class="columns">
                <div class="column-66 center block">
                    <?php the_field('section_2_copy_block'); ?>
                </div>
            </div>
        </div>
    </section>

    <section class="blue" id="testimonial">
        <div class="container">
            <div class="columns">
                <div class="column-50 block">
                    <p class="testimonial-callout"><?php the_field('testimonial_callout','options'); ?></p>
                </div>
                <div class="column-50 block">
                    <p><?php the_field('full_testimonial','options'); ?></p>
                    <div class="author">
                        <img src="/wp-content/uploads/2025/05/google-reviews-logo-white.png"><div class="separator"></div><p><strong><?php the_field('testimonial_author','options'); ?></strong></p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="main-content">
        <div class="container">
            <div class="columns">
                <div class="column-66 center block">
                    <?php the_field('section_3_copy_block'); ?>
                </div>
            </div>
        </div>
    </section>

    <?php get_template_part('block','pre-footer'); ?>

    <section class="related-resources grey-bg">
        <div class="columns">
            <div class="column-full block">
                <p class="subtitle">Current Spotlight</p>
                <h2>Related Reading</h2>
                <?php get_template_part('block','related-resources'); ?>
            </div>
        </div>
    </section>

</div>

<?php get_footer();?>