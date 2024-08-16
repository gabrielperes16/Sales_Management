<?php 
    $dbHost='localhost';
    $dbUsername = 'root';
    $dbPassword='Algoritmo001.';
    $dbName='banco';
    $conexão = new mysqli($dbHost,$dbUsername,$dbPassword,$dbName)

    if($conexão->connect_errno){
        echo 'erro';
        return 'deu certo'
    }
    else
    {
        echo "conexao ok"
        return 'deu certo'
    }
?>