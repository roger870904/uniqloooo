<?php include('process.php') ?>
<html>

<head>
  <title>註冊</title>
  <link rel="stylesheet" href="style.css">
</head>
			<body>
  					<form method="post" action="register.php" id="register_form" align="center">	
  					<h1><font color="white">註冊</font></h1>
  						<div <?php if (isset($name_error)): ?> class="form_error" <?php endif ?> >
	  					<input type="text" name="username"  placeholder="Username" value="<?php echo $username; ?>">
	  						<?php if (isset($name_error)): ?>
	  						<span><?php echo $name_error; ?></span>
	  						<?php endif ?>
  						</div>
  					<div <?php if (isset($email_error)): ?> class="form_error" <?php endif ?> >
      				<input type="email" name="email" placeholder="Email" value="<?php echo $email; ?>">
      					<?php if (isset($email_error)): ?>
      					<span><?php echo $email_error; ?></span>
      					<?php endif ?>
  					</div>
  					<div>
  						<input type="password"  placeholder="Password" name="password">
	  				</div>
	
  					<div>
  						<button type="submit" name="register" id="reg_btn">註冊</button>
  					</div>
  					</form>
	  		</body> 
			
			  


</html>