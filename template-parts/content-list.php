<?php
/**
 * Template part for displaying posts in lists.
 *
 * @package Faster
 */

?>
<a href="<?php the_permalink(); ?>" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<span class="entry-title"><?php the_title(); ?></span>
	<?php faster_posted_on(); ?>
</a>
