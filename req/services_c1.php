<?php

$servicesdata = [
    'ancor' => 'services',
    'h2'    => 'Услуги компании',
    'h3'    => 'Какие вопросы мы решаем?',
    'bg'    => 'img/bg/pattern_4.jpg',
    [   
        'tag' => 'first',
        'img' => 'img/icons/services/1-15.svg',
        'heading' => 'Консалтинг',
        'desc' => 'Налоговое консультирование и рекрутинг, аудиторские услуги и решение нестандартных задач.'
    ],
    [
        'tag' => 'second',
        'img' => 'img/icons/services/1-16.svg',
        'heading' => 'Аутсорсинг',
        'desc' => 'Бухгалтерское обслуживание и постановка бухучета. Восстановление бухучета, ведение участков бухгалтерии и расчет зарплаты.'
    ],
    [
        'tag' => 'third',
        'img' => 'img/icons/services/1-17.svg',
        'heading' => 'Рекрутинг',
        'desc' => 'Подбор грамотных бухгалтеров. Реализуем функцию «Главный бухгалтер». Ведём КДП.'
    ]
];


$servicesBlock = new SectionBS($servicesdata);
$servicesBlock->makeSection();

?>

