<?php

class ConexaoBanco{

    private static $db = null;
    
    public static function getConexao(){
        if (self::$db ==null) {
            
            $dsn = "mysql:host=localhost;dbname=mecanica;";
            $user = "root";
            $pass = "Murilo1235";
            
            try{
                self::$db = new PDO(
                    $dsn,
                    $user,
                    $pass
                );
                self::$db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            }catch(PDOException $erro){
                die("Erro ao conectar: " . $erro->getMessage());
            }
            return self::$db;
        }
    }
}