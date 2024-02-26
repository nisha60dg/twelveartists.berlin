<?php
add_action( 'wp_enqueue_scripts', 'enqueue_child_theme_setup' );

function enqueue_child_theme_setup(){
	$parenthandle = 'parent-style'; // This is 'twentyfifteen-style' for the Twenty Fifteen theme.
    $theme = wp_get_theme();
    wp_enqueue_style( $parenthandle, get_template_directory_uri() . '/style.css', array(),  $theme->parent()->get('Version'));
    wp_enqueue_style( 'child-style', get_stylesheet_uri(),array( $parenthandle ),$theme->get('Version'));
	
}

function ww_load_dashicons(){
    wp_enqueue_style('dashicons');
}
add_action('wp_enqueue_scripts', 'ww_load_dashicons');

require_once 'collectors-club-action.php';
require_once 'inc/shortcode.php';

function process_search_crm_results(){
	$data = $_POST;
	
	$errors = array();
	
	if(!isset($data['search']) || empty($data['search']) ){
		$errors = array("success" => false, "message" => "Search Field is required.");
	}
	
	if(empty($errors)){
		$url = API_URL."/artwork-search/".urlencode($data['search']);

		$curl = curl_init($url);
		curl_setopt($curl, CURLOPT_URL, $url);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

		//for debug only!
		curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

		$response = curl_exec($curl);
		curl_close($curl);

		//echo '<pre>'; print_r($response); die;
		echo json_encode($response); die;
	}
	die;
}
add_action('wp_ajax_search_crm_results', 'process_search_crm_results');
add_action('wp_ajax_nopriv_search_crm_results', 'process_search_crm_results');


/**
 * Manage Custom URL Rewrite Rules
 * 
 * 
 */
function ta_artwork_custom_urls() {
    add_rewrite_rule( 'artists/([a-z0-9-]+)[/]?$', 'index.php?artists=$matches[1]', 'top' ); 
	add_rewrite_rule( 'artworks/([a-z0-9-]+)[/]?$', 'index.php?artworks=$matches[1]', 'top' );	
	add_rewrite_rule( 'series/([a-z0-9-]+)[/]?$', 'index.php?series=$matches[1]', 'top' );	
	add_rewrite_rule( 'showroom/([-a-zA-Z0-9]+)/wall/([-a-zA-Z0-9]+)$','index.php?showroom=$matches[1]&wall=$matches[2]','top' );
	add_rewrite_rule( 'order/([-a-zA-Z0-9]+)/wallet/([-a-zA-Z0-9]+)$', 'index.php?order=$matches[1]&wallet=$matches[2]', 'top' ); 
	add_rewrite_rule( 'order-confirmation/', 'index.php?order-confirmation', 'top' ); 
	//add_rewrite_rule( 'showroom/([a-z0-9-]+)[/]?$', 'index.php?showroom=$matches[1]', 'top' );	
	//add_rewrite_rule( 'artists/([-a-zA-Z0-9]+)/series/([-a-zA-Z0-9]+)$','index.php?artists=$matches[1]&series=$matches[2]','top' );
}
 
add_action( 'init', 'ta_artwork_custom_urls' );

/**
 * 
 * 
 * 
 */
add_filter( 'query_vars', function( $query_vars ) {
    $query_vars[] = 'artists';
    $query_vars[] = 'series';
    $query_vars[] = 'artworks';
	$query_vars[] = 'showroom';
	$query_vars[] = 'wall';
	$query_vars[] = 'order';
	$query_vars[] = 'wallet';
	$query_vars[] = 'order-confirmation';
    return $query_vars;
} );

