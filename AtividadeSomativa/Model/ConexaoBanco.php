<?php

class ConexaoBanco{

    private static $conexao = null;

    public static function getConexao(){

        if(self::$conexao == null){
            
            // $dsn = "mysql:host=localhost;dbname=Biblioteca;charset=utf8";

            $host = "localhost";
            $dbname = "Biblioteca";
            $senha = "Murilo1235";
            $user = "root";
            try{
                self::$conexao = new PDO(
                    "mysql:host=$host;charset=utf8",
                    $user,
                    $senha
                );

                self::$conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                
                self::$conexao->exec("CREATE DATABASE IF NOT EXISTS $dbname CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci");
                self::$conexao->exec("USE $dbname");

            }catch(PDOException $e){
                die( $e->getMessage());
            }
        }
        return self::$conexao;
    }
}