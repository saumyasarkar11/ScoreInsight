<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

session_start();
include 'db.php'; 

if(isset($_POST['submit'])) {
		$email=$_POST['email'];
	
		$l="1";
		
		
		$query1= "SELECT * FROM users WHERE email='$email' AND designation_id!='$l'";
		$query_run1= mysqli_query($con, $query1);
	$row1= mysqli_fetch_assoc($query_run1);
	$num1=mysqli_num_rows($query_run1);
	
		$query= "SELECT * FROM users WHERE email='$email' AND designation_id!='$l' AND status='Inactive'";
		$query_run= mysqli_query($con, $query);
	$row= mysqli_fetch_assoc($query_run);
	$num=mysqli_num_rows($query_run);

		if ($num==0 AND $num1==0) {
		    $_SESSION['status2'] = 'Email is not registered';
			header('location: forgot.php');
			
		} else if ($num1!=0){
		    
		    $_SESSION['status2'] = 'Your account has been deactivated';
			header('location: forgot.php');
		    
		} else {
		    
	 $_SESSION['status3'] = 'Check Inbox for Password';
     require 'PHPMailer/src/Exception.php';
     require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

// Instantiation and passing `true` enables exceptions
$mail = new PHPMailer(true);

$query1=mysqli_query($con, "SELECT * FROM email");
$row1=mysqli_fetch_assoc($query1);
try {
    //Server settings
    $mail->SMTPDebug = 0;                      // Enable verbose debug output
    $mail->isSMTP();                                            // Send using SMTP
    $mail->Host       = $row1['smtp'];                    // Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = $row1['username'];                     // SMTP username
    $mail->Password   = $row1['password'];                               // SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
    $mail->Port       = $row1['port'];                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

    //Recipients
    $mail->setFrom($row1['username'], $row1['from']);
    $mail->addAddress($email, 'Administrator');     // Add a recipient
   

    // Attachments
   // $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
    //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Login into your Account';
    $mail->Body    = 'Your login password is '.$row['unknown'].'. Please do not reply to this mail.';
    $mail->AltBody = 'Your login password is "'.$row['unknown'].'". Please do not reply to this mail.';

    $mail->send();
    echo 'Message has been sent';
    ?>
    <script>
    window.location.replace("https://slmrs.techworthcs.com/admin");
</script>
    <?php
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    ?>
    <script>
    window.location.replace("https://slmrs.techworthcs.com/user");
</script>
    <?php
    }
    		}
	}


?>

