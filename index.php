<?php

require_once 'req/class/classes.php';

renderRequired(['header', 'navbar', 'topper']);   
buildBlocks();
renderRequired(['geo', 'sendmail', 'modal', 'footer']);
?>
