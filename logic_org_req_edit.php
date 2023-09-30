<?php 

    include("connection.php");
    
    if($_POST['submit']){

        $oname=$_POST['oname'];
        $sname=$_POST['sname'];
        $fname=$_POST['fname'];
        $user=$_POST['user'];
        $qty=$_POST['qty'];

        $sql="update request set qty='$qty' where oname='$oname' and sname='$sname' and fname='$fname' and req='Waiting'";
        $result=mysqli_query($conn,$sql);

        if(!$result){
            echo '<script>
                    window.location.href="org_req.php?user=' . $user . '";
                    alert("Product edit failed!!!");
                    </script>';
        }else{
            echo '<script>
            window.location.href="org_req.php?user=' . $user . '";
            alert("Product request edited.");
            </script>';
        }    
}

    ?>

