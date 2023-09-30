<?php 

    include("connection.php");
    
    $oname=$_GET['oname'];
    $sname=$_GET['sname'];
    $fname=$_GET['fname'];
    $user=$_GET['user'];

    
    $sql1="select * from request where oname='$oname' and sname='$sname' and fname='$fname'";
    $result1=mysqli_query($conn,$sql1);
    $row=mysqli_fetch_array($result1, MYSQLI_ASSOC);
    $req_qty=$row['qty'];

    $sql2="update stock set qty=qty-'$req_qty' where sname='$sname' and fname='$fname'";
    $result2=mysqli_query($conn,$sql2);

    $sql="update request set req='Accepted' where oname='$oname' and sname='$sname' and fname='$fname'";
    $result=mysqli_query($conn,$sql);

    if(!$result2){
        echo '<script>
                window.location.href="sup_new_req.php?user=' . $user . '";
                alert("Product request accept failed!!!");
                </script>';
    }else{
        echo '<script>
        window.location.href="sup_new_req.php?user=' . $user . '";
        alert("Product request accepted.");
        </script>';
    }    

    ?>

