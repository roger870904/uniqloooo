<?php
include("connect.php");
if (!isset($_SESSION)) {
	if(!session_start()){
	$username=$_SESSION['name'];
	$sql="SELECT identity FROM user WHERE username='$username'";
	$result=mysqli_query($con,$sql);
	if(!$result)
	{
		echo ("Error: ".mysqli_error($con));
		exit();
	}
	while($row=mysqli_fetch_array($result,MYSQLI_ASSOC))
	{
		$_SESSION['identity']=$row['identity'];
	}
	//echo $_SESSION['identity'];
}
}
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
	<body>

		<!-- Header -->
			<header id="header">
				<h1><a href="index.php">Uniqloooo</a></h1>
				<nav id="nav">
				<ul>
						<li><a href="index.php">首頁</a></li>
                        <?php
                        if(!isset ($_SESSION['name']))
                        {
                            echo '<li><a href="login.html">Login</a></li>';
                            
						    echo '<li><a href="registerforcustomer.html" class="button special">Sign Up</a></li>';
                        }
						else{
							if($_SESSION['identity']=='customer')
							{
								echo '<li><a href="history.php">歷史紀錄</a></li>';
								echo '<li class="active"><a href="#">帳戶名稱:'.$_SESSION['name'].'</a></li>';
						    	echo '<li><a href="logout.php">logout</a></li>';		
							}
							else{
								echo '<li><a href="elements.php">我的商品</a></li>';
								echo '<li class="active"><a href="#">帳戶名稱:'.$_SESSION['name'].'</a></li>';
						    	echo '<li><a href="logout.php">logout</a></li>';		
							}
                            
                        }
						?>
							
					</ul>
				</nav>
			</header>

		<!-- Main -->
			<section id="main" class="wrapper">
				<div class="container" align=center>

					<header class="major" >
                        <h2>我的商品</h2>
                        <?php
                        $n="商品名稱:";
                        $t="類別:";
                        $r="已被預購數量:";
                        $num="剩餘商品數量";
                        $s="店家名稱:";
                        $sql="SELECT id,name,type,reserve,number,shopname FROM commodity WHERE shopname='".$_SESSION['name']."'";
                        $result = mysqli_query($con,$sql) ;
                        echo '<table style=" width:1080px;">';
                        if($result == FALSE) {
                            die( mysqli_error($con)); // TODO: better error handling
                        }
                        while($row=mysqli_fetch_array($result,MYSQLI_ASSOC))
                        {
                            echo '<tr>';
                            echo '<td width="100">';
                            echo '<h1 align=center >'.$n.$row['name'].$t.$row['type'].$r.$row['reserve'].$num.$row['number'].$s.$row['shopname'].'</h1><br>';
							//-echo '<input type="button" value="修改數量" onclick="location.href="要前往的網頁連結"">';
							echo '<a href="revise.php?id='.$row['id'].'">修改數量';//-
                            echo '</td>';
                            
                            echo '</tr>';
                        }
                        echo '</table>';
                        ?>
					</header>
            </section>
		<!-- Footer -->
			<footer id="footer">
				<div class="container">
					<section class="links">
						<div class="row">
							<section class="3u 6u(medium) 12u$(small)">
								<h3>Lorem ipsum dolor</h3>
								<ul class="unstyled">
									<li><a href="#">Lorem ipsum dolor sit</a></li>
									<li><a href="#">Nesciunt itaque, alias possimus</a></li>
									<li><a href="#">Optio rerum beatae autem</a></li>
									<li><a href="#">Nostrum nemo dolorum facilis</a></li>
									<li><a href="#">Quo fugit dolor totam</a></li>
								</ul>
							</section>
							<section class="3u 6u$(medium) 12u$(small)">
								<h3>Culpa quia, nesciunt</h3>
								<ul class="unstyled">
									<li><a href="#">Lorem ipsum dolor sit</a></li>
									<li><a href="#">Reiciendis dicta laboriosam enim</a></li>
									<li><a href="#">Corporis, non aut rerum</a></li>
									<li><a href="#">Laboriosam nulla voluptas, harum</a></li>
									<li><a href="#">Facere eligendi, inventore dolor</a></li>
								</ul>
							</section>
							<section class="3u 6u(medium) 12u$(small)">
								<h3>Neque, dolore, facere</h3>
								<ul class="unstyled">
									<li><a href="#">Lorem ipsum dolor sit</a></li>
									<li><a href="#">Distinctio, inventore quidem nesciunt</a></li>
									<li><a href="#">Explicabo inventore itaque autem</a></li>
									<li><a href="#">Aperiam harum, sint quibusdam</a></li>
									<li><a href="#">Labore excepturi assumenda</a></li>
								</ul>
							</section>
							<section class="3u$ 6u$(medium) 12u$(small)">
								<h3>Illum, tempori, saepe</h3>
								<ul class="unstyled">
									<li><a href="#">Lorem ipsum dolor sit</a></li>
									<li><a href="#">Recusandae, culpa necessita nam</a></li>
									<li><a href="#">Cupiditate, debitis adipisci blandi</a></li>
									<li><a href="#">Tempore nam, enim quia</a></li>
									<li><a href="#">Explicabo molestiae dolor labore</a></li>
								</ul>
							</section>
						</div>
					</section>
					<div class="row">
						<div class="8u 12u$(medium)">
							<ul class="copyright">
								<li>&copy; Untitled. All rights reserved.</li>
								<li>Design: <a href="http://templated.co">TEMPLATED</a></li>
								<li>Images: <a href="http://unsplash.com">Unsplash</a></li>
							</ul>
						</div>
						<div class="4u$ 12u$(medium)">
							<ul class="icons">
								<li>
									<a class="icon rounded fa-facebook"><span class="label">Facebook</span></a>
								</li>
								<li>
									<a class="icon rounded fa-twitter"><span class="label">Twitter</span></a>
								</li>
								<li>
									<a class="icon rounded fa-google-plus"><span class="label">Google+</span></a>
								</li>
								<li>
									<a class="icon rounded fa-linkedin"><span class="label">LinkedIn</span></a>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</footer>

	</body>
</html>