---
layout: default
---

<?php
 
if(isset($_POST['email'])) {
 
     
 
    // EDIT THE 2 LINES BELOW AS REQUIRED
 
    $email_to = "mjtarter@openmindwebs.com";
 
    $email_subject = "OMW Contact";
 
     
 
     
 
    function died($error) {
 
        // your error code can go here
 
        echo "We are very sorry, but there were error(s) found with the form you submitted. ";
 
        echo "These errors appear below.<br /><br />";
 
        echo $error."<br /><br />";
 
        echo "Please go back and fix these errors.<br /><br />";
 
        die();
 
    }
 
     
 
    // validation expected data exists
 
    if(!isset($_POST['first_name']) ||
 
        !isset($_POST['last_name']) ||
 
        !isset($_POST['email']) ||

        !isset($_POST['phone']) ||

        !isset($_POST['comments'])) {
 
        died('We are sorry, but there appears to be a problem with the form you submitted.');         
 
    }
   
    $first_name = $_POST['first_name']; // required
 
    $last_name = $_POST['last_name']; // required
 
    $email_from = $_POST['email']; // required

    $phone = $_POST['phone']; // required
 
    $comments = $_POST['comments']; // not required

     
 
    $error_message = "";
 
    $email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';
 
  if(!preg_match($email_exp,$email_from)) {
 
    $error_message .= 'The Email Address you entered does not appear to be valid.<br />';
 
  }
 
    $string_exp = "/^[A-Za-z .'-]+$/";
 
  if(!preg_match($string_exp,$first_name)) {
 
    $error_message .= 'The First Name you entered does not appear to be valid.<br />';
 
  }
 
  if(!preg_match($string_exp,$last_name)) {
 
    $error_message .= 'The Last Name you entered does not appear to be valid.<br />';
 
  }
 
 
  if(strlen($error_message) > 0) {
 
    died($error_message);
 
  } 
     
 
    function clean_string($string) {
 
      $bad = array("content-type","bcc:","to:","cc:","href");
 
      return str_replace($bad,"",$string);
 
    }


 
    $email_message .= "Name: ".clean_string($first_name). " " .clean_string($last_name)."\n";
  
    $email_message .= "Phone: ".clean_string($phone)."\n\n";  
 
    $email_message .= "Comments: ".clean_string($comments)."\n\n";  
  
 
     
 
// create email headers
 
$headers = 'From: '.$email_from."\r\n".
 
'Reply-To: '.$email_from."\r\n" .
 
'X-Mailer: PHP/' . phpversion();
 
@mail($email_to, $email_subject, $email_message, $headers);  
 
}?>
 
 
 
<!-- include success html here -->

<section class="main-content p-vert-50 confirmation-body">
  <div class="container text-center">
    <p class="h1">Message Sent!</p>
      <p>Thank you for contacting me! I will be in touch shortly!</p>
    </div>
</section>