<?php

function getConfigPath($configName) {
    $subfolder = explode('/', $_SERVER['REQUEST_URI'])[1];
    $config = $_SERVER['DOCUMENT_ROOT'] . '/' . $subfolder . '/config/' . $configName . '.php';
    return $config;
}

class Header {

    function __construct() {
        $this->home = 'http://' . $_SERVER['SERVER_NAME'] . '/';
        $this->subfolder = explode('/', $_SERVER['REQUEST_URI'])[1];
        $this->config = getConfigPath('general');
        $this->techConfig = getConfigPath('tech');
        require $this->config;
        //require $this->techConfig;
        $this->pagetitle = '<title>' . $entDetails['type'] . ' &laquo;' . $entDetails['name'] . '&raquo; | ' . $entDetails['slogan'] . ' ' . $entDetails['city'] . '.</title>';
        $this->keywords = '<meta name="keywords" content="' . $entDetails['keywords'] . '">';
    }

    public static function openSession() {
        return session_start();
    }

    function putStyleLinks() {
        require $this->techConfig;
        print_r($techData['local'] ? '<link rel="stylesheet" href="css/bootstrap.min.css">' : $techData['bsV3']);
        array_map(function ($el) {
            return print_r('<link rel="stylesheet" href="' . $this->home . $this->subfolder . '/css/' . $el . '.css">');
        }, $techData['reqStyles']);
    }

    function putFavicon() {
        print_r('<link rel="icon" href="img/favicons/favicon-32x32.png" sizes="32x32">');
    }

    function putJQueryLink() {
        require $this->techConfig;
        print_r($techData['local'] ? '<script src="js/jquery.min.js"></script>' :
                        '<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>');
    }

    function init() {
        print_r('<!doctype html><html lang="ru"><head><meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">');
    }

    function pageTitle() {
        print_r($this->pagetitle);
    }

    function keyWords() {
        print_r($this->keywords);
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
        $this->config = getConfigPath('general');
        require $this->config;
        $this->title = $title;
        $this->titleEnabled = $titleEnabled;
        $this->displayMark = array_key_exists('email', $_SESSION) ? 'style="display:none;"' : 'style="background: url(img/bg/pattern.jpg) no-repeat center top;"';
        $this->companyName = $entDetails['type'] . ' &laquo;' . $entDetails['name'] . '&raquo;';
        $this->textBlock = $entDetails['confText'];
        $this->linkToPrivacy = '<a href="#" onclick="engageModal();">' . $entDetails['confLink'][1] . '</a>';
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
        require __DIR__ . '/../form.php';
        print_r('</div></div></div></section>');
    }

}

class Prices {

    public function __construct() {
        require getConfigPath('prices');
        $this->prices = array_filter($prices, function ($arr) {
            return array_key_exists('price', $arr);
        });

        $this->blockType = $prices['blockType'][0];
        $this->background = $prices['background'][0];
        $this->heading = $prices['heading'];
        $this->selectors = $prices['selectors'];

        $this->companyType = $prices['companyType'];
        $this->serviceType = $prices['serviceType'];
    }

    function makeCellsBlock() {
        print_r('<section id="prices" class="new-price" style="background: url(' . $this->background . ') no-repeat center center;">'
                . '<div class="container">'
                . '<div class="row">'
                . '<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">'
                . '<div class="title"><h2>' . $this->heading['h2'] . '</h2><h3 class="orange">' . $this->heading['h3'] . '</h3></div></div></div>'
                . '<div class="row row-cards">');

        for ($counter = 0; $counter < count($this->prices); $counter += 1) {
            $this->makePriceItem($this->prices[$counter]);
            if ($counter == 2) {
                print_r('</div><div class="row row-cards">');
            }
        }

        print_r('</div></div></section>');
    }

