<?php
/**
 * Template Name: Front Page
 * @package Postali Child
 * @author Postali LLC
**/
get_header();?>

<div class="body-container">

<div id="banner" class="grey-bg">
    <div class="columns">
        <div class="column-66 block">
            <?php $banner_img = get_field('banner_background_image');
            if( $banner_img ) {
                echo wp_get_attachment_image($banner_img['ID'], 'full', false, ['class' => 'banner-image']);
            } ?>
            <div class="banner-left-wrapper">
                <div class="title-wrapper">
                    <h1><?php the_field('banner_title'); ?></h1>
                    <p class="banner-subtitle"><?php the_field('banner_subtitle'); ?></p>
                </div>
                <div class="search-wrapper">
                    <?php if( have_rows('banner_on_page_nav') ) : ?>
                        <div class="select-box">
                            <select>
                            <?php while( have_rows('banner_on_page_nav') ) : the_row(); ?>
                                <option value="<?php the_sub_field('anchor_link'); ?>"><?php the_sub_field('label'); ?></option>
                            <?php endwhile; ?>
                            </select>
                        </div>
                    <?php endif; ?>
                    <div class="spacer-15"></div>
                    <a href="<?php the_field('clio_form_url', 'options') ?>" class="btn"><?php the_field('banner_cta_copy'); ?></a>
                </div>
            </div>
        </div>
        <div class="column-33 block">
            <?php if( have_rows('banner_featured_cards') ) : ?>
                <div class="card-column">
                    <?php while( have_rows('banner_featured_cards') ) : the_row(); ?>
                        <div class="card">
                            <?php if( get_sub_field('icon') ) : $icon = get_sub_field('icon'); ?>
                                <img src="<?php echo $icon['url'] ?>" alt="<?php echo $icon['alt'] ?>">
                            <?php endif; ?>
                            <p class="title"><?php the_sub_field('title'); ?></p>
                            <?php 
                                $award_images = get_sub_field('awards_images');
                            
                            
                            if( $award_images ) : ?>
                                <div class="image-row">
                                    <?php foreach ($award_images as $award_image) : 
                                        $image = $award_image['award_image'];
                                        $link = $award_image['award_link'];
                                        $rating = $award_image['award_rating'];
                                        ?>

                                        <?php 
                                        if( $link ): ?>
                                            <a href="<?php echo esc_url( $link ); ?>" target="blank"><img src="<?php echo $image['url'] ?>" alt="<?php echo $image['alt'] ?>">
                                                <? if ($rating): ?><span class="agg-rating"><?php echo $rating; ?>⭐</span><?php endif; ?>
                                            </a>
                                        <?php else: ?>
                                            <img src="<?php echo $image['url'] ?>" alt="<?php echo $image['alt'] ?>">
                                            <? if ($rating): ?><span class="agg-rating"><?php echo $rating; ?>⭐</span><?php endif; ?>
                                        <?php endif; ?>

                                        
                                    <?php endforeach; ?>
                                </div>
                            <?php endif; ?>
                            <?php if( get_sub_field('interior_link') ) : $interior_link = get_sub_field('interior_link'); ?>
                                <a href="<?php echo $interior_link['url']; ?>"><?php echo $interior_link['title']; ?></a>
                            <?php endif; ?>
                        </div>
                    <?php endwhile; ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>

<section id="panel-1">
    <div class="container">
        <div class="columns">
            <div class="column-50">
                <div class="column-inner">
                    <p class="subtitle"><?php the_field('intro_subtitle'); ?></p>
                    <h2><?php the_field('intro_title'); ?></h2>
                    <?php the_field('intro_copy'); ?>
                </div>
            </div>
            <div class="column-50">
                <p class="navigation-title"><em><?php the_field('intro_navigation_title'); ?></em></p>
                <?php if( have_rows('intro_interior_page_navigation_links') ) : ?>
                <div class="links-card">
                    <?php while( have_rows('intro_interior_page_navigation_links') ) : the_row(); $interior_link = get_sub_field('page'); ?>
                        <a href="<?php echo $interior_link['url']; ?>"  data-cue="fadeIn"><?php echo $interior_link['title']; ?></a>
                    <?php endwhile; ?>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <div class="columns">
        <div class="column-full block">
            <?php get_template_part('block', 'reviews', [ 'data' => ['offset' => 0, 'link' => get_field('intro_reviews_page_button')]]); ?>
        </div>
    </div>
</section>

<section id="panel-2" class="grey-bg">
    <div class="container">
        <div class="columns">
            <div class="column-full block">
                <div class="copy-wrapper">
                    <h2><?php the_field('pa_title'); ?></h2>
                    <?php the_field('pa_copy'); ?>
                </div>
                <div class="spacer-30"></div>
                <?php if( have_rows('pa_practice_areas') ) : ?>
                    <div class="practice-areas">
                        <?php while( have_rows('pa_practice_areas') ) : the_row(); 
                        $pa_link = get_sub_field('page'); 
                        $pa_icon = get_sub_field('pa_icon');
                        $pa_id = url_to_postid($pa_link['url']);
                        ?>
                        <div class="practice-area" data-cue="fadeIn">
                            <div class="row-1">
                                <a href="<?php echo $pa_link['url'] ?>"></a>
                                <div class="icon">
                                    <img src="<?php echo $pa_icon['url'] ?>" alt="<?php echo $pa_icon['alt'] ?>">
                                </div>
                                <div class="copy">
                                    <p class="title"><?php echo $pa_link['title'] ?></p>
                                </div>
                            </div>
                            <div class="row-2">
                                <a href="<?php echo $pa_link['url'] ?>" title="read more about <?php echo $pa_link['title'] ?>" class="arrow-link"></a>
                            </div>
                        </div>
                        <?php endwhile; ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>

