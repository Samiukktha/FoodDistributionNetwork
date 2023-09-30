<?php
    include("connection.php");
    if(isset($_POST['submit'])){
        $user=$_POST['user'];
        $no=$_POST['no'];
        $email=$_POST['email'];
        $loc=$_POST['loc'];

        $sql="update organisation set ocontact='$no', omail='$email', oloc='$loc' where ousername='$user'";
        $result=mysqli_query($conn,$sql);
        if(!$result){
            echo '<script>
                    window.location.href="sprofedit.php?user=' . $user . '";
                    alert("Profile edit failed!!!");
                    </script>';
        }else{
          echo '<script>
            window.location.href="oprofile.php?user=' . $user . '";
            alert("Profile edited successfully.");
            </script>';
        }
    }
?>

