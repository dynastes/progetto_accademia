<?php
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';

// Retrieve the email template required
//$message = file_get_contents('email_aa1819.html');

$mail = new PHPMailer(true);                              // Passing `true` enables exceptions
try {
    //Server settings
    $mail->SMTPDebug = 1;                                 // Enable verbose debug output
    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = 'smtps.aruba.it';  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = 'support@accademiakandi.it';                 // SMTP username
    $mail->Password = 'Support2018';                           // SMTP password
    $mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 465;                                    // TCP port to connect to

    //Recipients
    $mail->setFrom('support@accademiakandi.it', 'Supporto ABAK');
    $mail->addAddress($email);     // Add a recipient
    //$mail->addAddress('ellen@example.com');               // Name is optional
    $mail->addReplyTo('support@accademiakandi.it', 'Per informazioni');
    //$mail->addCC('emmanuel.pugliesi@gmail.com');
    //$mail->addBCC('emmanuel.pugliesi@gmail.com'); 			// Add here all recipient


    //Attachments
    //$mail->addAttachment('ABAK_Borse_di_studio_2018.pdf');         // Add attachments
    //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
    $body = '<p>Stai ricevendo questo messaggio perchè hai richiesto di recuperare la tua password per l\'accesso alla piattaforma dell\'ABAK <br />
  	Questa è la password provvisoria che potrai cambiare al momento del nuovo accesso:
	<br><br>
	<b>'.$uncripted_pass.'</b>
	<br><br>
  	Non rispondere a questa email in quanto è generata automaticamente.
	<br>
  	Grazie dal team di supporto</p>';

    echo($body);
    //Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'prova invio pass generata';
    $mail->Body    = $body;
    $mail->AltBody = strip_tags($body);

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
}
?>
