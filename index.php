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
            <?php the_post_thumbnail(); ?> 
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
                    <div class="post-tags">
                        <h2>Tags</h2>
                        <?php echo get_the_tag_list(); ?>
                    </div>
                <?php endif; ?>
            </section>
        </article>
    <?php endwhile; ?>
            <nav id="page-nav">
                <?php if(get_previous_posts_link()) { ?>
                    <div id="newer-page" class="button">
                        <?php previous_posts_link( 'Newer' ); // Display a link to  newer posts, if there are any, with the text 'newer' ?>
                    </div>
                <?php }; ?>
                <?php if(get_next_posts_link()) { ?>
                    <div id="older-page" class="button">
                        <?php next_posts_link( 'Older' ); // Display a link to  older posts, if there are any, with the text 'older' ?>
                    </div>
                <?php }; ?>
            </nav>
    <?php else : ?>
        <article class="post error">
            <h1 class="404">Nothing has been posted like that yet</h1>
        </article>
    <?php endif; ?>
</main>
<?php get_sidebar(); ?>
<?php get_footer(); ?>