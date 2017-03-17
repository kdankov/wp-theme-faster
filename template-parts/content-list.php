<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Faster
 */

?>
<a href="<?php the_permalink(); ?>" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<span class="entry-title"><?php the_title(); ?></span>
	<?php faster_posted_on(); ?>

</a>
