<?php

/**
 * Template Name: Home Page
 * @package Marvy
 */
get_header();
?>

<?php get_template_part( 'template-parts/home', 'feature-content' ); ?>
<?php get_template_part( 'template-parts/home', 'feature-pages' ); ?>
<?php get_template_part( 'template-parts/home', 'theme-features' ); ?>
<?php get_template_part( 'template-parts/home', 'latest-blog' ); ?>

<?php

// Footer
get_footer();
