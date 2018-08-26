<?php

require '../class/classes.php';
require getConfigPath('prices');


$onlyPrices = array_filter($prices, function ($arr) {
    return array_key_exists('price', $arr);
});


function isInCondition($element) {
    return $element['typeOfCompany'] == $_GET['ct'] && $element['typeOfService'] == $_GET['st'];
}

$filtered = array_filter($onlyPrices, 'isInCondition');


function makePriceItem($data) {
    require getConfigPath('prices');
    $type = $prices['companyType'][$_GET['ct']];
    $service = $prices['serviceType'][$_GET['st']];

    print_r('<div class="priceitem clearfix ' . $type['class'] . '">'
            . '<div class="service_title">'
            . $service['name'] . '<br />для &laquo' . $type['name'] . '&raquo;</div>'
            . '<div class="price_box">'
            . '<div class="cost"><span class="from">от</span> ' . number_format($data['price'], 0, ',', ' ') . ' &#8381;</div>'
            . '<div class="time"><div class="period">' . $service['period'] . '</div></div></div>'
            . '<div class="description">' . $data['descr'] . '</div>'
            . '<div class="buttonblock animated fadeInUp" data-toggle="modal" data-target="#myModal">'
            . '<a class="btn btn-success btn-lg">Заказать</a>'
            . '</div></div>');
}

function renderAnswer($arr) {
    return array_map(function ($el) {
        return makePriceItem($el);
    }, $arr);
}

renderAnswer($filtered);
