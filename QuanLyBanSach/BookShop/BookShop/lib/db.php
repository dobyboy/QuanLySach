<?php
/**
 * Created by PhpStorm.
 * User: Truong Giang
 * Date: 5/10/2018
 * Time: 10:07 PM
 */

require dirname(__DIR__) . '/vendor/autoload.php';

// Create a connection, once only.
$config = array(
    'driver'    => 'mysql', // Db driver
    'host'      => 'localhost',
    'database'  => 'db_quanlysach',
    'username'  => 'root',
    'password'  => '',
    'charset'   => 'utf8', // Optional
    'collation' => 'utf8_unicode_ci', // Optional
    'prefix'    => '', // Table prefix, optional
    'options'   => array( // PDO constructor options, optional
        PDO::ATTR_TIMEOUT => 5,
        PDO::ATTR_EMULATE_PREPARES => false,
    ),
);

new \Pixie\Connection('mysql', $config, 'DB');