add_action('parse_request', 'ta_parse_requests', 10);
function ta_parse_requests() {
    global $wp, $wp_query;
    
    if(isset($wp->query_vars['artists']) ) {
		
			// Initiate curl session in a variable (resource)
			$curl_handle = curl_init();

			$url = API_URL."/artwork-search-detail/artist/".$wp->query_vars['artists'];

			// Set the curl URL option
			curl_setopt($curl_handle, CURLOPT_URL, $url);

			// This option will return data as a string instead of direct output
			curl_setopt($curl_handle, CURLOPT_RETURNTRANSFER, true);

			// Execute curl & store data in a variable
			$curl_data = curl_exec($curl_handle); 

			curl_close($curl_handle);

			// Decode JSON into PHP array
			$response_data = json_decode($curl_data);

			$artist_data = $response_data->data->Artist;
			
			$showroom_data = $response_data->data->showRoom;
			
			$Show = $response_data->data->Show;
			
			if(file_exists(get_stylesheet_directory().'/templates/artist-vita.php')){
				include_once get_stylesheet_directory().'/templates/artist-vita.php';
			}
		
        exit;
    } else if(isset($wp->query_vars['artworks'])) {
		
		
        // Initiate curl session in a variable (resource)
		$curl_handle = curl_init();

		$url = API_URL."/artwork/".$wp->query_vars['artworks'];

		// Set the curl URL option
		curl_setopt($curl_handle, CURLOPT_URL, $url);

		// This option will return data as a string instead of direct output
		curl_setopt($curl_handle, CURLOPT_RETURNTRANSFER, true);

		// Execute curl & store data in a variable
		$curl_data = curl_exec($curl_handle); 

		curl_close($curl_handle);

		// Decode JSON into PHP array
		$response_data = json_decode($curl_data);
		$artwork_data  = $response_data->data->ArtWork; 
		
        if(file_exists(get_stylesheet_directory().'/templates/single-artwork.php')){
            include_once get_stylesheet_directory().'/templates/single-artwork.php';
        }
        exit;
		
	}else if(isset($wp->query_vars['series']) ) {
			// Initiate curl session in a variable (resource)
			$curl_handle = curl_init();

			$url = API_URL."/artwork-search-detail/series/".$wp->query_vars['series'];

			// Set the curl URL option
			curl_setopt($curl_handle, CURLOPT_URL, $url);

			// This option will return data as a string instead of direct output
			curl_setopt($curl_handle, CURLOPT_RETURNTRANSFER, true);

			// Execute curl & store data in a variable
			$curl_data = curl_exec($curl_handle); 

			curl_close($curl_handle);

			// Decode JSON into PHP array
			$response_data = json_decode($curl_data);
			//echo '<pre>'; print_r($response_data); die; 
			$series_data = $response_data->data->Artworks; 
			$series_list = $response_data->data->Series; 
			
			if(file_exists(get_stylesheet_directory().'/templates/artist-series.php')){
				include_once get_stylesheet_directory().'/templates/artist-series.php';
			}
			exit;
	}else if(isset($wp->query_vars['showroom']) ) {
			// Initiate curl session in a variable (resource)
			$curl_handle = curl_init();
			
			$wall_prefix = $wp->query_vars['showroom'].'-'.$wp->query_vars['wall'];
			$url = API_URL."/artist/wall/".$wall_prefix;

			// Set the curl URL option
			curl_setopt($curl_handle, CURLOPT_URL, $url);

			// This option will return data as a string instead of direct output
			curl_setopt($curl_handle, CURLOPT_RETURNTRANSFER, true);

			// Execute curl & store data in a variable
			$curl_data = curl_exec($curl_handle); 

			curl_close($curl_handle);

			// Decode JSON into PHP array
			$response_data = json_decode($curl_data);
			//  echo '<pre>'; print_r($response_data); die;  
			$wall_settings = $response_data->data->wallSettings; 
			$series_list = $response_data->data->Series; 
			$total_walls = $response_data->data->wallSettings->total_walls; 
			$wall_data = $response_data->data->wallData; 
			if($wp->query_vars['wall']==$total_walls)
				$next_wall = $wp->query_vars['wall'];
			else
				$next_wall = $wp->query_vars['wall']+1;
			if($wp->query_vars['wall']==1)
				$prev_wall = $wp->query_vars['wall'];
			else
				$prev_wall = $wp->query_vars['wall']-1;
			
			if(file_exists(get_stylesheet_directory().'/templates/artist-wall.php')){
				include_once get_stylesheet_directory().'/templates/artist-wall.php';
			}
			exit;
	}else if(isset($wp->query_vars['order']) && isset($wp->query_vars['wallet'])) {
			
			$curl_handle = curl_init();
			
			// web service call to check user is club collector member with this wallet address ?
			$url = API_URL."/connect-member/".$wp->query_vars['wallet'];

			// Set the curl URL option
			curl_setopt($curl_handle, CURLOPT_URL, $url);

			// This option will return data as a string instead of direct output
			curl_setopt($curl_handle, CURLOPT_RETURNTRANSFER, true);

			// Execute curl & store data in a variable
			$curl_data = curl_exec($curl_handle); 

			curl_close($curl_handle);

			// Decode JSON into PHP array
			$response_data = json_decode($curl_data);
			// echo '<pre>'; print_r($response_data); die;  
			if($response_data->status==200){
			// record found with given wallet address. Redirect user to order detail page.	
				$club_member = $response_data->data->ClubMembership;
				// Get artwork data 
				$curl_handle = curl_init();
				$url = API_URL."/artwork/".$wp->query_vars['order'];
				curl_setopt($curl_handle, CURLOPT_URL, $url);
				curl_setopt($curl_handle, CURLOPT_RETURNTRANSFER, true);
				$curl_data = curl_exec($curl_handle); 
				curl_close($curl_handle);
				// Decode JSON into PHP array
				$response_data = json_decode($curl_data);
				$artwork_data  = $response_data->data->ArtWork; 
				if(file_exists(get_stylesheet_directory().'/templates/order-step-three.php')){
					include_once get_stylesheet_directory().'/templates/order-step-three.php';
				}
			}elseif($response_data->status==400){
			// record not found with given wallet address. Redirect user to club collector registration.
				$return_url =  get_bloginfo('url').'/order/'.$wp->query_vars['order'].'/wallet/'.$wp->query_vars['wallet'];
				$url = get_bloginfo('url').'/collectors-club/?return_url='.urlencode($return_url);
				wp_redirect( $url );
			}
			exit;
	}
}

