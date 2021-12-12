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
        <title>comment's Profile |SBCS</title>
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
                        <h1>Parent's comment</h1>
                        <div class="card mb-4">
                     
                            <div class="card-body">
                                <a href="reply.php?uid=<?php echo $result['id'];?>">reply</a>
                                <table class="table table-bordered">


                                   <tr>
                                    <th>sender name</th>
                                       <td><?php $a=$result['sender'];
                                       
                                       $ret1=mysqli_query($con,"select * from parents where id=$a"); 
                                  
                                       while ($row1=mysqli_fetch_array($ret1)) {
                                           echo  $row1['fname'];
                                         
                                           echo  $row1['oname']; ?>
                                    
                                    
                                    
                                    
                                    
                                    </td>
                                   </tr>
                                   <tr>
                                    <th>sender phone</th>
                                       <td><?php echo  $row1['phone']; ?></td>
                                       <?php
                                       }?>
                                   </tr>
                                   <tr>
                                       <th>date received</th>
                                       <td><?php echo $result['date'];?></td>
                                   </tr>
                                   <tr>
                                       <th>Message sent</th>
                                       <td colspan="3"><?php echo $result['message'];?></td>
                                   </tr>
                                     
                                     
                                       
                                    </tbody>
                                </table>
                            </div>
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
