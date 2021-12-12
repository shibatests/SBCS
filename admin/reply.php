<?php session_start();
include_once('../includes/config.php');
if (strlen($_SESSION['adminid']==0)) {
  header('location:logout.php');
  } else{
//Code for Updation 
if(isset($_POST['update']))
{
    $sms=$_POST['reply'];
    $call=$_POST['phone'];
    $sender=$_POST['sender'];

$userid=$_GET['uid'];
    $msg=mysqli_query($con,"update comments set reply='$sms' where id='$userid'");

if($msg)
{
    echo "<script>alert('a reply sent successfully');</script>";
       echo "<script type='text/javascript'> document.location = 'comments.php'; </script>";

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
               CURLOPT_POSTFIELDS => array('to' => $call, 'from' => 'SBCA', 'unicode' => '0', 'sms' => "muraho ". $sender ." ". $sms, 'action' => 'send-sms'),
               CURLOPT_HTTPHEADER => array(
                   'x-api-key: 35a13e16-dd2c-9c91-819b-34ed0beb5dc7-08b4b43d'
               ),
           )
       );

       curl_exec($curl);

       curl_close($curl);

}
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
        <title>reply comment | SBCS</title>
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
                        
<?php 
$userid=$_GET['uid'];
$query=mysqli_query($con,"select * from comments where id='$userid'");
while($result=mysqli_fetch_array($query))
{?>

                        <!-- <h1 class="mt-4"><?php echo $result['fname'];?>'s Profile</h1> -->
                        <div class="card mb-4">
                     <form method="post">
                            <div class="card-body">
                                <table class="table table-bordered">
                                   <tr>
                                    <th>sender name</th>
                                       <td><input class="form-control" id="fname" name="sender" type="text" value="<?php $a=$result['sender'];
                                       


                                       $query1=mysqli_query($con,"select * from parents where id='$a'");
while ($row=mysqli_fetch_array($query1)) {
    echo $row['fname'];?>" required readonly /></td>
                                   </tr>
                                   <tr>
                                       <th>phone number</th>
                                       <td><input class="form-control" id="lname" name="phone" type="text" value="<?php echo  $row['phone']; ?>"  required readonly /></td>
                                   </tr>
                                         <tr>
                                       <th>sent message</th>
                                       <td colspan="3"><input class="form-control" id="contact" name="message" type="text" value="<?php echo $result['message']; ?>"   required readonly /></td>
                                   </tr>
                                   
                                   
                                   <tr>
                                       <th>reply</th>
                                       <td colspan="3"><input class="form-control" id="contact" name="reply" type="text" required  /></td>
                                   </tr>
                                   <?php
}
                                   ?>    
                                   <tr>
                                       <td colspan="4" style="text-align:center ;"><button type="submit" class="btn btn-primary btn-block" name="update">Reply</button></td>

                                   </tr>
                                    </tbody>
                                </table>
                            </div>
                            </form>
                        </div>
<?php } ?>

                    </div>
                </main>
          <?php include('../includes/footer.php');?>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="../js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="../js/datatables-simple-demo.js"></script>
    </body>
</html>
<?php } ?>
