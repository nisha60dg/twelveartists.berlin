<?php
/*
Template Name: Order Process Step 3
*/
?>
<?php
if(isset($_POST['submit'])){
	//print_r($_POST);
	//$response = apply_filters('submit_club_member_registration_form', $_POST);
	$response = apply_filters('place_order_form', $_POST);
}
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
		
		<?php if(isset($response) && !empty($response)){ ?>
		<?php if($response['status'] == true) { ?>
			<?php // header("Location: ".$_POST['return_url'] ); ?>
			<div class="order-step h-100">			
			<div class="slide-item">
				<div class="full_width">
					<div class="eight_width">
						<div class="full_width">
			<h3 style="width: 100%; text-align: center;">Order Confirmation </h3>
			<p style="width: 100%; text-align: center;">
				Thank you for your confidence and trust. You have ordered: 
			</p>
			
				<div class="full_width" style="height:auto;">
					<div class="five_width">
						<table>
							<tr>
								<th>Order</th>
								<td>#<?=$response['data']['order_number']?></td>
							</tr>
							<tr>
								<th>Billing Details</th>
								<td><?=$response['data']['user_name']?> | <?=$response['data']['email']?></td>
							</tr>
							<tr>
								<th>Artwork ID:</th>
								<td><?=$response['data']['artwork_id']?></td>
							</tr>
							<tr>
								<th>Title</th>
								<td><?=$response['data']['artwork_title']?></td>
							</tr>
							<tr>
								<th>Artist</th>
								<td><?=$response['data']['artist_name']?></td>
							</tr>
							<tr>
								<th>Price</th>
								<td>1,850 ETH </td>
							</tr>
						</table>
					</div>
					<div class="five_width">
						<img src="<?=$response['data']['artwork_image']?>" alt="<?php echo ($response['data']['artwork_title']); ?>">
					</div>
				</div>
			
			<p>
				The artwork has been reserved for you for 12 hours. <br>
				The reservation and this order confirmation expire on <?=$response['data']['order_expiry']?> Berlin time
			</p>
			<p>
				Upon receipt of payment before <?=$response['data']['order_expiry']?> Berlin time, 
				ownership will be transferred to <?=$response['data']['wallet_address']?>
			</p>
			<p>
				Kindly send the amount of 1,850 ETH to our payment wallet
			</p>
			</div>
			</div>
			<div class="four_width">						
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
		<?php } else if($response['status'] == false) { ?>
			<p class="error"><?php echo $response['message']; ?><p>
		<?php }else{ ?>
			<p class="error">Sorry, something went wrong! Please try again later.<p>
		<?php } ?>
	<?php }else{ ?>
		
		<div class="order-step h-100">			
			<div class="slide-item">
				<div class="full_width">
					<div class="eight_width">
						<div class="full_width">
							<div class="five_width my-auto">
								<p><strong>Order Verification</strong></p>
								<p><strong class="dark"><?php echo ($artwork_data->artwork_id); ?></strong></p>
								<p><strong class="dark"><?php echo ($artwork_data->artwork_title); ?></strong></p>
								<p><strong class="dark"><?php echo ($artwork_data->artist_name); ?></strong></p>
								<p>Total amount payable via ETH: <strong class="dark">1,850 ETH including VAT and gas fees</strong></p>
								<p>Ownership shall be transferred to <br> <strong class="dark"><?php echo ($club_member->wallet_token); ?></strong></p>
								<p>The order confirmation shall be issued to: 
									<?php echo $club_member->pronouns.' '.$club_member->first_name.' '.$club_member->last_name; ?>
								</p>
								<div class="tab border-checkbox">
									<div class="checkgroup">
										<input type="checkbox" id="check1" name="check1" required/> 
										<label class="forcheck" for="check1">I confirm that the above information is correct.</label>
									</div>
									<div class="checkgroup">
										<input type="checkbox" id="check2" name="check2" required/>
										<label class="forcheck" for="check2">I confirm that I have read and accept the terms and conditions. </label>
									</div>
									<div class="checkgroup">
										<input type="checkbox" id="check3" name="check3" required/>
										<label class="forcheck" for="check3">I understand that following my order, the ownership of the art+NFT will be registered in the Ethereum blockchain and that such registration cannot be cancelled.</label>		
									</div>
									<form id="orderConfirmationForm" method="post" >
									<?php
									$image_type = explode(".",$artwork_data->artwork_image);
									// print_r($image_type);
									if($image_type[2]=='gif')
										$imagePath = $artwork_data->artwork_image;
									else
										$imagePath = $artwork_data->artwork_thumb;
									?>
									<input type="hidden" name="user_id" value="<?php echo ($club_member->id); ?>" />
									<input type="hidden" name="user_email" value="<?php echo ($club_member->email); ?>" />
									<input type="hidden" name="user_name" value="<<?php echo $club_member->pronouns.' '.$club_member->first_name.' '.$club_member->last_name; ?>" />
									<input type="hidden" name="artwork_id" value="<?php echo ($artwork_data->artwork_id); ?>" />
									<input type="hidden" name="artwork_title" value="<?php echo ($artwork_data->artwork_title); ?>" />
									<input type="hidden" name="artist_name" value="<?php echo ($artwork_data->artist_name); ?>" />
									<input type="hidden" name="artwork_image" value="<?php echo ($imagePath); ?>" />
									<?php $order_number = date('Y').'-12CB-'.$club_member->id.date('h:i'); ?>
									<input type="hidden" name="order_number" value="<?php echo $order_number; ?>" />
									<input type="hidden" name="wallet_address" value="<?php echo $club_member->wallet_token; ?>" />
									<input type="hidden" name="order_amount" value="1850 ETH" />
									<?php $expiry_time = date("Y-m-d H:i:s", strtotime('+12 hours'))  ?>
									<input type="hidden" name="order_expiry" value="<?php echo $expiry_time; ?>" />
									<input type="hidden" name="order_status" value="reserved" />
									<div style="text-align:right; margin-top:20px;">						  
										<button type="submit" name="submit" class="next btn-rounded btn-sm">confirm order and request payment instructions</button>
									</div>
									</form>
								</div>
							</div>
							<div class="five_width my-auto text-center">
								
								<img src="<?php echo $imagePath; ?>" alt="<?php echo ($artwork_data->artwork_title); ?>">
							</div>
						</div>						
					</div>
					<div class="four_width">
						<div class="scale_0_8 right_content_slide">
							<p><strong class="dark">Karl Lagerfeld und Lotti Huber</strong><br>an <strong>art</strong>+NFT by</p>
							<p><strong class="dark">EDGAR HERBST</strong> <br>series: ZERROSSENE BILDER <br>(TORN PICTURES) <br><strong class="dark">a series of 120</strong> <strong>art</strong><strong class="dark">+NFTs</strong> published by twelveartists.berlin, 2022</p>
							<p><br>You can purchase this <strong>art</strong>+NFT here and now for <strong class="dark">1,850 ETH including VAT plus gas fees.</strong></p>
							<a href="#" class="new_btn">I love it - I buy it</a>
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
	<?php } ?>
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