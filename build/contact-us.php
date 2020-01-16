<?php
$name = $_POST['name'];
$email = $_POST['email'];
$mobile_no = $_POST['mobile_no'];
$message = $_POST['message'];
$subject = $_POST['subject'];
//echo $mobile_no;exit;
$conn = mysqli_connect("localhost", "grapes6_GSNewMainSi", "Nu-s2R,2o3;1", "grapes6_GSNewMainSite") or die("Connection Error: " . mysqli_error($conn));
mysqli_query($conn, "INSERT INTO contactus (name, email,mobile_no,subject,message) VALUES ('" . $name . "', '" . $email . "','" . $mobile_no . "','" . $subject . "','" . $message . "')");
$insert_id = mysqli_insert_id($conn);

/*define('MAIL_HEAD', '<section style="width:690px; margin: 0 auto; padding: 20px; background: url(http://www.grapes-solutions.com/img/banner3.jpg); background-size: cover; background-position: -291px 0;"><div style="box-sizing:border-box;width:100%;padding:20px; border:5px solid #ccc;"><div style="text-align:center"><img src="http://www.grapes-solutions.com/img/logo-dark.png" /></div><ul style="padding:0;">
<li style="display:inline-block; width:14.28%;border:1px solid #ccc; text-align:center; padding: 8px 0px; box-sizing: border-box;margin-left:0;"><a style="text-decoration:none; font-size:14px; font-family: Lato,sans-serif; color: #fff;" href="http://www.grapes-solutions.com" target="_blank">Home</a></li><li style="display:inline-block; width:14.28%;border:1px solid #ccc; text-align:center; padding: 8px 0px; box-sizing: border-box;margin-left:0;"><a style="text-decoration:none; font-size:14px; font-family: Lato,sans-serif; color: #fff;" href="http://www.grapes-solutions.com/technologies" target="_blank">Technologies</a></li><li style="display:inline-block; width:14.28%;border:1px solid #ccc; text-align:center; padding: 8px 0px; box-sizing: border-box;margin-left:0;"><a style="text-decoration:none; font-size:14px; font-family: Lato,sans-serif; color: #fff;" href="http://www.grapes-solutions.com/services" target="_blank">Services</a></li><li style="display:inline-block; width:14.28%;border:1px solid #ccc; text-align:center; padding: 8px 0px; box-sizing: border-box;margin-left:0;"><a style="text-decoration:none; font-size:14px; font-family: Lato,sans-serif; color: #fff;" href="http://www.grapes-solutions.com/work" target="_blank">Work</a></li><li style="display:inline-block; width:14.28%;border:1px solid #ccc; text-align:center; padding: 8px 0px; box-sizing: border-box;margin-left:0;"><a style="text-decoration:none; font-size:14px; font-family: Lato,sans-serif; color: #fff;" href="http://www.grapes-solutions.com/blog.php" target="_blank">Blog</a></li><li style="display:inline-block; width:14.28%;border:1px solid #ccc; text-align:center; padding: 8px 0px; box-sizing: border-box;margin-left:0;"><a style="text-decoration:none; font-size:14px; font-family: Lato,sans-serif; color: #fff;" href="http://www.grapes-solutions.com/events.php" target="_blank">Events</a></li><li style="display:inline-block; width:14.28%;border:1px solid #ccc; text-align:center; padding: 8px 0px; box-sizing: border-box;margin-left:0;"><a style="text-decoration:none; font-size:14px; font-family: Lato,sans-serif; color: #fff;" href="http://www.grapes-solutions.com/contact" target="_blank">Contacts</a></li>
</ul>');*/
define('MAIL_HEAD', '<section style="width:690px; margin: 0 auto; padding: 20px; background: url(http://www.grapes-solutions.com/img/banner3.jpg); background-size: cover; background-position: -291px 0;"><div style="box-sizing:border-box;width:100%;padding:20px; border:5px solid #ccc;"><div style="text-align:center"><img src="http://www.grapes-solutions.com/img/logo-dark.png" /></div>');
define('MAIL_FOOT', '<p style="font-family: Lato,sans-serif; font-size:12px; color:#fff;"><strong>Do not reply!</strong> Please do not reply to this message. This mailbox is not monitored and you will not receive a response.To contact us.</p><p style="font-family: Lato,sans-serif; font-size:12px; border-bottom:3px solid #ccc; padding-bottom:20px; color:#fff;">"This email, and any attachments, is intended only for use by the addressee(s) named herein and may contain legally privileged and/or confidential information, and shall be treated as such. It is the property of Grapes Solutions If you are not the intended recipient of this e-mail, you are hereby notified that any dissemination, distribution or copying of this e-mail and attachments thereto, and any use of the information contained are strictly prohibited. If you have received this e-mail in error, please notify the sender listed above and permanently delete the original and any copy thereof."</p><p style="font-family: Lato,sans-serif; font-size:12px; text-align:center; color:#717171; margin-bottom:0;">&copy; 2020 Grapes Solutions All Rights Reserved.</p></div></section>');
//$to="jigish@grapes-solutions.com";
$to = "info@grapes-solutions.com";
//$to="shefali.vajaria@grapes-solutions.com";
//echo "<pre>";print_r($_REQUEST);exit;
$from = $_REQUEST['email'];
$mes = $_REQUEST['message'];
$headers = "From: $from";
$infomail = "info@grapes-solutions.com";
$subject = "Request from Contact us";
$message = '<div style="padding:10px;"><p style="text-align:left;"><b>Dear Admin,</b></p><table width="100%" style="text-align:left;"><tbody>	<tr><td><b>Sender Name:</b></td><td>' . $name . '</td></tr><tr><td><b>Contact Number:</b></td><td>' . $mobile_no . '</td></tr><tr><td><b>Sender Email-Id:</b></td><td><a href="mailto:' . $from . '">' . $from . '</a></td></tr><tr><td><b>Message:</b></td><td>' . $mes . '</td></tr></tbody></table><p style="font-size:14px;text-align: left;margin-top: 15px;">This mail is sent via contact form on Grapes Solutions.<br/>  <small style="color:#992594">http://www.grapes-solutions.com</small></p><p style="text-align: left;">Regards,<br/><b>' . $name . '</b><br/></p></div>';
$headers = "From: $infomail";
$headers .= "\nMIME-Version: 1.0\n" . "Content-Type: text/html;\n";
$body = MAIL_HEAD . $message . "\n\n";
//echo $body;exit;
if ($from != null || $from != "") {
    $sendmail = mail($to, $subject, $body, $headers);
}

