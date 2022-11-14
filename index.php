	<?php 
	session_start();

	require 'confiq/function.php';

	?>

<!DOCTYPE html>
<html>
<head>
	<title>Login Page</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="Assets/images/icons/favicon.ico?v=<?= time();?>"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="Asset/svendor/bootstrap/css/bootstrap.min.css?v=<?= time();?>">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="Assets/fonts/font-awesome-4.7.0/css/font-awesome.min.css?v=<?= time();?>">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="Assets/fonts/Linearicons-Free-v1.0.0/icon-font.min.css?v=<?= time();?>">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="Assets/vendor/animate/animate.css?v=<?= time();?>">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="Assets/vendor/css-hamburgers/hamburgers.min.css?v=<?= time();?>">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="Assets/vendor/animsition/css/animsition.min.css?v=<?= time();?>">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="Assets/vendor/select2/select2.min.css?v=<?= time();?>">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="Assets/vendor/daterangepicker/daterangepicker.css?v=<?= time();?>">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="Assets/css/util.css?v=<?= time();?>">
	<link rel="stylesheet" type="text/css" href="Assets/css/main.css?v=<?= time();?>">
<!--===============================================================================================-->
<body>
	
		

	
	<div class="limiter">
		<div class="container-login100" style="background-image: url('Assets/images/bg-01.jpg');">
			<div class="wrap-login100 p-t-30 p-b-50">
			
		
		
				<span class="login100-form-title p-b-41">
					Account Login
				</span>
				<form class="login100-form validate-form p-b-33 p-t-5" action="confiq/ceklogin.php" method="POST"> 
				<?php 
		
		if(isset($_GET['pesan'])){
			if($_GET['pesan']=="gagal"){
				echo "<script>
				alert('Username / Password Salah !');
				;
				</script>";
			}
		}

		?>
					<div class="wrap-input100 validate-input" data-validate = "Enter username">
						<input class="input100" type="text" name="username" placeholder="User name" require>
						<span class="focus-input100" data-placeholder="&#xe82a;"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Enter password">
						<input class="input100" type="password" name="password" placeholder="Password" require>
						<span class="focus-input100" data-placeholder="&#xe80f;"></span>
					</div>

					<div class="container-login100-form-btn m-t-32">
						<button type="submit" class="login100-form-btn" name="login">
							Login
						</button>
					</div>

				</form>
			</div>
		</div>
	</div>
<!--===============================================================================================-->	
<link rel="icon" type="image/png" href="Assets/images/icons/favicon.ico?v=<?= time();?>"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="Assets/vendor/bootstrap/css/bootstrap.min.css?v=<?= time();?>">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="Assets/fonts/font-awesome-4.7.0/css/font-awesome.min.css?v=<?= time();?>">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="Assets/fonts/Linearicons-Free-v1.0.0/icon-font.min.css?v=<?= time();?>">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="Assets/vendor/animate/animate.css?v=<?= time();?>">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="Assets/vendor/css-hamburgers/hamburgers.min.css?v=<?= time();?>">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="Assets/vendor/animsition/css/animsition.min.css?v=<?= time();?>">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="Assets/vendor/select2/select2.min.css?v=<?= time();?>">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="Assets/vendor/daterangepicker/daterangepicker.css?v=<?= time();?>">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="Assets/css/util.css?v=<?= time();?>">
	<link rel="stylesheet" type="text/css" href="Assets/css/main.css?v=<?= time();?>">
<!--===============================================================================================-->

</body>
</html>