<section id="panel-3">
    <div class="container">
        <div class="columns block">
            <div class="column-50 block">
                <p class="subtitle"><?php the_field('about_subtitle'); ?></p>
                <h2><?php the_field('about_title'); ?></h2>
                <?php the_field('about_copy'); 
                    $about_btn = get_field('about_button');
                ?>
                <?php if($about_btn) { ?>
                    <div class="spacer-30"></div>
                    <a href="<?php echo $about_btn['url']; ?>" class="btn"><?php echo $about_btn['title']; ?></a>
                <?php } ?>
            </div>
            <div class="column-50 block">
                <div class="attorney-card">
                    <?php $attorney_img = get_field('about_attorney_image');
                    if( $attorney_img) {
                        echo wp_get_attachment_image($attorney_img['ID'], 'full');
                    } ?>
                    <div class="copy">
                        <?php
                        $bio_link = get_field('about_title_and_link');
                        if( $bio_link ) : ?>
                            <a href="<?php echo $bio_link['url']; ?>" title="learn more about <?php echo $bio_link['title']; ?>"></a>
                        <?php endif; ?>
                        <p class="name"><?php echo $bio_link['title']; ?></p>
                        <p class="job-title"><?php the_field('about_job_title'); ?></p>
                        <div class="arrow-link"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php if(get_field('include_awards','options')) : ?>
    <?php get_template_part('block','awards'); ?>
<?php endif; ?>

<section id="panel-4" class="blue-bg">
    <div class="container">
        <div class="columns">
            <div class="column-25 block">
                <h2><?php the_field('media_title'); ?></h2>
            </div>
            <div class="column-75 block">
                <?php the_field('media_copy'); ?>
                <?php if( have_rows('in_the_media') ) : ?>
                    <div class="media-mentions">
                        <?php while( have_rows('in_the_media') ) : the_row(); 
                            $media_link = get_sub_field('article_post');
                            $external_link = get_field('article_link', $media_link);
                            $media_image = get_sub_field('article_publisher');
                        ?>
                        <div class="media">
                            <a href="<?php echo $external_link; ?>" target="_blank" title="Read article"></a>
                            <img src="<?php echo $media_image['url']; ?>" alt="<?php echo $media_image['alt']; ?>">
                        </div>

                        <?php endwhile; ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>

<section id="panel-5">
    <div class="columns">
        <div class="column-50 left">
            <div class="column-50_inner">
                <h2><?php the_field('results_title'); ?></h2>
                <?php the_field('results_copy'); ?>
                <?php $results_btn = get_field('results_button'); ?>
                <a href="<?php echo $results_btn['url']; ?>"><?php echo $results_btn['title']; ?></a>
            </div>
        </div>
        <div class="column-50 right">
            <div class="column-50_inner">
                <h2><?php the_field('reviews_title'); ?></h2>
                <?php the_field('reviews_copy'); ?>
                <?php $reviews_btn = get_field('reviews_button'); ?>
                <a href="<?php echo $reviews_btn['url']; ?>"><?php echo $reviews_btn['title']; ?></a>
            </div>
        </div>
    </div>
</section>

<section id="panel-6">
    <div class="columns">
        <div class="column-50 block">
            <?php $contact_bg_img = get_field('contact_background_image'); 
            if ($contact_bg_img) { 
                echo wp_get_attachment_image($contact_bg_img['ID'], 'full'); 
            } ?>
        </div>
        <div class="column-50 block blue-bg">
            <p class="subtitle"><?php the_field('contact_subtitle'); ?></p>
            <h2><?php the_field('contact_title'); ?></h2>
            <?php if( have_rows('contact_what_we_do_list') ) : ?>
                <div class="reasons-wrapper">
                    <?php while( have_rows('contact_what_we_do_list') ) : the_row(); ?>
                    <div class="reason">
                        <span class="checkmark"></span>
                        <p><?php the_sub_field('copy'); ?></p>
                    </div>
                    <?php endwhile; ?>
                </div>
            <?php endif; 
                $contact_btn = get_field('contact_button');
            ?>
            <a href="<?php echo $contact_btn['url']; ?>" class="btn"><?php echo $contact_btn['title']; ?></a>
        </div>
    </div>
</section>

