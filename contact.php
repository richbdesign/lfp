<?php
//If the form is submitted
if(isset($_POST['submit'])) {

	//Check to make sure that the name field is not empty
	if(trim($_POST['name']) == '') {
		$hasError = true;
	} else {
		$name = trim($_POST['name']);
	}
	
	$companyname = trim($_POST['companyname']);
	$address = trim($_POST['address']);
	$city = trim($_POST['city']);
	$state = trim($_POST['state']);
	$zipcode = trim($_POST['zipcode']);
	$phone = trim($_POST['phone']);

	//Check to make sure sure that a valid email address is submitted
	if(trim($_POST['email']) == '')  {
		$hasError = true;
	} else if (!eregi("^[A-Z0-9._%-]+@[A-Z0-9._%-]+\.[A-Z]{2,4}$", trim($_POST['email']))) {
		$hasError = true;
	} else {
		$email = trim($_POST['email']);
	}
	
	$yearsinbusiness = trim($_POST['yearsinbusiness']);

	//Check to make sure comments were entered
	if(trim($_POST['textarea']) == '') {
		$hasError = true;
	} else {
		if(function_exists('stripslashes')) {
			$comments = stripslashes(trim($_POST['textarea']));
		} else {
			$comments = trim($_POST['textarea']);
		}
	}

	//If there is no error, send the email
	if(!isset($hasError)) {
		$emailTo = 'customerservice@leaseitlfp.com'; //Put your own email address here
		$subject = 'Contact Submission From LeaseFinancePartners.com';
		$body = "Name: $name \n\nCompany Name: $companyname \n\nAddress: $address \n\nCity: $city \n\nState: $state \n\nZip Code: $zipcode \n\nPhone: $phone \n\nEmail: $email \n\nYears in Business: $yearsinbusiness \n\nComments:\n $comments";
		//$headers = 'From: '.$name.' <'.$emailTo.'>' . "\r\n" . 'Reply-To: ' . $email;
		$headers = 'From: '.$name.' <'.$emailTo.'>' . "\r\n" . 'Reply-To: ' . $email;

		mail($emailTo, $subject, $body, $headers);
		$emailSent = true;
	}
}
?>

<?php include ('includes/header.php'); ?>
	<h1>Contact Us</h1>
	<div class="column1 advantagescolumn1">
	<p>If you have questions about any of our services, please fill out the contact form below and one of our lease experts will assist you very soon.</p>
	
	<?php if(isset($hasError)) { //If errors are found ?>
	<p class="error">check if you've filled all the fields.</p>
	<script type="text/javascript">
	$(function() {
		setTimeout(function(){ $(".error").css('display','none'); },4000)
	});
	</script>
	<?php } ?>
	
	<?php if(isset($emailSent) && $emailSent == true) { //If email is sent ?>
	<p class="success">thanks, your message has been sent!</p>
	<script type="text/javascript">
	$(function() {
		setTimeout(function(){ $(".success").css('display','none'); },4000)
	});
	</script>
	<?php } ?>
	
	<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" id="contact">
		<p><label for="name">Name</label>
		<input type="name" id="name" name="name" autofocus="autofocus" /></p>
		
		<p><label for="companyname">Company Name</label>
		<input type="companyname" id="companyname" name="companyname" /></p>
		
		<p><label for="address">Address</label>
		<input type="address" id="address" name="address" /></p>
		
		<p><label for="city">City</label>
		<input type="city" id="city" name="city" /></p>
		
		<p><label for="state">State</label>
		<select id="state" name="state">
			<option value="" selected="selected">Select State</option> 
			<option value="AL">Alabama</option> 
			<option value="AK">Alaska</option> 
			<option value="AZ">Arizona</option> 
			<option value="AR">Arkansas</option> 
			<option value="CA">California</option> 
			<option value="CO">Colorado</option> 
			<option value="CT">Connecticut</option> 
			<option value="DE">Delaware</option> 
			<option value="DC">District Of Columbia</option> 
			<option value="FL">Florida</option> 
			<option value="GA">Georgia</option> 
			<option value="HI">Hawaii</option> 
			<option value="ID">Idaho</option> 
			<option value="IL">Illinois</option> 
			<option value="IN">Indiana</option> 
			<option value="IA">Iowa</option> 
			<option value="KS">Kansas</option> 
			<option value="KY">Kentucky</option> 
			<option value="LA">Louisiana</option> 
			<option value="ME">Maine</option> 
			<option value="MD">Maryland</option> 
			<option value="MA">Massachusetts</option> 
			<option value="MI">Michigan</option> 
			<option value="MN">Minnesota</option> 
			<option value="MS">Mississippi</option> 
			<option value="MO">Missouri</option> 
			<option value="MT">Montana</option> 
			<option value="NE">Nebraska</option> 
			<option value="NV">Nevada</option> 
			<option value="NH">New Hampshire</option> 
			<option value="NJ">New Jersey</option> 
			<option value="NM">New Mexico</option> 
			<option value="NY">New York</option> 
			<option value="NC">North Carolina</option> 
			<option value="ND">North Dakota</option> 
			<option value="OH">Ohio</option> 
			<option value="OK">Oklahoma</option> 
			<option value="OR">Oregon</option> 
			<option value="PA">Pennsylvania</option> 
			<option value="RI">Rhode Island</option> 
			<option value="SC">South Carolina</option> 
			<option value="SD">South Dakota</option> 
			<option value="TN">Tennessee</option> 
			<option value="TX">Texas</option> 
			<option value="UT">Utah</option> 
			<option value="VT">Vermont</option> 
			<option value="VA">Virginia</option> 
			<option value="WA">Washington</option> 
			<option value="WV">West Virginia</option> 
			<option value="WI">Wisconsin</option> 
			<option value="WY">Wyoming</option>
		</select></p>
		
		<p><label for="zipcode">Zip Code</label>
		<input type="zipcode" id="zipcode" name="zipcode" /></p>
		
		<p><label for="phone">Phone</label>
		<input type="phone" id="phone" name="phone" /></p>
		
		<p><label for="email">Email</label>
		<input type="email" id="email" name="email" /></p>
		
		<p><label for="yearsinbusiness">Years in Business</label>
		<input type="yearsinbusiness" id="yearsinbusiness" name="yearsinbusiness" /></p>
		
		<p><label for="textarea">Questions/Comments</label>
		<textarea id="textarea" name="textarea" rows="5" ></textarea></p>
		
		<p><input name="submit" type="submit" value="Submit Information" id="submitter" /></p>
	</form>
	</div>
	<div class="column2 advantagescolumn2 contactcolumn2">
	<h5>Corporate Offices</h5>
	<p><strong>Lease Finance Partners</strong><br />
4825 E Douglas Ave<br />
Wichita, KS 67218</p>

	<p>316.683.6581 <span>Office</span><br />
316.683.8701 <span>Fax</span><br />
<a href="mailto:customerservice@leaseitlfp.com" title="Email customerservice@leaseitlfp.com">customerservice@leaseitlfp.com</a></p>
	</div>
	<div class="clear"></div>
</section><!-- content -->
<?php include ('includes/intbottom.php'); ?>
<?php include ('includes/footer.php'); ?>