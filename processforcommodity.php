<?php
 include('connect.php');
 if (!isset($_SESSION)) {
    session_start();
}
 $reserve = 0;
 $shop = '';
 if(isset($_POST['add'])){
     $commodity = $_POST['commodity'];
     $categories = $_POST['categories'];
     $number = $_POST['number'];
     $shop = $_SESSION['name'];
     //echo "$commodity $categories $number $shop";
     $query = "INSERT INTO commodity (name,type, reserve, number, shopname) VALUES ('$commodity','$categories', '$reserve', '$number', '$shop')";
     $result = mysqli_query($con, $query);
     echo "<script> {window.alert('新增成功按下確認後跳轉');location.href='mainforshop.php'} </script>"; 
     exit();

 }
?>