if ($sendmail == true) {
    $subj = "Thanks for Contacting Us";
    $msg = '<h2 style="font-family: Lato,sans-serif; font-size:18px; color:#fff;">Dear Sir/Madam,</h2>
		<p style="font-family: Lato,sans-serif; font-size:22px; font-weight:700; color:#fff;">Thank you for contacting us.</p>
		<p style="font-family: Lato,sans-serif; color:#fff; margin-bottom:45px;">You are very important to us, all information received will always remain confidential. We will contact you as soon as we review your message.</p>
		<p style="font-family: Lato,sans-serif; color:#fff;">Thanks and Regards,</p>
		<p style="font-family: Lato,sans-serif; font-weight:700; color:#fff;">Grapes Solutions</p>
		<p style="font-family: Lato,sans-serif; font-size:12px; color:#fff !important; margin:20px 0;">INDIA: <a href="tel:+917940370789" value="+917940370789" target="_blank" style="color:#fff;text-decoration:none;">+91-7940370789</a> / <a href="tel:+919033472233" value="+919033472233" target="_blank" style="color:#fff;text-decoration:none;">+91-9033472233</a></p>
		<p style="font-family: Lato,sans-serif; font-size:12px; color:#fff !important; margin:20px 0;">USA: <a href="tel:+12017109721" value="+12017109721" target="_blank" style="color:#fff;text-decoration:none;">+1 201 710 9721</a></p>
		<p style="font-family: Lato,sans-serif; font-size:12px; color:#fff; margin:20px 0;">Email id : <a href="mailto:info@grapes-solutions.com" style="color:#fff;text-decoration:none;">info@grapes-solutions.com</a></p>
		<p style="font-family: Lato,sans-serif; font-size:12px; color:#fff; margin:20px 0;">Web:<a style="color:#fff; text-decoration:none;" href="http://www.grapes-solutions.com"> http://www.grapes-solutions.com</a></p>
		<ul style="padding: 0; list-style: none; display: inline-flex; width: 100%; margin: 0;">
		<li style="font-family: Lato,sans-serif; font-size:12px; color:#fff; margin-top:3px; margin-right:5px;margin-left:0;">Follow on:</li>
		<li style="margin:0 5px;"><a style="text-decoration:none; font-size:14px; color: #fff; padding:0 2px;" href="http://www.facebook.com/pages/Grapes-Solutions/183144078483568"><img src="http://www.grapes-solutions.com/img/facebook.png"/></a></li>
        <li style="margin:0 5px;"><a style="text-decoration:none; font-size:14px; color: #fff; padding:0 2px;" href="https://plus.google.com/117303953184367079646/posts"><img src="http://www.grapes-solutions.com/img/gplus.png"/></a></li>
		<li style="margin:0 5px;"><a style="text-decoration:none; font-size:14px; color: #fff; padding:0 2px;" href="https://twitter.com/grapessolution"><img src="http://www.grapes-solutions.com/img/twitter.png"/></a></li>
		<li style="margin:0 5px;"><a style="text-decoration:none; font-size:14px; color: #fff; padding:0 2px;" href="http://www.linkedin.com/company/grapes-solutions"><img src="http://www.grapes-solutions.com/img/linkdin.png"/></a></li></ul>
		<p style="font-family: Lato,sans-serif; font-size:12px; border-bottom:3px solid #ccc; padding-bottom:20px; color:#fff;">Concentrate on your CORE Business Leave TECHNOLOGY to US</p>';
    $header = "From: $infomail";
    $header .= "\nMIME-Version: 1.0\n" . "Content-Type: text/html;\n";
    $msg = MAIL_HEAD . $msg . MAIL_FOOT . "\n\n";
    $send = mail($from, $subj, $msg, $header);
    if ($send) {
        echo 'success';exit;
    }
} else {
    echo 'Oops! Some error occurred';
}
