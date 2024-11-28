<?php
include('../config/config.php');
$nm_aluno = $_POST['nm_aluno'];
$tel_aluno= $_POST['tel_aluno'];
$email_aluno = $_POST['email_aluno'];
$senha_aluno = $_POST['senha_aluno'];
$confima_senha = $_POST['senha_aluno1'];

if ($senha_aluno == $confima_senha){
    $sql_adciona_aluno = $conn_banco->prepare('INSERT INTO tb_aluno (nm_aluno, tel_aluno, email_aluno, senha_aluno) VALUES (?,?,?,?)');
    $sql_adciona_aluno->bindParam(1,$nm_aluno);
    $sql_adciona_aluno->bindParam(2,$tel_aluno);
    $sql_adciona_aluno->bindParam(3,$email_aluno);
    $sql_adciona_aluno->bindParam(4,$senha_aluno);
    $sql_adciona_aluno->execute();

    header('location:../index/index.html');

}else{
    echo "As senhas não estão identicas";
}
