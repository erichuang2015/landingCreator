
<?php
require 'config/general.php';

if (isset($_SESSION["send"])) {
    $buttonName = 'Ожидайте звонка на ' . $_SESSION['tel'];
    unset($_SESSION["send"]);
} else {
    $buttonName = 'Перезвоните мне!';
}
?>
<form action="" method="post">
    <div class="text-center">

        <input required type="text" name="name" placeholder="Имя Фамилия" value="<?php print_r(isset($_SESSION['name']) ? $_SESSION['name'] : ''); ?>">
        <input required type="email" name="email" placeholder="E-mail" value="<?php print_r(isset($_SESSION['email']) ? $_SESSION['email'] : ''); ?>">
        <input required type="text" name="tel" placeholder="Мобильный телефон" value="<?php print_r(isset($_SESSION['tel']) ? $_SESSION['tel'] : ''); ?>"><br />
        <input required type="checkbox" value="checked" checked><label style="padding-left:10px;font-weight: normal;">Я согласен на обработку персональных данных</label>

        <br />
        <input type="submit" class="btn btn-success btn-lg" name="send" value="<?php print_r(isset($_SESSION['tel']) ? 'Заявка отправлена! ожидайте звонка на номер: ' . $_SESSION['tel'] : $buttonName); ?>">
    </div>
    <!-- End Submit -->
</form>
<?= $entDetails['crmLink'] ?>
