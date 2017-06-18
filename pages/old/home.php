<?php
//controllo che un utente non loggato non entri direttamente in questa pagina (controllo la sessione)
session_start();
  if(!isset($_SESSION["l_session"])) {
     header('Location: index.php');
  }
  //se clicco su logout elimino la sessione e ritorno a index.php
  if(isset($_GET['mod'])){
	  session_destroy();
	  header('Location: index.php');
  }
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

    <!-- Bootstrap Core CSS -->
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="../vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="../vendor/morrisjs/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

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
				<a class="navbar-brand" href="home.php">Pannello di amministrazione</a>
            </ul>
           

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li>
                            <a href="home.php"><i class="fa fa-dashboard fa-fw"></i> Cruscotto</a>
                        </li>
                         <li>
                            <a href="teoria.php"><i class="fa fa-laptop fa-fw"></i> Teoria</a>
                        </li>
                        <li>
                            <a href="soccorritore.php"><i class="fa fa-medkit fa-fw"></i> Soccorritore</a>
                        </li>
                        <li>
                            <a href="sensibilizzazione.php"><i class="fa fa-car fa-fw"></i> Sensibilizzazione</a>
                        </li>
                        <li>
                            <a href="moto.php"><i class="fa fa-maxcdn fa-fw"></i> Corso Moto</a>
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
                            <a href="home.php?mod=logout"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>         
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Cruscotto</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
				
				<div class="col-lg-12">
                    <div class="panel panel-default">
                        
                        <div class="panel-body">
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs">
                                <li class="active"><a href="#messaggi" data-toggle="tab">Messaggi</a>
                                </li>
                                <li><a href="#profilo" data-toggle="tab">Profilo</a>
                                </li>
                            </ul>

                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div class="tab-pane fade in active" id="messaggi">
                                    <h4>Messaggi</h4>
										<div class="panel-body">
											<table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
												<thead>
													<tr>
														<th>Allievo</th>
														<th>Messaggio</th>
														<th>Inviato il</th>
													</tr>
												</thead>
												<tbody>
													<?php
													include_once("model/members_model.php");
													include_once("model/messages_model.php");
													
													$mess = Message::getMessagesByType(1);
													$member=new Member();

													//echo "<pre>"; print_r($mess); echo "</pre>";

													if (count($mess) > 0) {

														foreach($mess as $mm) {
															echo "<tr class='odd gradeX'><td>".$mm->msg_mem_full."</td><td>" . $mm->msg_text. " </td><td> " . date('d-m-Y H:i:s', $mm->msg_ts). "</td></tr>";
														}
													} 
													else {
														echo "<tr class='odd gradeX'><td>Nessun messaggio irrisolto.</td><td></td><td><td></td><td></tr>";
													}
													?>
	
												</tbody>
											</table>
											<!-- /.table-responsive -->
										</div>
										<!-- /.panel-body -->
                                    
                                    
                                    
                                </div>
                                <div class="tab-pane fade" id="profilo">
                                    <h4>Profilo</h4>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                                </div>
                                <div class="tab-pane fade" id="messages">
                                    <h4>Messages Tab</h4>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                                </div>
                                <div class="tab-pane fade" id="settings">
                                    <h4>Settings Tab</h4>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                                </div>
                            </div>
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-6 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="../vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../vendor/metisMenu/metisMenu.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="../vendor/raphael/raphael.min.js"></script>
    <script src="../vendor/morrisjs/morris.min.js"></script>
    <script src="../data/morris-data.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>
    
        <!-- DataTables JavaScript -->
    <script src="../vendor/datatables/js/jquery.dataTables.min.js"></script>
    <script src="../vendor/datatables-plugins/dataTables.bootstrap.min.js"></script>
    <script src="../vendor/datatables-responsive/dataTables.responsive.js"></script>


    <!-- Page-Level Demo Scripts - Tables - Use for reference -->
    <script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
            responsive: true
        });
    });
    </script>

</body>

</html>
