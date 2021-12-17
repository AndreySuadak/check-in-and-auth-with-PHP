<?php
// Выводим не вчетные числа
for ($i = 0; $i < 5; $i++) {
    if($i % 2 == 0) {
        continue;
    }
    echo $i;
}

//выводим строку
// тут выведет одинаково
$line = '321123';
echo substr($line, -3);
echo strrev(str_replace('123', '', $line));
echo $line[3] . $line[4] . $line[0];

$data = [
    'Мастера' => [
        [
            'name' => 'Nick',
            'city' => 'Москва',
            'got' => 'Да'
        ],
        [
            'name' => 'Чебурашка',
            'city' => 'Челябинск',
            'got' => 'Нет'
        ],
        [
            'name' => 'Black',
            'city' => 'Казань',
            'got' => 'Нет'
        ]
    ],
    'Товары' => [
        'Бетон' => [
            'Цена' => 100,
            'Мастер' => 'Nick',
        ],
        'Герб' => [
            'Цена' => 150,
            'Мастер' => 'Чебурашка',
        ],
        'Квадрат' => [
            'Цена' => 799,
            'Мастер' => 'Black',
        ]
    ]
];
// С книгами
<?php
$data = [
    'authors' => [
        301 => [
            'id' => 301,
            'name' => 'Александр Сергеевич Пушкин',
            'email' => 'alexander_pushkin@example.com',
            'birthYear' => 1799,
        ],
        10 => [
            'id' => 10,
            'name' => 'Николай Васильевич Гоголь',
            'email' => 'nikolay_gogol@example.com',
            'birthYear' => 1809,
        ],
        17 => [
            'id' => 17,
            'name' => 'Михаил Юрьевич Лермонтов',
            'email' => 'mikhail_lermontov@example.com',
            'birthYear' => 1814,
        ],
    ],
    'books' => [
        [
            'title' => 'Евгений Онегин',
            'publishedAt' => '1823—1832',
            'author' => 301,
        ],
        [
            'title' => 'Полтава',
            'publishedAt' => '1828—1829',
            'author' => 301,
        ],
        [
            'title' => 'Мёртвые души',
            'publishedAt' => '1842',
            'author' => 10,
        ],
        [
            'title' => 'Сказка о рыбаке и рыбке',
            'publishedAt' => '1833',
            'author' => 301,

        ],
    ],
];

$long = 301;
$authors = $data['authors'];
for ($i = 0; $i <= $long; $i++) {
    if($authors[$i]) {
        echo $authors[$i]['name'] . ' - ' . $authors[$i]['email'] . ' - ' . $authors[$i]['birthYear'] . "<br>";
    }
}

echo '=======<br>' ;


$books = $data['books'];
for ($i = 0; $i <= $long; $i++) {
    if($books[$i]) {
        echo $books[$i]['title'] . ' - ' . $authors[$books[$i]['author']]['name'] . ' - ' . $books[$i]['publishedAt'] . "<br>";
    }
}
// Последнее задание
<?php
$long = 45;
function task17($n) {
    $sum = 0;
    for ($i = 0; $i < $n + 1; $i++) {
        if($i != 0) {
            if($i % 3 == 0) {
                echo $i . '<br>';
            }

            if($i % 5 == 0) {
                $sum = $sum + $i;
            }

            if($i % 5 == 0 && $i % 3 == 0) {
                $sum = $sum - 1;
            }
        }
    }
    return $sum;
}

echo task17($long);
