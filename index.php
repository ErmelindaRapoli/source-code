
<?php
// grab recaptcha library
require_once "recaptchalib.php";
// your secret key
$secret = "6LfzvgcTAAAAAHDXlaxff2uJYN9CwncO4xku5eli";
// empty response
$response = null;
// check our secret key
$reCaptcha = new ReCaptcha($secret);
// if submitted check response
if ($_POST["g-recaptcha-response"]) {
    $response = $reCaptcha->verifyResponse(
            $_SERVER["REMOTE_ADDR"], $_POST["g-recaptcha-response"]
    );
}
?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>reCAPTCHA google</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <script src='https://www.google.com/recaptcha/api.js'></script>
    </head>
    <body> 
        <?php
        if ($response != null && $response->success) {
            echo "Hi " . $_POST["name"] . " (" . $_POST["email"] . "), thanks for submitting the form!";
        } else {
            ?>
        <div style="width: 304px">
            <form method="post" action="???">
                <input type="email" id="email" name="email" placeholder="Your Email (required)" required style="width: 100%"/>
                <textarea id="message" name="message"placeholder="Message (required)" required style="width: 100%"></textarea>

                <div class="g-recaptcha" data-sitekey="6LfzvgcTAAAAAA7gP1MIb89F4NyKIDReRJE1FQSl"></div>

                <input type="submit" value="Send Message"  style="width: 100%"/>

            </form>
        </div>
        <?php } ?>

        <!--js-->
        <script src='https://www.google.com/recaptcha/api.js'></script>
    </body>
</html>
