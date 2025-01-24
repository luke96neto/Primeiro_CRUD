<?php
// Inclui o arquivo de conexão com o banco de dados
require_once 'db.php';

// Executa a consulta para obter todos os alunos
$stmt = $pdo->query("SELECT * FROM alunos");
// Recupera todos os resultados da consulta como um array associativo
$alunos = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD Alunos</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <header>
        <h1>Bem-vindo ao Sistema de Gerenciamento de Alunos</h1>
        <nav>
            <ul>
                <li><a href="../index.php">Home</a></li>
                <li><a href="index-aluno.php">Listar Alunos</a></li>
                <li><a href="create-aluno.php">Adicionar Aluno</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <h2>Lista de Alunos</h2>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Matrícula</th>
                    <th>Data de Nascimento</th>
                    <th>E-mail</th>
                    <th>Endereço</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <!-- Itera sobre os alunos e cria uma linha para cada aluno na tabela -->
                <?php foreach ($alunos as $aluno): ?>
                    <tr>
                        <!-- Exibe os dados do aluno -->
                        <td><?= $aluno['id'] ?></td>
                        <td><?= $aluno['nome'] ?></td>
                        <td><?= $aluno['matricula'] ?></td>
                        <td><?= $aluno['data_nascimento'] ?></td>
                        <td><?= $aluno['email'] ?></td>
                        <td><?= $aluno['endereco'] ?></td>
                        <td>
                            <!-- Links para visualizar, editar e excluir o aluno -->
                            <a href="read-aluno.php?id=<?= $aluno['id'] ?>">Visualizar</a>
                            <a href="update-aluno.php?id=<?= $aluno['id'] ?>">Editar</a>
                            <a href="delete-aluno.php?id=<?= $aluno['id'] ?>">Excluir</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </main>

    <footer>
        <p>&copy; 2024 - Sistema de Gerenciamento de Alunos</p>
    </footer>
</body>
</html>
