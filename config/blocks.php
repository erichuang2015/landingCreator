<?php
// Determine month
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


$blocks = [
    // 01. Акции
//    [
//        'type' => 'bs',
//        'ancor' => 'actions',
//        'h2' => 'Акции компании',
//        'h3' => 'Спеши приобрести в '.$monthsNames[$month-1].'!',
//        'bg' => '',
//        [
//            'tag' => 'first',
//            'img' => 'img/icons/actions/1-02.svg',
//            'heading' => 'Бесплатная проверка',
//            'desc' => 'Перед тем, как начать совместную работу, наши бухгалтеры проведут бесплатный анализ Вашей бухгалтерии. Мы оцениваем правильность ведения бухгалтерского учета, исправляем ошибки и проверяем, все ли отчеты сданы в срок.'
//        ],
//        [
//            'tag' => 'second',
//            'img' => 'img/icons/actions/1-03.svg',
//            'heading' => 'Бесплатная консультация',
//            'desc' => 'Если у Вас есть вопросы по ведению бухгалтерии, например, как выбрать подходящий режим налогообложения или правильно сформировать отчетность, как устранить ошибки в документах и другие вопросы, наши специалисты проконсультируют Вас. Мы даже можем приехать к Вам в офис!'
//        ],
//        [
//            'tag' => 'third',
//            'img' => 'img/icons/actions/1-04.svg',
//            'heading' => 'Бесплатная постановка учёта',
//            'desc' => 'Мы осуществим постановку бухгалтерского и налогового учета компаниям, начинающим свою деятельность. Если Вы только что зарегистрировали юрлицо и не знаете, как формировать документы, сдавать отчетность и платить налоги, то мы решим эти и другие вопросы.'
//        ]
//    ],
    
        // 01[Слайдер]
    [
        'type' => 'slider',
        'anchor' => 'myCarousel',
        'duration' => 500000,
        'button' => true,
        'h2' => 'Акции компании',
        'h3' => 'Спеши приобрести в '.$monthsNames[$month-1].'!',
        'bg' => '',
        [
            'tag' => 'active',
            'button_txt' => 'Заказать проверку',
            'img' => 'img/slider/1.jpg',
            'heading' => 'Бесплатная проверка',
            'desc' => 'Перед тем, как начать совместную работу, наши бухгалтеры проведут бесплатный анализ Вашей бухгалтерии.'
        ],
        [
            'tag' => 'second',
            'button_txt' => 'Заказать консультацию',
            'img' => 'img/slider/2.jpg',
            'heading' => 'Бесплатная консультация',
            'desc' => 'Как выбрать подходящий режим налогообложения или правильно сформировать отчетность, как устранить ошибки в документах и другие вопросы.'
        ],
        [
            'tag' => 'third',
            'button_txt' => 'Заказать постановку учёта',
            'img' => 'img/slider/3.jpg',
            'heading' => 'Бесплатная постановка учёта',
            'desc' => 'Мы осуществим постановку бухгалтерского и налогового учета компаниям, начинающим свою деятельность.'
        ]
    ],
    
    // 02. Услуги компании
    [
        'type' => 'bs',
        'ancor' => 'services',
        'h2' => 'Услуги компании',
        'h3' => 'Какие вопросы мы решаем?',
        'bg' => 'img/bg/pattern_4.jpg',
        [
            'tag' => 'first',
            'img' => 'img/icons/services/1.jpg',
            'heading' => 'Консалтинг',
            'desc' => 'Налоговое консультирование и рекрутинг, аудиторские услуги и решение нестандартных задач.'
        ],
        [
            'tag' => 'second',
            'img' => 'img/icons/services/2.jpg',
            'heading' => 'Аутсорсинг',
            'desc' => 'Бухгалтерское обслуживание и постановка бухучета. Восстановление бухучета, ведение участков бухгалтерии и расчет зарплаты.'
        ],
        [
            'tag' => 'third',
            'img' => 'img/icons/services/3.jpg',
            'heading' => 'Рекрутинг',
            'desc' => 'Подбор грамотных бухгалтеров. Реализуем функцию «Главный бухгалтер». Ведём КДП.'
        ]
    ],
    // 03. Выгодно
    [
        'type' => 'flex',
        'ancor' => 'features',
        'h2' => 'Выгодно',
        'h3' => 'Уменьшение затрат на бухгалтерию',
        'bg' => '',
        [
            'tag' => 'one',
            'img' => 'img/icons/features/1.svg',
            'heading' => 'Оперативность',
            'desc' => 'Работа ведется напрямую с Главным бухгалтером.'
        ],
        [
            'tag' => 'two',
            'img' => 'img/icons/features/2.svg',
            'heading' => 'Уверенность',
            'desc' => 'Гарантии, в соответствие с условиями договора.'
        ],
        [
            'tag' => 'three',
            'img' => 'img/icons/features/3.svg',
            'heading' => 'Спокойствие',
            'desc' => 'Наша полная финансовая ответственность перед клиентом.'
        ],
        [
            'tag' => 'four',
            'img' => 'img/icons/features/4.svg',
            'heading' => 'Контроль',
            'desc' => 'Возможность контроля работы в режиме on-line.'
        ],
        [
            'tag' => 'five',
            'img' => 'img/icons/features/5.svg',
            'heading' => 'Квалификация',
            'desc' => 'Мы непрерывно обучаем и экзаменуем специалистов.'
        ]
    ],
    //04. Форма обратной связи
    [
        'type' => 'feedback',
    ],
    // 05. Начать работать с нами просто
    [
        'type' => 'flex',
        'ancor' => 'stages',
        'h2' => 'Начать работать с нами просто',
        'h3' => 'Всего несколько шагов и Вы будете спокойны за Вашу бухгалтерию.',
        'bg' => '',
        [
            'tag' => 'one',
            'img' => 'img/icons/stages/1.svg',
            'heading' => 'Заявка',
            'desc' => 'Вы оставляете заявку на сайте. Наш специалист связывается с Вами и приглашает на встречу.'
        ],
        [
            'tag' => 'two',
            'img' => 'img/icons/stages/2.svg',
            'heading' => 'Встреча',
            'desc' => 'Мы обсуждаем текущую ситуацию в Вашей компании, виды и объемы операций и предлагаем варианты решения Ваших задач'
        ],
        [
            'tag' => 'three',
            'img' => 'img/icons/stages/3.svg',
            'heading' => 'Договор',
            'desc' => 'Мы подписываем договор и соглашение о конфиденциальности, которые гарантируют сохранность Вашей информации.'
        ],
        [
            'tag' => 'four',
            'img' => 'img/icons/stages/4.svg',
            'heading' => 'Работа',
            'desc' => 'Мы подписываем договор и соглашение о конфиденциальности, которые гарантируют сохранность Вашей информации.'
        ],
        [
            'tag' => 'five',
            'img' => 'img/icons/stages/5.svg',
            'heading' => 'Результат',
            'desc' => 'Мы экономим Ваше время и деньги и гарантируем полный порядок в Вашей бухгалтерии.'
        ]
    ],
    
    //06. Цены
    [
        'type' => 'price',
    ],
    
    //07. Дополнительные сервисы
//    [
//        'type' => 'bs',
//        'ancor' => 'additionalservices',
//        'h2' => 'Юридическое сопровождение организаций',
//        'h3' => 'В каких случаях вам к нам?',
//        'bg' => 'img/bg/4076_1.jpg',
//        [
//            'tag' => 'first',
//            'img' => 'img/icons/bankruptcy/1-25.png',
//            'heading' => 'Регистрация предприятий',
//            'desc' => 'Зарегистрируем для вас предприятие. Корректное оформление документов.'
//        ],
//        [
//            'tag' => 'second',
//            'img' => 'img/icons/bankruptcy/1-26.png',
//            'heading' => 'Ликвидация предприятий',
//            'desc' => 'Ликвидируем предприятие в кратчайшие сроки. Законно.'
//        ],
//        [
//            'tag' => 'third',
//            'img' => 'img/icons/bankruptcy/1-27.png',
//            'heading' => 'Банкротство юридических лиц',
//            'desc' => 'Подготовка и ведение процедуры банкротства юридического лица.'
//        ]
//    ],
    
    
    // 08. Решение    
    [
        'type' => 'bs',
        'ancor' => 'decision',
        'h2' => 'Решение',
        'h3' => 'Наш подход к бухгалтерии',
        'bg' => 'img/bg/hand.jpg',
        [
            'tag' => '',
            'img' => 'img/icons/decision/1.jpg',
            'heading' => 'Документы',
            'desc' => 'Мы разбираемся и приводим в порядок документы. При необходимости, мы восстановим Ваш бухгалтерский учет.'
        ],
        [
            'tag' => '',
            'img' => 'img/icons/decision/2.jpg',
            'heading' => 'Отчёты',
            'desc' => 'Мы отчитываемся перед государством за Вас. Собираем первичную бухгалтерскую документацию, обрабатываем, составляем и сдаем отчеты в налоговую.'
        ],
        [
            'tag' => '',
            'img' => 'img/icons/decision/3.jpg',
            'heading' => 'Налоги',
            'desc' => 'Мы решаем все вопросы с налогами. Проводим аудит Вашей текущей системы налогообложения и законную оптимизацию налоговых обязательств.'
        ],
        [
            'tag' => '',
            'img' => 'img/icons/decision/4.jpg',
            'heading' => 'Кадры',
            'desc' => 'Мы решаем вопрос с персоналом. Устраиваем сотрудников в штат, начисляем им зарплату, учитываем рабочее время, ведем кадровую документацию.'
        ]
    ],
    //09. Форма обратной связи
    [
        'type' => 'feedback',
    ],
    
    [
        'type' => 'bs',
        // 'safety' anchor  has dark cheme for display
        'ancor' => 'server',
        'h2' => 'Безопасность',
        'h3' => 'Гарантия безопасности ваших данных',
        'bg' => 'img/bg/server_4.jpg',
        [
            'tag' => '',
            'img' => 'img/icons/server/1.jpg',
            'heading' => 'Надёжность',
            'desc' => 'Крупнейший в России дата-центр. Строгий контроль доступа. Соответствие высоким уровням безопасности.'
        ],
        [
            'tag' => '',
            'img' => 'img/icons/server/2.jpg',
            'heading' => 'Контроль доступа',
            'desc' => '24х7 Охрана помещений. Система охранного телевидения. Биометрическая идентификация'
        ],
        [
            'tag' => '',
            'img' => 'img/icons/server/3.jpg',
            'heading' => 'Оборудование',
            'desc' => 'Система кондиционирования. Система сверхраннего обнаружения дыма'
        ],
        [
            'tag' => '',
            'img' => 'img/icons/server/4.jpg',
            'heading' => 'Электроснабжение',
            'desc' => 'Надежная система электроснабжения. Дизель-роторные источники бесперебойного питания'
        ]
    ]
    
    
];
