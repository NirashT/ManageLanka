<?php
//send_mail.php

if (isset($_POST['email_data'])) {
	require 'class/class.phpmailer.php';
	$output = '';
	foreach ($_POST['email_data'] as $row) {
		$mail = new PHPMailer;
		$mail->IsSMTP();
		$mail->Host = 'localhost';
		$mail->Port = '80';
		$mail->SMTPAuth = true;
		$mail->Username = 'lihansam.jayasinghe@gmail.com';
		$mail->Password = 'lgimeth123';
		$mail->SMTPSecure = '';
		$mail->From = 'info@webslesson.com';
		$mail->FromName = 'Webslesson';
		$mail->AddAddress($row["email"], $row["name"]);
		$mail->WordWrap = 50;
		$mail->Subject = 'NEW DISCOUNTS AVAILABLE AT STORE!!!';

		$mail->Body = '
		<p>Check our store now for amazing discounts and prices!!!</p>
		';

		$mail->AltBody = '';

		$result = $mail->Send();

		if ($result["code"] == '400') {
			$output .= html_entity_decode($result['full_error']);
		}

	}
	if ($output == '') {
		echo 'ok';
	} else {
		echo $output;
	}
}

?>