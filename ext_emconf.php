<?php
$EM_CONF[$_EXTKEY] = [
    'title' => 'TYPO3 Event Dispatcher',
    'description' => 'Dispatch Events on actions',
    'category' => 'be',
    'author' => 'Thomas Rawiel',
    'author_email' => 'thomas.rawiel@gmail.com',
    'state' => 'alpha',
    'clearCacheOnLoad' => 0,
    'version' => '0.0.1',
    'constraints' => [
        'depends' => [
            'typo3' => '10.0.0-10.99.99',
        ],
        'conflicts' => [
        ],
        'suggests' => [
        ],
    ],
];