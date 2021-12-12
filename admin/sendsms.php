<?php
header("refresh: 3");
include_once('../includes/config.php');
$query = mysqli_query($con, "SELECT * FROM sms WHERE status = 0");
while($data = mysqli_fetch_array($query)){
    $smsid = $data['smstext'];
    $parent = $data['receiver_phone'];
    $timetosend = $data['timetosend'];

    $queryp = mysqli_query($con, "SELECT * FROM parents WHERE id = '$parent'");
    $dataparent = mysqli_fetch_array($queryp);
    $phone_number = $dataparent['phone'];
    $querym = mysqli_query($con, "SELECT * FROM events WHERE id = '$smsid'");
    $datamessage = mysqli_fetch_array($querym);
    $message = $datamessage['message'];

    echo $timetosend." ";
    echo $phone_number." ";
    echo $message."<br>";

    $timenow = time();
    if($timenow >= $timetosend){
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
                CURLOPT_POSTFIELDS => array('to' => $phone_number, 'from' => 'SBCA', 'unicode' => '0', 'sms' => $message, 'action' => 'send-sms'),
                CURLOPT_HTTPHEADER => array(
                    'x-api-key: 35a13e16-dd2c-9c91-819b-34ed0beb5dc7-08b4b43d'
                ),
            )
        );

        curl_exec($curl);

        curl_close($curl);

        mysqli_query($con, "UPDATE sms SET status = 1 WHERE id = '".$data['id']."'");
    }
}