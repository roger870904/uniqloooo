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
        <title>PHP File upload and download app</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="style2.css"/>

    </head>
    <body>
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
    </nav>

    <?php include 'filesLogic.php'?>
    <div class="container">
    
        <div class="row" align="center">
            <form action="index.php" method="post" enctype="multipart/form-data"  method="post" style="border: 5px solid; border-collapse: collapse; width:400px;background-color: rgba(255,255,204,0.7);" >
                <h3>檔案上傳</h3>
                <input type="file" id="input file"name="myfile",border="2"   style="border:1px solid;"><br>
                <font color="#FF0000">注意:檔案大小不可超過40MB!!!!!</font>
                <br>
                專案名稱:<input type="text"  name="projectname"><br>
                專案簡介:<input type="text" name="projectsummary"><br>
                <button type="submit" name="save"id="input button" onclick="return checkfile();">上傳</button>
                
                <script type="text/javascript"> 
                var maxsize = 40*1024*1024;//40M 
                var errMsg = "上傳的附件檔案不能超過40M！！！"; 
                var tipMsg = "您的瀏覽器暫不支援計算上傳檔案的大小，確保上傳檔案不要超過2M，建議使用IE、FireFox、Chrome瀏覽器。"; 
                var browserCfg = {}; 
                var ua = window.navigator.userAgent; 
                if (ua.indexOf("MSIE")>=1){ 
                browserCfg.ie = true; 
                }else if(ua.indexOf("Firefox")>=1){ 
                browserCfg.firefox = true; 
                }else if(ua.indexOf("Chrome")>=1){ 
                browserCfg.chrome = true; 
                } 
                function checkfile(){ 
                try{ 
                var obj_file = document.getElementById("input file"); 
                if(obj_file.value==""){ 
                window.alert("請先選擇上傳檔案"); 
                return; 
                } 
                var filesize = 0; 
                if(browserCfg.firefox || browserCfg.chrome ){ 
                filesize = obj_file.files[0].size; 
                }else if(browserCfg.ie){ 
                var obj_img = document.getElementById('input file'); 
                obj_img.dynsrc=obj_file.value; 
                filesize = obj_img.fileSize; 
                }else{ 
                window.alert(tipMsg); 
                return; 
                } 
                if(filesize==-1){ 
                return true; 
                }else if(filesize>maxsize){ 
                alert(errMsg);
                return false; 
                }else{ 
                return; 
                } 
                }catch(e){ 
                window.alert(e); 
                }
                } 
                </script>
            </form>

        </div>
</div>



<iframe id="loadarea" style="display:none;"></iframe><br />
<footer align="center">
  <p>Author: FCU IECS Graduation Project<br>
  <img src="https://www.iecs.fcu.edu.tw/static/image/IEET.2784cb489302.svg"   style="height: 90px;" alt="iecs-logo">
  <img src="https://www.iecs.fcu.edu.tw/static/image/logo_footer.d31a05bdf563.svg"  style="height: 65px;" alt="fcu-logo">
  <!--<a href="mailto:hege@example.com">hege@example.com</a>-->
  </p>
</footer>

    </body> 
      
</html>
