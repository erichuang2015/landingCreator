<?php
// PHPMailer requirements
require('PHPMailer/src/PHPMailer.php');
require('PHPMailer/src/Exception.php');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Current general config
require 'config/general.php';

//Create a new PHPMailer instance

$safeData = filter_input_array(INPUT_POST, [
    "tel" => FILTER_SANITIZE_STRING,
    "name" => FILTER_SANITIZE_STRING,
    "email" => FILTER_SANITIZE_EMAIL
        ]);
$mail = new PHPMailer;
$mail->CharSet = 'UTF-8';

//Set who the message is to be sent from
$mail->setFrom('no-reply@' . $entDetails['domain'], 'Заказ звонка с сайта');

//Set an alternative reply-to address
$mail->addReplyTo('abuse@' . $entDetails['domain'], 'Заказ звонка с сайта');

//Set who the message is to be sent to
$mail->addAddress($entDetails['email'] . '@' . $entDetails['domain'], 'Admin');

//Set the subject line
$mail->Subject = 'Заказ с сайта от ' . $safeData['name'];

//Read an HTML message body from an external file, convert referenced images to embedded,
//convert HTML into a basic plain-text alternative body
//$mail->msgHTML(file_get_contents('req/mail/template.php'), __DIR__);
$mail->msgHTML('Заказ от ' . $safeData['name'] . ' с сайта ' . $entDetails['domain'] . '.'
        . '<h1>Заказ на имя '
        . $safeData['name']
        . '</h1>'
        . '<p>Контактный телефон: <b>'
        . $safeData['tel']
        . '</b><br />'
        . '<p>Контактный e-mail: <b>'
        . $safeData['email']
        . '</b><br />'
        . '<p>');

//Replace the plain text body with one created manually
$mail->AltBody = 'This is a plain-text message body';

if (!array_key_exists('isSent', $_SESSION) || !$_SESSION['isSent']) {

    if (array_key_exists('send', $_POST)) {
        if (!$mail->send()) {
            echo "Mailer Error: " . $mail->ErrorInfo;
        } else {
            $_SESSION["send"] = 'Сообщение отправлено!';
            $_SESSION["tel"] = $safeData['tel'];
            $_SESSION["name"] = $safeData['name'];
            $_SESSION["email"] = $safeData['email'];
            $_SESSION["isSent"] = true;
            require 'confirm_modal.php';
            ?>
            <script>
                $("#confirmation").modal();
                //alert(document.getElementById('confirmation'));
                </script><script>
                $(document).ready(function () {
                    $("#okbtn").click(function () {

                        $(window).attr('location', '<?php echo('http://' . $entDetails['domain'].'/') ?>');
                    });
                });
            </script>

            <?php
            // refresher
            // header("refresh:5;");
        }
    }

    require_once 'form.php';
}
?>

