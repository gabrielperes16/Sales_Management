<?php
    $hostname = 'localhost';
    $usuario= 'root';
    $senha= '';
    $bancodedados = 'clientes';
    $conexao = new mysqli($hostname, $usuario, $senha, $bancodedados);

if (!empty($_GET['id'])) 
{
    #conexao MySql
    $id =$_GET['id'];

    $sqlSelect="SELECT * FROM cliente where id=$id";

    $result = $conexao->query($sqlSelect);

    if($result-> num_rows > 0)
    {
        while($user_data =  mysqli_fetch_assoc($result))
        {
        $nome = $user_data['nome'];
        $telefone = $user_data['telefone'];
        $genero = $user_data['genero'];
        $data_Registro = $user_data['data_registro'];
        }
        echo($nome);
    }
    else
    {
        header('location: sistema.php');
    }
}
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
    <a href="sistema.php" >voltar</a>
    <div class="box">
        <form action="sistema.php" method="POST">
            <fieldset>
                <legend><b>Fórmulário de Clientes</b></legend>
                <br>
                <div class="inputBox">
                    <input type="text" color="white" name="nome" id="nome" class="inputUser" value="<?php echo $nome ?>"equired>
                    <label for="nome" class="labelInput">Nome completo</label>
                </div>
                <br><br>
                <div class="inputBox">
                    <input type="tel" name="telefone" id="telefone" class="inputUser" value="<?php echo $telefone ?>"required>
                    <label for="telefone" class="labelInput">Telefone</label>
                </div>
                <p>Sexo:</p>
                <input type="radio" id="feminino" name="genero" value="feminino"value="<?php $sexo == 'feminino' ?>" required>
                <label for="feminino">Feminino</label>
                <br>
                <input type="radio" id="masculino" name="genero" value="masculino" value="<?php $sexo == 'masculino'?>"required>
                <label for="masculino">Masculino</label>
                <br><br>
                <label for="data_Registro"><b>Data de Registro:</b></label>
                <input type="date" name="data_Registro" id="data_Registro"value="<?php echo $data_Registro ?>" required>
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
                    echo "<td>" . $user_data['data_Registro'] . "</td>";
                    echo "<td>
                    <a class='btn btn-primary' href='edit.php?id=$user_data[id]'>
                        <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-pencil' viewBox='0 0 16 16'>
                            <path d='M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325'/>
                        </svg>
                    </a>
                  </td>";
                }
                ?>
                </tbody>
            </table>
        </div>
    </body>
</html>

