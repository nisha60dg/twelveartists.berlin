<?php
/*
Template Name: Slideshow Landing
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
		<script type="text/javascript" src="<?php bloginfo('stylesheet_directory'); ?>/js/slick.min.js"></script>	
		<link href="<?php bloginfo('stylesheet_directory'); ?>/css/slideshow-template.css" rel="stylesheet"> 
		<link href="<?php bloginfo('stylesheet_directory'); ?>/css/slick.css" rel="stylesheet"> 
	</head>
	<body>
		<div class="site_header">
			<div class="style_switcher"><div class="switcher_btn yellow"></div></div>
			<a href="/" class="custom-logo-link" rel="home"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/new-logo.png" class="custom-logo" alt="Twelve artists"></a>
		</div>
		<div class="slideshow">
			<!-- <div class="slide-item">
				<div class="full_width">
					<div class="eight_width">
						<div class="full_width">
							<div class="five_width my-auto">
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
							<p><a href="/artists/edgarherbst"><strong class="dark">EDGAR HERBST</strong></a> <br>series: UNTER FREUNDEN <br>(AMONGST FRIENDS) <br>Not on sale</p>
						</div>
					</div>
				</div>
			</div> slide 1-->
			
			<div class="slide-item">
				<div class="full_width">
					<div class="eight_width">
						<div class="left_content_slide">
							<img src="<?php bloginfo('stylesheet_directory'); ?>/images/artist_fair.jpg" alt="artist fair">
						</div>
					</div>
					<div class="four_width">
						<div class="scale_0_8 right_content_slide">							
							<p><a href="/" style="text-decoration:none;"><strong>twelveartists.berlin</strong></a> <br>is brought to you by <br>Mimir Advisory GmbH <br>Lohmühlenstraße 65<br> 12435 Berlin<br><br>AG Charlottenburg HRB 217010 B <br> Director: Stefan Weynfeldt <br><a href="tel:+493062932000" class="dark" style="text-decoration:none;">+49 30 6293 2000</a> <br><a href="mailto:hello@twelveartists.berlin" class="dark" style="text-decoration:none;">hello@twelveartists.berlin</a></p>
						</div>
					</div>
				</div>
			</div><!-- slide 2-->
			
			<div class="slide-item">
				<div class="full_width">
					<div class="eight_width">
						<div class="left_content_slide">
							<img src="<?php bloginfo('stylesheet_directory'); ?>/images/landing-slide2.jpg" alt="MARCELO VIQUEZ">
						</div>
					</div>
					<div class="four_width">
						<div class="scale_0_8 right_content_slide">
							<p><strong class="dark">Eva</strong><br>an <strong>art</strong>+NFT by</p>
							<p><a href="/artists/marceloviquez"><strong class="dark">MARCELO VIQUEZ</strong></a> <br>series: friendship, love and partnership <strong class="dark">a series of</strong> <strong>185 art</strong><strong class="dark">+NFTs</strong> published by twelveartists.berlin, 2022</p>
						</div>
					</div>
				</div>
			</div><!-- slide 2-->
			
			<div class="slide-item">
				<div class="full_width">
					<div class="eight_width">
						<div class="left_content_slide">
							<img src="<?php bloginfo('stylesheet_directory'); ?>/images/landing-slide3.jpg" alt="EDGAR HERBST">
						</div>
					</div>
					<div class="four_width">
						<div class="scale_0_8 right_content_slide">
							<p><strong class="dark">Karl Lagerfeld und Lotti Huber</strong><br>an <strong>art</strong>+NFT by</p>
							<p><a href="/artists/edgarherbst"><strong class="dark">EDGAR HERBST</strong></a> <br>series: ZERROSSENE BILDER <br>(TORN PICTURES) <br><strong class="dark">a series of 120</strong> <strong>art</strong><strong class="dark">+NFTs</strong> published by twelveartists.berlin, 2022</p>
						</div>
					</div>
				</div>
			</div><!-- slide 3-->
			
			<div class="slide-item">
				<div class="full_width">
					<div class="eight_width">
					<a href="/showroom/12-01-03/wall/1">
						<div class="left_content_slide">
						<img src="<?php bloginfo('stylesheet_directory'); ?>/images/landing-slide4.jpg" alt="RITA GALMÉS">
						</div>
					</a>
					</div>
					<div class="four_width">
						<div class="scale_0_8 right_content_slide">
							<p><strong class="dark">Iluminada e indiferente</strong><br>an <strong>art</strong>+NFT by</p>
							<p><a href="/artists/ritagalmes"><strong class="dark">RITA GALMÉS</strong></a> <br>series: el nacimiento (the beginning) <strong class="dark">a series of 102</strong> <strong>art</strong><strong class="dark">+NFTs</strong> published by twelveartists.berlin, 2022</p>
						</div>
					</div>
				</div>
			</div><!-- slide 4-->
			
			<div class="slide-item">
				<div class="full_width">
					<div class="eight_width">
						<div class="left_content_slide">
							<img src="<?php bloginfo('stylesheet_directory'); ?>/images/landing-slide5.jpg" alt="wordsberlin">
						</div>
					</div>
					<div class="four_width">
						<div class="scale_0_8 right_content_slide">
							<p><strong class="dark">I have faith in you</strong><br>an <strong>art</strong>+NFT by</p>
							<p><a href="/artists/wordsberlin"><strong class="dark">@WORDS.BERLIN</strong></a> <br>series: words to a friend <strong class="dark">a series of 101</strong> <strong>art</strong><strong class="dark">+NFTs</strong> published by twelveartists.berlin, 2021</p>
						</div>
					</div>
				</div>
			</div><!-- slide 5--> 
			
			<div class="slide-item">
				<div class="full_width">
					<div class="eight_width">
						<div class="left_content_slide">
							<img src="<?php bloginfo('stylesheet_directory'); ?>/images/landing-slide6.jpg" alt="BRUNO DAUREO">
						</div>
					</div>
					<div class="four_width">
						<div class="scale_0_8 right_content_slide">
							<p><strong class="dark">Love</strong><br>an <strong>art</strong>+NFT by</p>
							<p><a href="/artists/brunodaureo"><strong class="dark">BRUNO DAUREO</strong></a> <br>series: la puerta (the door) <strong class="dark">a series of 120</strong> <strong>art</strong><strong class="dark">+NFTs</strong> published by twelveartists.berlin, 2022</p>
						</div>
					</div>
				</div>
			</div><!-- slide 6-->
			
			<div class="slide-item">
				<div class="full_width">
					<div class="eight_width">
						<div class="left_content_slide">
							<img src="<?php bloginfo('stylesheet_directory'); ?>/images/landing-slide7.jpg" alt="JANES">
						</div>
					</div>
					<div class="four_width">
						<div class="scale_0_8 right_content_slide">
							<p><strong class="dark">Partymonster PM-12</strong><br>an <strong>art</strong>+NFT by</p>
							<p><a href="/artists/janes"><strong class="dark">JANES</strong></a> <br>series: PARTYMONSTER <strong class="dark">a series of 100</strong> <strong>art</strong><strong class="dark">+NFTs</strong> published by twelveartists.berlin, 2022</p>
						</div>
					</div>
				</div>
			</div><!-- slide 7-->
			
			<div class="slide-item">
				<div class="full_width">
					<div class="eight_width">
						<div class="left_content_slide">
							<img src="<?php bloginfo('stylesheet_directory'); ?>/images/landing-slide8.jpg" alt="HARALD HERMANN">
						</div>
					</div>
					<div class="four_width">
						<div class="scale_0_8 right_content_slide">
							<p><strong class="dark">Skizze 6</strong><br>acrylic on canvas, 41cm x 30cm<br>a physical artwork by </p>
							<p><a href="/artists/haraldhermann"><strong class="dark">HARALD HERMANN</strong></a> <br>series: welcome to the floraissance a series of physical artworks available at twelveartists.berlin, 2021</p>
						</div>
					</div>
				</div>
			</div><!-- slide 8-->
			
			<div class="slide-item">
				<div class="full_width">
					<div class="eight_width">
						<div class="left_content_slide">
							<img src="<?php bloginfo('stylesheet_directory'); ?>/images/landing-slide9.jpg" alt="BJÖRN WELTBRANDT WALLBAUM">
						</div>
					</div>
					<div class="four_width">
						<div class="scale_0_8 right_content_slide">
							<p><strong class="dark">Night on sea</strong><br>oil on wood, 164cm x 122cm<br>a physical artwork by </p>
							<p><a href="/artists/bjornweltbrandtwallbaum"><strong class="dark">BJÖRN WELTBRANDT WALLBAUM</strong></a> <br>series: All ships!<br> a series of physical artworks available at twelveartists.berlin, 2021</p>
						</div>
					</div>
				</div>
			</div><!-- slide 9-->
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
				
				$('.slideshow').slick({
				  dots: true,
				  arrows:false,
				  infinite: true,
				  speed: 500,
				  fade: true,
				  autoplay:true,
				  pauseOnHover:false,
				  cssEase: 'linear',
				  responsive: [
					{
					  breakpoint: 768,
					  settings: {						
						adaptiveHeight:true,
					  }
					}
				  ]
				});
			});
		</script>
	</body>
</html>