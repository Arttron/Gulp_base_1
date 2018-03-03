<?php
 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';
require 'PHPMailer/Exception.php';

/*use PHPMailer\PHPMailer.php;
use PHPMailer\Exception.php;
*/

$mail = new PHPMailer;
$mail->CharSet = 'utf-8';
 
$mail->isSMTP();
$mail->Host = 'smtp.zoho.eu';
$mail->SMTPAuth = true;
$mail->Username = 'admin@arttron.pp.ua';    //Логин
$mail->Password = 'ArtApArt12';             //Пароль
$mail->SMTPSecure = 'ssl';
$mail->Port = 465;
 
$mail->setFrom('admin@arttron.pp.ua', 'Arttron.pp.ua');
$mail->isHTML(true);
$mail->addAddress('artdoua@gmail.com', 'User');
$mail->Subject = 'Заявка с сайта';
$mail->Body    = "<p>" . $_POST['contact__mess'] ."</p>" . "<p>" . 'E-mail: ' . $_POST['contact__mail']. "</p>";
$mail->AltBody = "Hi";
 
//Отправка сообщения
if(!$mail->send()) {
	echo false;
	//echo 'Ошибка при отправке. Ошибка: ' . $mail->ErrorInfo;
} else {
    echo true;
}