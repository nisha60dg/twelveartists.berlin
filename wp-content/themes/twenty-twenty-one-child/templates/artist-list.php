<?php
/*
Template Name: Artists List
*/


// Initiate curl session in a variable (resource)
$curl_handle = curl_init();

$url = "https://the-flourishing.com/api/artists";

// Set the curl URL option
curl_setopt($curl_handle, CURLOPT_URL, $url);

// This option will return data as a string instead of direct output
curl_setopt($curl_handle, CURLOPT_RETURNTRANSFER, true);

// Execute curl & store data in a variable
$curl_data = curl_exec($curl_handle); 

curl_close($curl_handle);

// Decode JSON into PHP array
$response_data = json_decode($curl_data);

$artists = $response_data->data->Artists;
//echo '<pre>'; print_r($artists); die();
?>
<!doctype html>
<html <?php language_attributes(); ?> <?php twentytwentyone_the_html_classes(); ?>>
	<head>
		<meta charset="<?php bloginfo( 'charset' ); ?>" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />	
		<?php wp_head(); ?>
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
						<div class="left_content_slide">
							<p><strong>OUR ARTISTS </strong></p> 
							<ul class="sortedArtists">
								<?php 
									foreach($artists as $artist) {
										echo '<li><a href="/artists/'. strtolower($artist->artist_slug) .'" class="imgWrap">'. $artist->artist_name .'</a></li>' ;
									}
								?>
								
							</ul>							
						</div>
					</div>
					<div class="four_width">
						<div class="scale_0_8 right_content_slide">							
							<p><strong class="dark">THE GLORIOUS TWELVE<br>12 artists</strong></p>
							<p><strong class="dark">Show</strong><br><strong>01</strong> <strong class="dark">/ 48</strong><br><strong class="dark">TWELVE-</strong><strong>one</strong></p>
							<p><strong class="dark">Vernissage<br>12 physical artworks <br>12</strong> <strong>December 2021</strong></p>
							<p><strong class="dark">Finnisage <br>1200+ art+NFTs <br>12 </strong><strong>April 2022</strong></p>
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