<section id="panel-8" class="grey-bg">
    <div class="container">
        <div class="columns">
            <div class="column-50">
                <p class="process_subtitle"><?php the_field('process_subtitle'); ?></p>
                <h2><?php the_field('process_title'); ?></h2>
            </div>
            <div class="column-full">
                <?php if( have_rows('process') ) : $count = 0; ?>
                    <div class="process-slider">
                        <?php while( have_rows('process') ) : the_row(); 
                        $count++; ?>
                            <div class="outer-process-wrapper">
                                <div class="step"><p>Step <?php echo $count; ?></p></div>
                                <div class="process-card">
                                    <p class="title"><?php the_sub_field('title'); ?></p>
                                    <?php the_sub_field('copy'); ?>
                                </div>
                            </div>
                        <?php endwhile; ?>
                    </div>
                <?php endif; ?>
                <div class="arrow-btn-wrapper">
                    <div class="step-arrow-btn step-prev"></div>
                    <div class="step-arrow-btn step-next"></div>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="panel-9">
    <div class="columns">
        <div class="column-full block">
            <?php get_template_part('block', 'cta', ['data' => ['title' => get_field('contact_simple_title'), 'copy' => '', 'button' => get_field('contact_simple_button'), 'bg_image' => get_field('contact_simple_background_image') ]] ); ?>
        </div>
    </div>
</section>

<section id="panel-10">
    <div class="container">
        <div class="columns">
            <div class="column-full block">
                <p class="subtitle"><?php the_field('faq_subtitle'); ?></p>
                <h2><?php the_field('faq_title'); ?></h2>
                <div class="spacer-30"></div>
                <p class="sm-title"><?php the_field('faq_cta_title'); ?></p>
                <?php if( have_rows('faqs') ) : $count_faq = 0;?>
                    <div class="faq-wrapper">
                        <?php while( have_rows('faqs') ) : the_row(); $count_faq++; ?>
                        <div class="faq-inner-wrapper accordions">
                            <div class="accordions_title question">
                                <p data-faq="answer-<?php echo $count_faq; ?>" class="question-text"><?php the_sub_field('question'); ?></p>
                                <span class="expander">+</span>
                            </div>
                            <div class="accordions_content answer">
                                <span class="letter">A</span>
                                <div class="answer-text">
                                    <?php the_sub_field('answer'); ?>
                                </div>
                            </div>
                        </div>
                        <?php endwhile; ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>

<section id="panel-11" class="blue-bg">
    <div class="container">
        <div class="columns">
            <div class="column-50 block">
                <h2><?php the_field('contact_large_title'); ?></h2>
                <?php the_field('contact_large_copy') ?>
            </div>
            <div class="column-50 block">
                <div class="contact-card">
                    <?php $contact_card_group = get_field('contact_large_schedule_card');
                    $cc_subtitle = $contact_card_group['subtitle'];
                    $cc_title = $contact_card_group['title'];
                    $cc_copy = $contact_card_group['copy'];
                    $cc_link = $contact_card_group['contact_page_link']; ?>
                    <p class="subtitle"><?php echo $cc_subtitle; ?></p>
                    <h3><?php echo $cc_title; ?></h3>
                    <?php echo $cc_copy; ?>
                    <div class="btn-row">
                        <a href="<?php echo $cc_link['url']; ?>" class="btn"><?php echo $cc_link['title']; ?></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php $show_posts = get_field('display_posts');
    if ($show_posts == true) : ?>
    <section id="panel-12">
        <div class="container">
            <div class="columns">
                <div class="column-full block">
                    <div class="copy-wrapper">
                        <p class="subtitle"><?php the_field('blog_subtitle'); ?></p>
                        <h2><?php the_field('blog_title'); ?></h2>
                    </div>
                    <?php get_template_part('block', 'recent-blogs'); 
                        $blog_btn = get_field('blog_page_button');?>
                    <a href="<?php echo $blog_btn['url']; ?>" class="btn"><?php echo $blog_btn['title']; ?></a>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>

<section id="panel-13">
    <div class="columns">
        <div class="column-full block">
            <?php get_template_part('block', 'cta', ['data' => ['title' => get_field('contact_simple_title_2'), 'copy' => '', 'button' => get_field('contact_simple_button_2'), 'bg_image' => get_field('contact_simple_background_image_2') ]] ); ?>
        </div>
    </div>
</section>

<section id="panel-14" class="grey-bg">
    <div class="container">
        <div class="columns">
            <div class="column-full block">
                <div class="social-card">
                    <?php $social_icon = get_field('social_icon'); ?>
                    <img src="<?php echo $social_icon['url'] ?>" alt="<?php echo $social_icon['alt'] ?>">
                    <div class="inner-wrapper">
                        <div class="title-wrapper">
                            <p class="subtitle"><?php the_field('social_subtitle'); ?></p>
                            <h2><?php the_field('social_title'); ?></h2>
                        </div>
                        <?php if( have_rows('social_medias') ) : ?>
                            <div class="social-media-wrapper">
                                <?php while( have_rows('social_medias') ) : the_row(); 
                                $social_link = get_sub_field('social_media'); ?>
                                <a class="highlight" href="<?php echo $social_link['url']; ?>" target="<?php echo $social_link['target']; ?>"><?php echo $social_link['title']; ?></a>
                                <?php endwhile; ?>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


</div><!-- #front-page -->

<?php get_footer();?>