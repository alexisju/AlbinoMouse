<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package AlbinoMouse
 */

$options = get_option( 'albinomouse' );

get_header(); ?>

<?php if(!isset($options['sidebar-layout']) or $options['sidebar-layout'] == '2c-r') : ?>
	<div id="primary" class="content-area col-md-7">
<?php elseif($options['sidebar-layout'] == '2c-rs') : ?>
	<div id="primary" class="content-area col-md-8">
<?php elseif($options['sidebar-layout'] == '2c-l') : ?>
	<div id="primary" class="content-area col-md-7 col-md-offset-1 pull-right">
<?php elseif($options['sidebar-layout'] == '2c-ls') : ?>
	<div id="primary" class="content-area col-md-8 col-md-offset-1 pull-right">
<?php else : ?>
	<div id="primary" class="content-area col-md-12">
<?php endif; ?>

		<main id="main" class="site-main" role="main">
		
			<?php if ( have_posts() ) : ?>
	
				<?php /* Start the Loop */ ?>
				<?php while ( have_posts() ) : the_post(); ?>
	
					<?php
						/* Include the Post-Format-specific template for the content.
						 * If you want to override this in a child theme, then include a file
						 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
						 */
						get_template_part( 'content', get_post_format() );
					?>
	
				<?php endwhile; ?>
	
				<?php albinomouse_content_nav( 'nav-below' ); ?>
	
			<?php else : ?>
	
				<?php get_template_part( 'no-results', 'index' ); ?>
	
			<?php endif; ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php if($options['sidebar-layout'] != '1col') :
	get_sidebar(); 
endif; ?>

<?php get_footer(); ?>