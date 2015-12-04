<?php
		//starts here
	if(isset($_POST['ajax'])){
		session_start();
		if(isset($_POST['submit_request'])){
			
			$fName = htmlspecialchars($_POST['fName']);
			$lName = htmlspecialchars($_POST['lName']);
			$company = htmlspecialchars($_POST['company']);
			$address = htmlspecialchars($_POST['address']);
			$city = htmlspecialchars($_POST['city']);
			$state = htmlspecialchars($_POST['state']);
			$zip_code= htmlspecialchars($_POST['zip_code']);
			$country = htmlspecialchars($_POST['country']);
			$email = htmlspecialchars($_POST['email']);
			$phone = htmlspecialchars($_POST['phone']);
			$fax = htmlspecialchars($_POST['fax']);
			$position = htmlspecialchars($_POST['position']);
			$shift = htmlspecialchars($_POST['shift']);
			$comments = htmlspecialchars($_POST['comments']);
			
			require_once('../PHPMailer/PHPMailerAutoload.php');
			require_once('../PHPMailer/class.phpmailer.php');
			require_once('../PHPMailer/class.smtp.php');
			
			$body=file_get_contents('../email_templates/employment_request.html');
			// Replace the % with the actual information 
			$body = str_replace('%first_name%', $fName, $body); 
			$body = str_replace('%last_name%', $lName, $body); 
			$body = str_replace('%company%', $company, $body);
			$body = str_replace('%address%', $address, $body);
			$body = str_replace('%city%', $city, $body);
			$body = str_replace('%state%', $state, $body);
			$body = str_replace('%zip_code%', $zip_code, $body);
			$body = str_replace('%email%', $email, $body);
			$body = str_replace('%phone%', $phone, $body);
			$body = str_replace('%fax%', $fax, $body);
			$body = str_replace('%position%', $position, $body);
			$body = str_replace('%shift%', $shift, $body);
			$body = str_replace('%comments%', $comments, $body);
			//Create a new PHPMailer instance
			$mail = new PHPMailer();
			//Tell PHPMailer to use SMTP
			$mail->isSMTP();
			//Enable SMTP debugging
			// 0 = off (for production use)
			// 1 = client messages
			// 2 = client and server messages
			//Set the hostname of the mail server
			
			


			
			/*$mail->Host = "smtpinternal.missouri.edu";
			//Set the SMTP port number - likely to be 25, 465 or 587
			$mail->Port = 25;
			//Whether to use SMTP authentication
			$mail->SMTPAuth = false;
			//Set who the message is to be sent from
			$mail->setFrom('musasbrusda@missouri.edu');
			//Set who the message is to be sent to
			$mail->addAddress('musasbrusda@missouri.edu');*/
			
			$mail->Host = "localhost";
			//Set the SMTP port number - likely to be 25, 465 or 587
			$mail->Port = 25;
			//Whether to use SMTP authentication
			$mail->SMTPAuth = false;
			//Set who the message is to be sent from
			$mail->setFrom('test@mizzou.com');
			//Set who the message is to be sent to
			$mail->addAddress('ahnera@missouri.edu');
			//Set the subject line
			$mail->Subject = 'Employment Request';
			//$mail->IsHTML(true); 
			$mail->MsgHTML($body);
			//$mail->addAttachment('images/phpmailer_mini.gif');
				//$mail->Body = "First Name: $fName\n Last Name: $lName" ;
				$mail->AltBody = 'This is a plain-text message body';
			//send the message, check for errors
			if ($mail->send()) {
				echo 'Sent';
			} else {
				echo "Mailer Error: " . $mail->ErrorInfo;
			}
		}
		else {
			//do nothing
		}
	}else {
		//ends here
?>
<div id="apply">
<h3 style="padding: 15px;">Interested in Mizzou? Apply Below!</h3><hr>

<div class="employment">
	<form method="POST" id ="employment" name="employment" action="" onsubmit="return false">
	<input type="hidden" name="content" />
	<div class="form-group">
		<label class="col-sm-2 control-label" for="firstName" class="col-sm-2 control-label">First Name</label>
		<input type="text" class="form-control" id="fName" placeholder="First Name">
	  </div>
	 <div class="form-group">
		<label class="col-sm-2 control-label" for="lastName" >Last Name</label>
		<input type="text" class="form-control" id="lName" placeholder="Last Name">
	  </div>
	<div class="form-group">
		<label class="col-sm-2 control-label" for="address">Address</label>
		<input type="text" class="form-control" id="address" placeholder="Address">
	  </div>  
	<div class="form-group">
		<label class="col-sm-2 control-label" for="city">City</label>
		<input type="text" class="form-control" id="city" placeholder="City">
	  </div> 
	<div class="form-group">
		<label class="col-sm-2 control-label" for="zipcode">Zip Code</label>
		<input type="text" class="form-control" id="zip_code" placeholder="Zip Code">
	</div> 
<div class="form-group">
    <label class="col-sm-2 control-label" for="state">State</label>
	<select id="state" name="state" class="form-control">
		<option value="" selected>State</option>
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
	</select>
  </div> 
	<div class="form-group">
		<label class="col-sm-2 control-label" for="email">E-mail Address</label>
		<input type="text" class="form-control" id="email" placeholder="E-mail Address">
	  </div> 
	<div class="form-group">
		<label class="col-sm-2 control-label" for="phone">Phone Number</label>
		<input type="text" class="form-control" id="phone" placeholder="Phone Number">
	</div> 
	<div class="form-group">
		<label class="col-sm-2 control-label" for="fax">Fax Number</label>
		<input type="text" class="form-control" id="fax" placeholder="Fax Number">
	</div> 
	<div class="form-group">
		<label class="col-sm-2 control-label" for="position">Interested Position</label>
		<input type="text" class="form-control" id="position" name="position" placeholder="Interested position">
	</div>
	<div class="form-group">
    <label class="col-sm-2 control-label" for="shift">Shift</label>
	<select id="shift" name="shift" class="form-control">
		<option value="" selected>Shift</option>
		<option value="First Shift">1 (6:00am-3:00pm)</option>
		<option value="Second Shift">2 (3:00pm-1:00am)</option>
	</select>
  </div> 
	<label class="col-sm-2 control-label" for="message" >Comments</label>
	<textarea class="form-control" id="comments" name="comments" placeholder="Comments" rows="5"></textarea><hr>
	
	<input type="button" value="Submit" class="btn btn-default" name="submit_request" onclick="requiredEmploymentFields();"></button>

</form>
</div>
</div>
<?php } ?>

<div class="modal fade" id="employmentModal" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
		  <div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			<h4 class="modal-title" id="myModalLabel">Thanks!</h4>
		  </div>
		<div class="modal-body">
			Thanks for the application!
		</div>
		<div class="modal-footer">
			<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
		</div>
	  </div>
  </div>
</div>