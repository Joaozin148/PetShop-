<?php include("includes/header.php"); ?>

<main>
    <section class="conteudo">
        <h2>Resultado do Cadastro</h2>

        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $nome = $_POST['nome'];
            $tipo = $_POST['tipo'];
            $idade = $_POST['idade'];
            $telefone = $_POST['telefone'];
            $servicos = $_POST['servicos'];

            
            if (!ctype_digit($idade)) {
                echo "<p>A idade deve conter apenas números.</p>";
            } elseif (!preg_match("/^\(\d{2}\) \d{5}-\d{4}$/", $telefone)) {
                echo "<p>O telefone deve estar no formato (99) 99999-9999.</p>";
            } elseif (empty($servicos)) {
                echo "<p>Por favor, selecione pelo menos um serviço.</p>";
            } else {
                echo "<p>Pet cadastrado com sucesso!</p>";
                echo "<p><strong>Nome:</strong> " . htmlspecialchars($nome) . "</p>";
                echo "<p><strong>Tipo:</strong> " . htmlspecialchars($tipo) . "</p>";
                echo "<p><strong>Idade:</strong> " . htmlspecialchars($idade) . "</p>";
                echo "<p><strong>Telefone:</strong> " . htmlspecialchars($telefone) . "</p>";
                echo "<p><strong>Serviços:</strong></p><ul>";
                foreach ($servicos as $servico) {
                    echo "<li>" . htmlspecialchars($servico) . "</li>";
                }
                echo "</ul>";
            }
        }
        ?>
    </section>
</main>

<?php include("includes/footer.php"); ?>
