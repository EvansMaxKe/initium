<?php
  require "./vendor/autoload.php";

  use PHPMailer\PHPMailer\PHPMailer;
  use PHPMailer\PHPMailer\SMTP;

  $name=$_POST['name'];
  $email=$_POST['email'];
  $subject=$_POST['subject'];
  $message=$_POST['message'];
 
  $mail=new PHPMailer(true);
  $mail->isSMTP();
  $mail->SMTPAuth=true;

  //server info
/* $mail->SMTPDebug = 2; */
  $mail->Host="mail.initium.co.ke"; //server / Host
  $mail->SMTPSecure='tls';
  $mail->Port=587;

  //change your details here

  $mail->Username="management@initium.co.ke";   //your valid gmail address
  $mail->Password="@Kenya254";               //password of your gmail account
 /*  $mail->Password="J5o(3:YiQ4ls4i";  */ 

  $mail->setFrom($email, $name);                  // recipients email and name "from"
  $mail->addAddress("management@initium.co.ke", "Initium"); //receiving email address "to"

  $mail->Subject=$subject;
  $mail->Body=" Name : {$name} \n\n Email : {$email} \n\n Message : {$message}";

  if ($mail->send()) {
    header("location:info.html");
} else {
    echo 'Error:: ' . $mail->ErrorInfo;
}
?>
