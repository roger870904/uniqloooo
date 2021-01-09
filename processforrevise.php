<?php
 include('connect.php');
 if (!isset($_SESSION)) {
    session_start();
}
 if(isset($_POST['revise'])){
     $id=$_POST['id'];
     //echo $id;

     $amount=$_POST['amount'];
     $username=$_SESSION['name'];
     $sql="SELECT name,type,shopname,number FROM commodity WHERE id=$id";
     $result = mysqli_query($con,$sql);
    /*
     while($row=mysqli_fetch_array($result,MYSQLI_ASSOC))
    {
        $commodity=$row['name'];
        $type=$row['type'];
        $shopname=$row['shopname'];
        $number=$row['number'];
    }
    *///--
     //echo $commodity.$type.$shopname;
     //echo 'R='.$Recipient.'A='.$address.'AM='.$amount."U=".$username;
     if($amount>=0){
     $sql="UPDATE commodity SET number=$amount WHERE id='$id'";
     mysqli_query($con,$sql) ;
     /*
     $sql = "INSERT INTO oorders (username, Recipient, address, commodity, type, shopname, amount, date) 
        VALUES ('$username', '$Recipient', '$address','$commodity','$type','$shopname','$amount',curdate())";
    *///--
     $results = mysqli_query($con, $sql);
     echo "<script> {window.alert('修改成功按下確認後跳轉');location.href='elements.php'} </script>"; 

     }
     else
     {
        echo "<script> {window.alert('錯誤數值');location.href='elements.php'} </script>";
     }
     exit();

 }
?>