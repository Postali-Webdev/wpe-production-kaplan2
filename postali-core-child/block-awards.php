    <section class="awards">
        <div class="container">
            <div class="columns">
                <div id="awards" class="slide">
                    <?php $n=1 ?>
                    <?php if( have_rows('awards','options') ): ?>
                    <?php while( have_rows('awards','options') ): the_row(); ?>  
                        <div class="column-20" id="award_<?php echo $n; ?>">
                        <?php 
                        $image = get_sub_field('award_image');
                        $link = get_sub_field('award_link');
                        if( $link ) { ?>
                            <a href="<?php echo esc_url( $link ); ?>" target="blank"><img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" /></a>
                        <?php } else { ?>
                            <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
                        <?php } ?>
                        </div>
                        <?php $n++; ?>
                    <?php endwhile; ?>
                    <?php endif; ?> 
                </div>
            </div>
        </div>
    </section>