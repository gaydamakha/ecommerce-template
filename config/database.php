<?php
return [
	'default' => env('DB_CONNECTION'),
	'fetch' => PDO::FETCH_CLASS,
	'migrations' => 'migrations',
	'driver' => 'mysql',
    'connections' => [
		'mysql' => [
		    'host' => env('DB_HOST'),
		    'database' => env('DB_DATABASE'),
		    'username' => env('DB_USERNAME'),
		    'password' => env('DB_PASSWORD'),
		    'charset' => 'utf8',
		    'collation' => 'utf8_unicode_ci',
		    'options'   => array(
                PDO::ATTR_PERSISTENT => true,
            ),
		],
	],
];
?>