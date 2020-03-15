<?php 

require_once('phpmailer/PHPMailerAutoload.php');
$mail = new PHPMailer;
$mail->CharSet = 'utf-8';

$name = $_POST['user_name']; 
$lastname = $_POST['user_lastname']; 
$adress = $_POST['user_adress'];
$city = $_POST['user_city'];
$phone = $_POST['user_phone']; 
$email = $_POST['user_email']; 
$quantity = $_POST['user_quantity'];
$index = $_POST['user_index'];

//$mail->SMTPDebug = 3;                               // Enable verbose debug output

$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'smtp.mail.ru';  																							// Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'oformy01@mail.ru'; // Ваш логин от почты с которой будут отправляться письма
$mail->Password = '(;[<se3X4d`_gam'; // Ваш пароль от почты с которой будут отправляться письма
$mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 465; // TCP port to connect to / этот порт может отличаться у других провайдеров

$mail->setFrom('oformy01@mail.ru'); // от кого будет уходить письмо?
$mail->addAddress('worldwidewear@mail.ru');     // Кому будет уходить письмо 
//$mail->addAddress('ellen@example.com');               // Name is optional
//$mail->addReplyTo('info@example.com', 'Information');
//$mail->addCC('cc@example.com');
//$mail->addBCC('bcc@example.com');
//$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject = 'Заявка с тестового сайта';
$mail->Body    = '' .$name . ' оставил заявку, его телефон: ' .$phone. '<br>Почта этого пользователя: ' .$email. '<br>Фамилия пользователя: ' .$lastname. '<br>Адрес пользователя: ' .$adress. '<br> Город пользователя: ' .$city. '<br>Количество товаров: ' .$quantity. '<br> Почтовый индекс: ' .$index;
$mail->AltBody = '';

if(!$mail->send()) {
    echo 'Error';
} else {
    header('location: thank-you.html');
}
?>