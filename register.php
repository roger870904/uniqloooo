<!doctype html>
<html lang="en">
<head>
<meta charset="UTF-8">
<head>
    <meta charset="UTF-8">
    <title>Uniqloooo by FCU</title>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <!--[if lte IE 8]><script src="js/html5shiv.js"></script><![endif]-->
    <link rel="stylesheet" href="css/skel.css" />
    <link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" href="css/style-xlarge.css" />
</head>
<title>註冊</title>

<body>
    <header id="header">
        <h1><a href="index.html">Uniqloooo</a></h1>
        <nav id="nav">
            <ul>
                <li><a href="index.html">首頁</a></li>
                <li><a href="generic.html">暫定</a></li>
                <li><a href="elements.html">暫定</a></li>
                <li><a href="login.html">登入</a></li>
                
            </ul>
        </nav>
	</header>
	<?php include"process.php";?>
	<form method="post" action="register.php" id="register_form" align="center">	
  			<h1><font color="white">註冊帳號</font></h1>
  			<div <?php if (isset($name_error)): ?> class="form_error" <?php endif ?> >
	  		<input type="text" name="username"  placeholder="Username" value="<?php $username="";echo $username; ?>">
	  			<?php if (isset($name_error)): ?>
	  			<span><?php echo $name_error; ?></span>
	  			<?php endif ?>
  			</div>
  			<div <?php if (isset($email_error)): ?> class="form_error" <?php endif ?> >
      			<input type="email" name="email" placeholder="Email" value="<?php $email=""; echo $email; ?>">
      				<?php if (isset($email_error)): ?>
      				<span><?php echo $email_error; ?></span>
      				<?php endif ?>
  			</div>
  			<div>
  				<input type="password"  placeholder="Password" name="password">
	  		</div>
            <div>
            <select name="identity">
                <option value=""selected>請選擇您的身分</option>
                <option value="Store">我是店家</option>
                <option value="Normal" >我是一般使用者</option>
            </select>
		  	</div>	
  			<div>
  				<button type="submit" name="register" id="reg_btn">註冊帳號</button>
  			</div>
  		</form>				    
	</body> 		
</html>