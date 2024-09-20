<?php
return [
    'db' => [
        'server'   => getenv('DB_SERVER') ?: 'localhost',
        'user'     => getenv('DB_USER') ?: 'root',
        'password' => getenv('DB_PASSWORD') ?: '',
        'database' => getenv('DB_NAME') ?: 'crud_app',
    ],
];
