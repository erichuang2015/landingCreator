<?php //confirmation 
require('req/header.php');
require('req/topper.php');
require 'config/general.php';


?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<?php

// Filter all data
$safePost = filter_input_array(INPUT_POST, [
    "tel" => FILTER_SANITIZE_STRING,
    "name" => FILTER_SANITIZE_STRING,
    "email" => FILTER_SANITIZE_EMAIL
]);

if (isset($_SESSION) && array_key_exists('email', $safePost)) {
    $_SESSION["send"] = 'Сообщение отправлено!';
    $_SESSION["tel"] = $safePost['tel'];
    $_SESSION["name"] = $safePost['name'];
    $_SESSION["email"] = $safePost['email'];

    
?>
<div class="modal fade" id="confirmation" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header text-center">
                <h4 class="modal-title" id="myModalLabel"><?php print_r($_SESSION['name']); ?>, Ваша заявка принята!</h4>
            </div>
            <div class="modal-body text-center">
                <p class="text-center">Ожидайте звонка по номеру <span class="text-success"><?php print_r($_SESSION['tel']); ?></span> в течение дня. Менеджер также отправит подтверждение на адрес <span class="text-success"><?php print_r($_SESSION['email']); ?></span> об успешном получении заявки и принятии ее в работу! Спасибо за Ваше обращение!</p>
                <h5>С уважением, <?=$entDetails['type'] . ' &laquo;'. $entDetails['name'].'&raquo;'?></h5><hr>
                <button type="button" class="btn btn-success btn-lg" id="okbtn">Спасибо, жду звонка!</button>
            </div>
        </div>
    </div>
</div>



<?php } else {
    print_r('failed');
 } ?>

