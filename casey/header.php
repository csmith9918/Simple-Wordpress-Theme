<!DOCTYPE html>
<html <?php language_attributes(); ?>>
	<head>
		<meta charset="<?php bloginfo('charset'); ?>">
		<meta name = "viewport" content="width=device-width">
		<title><?php bloginfo('name'); ?></title>
		<?php wp_head(); ?> <!--Let wordpress add code after we add code if need be.-->
	</head>

	<body <?php body_class(); ?>>

		<!-- CREATE THE MAIN NAVIGATION -->

		<nav class = "site-nav">

					<!-- Create a primary location for the header menu links -->

					<?php
					$args = array (
						'theme_location' => 'primary'
					);
					?>

					<?php wp_nav_menu( $args); ?> <!-- Call the args array created above -->
				</nav>

		<!-- END MAIN NAVIGATION -->

		<!-- MAIN CONTAINER -->
		<div class = "container" > 



			<!-- SITE HEADER -->
			<header class = "site-header">
				<h1><a href="<?php echo home_url(); ?>"> <?php bloginfo('name'); ?></a></h1>
				<h5><?php bloginfo('description'); ?></h5>

				

			</header> <!-- END SITE HEADER -->
