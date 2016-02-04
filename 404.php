<?php get_header(); ?>
<main id="main" role="main" title="main">
    <article class="post">
        <header class="post-header">
            <h1 class="title">
                <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">Page not found</a>
            </h1>
        </header>
        <div class="the-content">
            <p>The page you are looking for might have been removed, had its name changed, or be temporarily unavailable.</p>
            <p>Please try the following:</p>
            <ul>
				<li>Make sure that the Web site address displayed in the address bar of your browser is spelled and formatted correctly.</li>
				<li>Click the Back button to try another link.</li>
            </ul>
            <p>Alternatively, try our site search</p>
        </div>
        <div class="search-form">
            <?php get_search_form(); ?>
        </div>
    </article>
</main>
<?php get_sidebar(); ?>
<?php get_footer(); ?>
