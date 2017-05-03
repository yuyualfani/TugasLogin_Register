<!DOCTYPE html>
<html lang="">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Title Page</title>

		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

		<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.2/html5shiv.min.js"></script>
			<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
		<![endif]-->
	</head>
	<body>
			<h1 class="text-center">Login Ke Sistem</h1>

<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

			<?php echo form_open('register');?> 
	
						<legend>Form title</legend>
						<?php echo validation_errors();?>
					
						<div class="form-group">
							<label for="username">Username</label>
							<input type="text" class="form-control" id="username" name="username"placeholder="Input field">
						</div>
						<div class="form-group">
							<label for="">Password</label>
							<input type="password" class="form-control" id="passowrd" name="password" placeholder="Input field">
						</div>
						<div class="form-group">
							<label for="">Konfirmasi Password Password</label>
							<input type="confpassword" class="form-control" id="confpassword" name="confpassword" placeholder="Input field">
						</div>
					
						
					
						<button type="submit" class="btn btn-primary">Submit</button>
					<?php echo form_close();?>
					</div>
			<a href="<?php echo site_url('login_con') ?>">Login</a>


		

		<!-- jQuery -->
		<script src="//code.jquery.com/jquery.js"></script>
		<!-- Bootstrap JavaScript -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
		<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
 		<script src="Hello World"></script>
	</body>
</html>