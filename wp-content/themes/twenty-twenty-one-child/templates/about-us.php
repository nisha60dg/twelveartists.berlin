<?php
/*
Template Name: About Us
*/
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
		<link href="<?php bloginfo('stylesheet_directory'); ?>/css/slideshow-template.css" rel="stylesheet"> 	
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
						<div class="full_width">
							<div class="five_width about-us-info my-auto">
								<p><strong>You're here?<br> That's awesome</strong></p>
								<p>May I introduce myself: my name is Stefan Weynfeldt and my mission is to make High Art by Humans seen, loved and collected as <strong>art</strong>+NFTs</p>
								<p>Great, seeing you at my side,</p>
								<img src="<?php bloginfo('stylesheet_directory'); ?>/images/stefan-sign.png" alt="Stefan Weynfeldt">
								<p>You want to find out more about my gallery and the growing network of trusted partners?</p>
								<a href="#" class="new_btn">More about us</a>
							</div>
							<div class="five_width my-auto text-center">
								<img src="<?php bloginfo('stylesheet_directory'); ?>/images/stefan.jpg" alt="Stefan Weynfeldt">
							</div>
						</div>
					</div>
					<div class="four_width">
						<div class="scale_0_8 right_content_slide">
							<p><strong class="dark">Stefan Weynfeldt mit Blumenstrauß</strong><br>by</p>
							<p><strong class="dark">EDGAR HERBST</strong> <br>series: UNTER FREUNDEN <br>(AMONGST FRIENDS) <br>Not on sale</p>
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
	</body>
</html>