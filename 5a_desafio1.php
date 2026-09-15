<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Usuário</title>
</head>

<body>
    <form action="" method="post">
        <h2>Verificador de idade</h2>

        <label for="nome">Nome: </label>
        <input type="text" id="nome" name="nome" required><br>

        <label for="ano_nascimento">Ano de nascimento: </label>
        <input type="number" id="ano_nascimento" name="ano_nascimento" required><br><br>

        <button type="submit">Cadastrar</button>
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Recebe os valores
        $nome = $_POST['nome'];
        $AnoNascimento = $_POST['ano_nascimento'];
        $idade = date('Y') - $AnoNascimento;

        // Se a idade for maior ou igual a 18
        if ($idade >= 18) {
            echo "<h2>Acesso permitido, $nome!</h2>";

            // Abre/cria o arquivo em modo append ('a')
            $arquivo = fopen('log_acessos.txt', 'a');

            // Prepara a linha com Nome e Idade
            $linha = "Nome: " . $nome . " - Idade: " . $idade . " anos\n";

            // Escreve e fecha o arquivo
            fwrite($arquivo, $linha);
            fclose($arquivo);
        } else {
            // Mensagem caso seja menor de idade
            echo "<h2>Acesso negado, $nome!</h2>";
        }
    }
    ?>
</body>

</html>