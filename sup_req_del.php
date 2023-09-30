<?php 

    include("connection.php");
    
    $oname=$_GET['oname'];
    $sname=$_GET['sname'];
    $fname=$_GET['fname'];
    $user=$_GET['user'];

    $sql="update request set req='Declined' where oname='$oname' and sname='$sname' and fname='$fname'";
    $result=mysqli_query($conn,$sql);

    if(!$result){
        echo '<script>
                window.location.href="sup_new_req.php?user=' . $user . '";
                alert("Product decline failed!!!");
                </script>';
    }else{
        echo '<script>
        window.location.href="sup_new_req.php?user=' . $user . '";
        alert("Product request declined.");
        </script>';
    }    

    ?>

