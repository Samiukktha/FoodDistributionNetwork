<?php
    include("connection.php");
    if(isset($_POST['submit'])){
        $user=$_POST['user'];
        $sname=$_POST['sname'];
        $fname=$_POST['fname'];
        $pfc=$_POST['ppfc'];
        $qty=$_POST['qty'];
        $expdate= date('Y-m-d', strtotime($_POST['exp']));

        $sql="update stock set pfc='$pfc',qty='$qty',expdate='$expdate' where fname='$fname' and sname='$sname'";
        $result=mysqli_query($conn,$sql);
        if($result){
          echo '<script>
          window.location.href="home_sup.php?user=' . $user . '";
          alert("Product updated.");
          </script>';
        }
    }
?>

