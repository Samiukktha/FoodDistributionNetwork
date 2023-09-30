<?php
    include("connection.php");
    
    $user=$_GET['user'];
    $sname=$_GET['sname'];
    $ft=$_GET['ft'];
    $pc=$_GET['pc'];

    $a="select * from organisation where ousername='$user'";
        $b=mysqli_query($conn,$a);
        $c=mysqli_fetch_array($b, MYSQLI_ASSOC);
        $orgname=$c['oname'];
        $i=$c['ologo'];



    $sql="select * from stock where sname='$sname'";
    $result=mysqli_query($conn,$sql);
        
?>

<!DOCTYPE html>
<html>
  <head>
    <meta name="viewpoint" content="with=device-width, initial-scale=1.0" />
    <title>Food Connectivity/Suppliers List</title>
    <link rel="icon" type="image/x-icon" href="images/logo1.png">
    <link rel="stylesheet" href="style_shome.css" />
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
        <p style="text-align:left;"><a href="org_sup_list.php?user=<?php echo $user; ?>& ft=<?php echo $ft; ?>& pc=<?php echo $pc; ?>" style="color:black; text-decoration:none; ">&lt; Back</a></p>
        <h1 style="text-align:center; font-size:40px;">Products List</h1>
        <div class="content">
        <br>
        <p style="font-size:25px; text-align:left;">Supplier Name: <?php echo $sname; ?></br></p></br>
          
                  <table style="width:100%"> 
                    <tr>
                      <th>Food Image</th>
                      <th>Food Product</th>
                      <th>Per portion feed</th>
                      <th>Stock left</th>
                      <th>Add</th>
                    </tr>
                    <tr>
                      <?php
                        while($row=mysqli_fetch_assoc($result)){
                      ?>
                        <?php $image=$row['fimage']; ?>
                        <td><?php echo "<img src='$image'/>"; ?></td>
                        <td><?php echo $row['fname']?></td>
                        <td><?php echo $row['pfc']?></td>
                        <td><?php echo $row['qty']?></td>
                       
                        <td><a href="food_req.php?user=<?php echo $user; ?>& fname=<?php echo $row['fname']; ?>& sname=<?php echo $sname; ?>& ft=<?php echo $ft; ?>& pc=<?php echo $pc; ?>" class="btn-e">Add</a></td>
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

