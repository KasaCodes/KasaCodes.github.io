<?php
include('../config/config.php');
if (!empty($_GET['id_aluno'])) {
    $id_aluno=$_GET['id_aluno'];
    $sql_aluno=$conn_banco->prepare("SELECT * FROM tb_aluno where id_aluno=:id_aluno LIMIT 1");
    $sql_aluno->bindParam(':id_aluno', $id_aluno);
    $sql_aluno->execute();
    $result2=$sql_aluno->fetch();
}
$aluno = $result2['nm_aluno'];
var_dump($aluno);
$sql_exericicios=$conn_banco->prepare("SELECT * FROM tb_exer_aluno
 inner join tb_aluno on tb_aluno.id_aluno=tb_exer_aluno.aluno_id INNER JOIN tb_exercicios on tb_exercicios.id_exercicio = tb_exer_aluno.exercicio_id 
 inner join tb_tipo_exer on tb_tipo_exer.id_tipo_exer = tb_exercicios.exercicio_tipo_id WHERE aluno_id=:id_aluno ORDER by tb_exer_aluno.id_exer_aluno");
$sql_exericicios->bindValue(':id_aluno',$result2['id_aluno']);
$sql_exericicios->execute();
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Página Inicial</title>
        <!-- Favicon-->
        <link rel="icon" type="../image/x-icon" href="../assets/favicon.ico" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="../css/home.css" rel="stylesheet" />
    </head>
    <body>
        
        <div class="d-flex" id="wrapper">
            <!-- Sidebar-->
            <div class="border-end bg-white" id="sidebar-wrapper">
                <div class="sidebar-heading border-bottom bg-light w-100 ">
                    <img src="../imagens/logo.png" class="img-fluid list-group list-group-flush" alt="Imagem responsiva">
                </div>
                <div class="list-group list-group-flush">
                <?php
                    echo '<a class="list-group-item list-group-item-action list-group-item-light p-3" href="inicio.php?id_aluno='.$result2['id_aluno'].'">Início</a>';
                    echo '<a class="list-group-item list-group-item-action list-group-item-light p-3" href="home.php?id_aluno='.$result2['id_aluno'].'">Seu Treino</a>';
                    echo '<a class="list-group-item list-group-item-action list-group-item-light p-3" href="mta.php?id_aluno='.$result2['id_aluno'].'">MTA</a>';
                    echo '<a class="list-group-item list-group-item-action list-group-item-light p-3" href="calculadora.php?id_aluno='.$result2['id_aluno'].'">Calculadora</a>';
                    echo '<a class="list-group-item list-group-item-action list-group-item-light p-3" href="suporte.php?id_aluno='.$result2['id_aluno'].'">Suporte</a>';
                ?>
                </div>
            </div>
            <!-- Page content wrapper-->
            <div id="page-content-wrapper">
                <!-- Top navigation-->
                <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
                    <div class="container-fluid">
                        <button class="btn btn-primary" id="sidebarToggle">Menu</button>
                        <h2>Seu Treino</h2>
                </nav>
                <!-- Page content-->
                <div class="container-fluid">
                <?php
                echo '<h1>Seu Treino,'. $aluno;
                foreach($sql_exericicios as $aluno1){
                }?></h1>
                    <table id="treinoTable" border='1' >
                        <thead>
                            <tr>
                                <th>Parte Corporal</th>
                                <th>Exercício</th>
                                <th>Séries</th>
                                <th>Repetições</th>
                                <th>Descanso (segundos)</th>
                                <th colspan="2">Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach($sql_exericicios as $linha){
                                echo '<tr>';
                                echo '<td>' . $linha['nm_tipo_exer'] . '</td>';
                                echo '<td>' . $linha['nm_exercicio'] . '</td>';
                                echo '<td>' . $linha['num_series'] . ' Séries</td>';
                                echo '<td>' . $linha['num_repeticoes'] . ' Vezes</td>';
                                echo '<td>' . $linha['tem_descanso'] . ' Segundos</td>';
                                ?>
                                <td><a href="../excluir/excluir_exercicio.php?id_exer_aluno=<?php echo $linha['id_exer_aluno'] ?>&id_aluno=<?php echo $result2['id_aluno'] ?>" onclick="return confirm('Deseja remover esse exercício da sua lista de treino?')" class="btn btn-danger">Excluir</a></td>
                                <?php 
                                echo '</tr>';
                            }
                            ?>
                            
        </div>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="../js/scripts.js"></script>
    </body>
</html>
