<?php


$bankruptcyData = [
    'ancor' => 'services',
    'h2'    => 'Юридическое сопровождение организаций',
    'h3'    => 'В каких случаях вам к нам?',
    'bg'    => 'img/bg/4076_1.jpg',
    [   
        'tag' => 'first',
        'img' => 'img/icons/bankruptcy/1-25.png',
        'heading' => 'Регистрация предприятий',
        'desc' => 'Зарегистрируем для вас предприятие. Корректное оформление документов.'
    ],
    [
        'tag' => 'second',
        'img' => 'img/icons/bankruptcy/1-26.png',
        'heading' => 'Ликвидация предприятий',
        'desc' => 'Ликвидируем предприятие в кратчайшие сроки. Законно.'
    ],
    [
        'tag' => 'third',
        'img' => 'img/icons/bankruptcy/1-27.png',
        'heading' => 'Банкротство юридических лиц',
        'desc' => 'Подготовка и ведение процедуры банкротства юридического лица.'
    ]
];


$bankruptcyBlock = new SectionBS($bankruptcyData);
$bankruptcyBlock->makeSection();

?>
