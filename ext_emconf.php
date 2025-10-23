<?php

$EM_CONF[$_EXTKEY] = [
    'title' => 'TYPO3 Event Dispatcher',
    'description' => 'Dispatch Events on actions',
    'category' => 'be',
    'author' => 'Thomas Rawiel',
    'author_email' => 'thomas.rawiel@gmail.com',
    'state' => 'experimental',
    'version' => '0.0.1',
    'constraints' => [
        'depends' => [
            'typo3' => '13.4.0-13.4.99',
        ],
        'conflicts' => [
        ],
        'suggests' => [
        ],
    ],
];
