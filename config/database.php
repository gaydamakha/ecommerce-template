<?php
return [
	'default' => env('DB_CONNECTION'),
	'fetch' => PDO::FETCH_CLASS,
	'migrations' => 'migrations',
    'connections' => [
		'mysql' => [
			'driver' => 'mysql',
		    'host' => env('DB_HOST'),
		    'database' => env('DB_DATABASE'),
		    'port' => env('DB_PORT'),
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