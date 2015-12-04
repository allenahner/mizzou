

<?php
		//starts here
	if(isset($_POST['ajax'])){
		session_start();
		if(isset($_POST['submit_request'])){
			var_dump($_POST);
			$fName = htmlspecialchars($_POST['fName']);
			$lName = htmlspecialchars($_POST['lName']);
			$address = htmlspecialchars($_POST['address']);
			$city = htmlspecialchars($_POST['city']);
			$state = htmlspecialchars($_POST['state']);
			$zip_code= htmlspecialchars($_POST['zip_code']);
			$country = htmlspecialchars($_POST['country']);
			$email = htmlspecialchars($_POST['email']);
			$phone = htmlspecialchars($_POST['phone']);
			
			require_once('../PHPMailer/PHPMailerAutoload.php');
			require_once('../PHPMailer/class.phpmailer.php');
			require_once('../PHPMailer/class.smtp.php');
			
			$body=file_get_contents('../email_templates/request_quote.html');
			// Replace the % with the actual information 
			$body = str_replace('%first_name%', $fName, $body); 
			$body = str_replace('%last_name%', $lName, $body);
			$body = str_replace('%address%', $address, $body);
			$body = str_replace('%city%', $city, $body);
			$body = str_replace('%state%', $state, $body);
			$body = str_replace('%zip_code%', $zip_code, $body);
			$body = str_replace('%country%', $country, $body);
			$body = str_replace('%email%', $email, $body);
			$body = str_replace('%phone%', $phone, $body);

			//Create a new PHPMailer instance
			$mail = new PHPMailer();
			//Tell PHPMailer to use SMTP
			$mail->isSMTP();
			//Enable SMTP debugging
			// 0 = off (for production use)
			// 1 = client messages
			// 2 = client and server messages
			//Set the hostname of the mail server
			$mail->Host = "localhost";
			//Set the SMTP port number - likely to be 25, 465 or 587
			$mail->Port = 25;
			//Whether to use SMTP authentication
			$mail->SMTPAuth = false;
			//Set who the message is to be sent from
			$mail->setFrom('test@mizzou.com');
			//Set who the message is to be sent to
			$mail->addAddress('bdbtzc@mail.missouri.edu');
			
			/*$mail->Host = "smtpinternal.missouri.edu";
			//Set the SMTP port number - likely to be 25, 465 or 587
			$mail->Port = 25;
			//Whether to use SMTP authentication
			$mail->SMTPAuth = false;
			//Set who the message is to be sent from
			$mail->setFrom('musasitstaff@missouri.edu');
			//Set who the message is to be sent to
			$mail->addAddress('musasbrusda@missouri.edu');*/
			//Set the subject line
			$mail->Subject = 'Application';
			//$mail->IsHTML(true); 
			$mail->MsgHTML($body);
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
	}
?>
<div class="modal fade" id="requestModal" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
		  <div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			<h4 class="modal-title" id="myModalLabel">Thanks!</h4>
		  </div>
		<div class="modal-body">
			Thank you for applying!
		</div>
		<div class="modal-footer">
			<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
		</div>
	  </div>
  </div>
</div>