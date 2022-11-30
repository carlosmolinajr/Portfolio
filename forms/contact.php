<?php

$receiving_email_address = 'carlosmolinajr@outlook.com';

if( file_exists($php_email_form = '../assets/vendor/php-email-form/php-email-form.php')) {
  include( $php_email_form);
} else {
  die('Unable to load the "PHP Email Form" Library!');
}

$contact = new PHP_Email_Form;
$contact->ajax = true;

$contact->to = $receiving_email_address;
$contact->from_name = $_POST['name'];
$contact->from_email = $_POST['email'];
$contact->subject = $_POST['subject'];

$contact->add_message( $_POST['name'], 'From');
$contact->add_message( $_POST['email'], 'Email');
$contact->add_message($_POST['message'], 'Message', 10);

$contact->cc = array('carlosmolinajr@outlook.com');
$contact->bcc = array('carlosmolinajr@outlook.com');
$contact->honeypot = $_POST['name'];

$contact->recaptcha_secret_key = '6LcFljkjAAAAALtW2VI5rQeL_5J1DquwdoSLW6WO';

$contact->add_attachment('resume',20,array('pdf','doc','docx','rtf'));

if($_POST['privacy'] !='accept') {
  die('Please, accept our terms of service and privacy acy policy');
}

$contact->add_message($_POST['name'],'From');
$contact->add_message($_POST['email'], 'Email');
$contact->add_message($_POST['message'], 'Message', 10);

echo $contact->send();
?>
