<?php 

include("connection.php");

$sname=$_GET['sname'];
$user=$_GET['user'];
$sql="select * from organisation where ousername='$user'";
$result=mysqli_query($conn,$sql);
$row=mysqli_fetch_array($result, MYSQLI_ASSOC);
$oname=$row['oname'];

$sql="delete from request where oname='$oname' and sname='$sname' and req='Declined'";
$result=mysqli_query($conn,$sql);

if($result){
        echo '<script>
        window.location.href="org_req_del_list.php?user=' . $user . '";
        alert("Removed From List!!!");
        </script>';
}

?>