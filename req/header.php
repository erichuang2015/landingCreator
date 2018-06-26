<?php
$header = new Header();
$header::openSession();
        $header->init();
        $header->pagetitle();
        $header->keywords();
        $header->putStyleLinks(); 
        $header->putJQueryLink();
        ?>              

        <link href="https://fonts.googleapis.com/css?family=Roboto:400,500,700,900" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Fira+Sans+Condensed|Open+Sans+Condensed:300|Oswald|Oswald:200|Roboto+Condensed|Roboto:500" rel="stylesheet">
        <meta name="author" content="oleg@kholyk.ru">
    </head>
    <body>
