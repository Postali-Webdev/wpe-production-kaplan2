
<section class="banner">
    <div class="container">
    
    <?php if (is_singular('attorneys')) { ?>
        <p id="breadcrumbs"><span><span><a href="/">Homepage</a> <span class="separator"> / </span> <a href="/about/">About</a> <span class="separator"> / </span> <span class="breadcrumb_last" aria-current="page"><?php the_title(); ?></span></span></span></p>
    <?php } elseif(is_post_type_archive('attorneys'))  { ?>  
        <p id="breadcrumbs"><span><span><a href="/">Homepage</a> <span class="separator"> / </span> <span class="breadcrumb_last" aria-current="page">About</span></span></span></p>
    <?php } elseif(is_singular('results'))  { ?> 
        <p id="breadcrumbs"><span><span><a href="/">Homepage</a> <span class="separator"> / </span> <a href="/results/">Results</a> <span class="separator"> / </span> <span class="breadcrumb_last" aria-current="page"><?php the_title(); ?></span></span></span></p>
    <?php } elseif(is_single())  { ?>
        <p id="breadcrumbs"><span><span><a href="/">Homepage</a> <span class="separator"> / </span> <a href="/blog/">Blog</a> <span class="separator"> / </span> <span class="breadcrumb_last" aria-current="page"><?php the_title(); ?></span></span></span></p>
    <?php } elseif (is_home()) { ?>
        <p id="breadcrumbs"><span><span><a href="/">Homepage</a> <span class="separator"> / </span> <span class="breadcrumb_last" aria-current="page">Blog</span></span></span></p>
    <?php } else { ?>
        <?php if ( function_exists('yoast_breadcrumb') ) {yoast_breadcrumb('<p id="breadcrumbs">','</p>');} ?> 
    <?php } ?>
        <div class="columns">
            <?php if(is_post_type_archive('reviews')) { ?> <!-- for testimonials -->
                <div class="column-50">
                    <h1><?php the_field('testimonials_header_banner_title','options'); ?></h1>
                    <p><?php the_field('testimonials_header_banner_subheadline','options'); ?></p>
                    <p class="cta"><?php the_field('call_to_action_text','options'); ?> </p>
                    <div class="main-contact">
                        <div class="contact-block-left">
                            <a title="Online form" href="https://kaplanemploymentlaw.cliogrow.com/intake/24aa02f91867242b52f1d5aa9e6cceb9" target="blank" class="btn">Get Started</a>
                        </div>
                    </div>
                </div>

                <?php if(get_field('featured_review_content','options')) { ?>
                <div class="column-50 featured">
                    <p class="notable">NOTABLE REVIEW</p>
                    <p><?php the_field('featured_review_content','options'); ?></p>
                    <div class="author-wrapper">
                        <p class="reviewer"><?php the_field('featured_review_author','options'); ?></p>
                        <img src="/wp-content/uploads/2025/05/featured-review-icon.png" alt="kaplan reviews">
                    </div>
                    <?php 
                    $logo = get_field('featured_review_source','options');
                    if( !empty( $logo ) ): ?>
                        <img src="<?php echo esc_url($logo['url']); ?>" alt="<?php echo esc_attr($logo['alt']); ?>" />
                    <?php endif; ?>
                </div>
                <?php } ?>

            <?php } elseif(is_post_type_archive('results')) { ?> <!-- for results -->

                <div class="column-50">
                    <h1><?php the_field('results_header_banner_title','options'); ?></h1>
                    <p><?php the_field('results_header_banner_subheadline','options'); ?></p>
                    <p class="cta"><?php the_field('call_to_action_text','options'); ?> </p>
                    <div class="main-contact">
                        <div class="contact-block-left">
                            <a title="Online form" href="https://kaplanemploymentlaw.cliogrow.com/intake/24aa02f91867242b52f1d5aa9e6cceb9" target="blank" class="btn">Get Started</a>
                        </div>
                    </div>
                </div>

                <?php if(get_field('featured_result_headline','options')) { ?>
                <div class="column-50 result">
                    <div class="result-main">
                        <p class="notable">NOTABLE RESULT</p>
                        <h3><?php the_field('featured_result_headline','options'); ?></h3>
                    </div>
                    <div class="accordions">
                        <div class="accordions_title"><p>View Details <span></span></p></div>
                        <div class="accordions_content"><p><?php the_field('featured_result_content','options'); ?></p></div>
                    </div>
                </div>
                <?php } ?>

            <?php } elseif(is_post_type_archive('attorneys')) { ?> <!-- for results -->

                <div class="column-66">
                    <h1><?php the_field('attorneys_header_banner_title','options'); ?></h1>
                    <div class="spacer-30"></div>
                    <p><?php the_field('attorneys_header_banner_subheadline','options'); ?></p>
                    <div class="main-contact">
                        <div class="contact-block-left">
                            <a title="Online form" href="https://kaplanemploymentlaw.cliogrow.com/intake/24aa02f91867242b52f1d5aa9e6cceb9" target="blank" class="btn">Get Started</a>
                        </div>
                    </div>
                </div>

            <?php } elseif(is_singular('attorneys')) { ?> <!-- for blog posts -->
                <div class="column-66">
                    <h1><?php the_title(); ?></h1>
                    <p><?php the_field('banner_value_proposition'); ?></p>
                    <p class="cta"><?php the_field('call_to_action_text','options'); ?> </p>
                    <div class="main-contact">
                        <div class="contact-block-left">
                            <a title="Online form" href="https://kaplanemploymentlaw.cliogrow.com/intake/24aa02f91867242b52f1d5aa9e6cceb9" target="blank" class="btn">Get Started</a>
                        </div>
                    </div>
                </div>

            <?php } elseif(is_post_type_archive('media-mentions')) { ?>
                <div class="column-50">
                    <h1>Media Mentions</h1>
                    <p><?php the_field('testimonials_header_banner_subheadline','options'); ?></p>
                    <p class="cta"><?php the_field('call_to_action_text','options'); ?> </p>
                    <div class="main-contact">
                        <div class="contact-block-left">
                            <a title="Online form" href="https://kaplanemploymentlaw.cliogrow.com/intake/24aa02f91867242b52f1d5aa9e6cceb9" target="blank" class="btn">Get Started</a>
                        </div>
                    </div>
                </div>                
            <?php } elseif(is_home()) { ?> <!-- for blog posts -->
                <div class="column-66">
                    <h1><?php the_field('blog_header_banner_title','options'); ?></h1>
                    <div class="spacer-30"></div>
                    <p><?php the_field('blog_header_banner_subheadline','options'); ?></p>
                    <p class="cta"><?php the_field('call_to_action_text','options'); ?> </p>
                    <div class="main-contact">
                        <div class="contact-block-left">
                            <a title="Online form" href="https://kaplanemploymentlaw.cliogrow.com/intake/24aa02f91867242b52f1d5aa9e6cceb9" target="blank" class="btn">Get Started</a>
                        </div>
                    </div>
                </div>

            <?php } elseif(is_404()) { ?> <!-- for 404 error posts -->
                <div class="column-66">
                    <h1><?php the_field('404_header_banner_title','options'); ?></h1>
                    <p><?php the_field('404_header_banner_subheadline','options'); ?></p>
                </div>

            <?php } elseif(is_single()) { ?> <!-- for blog posts -->
                <div class="column-75 block">
                    <p class="header-callout">WRITTEN BY KAPLAN EMPLOYMENT LAW</p>
                    <h1><?php the_title(); ?></h1>
                </div>

            <?php } else { ?>

            <div class="column-66 block">
                <?php if(is_singular('attorneys')) { ?>

                <?php } elseif(is_singular('case_studies')) { ?>
                    <p class="header-callout">CASE STUDY</p>
                <?php } ?>
                <?php if (is_home()) { ?>
                    <h1><?php the_field('blog_header_banner_title','options'); ?></h1>
                <?php } elseif (is_search()) { ?>
                    <h1 class="post-title"><?php printf( esc_html__( 'Search results for "%s"', 'postali' ), get_search_query() ); ?></h1>
                <?php } elseif (is_page_template('page-practice-parent.php') || is_page_template('page-interior.php')) { ?>
                    <h1><?php the_title(); ?></h1>
                <?php } elseif (is_page_template('page-landing.php')) { ?>
                    <h1><?php the_title(); ?></h1>
                <?php } else { ?>
                    <h1><?php the_title(); ?></h1>
                <?php } ?>
                <?php if(!is_singular('case_studies')) { ?>
                    <div class="spacer-15"></div>
                <?php } ?>
                <?php if (is_home()) { ?>
                    <p><?php the_field('blog_header_banner_subheadline','options'); ?></p>   
                <?php } elseif (is_page_template('page-landing.php')) { ?>
                    <p class="value-prop"><?php the_field('practice_areas_value_prop','options'); ?></p>                 
                <?php } else { ?>
                    <p><?php the_field('banner_value_proposition'); ?></p>
                <?php } ?>

                <?php if(is_singular('attorneys') || is_singular('case_studies') || is_single()) { ?>

                <?php } ?>
                <?php if(!is_single()) { ?>
                    <p class="cta"><?php the_field('call_to_action_text','options'); ?> </p>
                    <div class="main-contact">
                        <div class="contact-block-left">
                            <?php $add_clio = get_field('add_clio_btn');
                                $add_calendly = get_field('add_calendly');
                                $calendly_specific = get_field('calendly_link_specific');
                            if ( $add_clio == true ) : ?>
                                <a title="Online form" href="https://kaplanemploymentlaw.cliogrow.com/intake/24aa02f91867242b52f1d5aa9e6cceb9" target="_blank" class="btn">Get Started</a>
                            <?php endif;
                            if ( $add_calendly == true && !empty($calendly_specific) ) : ?>
                                <a title="Schedule consultation" href="<?php echo $calendly_specific; ?>" target="_blank" class="btn">Schedule</a>
                            <?php elseif ( $add_calendly == true ) : ?>
                                <a title="Schedule consultation" href="<?php the_field('calendly_url','options'); ?>" target="_blank" class="btn">Schedule</a>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php } ?>
                </div>
            <?php } ?>

        </div>
    </div>

    <?php if(is_post_type_archive('attorneys')) { 
        $bg_image = get_field('attorneys_header_default_image','options');
    } elseif(is_post_type_archive('results')) {
        $bg_image = get_field('results_banner_image','options');
    } elseif(is_post_type_archive('media-mentions')) {
        $bg_image = get_field('media_mentions_banner_image','options');
    } elseif(is_home()) { 
        $bg_image = get_field('blog_header_default_image','options');
    } elseif ( $bg_image = get_field('banner_background_image') ) { 
        $bg_image = get_field('banner_background_image');
    } else { 
        $bg_image = get_field('default_background_image','options');
    } ?>

    <div class="banner-bg">
    <?php 
    if( $bg_image ) : ?>
        <img class="interior-banner-img" src="<?php echo esc_url($bg_image['url']); ?>" alt="<?php echo esc_attr($bg_image['alt']); ?>" />
    <?php endif; ?>
    </div>
    
    <?php if(get_field('include_gradient_overlay','options')) { ?>
        <div class="banner-gradient"></div>
    <?php } ?>
</section>