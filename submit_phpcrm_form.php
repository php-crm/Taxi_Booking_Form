<?php
if(ISSET($_POST))
{
	$name=$_POST['name'];
  $email=$_POST['email'];
	$phone=$_POST['phone'];
	$passenger=$_POST['passenger'];
  $pick_up_time=$_POST['time'];
  $pstreet=$_POST['pstreet'];
	$pcity=$_POST['pcity'];
	$pstate=$_POST['pstate'];
  $pzip_code=$_POST['pzipcode'];
  $vehicle=$_POST['vehicle'];
  $dstreet=$_POST['dstreet'];
  $dcity=$_POST['dcity'];
  $dstate=$_POST['dstate'];
  $dzip_code=$_POST['dzipcode'];
  $side=$_POST['trip'];
  $message=$_POST['message'];

  $field1="<b>Number Of Passenger:</b> ".$passenger."<br>"."<b>Pick Up Date:</b> ".$pick_up_time;
  $field2="<b>Pick Up Address:</b> "."<br>"."Street: ".$pstreet."<br>"."City: ".$pcity."<br>"."State: ".$pstate."<br>"."Zip Code: ".$pzip_code;
  $field3="<b>Vehicle Type:</b> ".$vehicle."<br>"."<b>Journey Type:</b> ".$side;
  $field4="<b><b>Destination Address:</b> </b>"."<br>"."Street: ".$dstreet."<br>"."City: ".$dcity."<br>"."State: ".$dstate."<br>"."Zip Code: ".$dzip_code."<br>"."<b>Message:</b> ".$message;

}
else
{
echo "Thanks";	
exit();	
}
$Token_Key='#'; // Located in admin section under setup
$WebURL='#'; // CRM Url like https://www.abc.com/crm-folder
//Lead Fields
$post_data=array('name'=>$name,'phone'=>$phone,'email'=>$email, 'field_1'=>$field1."<br>".$field2."<br>".$field3."<br>".$field4);
$PHPCRM = curl_init();
curl_setopt_array($PHPCRM, array(
  CURLOPT_URL=>$WebURL.'/index.php/crm_api/leads/add_lead/'.$Token_Key,
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS => $post_data,
));

$response = curl_exec($PHPCRM);
curl_close($PHPCRM);
header("Location:thanks.php");
exit();
//echo $response;
?>