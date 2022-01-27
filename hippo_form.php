<?php
$url  = get_option( 'hippo_thank_you_page');
if(empty($page)){
	$url=  site_url().'/hippo-thankyou/';
}
?>
<div class="hippo-form ">
	<form id="hippo-form" action="<?php echo $url; ?>" method="post"  name="frmProduct">
		<label>First Name*</label>
		<input type="text" id="fname" name="fname" required=""><br>
		<label>Middle Name*</label>
		<input type="text" id="mname" name="mname" required=""><br>
		<label>Last Name*</label>
		<input type="text" id="llname" name="lname" required=""><br>
		<label>Street Address*</label>
		<textarea id="street_address" name="street_address"></textarea><br>
		<label>Unit*</label>
		<input type="text" id="unit" name="unit" required=""><br>
		<label>City*</label>
		<input type="text" id="city" name="city" required=""><br>
		<label>State*</label>
		<select name="state" id="state" required>
			<option value="">State</option>
			<option value="AL">Alabama</option>
			<option value="AK">Alaska</option>
			<option value="AZ">Arizona</option>
			<option value="CA">California</option>
		</select>
		<label>Zipcode*</label>
		<input type="text" id="zipcode" name="zipcode" required=""><br>
		<label>Date Of Birth*</label>
		<input type="text" id="dob" name="dob" required=""><br>
		<label>Phone Number*</label>
		<input type="text" id="phone" name="phone" required=""><br>
		<label>Email*</label>
		<input type="text" id="email" name="email" required=""><br>
		<label>This is a house condo or hod? *</label>
		<input type="radio" id="house" name="house[]" value="house" required >House<br>
		<input type="radio" id="condo" name="house[]" value="condo">Condo<br>
		<input type="radio" id="HO" name="house[]" value="ho5">HO5<br>
		<input type="submit" class="hippo-form_submit" name="hippo-form_submit" value="Submit" />
	</form>
</div>
