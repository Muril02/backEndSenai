<?php

class ConexaoBanco{

    private static $conexao = null;

    public static function getConexao(){

        if(self::$conexao == null){
            
            $dsn = "mysql:host=localhost;dbname=Bibilioteca;charset=utf8";
            $senha = "Murilo1235@";
            $user = "root";
            try{
                self::$conexao = new PDO(
                    $dsn,
                    $user,
                    $senha
                );

                self::$conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            }catch(PDOException $e){
                error_log( $e->getMessage());
                
            }
        }
        return self::$conexao;
    }
}