---
title: Form Sent!
---

<?php

if(isset($_POST['email'])) {



    // EDIT THE 2 LINES BELOW AS REQUIRED

    $email_to = "mjtarter@openmindwebs.com";

    $email_subject = "OMW New Client";





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

        !isset($_POST['email'])) {

        died('We are sorry, but there appears to be a problem with the form you submitted.');

    }

    $first_name = $_POST['first_name']; // required

    $last_name = $_POST['last_name']; // required

    $email_from = $_POST['email']; // required

    $service_1 = $_POST['service_1']; // not required

    $service_2 = $_POST['service_2']; // not required

    $service_3 = $_POST['service_3']; // not required

    $service_4 = $_POST['service_4']; // not required

    $service_5 = $_POST['service_5']; // not required

    $service_6 = $_POST['service_6']; // not required

    $business_category = $_POST['business_category']; // not required

    $budget = $_POST['budget']; // not required

    $phone = $_POST['phone']; // not required

    $comments = $_POST['summary']; // not required



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

    $email_message .= "Email: ".clean_string($email_from)."\n";

    $email_message .= "Phone: ".clean_string($phone)."\n";

    $email_message .= "Budget: ".clean_string($budget)."\n";

    $email_message .= "Business Category: ".clean_string($business_category)."\n";

    $email_message .= "Project Summary: ".clean_string($comments)."\n\n";

    $email_message .= "Web Development: ".clean_string($service_1)."\n";

    $email_message .= "Web Design: ".clean_string($service_2)."\n";

    $email_message .= "DB Management: ".clean_string($service_3)."\n";

    $email_message .= "Copywriting / SEO: ".clean_string($service_4)."\n";

    $email_message .= "E-commerce: ".clean_string($service_5)."\n";

    $email_message .= "Analytics: ".clean_string($service_6)."\n";




// create email headers

$headers = 'From: openmindwebs.com'."\r\n".

'Reply-To: '.$email_from."\r\n" .

'X-Mailer: PHP/' . phpversion();

@mail($email_to, $email_subject, $email_message, $headers);

}?>



<!-- include success html here -->

{% include header.html %}

<section class="main-content p-vert-50 confirmation-body">
  <div class="container text-center">
    <p class="h1">Message Sent!</p>
      <p>Thank you for contacting me! I will be in touch shortly!</p>
    </div>
</section>

{% include footer.html %}