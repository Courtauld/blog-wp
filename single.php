<?php get_header(); ?>
<main id="main" role="main">
    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
        <article <?php post_class(); ?>>
            <header class="post-header">
                <h1 class="title">
                    <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
                        <?php the_title(); ?>
                    </a>
                </h1>
                <section class="post-meta">
                    Posted on <a href="<?php the_permalink(); ?>"><span class="post-date"><?php the_time('F j, Y'); ?></span></a> by <span class="post-author"><?php the_author_posts_link(); ?></span>
                </section>
            </header>
            <div class="post-thumbnail">
                <?php the_post_thumbnail(''); ?> <!-- This displays the featured image -->
                <?php if ( $caption = get_post( get_post_thumbnail_id() )->post_excerpt ) : ?>
                    <p class="wp-caption-text"><?php echo $caption; ?></p>
                <?php endif; ?><!-- This displays the caption below the featured image -->
            </div> 
            <section class="the-content">
				<?php the_content( 'Continue...' );	?>
				<div style="clear:both;"></div>
            </section>
            <section class="post-meta">
                <?php if ( has_category() ) : ?>
                    <div class="post-categories-div">
                        <h2>Categories</h2>
                        <?php echo get_the_category_list(); ?>
                    </div>
                <?php endif; ?>
                <?php if ( has_tag() ) : ?>
                    <div class="post-tags-div">
                        <h2>Tags</h2>
                        <?php if(get_the_tag_list()) {echo get_the_tag_list('<ul class="post-tags"><li>','</li><li>','</li></ul>');}?>
                    </div>
                <?php endif; ?>
            </section>
        </article>
    <?php endwhile; ?>
    <?php else : ?>
        <article class="post error">
            <h1 class="404">Nothing has been posted like that yet</h1>
			<p>Try searching the site for more articles</p>
			<div class="search-form">
            	<?php get_search_form(); ?>
        	</div>
        </article>
    <?php endif; ?>
</main>
<?php get_sidebar(); ?>
<?php get_footer(); ?>
