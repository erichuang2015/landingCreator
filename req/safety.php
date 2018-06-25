<?php

$safetyData = [
    'ancor' => 'safety',
    'h2'    => 'Безопасность',
    'h3'    => 'Гарантия безопасности ваших данных',
    'bg'    => 'img/bg/server_2.jpg',
    [   
        'tag' => '',
        'img' => 'img/icons/server/1-25.svg',
        'heading' => 'Надёжность',
        'desc' => 'Крупнейший в России дата-центр. Строгий контроль доступа. Соответствие высоким уровням безопасности.'
    ],
    [
        'tag' => '',
        'img' => 'img/icons/server/1-26.svg',
        'heading' => 'Контроль доступа',
        'desc' => '24х7 Охрана помещений. Система охранного телевидения. Биометрическая идентификация'
    ],
    [
        'tag' => '',
        'img' => 'img/icons/server/1-27.svg',
        'heading' => 'Оборудование',
        'desc' => 'Система кондиционирования. Система сверхраннего обнаружения дыма'
    ],
    [
        'tag' => '',
        'img' => 'img/icons/server/1-28.svg',
        'heading' => 'Электроснабжение',
        'desc' => 'Надежная система электроснабжения. Дизель-роторные источники бесперебойного питания'
    ]
];


$safetyBlock = new SectionBS($safetyData, 4);
$safetyBlock->makeSection();

?>

