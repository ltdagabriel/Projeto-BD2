
<?php 
    require_once(realpath("./includes/mapeamento.php"));
    $map=new mapa();;
    require_once($map->Conect_Filme());
    require_once($map->Conect_Serie());
    require_once($map->Conect_Obra());
    require_once($map->Entidade_Obra());
    require_once($map->Entidade_Filme());
    require_once($map->Entidade_Serie());
    $serie=null;
    $filme=null;
    $obraDAO= new obraDAO();
    $obra=$obraDAO->Get($_POST['titulo'],$_POST['data']);
    if( $serieDAO= new serieDAO() ){
        $serie=$serieDAO->Get($_POST['titulo'],$_POST['data']);
    }
    if($filmeDAO=new filmeDAO()){
        $filme=$filmeDAO->Get($_POST['titulo'],$_POST['data']);
    }
    /*** Variaveis
     * $serie ---   contem entidade Serie
     * $filme ---   contem entidade Filme
     * $obra  ---   contem uma obra 
     */
    ?>
<html lang="pt-BR">
<head>
<?php
    session_start();
    if(!$_SESSION['logado']){
        $_SESSION['logado']=0;
    }
    
    
?>
	<title>MyHobbieFIlmeSeries</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Informações sobre filmes e séries.">
	<meta name="author" content="Caio">
	<meta name="author" content="Gabriel">
	<meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href ="style\css\layout.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <script src="style/js/include.js"></script>
        <script src="style/js/jquery-1.10.2.js"></script>
        <script src="style/js/jquery.js"></script>
        
<body>
    
<div class="container col-lg-12 col-md-12 com-sm-12" style="padding:15px" >
    <div class="container">
        <?php include $map->IncludeLogoLogin();?>
        <?php include($map->IncludeMenu());?>
           
        <div class="row container">
            <div id='conteudo'>
                <div class=" panel-default panel">
                    <div class="panel-body"
                        <form method="post">
                            <div class="navbar-left col-md-4 col-lg-4">
                                <img class="img-responsive img-rounded" src="<?php echo $obra->get_Foto();?>">
                            </div>

<<<<<<< HEAD
                    <div class="navbar-left col-md-8 col-lg-8">
                        <p>Data de Lançamento: <?php echo $obra->get_DataLancamento();?></p>
                    </div>

                    <div class="navbar-left col-md-8 col-lg-8">
                        <p>Faixa Etária: <?php echo $obra->get_FEtaria();?></p>
                    </div>

                    <?php
                    if($filme->get_Titulo()==$obra->get_Titulo()){
                    ?>
                    <div class="navbar-left col-md-8 col-lg-8">
                        <p>Trailer: <?php echo $filme->get_trailer();?></p>
                    </div>
                        <?php 
                    }
                    if($serie->get_Titulo()==$obra->get_Titulo()){
                        ?>
                        <div class="panel-default panel navbar-right col-md-8 col-lg-8">
                            <p>Adiciona info do seriado</p>
                        </div>
                        <?php 
                    }
                    ?>
=======
                            <div class="navbar-left col-md-8 col-lg-8">
                                <h3><?php echo $obra->get_Titulo();?></h3>
                                <p>Sinopse: <?php echo $obra->get_Sinopse();?></p>
                            </div>

                            <div class="navbar-left col-md-8 col-lg-8">
                                <p>Faixa Etária: <?php echo $obra->get_FEtaria();?></p>
                            </div>

                            <?php
                            if($filme->get_Titulo()==$obra->get_Titulo()){
                            ?>
                                <?php 
                            }
                            if($serie->get_Titulo()==$obra->get_Titulo()){
                                ?>
                                <div class="panel-default panel navbar-right col-md-8 col-lg-8">
                                    <p>Adiciona info do seriado</p>
                                </div>
                                <?php 
                            }
                            if($_SESSION['logado']==1){
                                ?>
                                <div class="col-md-12 col-lg-12 col-sm-12"> 
                                    <button name="edit" type="submit" class="btn btn-default navbar-right">Editar</button>
                                    <button name="delete" type="submit" class="btn btn-default navbar-right">Excluir</button>
                                </div>
                                <?php
                            }
                            ?>
                        </form>
                    </div>
>>>>>>> origin/master
                </div>
            </div>
        </div>
    </div>
</div>
    
</body>
</html> 