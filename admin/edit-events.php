<?php session_start();
include_once('../includes/config.php');
if (strlen($_SESSION['adminid']==0)) {
  header('location:logout.php');
  } else{
//Code for Updation 
if(isset($_POST['update']))
{
    $fname=$_POST['name'];
    $lname=$_POST['period'];
    $contact=$_POST['message'];
$userid=$_GET['uid'];
    $msg=mysqli_query($con,"update events set name='$fname',period='$lname',message='$contact' where id='$userid'");

if($msg)
{
    echo "<script>alert('Profile updated successfully');</script>";
       echo "<script type='text/javascript'> document.location = 'events-list.php'; </script>";
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
        <title>Edit events Profile | SBCS</title>
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
$query=mysqli_query($con,"select * from events where id='$userid'");
while($result=mysqli_fetch_array($query))
{?>
                        <h1 class="mt-4"><?php echo $result['name'];?>'s Profile</h1>
                        <div class="card mb-4">
                     <form method="post">
                            <div class="card-body">
                                <table class="table table-bordered">
                                   <tr>
                                    <th>Full Name</th>
                                       <td><input class="form-control" id="fname" name="name" type="text" value="<?php echo $result['name'];?>" required /></td>
                                   </tr>
                                   <tr>
                                       <th>period</th>
                                       <td><input class="form-control" id="lname" name="period" type="text" value="<?php echo $result['period'];?>"  required /></td>
                                   </tr>
                                         <tr>
                                       <th>message.</th>
                                       <td colspan="3"><input class="form-control" id="contact" name="message" type="text" value="<?php echo $result['message'];?>"   required /></td>
                                   </tr>
                                   
                                     
                                       
                                   <tr>
                                       <td colspan="4" style="text-align:center ;"><button type="submit" class="btn btn-primary btn-block" name="update">Update</button></td>

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