add_filter('place_order_form', 'ta_place_order_form', 10, 2);
function ta_place_order_form($data) {

			// Place order through API
			$headers = [
					'Content-Type: multipart/form-data',
					'User-Agent: '.$_SERVER['HTTP_USER_AGENT'],
				];
			$cURLConnection = curl_init(API_URL.'/order');
			curl_setopt($cURLConnection, CURLOPT_POSTFIELDS, $data);
			curl_setopt($cURLConnection, CURLOPT_HTTPHEADER, $headers);
			curl_setopt($cURLConnection, CURLOPT_RETURNTRANSFER, true);

			$apiResponse = curl_exec($cURLConnection);
			curl_close($cURLConnection);

			$jsonArrayResponse = json_decode($apiResponse);
			
			if($jsonArrayResponse->status == 200){
				
				$emails = array('uday.jbbn@gmail.com',$data['user_email']);
				$emailTo = implode(',', $emails);
				if (!isset($emailTo) || ($emailTo == '') ){
					$emailTo = get_option('uday.jbbn@gmail.com');
				}
				$subject = 'New Order Request' ;
				// $body = "First Name: $first_name \n\nLast Name: $last_name \n\nPronouns: $pronouns \n\nEmail: $email \n\n";
				
				// $headers = "Reply-To: ".$first_name."  <".$email.">\r\n";
				$headers .= 'From: '.$data['user_name'].' <'.$data['user_email'].'>'."\r\n";
				$headers .= 'MIME-Version: 1.0' . "\r\n";
				$headers .= "Content-type: text/html; charset=iso-8859-1\r\n"; 
				$headers .= "X-Priority: 3\r\n";
				
				$body = "<p style='text-align:center; font-size:18px; font-weight:bold;'>Thank you for your confidence and trust</p><p style='text-align:center; font-size:18px; '>You have ordered:</p>";
				$body .= "<table style='border-collapse: collapse; border:1px solid #ddd; width:100%; max-width:400px; margin-left:auto; margin-right:auto;'>
							<tr><td colspan='2' style='border:1px solid #ddd; padding:5px; text-align:center;'><img style='max-width:300px;' src='".$data['artwork_image']."' alt='".$data['artwork_title']."' /></td></tr>
							<tr><td style='border:1px solid #ddd; padding:5px;'>Artwork ID</td><td style='border:1px solid #ddd; padding:5px;'>".$data['artwork_id']."</td></tr>
							<tr><td style='border:1px solid #ddd; padding:5px;'>Title</td><td style='border:1px solid #ddd; padding:5px;'>".$data['artwork_title']."</td></tr>
							<tr><td style='border:1px solid #ddd; padding:5px;'>Artist</td><td style='border:1px solid #ddd; padding:5px;'>".$data['artist_name']."</td></tr>
							<tr><td style='border:1px solid #ddd; padding:5px;'>Price</td><td style='border:1px solid #ddd; padding:5px;'>1,850 ETH</td></tr>
						</table>";
				$body .= "<p style='text-align:center;'>The artwork has been reserved for you for 12 hours.</p>";
				$body .= "<p style='text-align:center;'>The reservation and this order confirmation expire on ".$data['order_expiry']." Berlin time.";
				$body .= "<p style='text-align:center;'>Upon receipt of payment before ".$data['order_expiry']." Berlin time, ownership will be transferred to ".$data['wallet_address'];
				$body .= "<p style='text-align:center;'>Kindly send the amount of 1,850 ETH to our: <payment-wallet>. </p>";
   			
				wp_mail($emailTo, $subject, $body, $headers);
				$emailSent = true; 
				$response = [
					'status'	=> true,
					'message'	=>	'Order place successfully & email sent!',
					'data'		=> $data,
				];
		  }else{
				if(is_object($jsonArrayResponse->message)){
					foreach($jsonArrayResponse->message as $error){
						if(is_string($error)){
							$errorMessage .= '<p class="error">'.$error.'</p>';
						}else{
							foreach($error as $message){
								$errorMessage .= '<p class="error">'.$message.'</p>';
							}
						}
					}				
				}else{
					$errorMessage = $jsonArrayResponse->message;
				}
			}
			return $response;
}
?>