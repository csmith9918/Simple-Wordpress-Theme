<?php

//WORDPRESS FUNCTION TO GET THE HEADER
get_header();

// IF THERE ARE POSTS DISPLAY THE POSTS
if (have_posts()) :
	while (have_posts()) : the_post(); ?>
	
	<article class="post">
			<!-- DISPLAY THE POSTS TITLE WITH A LINK ON EACH TITLE -->
		<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
			<!-- DISPLAY THE POSTS CONTENT -->

			<p class = "post-info"><?php the_time('F jS, Y'); ?> | <a href = "<?php get_author_posts_url(get_the_author_meta('ID')); ?>"><?php the_author(); ?></a> | Posted in

				<?php
				$categories = get_the_category(); // get the post categories and store in variable
				$seperator = ", ";
				$output = '';


				// LOOP THROUG THE CATEGORIES
				if($categories) {

					foreach ($categories as $category) {
						$output .= '<a href = "' .get_category_link($category->term_id). '">' .$category->cat_name . '</a>'  . $seperator; // TURN THE CATEGORIES INTO LINKS
					}

					echo trim($output, $seperator); //REMOVE THE COMMA ON FINAL CATEGORY
				}

				?>
			</p>


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