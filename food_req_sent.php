<?php
    include("connection.php");
    
    $user=$_POST['user'];
    $sname=$_POST['sname'];
    $fname=$_POST['fname'];
    $qty=$_POST['qty'];
    $ft=$_POST['ft'];
    $pc=$_POST['pc'];

    $sql="select * from organisation where ousername='$user'";
    $result=mysqli_query($conn,$sql);
    $row=mysqli_fetch_array($result, MYSQLI_ASSOC);
    $oname=$row['oname'];

    $s="select * from request where sname='$sname' and fname='$fname' and oname='$oname' and req='Waiting'";
    $r=mysqli_query($conn, $s);
    $count=mysqli_num_rows($r);

    if($count==0){
        $sqls="insert into request(oname,sname,fname,qty,req) values ('$oname','$sname','$fname','$qty','Waiting')";
        $results=mysqli_query($conn,$sqls);
        if($result){
          echo '<script>
            window.location.href="org_sup_prod_list.php?user=' . $user . '&sname=' . $sname . '&ft=' . $ft . '&pc=' . $pc . '";
            alert("Product request placed!!!");
            </script>';
        }

    }else{
        echo '<script>
        window.location.href="org_sup_prod_list.php?user=' . $user . '&sname=' . $sname . '&ft=' . $ft . '&pc=' . $pc . '";
        alert("Product already requested!!!");
        </script>';
    }
        
        
?>

