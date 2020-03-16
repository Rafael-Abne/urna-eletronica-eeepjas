<?php

class DB {

    private static $instance;
    protected $table;
    private function __construct() {
       // construtor privado para não ser instanciado por outra classe
    }
    
    //configurações do banco de dados, para ser instanciado somente uma vez em todo o escopo do projeto
    public static function getInstance() {

        if (!isset(self::$instance)) {

            try {
                self::$instance = new PDO("mysql:host=localhost;dbname=urna; charset=utf8", "root", "");
                self::$instance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                self::$instance->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
            } catch (PDOException $e) {
                echo $e->getMessage();
            }
        }

        return self::$instance;
    }

    public static function prepare($sql) {
        return self::getInstance()->prepare($sql);
        //
    }

}
