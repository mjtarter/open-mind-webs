<?php
 
if(isset($_POST['email'])) {
 
     
 
    // EDIT THE 2 LINES BELOW AS REQUIRED
 
    $email_to = "mjtarter@openmindwebs.com";
 
    $email_subject = "OMW Contact";
 
     
 
     
 
    function died($error) {
 
        // your error code can go here
 
        echo "<section class='main-content p-vert-50 confirmation-body'> We are very sorry, but there were error(s) found with the form you submitted. ";
 
        echo "These errors appear below.<br /><br />";
 
        echo $error."<br /><br />";
 
        echo "Please go back and fix these errors.</section>";
 
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

<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title> Message Sent! </title>
        <meta property="og:description" content="Open Mind Webs - The personal site of front end developer, Matt Tarter. Contact me today to obtain your business goals through the web with a professionally developed website!" />
        <meta property="og:image" content="http://openmindwebs.com/img/work-desk.jpg" />        
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="apple-touch-icon" href="apple-touch-icon.png">
    
        <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="/css/bootstrap.min.css">
        <link rel="stylesheet" href="/css/bootstrap-theme.min.css">
        <link rel="stylesheet" href="/css/slicknav.css" />
        <link rel="stylesheet" href="/css/global.css" />
        <link rel="stylesheet" href="/css/pages.css" />

        <script src="/js/vendor/modernizr-2.8.3-respond-1.4.2.min.js"></script>
    </head>
    <body>
      <!--[if lte IE 8]><script src="/js/ie6/warning.js"></script><script>window.onload=function(){e("js/ie6/")}</script><![endif]-->
        <nav id="main-nav">
          <div class="container">
                <div class="row">
                     <a href="index.html">
                        <div class="col-sm-offset-3 col-md-offset-0 col-md-4 col-lg-4" id="logo">
                           <img src="/img/logo.png" class="img-responsive p-vert-5 inline-block" id="header-img" alt="Open Mind Webs logo">
                            <p class="m-0 p-vert-35 text-center" id="header-slogan">
                                <span style="font-size:1.2em"><strong>OPEN MIND WEBS</strong></span><br><i>Bring Your Ideas To Life</i>
                            </p>
                        </div>
                    </a>
                    <div class="col-md-8 col-lg-8">
                        <ul id="menu">
                            <li><a href="/index.html">Home</a></li>
                            <li><a href="/about.html">About</a></li>
                            <li><a href="services/web-development.html">Services</a></li>
                            <li><a href="/contact.html">Contact</a></li>
                            <li><a href="/portfolio.html">Portfolio</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </nav>

<section class="main-content p-vert-50 confirmation-body">
  <div class="container text-center">
    <p class="h1">Message Sent!</p>
      <p>Thank you for contacting me! I will be in touch shortly!</p>
    </div>
</section>

<footer class="text-center" id="footer">
       <h1>Matt Tarter</h1>
       <p class="text-center"><i>Front End Dev</i></p>
       <div class="container" style="display:table;">
          <div class="col-xs-6 col-sm-4 no-float vert-middle">
             <p class="hidden-xs hidden-sm" id="footer-title"><b>Connect</b></p>
             <ul class="col-sm-3 align-middle no-float">
                <li><a href="https://github.com/mjtarter" target="_blank"><p><i class="fa fa-github-square"></i><span class="hidden-md hidden-lg"><br></span><span class="hide-mobile"> Github</span></p></a></li>
                <li><a href="https://www.linkedin.com/in/mjtarter" target="_blank"><p><i class="fa fa-linkedin-square"></i> <span class="hidden-md hidden-lg"><br></span><span class="hide-mobile">Linked In</span></p></a></li>
                <li><a href="about.html"><p><span class="glyphicon glyphicon-user"></span> <span class="hidden-md hidden-lg"><br></span><span class="hide-mobile">About Me</span></p></a></li>
                <li><a href="portfolio.html"><p><span class="glyphicon glyphicon-briefcase"></span> <span class="hidden-md hidden-lg"><br></span><span class="hide-mobile">Portfolio</span></p></a></li>
             </ul>
          </div>
          <div class="hidden-xs col-sm-4 no-float vert-middle">
            <p>I’m interested in meeting other developers in the Denver area and providing kickass web services to amazing clients that want to grow their businesses. If either of these apply to you, <a href="/contact.html" style="text-decoration:underline;">contact me</a> right away!</p>
          </div>
          <div class="col-xs-6 col-sm-4 no-float vert-middle">
             <p class="hidden-xs hidden-sm" id="footer-title"><b>Get Started</b></p>
             <a href="contact.html" class="button black-button" style="color:white;">Hire Me</a>
             <p class="p-vert-10"><span class="glyphicon glyphicon-arrow-up"></span> Bring your ideas to life</p>
          </div>
       </div>
       <div class="p-vert-5" id="copyright">
          <p class="m-0">Open Mind Webs &nbsp; &nbsp; &nbsp;|&nbsp; &nbsp; &nbsp; Denver, CO &nbsp; &nbsp; &nbsp;|&nbsp; &nbsp; &nbsp; Copyright © 2014 Open Mind Webs. All rights reserved.</p>
       <div>
    </footer>        

        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.11.2.min.js"><\/script>')</script>

        <script src="/js/vendor/bootstrap.min.js"></script>

        <script src="/js/plugins.js"></script>
        <script src="/js/main.js"></script>
        <!-- xxx slicknav mobile responsive navbar xxx -->
        <script src="/js/jquery.slicknav.min.js"></script>
        <script type="text/javascript">
            $(document).ready(function(){
                $('#menu').slicknav();
            });
        </script>
        <!-- xxx Google Analytics xxx -->
        <script>
            (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
            (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
            m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
            })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
            ga('create', 'UA-48303998-1', 'openmindwebs.com');ga('send', 'pageview');
        </script>
    </body>
</html>
