<?php
require 'config/general.php';
$okMark = array_key_exists('email', $_SESSION) ? '<br /><i class="text-success fa fa-check-circle" aria-hidden="true"></i> <b>'. $_SESSION['name'] .'</b>, Вы уже отправили заявку, <br />ожидайте звонка на номер: '. $_SESSION['tel'].'.': '';
?>

<?php //Contacts block ?>
<section id="geo" class="contact section-padding">
        <div class="container">
            <div class="row">

                <div class="col-md-6">
                    <div>
                    <h2>Координаты</h2>
                    <h3 class="orange">Будем рады видеть Вас у нас в офисе:</h3>
                        <br />
                    <p><b><?=' &laquo;'. $entDetails['name'].'&raquo;'?></b></p>
                    
                    <p> <i class="orange fas fa-map-marker-alt"></i><?=' г.'. $entDetails['city'].', '.$entDetails['address'].'.'?></p>
                        <p> <i class="orange fas fa-phone-square"></i><?=' '. $entDetails['phone'].'.'?></p>
                        <p> <i class="orange far fa-envelope"></i> <a href="mailto:<?=$entDetails['email'].'@'.$entDetails['domain']?>"><?=$entDetails['email'].'@'.$entDetails['domain']?></a></p>
                        
                        <p class="text-success"><?= $okMark; ?></p>
                </div>                
                </div>
                <div class="col-md-6">
                   <script type="text/javascript" charset="utf-8" async src="<?=$entDetails['map']?>"></script>
                </div>
                
            </div>
        </div>
    </section>
