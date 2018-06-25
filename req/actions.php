<?php

$actionsData = [
    'ancor' => 'actions',
    'h2'    => 'Акции компании',
    'h3'    => 'Спеши приобрести в июне!',
    'bg'    => '',
    [   
        'tag' => 'first',
        'img' => 'img/icons/actions/1-02.svg',
        'heading' => 'Бесплатная проверка',
        'desc' => 'Перед тем, как начать совместную работу, наши бухгалтеры проведут бесплатный анализ Вашей бухгалтерии. Мы оцениваем правильность ведения бухгалтерского учета, исправляем ошибки и проверяем, все ли отчеты сданы в срок.'
    ],
    [
        'tag' => 'second',
        'img' => 'img/icons/actions/1-03.svg',
        'heading' => 'Бесплатная консультация',
        'desc' => 'Если у Вас есть вопросы по ведению бухгалтерии, например, как выбрать подходящий режим налогообложения или правильно сформировать отчетность, как устранить ошибки в документах и другие вопросы, наши специалисты проконсультируют Вас. Мы даже можем приехать к Вам в офис!'
    ],
    [
        'tag' => 'third',
        'img' => 'img/icons/actions/1-04.svg',
        'heading' => 'Бесплатная постановка учёта',
        'desc' => 'Мы осуществим постановку бухгалтерского и налогового учета компаниям, начинающим свою деятельность. Если Вы только что зарегистрировали юрлицо и не знаете, как формировать документы, сдавать отчетность и платить налоги, то мы решим эти и другие вопросы.'
    ]
];


$servicesBlock = new SectionBS($actionsData);
$servicesBlock->makeSection();

?>
