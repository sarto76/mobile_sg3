<?php 
    session_start();
//error_reporting(E_ALL); ini_set('display_errors', 'On'); 
	$l_error="";
	// Login
	if (isset($_POST["l_password"])&&isset($_POST["l_username"])) {
	
	// Include scripts
	require_once("connection.php");
	$connection= new Database();
		$codestr="";
	// Generate Random Code
	for ($i = 1; $i <= 12; $i++) {
		$textornumber = rand(1,2);
		if ($textornumber == 1) {
			$codestr .= chr(rand(48,57));
		}
		if($textornumber == 2) {
			$codestr .= chr(rand(65,90));
		}
	}
	// Proceed
	$username = addslashes(strtoupper($_POST["l_username"]));
	$pass = md5($_POST["l_password"]);
	
	$sql = 'SELECT * FROM instructors WHERE ins_init=:username AND ins_pass=:pass';
	
	$result=$connection->prepare($sql);
	$result->bindParam(':username', $username, PDO::PARAM_STR);
	$result->bindParam(':pass', $pass, PDO::PARAM_STR);

	$result->execute();
	//$result->debugDumpParams();
	
	//$result->store_result();
	$righe = $result->fetchColumn();
	//echo "righe ".$righe;
	$result=null;
	
	if ($righe >0) {
		
		$l_code = time()."_".$codestr;
		$_SESSION["l_session"] = $l_code;
		$connection->query("UPDATE instructors SET ins_session = '$l_code' WHERE ins_init = '$username'");
		header('Location:home.php');
	    exit;
	    
		
	}
	else {
		//$l_error = "Utente o password non corretti";
		$l_error ='<div class="alert alert-danger">Utente o password non corretti</div>'; 
	}
	
	
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

    <title>Scuolaguida Tre- Pagina di login</title>

    <!-- Bootstrap Core CSS -->
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="../vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">

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
	<form method="post" id="l_form" action="login.php">
		<div class="container">
			<div class="row">
				<div class="col-md-4 col-md-offset-4">
					<div class="login-panel panel panel-default">
						<div class="panel-heading">
							<h3 class="panel-title">Pagina di login</h3>
						</div>
						<div class="panel-body">
							<form role="form">
								<fieldset>
									<div class="form-group">
										<input class="form-control" placeholder="username" name="l_username" id="l_username" autofocus>
									</div>
									<div class="form-group">
										<input class="form-control" placeholder="Password" name="l_password" id="l_password" type="password" value="">
									</div>
									<div class="checkbox">
										<label>
											<input name="remember" type="checkbox" value="Remember Me">Ricorda
										</label>
									</div>
									<input type="submit" class="btn btn-lg btn-success btn-block" value="Accedi"/>
									<div class="panel-body">
										<?php echo $l_error;?>
										
									</div>
								</fieldset>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</form>
    <!-- jQuery -->
    <script src="../vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../vendor/metisMenu/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>

</body>

</html>
