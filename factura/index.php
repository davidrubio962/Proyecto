<?php 
session_start();
include('header.php');
$loginError = '';
if (!empty($_POST['email']) && !empty($_POST['pwd'])) {
	include 'Invoice.php';
	$invoice = new Invoice();
	$user = $invoice->loginUsers($_POST['email'], $_POST['pwd']); 
	if(!empty($user)) {
		$_SESSION['user'] = $user[0]['first_name']."".$user[0]['last_name'];
		$_SESSION['userid'] = $user[0]['id'];
		$_SESSION['email'] = $user[0]['email'];		
		$_SESSION['address'] = $user[0]['address'];
		$_SESSION['mobile'] = $user[0]['mobile'];
		header("Location:invoice_list.php");
	} else {
		$loginError = "Invalid email or password!";
	}
}
?>
<div style='
position: absolute;
	margin:10% auto;
	height: 40%;
	left: 32%;
	width:70%;'>

	<title>Entrada administratiba</title>

<body background="images/fondo.jpg">
        
<script src="js/invoice.js"></script>
<link href="../css/estilos.css" type="text/css" rel="stylesheet">
 
<div class="row">	
  <div class="col-xs-6">
  

<div class="login-form">
<form action="" method="post">
		<div class="heading">
			<h2 style="text-align: center;">Entrada Adminsitrativa InnoBar</h2>
		</div>
    <h2 class="text-center">Iniciar Sesión</h2>  
<div class="form-group">
<?php if ($loginError ) { ?>
<div class="alert alert-warning"><?php echo $loginError; ?></div>
<?php } ?>
</div>         

<div class="form-group">
    <input name="email" id="email" type="email" class="form-control" placeholder="Correo Electronico" autofocus required>
</div>
<div class="form-group">
    <input type="password" class="form-control" name="pwd" placeholder="Contraseña" required>
</div> 
<div class="form-group">
    <button type="submit" name="login" class="btn btn-primary" style="width: 100%;"> Acceder </button>
</div>
<div class="clearfix">
<label class="pull-left checkbox-inline"><input type="checkbox"> Recordarme</label>
</div>        
</form>
</div>   </div>";


</div>
<div class="col-xs-6">-</div>	
</div>		
</div>
</body>

<?php include('footer.php');?>