<?php


array_map(function ($el) {
    return require("req/" . $el . ".php");
}, ['class/classes', 'header', 'navbar', 'topper', 'actions', 'services_c1', 'features']);

$priceblock = new Prices();
$priceblock->createBlock();


$feedback = new FeedbackBlock();
$feedback->makeFeedback();

array_map(function ($el) {
    return require("req/" . $el . ".php");
}, ['stages', 'prices_1', 'decision_1']);

$feedback->makeFeedback();

array_map(function ($el) {
    return require("req/" . $el . ".php");
}, ['safety','geo', 'modal', 'footer']);


?>
