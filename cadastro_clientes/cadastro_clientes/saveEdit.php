<?php
include_once('config.php');
if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $telefone = $_POST['telefone'];
    $sexo = $_POST['sexo'];
    $quantidade = $_POST['quantidade'];
    $data_registro = $_POST['data_Registro'];
    $sqlUpdate = "UPDATE cliente
                  SET nome='$nome', telefone='$telefone', sexo='$sexo', quantidade='$quantidade', data_registro='$data_registro'
                  WHERE id=$id";
                  
    $result = $conexao->query($sqlUpdate);
    print_r($result);
}
header('Location: sistema.php');
?>
