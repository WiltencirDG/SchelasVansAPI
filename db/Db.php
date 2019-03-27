<?php
DEFINE('DB_USER', 'schelasvansapi');
DEFINE('DB_PASS', 'brubinho');
DEFINE('DB_HOST', 'localhost');
DEFINE('DB_NAME', 'schelasvansapi');

Class Db
{
    public $mysql;
    function __construct()
    {
        $this->mysql = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME) or die('Problem to connect to database.');
    }
}