    function makeAJAXBlock() {
        print_r('<section id="prices" class="new-price" style="background: url(' . $this->background . ') no-repeat center center;">'
                . '<div class="container">'
                . '<div class="row">'
                . '<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">'
               // . '<div class="title"><h2>' . $this->heading['h2'] . '</h2><h3 class="orange">' . $this->heading['h3'] . '</h3></div></div></div>'
                . '<div class="row row-cards">');
        //render block here 
        
        
        
        print_r('<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12" style="padding: 25px;"><h2><i class="fas fa-calculator text-sm"></i> ' . $this->heading['h2'] . '</h2><h3 class="orange">' . $this->heading['h3'] . '</h3>&nbsp;<p>' . $this->heading['descr'] . '</p></div>');
        print_r('<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12" style="padding: 25px;">');
        
        //company selector
        print_r('<h3>'.$this->selectors['companyType']['h3'].'</h3><p>'.$this->selectors['companyType']['description'].'</p><br />');
        print_r('<div class="form-group">'
                //. '<label for="sel1">Select list:</label>'
                . '<select class="form-control" id="'
                . 'ct'
                . '" onchange="getPriceIfCompany(this.value)">');
        array_map(function($key) {
            print_r ('<option value="'.$key.'">'.$this->companyType[$key]['fullname'].'</option>');
        }, array_keys($this->companyType));
        
        print_r('</select></div>&nbsp;&nbsp;');
        
        
        //service selector
        print_r('<h3>'.$this->selectors['serviceType']['h3'].'</h3><p>'.$this->selectors['serviceType']['description'].'</p><br />');
        print_r('<div class="form-group">'
                //. '<label for="sel1">Select list:</label>'
                . '<select class="form-control" id="'
                . 'st'
                . '" onchange="getPriceIfService(this.value)">');
        array_map(function($key) {
            print_r ('<option value="'.$key.'">'.$this->serviceType[$key]['name'].'</option>');
        }, array_keys($this->serviceType));
        
        print_r('</select></div>');
        print_r('</div>');
        
        //result block
        
        print_r('<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12" id="result">test</div>');
        
        //render block here
        print_r('</div></div></section>');
    }

    function makePriceItem($data) {

        $type = $this->companyType[$data['typeOfCompany']];
        $service = $this->serviceType[$data['typeOfService']];

        print_r('<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">'
                . '<div class="priceitem clearfix ' . $type['class'] . '">'
                . '<div class="service_title">'
                . $service['name'] . '<br />для &laquo' . $type['name'] . '&raquo;</div>'
                . '<div class="price_box">'
                . '<div class="cost"><span class="from">от</span> ' . number_format($data['price'], 0, ',', ' ') . ' &#8381;</div>'
                . '<div class="time"><div class="period">' . $service['period'] . '</div></div></div>'
                . '<div class="description">' . $data['descr'] . '</div>'
                . '<div class="buttonblock animated fadeInUp" data-toggle="modal" data-target="#myModal">'
                . '<a class="btn btn-success btn-lg">Заказать</a>'
                . '</div></div></div>');
    }

    function makeSection() {
        $dispatch = [
            'cells' => 'makeCellsBlock',
            'ajax' => 'makeAJAXBlock'
        ];
        if (array_key_exists($this->blockType, $dispatch)) {
            $callableFunc = $dispatch[$this->blockType];
        }
        return $this->$callableFunc();
    }

}

class Slider {

    function __construct($data) {
        $this->data = $data;

        $this->slides = array_filter($this->data, function ($arr) {
            return gettype($arr) === 'array';
        });

        $this->duration = $data['duration'];
        $this->anchor = $data['anchor'];
        $this->button = $data['button'];
    }

    function getDuration() {
        return $this->duration;
    }

    function getAnchor() {
        return $this->anchor;
    }

