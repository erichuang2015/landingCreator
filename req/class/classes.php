<?php

// Classes
//Header class
class Header {

    function __construct() {
        $this->config = 'config/general.php';
        require $this->config;

        $this->home = 'http://' . $_SERVER['SERVER_NAME'] . '/';
        $this->subfolder = explode('/', $_SERVER['DOCUMENT_URI'])[1];
        $this->init = '<!doctype html><html lang="ru"><head><meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">';
        $this->pagetitle = '<title>' . $entDetails['type'] . ' &laquo;' . $entDetails['name'] . '&raquo; | ' . $entDetails['slogan'] . ' ' . $entDetails['city'] . '.</title>';
        $this->keywords = '<meta name="keywords" content="' . $entDetails['keywords'] . '">';
    }

    public static function openSession() {
        return session_start();
    }

    function putStyleLinks() {
        require 'config/general.php';
        print_r($entDetails['local'] ? '<link rel="stylesheet" href="css/bootstrap.min.css">' : $entDetails['bsV3']);
        array_map(function ($el) {
            return print_r('<link rel="stylesheet" href="' . $this->home . $this->subfolder . '/css/' . $el . '.css">');
        }, $reqStyles);
    }

    function putJQueryLink() {
        require($this->config);
        print_r($entDetails['local'] ? '<script src="js/jquery.min.js"></script>' :
                        '<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>');
    }

}

/* Class for normal BS items in a row
  ========================================
 */

class SectionBS {

    function __construct($data, $numberOfColumns = 3, $minHeight = '') {

        $this->data = $data;

        $this->columns = array_filter($this->data, function ($arr) {
            return gettype($arr) === 'array';
        });

        $this->numberOfColumns = count($this->columns);
        $factor = 12 / $this->numberOfColumns;
        $this->cssClass = 'class="module-item col-lg-' . $factor . ' col-md-' . $factor . ' col-sm-12 col-xs-12"';
        $this->minHeight = $minHeight;
    }

    function getCss() {
        return $this->cssClass;
    }

    function getminHeight() {
        return $this->minHeight;
    }

    function makeHeading() {
        print_r($this->data['h2']);
    }

    function makeRowOfCols() {

        print_r('<div class="row">');
        print_r(array_reduce($this->columns, function ($acc, $data) {
                    $css = $this->getCss();
                    $descriptionBlock = (array_key_exists('desc', $data)) ? '<p>' . $data['desc'] . '</p>' : '';
                    $minHeight = $this->getminHeight();
                    $acc .= '<div ' . $css . '"><div class="module-item-wrapper"><div class="block-image"><img src="' . $data['img'] . '" class="image-in-block" alt="' . $data['heading'] . '"></div><div class="block-content ' . $minHeight . '"><h4 class="orange">' . $data['heading'] . '</h4>' . $descriptionBlock . '</div></div></div>';

                    return $acc;
                }, ''));
        print_r('</div>');
    }

    function makeSection() {
        $bgCover = (array_key_exists('bg', $this->data)) ? ' style="background: url(' . $this->data['bg'] . ') no-repeat center center; background-size: cover;"' : '';
        print_r('<div id="' . $this->data['ancor'] . '" class="horizontal-wrapper"' . $bgCover . '><div class="container module-container"><div class="block-title"><h2>' . $this->data['h2'] . '</h2><h3>' . $this->data['h3'] . '</h3></div>');
        $this->makeRowOfCols();
        print_r('</div></div>');
    }

}

/* Class for five grid items in a row
  ========================================
 */

class SectionFive {

    function __construct($data, $itemCssClass = 'flex-item', $minHeight = '') {
        $this->data = $data;
        $this->itemCssClass = $itemCssClass;
        $this->minHeight = $minHeight;

        $this->columns = array_filter($this->data, function ($arr) {
            return gettype($arr) === 'array';
        });
    }

    function getCss() {
        return ' class="' . $this->itemCssClass . '"';
    }

    function getminHeight() {
        return $this->minHeight;
    }

    function makeHeading() {
        print_r($this->data['h2']);
    }

    function makeRowOfCols() {
        print_r(array_reduce($this->columns, function ($acc, $data) {
                    $css = $this->getCss();
                    $descriptionBlock = (array_key_exists('desc', $data)) ? '<p>' . $data['desc'] . '</p>' : '';
                    $minHeight = $this->getminHeight();
                    $acc .= '<div' . $css . '>'
                            . '<div class="' . $this->itemCssClass . '-block-image"><img src="' . $data['img'] . '" class="' . $this->itemCssClass . '-image-in-block" alt="' . $data['heading'] . '"></div>'
                            . '<div class="' . $this->itemCssClass . '-block-content ' . $minHeight . '"><h4>' . $data['heading'] . '</h4>' . $descriptionBlock . '</div>'
                            . '</div>';

                    return $acc;
                }, ''));
    }

