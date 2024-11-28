<?php
include('../config/config.php');
if (!empty($_GET['id_aluno'])) {
    $id_aluno=$_GET['id_aluno'];
    $sql_aluno=$conn_banco->prepare("SELECT * FROM tb_aluno where id_aluno=:id_aluno LIMIT 1");
    $sql_aluno->bindParam(':id_aluno', $id_aluno);
    $sql_aluno->execute();
    $result2=$sql_aluno->fetch();
}


$exercicio = $_POST['exercicio'];
$series = $_POST['series'];
$repeticoes = $_POST['repeticoes'];
$descanso= $_POST['descanso'];

$nm_exercicio = $conn_banco->prepare('SELECT nm_exercicio from tb_exercicios WHERE id_exercicio=:id_exercicio');
$nm_exercicio ->bindParam(':id_exercicio',$exercicio);
$nm_exercicio ->execute();
$result = $nm_exercicio->fetch();


$sql_exercicio = $conn_banco->prepare('INSERT INTO tb_exer_aluno (aluno_id, exercicio_id, nm_exercicio, num_series, num_repeticoes, tem_descanso) values (:aluno_id, :exercicio_id, :nm_exercicio, :num_series, :num_repeticoes, :tem_descanso)');

$sql_exercicio->bindValue(':aluno_id', $result2['id_aluno']);
$sql_exercicio->bindValue(':exercicio_id', $exercicio);
$sql_exercicio->bindValue(':nm_exercicio', $result['nm_exercicio']);
$sql_exercicio->bindValue(':num_series', $series);
$sql_exercicio->bindValue(':num_repeticoes', $repeticoes);
$sql_exercicio->bindValue(':tem_descanso', $descanso);

$sql_exercicio->execute();

header('location:../mta/mta.php?id_aluno='.$result2['id_aluno']);

