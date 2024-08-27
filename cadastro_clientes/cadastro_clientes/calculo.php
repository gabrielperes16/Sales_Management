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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Scrollable Modal Example</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<style>
  .btn_calculo{
    background-color: #4ad14c;
    border-radius: 8px;
    border:0.1px solid black;
    width: 16%;
    font-size:18px;
    font-weight:700;
    }
    table {
    background-color: rgba(0, 0, 0, 0.4);
    text-align: left;
    position: relative;
    border-radius:15px;
    left: 50%; 
    transform: translateX(-50%); 

}

</style>
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
                    <a class='btn btn-success' href='#' data-bs-toggle='modal' data-bs-target='#modal_$user_data[id]' title='Calcular'>
                        <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-calculator-fill' viewBox='0 0 16 16'>
                            <path d='M2 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2zm2 .5v2a.5.5 0 0 0 .5.5h7a.5.5 0 0 0 .5-.5v-2a.5.5 0 0 0-.5-.5h-7a.5.5 0 0 0-.5.5m0 4v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5zM4.5 9a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5zM4 12.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5M7.5 6a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5zM7 9.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5m.5 2.5a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5zM10 6.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5m.5 2.5a.5.5 0 0 0-.5.5v4a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-4a.5.5 0 0 0-.5-.5z'/>
                        </svg>
                    </a>
                  </tr>";
                      }

                    ?>
            </tbody>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