    public function makeSection() {
        print_r('<div id="' . $this->data['ancor'] . '" class="special-horizontal-wrapper" style="background: url(' . $this->data['bg'] . ') no-repeat center center;">'
                . '<div class="container ' . $this->itemCssClass . '-container"><div class="' . $this->itemCssClass . '-block-title"><h2>' . $this->data['h2'] . '</h2><h3>' . $this->data['h3'] . '</h3></div>'
                . '<div class="' . $this->itemCssClass . 's-wrapper">');
        $this->makeRowOfCols();
        print_r('</div></div></div>');
    }

}

class FeedbackBlock {

    function __construct($titleEnabled = false, $title = '') {
        $this->config = 'config/general.php';
        require $this->config;
        $this->title = $title;
        $this->titleEnabled = $titleEnabled;
        $this->displayMark = array_key_exists('email', $_SESSION) ? 'style="display:none;"' : 'style="background: url(img/bg/pattern.jpg) no-repeat center top;"';
        $this->companyName = $entDetails['type'] . ' &laquo;' . $entDetails['name'] . '&raquo;';
        $this->textBlock = $entDetails['confText'];
        $this->linkToPrivacy = '<a href="' . $entDetails['confLink'][0] . '">' . $entDetails['confLink'][1] . '</a>';
    }

    function makeSection() {
        print_r('<section id="contact" class="contact section-padding"'
                . $this->displayMark
                . '><div class="container">'
                . '<div class="row">'
                . '<div id="formdescription" class="col-lg-6 col-md-6 col-sm-12 col-xs-12">');

        if ($this->titleEnabled && isset($this->title)) {
            print_r($this->title);
        }

        print_r('<h3 class="dark"><span class="orange">Заявка:</span> отправьте сейчас &rarr;</h3><br /><h4><b>' . $this->companyName . '</b></h4>');

        print_r('<p>' . $this->textBlock . ' ' . $this->linkToPrivacy . '</p></div>');

        print_r('<div id="formblock" class="col-lg-6 col-md-6 col-sm-12 col-xs-12">');
        require ('__form.php');
        print_r('</div></div></div></section>');
    }

}

class Prices {

    public function __construct() {
        require 'config/prices.php';
        $this->prices = $prices;
    }

    function makePriceItem($data) {
        $type = $data['type'] == 'ooo' ? 'ООО' : 'ИП';
        print_r('<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">'
                . '<div class="priceitem clearfix ' . $data['type'] . '">'
                . '<div class="service_title">'
                . $data['name'] . '<br />для &laquo' . $type . '&raquo;</div>'
                . '<div class="price_box">'
                . '<div class="cost"><span class="from">от</span> ' . number_format($data['price'], 0, ',', ' ') . ' &#8381;</div>'
                . '<div class="time"><div class="period">' . $data['period'] . '</div></div></div>'
                . '<div class="description">' . $data['descr'] . '</div>'
                . '<div class="buttonblock animated fadeInUp" data-toggle="modal" data-target="#myModal">'
                . '<a class="btn btn-success btn-lg">Заказать</a>'
                . '</div></div></div>');
    }

    function makeSection() {
        print_r('<section id="prices" class="new-price">'
                . '<div class="container">'
                . '<div class="row">'
                . '<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">'
                . '<div class="title"><h2>Цены</h2><h3 class="orange">Бухгалтерский учёт и аудит для ООО и ИП</h3></div></div></div>'
                . '<div class="row row-cards">');

        for ($counter = 0; $counter < count($this->prices); $counter += 1) {
            $this->makePriceItem($this->prices[$counter]);
            if ($counter == 2) {
                print_r('</div><div class="row row-cards">');
            }
        }

        print_r('</div></div></section>');
    }

}

function dispatch($section) {
    $dispatcher = [
        'bs' => 'SectionBS',
        'flex' => 'SectionFive',
        'feedback' => 'FeedbackBlock',
        'price' => 'Prices'
    ];
    if (array_key_exists($section['type'], $dispatcher)) {
        $class = $dispatcher[$section['type']];
        return new $class($section);
    }
}

function buildBlocks() {
    require 'config/blocks.php';

    array_map(function ($block) {
        $currentClass = dispatch($block);
        $currentClass->makeSection();
    }, $blocks);
}

?>
