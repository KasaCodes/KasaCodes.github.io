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
        <link rel="icon" type="image/x-icon" href="../assets/favicon.ico" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="../css/home.css" rel="stylesheet" />
        <link rel="stylesheet" href="../css/calculadora.css">
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
                        <h2>Calculadora IMC</h2>
                </nav>
                <!-- Page content-->
                <main id="container">
                    <section id="img">
                        <img src="../imagens/nueva ilustracion.svg">
                    </section>
            

                    <section id="calculator" class="">
                        <form id="form">
                            <h1 id="title">
                                Calculadora - Índice de Massa Corporal
                            </h1>
            
                            <div class="input-box">
                                <label for="weight">
                                    Peso em kg
                                </label>
                                <div class="input-field">
                                    <i class="fa-solid fa-weight-hanging"></i>
                                    <input type="number" id="weight" name="weight" required>
                                    <span>
                                        Kg
                                    </span>
                                </div>
                            </div>
            
                            <div class="input-box">
                                <label for="height">
                                    Altura em metros
                                </label>
                                <div class="input-field">
                                    <i class="fa-solid fa-ruler"></i>
                                    <input type="number" step="0.01" id="height" name="height" required>
                                    <span>
                                        m
                                    </span>
                                </div>
                            </div>
                            
                            <button id="calculate">
                                Calcular
                            </button>
                        </form>    
                        
                        <div id="infos" class="hidden">
                            <div id="result">
                                <div id="bmi">
                                    <span id="value"></span>
                                    <span>Seu IMC</span>
                                </div>
                                <div id="description">
                                    <span></span>
                                </div>  
                            </div>
            
                            <div id="more_info">
                                <a href="https://mundoeducacao.uol.com.br/saude-bem-estar/imc.htm">
                                    Mais informações sobre o IMC
                                    <i class="fa-solid fa-arrow-up-right-from-square"></i>
                                </a>
                            </div>
                        </div>   
                    </section>
                </main>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="../js/scripts.js"></script>
        <!--JS da calculadora-->
        <script src="../js/calculadora.js"></script>
    </body>
</html>