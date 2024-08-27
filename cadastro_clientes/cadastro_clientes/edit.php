<?php
include_once('config.php');
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
        $sexo = $user_data['sexo'];
        $quantidade = $user_data['quantidade'];
        $data_Registro = $user_data['data_registro'];
        }
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
<style>
    .box{
    margin-top: 6%;
    margin-left:24%;
    background-color: rgba(0, 0, 0, 0.7);
    padding: 15px;
    border-radius: 15px;
    width: 55%;
    color: white; 
        
    }
   


    #update {
    background-image: linear-gradient(to right, rgb(0, 92, 197), rgb(90, 20, 220));
    width: 100%;
    border: none;
    padding: 15px;
    color: white;
    font-size: 15px;
    cursor: pointer;
    border-radius: 10px;
    }
    #update:hover {
    background-image: linear-gradient(to right, rgb(0, 80, 172), rgb(80, 19, 195));
    }
</style>
<body>
    <div class="box ">
        <form action="saveEdit.php" method="POST">
            <fieldset>
                <legend><b>Fórmulário de Clientes</b></legend>
                <br>
                <div class="inputBox">
                    <input type="text" color="white" name="nome" id="nome" class="inputUser" value="<?php echo $nome ?>"required>
                    <label for="nome" class="labelInput">Nome completo</label>
                </div>
                <br><br>
                <div class="inputBox">
                    <input type="tel" name="telefone" id="telefone" class="inputUser" value="<?php echo $telefone ?>"required>
                    <label for="telefone" class="labelInput">Telefone</label>
                </div>
                <p>Sexo:</p>
                <input type="radio" id="masculino" name="sexo" value="masculino" <?php echo ($sexo == 'masculino') ? 'checked' : '';?> required>
                <label for="masculino">Masculino</label>
                <br>
                <input type="radio" id="outro" name="sexo" value="outro" <?php echo ($sexo == 'outro') ? 'checked' : '';?> required>
                <label for="outro">Outro</label>
                <br><br>
                <label for="quantidade"><b>Quantidade</b></label>
                <input type="number" name="quantidade" id="quantidade"value="<?php echo $quantidade ?>" required>
                <br><br>
                <label for="data_Registro"><b>Data de Registro:</b></label>
                <input type="date" name="data_Registro" id="data_Registro"value="<?php echo $data_Registro ?>" required>
                <br><br>
                <input type="hidden" name="id" value=<?php echo $id;?>>
                <br></br>
                <input type="submit" name="update" id="update" value="Salvar">
            </fieldset>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
        </form>
    </div>