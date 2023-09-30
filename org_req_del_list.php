<?php
    include("connection.php");
    $user=$_GET['user'];

    $sql="select * from organisation where ousername='$user'";
    $result=mysqli_query($conn,$sql);
    $row=mysqli_fetch_array($result, MYSQLI_ASSOC);
    $orgname=$row['oname'];
    $i=$row['ologo'];

    $sql="select distinct(sname) from request where oname='$orgname' and req='Declined'";
    $result=mysqli_query($conn,$sql);

?>

<!DOCTYPE html>
<html>
  <head>
    <meta name="viewpoint" content="with=device-width, initial-scale=1.0" />
    <title>Food Connectivity/Suppliers List</title>
    <link rel="icon" type="image/x-icon" href="images/logo1.png">
    <link rel="stylesheet" href="style_org_req.css" />
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

        <p style="text-align:left;"><a href="org_req.php?user=<?php echo $user; ?>" style="color:black; text-decoration:none; ">&lt; Back</a></p>
        <h1 style="text-align:center; font-size:40px;">Requests</h1>
        <div class="content">
         <br>
          
                  <table style="width:100%"> 
                    <tr>
                      <th>Logo</th>
                      <th>Supplier</th>
                      <th>Food Product</th>
                      <th>Status</th>
                      <th>Remove From List</th>
                    </tr>
                    <tr>
                      <?php
                        while($row=mysqli_fetch_assoc($result)){
                      ?>
                        <?php 
                             $sname=$row['sname'];
                             $sqls="select * from supplier where sname='$sname'";
                             $results=mysqli_query($conn,$sqls);
                             $rows=mysqli_fetch_array($results, MYSQLI_ASSOC);
                             $image=$rows['slogo'];
                        ?>
                        <td><?php echo "<img src='$image'/>"; ?></td>
                        <td><?php echo $sname ?>
                            </br> <a href="osprof_acc.php?ouser=<?php echo $user; ?>& sname=<?php echo $sname; ?>" class="btn-v">View Profile</a>
                        </td>

                        <td style="text-align:left; padding-left:10px;">
                        <?php 
                        $s="select * from request where oname='$orgname' and req='Declined' and sname='$sname'";
                        $res=mysqli_query($conn,$s);
                        while($r=mysqli_fetch_assoc($res)){
                          $fname=$r['fname'];
                          $qty=$r['qty'];
                          echo $fname." x ".$qty;
                          echo '</br>';
                        }
                        ?>
                        </td>
                        <td>Declined.</br>Try a different company!</td>
                        <td><a href="org_req_del.php?user=<?php echo $user; ?>& sname=<?php echo $sname; ?>" class="btn-r">Remove</a></td>
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

