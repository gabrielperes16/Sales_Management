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

</style>
<div class='m-5'>
        <table class="table table-bg" style="background-color: rgba(0, 0, 0, 0.8);">
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
                         
                            </td>";
                        echo "</tr>";
                        }

                    ?>
                </tbody>
            </table>
<body>
    <button type="button"  class="btn_calculo" data-bs-toggle="modal" data-bs-target="#scrollableModal">
      Calcular
    </button>

    <!-- Scrollable modal -->
    <div class="modal fade" id="scrollableModal" tabindex="-1" aria-labelledby="scrollableModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="scrollableModalLabel">Mensagem</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <!-- Conteúdo longo para demonstrar a rolagem -->
            <p>Conteúdo extenso...</p>
            <p>Mais conteúdo...</p>
            <p>Continue adicionando conteúdo...</p>
            <!-- Adicione mais conteúdo conforme necessário -->
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary">Save changes</button>
          </div>
        </div>
      </div>
    </div>
    

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

