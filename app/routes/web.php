<?php

return [
    '' => [
        'controller' => 'main',
        'action' => 'index',
    ],
    'index' => [
        'controller' => 'main',
        'action' => 'index',
    ],
    'records' => [
        'controller' => 'records',
        'action' => 'show',
    ],
    'records/export' => [
        'controller' => 'records',
        'action' => 'export',
    ],
    'records/delete' => [
        'controller' => 'records',
        'action' => 'clearTable',
    ],

    'records/import' => [
        'controller' => 'records',
        'action' => 'import',
    ],

];
