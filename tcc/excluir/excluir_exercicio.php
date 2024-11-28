<?php

if (!empty($_GET['id_exer_aluno']) || !empty($_GET['id_aluno'])) {
    include('../config/config.php');
    $id_exer_aluno = $_GET['id_exer_aluno'];
    $id_aluno = $_GET['id_aluno'];

    $sql = $conn_banco->prepare('DELETE FROM tb_exer_aluno WHERE id_exer_aluno = ?');
    $sql->bindParam(1, $id_exer_aluno);
    $sql->execute();
    header('Location: ../mta/home.php?id_aluno=' . $id_aluno);
    exit;
}
?>
