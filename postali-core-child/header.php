<?php
/**
 * Theme header.
 *
 * @package Postali Child
 * @author Postali LLC
**/
?><!DOCTYPE html>
<html class="no-js" <?php language_attributes(); ?>>
<head>

<!-- TODO: MOVE TO FUNCTIONS FILE -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=PT+Serif:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet">

<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-KVN4NTRF');</script>
<!-- End Google Tag Manager -->

<!-- Add JSON Schema here -->
<?php 
// Global Schema
$global_schema = get_field('global_schema', 'options');
if ( !empty($global_schema) ) :
    echo '<script type="application/ld+json">' . $global_schema . '</script>';
endif;

// Single Page Schema
$single_schema = get_field('single_schema');
if ( !empty($single_schema) ) :
    echo '<script type="application/ld+json">' . $single_schema . '</script>';
endif; ?>

<meta http-equiv="Content-Type" content="text/html; charset=<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php wp_title( '|', true, 'right' ); ?></title>
<?php wp_head(); ?>

<?php get_template_part('block','design'); ?>

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

<?php get_template_part('block','font-select'); ?>

</head>

<a class="skip-link" href='#main-content'>Skip to Main Content</a>

<body <?php body_class(); ?>>
	<!-- Google Tag Manager (noscript) -->
	<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-KVN4NTRF"
	height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
	<!-- End Google Tag Manager (noscript) -->

	<div class="utility-nav">
		<div class="utility-cta">
			<a title="Online" href="https://kaplanemploymentlaw.cliogrow.com/intake/24aa02f91867242b52f1d5aa9e6cceb9" target="blank" class="btn">Get Started</a>
			<a title="Call today" href="tel:<?php the_field('phone_number', 'options'); ?>" class="btn"><?php the_field('phone_number', 'options'); ?></a>
		</div>
		<div class="social-links">
			<?php if(get_field('social_facebook','options')) { ?>
				<a class="social-link" href="<?php the_field('social_facebook','options'); ?>" title="Facebook" target="blank"><span class="icon-social-facebook"></span></a>
			<?php } ?>
			<?php if(get_field('social_instagram','options')) { ?>
				<a class="social-link" href="<?php the_field('social_instagram','options'); ?>" title="Instagram" target="blank"><span class="icon-social-instagram"></span></a>
			<?php } ?>
			<?php if(get_field('social_linkedin','options')) { ?>
				<a class="social-link" href="<?php the_field('social_linkedin','options'); ?>" title="LinkedIn" target="blank"><span class="icon-social-linkedin"></span></a>
			<?php } ?>
			<?php if(get_field('social_twitter','options')) { ?>
				<a class="social-link" href="<?php the_field('social_twitter','options'); ?>" title="Twitter" target="blank"><span class="icon-social-twitter"></span></a>
			<?php } ?>
			<?php if(get_field('social_youtube','options')) { ?>
				<a class="social-link" href="<?php the_field('social_youtube','options'); ?>" title="YouTube" target="blank"><span class="icon-social-youtube"></span></a>
			<?php } ?>
			<?php if(get_field('social_tiktok','options')) { ?>
				<a class="social-link" href="<?php the_field('social_tiktok','options'); ?>" title="TikTok" target="blank"><span class="icon-social-tiktok"></span></a>
			<?php } ?>
            <?php if(get_field('social_google','options')) { ?>
				<a class="social-link" href="<?php the_field('social_google','options'); ?>" title="Google" target="blank"><span class="icon-google"></span></a>
			<?php } ?>
		</div>
	</div>
	<header>
		<div id="header-top" class="container">
			<div id="header-top_left">
				<?php the_custom_logo(); ?>
			</div>
			
			<div id="header-top_right">
				<div id="header-top_right_menu">
                    <nav role="navigation">
                    <?php
                        $args = array(
                            'container' => false,
                            'theme_location' => 'header-nav'
                        );
                        wp_nav_menu( $args );
                    ?>	
                    </nav>
					<div id="header-top_mobile">
						<div id="menu-icon" class="toggle-nav">
							<span class="line line-1"></span>
							<span class="line line-2"></span>
							<span class="line line-3"></span>
						</div>
					</div>
				</div>
			</div>
		</div>
	</header> 

    <span id="main-content"></span>