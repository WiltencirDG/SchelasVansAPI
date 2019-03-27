<?php
DEFINE('DB_USER', 'id9086420_schelasvans');
DEFINE('DB_PASS', 'brubinho');
DEFINE('DB_HOST', 'localhost');
DEFINE('DB_NAME', 'id9086420_schelasvans');

Class Db
{
    public $mysql;
    function __construct()
    {
        $this->mysql = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME) or die('Problem to connect to database.');
    }
}