<?php
/*
Template Name: Roadmap
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
		<style>
			
			.Artists12Table td{padding:0; }
			.artist_name{height:20vh; display:flex; align-items:center; justify-content:center;}
			.artist_profile,.artist_artwork{ position:relative; height:20vh; align-items:center; justify-content:center; display:flex;}
			.artist_profile img,.artist_artwork img{position:absolute; left:50%; transform:translateX(-50%); top:0; object-fit:contain; width:100%; height:100%;}			
			.bg_wave{
				height:auto; padding-top:3vh; overflow:hidden;
				background:url('/wp-content/themes/twenty-twenty-one-child/images/wavy-line.svg') repeat-y; background-size:2% auto; background-position:top 1vh left;
			}
			.d-none{display:none !important; }
			.active_show_date:before{ content:''; position:absolute; top:50%; left:0; transform:translateY(-50%); height:3px; background:#3e4044; width:18%; margin-left:1.9%;}
			.active_show_date{position:relative; margin-bottom:2vh; font-size: 1vw; max-width: 100%; width:100%; text-align:left; padding-left:20%;}
			.active_show_date .show_date{color: #3e4044;}
			.active_show_date .show_count span{color:#ff9100;}
			body.yellow .active_show_date .show_count span{color:#3e4044;}
			@media screen and (max-width:767px){
				.artist_name,.artist_profile,.artist_artwork{height:15vh;}
				.artist_profile img, .artist_artwork img{ max-width:100%;}
				.bg_wave{background-size:20px auto; padding-left:20px; background-position:top 1vh left 9px;
					padding-top:20px; 
				}
				.active_show_date{ font-size:16px; padding-left:25px;}
				.active_show_date:before{ display:none;}
				
			}
			
		</style>
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
						<?php 
						$roadmapArray = [["name" => "<a href='/artists/marcelo-viquez'>MARCELO VIQUEZ</a>","artwork" => "<img src='https://the-flourishing.com/assets/images/artworks/TWELVE-one/MARCELO-VIQUEZ/thumb/AW12-01-01-3-001.jpg' alt='Jule'>","profile" => "<img src='https://the-flourishing.com/images/artists/1648733940.png' alt='MARCELO VIQUEZ'>"],["name" => "<a href='/artists/edgar-herbst'>EDGAR HERBST</a>","artwork" => "<img src='https://the-flourishing.com/assets/images/artworks/TWELVE-one/EDGAR-HERBST/thumb/AW12-01-02-3-001.jpeg' alt='Karl Lagerfeld und Lotti Huber, Berlin 1996'>","profile" => "<img src='https://the-flourishing.com/images/artists/1648733993.png' alt='EDGAR HERBST'>"],["name" => "<a href='/artists/rita-galmes'>RITA GALMÉS</a>","artwork" => "<img src='https://the-flourishing.com/assets/images/artworks/TWELVE-one/RITA-GALMES/thumb/AW12-01-03-3-001.PNG' alt='iluminada e indiferebte'>","profile" => "<img src='https://the-flourishing.com/images/artists/1648734041.png' alt='RITA GALMES'>"],["name" => "<a href='/artists/markus-keibel'>MARKUS KEIBEL</a>","artwork" => "<img src='https://the-flourishing.com/assets/images/artworks/TWELVE-one/MARKUS-KEIBEL/thumb/AW-12-01-04-3-001.jpg' alt='word fire impression #1'>","profile" => "<img src='https://the-flourishing.com/images/artists/1648734163.png' alt='MARKUS KEIBEL'>"],["name" => "<a href='/artists/words-berlin'>@WORDS.BERLIN</a>","artwork" => "<img src='https://the-flourishing.com/assets/images/artworks/TWELVE-one/WORDS-BERLIN/thumb/aw12-01-05-3-001.png' alt='I Have Faith In You'>","profile" => "<img src='https://the-flourishing.com/images/artists/1648734197.png' alt='@WORDS.BERLIN'>"],["name" => "<a href='/artists/bruno-daureo'>BRUNO DAUREO</a>","artwork" => "BRUNO","profile" => "<img src='https://the-flourishing.com/images/artists/1648734246.png' alt='BRUNO DAUREO'>"],["name" => "<a href='/artists/jean-luc-julien'>JEAN-LUC JULIEN</a>","artwork" => "JEAN","profile" => "<img src='https://the-flourishing.com/images/artists/1648734268.png' alt='JEAN LUC JULIEN'>"],["name" => "<a href='/artists/birgit-kaiser'>BIRGIT KAISER</a>","artwork" => "<img src='https://the-flourishing.com/assets/images/artworks/TWELVE-one/BIRGIT-KAISER/thumb/AW12-01-08-3-001.jpg' alt='Earth Star - Bronze'>","profile" => "<img src='https://the-flourishing.com/images/artists/1648734284.png' alt='BIRGIT KAISER'>"],["name" => "<a href='/artists/janes'>JANES</a>","artwork" => "<img src='https://the-flourishing.com/public/assets/images/artworks/TWELVE-one/JANES/thumb/PARTYMONSTER PM-1.jpg' alt='PARTYMONSTER PM-1'>","profile" => "<img src='https://the-flourishing.com/images/artists/1648734299.png' alt='JANES'>"],["name" => "<a href='/artists/harald-hermann'>HARALD HERMANN</a>","artwork" => "HERBERT","profile" => "<img src='https://the-flourishing.com/images/artists/1648734317.png' alt='HARALD HERMANN'>"],["name" => "<a href='/artists/bjorn-weltbrandt-wallbaum'>BJÖRN WELTBRANDT WALLBAUM</a>","artwork" => "BJÖRN","profile" => "<img src='https://the-flourishing.com/images/artists/1648734341.png' alt='BJÖRN WELTBRANDT WALLBAUM'>"],["name" => "<a href='/artists/greg-tau'>GREG TAU</a>","artwork" => "GREG","profile" => "<img src='https://the-flourishing.com/images/artists/1648734356.png' alt='GREG TAU'>"]];
						$roadmapArrayChunks = array_chunk($roadmapArray, 3);
						?>
						<div  class="left_content_slide bg_wave">
							<div class="active_show_date">
								<div class="show_date">12 December 2022</div> 
								<div class="show_count">Show 12-<span>01</span></div>
							</div>
						<table class="Artists12Table">
							<?php foreach($roadmapArrayChunks as $rowArrays){ ?>
								<tr>
									<?php foreach($rowArrays as $artist){ ?>
										<td>
											<div class="artist_name active"><?=$artist['name']?></div>
											<div class="artist_artwork d-none"><?=$artist['artwork']?></div>
											<div class="artist_profile d-none"><?=$artist['profile']?></div>
										</td>
									<?php } ?>
								</tr>
							<?php } ?>
						</table>
							
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
		
		$(document).ready(function() {   		
		  	setInterval(() => {
				console.log("Interval Started");
				$(".Artists12Table td").each(function(){
					var activeIndex = 0;
					$(this).find("div").each(function(index){
						if($(this).hasClass("active")){
							activeIndex = index;
						}
					});

					activeIndex = (activeIndex == 2) ? 0 : activeIndex+1;
					
					$(this).find("div").removeClass("active").addClass("d-none");
					$(this).children("div").eq(activeIndex).addClass("active").removeClass("d-none");

				});
			}, 3000);

			$(".Artists12Table td").mouseenter(function(e){
				$(this).children('.artist_artwork').removeClass('d-none');
				$(this).children('.artist_name, .artist_profile').addClass('d-none');
			});

			$(".Artists12Table td").mouseleave(function(e){
				$(this).children('.artist_name').removeClass('d-none');
				$(this).children('.artist_artwork, .artist_profile').addClass('d-none');
			});
			 

         });
		 		
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