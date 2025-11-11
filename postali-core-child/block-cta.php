<?php 

$block_title = $args['data']['title'];
$block_copy = $args['data']['copy'];
$block_button = $args['data']['button'];
$block_bg_image = $args['data']['bg_image'];

?>

<div class="cta-block">
    <?php echo wp_get_attachment_image($block_bg_image['ID'], 'full'); ?>
    <div class="copy-wrapper">
        <h2><?php echo $block_title; ?></h2>
        <?php if( $block_copy) {
            echo $block_copy;
        } ?>
        <div class="cta-btn-block">
            <?php if( $block_button) { ?>
                <a href="<?php echo $block_button['url']; ?>" class="btn"><?php echo $block_button['title']; ?></a>
            <?php } ?>
            <?php if(is_page_template('front-page.php')) { ?>
                <a href="<?php the_field('contact_button_url'); ?>" class="btn" target="blank">Get Started</a>
            <?php } ?>
        </div>
    </div>
</div>