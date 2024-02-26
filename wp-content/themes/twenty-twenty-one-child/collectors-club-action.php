<?php

$errorMessage = '';
add_filter('submit_club_member_registration_form','process_club_member_registration_form', 10,2);
function process_club_member_registration_form($data){
	ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
	$response = [];
	if(isset($data['submitted'])) {
		$data['membership_status']='new';
		$data['request_type']='api_call';
		$first_name = trim($data['first_name']);
		$last_name = trim($data['last_name']);
		$email = trim($data['email']);
		$pronouns = trim($data['pronouns']);	
		$wallet_address = trim($data['wallet_address']);
		$data['id_proof_image'] =  new CURLFile($_FILES['id_proof_image']['tmp_name'], $_FILES['id_proof_image']['type']) ;
		$data['address_proof_image'] =  new CURLFile($_FILES['address_proof_image']['tmp_name'], $_FILES['address_proof_image']['type']) ;
		
		if(!isset($hasError)) {
			$headers = [
					'Content-Type: multipart/form-data',
					'User-Agent: '.$_SERVER['HTTP_USER_AGENT'],
				];

			$cURLConnection = curl_init('https://the-flourishing.com/api/clubmembers');
			curl_setopt($cURLConnection, CURLOPT_POSTFIELDS, $data);
			curl_setopt($cURLConnection, CURLOPT_HTTPHEADER, $headers);
			curl_setopt($cURLConnection, CURLOPT_RETURNTRANSFER, true);

			$apiResponse = curl_exec($cURLConnection);
			curl_close($cURLConnection);

			$jsonArrayResponse = json_decode($apiResponse);
			
			if($jsonArrayResponse->status == 200){
				
				header("Location: ".$_POST['return_url'] );
				$emails = ['uday.jbbn@gmail.com'];
				$emailTo = implode(',', $emails);
				if (!isset($emailTo) || ($emailTo == '') ){
					$emailTo = get_option('uday.jbbn@gmail.com');
				}
				$subject = 'New Club Membership Application Request' ;
				$body = "First Name: $first_name \n\nLast Name: $last_name \n\nPronouns: $pronouns \n\nEmail: $email \n\n";
				
				$headers = "Reply-To: ".$first_name."  <".$email.">\r\n";
				$headers .= 'From: '.$first_name.' <'.$emailTo.'>'."\r\n";
				$headers .= 'MIME-Version: 1.0' . "\r\n";
				$headers .= "Content-type: text/plain; charset=iso-8859-1\r\n"; 
				$headers .= "X-Priority: 3\r\n";
			
				wp_mail($emailTo, $subject, $body, $headers);
				$emailSent = true;
				$response = [
					'status'	=> true,
					'message'	=>	'Email Sent successfully',
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

		}
	}
	
	return $response;
}
 ?>
