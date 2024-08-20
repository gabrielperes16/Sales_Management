// <?php
    $dbHost = 'localhost';
    $dbUsername = 'root';
    $dbPassword = '';
    $dbName = 'banco';

    // Criando a conexão
    $conexao = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

    // Verificando a conexão
    if ($conexao->connect_error) {
        die("Falha na conexão: " . $conexao->connect_error);
    }

    echo "Conexão bem-sucedida!";
?>
