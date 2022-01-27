<?php

if($_POST['hippo-form_submit']){
	//echo "<pre>"; print_r($_POST); die('123');
	$auth_token  = get_option( 'hippo_auto_token');
	$auth_url  = get_option( 'hippo_api_url');
	$url = $auth_url."?auth_token=".$auth_token.'&street='.$_POST['street_address'].'&city='.$_POST['city'].'&state='.$_POST['state'].'&zip='.$_POST['zipcode'].'&first_name='.$_POST['fname'].'&last_name='.$_POST['lname'].'&email='.$_POST['email'].'&phone='.$_POST['phone'].'&date_of_birth='.$_POST['dob'];
	
	$url = str_replace(" ", '%20', $url);
	$curl = curl_init();
	curl_setopt($curl, CURLOPT_URL, $url);
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
	$result = curl_exec($curl);
	$value= json_decode($result, true);
	echo '<h2>Quote Premium : ' .$value['quote_premium'].'</h2>';
	if(!$result){die("Connection Failure");}
	curl_close($curl);
	//echo $result;
	
}else{
	 echo'<script> window.location="'.site_url().'/hippo-form/"; </script> ';
	
}
?>