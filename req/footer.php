<?php require 'config/general.php'; ?>

<div class="scroll-top animated fadeInRight">
    <span><i class="fas fa-chevron-up"></i></span>
</div>

<footer class="section-padding">
    <div class="container">

        <div class="row">
            <div class="copyrights">
                <?= '<p>&copy; ' . date('Y') . '. &laquo;' . $entDetails['name'] . '&raquo;' . '<br /> г.' . $entDetails['city'] . ', ' . $entDetails['address'] . ', тел.: ' . $entDetails['phone'] . '.<br />Все права защищены.</p>'; ?>
            </div>
        </div>
</footer>
</body>
</html>