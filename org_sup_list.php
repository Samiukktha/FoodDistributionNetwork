<?php
    include("connection.php");
    if(isset($_POST['submit'])){
        $user=$_POST['user'];
        $ft=$_POST['foodtype'];
        $pc=$_POST['pincode'];

        $a="select * from organisation where ousername='$user'";
        $b=mysqli_query($conn,$a);
        $c=mysqli_fetch_array($b, MYSQLI_ASSOC);
        $orgname=$c['oname'];
        $i=$c['ologo'];
        
        if($ft=="click" and $pc=="click"){
          $sql="select * from supplier";
          $result=mysqli_query($conn,$sql);
        }else if($pc=="click"){
          $sql="select * from supplier where sname in (select sname from stock where ftype='$ft')";
          $result=mysqli_query($conn,$sql);
        }else if($ft=="click"){
          $sql="select * from supplier where spincode='$pc'";
          $result=mysqli_query($conn,$sql);
        }else{
          $sql="select * from supplier where spincode='$pc' and sname in (select sname from stock where ftype='$ft')";
          $result=mysqli_query($conn,$sql);
        }
    }else{
      $user=$_GET['user'];
        $ft=$_GET['ft'];
        $pc=$_GET['pc'];

        $a="select * from organisation where ousername='$user'";
        $b=mysqli_query($conn,$a);
        $c=mysqli_fetch_array($b, MYSQLI_ASSOC);
        $orgname=$c['oname'];
        $i=$c['ologo'];
        
        if($ft=="click" and $pc=="click"){
          $sql="select * from supplier";
          $result=mysqli_query($conn,$sql);
        }else if($pc=="click"){
          $sql="select * from supplier where sname in (select sname from stock where ftype='$ft')";
          $result=mysqli_query($conn,$sql);
        }else if($ft=="click"){
          $sql="select * from supplier where spincode='$pc'";
          $result=mysqli_query($conn,$sql);
        }else{
          $sql="select * from supplier where spincode='$pc' and sname in (select sname from stock where ftype='$ft')";
          $result=mysqli_query($conn,$sql);
        }
    }
?>


<!DOCTYPE html>
<html>
  <head>
    <meta name="viewpoint" content="with=device-width, initial-scale=1.0" />
    <title>Food Connectivity/Suppliers List</title>
    <link rel="icon" type="image/x-icon" href="images/logo1.png">
    <link rel="stylesheet" href="style_org_sup_list.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;400;600;700&display=swap"
      rel="stylesheet"
    />
  </head>

  <body>
    <section class="header">
      <nav>
      <a href=""><img src=<?php echo $i; ?> /></a><p style="color:white; padding-left:10px;"><?php echo $orgname; ?></p>
        <div class="nav-links">
        <ul>
            <li><a href="home_org.php?user=<?php echo $user; ?>">HOME</a></li>
            <li>
              <a href="oprofile.php?user=<?php echo $user; ?>">PROFILE</a>
            </li>
            <li>
              <a href="org_req.php?user=<?php echo $user; ?>">REQUESTS</a>
            </li>
            <li>
              <a href="home.php?">LOG OUT</a>
            </li>
          </ul>
        </div>
      </nav>
      <div class="shome">
      <p style="text-align:left;"><a href="home_org.php?user=<?php echo $user; ?>" style="color:black; text-decoration:none; ">&lt; Back</a></p>
        <h1 style="text-align:center; font-size:40px;">Suppliers List</h1>
        <div class="content">
         <br>
          
                  <table style="width:100%"> 
                    <tr>
                      <th>Logo</th>
                      <th>Company Name</th>
                      <th>Location</th>
                      <th>Food Products</th>
                      <th>View</th>
                    </tr>
                    <tr>
                      <?php
                        while($row=mysqli_fetch_assoc($result)){
                      ?>
                        <?php $image=$row['slogo']; ?>
                        <td><?php echo "<img src='$image'/>"; ?></td>

                        <td><?php echo $row['sname']?>
                        </br> <a href="osprof.php?ouser=<?php echo $user; ?>& sname=<?php echo $row['sname']; ?>& ft=<?php echo $ft; ?>& pc=<?php echo $pc; ?> " class="btn-v">View Profile</a>
                        </td>
                       
                        <td><?php echo $row['sloc']?>,</br><?php echo $row['spincode']?></td>
                        <td><?php 
                            $sname=$row['sname'];
                            $query="select * from stock where sname='$sname'";
                            $res=mysqli_query($conn,$query);
                            while($row=mysqli_fetch_assoc($res)){
                                echo $row['ftype'];
                                echo "</br>";
                            }

                        ?>
                        </td>
                        <td><a href="org_sup_prod_list.php?user=<?php echo $user; ?>& sname=<?php echo $sname; ?>& ft=<?php echo $ft; ?>& pc=<?php echo $pc; ?> " class="btn-e">View</a></td>
                      </tr>
                      </tr>
                      <?php
                        }
                      ?>
                  </table>
          </div>       
      </div>
    </section>
  </body>
</html>

