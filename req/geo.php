<?php
require 'config/general.php';
$okMark = array_key_exists('email', $_SESSION) ? '<br /><i class="text-success fa fa-check-circle" aria-hidden="true"></i> <b>'. $_SESSION['name'] .'</b>, ' .$entDetails['geoHeadline'].' '. $_SESSION['tel'].'.': '';
?>

<?php //Contacts block ?>
<section id="geo" class="contact section-padding">
        <div class="container">
            <div class="row">

                <div class="col-md-6" id="geo">
                    <div>
                    <h2><?=$entDetails['geoHeadline']?></h2>
                    <h3 class="orange"><?=$entDetails['geoSubHeadline']?></h3>
                        <hr>
                    <h4><b><?=$entDetails['type'] . ' &laquo;'. $entDetails['name'].'&raquo;'?></b></h4>

                    <p> <i class="orange fas fa-map-marker-alt"></i><?=' г.'. $entDetails['city'].', '.$entDetails['address'].'.'?></p>

                        <?php 
                        array_map(function($phone) {
                            print_r('<p> <i class="orange fas fa-phone-square"></i> '
                                    . $phone
                                    . '.</p>');
                        }, $entDetails['phone']);
                        ?>                        
                        <p> <i class="orange far fa-envelope"></i> <a href="mailto:<?=$entDetails['email'].'@'.$entDetails['domain']?>"><?=$entDetails['email'].'@'.$entDetails['domain']?></a></p>
                        <p class="text-success"><?= $okMark; ?></p>
                </div>
                </div>
                <div class="col-md-6">  
                   <script type="text/javascript" charset="utf-8" async src="https://api-maps.yandex.ru/services/constructor/1.0/js/?um=constructor%<?=$entDetails['map']?>&amp;width=100%25&amp;height=300&amp;lang=ru_RU&amp;scroll=true"></script>                  
                </div>
            </div>
        </div>
    </section>
