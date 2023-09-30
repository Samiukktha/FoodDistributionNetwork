<?php 

include("connection.php");

$sname=$_GET['sname'];
$user=$_GET['user'];
$fname=$_GET['fname'];

$sql="select * from organisation where ousername='$user'";
$result=mysqli_query($conn,$sql);
$row=mysqli_fetch_array($result, MYSQLI_ASSOC);
$oname=$row['oname'];

$sql="delete from request where oname='$oname' and sname='$sname' and req='Waiting' and fname='$fname'";
$result=mysqli_query($conn,$sql);

if($result){
        echo '<script>
        window.location.href="org_req.php?user=' . $user . '";
        alert("Request Canceled!!!");
        </script>';
}

?>