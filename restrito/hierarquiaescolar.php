<?php include "../validar.php"; ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Mapa da Escola</title>
        <link href="../css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
        <link href="../css/bootstrap.min.css" rel="stylesheet" />
    </head>
    <body>

        <?php
            require 'conexao_bd.php';

            $sql1 = "SELECT * FROM table_hierarquiamacro";
            $query = mysqli_query($conexao, $sql1);

            /*$sql2 = "SELECT p.nomepessoa, h.nomehierarquia, hm.nomehierarquiamacro, h.hierarquiamacro, hm.idhierarquiamacro "
                        . "from table_pessoa p, table_hierarquia h, table_hierarquiamacro hm "
                        . "where p.hierarquia = h.idhierarquia and h.hierarquiamacro = hm.idhierarquiamacro";
            $query2 = mysqli_query($conexao, $sql2);*/

            $sql2 = "select * "
                    . "from table_pessoa p, table_hierarquia h, table_hierarquiamacro hm "
                    . "where p.hierarquia = h.idhierarquia and h.hierarquiamacro = hm.idhierarquiamacro;";
            $query2 = mysqli_query($conexao, $sql2);

        ?>

        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="index.php">Bem Vindo Professor!</a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
            <!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
                <div class="input-group">
                </div>
            </form>
            <!-- Navbar-->
            <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="configuracoes.php">Configurações</a></li>
                        <li><a class="dropdown-item" href="cadastros.php">Cadastros</a></li>
                        <li><hr class="dropdown-divider" /></li>
                        <li><a class="dropdown-item" href="../logout.php">Sair</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">DASHBOARD</div>
                            <a class="nav-link" href="index.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Dashboard
                            </a>
                            <div class="sb-sidenav-menu-heading">Organização</div>
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Sobre a Escola
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="mapaescolar.php">Mapa Escolar</a>
                                    <a class="nav-link" href="hierarquiaescolar.php">Hierarquia Escolar</a>
                                </nav>
                            </div>
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
                                <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                                Documentos
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapsePages" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="projetopoliticopedagogico.php">Projeto Político Pedagógico</a>
                                    <a class="nav-link" href="regimeescolar.php">Regimento Escolar</a>
                                    <a class="nav-link" href="bncc.php">BNCC</a>
                                    <a class="nav-link" href="demaisresolucoes.php">Demais Resoluções</a>
                                </nav>
                            </div>   

                        </div>
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Hierarquia Escolar</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Hierarquia Escolar</li>
                        </ol>

                        <?php

                            $pessoasQuery = [];

                            while($linha2 = mysqli_fetch_assoc($query2)){
                                $pessoasQuery[] = $linha2;
                            }

                            while($linha1 = mysqli_fetch_assoc($query)){
                                echo "<div class='row'>
                                        <div class='col-md-12 col-xs-12'>
                                            <div class='card'>
                                                <div class='card-body'>
                                                    <h5 class='card-title'>" . $linha1['nomehierarquiamacro'] . "</h5> ";

                                    foreach($pessoasQuery as $hie){

                                            if($hie['hierarquiamacro'] == $linha1['idhierarquiamacro']){
                                                echo "<span class='badge text-bg-primary'> " . htmlspecialchars($hie['nomepessoa']) ." - " . htmlspecialchars($hie['nomehierarquia']) ."  </span>"   ;
                                            }

                                    }
                                    echo "</div> </div></div></div><br />";
                            }
                        ?>
                    </div>
                </main>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Your Website 2026</div>
                            <div>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="../js/scripts.js"></script>
    </body>
</html>
