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

<script src="js/jquery-3.2.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/bootstrap-dropdownhover.min.js"></script>
<script src="js/script.js"></script>
</body>

</html>