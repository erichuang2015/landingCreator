<?php
require 'config/general.php';

$home = 'http://'. $_SERVER['SERVER_NAME'] . '/';
$sentMark = array_key_exists('email', $_SESSION) ? '<a href="#" class="text-success" data-toggle="popover" title="'.$_SESSION['name'].'" data-content="Заявка отправлена,<br>ожидайте звонка по номеру:'.$_SESSION['tel'].'"><i class="text-white fa fa-check-circle" aria-hidden="true"></i> Ждите звонка</a>' : 'Заявка';

?>

<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <div class="container navbar-toggle collapsed" data-toggle="collapse" data-target="#menu" aria-expanded="true" role="button">
                <div class="bar1"></div>
                <div class="bar2"></div>
                <div class="bar3"></div>
            </div>
            <a class="navbar-brand" href="<?= $home; ?>">
                <img src="img/logo/logo-string.svg"><phone><i class="fas fa-phone-square"></i> <?=$entDetails['phone'][0]?></phone>
            </a>
        </div>

        <div class="collapse navbar-collapse" id="menu" data-hover="dropdown" data-animations="fadeInUp">
            <ul class="nav navbar-nav navbar-right">
                <li class="active"><a href="#home">Главная</a></li>
                <li><a href="#services">Услуги</a></li>
                <li><a data-toggle="modal" data-target="#myModal"><?= $sentMark; ?></a></li>
                <li><a href="#prices">Цены</a></li>
                <li><a href="#geo">Контакты</a></li>
            </ul>

        </div>
    </div>
</nav>
<script>
    $(document).ready(function () {
        $('[data-toggle="popover"]').popover({
            title: "",
            content: "Blabla <br> <h2>Cool stuff!</h2>",
            html: true,
            trigger: "hover",
            placement: "bottom"});
    });
</script>