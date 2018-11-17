
<?php
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

$mail = new PHPMailer(true);                              // Passing `true` enables exceptions
try {
    //Server settings
    $mail->SMTPDebug = 0;                                 // Enable verbose debug output
    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = 'smtps.aruba.it';  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = 'support@accademiakandi.it';                 // SMTP username
    $mail->Password = 'Support2018';                           // SMTP password
    $mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 465;                                    // TCP port to connect to

    //Recipients
    $mail->setFrom('support@accademiakandi.it', 'Supporto ABAK');
    $mail->addAddress($email);     // email a cui inviare la password generata
    $mail->addReplyTo('support@accademiakandi.it', 'Per informazioni');

    $body = '<p>Hai ricevuto questo messaggio perchè hai richiesto di recuperare la password per l\'accesso alla piattaforma dell\'ABAK <br />
  	Questa è la password provvisoria che potrai cambiare al momento del nuovo accesso:
	<br><br>
	<b>'.$uncripted_pass.'</b>
	<br><br>
  	Non rispondere a questa email in quanto è generata automaticamente.
	<br>
  	Grazie dal team ABAK di supporto</p>';

    //echo($body);
    //Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Recupero password area riservata ABAK';
    $mail->Body    = $body;
    $mail->AltBody = strip_tags($body);

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
}
?>
