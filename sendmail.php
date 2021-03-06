<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>SreeGuruvayoorapaPatterns.com</title>
<style>
.body{
  background-image: url("img/intro-carousel/1.jpg"); /* The image used */
 background-position: center; /* Center the image */
 background-repeat: no-repeat; /* Do not repeat the image */
 background-size: cover; /* Resize the background image to cover the entire container */
 margin: 0px;
 padding: 0px;
 height: 100%;
}
.container{
  width: 800px;
  background: #fff;
  border-radius: 5px;
  margin: 50px auto;
  padding: 20px;
}
</style>
</head>

<body class="body">
  <div class="container">
    <?php
    if(isset($_POST['email'])) {

        // EDIT THE 2 LINES BELOW AS REQUIRED
        $email_to = "sgpcbe@outlook.com";
        $email_subject = "Email from sgpcbe";

        function died($error) {
            // your error code can go here
            echo "We are very sorry, but there were error(s) found with the form you submitted. ";
            echo "These errors appear below.<br /><br />";
            echo $error."<br /><br />";
            echo "Please go back and fix these errors.<br /><br />";
            die();
        }


        // validation expected data exists
        if(!isset($_POST['name']) ||
          //  !isset($_POST['last_name']) ||
            !isset($_POST['email']) ||
            !isset($_POST['telephone']) ||
            !isset($_POST['comments'])) {
            died('We are sorry, but there appears to be a problem with the form you submitted.');
        }



        $name = $_POST['name']; // required
       // $last_name = $_POST['last_name']; // required
        $email_from = $_POST['email']; // required
        $telephone = $_POST['telephone']; // not required
        $comments = $_POST['comments']; // required

        $error_message = "";
        $email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';

      if(!preg_match($email_exp,$email_from)) {
        $error_message .= 'The Email Address you entered does not appear to be valid.<br />';
      }

        $string_exp = "/^[A-Za-z .'-]+$/";

      if(!preg_match($string_exp,$name)) {
        $error_message .= 'The First Name you entered does not appear to be valid.<br />';
      }

    //   if(!preg_match($string_exp,$last_name)) {
    //     $error_message .= 'The Last Name you entered does not appear to be valid.<br />';
    //   }

      if(strlen($comments) < 2) {
        $error_message .= 'The Comments you entered do not appear to be valid.<br />';
      }

      if(strlen($error_message) > 0) {
        died($error_message);
      }

        $email_message = "Form details below.\n\n";


        function clean_string($string) {
          $bad = array("content-type","bcc:","to:","cc:","href");
          return str_replace($bad,"",$string);
        }



        $email_message .= "First Name: ".clean_string($name)."\n";
        //$email_message .= "Last Name: ".clean_string($last_name)."\n";
        $email_message .= "Email: ".clean_string($email_from)."\n";
        $email_message .= "Telephone: ".clean_string($telephone)."\n";
        $email_message .= "Comments: ".clean_string($comments)."\n";

    // create email headers
    $headers = 'From: '.$email_from."\r\n".
    'Reply-To: '.$email_from."\r\n" .
    'X-Mailer: PHP/' . phpversion();
    @mail($email_to, $email_subject, $email_message, $headers);
    ?>

    <!-- include your own success html here -->

    Thank you for contacting us. We will be in touch with you very soon.

    <?php

    }
    ?>

  </div>
</body>
<script>
window.setTimeout(function(){

        // Move to a new location or you can do something else
        window.location.href = "http://sreeguruvayoorappapatterns.com";

    }, 3000);
</script>
</html>
