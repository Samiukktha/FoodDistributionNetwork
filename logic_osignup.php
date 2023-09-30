<?php
    include("connection.php");
    if(isset($_POST['submit'])){
        $oname=$_POST['oname'];
        $cont=$_POST['no'];
        $mail=$_POST['email'];
        $rno=$_POST['rno'];
        $location=$_POST['loc'];
        $img1=$_FILES['file1'];
        $img2=$_FILES['file2'];
        $img3=$_FILES['file3'];
        $username=$_POST['user'];
        $password=$_POST['pass'];
        $rpassword=$_POST['rpass'];

        $imgfilename1=$img1['name'];
        $imgfileerror1=$img1['error'];
        $imgfiletemp1=$img1['tmp_name'];
        $filename_sep1=explode('.',$imgfilename1);
        $file_extension1=strtolower($filename_sep1[1]);

        $imgfilename2=$img2['name'];
        $imgfileerror2=$img2['error'];
        $imgfiletemp2=$img2['tmp_name'];
        $filename_sep2=explode('.',$imgfilename2);
        $file_extension2=strtolower($filename_sep2[1]);

        $imgfilename3=$img3['name'];
        $imgfileerror3=$img3['error'];
        $imgfiletemp3=$img3['tmp_name'];
        $filename_sep3=explode('.',$imgfilename3);
        $file_extension3=strtolower($filename_sep3[1]);


        $extension=array('jpeg','jpg','png');

        $sql="select * from organisation where ousername='$username'";
        $result=mysqli_query($conn, $sql);
        $count_user=mysqli_num_rows($result);

        $sql="select * from organisation where oname='$oname'";
        $result=mysqli_query($conn, $sql);
        $count_sname=mysqli_num_rows($result);

        $sql="select * from organisation where omail='$mail'";
        $result=mysqli_query($conn, $sql);
        $count_email=mysqli_num_rows($result);

        if($count_user==0 && $count_sname==0 && $count_email==0){
             if($password==$rpassword){
                if(in_array($file_extension1,$extension) && in_array($file_extension2,$extension) && in_array($file_extension3,$extension)){
                    $upload_img1='fcimage/'.$imgfilename1;
                    move_uploaded_file($imgfiletemp1,$upload_img1);

                    $upload_img2='fcimage/'.$imgfilename2;
                    move_uploaded_file($imgfiletemp2,$upload_img2);

                    $upload_img3='fcimage/'.$imgfilename3;
                    move_uploaded_file($imgfiletemp3,$upload_img3);

                    $sql="insert into organisation(oname,ocontact,omail,regno,oloc,ousername,opassword,ologo,oimage1,oimage2) values ('$oname','$cont','$mail','$rno','$location','$username','$password','$upload_img1','$upload_img3','$upload_img2')";
                    $result=mysqli_query($conn,$sql);
                    if($result){
                        header("Location: ologin.php");
                    }
                }else{
                    echo '<script>
                    window.location.href="ssignup.php";
                    alert("Upload image in jpeg, jpg or png format!!!");
                    </script>';
                }
             }else{
                echo '<script>
                window.location.href="osignup.php";
                alert("Passwords are not matching!!!");
            </script>';
             }
        }else{
            if($count_user>0){
                echo '<script>
                    window.location.href="osignup.php";
                    alert("Username already exists!!!");
                </script>';
            }
            if($count_sname>0){
                echo '<script>
                    window.location.href="osignup.php";
                    alert("Organisation name already exists!!!");
                </script>';
            }
            if($count_email>0){
                echo '<script>
                    window.location.href="osignup.php";
                    alert("Email already exists!!!");
                </script>';
            }
        }

    }
?>