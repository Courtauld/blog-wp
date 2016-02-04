<?php get_header(); ?>
<main id="main" role="main">
<!-- This sets the $curauth variable -->
    <?php
    $curauth = (isset($_GET['author_name'])) ? get_user_by('slug', $author_name) : get_userdata(intval($author));
    ?>
    <article class="author-profile">
        <header>
            <h1>Contributor - <?php echo $curauth->display_name; ?></h1>
        </header>
        <div id="author-photo">
             <?php echo get_avatar( $curauth->id, 512); ?>
        </div>
        <section id="author-description">
            <p><?php echo $curauth->user_description; ?></p>
            <!--<p><a href="http://twitter.com/<?php echo get_user_meta($curauth->id, 'twitter', true); ?>">Twitter</a></p>
            <p><a href="http://facebook.com/<?php echo $curauth->facebook; ?>">Facebook</a></p>
            <p><a href="http://instagram.com/<?php echo get_user_meta($curauth->id, 'instagram', true); ?>">Instagram</a></p>
            <p><a href="http://pinterest.com/<?php echo get_user_meta($curauth->id, 'pinterest', true); ?>">Pinterest</a></p>-->
        </section>
        <div style="clear:both;"></div>
    </article>
        <?php if ( have_posts() ) : ?>
        <section class="author-recent-posts">
            <h1><?php echo $curauth->first_name; ?>'s recent posts</h1>
            <?php while ( have_posts() ) : the_post(); ?>
                <article <?php post_class("excerpt"); ?>>
                    <header class="post-header">
                        <h3 class="title">
                            <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>
                        </h3>
                        <section class="post-meta">
                            Posted on <a href="<?php the_permalink(); ?>"><span class="post-date"><?php the_time('F j, Y'); ?></span></a> by <span class="post-author"><?php the_author_posts_link(); ?></span>
                        </section>
                    </header>
                    <?php the_post_thumbnail(); ?>
                    <section class="the-excerpt">
                        <?php the_excerpt( 'Continue...' );	?>
                    </section>
                </article>
            <?php endwhile; ?>
            </section>
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
        <?php endif; ?>
</main>
<?php get_sidebar(); ?>
<?php get_footer(); ?>