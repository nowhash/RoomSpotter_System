<?php  
	if(isset($_POST['sendmail'])) {
		require '../PHPMailer/PHPMailerAutoload.php';
		
		$author = $_POST['author'];
		$email = $_POST['email'];
		$phone = $_POST['phone'];
		$text = $_POST['text'];

		$to = "realshawon23@gmail.com";
		$message=$author."<br/>".$email."<br/>".$phone."<br/>".$text;
	
		$mail = new PHPMailer;
		$mail->isSMTP();

		$mail->SMTPOptions = array(
			'ssl' => array(
				 'verify_peer' => false,
				 'verify_peer_name' => false,
				 'allow_self_signed' => true
			)
	  );

		$mail->Host = 'smtp.gmail.com';
		$mail->SMTPAuth = true;
		$mail->Username = 'shawon.roomspotter@gmail.com'; //admin mail address
		$mail->Password = 'ilovekochi';	//admin mail password
		$mail->SMTPSecure = 'tls';
		$mail->Port = 587;
		$mail->SMTPDebug = 3;
		$mail->SetFrom('admin@romspotter.com', 'RoomSpotter Admin');
		$mail->addAddress($to,$to);
		$mail->isHTML(true);
		$mail->Subject = 'May I Ask Your Favor';
		$mail->Body    = $message;
		if(!$mail->send()) {
		   echo "Message could not be sent.";
		   echo "Mailer Error: " . $mail->ErrorInfo;
		   exit;
		}

		echo "<script language='javascript'>alert('Successfully Sent Your Email');location.href='contact.php';</script>";
	}
?>