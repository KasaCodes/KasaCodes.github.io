<?php
include('../config/config.php');
if (!empty($_GET['id_aluno'])) {
    $id_aluno=$_GET['id_aluno'];
    $sql_aluno=$conn_banco->prepare("SELECT * FROM tb_aluno where id_aluno=:id_aluno LIMIT 1");
    $sql_aluno->bindParam(':id_aluno', $id_aluno);
    $sql_aluno->execute();
    $result2=$sql_aluno->fetch();

 }
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
        <link href="../css/home.css" rel="stylesheet">
        <link href="../css/mta.css" rel="stylesheet">
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
                        <h2>Montador de Treino para Academia</h2>
                </nav>
                <!-- Page content-->
                <div class="container-fluid">
                    <h1 class="mt-4">Qual é o grupo muscular que você deseja?</h1>
                    <br>
                    <h3 class="offset-md-1">Categorias</h3>
                    <br>
                </div>    
                <!-- Large button groups (default and split) -->
                <!-- Botões-->    
            <div class="row">    
                <div class="offset-md-2">
                <?php
                echo '<a href="../exercicios/exerciciopeito.php?id_aluno='.$result2['id_aluno'].'"><button id="botao" type="button" class="fs-3 pl-">Peito</button></a>';?>
                <?php
                echo '<a href="../exercicios/exerciciocostas.php?id_aluno='.$result2['id_aluno'].'"><button id="botao" type="button" class="fs-3">Costas</button></a>';?>              
                <?php
                echo '<a href="../exercicios/exercicioombro.php?id_aluno='.$result2['id_aluno'].'"><button id="botao" type="button" class="fs-3">Ombro</button></a>';?>
                <?php
                echo '<a href="../exercicios/exerciciocardio.php?id_aluno='.$result2['id_aluno'].'"><button id="botao" type="button" class="fs-3">Cardio</button></a>';?>
                </div>
             </div>
             <div class="row">    
                <div class="offset-md-2"> <br>
                
                <?php echo '<a href="../exercicios/exerciciotriceps.php?id_aluno='.$result2['id_aluno'].'"><button id="botao" type="button" class="fs-3">Tríceps</button></a>';?>
                
                 <?php echo '<a href="../exercicios/exerciciobiceps.php?id_aluno='.$result2['id_aluno'].'"><button id="botao" type="button" class="fs-3">Bíceps</button></a>';?>
                    
                 <?php echo '<a href="../exercicios/exerciciopernas.php?id_aluno='.$result2['id_aluno'].'"><button id="botao" type="button" class="fs-3">Pernas</button></a>';?> 
                 
                 <?php echo '<a href="../exercicios/semequipamento.php?id_aluno='.$result2['id_aluno'].'"><button id="botao" type="button" class="fs-3">Sem Equipamento</button></a>';?>
  
                </div>
             </div>
<br>
<div class="row">    
    <div class="offset-md-2">
    <?php
    echo '<a href="../mta/home.php?id_aluno='.$result2['id_aluno'].'"><button class="btn btn-primary">Vizualizar treino</button></a>'?>
</div>
</div>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="../js/scripts.js"></script>
        
    </body>
</html>
