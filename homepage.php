<?php

/**
 * Template Name: Home Page
 * @package Marvy
 */
get_header();
?>

<?php get_template_part( 'template-parts/home', 'banner' ); ?>
<?php get_template_part( 'template-parts/home', 'about-content' ); ?>
<?php get_template_part( 'template-parts/home', 'feature-pages' ); ?>
<?php get_template_part( 'template-parts/home', 'theme-features' ); ?>
<?php get_template_part( 'template-parts/home', 'latest-blog' ); ?>
<?php get_template_part( 'template-parts/home', 'callout' ); ?>

<?php

// Footer
get_footer();
