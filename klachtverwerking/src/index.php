<!DOCTYPE html>
<html lang="nl">
    <head>
        <meta charset="UTF-8">
        <title>iets leuks</title>
    </head>
    <body>
        <form action="" method="post">
            <label for="naam">Naam:</label><br>
            <input type="text" id="naam" name="naam"><br><br>
            <label for="mail">Email:</label><br>
            <input type="text" id="mail" name="mail"><br><br>
            <label for="klacht">Vul hier uw klacht in:</label><br>
            <input type="text" id="klacht" name="klacht"><br><br>
            <input type="submit" value="Submit">
        </form>
    </body>
</html>
<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require '../vendor/autoload.php';

$body = '
    <p><b>Uw Naam:</b></p><br>
    <p>$_POST[naam]</p><br><br>
    <p><b>Uw klacht:</b></p>
    <p>$_POST[klacht]</p>     
';

$mail = new PHPMailer(true);

$mail->SMTPDebug = 2;
$mail->isSMTP();
$mail->Host       = 'smtp.mailtrap.io';
$mail->SMTPAuth   = true;
$mail->Username   = 'e3082afc4f0bcc';
$mail->Password   = 'dc3e150e2c2bba';
$mail->SMTPSecure = 'tls';
$mail->Port       = 25;

$mail->setFrom($_POST['mail']);
$mail->addAddress('noel.pijpers@hotmail.com');

$mail->isHTML(true);
$mail->Subject = 'Uw klacht is in behandeling';
$mail->Body    = 'de ingevulde gegevens uit het formulier. ';
$mail->AltBody = '';
$mail->send();
?>
