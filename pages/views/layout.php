    <?php
    session_start();
    if(!isset($_SESSION["l_session"])) {
        header('Location: index.php');
    }
    //se clicco su logout elimino la sessione e ritorno a index.php
    if(isset($_GET['mod'])){
        session_destroy();
        header('Location: index.php');
    }
    require_once 'includes.php';
    ?>


    <!DOCTYPE html>
    <html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Pannello di amministrazione</title>


    </head>

    <body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <img src="img/logo.png"/>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-center">
                <a class="navbar-brand" href="?controller=pages&action=home">Pannello di amministrazione</a>
            </ul>


            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li>
                            <a href="?controller=pages&action=home"><i class="fa fa-dashboard fa-fw"></i> Cruscotto</a>
                        </li>
                        <li>
                            <a href="teoria.php"><i class="fa fa-laptop fa-fw"></i> Teoria</a>
                        </li>
                        <li>
                            <a href="?controller=courses&action=show&type=sam"><i class="fa fa-medkit fa-fw"></i> Soccorritore</a>
                        </li>
                        <li>
                            <a href="?controller=courses&action=show&type=sen"><i class="fa fa-car fa-fw"></i> Sensibilizzazione</a>
                        </li>
                        <li>
                            <a href="?controller=courses&action=show&type=mot"><i class="fa fa-motorcycle"></i> Corso Moto</a>
                        </li>
                        <li>
                            <a href="?controller=members&action=show"><i class="fa fa-users"></i> Allievi</a>
                        </li>
                        <li>
                            <a href="annunci.php"><i class="fa glyphicon-pencil fa-fw"></i> Annunci sul sito</a>
                        </li>
                        <li>
                            <a href="statistiche.php"><i class="fa fa-bar-chart-o fa-fw"></i> Statistiche</a>
                        </li>
                        <li>
                            <a href="impostazioni.php"><i class="fa fa-gear fa-fw"></i> Impostazioni</a>
                        </li>
                        <li>
                            <a href="?controller=instructors&action=logout"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>



                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>

        <div id="page-wrapper">

                <?php require_once('routes.php'); ?>

        </div>
        <!-- /#page-wrapper -->
    </div>
    <!-- /#wrapper -->






    </body>

    </html>