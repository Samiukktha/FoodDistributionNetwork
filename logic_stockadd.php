<?php
    include("connection.php");
    if(isset($_POST['submit'])){
        $username=$_POST['user'];
        $fname=$_POST['fname'];
        $ftype=$_POST['foodtype'];
        $perpf=$_POST['ppfc'];
        $qty=$_POST['qty'];
        $img=$_FILES['file'];
        $edate= date('Y-m-d', strtotime($_POST['exp']));

        $imgfilename=$img['name'];
        $imgfileerror=$img['error'];
        $imgfiletemp=$img['tmp_name'];
        $filename_sep=explode('.',$imgfilename);
        $file_extension=strtolower($filename_sep[1]);

        $extension=array('jpeg','jpg','png');

        $sql="select * from supplier where susername='$username'";
        $result=mysqli_query($conn,$sql);
        $row=mysqli_fetch_assoc($result);
        $sname=$row['sname'];    

        $sql="select * from stock where sname='$sname' and fname='$fname'";
        $result=mysqli_query($conn, $sql);
        $count_prod=mysqli_num_rows($result);

        if($count_prod==0){
                if(in_array($file_extension,$extension)){
                    $upload_img='fcimage/'.$imgfilename;
                    move_uploaded_file($imgfiletemp,$upload_img);
                    $sql="insert into stock(sname,fname,ftype,pfc,qty,fimage,expdate) values ('$sname','$fname','$ftype','$perpf','$qty','$upload_img','$edate')";
                    $result=mysqli_query($conn,$sql);
                    if($result){
                      echo '<script>
                        window.location.href="home_sup.php?user=' . $username . '";
                        alert("Product added.");
                        </script>';
                    }
                }else{
                    echo '<script>
                    window.location.href="stockadd.php?user=' . $username . '";
                    alert("Upload image in jpeg, jpg or png format!!!");
                    </script>';
                }
             
        }else{
                echo '<script>
                    window.location.href="stockadd.php?user=' . $username . '";
                    alert("Product already exists!!!");
                </script>';
        }

    }
?>

