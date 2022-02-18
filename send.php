<?php

    $uesrName = $_POST['userName'];
    $uesrEmail = $_POST['userEmail'];
    $uesrPhone = $_POST['userPhone'];

    //Load Composer's autoloader
    require 'phpmailer/Exception.php';
    require 'phpmailer/PHPMailer.php';
    require 'phpmailer/SMTP.php';

    //Create an instance; passing `true` enables exceptions
    $mail = new PHPMailer\PHPMailer\PHPMailer();

    try {
        //Server settings
        $mail->SMTPDebug = 0;                      //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp.mail.ru';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'neogg001@mail.ru';                     //SMTP username
        $mail->Password   = 'neogg123';                               //SMTP password
        $mail->SMTPSecure = 'ssl';            //Enable implicit TLS encryption
        $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set   `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

        //Recipients
        $mail->setFrom('neogg01@mail.ru', 'Lvbnhbq');
        $mail->addAddress('neogg01@mail.ru');     //Add a recipient

        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = 'Новая заявка сайта';
        $mail->Body    = "Имя пользователя: ${uername}, его телефон: ${userPhone}. Его почта: ${userEmail}";

        $mail->send();
        header('Location: thanks.html');
    } catch (Exception $e) {
        echo "Письмо не отправлено, есть ошибка. Код ошибки: {$mail->ErrorInfo}";
    }