<?php
/*
Template Name: Single Artwork
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
		
		<script src="https://rawgit.com/ethereum/web3.js/0.16.0/dist/web3.min.js"></script>
		<script src="https://cdn.jsdelivr.net/npm/ethjs@0.3.0/dist/ethjs.min.js"></script>		
	</head>
	<body>
		<div class="site_header">
			<div class="style_switcher"><div class="switcher_btn yellow"></div></div>
			<a href="/" class="custom-logo-link" rel="home"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/new-logo.png" class="custom-logo" alt="Twelve artists"></a>
		</div>
		<div class="order-step h-100">
						<?php //  echo '<pre>'; print_r($artwork_data); die(); ?>    
			<div class="slide-item">
				<div class="full_width">
					<div class="eight_width">
						<div class="left_content_slide">
						<?php
						$image_type = explode(".",$artwork_data->artwork_image);
						// print_r($image_type);
						if($image_type[2]=='gif')
							$imagePath = $artwork_data->artwork_image;
						else
							$imagePath = $artwork_data->artwork_thumb;
						?>
							<img src="<?php echo $imagePath; ?>" alt="<?php echo ($artwork_data->artwork_title); ?>">
						</div>
					</div>
					<div class="four_width">
						<div class="scale_0_8 right_content_slide">
							<p><strong class="dark"><?php echo ($artwork_data->artwork_title); ?></strong><br>an <strong>art</strong>+NFT by</p>
							<p><a href="/artists/<?php echo ($artwork_data->artist_slug); ?>"><strong class="dark"><?php echo ($artwork_data->artist_name); ?></strong></a> <br>series: <?php echo ($artwork_data->artwork_series); ?> <br><strong class="dark">a series of 120</strong> <strong>art</strong><strong class="dark">+NFTs</strong> published by twelveartists.berlin, 2022</p>
							<p><br>As a <a href="/collectors-club" target="_blank"> club member</a>, you can purchase this <strong>art</strong>+NFT here and now for <br><strong class="dark">1,850 ETH including VAT plus gas fees.</strong></p>
							<!-- <a href="/order-process-step-3/" class="new_btn">I love it - I buy it</a> -->
							<?php 
							if($artwork_data->artwork_sale_status=='reserved'){
								echo "<p><strong>Reserved until:</strong><strong class='dark'> ".$artwork_data->reserved_until."</strong></p>";
							}elseif($artwork_data->artwork_sale_status=='sold'){
								echo "<p><strong>Sold</strong></p>";
							}else
							{								
							?>
							<div class="btn-group">
								<a href="javascript:void(0)" class="btn-group-item" id="wishlist">love it</a>
								<a href="javascript:void(0)" class="btn-group-item" id="buy_now">buy it</a>
								<a href="javascript:void(0)" class="btn-group-item" id="">show it</a>
							</div>
							<?php
							}
							?>
							<input type="hidden" name="metamask_wallet" id="metamask_wallet" value="" />
							<input type="hidden" name="artwork_slug" id="artwork_slug" value="<?php echo ($artwork_data->artwork_slug); ?>" />
						</div>
						
						<div class="site_navigation">
							<?php echo do_shortcode('[art_search]'); ?>	
							<div class="arrowListRow">
								<a href="/artworks/<?php echo strtolower($artwork_data->prev_slug); ?>"><div class="leftArrow"><span class="dashicons dashicons-arrow-left-alt"></span></div></a>
								<div class="navMenuIcon"><span class="dashicons dashicons-menu"></span></div>
								<a href="/artworks/<?php echo strtolower($artwork_data->next_slug); ?>"><div class="rightArrow"><span class="dashicons dashicons-arrow-right-alt"></span></div></a>
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
				
				$(document).on('click', '#buy_now', function(e){
					let wallet = $('#metamask_wallet').val();
					let artwork = $('#artwork_slug').val();
					var siteURL = $(location).attr("origin");
					if(wallet == ''){
						alert('Open your MetaMask Extension and login your account first');
					}else{
						let url = siteURL+"/order/"+artwork+"/wallet/"+wallet;
						$(location).attr('href',url);
					}
					
				});
				
				$(document).on('click', '#wishlist', function(e){
					$(this).toggleClass('added');
				});
				
				
				
			});
		</script>
		
		<?php wp_footer(); ?>
		
		<script>		
		 window.addEventListener('load', async () => {
			// Modern dapp browsers...
			if (window.ethereum) {
				window.web3 = new Web3(ethereum);
				try {
					// Request account access if needed
					await ethereum.enable();
					const accounts = await ethereum.request({ method: 'eth_accounts' });
					//console.log(accounts[0]);
						document.getElementById("metamask_wallet").value = accounts[0];
					// Acccounts now exposed
					web3.eth.sendTransaction({});
				} catch (error) {
				// User denied account access...
					if (error.code === -32002) {
						alert('Open your MetaMask Extension and login your account first'); 
					  } else {
						console.error(error);
					  }
					
				}
			}
			// Legacy dapp browsers...
			else if (window.web3) {
				window.web3 = new Web3(web3.currentProvider);
				// Acccounts always exposed
				web3.eth.sendTransaction({/* ... */});
			}
			// Non-dapp browsers...
			else {
				alert('Non-Ethereum browser detected. You should install MetaMask Extension');
			}
		});
		</script>
		
	</body>
</html>