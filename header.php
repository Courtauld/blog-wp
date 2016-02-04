<!DOCTYPE html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width" />
<title>
    <?php // WordPress custom title script

    // If there is no title specified then add in Untitled into the title tag
    
    // is the current page a tag archive page?
    if (function_exists('is_tag') && is_tag()) { 
        // if so, display this custom title
        echo 'Tag Archive for &quot;'.$tag.'&quot; - '; 
    // or, is the page an archive page?
    } elseif (is_archive()) { 
        // if so, display this custom title
        wp_title(''); echo ' Archive - '; 
    // or, is the page a search page?
    } elseif (is_search()) { 
        // if so, display this custom title
        echo 'Search for &quot;'.wp_specialchars($s).'&quot; - '; 
    // or, is the page a single post or a literal page?
    } elseif (!(is_404()) && (is_single()) || (is_page())) { 
        // if so, display this custom title
        wp_title(''); echo ' - '; 
    // or, is the page an error page?
    } elseif (is_404()) {
    // yep, you guessed it
        echo 'Not Found - '; 
    }
    // finally, display the blog name for all page types
    bloginfo('name'); 

    // add in 'The Courtauld Institute of Art/Gallery' afterwards!
    echo ' - The Courtauld Institute of Art'; 

    ?>
</title>

<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<!--[if lt IE 9]>
<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js" type="text/javascript"></script>
<![endif]-->

<?php wp_head();
// This fxn allows plugins, and Wordpress itself, to insert themselves/scripts/css/files
// (right here) into the head of your website. 
// Removing this fxn call will disable all kinds of plugins and Wordpress default insertions. 
// Move it if you like, but I would keep it around.
?>
</head>
<body>
    <header id="site-header" class="header" role="banner">
        <div class="header-logo">
            <h1 id="site-title">
                <a href="http://courtauld.ac.uk/">
                    <?php if ( get_theme_mod( 'courtauld_blogs_logo' ) ) : ?>
                        <img src='<?php echo esc_url( get_theme_mod( 'courtauld_blogs_logo' ) ); ?>' alt='<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>'>
                    <?php else : ?>
                        <img src="http://courtauld.ac.uk/wp-content/themes/courtauld/images/base/logo.jpg" alt="The Courtauld Institute of Art" alt='<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>'>
                <?php endif; ?>
                </a>
            </h1>
        </div>
        <div style="clear:both;"></div>
        <!-- Navigation toggle button -->
        <a href="#site-nav" id="menu-open" class="header-button button-open button" title="Jump to the main navigation" role="button" tabindex="-1">Menu</a>
        <nav id="site-nav" role="navigation">
            <ul>
                <li><a href="http://courtauld.ac.uk/gallery">Gallery</a></li>
                <li><a href="http://courtauld.ac.uk/study">Study</a></li>
                <li><a href="http://courtauld.ac.uk/research">Research</a></li>
                <li><a href="http://courtauld.ac.uk/learn">Learn</a></li>
                <li><a href="http://courtauld.ac.uk/support">Support</a></li>
                <li><a href="http://courtauld.ac.uk/alumni">Alumni</a></li>
                <li><a href="http://courtauld.ac.uk/news">News</a></li>
                <li><a href="http://courtauld.ac.uk/about">About</a></li>
                <li><a href="http://courtauld.ac.uk/whats-on">What&#8217;s On</a></li>
            </ul>
        </nav>
        <!-- Nav Closing Button -->
        <a href="#top" id="menu-close" class="header-button button-close button" role="button" title="Jump back to the start of the page">×</a>
    </header>
    <!-- The #Brand div contains the header and the title -->
    <div id="brand" style="color:<?php header_textcolor(); ?>; background-image: url(<?php header_image(); ?>);">
        <div class="black-transparency">
            <div id="header-alignment">
                <h1 class="site-title">
                <a href="<?php echo esc_url( home_url( '/' ) ); // Link to the home page ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); // Title it with the blog name ?>" rel="home" style="color: <?php header_textcolor(); ?>;"><?php bloginfo( 'name' ); // Display the blog name ?></a>
                </h1>
                <p class="site-description">
                    <?php bloginfo( 'description' ); // Display the blog description, found in General Settings ?>
                </p>
            </div>
        </div>
    </div>
        <div id="main-container">