    function createButton($text, $target = 'myModal', $class = 'buttonblock') {
        $daysleftinMonth = date('t') - date('j');
        //$daysleftinMonth = 15;
        $daysLeft = ($daysleftinMonth == 0) ? 'последний' : $daysleftinMonth;
        $pre = 'осталось';

        if ($daysLeft == 1 || $daysLeft == 0 || $daysLeft == 21 || $daysLeft == 31) {
            $ofDays = 'день';
            $pre = 'остался';
        } elseif ($daysLeft > 1 && $daysLeft < 5 || $daysLeft > 21 && $daysLeft < 25) {
            $ofDays = 'дня';
        } else {
            $ofDays = 'дней';
        }

        return '<div class="'
                . $class
                . '" data-toggle="modal" data-target="#'
                . $target
                . '"><a class="btn btn-warning btn-lg">'
                . $text . ' ('
                . $pre
                . ' ' . $daysLeft . ' ' . $ofDays . ')'
                . '</a></div>';
    }

    function makeSlide($slideData) {
        $month = date('n');
        $monthsNames = [
            'январе',
            'феврале',
            'марте',
            'апреле',
            'мае',
            'июне',
            'июле',
            'августе',
            'сентябре',
            'октябре',
            'ноябре',
            'декабре'];
        $active = $slideData['tag'] == 'active' ? ' active' : '';
        $desc = array_key_exists('desc', $slideData) ? '<p>' . '<b>Только в ' . $monthsNames[$month - 1] . '!</b> ' . $slideData['desc'] . '</p>' : 'Спеши приобрести в ' . $monthsNames[$month - 1] . '!';



        $currentSlide = '<div class="item'
                . $active
                . '">'
                . '<img src="'
                . $slideData['img']
                . '" alt="'
                . $slideData['heading']
                . '" style="width:100%;"><div class="carousel-caption"><h3>'
                . $slideData['heading']
                . '</h3>'
                . $desc
                . $this->createButton($slideData['button_txt'])
                . '</div></div>';

        return $currentSlide;
    }

    function makeSlides() {
        $first = array_reduce($this->slides, function ($acc, $slide) {
            $acc .= $this->makeSlide($slide);
            return $acc;
        }, '<div class="carousel-inner">');
        $rest = '</div>';
        return $first . $rest;
    }

    function makeControls() {
        return '<a class="left carousel-control" href="#'
                . $this->getAnchor()
                . '" data-slide="prev">'
                . '<span class="glyphicon glyphicon-chevron-left"></span>'
                . '<span class="sr-only">Предыдущая</span></a>'
                . '<a class="right carousel-control" href="#'
                . $this->getAnchor()
                . '" data-slide="next">'
                . '<span class="glyphicon glyphicon-chevron-right"></span>'
                . '<span class="sr-only">Следующая</span></a>';
    }

    function makeIndicators() {
        $acc = '<ol class="carousel-indicators">';

        for ($i = 0; $i < count($this->slides); $i += 1) {

            $active = $i == 0 ? ' class="active"' : '';
            $acc .= '<li data-target="#'
                    . $this->getAnchor()
                    . '" data-slide-to="'
                    . $i
                    . '"'
                    . $active
                    . '></li>';
        }

        return $acc . '</ol>';
    }

    function makeSection() {
        $block = '<header id="home" class="img-hero"><div id="'
                . $this->getAnchor()
                . '" class="carousel slide" data-ride="carousel" data-interval="'
                . $this->getDuration()
                . '">'
                . $this->makeIndicators()
                . $this->makeSlides()
                . $this->makeControls()
                . '</div></header>';

        print_r($block);
    }

}

function dispatch($section) {
    $dispatcher = [
        'bs' => 'SectionBS',
        'flex' => 'SectionFive',
        'feedback' => 'FeedbackBlock',
        'price' => 'Prices',
        'slider' => 'Slider'
    ];
    if (array_key_exists($section['type'], $dispatcher)) {
        $class = $dispatcher[$section['type']];
        return new $class($section);
    }
}

function buildBlocks() {
    require getConfigPath('blocks');

    array_map(function ($block) {
        $currentClass = dispatch($block);
        $currentClass->makeSection();
    }, $blocks);
}

function renderRequired($required) {
    array_map(function ($el) {
        return require("req/" . $el . ".php");
    }, $required);
}

?>
