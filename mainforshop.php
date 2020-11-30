<?php
session_start();
?>
<!DOCTYPE html>

<!--
	Transit by TEMPLATED
	templated.co @templatedco
	Released for free under the Creative Commons Attribution 3.0 license (templated.co/license)
-->
<html lang="en">
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
	<body class="landing">

		<!-- Header -->
			<header id="header">
				<h1><a href="index.php">Uniqloooo</a></h1>
				<nav id="nav">
					<ul>
						<li><a href="index.php">首頁</a></li>
						<li><a href="generic.html">暫定</a></li>
						<li><a href="elements.html">暫定</a></li>
						<?php
                        if(!isset ($_SESSION['name']))
                        {
                            echo '<li><a href="login.html">Login</a></li>';
                            
						    echo '<li><a href="registerforcustomer.html" class="button special">Sign Up</a></li>';
                        }
						else{
                            echo '<li class="active"><a href="#">帳戶名稱:'.$_SESSION['name'].'</a></li>';
						    echo '<li><a href="logout.php">logout</a></li>';
                        }
						?>
					</ul>
				</nav>
            </header>
            <section id="banner">
            </section>
    </body>
</html>