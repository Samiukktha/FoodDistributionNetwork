<?php
    include("connection.php");
    $user=$_GET['user'];

    $sql="select * from supplier where susername='$user'";
    $result=mysqli_query($conn,$sql);
    $row=mysqli_fetch_array($result, MYSQLI_ASSOC);
    $sname=$row['sname'];
    $i=$row['slogo'];

    $sql="select distinct(oname) from request where sname='$sname' and req='Waiting'";
    $result=mysqli_query($conn,$sql);

?>

<!DOCTYPE html>
<html>
  <head>
    <meta name="viewpoint" content="with=device-width, initial-scale=1.0" />
    <title>Food Connectivity/Suppliers List</title>
    <link rel="icon" type="image/x-icon" href="images/logo1.png">
    <link rel="stylesheet" href="style_sup_new_req.css" />
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
      <a href=""><img src="<?php echo $i; ?>" /></a><p style="color:white; padding-left:10px;"><?php echo $sname; ?></p>
        <div class="nav-links">
        <ul>
            <li><a href="home_sup.php?user=<?php echo $user; ?>">HOME</a></li>
            <li>
              <a href="sprofile.php?user=<?php echo $user; ?>">PROFILE</a>
            </li>
            <li>
              <a href="sup_req.php?user=<?php echo $user; ?>">REQUESTS</a>
            </li>
            <li>
              <a href="home.php?">LOG OUT</a>
            </li>
          </ul>
        </div>
      </nav>
      <div class="shome">
      <p style="text-align:left;"><a href="sup_req.php?user=<?php echo $user; ?>" style="color:black; text-decoration:none; ">&lt; Back</a></p>
          
        <h1 style="text-align:center; font-size:40px;">New Requests</h1>
        <div class="content">
         <br>
                  <table style="width:100%"> 
                    <tr>
                      <th>Organisation</th>
                      <th>Food Products</th>
                    </tr>
                    <tr style="height:70px">
                      <?php
                        while($row=mysqli_fetch_assoc($result)){
                            
                            $oname=$row['oname'];
                            $sql1="select count(*) from request where oname='$oname' and sname='$sname' and req='Waiting'";
                            $res1=mysqli_query($conn,$sql1);
                            $r1=mysqli_fetch_array($res1);
                            $c=$r1['count(*)'];
                        
                      ?>
                        <td> 
                             <?php echo $row['oname']; ?></br>
                             <a href="soprof.php?suser=<?php echo $user; ?>& oname=<?php echo $row['oname']; ?>" class="btn-v">View Profile</a>
                             
                        </td>

                        <td style="text-align:left; padding-left:10px; padding-top:20px; line-height:2.5;">
                        <?php 
                        $oname=$row['oname'];
                        $s="select * from request where oname='$oname' and req='Waiting' and sname='$sname'";
                        $res=mysqli_query($conn,$s);
                        while($r=mysqli_fetch_assoc($res)){
                       
                          $fname=$r['fname'];
                          $qty=$r['qty'];
                          echo $fname." x ".$qty;
                        ?>
                        &nbsp;&nbsp;&nbsp;<a href="sup_req_acc.php?user=<?php echo $user; ?>& sname=<?php echo $sname; ?>& oname=<?php echo $oname; ?>& fname=<?php echo $fname; ?>" class="btn-a">Accept</a> 
                          
                        &nbsp;&nbsp; <a href="sup_req_del.php?user=<?php echo $user; ?>& sname=<?php echo $sname; ?>& oname=<?php echo $oname; ?>& fname=<?php echo $fname; ?>" class="btn-r">Decline</a> </br></br>
                         
                        <?php
                        }
                        ?>    
                        </td>
                                                
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


