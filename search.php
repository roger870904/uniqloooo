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
<html>

<head>
    <meta charset="UTF-8">
    <title>Uniqloooo by FCU</title>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <!--[if lte IE 8]><script src="js/html5shiv.js"></script><![endif]-->
    <link rel="stylesheet" href="css/skel.css" />
    <link rel="stylesheet" href="css/style-xlarge.css" />
    <link rel="stylesheet" href="css/style.css" />
</head>
<title>查詢</title>

<style>
  
    .wrapper {
        margin: 140px 0 140px auto;
        width: 884px;
    }
    
    .loginBox {
        background-color: #F0F4F6;
        /*上divcolor*/
        border: 1px solid #BfD6E1;
        border-radius: 5px;
        color: #444;
        font: 14px 'Microsoft YaHei', '微軟雅黑';
        margin: 0 auto;
        position: absolute;
        left: 50%;
        top: 50%;
        margin-top: -150px;
        margin-left: -150px;
        width: 388px
    }
    
    .loginBox .loginBoxCenter {
        border-bottom: 1px solid #DDE0E8;
        padding: 24px;
    }
    
    .loginBox .loginBoxCenter p {
        margin-bottom: 10px
    }
    
    .loginBox .loginBoxButtons {
        /*background-color: #F0F4F6;*/
        /*下divcolor*/
        border-top: 0px solid #FFF;
        border-bottom-left-radius: 5px;
        border-bottom-right-radius: 5px;
        line-height: 28px;
        overflow: hidden;
        padding: 20px 24px;
        vertical-align: center;
        filter: alpha(Opacity=80);
        -moz-opacity: 0.5;
        
    }
    
    .loginBox .loginInput {
        border: 1px solid #D2D9dC;
        border-radius: 2px;
        color: #444;
        font: 12px 'Microsoft YaHei', '微軟雅黑';
        padding: 8px 14px;
        margin-bottom: 8px;
        width: 310px;
    }
    
    .loginBox .loginInput:FOCUS {
        border: 1px solid #B7D4EA;
        box-shadow: 0 0 8px #B7D4EA;
    }
    
    .loginBox .loginBtn {
        background-image: -moz-linear-gradient(to bottom, blue, #29a9e0);
        border: 1px solid #98CCE7;
        border-radius: 20px;
        box-shadow: inset rgba(255, 255, 255, 0.6) 0 1px 1px, rgba(0, 0, 0, 0.1) 0 1px 1px;
        color: #444;
        /*登入*/
        cursor: pointer;
        float: right;
        font: bold 13px Arial;
        padding: 10px 50px;
    }
    
    .loginBox .loginBtn:HOVER {
        background-image: -moz-linear-gradient(to top, blue, #85CFEE);
    }
    
    .loginBox a.forgetLink {
        color: #ABABAB;
        cursor: pointer;
        float: right;
        font: 11px/20px Arial;
        text-decoration: none;
        vertical-align: middle;
        /*忘記密碼*/
    }
    
    .loginBox a.forgetLink:HOVER {
        color: #000000;
        text-decoration: none;
        /*忘記密碼*/
    }
    
    .loginBox input#remember {
        vertical-align: middle;
    }
    
    .loginBox label[for="remember"] {
        font: 11px Arial;
    }
</style>

			<body>
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
                <?php
                //echo "123";
                if (isset($_POST['search'])) {
                $type=$_POST['categories'];
                $name=$_POST['commodity'];
                $n="商品名稱:";
                $t="類別:";
                $r="已被預購數量:";
                $num="剩餘商品數量";
                $s="店家名稱:";
                if($name!=null){
                    $sql="SELECT id,name,type,reserve,number,shopname FROM commodity WHERE type='$type' AND name='$name'";
                    $result = mysqli_query($con,$sql) ;
                    echo '<table style=" width:1080px;">';
                    if($result == FALSE) {
                        die( mysqli_error($con)); // TODO: better error handling
                    }
                    else{
                        while($row=mysqli_fetch_array($result,MYSQLI_ASSOC))
                        {
                            echo '<tr>';
                            echo '<td width="100">';
                            echo '<h1 align=left >'.$n.$row['name'].$t.$row['type'].$r.$row['reserve'].$num.$row['number'].$s.$row['shopname'].'</h1><br>';
                            if($row['number'] > 0){
                                echo '<a href="order.php?id='.$row['id'].'">訂購';
                            }
                            echo '</td>';
                            echo '</tr>';
                            echo '</form>';
                        }
                        echo '</table>';
                    }
                }
                else{
                $sql="SELECT id,name,type,reserve,number,shopname FROM commodity WHERE type='$type'";
                $result = mysqli_query($con,$sql) ;
                echo '<table style=" width:1080px;">';
                if($result == FALSE) {
                    die( mysqli_error($con)); // TODO: better error handling
                }
                else{
                    while($row=mysqli_fetch_array($result,MYSQLI_ASSOC))
                    {
                        echo '<tr>';
                        echo '<td width="100">';
                        echo '<h1 align=left >'.$n.$row['name'].$t.$row['type'].$r.$row['reserve'].$num.$row['number'].$s.$row['shopname'].'</h1><br>';
                        if($row['number'] > 0){
                            echo '<a href="order.php?id='.$row['id'].'">訂購';
                        }
                        
                        //若有庫存 才顯示訂購按鈕
                        echo '</td>';
                        echo '</tr>';
                    }
                    echo '</table>';
                    
                }
                }
                }
        ?>
        
            </body> 
		</html>