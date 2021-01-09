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
 else{
     $_SESSION['identity']='customer';
     echo "<script> {window.alert('訂購失敗請先登入');location.href='login.html'} </script>";
     exit();
 }
 }
 if(isset($_POST['buy'])){
     if(!sesion_start())
     $id=$_POST['id'];
     //echo $id;
     $Recipient=$_POST['Recipient'];
     $address=$_POST['address'];
     $amount=$_POST['amount'];
     $username=$_SESSION['name'];
     $sql="SELECT name,type,shopname,number FROM commodity WHERE id=$id";
     $result = mysqli_query($con,$sql);
    while($row=mysqli_fetch_array($result,MYSQLI_ASSOC))
    {
        $commodity=$row['name'];
        $type=$row['type'];
        $shopname=$row['shopname'];
        $number=$row['number'];
    }
     //echo $commodity.$type.$shopname;
     //echo 'R='.$Recipient.'A='.$address.'AM='.$amount."U=".$username;
     if($number-$amount>=0){
     $sql="UPDATE commodity SET reserve=reserve+$amount WHERE id='$id'";
     mysqli_query($con,$sql) ;
     $sql="UPDATE commodity SET number=number-$amount WHERE id='$id'";
     mysqli_query($con,$sql) ;
     $sql = "INSERT INTO oorders (username, Recipient, address, commodity, type, shopname, amount, date) 
        VALUES ('$username', '$Recipient', '$address','$commodity','$type','$shopname','$amount',curdate())";
     $results = mysqli_query($con, $sql);
     echo "<script> {window.alert('訂購成功按下確認後跳轉');location.href='mainforcustomer.php'} </script>"; 
     }
     else
     {
        echo "<script> {window.alert('庫存不足');location.href='mainforcustomer.php'} </script>";
     }
     exit();

 }
?>