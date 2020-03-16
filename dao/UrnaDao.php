<?php
require_once ('connection/db.php');

class UrnaDao extends DB
{
    private static $instance;

    protected $table = "urna_votos";

    public static function getInstance() {

        if (!self::$instance) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    private function __construct() {
        //
    }

    public function insertVotes($votes){ //inserir votos em uma chapa específica
        try {
            $sql = "UPDATE $this->table SET qtd_votos =  ? WHERE chapa = ?";
            $stmt = DB::prepare($sql);
            $stmt->bindValue(1, $votes['qtd_votes']);
            $stmt->bindValue(2, $votes['chapa']);
            $stmt->execute();
            return $stmt;
        } catch (Exception $ex) {
            $ex->getMessage();
        }
    }

    public function findAllVotes() { // retornar a quantidade de votos de cada chapa
        try {
            $sql = "SELECT * FROM $this->table";
            $stmt = DB::prepare($sql);
            $stmt->execute();
             
            //implementando...
          
        } catch (Exception $ex) {
            $ex->getMessage();
        }
    }
}



