<?php


array_map(function ($el) {
    return require("req/" . $el . ".php");
}, ['class/classes', 'header', 'navbar', 'topper']);




buildBlocks();





array_map(function ($el) {
    return require("req/" . $el . ".php");
}, ['geo', 'modal', 'footer']);


?>
