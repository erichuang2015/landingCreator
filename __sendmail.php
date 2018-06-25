<?php
require('req/mail/PHPMailer/src/PHPMailer.php');
require('req/mail/PHPMailer/src/Exception.php');
require '__confirmation.php';
require 'config/general.php';


//print_r($mailBody);
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

//require '../vendor/autoload.php';
//Create a new PHPMailer instance
$mail = new PHPMailer;
$mail->CharSet = 'UTF-8';

//Set who the message is to be sent from
$mail->setFrom('no-reply@'.$entDetails['domain'], 'Заказ звонка с сайта');

//Set an alternative reply-to address
$mail->addReplyTo('abuse@'.$entDetails['domain'], 'Заказ звонка с сайта');

//Set who the message is to be sent to
$mail->addAddress($entDetails['email'].'@'.$entDetails['domain'], 'Admin');

//Set the subject line
$mail->Subject = 'Заказ с сайта от '. $_SESSION['name'];

//Read an HTML message body from an external file, convert referenced images to embedded,
//convert HTML into a basic plain-text alternative body
//$mail->msgHTML(file_get_contents('req/mail/template.php'), __DIR__);

$mail->msgHTML('<!DOCTYPE html>
<html>
<head>
<title></title>

<meta http-equiv="Content-Type" content="text/html" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<style type="text/css">
    /* FONTS */
    @media screen {
        @font-face {
          font-family: \'Lato\';
          font-style: normal;
          font-weight: 400;
          src: local(\'Lato Regular\'), local(\'Lato-Regular\'), url(https://fonts.gstatic.com/s/lato/v11/qIIYRU-oROkIk8vfvxw6QvesZW2xOQ-xsNqO47m55DA.woff) format(\'woff\');
        }
        
        @font-face {
          font-family: \'Lato\';
          font-style: normal;
          font-weight: 700;
          src: local(\'Lato Bold\'), local(\'Lato-Bold\'), url(https://fonts.gstatic.com/s/lato/v11/qdgUG4U09HnJwhYI-uK18wLUuEpTyoUstqEm5AMlJo4.woff) format(\'woff\');
        }
        
        @font-face {
          font-family: \'Lato\';
          font-style: italic;
          font-weight: 400;
          src: local(\'Lato Italic\'), local(\'Lato-Italic\'), url(https://fonts.gstatic.com/s/lato/v11/RYyZNoeFgb0l7W3Vu1aSWOvvDin1pK8aKteLpeZ5c0A.woff) format(\'woff\');
        }
        
        @font-face {
          font-family: \'Lato\';
          font-style: italic;
          font-weight: 700;
          src: local(\'Lato Bold Italic\'), local(\'Lato-BoldItalic\'), url(https://fonts.gstatic.com/s/lato/v11/HkF_qI1x_noxlxhrhMQYELO3LdcAZYWl9Si6vvxL-qU.woff) format(\'woff\');
        }
    }
    
    /* CLIENT-SPECIFIC STYLES */
    body, table, td, a { -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; }
    table, td { mso-table-lspace: 0pt; mso-table-rspace: 0pt; }
    img { -ms-interpolation-mode: bicubic; }

    /* RESET STYLES */
    img { border: 0; height: auto; line-height: 100%; outline: none; text-decoration: none; }
    table { border-collapse: collapse !important; }
    body { height: 100% !important; margin: 0 !important; padding: 0 !important; width: 100% !important; }

    /* iOS BLUE LINKS */
    a[x-apple-data-detectors] {
        color: inherit !important;
        text-decoration: none !important;
        font-size: inherit !important;
        font-family: inherit !important;
        font-weight: inherit !important;
        line-height: inherit !important;
    }
    
    /* MOBILE STYLES */
    @media screen and (max-width:600px){
        h1 {
            font-size: 32px !important;
            line-height: 32px !important;
        }
    }

    /* ANDROID CENTER FIX */
    div[style*="margin: 16px 0;"] { margin: 0 !important; }
</style>
</head>
<body style="background-color: #f4f4f4; margin: 0 !important; padding: 0 !important;">

<!-- HIDDEN PREHEADER TEXT -->
<div style="display: none; font-size: 1px; color: #fefefe; line-height: 1px; font-family: \'Lato\', Helvetica, Arial, sans-serif; max-height: 0px; max-width: 0px; opacity: 0; overflow: hidden;">
    Вы получили заявка из формы обратной связи на сайте:
</div>

<table border="0" cellpadding="0" cellspacing="0" width="100%">
    <!-- LOGO -->
    <tr>
        <td bgcolor="#FFA73B" align="center">
            <!--[if (gte mso 9)|(IE)]>
            <table align="center" border="0" cellspacing="0" cellpadding="0" width="600">
            <tr>
            <td align="center" valign="top" width="600">
            <![endif]-->
            <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px;" >
                <tr>
                    <td align="center" valign="top" style="padding: 40px 10px 40px 10px;">
                        <a href="color: #5fb800;" target="_blank">
                            <img editable label="logo" alt="Logo" src="color: #5fb800;/img/logo/logo-string.svg"  height="100px" style="display: block;  max-width: 240px; min-width: 100px; font-family: \'Lato\', Helvetica, Arial, sans-serif; color: #ffffff; font-size: 18px;" border="0">
                        </a>
                    </td>
                </tr>
            </table>
            <!--[if (gte mso 9)|(IE)]>
            </td>
            </tr>
            </table>
            <![endif]-->
        </td>
    </tr>
    <!-- HERO -->
    <tr>
        <td bgcolor="#FFA73B" align="center" style="padding: 0px 10px 0px 10px;">
            <!--[if (gte mso 9)|(IE)]>
            <table align="center" border="0" cellspacing="0" cellpadding="0" width="600">
            <tr>
            <td align="center" valign="top" width="600">
            <![endif]-->
            <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px;" >
                <tr>
                    <td bgcolor="#ffffff" align="center" valign="top" style="padding: 40px 20px 20px 20px; border-radius: 4px 4px 0px 0px; color: #111111; font-family: \'Lato\', Helvetica, Arial, sans-serif; font-size: 48px; font-weight: 400; letter-spacing: 4px; line-height: 48px;">
                      <h1 style="font-size: 48px; font-weight: 400; margin: 0;"><singleline label="main heading">Вам заявка!</singleline></h1>
                    </td>
                </tr>
            </table>
            <!--[if (gte mso 9)|(IE)]>
            </td>
            </tr>
            </table>
            <![endif]-->
        </td>
    </tr>
    <!-- COPY BLOCK -->
    <tr>
        <td bgcolor="#f4f4f4" align="center" style="padding: 0px 10px 0px 10px;">
            <!--[if (gte mso 9)|(IE)]>
            <table align="center" border="0" cellspacing="0" cellpadding="0" width="600">
            <tr>
            <td align="center" valign="top" width="600">
            <![endif]-->
            <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px;" >
              <!-- COPY -->
              <tr>
                <td bgcolor="#ffffff" align="center" style="padding: 20px 30px 40px 30px; color: #666666; font-family: \'Lato\', Helvetica, Arial, sans-serif; font-size: 18px; font-weight: 400; line-height: 25px;" >
                  <multiline label="lead">Вы получили заявка из формы обратной связи на сайте:</multiline>
                </td>
              </tr>

              <!-- COPY -->
              <tr>
                <td bgcolor="#ffffff" align="center" style="padding: 0px 30px 0px 30px; color: #666666; font-family: \'Lato\', Helvetica, Arial, sans-serif; font-size: 18px; font-weight: 400; line-height: 25px;" >
                  <multiline label="copy block 2">Имя: <b>'.$_SESSION['name'].'</b></multiline>
                </td>
              </tr>
              <!-- COPY -->
                <tr>
                  <td bgcolor="#ffffff" align="center" style="padding: 20px 30px 20px 30px; color: #666666; font-family: \'Lato\', Helvetica, Arial, sans-serif; font-size: 18px; font-weight: 400; line-height: 25px;" >
                    <multiline label="cta link"><a tel="'.$_SESSION['tel'].'" target="_blank" style="color: #FFA73B;">'.$_SESSION['tel'].'</a></multiline>
                  </td>
                </tr>
              <!-- COPY -->
              <tr>
                <td bgcolor="#ffffff" align="center" style="padding: 0px 30px 0px 30px; color: #666666; font-family: \'Lato\', Helvetica, Arial, sans-serif; font-size: 18px; font-weight: 400; line-height: 25px;" >
                  <multiline label="copy block 2">E-Mail: <b>'.$_SESSION['email'].'</b></multiline>
                </td>
              </tr>
              <tr>
                <td bgcolor="#ffffff" align="center" style="padding: 0px 30px 0px 30px; color: #666666; font-family: \'Lato\', Helvetica, Arial, sans-serif; font-size: 18px; font-weight: 400; line-height: 25px;" >
                  <multiline label="copy block 2">---</multiline>
                </td>
              </tr>
              
            </table>
            <!--[if (gte mso 9)|(IE)]>
            </td>
            </tr>
            </table>
            <![endif]-->
        </td>
    </tr>
    
    
</table>
    
</body>
</html>');


//Replace the plain text body with one created manually
$mail->AltBody = 'This is a plain-text message body';


//Attach an image file
//  $mail->addAttachment('images/phpmailer_mini.png');


//send the message, check for errors
if (!$mail->send()) {
    echo "Mailer Error: " . $mail->ErrorInfo;
} else {
    ?>
    <script> $("#confirmation").modal();</script>
    <script>
        $(document).ready(function () {
            $("#okbtn").click(function () {

                $(window).attr('location', '<?php echo($home . '') ?>');
            });
        });
    </script>

    <?php
    //echo "Message sent!";
}
?>