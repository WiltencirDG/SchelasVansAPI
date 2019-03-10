<!doctype html>
<html lang="en">
    <header>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Schelas Vans Co.</title>
        <link rel="stylesheet" href="https://unpkg.com/purecss@1.0.0/build/pure-min.css" integrity="sha384-" crossorigin="anonymous">
        <link rel="stylesheet" href="https://unpkg.com/purecss@1.0.0/build/grids-responsive-min.css">
        <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
        <link rel="stylesheet" href="css/layouts/marketing.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
        
    </header>
    <body>
        <?php
        require_once ('php/Classes/Funcoes.class.php');
        require_once ('php/Classes/Usuario.class.php');

        $objFc = new Funcoes();
        $objUsr = new Usuario();

        if (isset($_POST['btCadastrar'])) {
            if ($objUsr->queryInsert($_POST) == 'ok') {
                header('location: index.php');
            } else {
                echo '<script type="text/javascript">alert("Erro ao cadastrar")</script>';
            }
        }
        ?>
        <?php include 'php/Header.php' ?>


        <div class="splash-container">
            <div class="splash">
                <h1 class="splash-head">Schelas Vans</h1>
                <p class="splash-subhead">
                    Você dirige. Nós processamos.
                </p>
                <div class="col-md-12">
                    <p>
                        <button id="passbtn" class="btn btn-light" data-toggle="collapse" href="#descepass" role="button" aria-expanded="false" aria-controls="descepass">
                            SOU PASSAGEIRO
                        </button>
                        <button id="motobtn" class="btn btn-light" data-toggle="collapse" href="#descemot" role="button" aria-expanded="false" aria-controls="descemot">
                            SOU MOTORISTA
                        </button>
                    </p>
                    <div class="collapse" id="descemot">
                        <div class="card card-body">
                            <p>Gere seus boletos no site, e gerencie sua conta<br>Você está sendo redirecionado.</p>
                        </div>
                    </div>
                    <div class="collapse" id="descepass">
                        <div class="card card-body">
                            <p>Gerencie seu dia a dia com mais conforto.<br>Você está sendo redirecionado.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="content-wrapper">
            <div class="content">
                <h2 class="content-head is-center">Excelência em gerenciamento de vans.</h2>

                <div class="pure-g">
                    <div class="l-box pure-u-1 pure-u-md-1-2 pure-u-lg-1-4">

                        <h3 class="content-subhead">
                            <i class="fa fa-rocket"></i>
                            Facil utilização
                        </h3>
                        <p>
                            Cadastre-se e ganhe um mês de adesão gratis por cortesia da Schelas Technologies
                        </p>
                    </div>
                    <div class="l-box pure-u-1 pure-u-md-1-2 pure-u-lg-1-4">
                        <h3 class="content-subhead">
                            <i class="fa fa-mobile"></i>
                            Interface intuitiva
                        </h3>
                        <p>
                            Facilidade de uso é quesito de prioridade no sistema Schelas Vans.
                        </p>
                    </div>
                    <div class="l-box pure-u-1 pure-u-md-1-2 pure-u-lg-1-4">
                        <h3 class="content-subhead">
                            <i class="fa fa-th-large"></i>
                            Banco de dados estável
                        </h3>
                        <p>
                            Você nunca ficará na mão quando mais precisar.
                        </p>
                    </div>
                    <div class="l-box pure-u-1 pure-u-md-1-2 pure-u-lg-1-4">
                        <h3 class="content-subhead">
                            <i class="fa fa-check-square-o"></i>
                            Consulte os pacotes
                        </h3>
                        <p>
                            Com planos que vão para desde pequenos empresários até grandes corporações.
                        </p>
                    </div>
                </div>
            </div>

            <div class="ribbon l-box-lrg pure-g">
                <div class="l-box-lrg is-center pure-u-1 pure-u-md-1-2 pure-u-lg-2-5">
                    <img width="300" alt="File Icons" class="pure-img-responsive" src="img/common/file-icons.png">
                </div>
                <div class="pure-u-1 pure-u-md-1-2 pure-u-lg-3-5">

                    <h2 class="content-head content-head-ribbon">Qualidade de desenvolvimento.</h2>

                    <p>
                        Desenvolvido com as técnicas mais seguras e estáveis, o sistema Schelas Vans conta com 99.9% de tempo de atividade, mostrando que estabilidade é um quesito de prioridade.
                    </p>
                </div>
            </div>

            <div class="content">
                <h2 class="content-head is-center">Crie sua conta gratis.</h2>

                <div class="pure-g">
                    <div class="l-box-lrg pure-u-1 pure-u-md-3-5">
                        <h4>Fale conosco</h4>
                        <p>
                            Envie um e-mail com dúvidas e sugestões. Nossa equipe estará disposta a sanar qualquer dúvida
                        </p>

                        <h4>Mais informações</h4>
                        <p>
                            E-mail: schelasvansco@gmail.com<br>
                            Fone: 0800 666 6666 
                        </p>
                    </div>
                    <div class="l-box-lrg pure-u-1 pure-u-md-2-5">
                        <form class="pure-form pure-form-stacked" method="post">
                            <fieldset>

                                <label for="name">Seu nome</label>
                                <input id="name" name="nome" type="text" placeholder="Seu nome">


                                <label for="email">Seu E-mail</label>
                                <input id="email" name="email" type="email" placeholder="Seu E-mail">

                                <label for="password">Sua senha</label>
                                <input id="password" name="senha"type="password" placeholder="Sua senha">


                                <button type="submit" class="pure-button" name="btCadastrar">Cadastrar</button>
                            </fieldset>
                        </form>
                    </div>

                </div>

            </div>

            
        </div>

        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
        <script src="js/index.js"></script>
    </body>

    <footer>
        <?php require_once('php/Footer.php'); ?>
    </footer>
</html>
