<?php

require_once 'dbconn.php';
require_once 'text.php';

$first_name = $_POST['first_name'];
$last_name =  $_POST['last_name'];
$email = $_POST['email'];

$user = new Crud();
$user->create();

if($email != null || $email != ''){
    $mail = new MailingList();
    $mail->addToMailingList();
}
?>
