<?php get_header(); ?>
<main id="main" role="main">
    <header>
        <h1><?php single_cat_title(); ?> Archive</h1>
        <?php if ( $paged < 2 ) : ?>
            <?php if (is_category('Category A')) : ?>
                
            <?php elseif (is_category('Category B')) : ?>

            <?php else : ?>
        
            <?php endif; ?>
        <?php endif; ?>
    </header>
    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
        <article <?php post_class(); ?>>
            <header class="post-header">
                <h1 class="title">
                    <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>
                </h1>
                <section class="post-meta">
                    <div class="post-date"><?php the_time('F j, Y'); ?></div>
                    <div class="post-author"><?php the_author_posts_link(); ?></div>
                </section>
            </header>
            <?php the_post_thumbnail(); ?> 
            <section class="the-content">
                <?php the_content( 'Continue...' );	?>
            </section>
        </article>
    <?php endwhile; ?>
    <?php else : ?>			
        <article class="post error">
            <h1 class="404">Nothing has been posted like that yet</h1>
        </article>
    <?php endif; ?>
</main>
<?php get_sidebar(); ?>
<?php get_footer(); ?>