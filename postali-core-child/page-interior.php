<?php
/**
 * Template Name: Interior
 * @package Postali Child
 * @author Postali LLC
**/
get_header();
$upper = get_field('upper_content');
$lower = get_field('lower_content');
$add_block = get_field('add_block');
?>

<div class="body-container">

    <?php get_template_part('block','banner'); ?>

    <section class="main-content">
        <div class="container">
            <div class="columns">
                <div class="column-66 block">
                    <?php echo $upper; ?>
                </div>
                <div class="column-33 sidebar-block block">
                    <?php if(get_field('add_testimonial','options')) { ?>
                        <div class="testimonial-block">
                            <p class="testimonial"><?php the_field('sidebar_testimonial','options'); ?></p>
                            <p><strong><?php the_field('sidebar_testimonial_author','options'); ?></strong></p>
                        </div>
                        <div class="spacer-30"></div>
                        <p class="sidebar-more"><a href="/reviews/" title="Read more Reviews">Read More Reviews</a> <span class="icon-tick-down"></span></p>
                        <div class="sidebar-spacer"></div>
                    <?php } ?>

                    <?php if(get_field('add_result','options')) { ?>
                        <div class="sidebar-header">NOTABLE RESULT</div>
                        <div class="result-block">
                            <p class="large"><strong><?php the_field('sidebar_result_headline','options'); ?></strong></p>
                            <p class="result"><?php the_field('sidebar_result','options'); ?></p>
                        </div>
                        <div class="spacer-30"></div>
                        <p class="sidebar-more"><a href="/results/" title="Read more results">Read More Results</a> <span class="icon-tick-down"></span></p>
                        <div class="sidebar-spacer"></div>
                        <?php } ?>
                    <?php
                        if ( is_page() ) :
                            if( $post->post_parent ) {

                                $children_args = [
                                    'post_type' => 'page',
                                    'post_parent' => $post->post_parent,
                                    'order' => 'DESC'
                                ];
                            } else {
                                $children_args = [
                                    'post_type' => 'page',
                                    'post_parent' => $post->ID,
                                    'order' => 'DESC'
                                ];
                            }

                            $children = new WP_Query($children_args);

                            //if ($children) { 
                            if ($children->have_posts() ) { ?>
                            <?php global $post;
                            $pageid = $post->post_parent;
                            ?>
                                <div class="sidebar-header">
                                    <?php if ( is_tree('941') ) : 
                                        echo "About";
                                    else : 
                                        the_field('sidebar_menu_title', $pageid); 
                                    endif; ?>
                                </div>
                                <div class="sidebar-menu">
                                    <ul class="menu" id="menu-practice-areas-menu">
                                        <?php 
                                        while($children->have_posts()) : $children->the_post(); ?>
                                            <li><a href="<?php the_permalink(); ?>"><?php the_field('page_title_h1', get_the_ID()); ?></a></li>
                                        <?php endwhile; ?>
                                    </ul>
                                </div>

                            <?php } else { ?>
                                <div class="sidebar-header">Our Practice Areas</div>
                                <div class="sidebar-menu">
                                    <?php the_field('practice_area_menu','options'); ?>	
                                    <div class="spacer-30"></div>
                                    <p class="sidebar-more"><a href="/practice-areas/" title="Read more results">All Practice Areas</a> <span class="icon-tick-down"></span></p>
                                </div>
                            <?php } ?>
                        <?php endif; ?>
                </div>
                <?php if ( $add_block == 'reviews' ) : ?>
                    <div class="column-full block">
                        <?php get_template_part('block','reviews'); ?>
                        <div class="spacer-60"></div>
                        <div class="copy-wrapper">
                            <?php echo $lower; ?>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>
        <?php if ( $add_block == 'contact') : ?>
            <section class="interior-lower">
                <div class="cta-block">
                    <div class="copy-wrapper">
                        <h2>We Make the Difference in Your Story.</h2>
                        <div class="cta-btn-block">
                            <a href="https://kaplanemploymentlaw.cliogrow.com/intake/24aa02f91867242b52f1d5aa9e6cceb9" target="blank" class="btn">Get Started</a>
                        </div>
                    </div>
                </div>
                <div class="container">
                    <div class="columns">
                        <div class="column-full block">
                            <div class="spacer-60"></div>
                            <div class="copy-wrapper">
                                <?php echo $lower; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        <?php endif; ?>
    </section>
    
    <?php if(get_field('include_awards','options')) : ?>
        <?php get_template_part('block','awards'); ?>
    <?php endif; ?>

</div>

<?php get_footer();?>