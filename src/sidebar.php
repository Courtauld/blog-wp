<aside id="sidebar">
    <?php if ( ! dynamic_sidebar( 'primary-widget-area' ) ) : ?>
        <div id="archives" class="primary-widget">
            <h3 class="primary-widget-title"><?php _e( 'Archives' ); // Wordpress archives widget ?></h3>
            <ul>
                <?php wp_get_archives( array( 'type' => 'monthly' ) ); ?>
            </ul>
        </div>
    <?php endif; // end sidebar widget area ?>
</aside>