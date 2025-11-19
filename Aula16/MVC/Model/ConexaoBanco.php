<?php

class conexaoBanco{

    private static $conexao = null;

    public static function getConexao(){

        $dbname = "vendaBebidas";
        $host = 'localhost';
        $user = "root";
        $senha = "Murilo1235@";


        if(self::$conexao == null){
        try{
           self::$conexao = new PDO(
            "mysql:host=$host;charset=utf8",
            $user,
            $senha
           ); 
           self::$conexao->setAttribute(
            PDO::ATTR_ERRMODE,
             PDO::ERRMODE_EXCEPTION
            );

            self::$conexao->exec("CREATE DATABASE IF NOT EXISTS $dbname CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci");
            self::$conexao->exec("USE $dbname");

        }catch(PDOException $e){
            die("Erro ao conectar: " . $e->getMessage());
        }

        return self::$conexao;
    }
    }
}