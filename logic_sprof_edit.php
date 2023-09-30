<?php
    include("connection.php");
    if(isset($_POST['submit'])){
        $user=$_POST['user'];
        $admin=$_POST['admin'];
        $no=$_POST['no'];
        $email=$_POST['email'];
        $loc=$_POST['loc'];
        $pincode=$_POST['pincode'];

        $sql="update supplier set admin='$admin', scontact='$no', smail='$email', sloc='$loc', spincode='$pincode' where susername='$user'";
        $result=mysqli_query($conn,$sql);
        if(!$result){
            echo '<script>
                    window.location.href="sprofile.php?user=' . $user . '";
                    alert("Profile edit failed!!!");
                    </script>';
        }else{
          echo '<script>
            window.location.href="sprofile.php?user=' . $user . '";
            alert("Profile edited successfully.");
            </script>';
        }
    }
?>

