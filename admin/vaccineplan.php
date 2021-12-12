<?php session_start();
//  header('Refresh: 10'); 
include_once('../includes/config.php');
if (strlen($_SESSION['adminid']==0)) {
  header('location:logout.php');
  } else{
// for deleting user
if(isset($_GET['id']))
{
$adminid=$_GET['id'];
// $msg=mysqli_query($con,"delete from children where id='$adminid'");
// if($msg)
// {
// echo "<script>alert('Data deleted');</script>";
// }
}

   ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>user schedule</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <link href="../css/styles.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>

    </head>
    <body class="sb-nav-fixed">
      <?php include_once('includes/navbar.php');?>
        <div id="layoutSidenav">
         <?php include_once('includes/sidebar.php');?>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Event schedule</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                            <li class="breadcrumb-item active">event plan for user</li>
                        </ol>
            
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                            full details 
                            </div>
                            <div class="card-body">

                        


                            <?php $ret=mysqli_query($con,"select * from children ");//aha niho na pullingiye value ya born 
                            
                              while($row=mysqli_fetch_array($ret))
                              {?>
                            <?php ?>
                                  <td><?php 
                                  
                                  $bb=$row['born'];
                                  
                                  
                                  ?>
                                  
                                  
                                 
                                  
                              
                              <?php  }?>


                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            
                                            
                                     
                                        <th>action</th>
                                  <th>time to send SMS</th>
                                  <th>Message</th>
                                  <th>Period to Send/days</th>
                                  <th>time to send</th>
                                  <th>receiver's no</th>
                                  <th>status</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            
                                            
                                             <th>action</th>
                                  <th>time to send SMS</th>
                                  <th>Message</th>
                                  <th>time to send</th>
                                  <th>receiver's no</th>
                                  <th>status</th>
                                  
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                              <?php $ret=mysqli_query($con,"select * from vaccines ");//hano niho na pulingiye value za periods
                              $cnt=1;
                              while($row=mysqli_fetch_array($ret))
                              {?>
                              <tr>
                              
                                  <td><?php echo $row['id'];?></td>
                                  <td><?php echo $row['name'];?></td>
                                  <td><?php echo $mess=$row['message'];?></td>
                                  <td><?php 
                                  $b=$row['period'];
                                  echo $b;?>
                                  </td>
                                  <td>
                                  <?php
$Date = $bb;
$bbb=date('Y-m-d H:i:s', strtotime($Date . '+' .$b. 'minute'));//noneho hano nafashe value ya born nzanye from table customer3 nteranyaho value ya period tuu
echo $bbb;

?>
                                  </td>
                                 
                                  <td>

                                  <?php $retr=mysqli_query($con,"select * from children where id=$adminid");
                                   while ($row11=mysqli_fetch_array($retr)) {
                                       $pphone=$row11['pid'];
                                       $parento=$row11['fname'];                                   

                                       $retri=mysqli_query($con, "select * from parents where id=$pphone");
                                       while ($row111=mysqli_fetch_array($retri)) {
                                           echo $number=$row111['phone'];
                                       }
                                   }
                                  ?>

                                  </td>

                                  <td><?php 
                                  if(date('Y-m-d H:i:s')>$bbb){
                                      echo "sent";
                                  }
                                  elseif (date('Y-m-d H:i:s')==$bbb){

                                    $curl = curl_init();

                        curl_setopt_array(
                            $curl,
                            array(
                                CURLOPT_URL => 'https://api.mista.io/sms',
                                CURLOPT_RETURNTRANSFER => true,
                                CURLOPT_ENCODING => '',
                                CURLOPT_MAXREDIRS => 10,
                                CURLOPT_TIMEOUT => 0,
                                CURLOPT_FOLLOWLOCATION => true,
                                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                                CURLOPT_CUSTOMREQUEST => 'POST',
                                CURLOPT_POSTFIELDS => array('to' => $number, 'from' => 'SBCA', 'unicode' => '0', 'sms' => "Muraho  " . $fname . $mess, 'action' => 'send-sms'),
                                CURLOPT_HTTPHEADER => array(
                                    'x-api-key: 35a13e16-dd2c-9c91-819b-34ed0beb5dc7-08b4b43d'
                                ),
                            )
                        );

                        curl_exec($curl);

                        curl_close($curl);

                                  }
                                  ?></td>
                                   
                                    
                                  
                              </tr>
                              <?php $cnt=$cnt+1; }?>
                                      
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </main>
  <?php include('../includes/footer.php');?>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="../js/scripts.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="../js/datatables-simple-demo.js"></script>
    </body>
</html>
<?php } ?>