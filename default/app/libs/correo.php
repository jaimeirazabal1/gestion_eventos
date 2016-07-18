<?php 
class Correo{
	public function __construct(){

	}
	public function enviar($to,$title,$body){
		//die("as");
		$headers = "From: Gestion_Eventos \r\n";
		$headers .= "Reply-To: admin@admin.com \r\n";
		$headers .= "MIME-Version: 1.0\r\n";
		$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
		if (mail($to, $title, $body, $headers)) {
			return true;
		}
		return false;
		//require 'PHPMailerAutoload.php';
		Load::lib("PHPMailer-master/PHPMailerAutoload");
		$mail = new PHPMailer;

		//$mail->SMTPDebug = 3;                               // Enable verbose debug output

		$mail->isSMTP();                                      // Set mailer to use SMTP
		$mail->Host = 'mx1.hostinger.es';  // Specify main and backup SMTP servers
		//$mail->SMTPAuth = true;                               // Enable SMTP authentication
		//$mail->Username = 'tayme@tayme.esy.es';                 // SMTP username
		//$mail->Password = '16923509j';                           // SMTP password
		//$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
		$mail->Port = 110;                                    // TCP port to connect to

		$mail->setFrom('admin@admin.com', 'admin@admin.com');
		$mail->addAddress($to, $to);     // Add a recipient
		//$mail->addAddress('ellen@example.com');               // Name is optional
		//$mail->addReplyTo('info@example.com', 'Information');
		//$mail->addCC('cc@example.com');
		//$mail->addBCC('bcc@example.com');

		//$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
		//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
		$mail->isHTML(true);                                  // Set email format to HTML

		$mail->Subject = $title;
		//$mail->Body    = 'This is the HTML message body <b>in bold!</b>';
		$mail->Body    = $body;
		//$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

		if(!$mail->send()) {
			return true;
		    echo 'Message could not be sent.';
		    echo 'Mailer Error: ' . $mail->ErrorInfo;
		} else {
			return false;
		    echo 'Message has been sent';
		}
	}
}


 ?>