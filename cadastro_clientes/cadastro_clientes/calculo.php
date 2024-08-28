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
    <title>calculo</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
      
        .btn_calculo {
            background-color: #4ad14c;
            border-radius: 8px;
            border: 0.1px solid black;
            width: 16%;
            font-size: 18px;
            font-weight: 700;
        }
        .box {
            width: 98%;
            margin: auto; 
            border-radius: 15px; 
            overflow: hidden; 
        }
        #modal-nome, #modal-quantidade, #modal-resultado {
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
}


        
    </style>
</head>
<body>

<div class="m-5">
        <table class="box table m-3 table-striped table-dark position-relative top-0 start-0 rounded-3">
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
    $quantidade = $user_data['quantidade'];
    $nome = $user_data['nome'];
    echo "<tr>";
    echo "<td>" . $user_data['id'] . "</td>";
    echo "<td>" . $user_data['nome'] . "</td>";
    echo "<td>" . $user_data['telefone'] . "</td>";
    echo "<td>" . $user_data['sexo'] . "</td>";
    echo "<td>" . $user_data['quantidade'] . "</td>";
    echo "<td>" . $user_data['data_registro'] . "</td>";
    echo "<td>
        <a class='btn btn-success' href='#' data-bs-toggle='modal' data-bs-target='#calculoModal'data-nome='$nome' data-quantidade='$quantidade' title='Calcular'>
        <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-calculator-fill' viewBox='0 0 16 16'>
            <path d='M2 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2zm2 .5v2a.5.5 0 0 0 .5.5h7a.5.5 0 0 0 .5-.5v-2a.5.5 0 0 0-.5-.5h-7a.5.5 0 0 0-.5.5m0 4v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5zM4.5 9a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5zM4 12.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5M7.5 6a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5zM7 9.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5m.5 2.5a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5zM10 6.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5m.5 2.5a.5.5 0 0 0-.5.5v4a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-4a.5.5 0 0 0-.5-.5z'/>
        </svg>
        </a>
    </td>";
    echo "</tr>";
}
?>

<!-- Modal -->
<div class="modal fade" id="calculoModal" tabindex="-1" aria-labelledby="calculoModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="calculoModalLabel">Resultado do Cálculo</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p id="modal-nome"></p>
                <p id="modal-quantidade"></p>
                <p id="modal-resultado"></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        var modalElement = document.getElementById('calculoModal');
        var modal = new bootstrap.Modal(modalElement);
        
        modalElement.addEventListener('show.bs.modal', function (event) {
            var button = event.relatedTarget;
            var nome = button.getAttribute('data-nome');
            var quantidade = button.getAttribute('data-quantidade');
            var resultado = quantidade * 7.00;
            document.getElementById('modal-nome').innerHTML = '<strong>' + nome + '</strong> realizou compras neste mês.';
            document.getElementById('modal-quantidade').innerHTML = 'O total de unidades adquiridas foi de <strong>' + quantidade + '</strong>.';
            document.getElementById('modal-resultado').innerHTML = 'O valor total gasto em litros de leite foi de <strong>R$ ' + resultado.toFixed(2).replace('.', ',') + '</strong>.';
            });
    });
</script>
