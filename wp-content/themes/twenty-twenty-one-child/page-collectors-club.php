<?php
/*
Template Name: Collector Club
*/
?>

<?php 
if(isset($_GET['return_url']))
{
	$return_url = urldecode($_GET['return_url']);
}
get_header(); 
?>
	<div id="container" style="margin-top:0;">
		<div id="content">
			<?php if ( have_posts() ) : while ( have_posts() ) : the_post();
			the_content();
			endwhile; else: ?>
			<p>Sorry, no posts matched your criteria.</p>
			<?php endif; ?>
			<div class="col-btn-wrapper">
			<a href="/collectors-club-membership-application/?return_url=<?php echo urlencode($return_url); ?>" class="btn-collector" role="button">Become a Club Member Now!</a>
			</div>
						
		</div><!-- #content -->
	</div><!-- #container -->
	
<?php get_footer() ?>