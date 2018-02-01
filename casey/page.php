<?php

//WORDPRESS FUNCTION TO GET THE HEADER
get_header();

// IF THERE ARE POSTS DISPLAY THE POSTS
if (have_posts()) :
	while (have_posts()) : the_post(); ?>
	
	<article class="post">
		
			<!-- DISPLAY THE POSTS CONTENT -->
		<?php the_content(); ?>
	</article>
	
	<?php endwhile;

	// ELSE IF THERE ARE NO POSTS DISPLAY MESSAGE
	else :
		echo '<p>No content found</p>';
	
	endif;
	
	//WORDPRESS FUNCTION TO GET THE FOOTER
get_footer();

?>