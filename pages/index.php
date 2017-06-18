<?php
session_start();
require_once 'includes.php';
require_once 'model/instructors_model.php';
$l_error="";
$ins = new Instructor();
if($ins->is_loggedin()!="")
{
    $ins->redirect('principale.php');
}

if (isset($_POST["l_password"])&&isset($_POST["l_username"]))
{
    $username = addslashes(strtoupper($_POST["l_username"]));
    $pass = md5($_POST["l_password"]);

    if($ins->login($username,$pass))
    {
        //echo($username.$pass);
        $ins->redirect('principale.php');
    }
    else
    {
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



</head>

<body>
	<form method="post" id="l_form" action="index.php">
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


</body>
</html>