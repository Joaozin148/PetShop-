<?php include("includes/header.php"); ?>

<main>
    <section class="conteudo">
        <h2>Cadastro de Pet</h2>

        <form action="" method="post">
            <label for="nome">Nome do Pet:</label>
            <input type="text" name="nome" id="nome" required>

            <label for="tipo">Tipo (ex: cachorro, gato):</label>
            <input type="text" name="tipo" id="tipo" required>

            <label for="idade">Idade:</label>
            <input type="text" name="idade" id="idade" maxlength="2" required>

            <label for="servicos">Escolha os serviços:</label>
            <select id="servicos" name="servicos[]" multiple required>
                <option value="banho">Banho</option>
                <option value="tosa">Tosa</option>
                <option value="consulta">Consulta</option>
                <option value="vacina">Vacinação</option>
            </select>

            <label for="telefone">Telefone do dono:</label>
            <input type="text" name="telefone" id="telefone" placeholder="(99) 99999-9999" required>

            <label for="data_nascimento">Data de nascimento do pet:</label>
            <input type="text" name="data_nascimento" id="data_nascimento" placeholder="dd/mm/aaaa" required>

            <label for="observacao">Alguma observação sobre o pet:</label><br>
            <textarea id="observacao" name="observacao" rows="4" cols="50" placeholder="Digite aqui quaisquer detalhes ou necessidades especiais do pet..."></textarea><br><br>

            <input type="submit" value="Cadastrar">
        </form>

<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nome = htmlspecialchars($_POST['nome']);
        $tipo = htmlspecialchars($_POST['tipo']);
        $idade = (int) $_POST['idade'];
        $servicos = $_POST['servicos'] ?? [];
        $telefone = preg_replace('/\D/', '', $_POST['telefone']);
        $data = preg_replace('/\D/', '', $_POST['data_nascimento']);
        $observacao = htmlspecialchars($_POST['observacao'] ?? 'Nenhuma observação fornecida');

         if (strlen($telefone) === 11) {
            $telefone_formatado = '(' . substr($telefone, 0, 2) . ') ' . substr($telefone, 2, 5) . '-' . substr($telefone, 7);
        } else {
            $telefone_formatado = 'Telefone inválido';
        }

        if (strlen($data) === 8) {
            $data_formatada = substr($data, 0, 2) . '/' . substr($data, 2, 2) . '/' . substr($data, 4);
        } else {
            $data_formatada = 'Data inválida';
        }
        
        echo "<div class='conteudo'><h3>Dados Recebidos:</h3>";
        echo "Nome do Pet: $nome<br>";
        echo "Tipo: $tipo<br>";
        echo "Idade: $idade anos<br>";
        echo "Telefone: $telefone_formatado<br>";
        echo "Data de nascimento: $data_formatada<br>";
        echo "Serviços escolhidos:<ul>";
        foreach ($servicos as $servico) {
            echo "<li>" . htmlspecialchars($servico) . "</li>";
        }
        echo "</ul>";
        echo "Observação sobre o Pet: $observacao<br>";
        echo "</div>";
    }
?>
</main>
