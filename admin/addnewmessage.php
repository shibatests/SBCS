<?php session_start();
include_once('../includes/config.php');
if (strlen($_SESSION['adminid']==0)) {
  header('location:logout.php');
  } else{
// for deleting user
if(isset($_GET['id']))
{
$adminid=$_GET['id'];
$msg=mysqli_query($con,"delete from users where id='$adminid'");
if($msg)
{
echo "<script>alert('Data deleted');</script>";
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
        <title>Registered Users in Last 7 Days | Registration and Login System</title>
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
                        <h1 class="mt-4">add the  new message   </h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                        </ol>
            
                        
                            <div class="card-body">
                             
                                      
                            <?php 
include_once('../includes/config.php');

//Code for Registration 
if(isset($_POST['submit']))
{
    $name=$_POST['name'];
    $period=$_POST['period'];
    $message=$_POST['message'];
   

    $msg=mysqli_query($con,"insert into events(name,period,message) values('$name','$period','$message')");

if($msg)
{
    echo "<script>alert('Added successfully');</script>";
    echo "<script type='text/javascript'> document.location = 'events-list.php'; </script>";
}
}

?>

<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Add new Action</title>
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
 
    </head>
    <body class="bg-primary">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-7">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header">

<hr />
                                        <h3 class="text-center font-weight-light my-4">new message</h3></div>
                                    <div class="card-body">
<form method="post" name="addnew" >

<div class="row mb-3">
<div class="col-md-6">
<div class="form-floating mb-3 mb-md-0">
<input class="form-control" id="fname" name="name" type="text" placeholder="Enter event name " required />
<label for="inputFirstName">Event name</label>
</div>
</div>
                                                
<div class="col-md-6">
<div class="form-floating">
<input class="form-control" id="lname" name="period" type="text" placeholder="Enterdays which msg will be sent" required />
 <label for="inputLastName">period</label>
</div>
</div>
</div>


<div class="form-floating mb-3">
<input class="form-control" id="email" name="message" type="textarea" placeholder="enter message to be derivered" required />
<label for="inputEmail">message to be sent</label>
</div>
         


                                                


                                            

<div class="mt-4 mb-0">
<div class="d-grid"><button type="submit" class="btn btn-primary btn-block" name="submit">Add Event</button></div>
</div>
                                        </form>
                                    </div>
                                    <div class="card-footer text-center py-3">
 
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
         <?php include_once('../includes/footer.php');?>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
    </body>
</html>
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