<?php
/**
 * Template Name: Front Page
 * @package Postali Child
 * @author Postali LLC
**/
get_header();?>

<div class="body-container">

    <section class="banner" id="hp-banner" style="background-image:url(<?php the_field('banner_background_image'); ?>);">
        <div class="container">
            <div class="columns">
                <div class="column-66">
                    <h1><?php the_field('banner_headline'); ?></h1>
                    <div class="spacer-30"></div>
                    <div class="subhead"><?php the_field('banner_subheadline'); ?></div>
                </div>
                <div class="column-50"></div>
            </div>
        </div>
    </section>

    <?php get_template_part('block','pre-footer'); ?>

</div><!-- #front-page -->

<?php get_footer();?>