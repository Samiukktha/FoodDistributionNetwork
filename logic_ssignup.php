<?php
    include("connection.php");
    if(isset($_POST['submit'])){
        $aname=$_POST['admin'];
        $cname=$_POST['sname'];
        $cont=$_POST['no'];
        $mail=$_POST['email'];
        $location=$_POST['loc'];
        $pin=$_POST['pincode'];
        $img=$_FILES['file'];
        $username=$_POST['user'];
        $password=$_POST['pass'];
        $rpassword=$_POST['rpass'];

        $imgfilename=$img['name'];
        $imgfileerror=$img['error'];
        $imgfiletemp=$img['tmp_name'];
        $filename_sep=explode('.',$imgfilename);
        $file_extension=strtolower($filename_sep[1]);

        $extension=array('jpeg','jpg','png');
        
        $sql="select * from supplier where susername='$username'";
        $result=mysqli_query($conn, $sql);
        $count_user=mysqli_num_rows($result);

        $sql="select * from supplier where sname='$cname'";
        $result=mysqli_query($conn, $sql);
        $count_sname=mysqli_num_rows($result);

        $sql="select * from supplier where smail='$mail'";
        $result=mysqli_query($conn, $sql);
        $count_email=mysqli_num_rows($result);

        if($count_user==0 && $count_sname==0 && $count_email==0){
             if($password==$rpassword){
                if(in_array($file_extension,$extension)){
                    $upload_img='fcimage/'.$imgfilename;
                    move_uploaded_file($imgfiletemp,$upload_img);
                    $sql="insert into supplier(admin,sname,scontact,smail,sloc,spincode,susername,spassword,slogo) values ('$aname','$cname','$cont','$mail','$location','$pin','$username','$password','$upload_img')";
                    $result=mysqli_query($conn,$sql);
                    if($result){
                        header("Location: slogin.php");
                    }
                }else{
                    echo '<script>
                    window.location.href="ssignup.php";
                    alert("Upload image in jpeg, jpg or png format!!!");
                    </script>';
                }
             }else{
                echo '<script>
                window.location.href="ssignup.php";
                alert("Passwords are not matching!!!");
            </script>';
             }
        }else{
            if($count_user>0){
                echo '<script>
                    window.location.href="ssignup.php";
                    alert("Username already exists!!!");
                </script>';
            }
            if($count_sname>0){
                echo '<script>
                    window.location.href="ssignup.php";
                    alert("Company name already exists!!!");
                </script>';
            }
            if($count_email>0){
                echo '<script>
                    window.location.href="ssignup.php";
                    alert("Email already exists!!!");
                </script>';
            }
        }

    }
?>