<?php session_start();
include_once('../includes/config.php');
if (strlen($_SESSION['adminid']==0)) {
  header('location:logout.php');
  } else{
// for deleting user
if(isset($_GET['id']))
{
$adminid=$_GET['id'];
$msg=mysqli_query($con,"delete from children where id='$adminid'");
if($msg)
{
echo "<script>alert('Data deleted');</script>";
}
}

   ?>
<!DOCTYPE html>
<html lang="en">
    
                      

                        


                            <?php $ret=mysqli_query($con,"select * from children");//aha niho na pullingiye value ya born 
                            
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
                                  <th>status</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                      
                                    </tfoot>
                                    <tbody>
                                              <?php $ret=mysqli_query($con,"select * from vaccines ");//hano niho na pulingiye value za periods
                              $cnt=1;
                              while($row=mysqli_fetch_array($ret))
                              {?>
                              <tr>
                              
                                  <td><?php echo $row['id'];?></td>
                                  <td><?php echo $row['name'];?></td>
                                  <td><?php echo $row['message'];?></td>
                                  <td><?php 
                                  $b=$row['period'];
                                  echo $b;?>
                                  </td>
                                  <td>
                                  <?php
$Date = $bb;
$bbb=date('Y-m-d H:i:s', strtotime($Date . '+' .$b. 'days'));//noneho hano nafashe value ya born nzanye from table customer3 nteranyaho value ya period tuu
echo $bbb;


?>
                                  </td>

                                  <td><?php 
                                  if(date('Y-m-d H:i:s')>$bbb){
                                      echo "sent";
                                  }
                                  elseif(date('Y-m-d H:i:s')==$bbb) {

                                    
                                  }
                                  ?></td>
                                   
                                    
                                  
                              </tr>
                              <?php $cnt=$cnt+1; }?>
                                      
                                    </tbody>
                                </table>
                                







                                
 
            
    </body>
</html>
<?php } ?>

<?php 

if(date('Y-m-d H:i:s')==$bbb){

  $curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => "https://api.mista.io/sms",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS => array('action' => 'send-sms','to' => 'phone number','from' => 'Sender ID','sms' => 'YourMessage','schedule' => 'date and time'),
  CURLOPT_HTTPHEADER => array(
    "x-api-key: {{api_key}}"
  ),
));

$response = curl_exec($curl);

curl_close($curl);
echo $response;
}

?>

