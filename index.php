<?php

include('conexao.php');

?>


<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <title>Calculadora Carbo</title>
</head>

<body>
    <h1>Lista de Carboidratos</h1>
    <form action="">
        <input name="busca" placeholder="Digite os termos de pesquisa" type="text">
        <button type="submit">Pesquisar</button>
    </form>

    <br>

    <table width="200px" border="2">
        <tr>
            <th>Tipo</th>
            <th>Quantidade</th>
        </tr>
        <?php
        if (!isset($_GET['busca'])) { 
          ?>
        <tr>
            <td colspan="3">Digite algo para pesquisar...</td>
        </tr>
        <?php
        } else {
            $pesquisa = $mysqli->real_escape_string($_GET['busca']);
            $sql_code = "SELECT * 
            FROM alimentos 
            WHERE tipo LIKE '%$pesquisa%' 
            OR quantidade LIKE '%$pesquisa%'";
            $sql_query = $mysqli->query($sql_code) or die("ERRO ao consultar! " . $mysqli->error);

            if ($sql_query->num_rows == 0) {
               ?>
            <tr>
                <td colspan="3">Nenhum resultado encontrado</td>
            </tr>
            <?php
            } else {
                while($dados = $sql_query->fetch_assoc()) {
                    ?>
                    <tr>
                        <td><?php echo $dados['tipo']; ?></td>
                        <td><?php echo $dados['quantidade']; ?></td>
                    </tr>
                    <?php
                }
            }    
            ?>

        <?php } ?>

    </table>
    
</body>
</html>