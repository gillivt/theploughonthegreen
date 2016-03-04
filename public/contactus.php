<?php
require_once("../database/initialize.php");
if (isset($_POST['submit'])) {
    // get form data and sanitise inputs
    $email = $database->escape_value($_POST['email']);
    $subject = $database->escape_value($_POST['subject']);
    $comment = $database->escape_value($_POST['comment']);
    $datetime = new DateTime();
    $datetime_tostring = $datetime->format('Y-m-d H:i:s');
    $created = datetime_to_text($datetime_tostring);
    
    $mail = new PHPMailer();

    $mail->IsSMTP();
    $mail->Host = "mail.theploughonthegreen.co.uk";
    $mail->Port = 25;
    $mail->SMTPAuth = true;
    $mail->Username = "web@theploughonthegreen.co.uk";
    $mail->Password = "script.321.ravine";

    $mail->FromName = "Contact Us";
    $mail->AddReplyTo($email);
    $mail->From = "web@theploughonthegreen.co.uk";
    $mail->AddAddress("terry@mrtaxsoftware.com", "Contact Us Page");
    $mail->Subject = $subject;

    $mail->Body = <<<EMAILBODY
            
A new comment has been received in the Contact Us Page.

  At {$created}, {$email} wrote:

{$comment}

EMAILBODY;

    $result = $mail->Send();
    if(!$result) {
        $session->message("Failed to Send Mail ".$result);
        log_action("Failed to send email","by {$email}");
    } else {
        $session->message("Mail Sent Successfully");
        log_action("Contact Us email sent", "by {$email}");
    }
    redirect_to("contactus.php");
}

include_layout_template("header.php");
?>
<!--
File: contactus.php

Copyright © 2016 Terry Gilliver <terry@comp-solutions.org.uk> - Computer Solutions

Created: 26-Jan-2016 16:41:31

Purpose: Contact Us Page


Modification History:

-->
<main>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12 col-md-1">
                <br><br>
                <a href="https://www.facebook.com/The-Plough-Ashby-De-La-Zouch-1409446652610698/"><img data-toggle="tooltip" title="Find us on Facebook" class="img-responsive" src="assets/images/facebook.png" alt="facebook"></a>
            </div>

            <div class="col-sm-12 col-md-3"><h3>Contact Us</h3>
                <p>
                    The Plough On The Green,<br>
                    16 North Street,<br>
                    The Green,<br>
                    ASHBY-DE-LA-ZOUCH,<br>
                    Leicestershire. LE65 1JU.<br>
                </p>
                <p>
                    Tel: 01530 412817
                </p>
            </div>
            <div class="col-sm-12 col-md-8"><h3>Email Us</h3>
                <?php echo output_message($session->message); ?>
                <form data-toggle="validator" role="form" action="contactus.php" method="post">
                    <div class="form-group">
                        <label class="control-label" for="email">Email:</label>
                        <input class="form-control" type="email" name="email" placeholder="enter email" id="email" data-error="Enter valid email" required value="">
                        <div class="help-block with-errors"></div>
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="subject">Subject:</label>
                        <input class="form-control" placeholder="enter subject" required data-error="Subject Required" type="text" name="subject" id="subject" value="">
                        <div class="help-block with-errors"></div>
                    </div>

                    <div class="form-group">
                        <label for="comment" class="control-label">Comment:</label>
                        <textarea class="form-control" placeholder="enter your comments" required data-error="Comments Required" rows="10" name="comment" id="comment" data-error="Enter valid email"></textarea>
                        <div class="help-block with-errors"></div>
                    </div>
                    <div class="form-group">
                        <input class="btn btn-primary" type="submit" name="submit"  value="Send Email">
                    </div>
                </form>
                
            </div>
        </div>
    </div>
</main>
<script src="bootstrap-validator-master/dist/validator.min.js"></script>
<script src="assets/js/contactus.js"></script>
<?php
include_layout_template("footer.php");
?>