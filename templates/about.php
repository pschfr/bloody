<?php
/*
Template Name: About
*/

// Enqueues the CSS and JS for CF7
if (function_exists('wpcf7_enqueue_scripts'))
	wpcf7_enqueue_scripts();

if (function_exists('wpcf7_enqueue_styles'))
	wpcf7_enqueue_styles();
?>
<?php get_header(); ?>
<section id="content" role="main" class="row">
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
<article id="post-<?php the_ID(); ?>" <?php post_class('column small-12'); ?>>
<section class="entry-content">
<?php if ( has_post_thumbnail() ) { the_post_thumbnail(); } ?>
<?php the_content(); ?>
<div class="entry-links"><?php wp_link_pages(); ?></div>
</section>
</article>
<?php if ( ! post_password_required() ) comments_template( '', true ); ?>
<?php endwhile; endif; ?>
</section>
<?php get_sidebar(); ?>
<?php get_footer(); ?>
