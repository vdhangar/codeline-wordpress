<?php
/**
 * Template Name: Films Page
 *
 * This is the template that displays full width page without sidebar
 *
 * @package unite-child
 */
get_header();

$args = array("post_type" => "films");
$films = new WP_Query($args);

?>

<div id="primary" class="content-area col-sm-12 col-md-8">
	<main id="main" class="site-main" role="main">

		<?php while (have_posts()) : the_post(); ?>

			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<header class="entry-header page-header">

					<a href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>"><?php the_post_thumbnail('unite-featured', array('class' => 'thumbnail')); ?></a>

					<h2 class="entry-title"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h2>

					<?php if ('post' == get_post_type()) : ?>
						<div class="entry-meta">
						    <?php unite_posted_on(); ?>
						</div><!-- .entry-meta -->
					<?php endif; ?>
				</header><!-- .entry-header -->
				<div class="entry-content">
					<?php the_content(); ?>
					<?php
					wp_link_pages(array(
						   'before' => '<div class="page-links">' . __('Pages:', 'unite'),
						   'after' => '</div>',
					));
					?>
				</div><!-- .entry-content -->
				<?php edit_post_link(__('Edit', 'unite'), '<footer class="entry-meta"><i class="fa fa-pencil-square-o"></i><span class="edit-link">', '</span></footer>'); ?>
			</article><!-- #post-## -->

		<?php endwhile; // end of the loop. ?>
		<?php while ($films->have_posts()) : $films->the_post(); ?>
			<?php get_template_part( 'content', 'films'); ?>
		<?php endwhile; // end of the loop. ?>
	</main><!-- #main -->
</div><!-- #primary -->
<?php get_sidebar(); ?>
<?php get_footer(); ?>