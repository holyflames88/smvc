<?php

class Db {

    private static $instance = null;

    private function __construct() {}

    private function __clone() {}

    public static function getInstance() {
        if (!isset(self::$instance)) {
            $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
            self::$instance = new PDO('mysql:host=localhost;dbname=mymvc;charset=utf8;', 'root', '280388', $pdo_options);
        }
        return self::$instance;
    }
}