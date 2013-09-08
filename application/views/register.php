<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>WMS Site Builder</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="">
		<meta name="author" content="">

		<!-- CSS -->
		<link href="<?php echo base_url(); ?>assets/css/bootstrap.css" rel="stylesheet">	
		<link href="<?php echo base_url(); ?>css/combine_fonts.css" rel="stylesheet">	
		<link href="<?php echo base_url(); ?>css/buttons.css" rel="stylesheet">
		<link href="<?php echo base_url(); ?>style.css" rel="stylesheet">

		<!-- color style -->
		<link href="<?php echo base_url(); ?>css/dark.css" rel="stylesheet">

		<link href="<?php echo base_url(); ?>assets/css/bootstrap-responsive.css" rel="stylesheet">

		<!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
		<!--[if lt IE 9]>
			<script src="plugins/html5.js"></script>
		<![endif]-->
	</head>
	<body>
		<div class="container-fluid">
			<div class="row-fluid">
				<div class="well" style="width:40%;margin:auto auto;">
					<div class="navbar navbar-static navbar_as_heading">
						<div class="navbar-inner">
							<div class="container" style="width: auto;">
								<a class="brand">WMS Site Builder - register</a>

							</div>
						</div>
					</div>
				 <?php echo validation_errors(); ?>
					<form action="<?php echo base_url(); ?>user/regsubmit" method="post">
						<fieldset>
						<div class="control-group">
						<label class="control-label" for="prependedInput">Email:</label>
						<div class="controls">
						<div class="input-prepend">
						<span class="add-on"><i class="icon-large icon-star-empty"></i></span><input class="input-xlarge-fluid" name="email" id="email" size="16" type="text" placeholder="name@email.com">
						</div>
						</div>
						</div>

						<div class="control-group">
						<label class="control-label" for="prependedInput">Username:</label>
						<div class="controls">
						<div class="input-prepend">
						<span class="add-on"><i class="icon-large icon-user-1"></i></span><input class="input-xlarge-fluid" name="username" id="username" size="16" type="text" placeholder="Username">
						</div>
						</div>
						</div>


						<div class="control-group">
						<label class="control-label" for="prependedInput">Password:</label>
						<div class="controls">
						<div class="input-prepend">
						<span class="add-on"><i class="icon-large icon-lock-1"></i></span><input class="input-xlarge-fluid" name="password" id="password" size="16" type="password" placeholder="Password">
						</div>
						</div>
						</div>

						<div>
						<input type="submit" class="btn btn-large btn-primary" value="Register" >
						</div>
						</fieldset>
					</form>
				</div>
			</div>
		</div>
		<script src="<?php echo base_url(); ?>assets/js/jquery.js"></script>
		<script src="<?php echo base_url(); ?>assets/js/bootstrap.js"></script>	
	</body>
</html>