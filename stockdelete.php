<?php 

include("connection.php");
   
$foodname=$_GET['food'];
$sname=$_GET['sname'];
$user=$_GET['user'];

$sql="delete from stock where fname='$foodname' and sname='$sname'";
$result=mysqli_query($conn,$sql);

if($result){
        echo '<script>
        window.location.href="home_sup.php?user=' . $user . '";
        alert("Product deleted.");
        </script>';
}

?>

