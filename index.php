<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Treinou Hoje Noia?</title>
</head>

<body>
    <section class="section1">
        <div class="main">
            <h1>Treinou Hoje?</h1>
            <form action="#" method="post">
                <input type="text" name="nome" id="" placeholder="Seu nome" required>
                <input type="text" name="membro" id="" placeholder="Treinou oque?" required>
                <input type="number" name="peso" id="" placeholder="Seu peso" required>
                <select name="dia_semana" id="" required>
                    <option value="" selected disabled>Dia da semana</option>
                    <option value="Segunda">Segunda</option>
                    <option value="Terca">Terça</option>
                    <option value="Quarta">Quarta</option>
                    <option value="Quinta">Quinta</option>
                    <option value="Sexta">Sexta</option>
                    <option value="Sabado">Sabado</option>
                    <option value="Domingo">Domingo</option>
                </select>
                <input type="date" name="data" id="" required>
                <input type="submit" value="+ Adicionar" name="botao">
            </form>
            <div class="header-table">
                <div class="table">
                    <?php
                    include('db.php');
                    if (isset($_POST['botao'])) {
                        $nome = $_POST['nome'];
                        $membro = $_POST['membro'];
                        $peso = $_POST['peso'];
                        $dia_semana = $_POST['dia_semana'];
                        $data = $_POST['data'];

                        $query = "INSERT INTO tabela_usuario (nome, membro, peso, dia_semana, data) VALUES ('$nome', '$membro', '$peso', '$dia_semana', '$data')";
                        $result = mysqli_query($conexao, $query);

                        $query_select = "SELECT * FROM tabela_usuario";
                        $result_select = mysqli_query($conexao, $query_select);

                        echo "<table id='userTable'>";
                        echo "<tr><th><a href='javascript:void(0);' onclick='sortTable(0)'>Nome</a></th><th><a href='javascript:void(0);' onclick='sortTable(1)'>Membro Treinado</a></th><th><a href='javascript:void(0);' onclick='sortTable(2)'>Peso Atual</a></th><th><a href='javascript:void(0);' onclick='sortTable(3)'>Dia da Semana</a></th><th><a href='javascript:void(0);' onclick='sortTable(4)'>Data</a></th></tr>";
                        while ($row = mysqli_fetch_assoc($result_select)) {
                            echo "<tr>";
                            echo "<td>" . $row['nome'] . "</td>";
                            echo "<td>" . $row['membro'] . "</td>";
                            echo "<td>" . $row['peso'] . "</td>";
                            echo "<td>" . $row['dia_semana'] . "</td>";
                            echo "<td>" . $row['data'] . "</td>";
                            echo "</tr>";
                        }
                        echo "</table>";
                    }
                    ?>
                </div>
            </div>
        </div>
    </section>
    <script src="main.js"></script>
</body>

</html>