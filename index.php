<?php
if (!isset($_SESSION)) {
    session_start();
}

if (!isset ($_SESSION['name']))
{
header("refresh:0;url=login.html");
}
?>
<!DOCTYPE html>
<html>
<head>
		<meta charset="UTF-8">
		<title>Uniqloooo by FCU</title>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<!--[if lte IE 8]><script src="js/html5shiv.js"></script><![endif]-->
		<script src="js/jquery.min.js"></script>
		<script src="js/skel.min.js"></script>
		<script src="js/skel-layers.min.js"></script>
		<script src="js/init.js"></script>
		<noscript>
			<link rel="stylesheet" href="css/skel.css" />
			<link rel="stylesheet" href="css/style.css" />
			<link rel="stylesheet" href="css/style-xlarge.css" />
		</noscript>
	</head>
	<body class="landing">

		<!-- Header -->
			<header id="header">
				<h1><a href="index.html">Uniqloooo</a></h1>
				<nav id="nav">
					<ul>
						<li><a href="index.html">Home</a></li>
						<li><a href="generic.html">Generic</a></li>
						<li><a href="elements.html">Elements</a></li>
						<li><a href="login.html">Login</a></li>
						<li><a href="register.php" class="button special">Sign Up</a></li>
					</ul>
				</nav>
            </header>
            <section id="banner">
            <nav class="navbar navbar-inverse">
            <div class="container-fluid">
            <div class="navbar-header">
            <a class="navbar-brand" href="#"><imput type="button"onclick="location.href='index.php'" >首頁</a>
            </div>
            <ul class="nav navbar-nav">
            <!-- <li class="active"><a href="#">歷史紀錄</a></li> -->
            <li class="active"><a href="#"><imput type="button"onclick="location.href='history.php'" >歷史紀錄</a></li>
  
            </ul>
            <ul class="nav navbar-nav navbar-right">
            <li class="active"><a href="#">帳戶名稱:<?php echo $_SESSION['name'];?></a></li>
            <li><a href="#"><imput type="button"onclick="location.href='logout.php'" span class="glyphicon glyphicon-log-in"></span> 登出</a></li>
            </ul>
            </div>   
            </section>
    </body>


      
</html>
