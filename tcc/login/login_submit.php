<?php
$email_aluno = $_POST['email_aluno'];
$senha_aluno = $_POST['senha_aluno'];

include('../config/config.php');

$sql_login = $conn_banco -> prepare('SELECT * FROM tb_aluno');
$sql_login -> execute();

foreach($sql_login as $linha){
    if ($email_aluno == $linha['email_aluno'] && $senha_aluno == $linha['senha_aluno']){
        header('location:../mta/inicio.php?id_aluno='.$linha['id_aluno']);
    }else{ echo 'Email ou Senha Incorretos';}
}

?>