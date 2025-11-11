    <section id="pre-footer">
        <div class="container">
            <div class="columns">
                <div class="column-75 center centered block">
                    <h2><?php the_field('pre_footer_headline','options'); ?></h2>
                    <?php if( get_field('pre_footer_subheadline','options') ) : ?>
                        <p class="subhead"><?php the_field('pre_footer_subheadline','options'); ?></p>
                    <?php endif; ?>
                    <p><?php the_field('pre_footer_copy','options'); ?></p>
                    <div class="pre-footer-contact">
                        <div class="contact-block-left">
                            <p><a href="https://kaplanemploymentlaw.cliogrow.com/intake/24aa02f91867242b52f1d5aa9e6cceb9" title="Online form" target="blank">Get Started</a> <span class="icon-right-arrow"></span></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>