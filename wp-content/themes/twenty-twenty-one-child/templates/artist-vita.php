<?php
/*
Template Name: Artist Vita
*/
	
?>
<?php wp_head(); ?>

<!doctype html>
<html <?php language_attributes(); ?> <?php twentytwentyone_the_html_classes(); ?>>
	<head>
		<meta charset="<?php bloginfo( 'charset' ); ?>" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />		
		<link rel="preconnect" href="https://fonts.googleapis.com">
		<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
		<link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&display=swap" rel="stylesheet">
		<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
		<script type="text/javascript" src="<?php bloginfo('stylesheet_directory'); ?>/js/slick.min.js"></script>	
		<link href="<?php bloginfo('stylesheet_directory'); ?>/css/slideshow-template.css" rel="stylesheet"> 
		<link href="<?php bloginfo('stylesheet_directory'); ?>/css/slick.css" rel="stylesheet"> 
	</head>
	<body>
		<div class="site_header">
			<div class="style_switcher"><div class="switcher_btn yellow"></div></div>
			<a href="/" class="custom-logo-link" rel="home"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/new-logo.png" class="custom-logo" alt="Twelve artists"></a>
		</div>
		<div class="order-step h-100">
						
			<div class="slide-item">
				<div class="full_width">
					<div class="eight_width">
						<div class="left_content_slide artist_vita_wrap"> 
							<div class="artist_vita">
								<p class="text-center"><strong class="dark"><?php echo ($artist_data->artist_name);  ?></strong></p>
								<img src="<?php echo ($artist_data->artist_image);  ?>" alt="<?php echo ($artist_data->artist_name);  ?>">
								
								<div class="linksList">
								<?php
								if(!empty($response_data->data->ArtistWallSettings))
								{
								?>
									<a href="/showroom/<?php echo ($showroom_data->showroom_prefix);  ?>/wall/1">See the art</a>
								<?php
								}else{
								?>
									<a href="/series/<?php echo strtolower($response_data->data->Series[0]->artwork_slug);  ?>">See the art</a>
								<?php
								}
								?>
									<a href="#aboutShow">Read about the show</a>
									<a href="#aboutArtist">Read About the artist</a>
								</div>
								<!-- <div id="seeArt" class="">
									<p><strong class="dark">The Art</strong></p>
									<p><?php // echo ($artist_data->artist_bio);  ?></p>
								</div> -->
								<div id="aboutShow" class="">
									<p><strong class="dark">About the show</strong></p>
									<p><?php echo ($showroom_data->about_show);  ?></p>
								</div>
								<div id="aboutArtist" class="">
									<p><strong class="dark">About the artist</strong></p>
									<p><?php echo ($artist_data->artist_bio);  ?></p>
								</div>
							</div>
						</div>
					</div>
					<div class="four_width"> 
						<div class="scale_0_8 right_content_slide">
							<p><strong class="dark"><a class="dark" href="/artists/">Our Artists</a></strong><br><strong><?php echo ($artist_data->artist_name);  ?></strong></p>
							<p>Shows<br><strong class="dark">Show <span>01</span>/48 - TWELVE-<span>one</span></strong></p>
							<!-- <p>Shows<br><strong class="dark">Show <?php echo $Show->show_number; ?> - <span><?php echo $Show->show_title; ?></span></strong></p> -->
							<p><strong>art+</strong>NFT series:<br></p>
							
							<?php 
								$seriesList =  $response_data->data->Series;
								// print_r($seriesList);
								echo '<ul class="seriesList">';
								foreach($seriesList as $series) {
									echo '<li><a href="/series/'. strtolower($series->artwork_slug) .'">'.$series->artwork_series. '</a></li>';
								}
								echo '</ul>'
							?>
							
							
						</div>
						
						<div class="site_navigation">
							<?php echo do_shortcode('[art_search]'); ?>							
							<div class="arrowListRow">
								<div class="leftArrow"><span class="dashicons dashicons-arrow-left-alt"></span></div>
								<div class="navMenuIcon"><span class="dashicons dashicons-menu"></span></div>
								<div class="rightArrow"><span class="dashicons dashicons-arrow-right-alt"></span></div>
							</div>
						</div>
					</div>
				</div>
			</div>			
		</div>
		
		<div class="slide-nav-wrapper">
			<?php
			wp_nav_menu(
				array(
					'theme_location'  => 'primary',
					'menu_class'      => 'menu-wrapper',
					'container_class' => 'primary-menu-container',
					'items_wrap'      => '<ul id="primary-menu-list" class="%2$s">%3$s</ul>',
					'fallback_cb'     => false,
				)
			);
			?>
		</div>
		
		<script>
			$(document).ready(function(e){
				$(document).on('click', '.switcher_btn.yellow', function(e){
					$('body').addClass('yellow');
					$('.switcher_btn').removeClass('yellow').addClass('active');
				});
								
				$(document).on('click', '.switcher_btn.active', function(e){
					$('body').removeClass('yellow');
					$('.switcher_btn').addClass('yellow').removeClass('active');
				});	

				$(document).on('click', '.navMenuIcon', function(e){
					$('.slide-nav-wrapper').toggleClass('active');
					$(this).toggleClass('clicked');
				});
				
				
			});
		</script>
		
<?php wp_footer(); ?>
		
	</body>
</html>