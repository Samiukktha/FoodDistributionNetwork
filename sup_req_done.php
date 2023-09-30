<?php 

include("connection.php");

$sname=$_GET['sname'];
$user=$_GET['user'];
$oname=$_GET['oname'];

$sql="delete from request where oname='$oname' and sname='$sname' and req='Accepted'";
$result=mysqli_query($conn,$sql);

if($result){
        echo '<script>
        window.location.href="sup_req.php?user=' . $user . '";
        alert("Removed From List!!!");
        </script>';
}

?>