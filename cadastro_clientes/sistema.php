<?php
    include_once('config.php');
    if (isset($_POST['submit'])) {
        $nome = $_POST['nome'];
        $telefone = $_POST['telefone'];
        $sexo = $_POST['sexo'];
        $quantidade = $_POST['quantidade'];
        $data_registro = $_POST['data_Registro'];

        $result = mysqli_query($conexao, "INSERT INTO cliente (nome, telefone, sexo,quantidade, data_registro) VALUES ('$nome', '$telefone', '$sexo','$quantidade', '$data_registro')");
        header("Location: sistema.php");
        exit();
    }
    if(!empty($_GET['search']))
    {
        $data =$_GET['search'];
        $sql = "SELECT * FROM cliente WHERE id like '%$data%' or nome like '%$data%'  ORDER BY id asc";
    }
    else
    {
        $sql = "SELECT * FROM cliente ORDER BY id ASC";
    }
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
<style>
    .box {
    position: absolute;
    top: 30%;
    left: 50%;
    transform: translate(-50%, -50%);
    background-color: rgba(0, 0, 0, 0.7);
    padding: 15px;
    border-radius: 15px;
    width: 55%;
    color: white; 
}
    .box-search{
        display: flex;
        justify-content: center;
        gap: .1%;
        margin-top: 700px;
        margin-bottom: 50px
        }
    table {
        text-align: left;
        position: relative;
        left: 50%; 
        transform: translateX(-50%); 
    }

</style>

<body>
    <div class="box">
        <form action="sistema.php" method="POST">
            <fieldset>
                <legend><b>Fórmulário de Clientes</b></legend>
                <input type="hidden" name="id" value="<?php echo $id; ?>">
                <br>
                <div class="inputBox">
                    <input type="text" color="white" name="nome" id="nome" class="inputUser" required>
                    <label for="nome" class="labelInput">Nome completo</label>
                </div>
                <br><br>
                <div class="inputBox">
                    <input type="tel" name="telefone" id="telefone" class="inputUser"  required>
                    <label for="telefone" class="labelInput">Telefone</label>
                </div>
                <p>Sexo:</p>
                <input type="radio" id="feminino" name="sexo" value="feminino"  required>
                <label for="feminino">Feminino</label>
                <br>
                <input type="radio" id="masculino" name="sexo" value="masculino" required>
                <label for="masculino">Masculino</label>
                <br><br>
                <label for="quantidade"><b>Quantidade</b></label>
                <input type="number" name="quantidade" id="quantidade"  autocomplete="off" required>
                <br><br>
                <label for="data_Registro"><b>Data de Registro:</b></label>
                <input type="date" name="data_Registro" id="data_Registro" required>
                <br><br>
                <input type="submit" name="submit" id="submit" value="Salvar">
            </fieldset>
        </form>  
    </div>
    <div class="box-search">
        <input type="search" class="form-control w-25" placeholder="Pesquisar" id=pesquisar>
        <button  class="btn btn-primary">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
            <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0"/>
        </svg>
        </button>
    </div>
    <div class='m-5'>
        <table class="table text-white table-bg">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Telefone</th>
                    <th scope="col">Gênero</th>
                    <th scope="col">Quantidade</th>
                    <th scope="col">Data de Registro</th>
                    <th scope="col">Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php
                while ($user_data = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>" . $user_data['id'] . "</td>";
                    echo "<td>" . $user_data['nome'] . "</td>";
                    echo "<td>" . $user_data['telefone'] . "</td>";
                    echo "<td>" . $user_data['sexo'] . "</td>";
                    echo "<td>" . $user_data['quantidade'] . "</td>";
                    echo "<td>" . $user_data['data_registro'] . "</td>";
                    echo "<td>
                         <a class='btn btn-sm btn-primary' href='edit.php?id=$user_data[id]' title='Editar'>
                            <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-pencil' viewBox='0 0 16 16'>
                                <path d='M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z'/>
                            </svg>
                            </a> 
                            <a class='btn btn-sm btn-danger' href='delete.php?id=$user_data[id]' title='Deletar'>
                                <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-trash-fill' viewBox='0 0 16 16'>
                                    <path d='M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z'/>
                                </svg>
                            </a>
                            </td>";
                        echo "</tr>";
                        }
                    ?>
                </tbody>
            </table>
            <script>
                var search = document.getElementById('pesquisar');

                search.addEventListener("keydown", function(event) {
                    if (event.key === "Enter") 
                    {
                        searchData();
                    }
                });

                function searchData()
                {
                    window.location = 'sistema.php?search='+search.value;
                }
            </script>
</html>

