<?php session_start();
include_once('../includes/config.php');
if (strlen($_SESSION['adminid']==0)) {
  header('location:logout.php');
  } else{
    
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Chldren's Profile | Registration and Login System</title>
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
$query=mysqli_query($con,"select * from children where id='$userid'");
while($result=mysqli_fetch_array($query))
{?>
                        <h1 class="mt-4"><?php echo $result['fname'];?>'s Identification</h1>
                        <div class="card mb-4">
                     
                            <div class="card-body">
                                <a href="edit-profile.php?uid=<?php echo $result['id'];?>">Edit</a>
                                <table class="table table-bordered">
                                   <tr>
                                    <th>First Name</th>
                                       <td><?php echo $result['fname'];?></td>
                                   </tr>
                                   <tr>
                                       <th>other Name</th>
                                       <td><?php echo $result['oname'];?></td>
                                   </tr>
                                   <tr>
                                       
                                       <td colspan="3"><?php $b=$result['pid'];
                                        $b;
                                       ?></td>
                                   </tr>
                                     
                                     
                                        <tr>
                                       <th>Born. Date</th>
                                       <td colspan="3"><?php echo $result['born'];?></td>
                                   </tr>

                                   <tr>
                                       <th>Plan</th>
                                       <td colspan="3"><a href="vaccineplan.php?id=<?php echo $result['id'];?>">vaccination</a>|<a href="eventsplan.php?id=<?php echo $result['id'];?>">Nutrition</a></td>
                                   </tr>

                                    </tbody>
                                </table>





                            </div>
                        </div>

                        <?php 
$userid=$_GET['uid'];
$query=mysqli_query($con,"select * from parents where id=$b");
while($result=mysqli_fetch_array($query))
{
    
    $par2=$result['id'];
    ?>
                        
                        <h1 class="mt-4"><?php echo $result['fname'];?>s' parents information</h1>
                        <div class="card mb-4">
                     
                            <div class="card-body">
                                <!-- <a href="edit-profile.php?uid=<?php echo $result['id'];?>">Edit</a> -->
                                <table class="table table-bordered">
                                   <tr>
                                    <th>Refferar parent</th>
                                       <td><?php echo $result['fname']." ".$result['oname'];?></td>
                                   </tr>
                                   <th>other parent</th>
                                       <td>

                                       
                                       </td>
                                   </tr>
                                  
                                   <tr>
                                       <th>parentIdNo</th>
                                       <td colspan="3"><?php echo $result['idno'];?></td>
                                   </tr>
                                     
                                     
                                        <tr>
                                       <th>Reg Date</th>
                                       <td colspan="3"><?php echo $result['regdate'];?></td>
                                   </tr>
                                   <?php }?>
                                    </tbody>
                                </table>
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
<?php } ?>
