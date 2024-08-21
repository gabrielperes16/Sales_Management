<?php
$hostname = 'localhost';
$usuario= 'root';
$senha= '';
$bancodedados = 'clientes';

$conexao = new mysqli($hostname, $usuario, $senha, $bancodedados);

if (isset($_POST['submit'])) {
    // Capturando os valores do formulário
    $nome = $_POST['nome'];
    $telefone = $_POST['telefone'];
    $genero = $_POST['genero'];
    $data_registro = $_POST['data_Registro'];

    // Inserção dos dados no banco de dados
    $result = mysqli_query($conexao, "INSERT INTO cliente (nome, telefone, genero, data_registro) VALUES ('$nome', '$telefone', '$genero', '$data_registro')");

    // Redireciona para evitar o reenvio do formulário ao atualizar a página
    header("Location: sistema.php");
    exit();
}

// Consulta para obter os dados
$sql = "SELECT * FROM cliente ORDER BY id ASC";
$result = mysqli_query($conexao, $sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro Cliente</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
    <div class="box">
        <form action="sistema.php" method="POST">
            <fieldset>
                <legend><b>Fórmulário de Clientes</b></legend>
                <br>
                <div class="inputBox">
                    <input type="text" name="nome" id="nome" class="inputUser" required>
                    <label for="nome" class="labelInput">Nome completo</label>
                </div>
                <br><br>
                <div class="inputBox">
                    <input type="tel" name="telefone" id="telefone" class="inputUser" required>
                    <label for="telefone" class="labelInput">Telefone</label>
                </div>
                <p>Sexo:</p>
                <input type="radio" id="feminino" name="genero" value="feminino" required>
                <label for="feminino">Feminino</label>
                <br>
                <input type="radio" id="masculino" name="genero" value="masculino" required>
                <label for="masculino">Masculino</label>
                <br><br>
                <label for="data_Registro"><b>Data de Registro:</b></label>
                <input type="date" name="data_Registro" id="data_Registro" required>
                <br><br>
                <input type="submit" name="submit" id="submit" value="Salvar">
            </fieldset>
        </form>
    </div>

    <div class='m-5'>
        <table class="table text-white table-bg">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Telefone</th>
                    <th scope="col">Gênero</th>
                    <th scope="col">Data de Registro</th>
                    <th scope="col">Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Exibe os dados dos clientes
                while ($user_data = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>" . $user_data['id'] . "</td>";
                    echo "<td>" . $user_data['nome'] . "</td>";
                    echo "<td>" . $user_data['telefone'] . "</td>";
                    echo "<td>" . $user_data['genero'] . "</td>";
                    echo "<td>" . $user_data['data_registro'] . "</td>";
                    echo "<td><a href='#'>Editar</a> | <a href='#'>Excluir</a></td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>
