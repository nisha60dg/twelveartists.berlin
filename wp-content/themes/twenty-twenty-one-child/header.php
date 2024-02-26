<?php
/**
 * The header.
 *
 * This is the template that displays all of the <head> section and everything up until main.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_One
 * @since Twenty Twenty-One 1.0
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
<link href="<?php bloginfo('stylesheet_directory'); ?>/css/custom-header.css" rel="stylesheet"> 
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
	<script>
	jQuery(document).ready(function(e){
		jQuery('#primary-mobile-menu').click(function(){
			jQuery('.site-header .primary-menu-container').toggleClass('active');
		});
	});
	</script>

<?php if( is_page_template('page-collectors-club-application.php') ){ ?>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
	<script type="text/javascript" src="<?php bloginfo('stylesheet_directory'); ?>/js/jquery.validate.min.js"></script>
	<link href="<?php bloginfo('stylesheet_directory'); ?>/css/collector-club-application.css" rel="stylesheet"> 
<?php }?>	
	
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

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
		
<div id="page" class="site">
	<div class="site_header">
		<div class="style_switcher"><div class="switcher_btn yellow"></div></div>
		<a href="/" class="custom-logo-link" rel="home"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/new-logo.png" class="custom-logo" alt="Twelve artists"></a>
		
		<div class="site_navigation">
			<?php echo do_shortcode('[art_search]'); ?>	
			<div class="arrowListRow">
				<a href="javascript:history.back()"><div class="leftArrow"><span class="dashicons dashicons-arrow-left-alt"></span></div></a>
				<div class="navMenuIcon"><span class="dashicons dashicons-menu"></span></div>
				<a href="javascript:history.forward()"><div class="rightArrow"><span class="dashicons dashicons-arrow-right-alt"></span></div></a>
			</div>
		</div>
						
	</div>
	<div id="content" class="site-content">
		<div id="primary" class="content-area">
			<main id="main" class="site-main" role="main">