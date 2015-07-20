<?php
 
if(isset($_POST['email'])) {
 
     
 
    // EDIT THE 2 LINES BELOW AS REQUIRED
 
    $email_to = "info@droppingdimes.org";
 
    $email_subject = "New Donor Form";
 
     
 
     
 
    function died($error) {
 
        // your error code can go here
 
        echo "We are very sorry, but there were error(s) found with the form you submitted. ";
 
        echo "These errors appear below.<br /><br />";
 
        echo $error."<br /><br />";
 
        echo "Please go back and fix these errors.<br /><br />";
 
        die();
 
    }
 
     
 
    // validation expected data exists
 
    if( !isset($_POST['first_name']) ||
	
        !isset($_POST['last_name']) ||
  
        !isset($_POST['email']) ||
 
        !isset($_POST['comments'])) {
 
        died('We are sorry, but there appears to be a problem with the form you submitted.');         
 
    }
 
    $first_name = $_POST['first_name']; // required  
	
    $last_name = $_POST['last_name']; // required     
  
    $email_from = $_POST['email']; //  required
 
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
  
    $string_exp = "/^[A-Za-z .'-]+$/";
 
  if(!preg_match($string_exp,$last_name)) {
 
    $error_message .= 'The Last Name you entered does not appear to be valid.<br />';
 
  } 
  if(strlen($error_message) > 0) {
 
    died($error_message);
 
  }
 
    $email_message = "Form details below.\n\n";
 
     
 
    function clean_string($string) {
 
      $bad = array("content-type","bcc:","to:","cc:","href");
 
      return str_replace($bad,"",$string);
 
    }

    $email_message .= "First Name: ".clean_string($first_name)."\n";
	
    $email_message .= "Last Name: ".clean_string($last_name)."\n";
 
    $email_message .= "Email: ".clean_string($email_from)."\n";
	
	$email_message .= "Comments: ".clean_string($comments)."\n";
     
 
// create email headers
 
$headers = 'From: '.$email_from."\r\n".
 
'Reply-To: '.$email_from."\r\n" .
 
'X-Mailer: PHP/' . phpversion();
 
@mail($email_to, $email_subject, $email_message, $headers);  
 
?>
 
 
 
<!-- include your own success html here -->
 
 
 
<!DOCTYPE html>
<html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
	<head>
		<meta charset="utf-8">
		<title>Make a Difference | Support Former ABA Players</title>
		<meta name="description" content="Help raise awareness of the struggles faced by many former ABA players. Donate or sponsor to support these players that had a major role in the economic development of the cities they played in."> 
		<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
		<meta property="og:description" content="Help raise public awareness or provide financial and other types of support for former ABA players currently living in economically or medically disadvantaged situations." />
   		<meta property="og:image" content="images/aba-basketball.jpg" /> 
        
        <link rel="icon" type="image/png" href="http://droppingdimes.org/favicon.png">
        <link href='http://fonts.googleapis.com/css?family=Droid+Serif' rel='stylesheet' type='text/css'>
		<link rel="stylesheet" href="css/normalize.css"> 
        <link rel="stylesheet" type="text/css" href="css/global.css" media="only screen" />
        <link rel="stylesheet" type="text/css" href="css/donate.css" media="only screen" />
 		<!--[if lt IE 9]><link rel="stylesheet" type="text/css" href="css/normalize.css" /><![endif]-->  
        <!--[if lt IE 9]><link rel="stylesheet" type="text/css" href="css/ie-global.css" /><![endif]-->
        <!--[if lt IE 9]><link rel="stylesheet" type="text/css" href="css/ie-donate.css" /><![endif]-->
        
		<script src="js/vendor/modernizr-2.6.2.min.js"></script>
		<script type="text/javascript">var switchTo5x=true;</script>
		<script type="text/javascript" src="http://w.sharethis.com/button/buttons.js"></script>
		<script type="text/javascript">stLight.options({publisher: "9aa9f18f-1bd3-4e9d-a7d6-4529777ac776", doNotHash: false, doNotCopy: false, hashAddressBar: false});</script>
        
            <style>
	.donate {width:100%;}
	.donate-background {margin-top:64px;}
	</style>
    
	</head>
	<body>

        <!--[if lt IE 7]>
            <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->

	<div class="header">
    	<div class="header-content-container">
        	<p id="header-name">
            	<img src="images/dropping-dimes-logo.png" alt="aba-basketball" style="height:2.8em;">
            </p>
			<div class="mobile-nav-menu">
				<a href="#" onClick="toggle_mobile_nav('mobile-nav-icon');"><img src="mobile-nav-icon.png" style="width:2em; padding-right:.2em"></a>  
				<div id="mobile-nav-icon">  
            		<ul id="nav">
                    	<li><a href="home.html">Home</a></li> 
                    	<li><a href="mission.html">Mission</a></li> 
                    	<li><a href="board.html">Our Board</a></li>
                    	<li><a href="donate.html">Donate</a></li>
                    	<li><a href="stories.html">ABA Stories</a></li>
					</ul>
				</div>
    		</div>
        
            <ul id="navigation">  
            	<li><a href="stories.html">ABA Stories</a></li>
            	<li><a href="donate.html">Donate</a></li>
            	<li><a href="board.html">Our Board</a></li>
                <li><a href="mission.html">Mission</a></li> 
            	<li><a href="home.html">Home</a></li>
        	</ul> 
        </div>
    </div> 
    <div class="donate-background">
    	<div class="donate-title" style="margin-top:30px;"><p style="margin:0; display:table-cell; vertical-align:middle;"><b>DONATE</b></p></div>
        <div class="donate-wrapper" id="donate-link">
            <div class="donate">
            	<p style="text-align:center; font-size:2em; margin:20px; font-weight:bold;">Make a Contribution</p><hr style="background-color:silver; color:white;">
                <p>Your donations are greatly appreciated and will be used to assist former ABA players facing difficult times.</p>
                <p style="font-size:1.3em; margin-bottom:0em;">Choose your donation amount</p>
                <form action="https://www.paypal.com/cgi-bin/webscr" id="paypal" method="post" target="_top">
                    <input type="hidden" name="cmd" value="_s-xclick">
                    <input type="hidden" name="hosted_button_id" value="VBSMXS7BXK97G">
                    <table style="width:100%; max-width:500px; margin:0 auto;">
                    <tr><td><input type="hidden" name="on0" value="Dropping Dimes Foundation"></td></tr><tr><td>
                       <input type="radio" name="os0" value="Donation: $5.00"> $5.00</td><td>
                       <input type="radio" name="os0" value="Donation: $10.00"> $10.00</td><td>
                       <input type="radio" name="os0" value="Donation: $25.00"> $25.00</td></tr><tr><td>
                       <input type="radio" name="os0" value="Donation: $50.00"> $50.00</td><td>
                       <input type="radio" name="os0" value="Donation: $100.00"> $100.00</td><td>
                       <input type="radio" name="os0" value="Donation: $200.00"> $200.00
                    </td></tr>
                    </table><br>
                    <input type="hidden" name="currency_code" value="USD">
                    <input type="submit" name="submit" value="Donate" class="button button-red" style="margin-top:0;">
                </form>       
               <p><b>OR</b></p>
                <form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
                    <input type="hidden" name="cmd" value="_s-xclick">
                    <input type="hidden" name="hosted_button_id" value="HDDLLRVZQ8AKC">
                    <input type="submit" value="Custom Donation Amount" name="submit" class="button button-red" style="margin-top:0;">
                </form>
                <p><i>Donors of $500 or more will receive an authentic original autographed version of the poem on the previous page, written by:<br> Mel Daniels, HOF 2012.</i></p>
            </div>	
        </div>
    </div>

    <div class="footer-bg">
    	<div class="footer-container">
        	<div class="footer-col1">
        		<img src="images/dropping-dimes-logo.png" id="footer-logo">
                <p style="margin:0; text-align:center;"><a href="mailto:info@droppingdimes.org">info@droppingdimes.org</a></p>
            </div> 
        <div class="footer-col2">
        	<p style="border-top:1px solid black; border-bottom:1px solid black; margin:5px 0 6px 0;"><i>"Advocating for the recognition of former players and the contributions they made to our communities"</i></p>
        </div>
        <div class="footer-col3">
            <ul style="list-style:none; padding:0; margin:0">
                <li><a href="home.html">Home</a></li>  
                <li><a href="mission.html">Mission</a></li>
                <li><a href="board.html">Our Board</a></li>
                <li><a href="donate.html#donate-link">Donate</a></li>
                <li><a href="stories.html">ABA Stories</a></li>
            </ul>         
        </div>     
        <div class="footer-col4">
        	<p style="font-size:1.3em; margin:0 0 .6em 0;">Spread Awareness</p>
            <span class='st_sharethis_large'></span>
            <span class='st_facebook_large'></span>
			<span class='st_twitter_large'></span>
            <span class='st_linkedin_large'></span>
			<span class='st_googleplus_large'></span></div>
        </div>
    	<div class="copyright">
        	<p style="display:table-cell; margin:0; padding:0; vertical-align:middle;">Copyright © 2014 Dropping Dimes Foundation, Inc. All rights reserved. &nbsp; | &nbsp; Web Development provided by <a href="http://www.openmindwebs.com">Open Mind Webs</a></p>
		</div>
    </div>

   	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
	<script>window.jQuery || document.write('<script src="js/vendor/jquery-1.10.2.min.js"><\/script>')</script>
	<script src="js/plugins.js"></script>
	<script src="js/main.js"></script> 
    <script>
	  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
	  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
	  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
	  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
	  ga('create', 'UA-59164029-1', 'auto');
	  ga('send', 'pageview');
	</script>        
    </body>
</html>  
 
 
<?php
 
}
 
?>