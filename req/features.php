
<?php

$safetyData = [
    'ancor' => 'features',
    'h2'    => 'Выгодно',
    'h3'    => 'Уменьшение затрат на бухгалтерию',
    'bg'    => '',
    [   
        'tag' => 'one',
        'img' => 'img/icons/features/1-05.svg',
        'heading' => 'Оперативность',
        'desc' => 'Работа ведется напрямую с Главным бухгалтером.'
    ],
    [
        'tag' => 'two',
        'img' => 'img/icons/features/1-06.svg',
        'heading' => 'Уверенность',
        'desc' => 'Гарантии, в соответствие с условиями договора.'
    ],
    [
        'tag' => 'three',
        'img' => 'img/icons/features/1-07.svg',
        'heading' => 'Спокойствие',
        'desc' => 'Наша полная финансовая ответственность перед клиентом.'
    ],
    [
        'tag' => 'four',
        'img' => 'img/icons/features/1-08.svg',
        'heading' => 'Контроль',
        'desc' => 'Возможность контроля работы в режиме on-line.'
    ],
    [
        'tag' => 'five',
        'img' => 'img/icons/features/1-09.svg',
        'heading' => 'Квалификация',
        'desc' => 'Мы непрерывно обучаем и экзаменуем специалистов.'
    ]
];


$safetyBlock = new SectionFive ($safetyData, 'flex-item');
$safetyBlock->makeSection();

?>



