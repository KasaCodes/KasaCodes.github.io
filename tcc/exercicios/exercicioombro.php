<?php
include('../config/config.php');
$sql_exercicio_ombro= $conn_banco -> prepare('SELECT id_exercicio, nm_exercicio FROM tb_exercicios INNER JOIN tb_tipo_exer on tb_tipo_exer.id_tipo_exer = tb_exercicios. exercicio_tipo_id where tb_tipo_exer.nm_tipo_exer like"%Ombro%"');
$sql_exercicio_ombro->execute();

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
        <link href="../css/home.css" rel="stylesheet">
        <link rel="stylesheet" href="../css/mta.css">
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
                        <h2>Montador de Treino Automático</h2>
                </nav>
                <!-- Page content-->
                <div class="container-fluid">
                    <?php
                    echo '<a href="../mta/mta.php?id_aluno='. $result2['id_aluno'].'"><button type="button" class="btn-close position-absolute" aria-label="Close" ></button></a>';
                    ?>
                    <h1 class="m-5">Ombro</h1>
                    <br>
                    <br>
                </div>     
                <!-- Large button groups (default and split) -->
                <!-- Botões-->    
                <div class="container mt-5">
                    <?php
                    echo '<form action="exercicioEscolhido_submit.php?id_aluno='.$result2['id_aluno'].'"method="post">'
                    ?>
                        <div class="form-group">
                            <label>Selecione suas opções:</label><br>
                            <select name="exercicio" id="nm_exercicio">
                                <option value="">Selecione</option>
                                <?php
                                foreach($sql_exercicio_ombro as $data){?>
                                    <option value="<?php echo $data['id_exercicio']?>"><?php echo $data['nm_exercicio']?></option>
                                <?php
                                }
                                ?>
                            </select>
                            
                        </div>
                        <br>                      
                        <!-- Seleção de séries -->
                        <div id="series">
                           <label for="opcoes1">Quantas séries?</label>
                           <select id="opcoes1" name="series">
                               <option value="1">1</option>
                               <option value="2">2</option>
                               <option value="3">3</option>
                               <option value="4">4</option>
                               <option value="5">5</option>
                           </select>
                       </div>
                       <br>

                       <!-- Seleção de repetições -->
                       <div id="series">
                           <label for="opcoes2">Quantas repetições?</label>
                           <select id="opcoes2" name="repeticoes">
                               <option value="5">5</option>
                               <option value="8">8</option>
                               <option value="10">10</option>
                               <option value="12">12</option>
                               <option value="15">15</option>
                               <option value="18">18</option>
                           </select>
                       </div>
                       <br>

                       <!-- Seleção de descanso -->
                       <div id="series">
                           <label for="opcoes3">Quanto tempo de descanso?</label>
                           <select id="opcoes3" name="descanso">
                               <option value="20">20 segundos</option>
                               <option value="30">30 segundos</option>
                               <option value="40">40 segundos</option>
                               <option value="45">45 segundos</option>
                               <option value="50">50 segundos</option>
                               <option value="60">60 segundos</option>
                           </select>
                       </div>
                       <br>

                       <!-- Botão alinhado à esquerda -->
                       <div class="d-flex justify-content-start">
                           <button type="submit" class="btn btn-primary">Adicionar</button>
                       </div>
                   </form>
               </div>
       </div>

                  

        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="../js/scripts.js"></script>
        
    </body>
</html>
