<?php 
require 'config/general.php';
?>

<div class="modal fade" id="confirmation" tabindex="-1" role="dialog" aria-labelledby="confirmation">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header text-center">
                <h4 class="modal-title" id="myModalLabel"><?php print_r($_SESSION['name']); ?>, Ваша заявка принята!</h4>
            </div>
            <div class="modal-body text-center">
                <p class="text-center">Ожидайте звонка по номеру <span class="text-success"><?php print_r($_SESSION['tel']); ?></span> в течение дня. Менеджер также отправит подтверждение на адрес <span class="text-success"><?php print_r($_SESSION['email']); ?></span> об успешном получении заявки и принятии ее в работу! Спасибо за Ваше обращение!</p>
                <h5>С уважением, <?= $entDetails['type'] . ' &laquo;' . $entDetails['name'] . '&raquo;' ?></h5><hr>
                <button type="button" class="btn btn-success btn-lg" id="okbtn">Спасибо, жду звонка!</button>
            </div>
        </div>
    </div>
</div>