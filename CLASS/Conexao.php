<?php

require_once "./CONFIG/Defines.php";

class Conexao {

    /*
    * Atributo est�tico para inst�ncia do PDO
    */
    private static $pdo;

    /*
    * Escondendo o construtor da classe
    */
    private function __construct() {
        //
    }

    /*
    * M�todo est�tico para retornar uma conex�o v�lida
    * Verifica se j� existe uma inst�ncia da conex�o, caso n�o, configura uma nova conex�o
    */
    public static function getInstance() {
        if (!isset(self::$pdo)) {
            try {
                $opcoes = array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES UTF8', PDO::ATTR_PERSISTENT => TRUE);
                self::$pdo = new PDO("mysql:host=" . HOST . "; dbname=" . DBNAME . "; charset=" . CHARSET . ";", USER, PASSWORD, $opcoes);
                self::$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                print "Erro: " . $e->getMessage();
            }
        }
        return self::$pdo;
    }
}