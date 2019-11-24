

<?php 
   require_once "mailer.php";  
echo $select = $_POST['Electricvehicless'];
echo "  "  ;
echo $name = $_POST['ElectricvehicleFirstNames'];
echo "  "  ;
echo $mobile = $_POST['ElectricvehicleTelephones'];
echo "  "  ;
echo $address = $_POST['ElectricvehicleAddresss'];
echo "  "  ;

echo $email = $_POST['ElectricvehicleEmails'];
echo "  "  ;

echo $lastname = $_POST['ElectricvehicleLastNames'];    
echo "  "  ;
echo $city = $_POST['ElectricvehicleCitys'];
echo "  "  ;

echo $Company = $_POST['Electricvehiclecompanys']; 
echo "  "  ;

$from = $_POST['ElectricvehicleEmails']; 
//echo $from;
$to = "mohith.svarks@gmail.com"; 
$subject = 'Electricvehicle Mail send  '; 


$body = "
<html>
<head>
<title>HTML email</title>
<style>
table.maildetails {
    border: 1px solid;
}
.maildetails tr th {
    padding: 4px 5px;
    margin: 5px;
    border: 1px solid;
        text-align: left;
}
</style>
</head>
<body>

<table class='maildetails'>
<tr>
<th>Firstname</th>
<th>".$name."</th>
</tr>
<tr>
<th>lastname</th>
<th>".$lastname."</th>
</tr>
<tr>
<th>Mobile</th>
<th>".$mobile."</th>
</tr>
<tr>
<th>email</th>
<th>".$email."</th>
</tr>
<tr>
<th>address</th>
<th>".$address."</th>
</tr>

<tr>
<th>city</th>
<th>".$city."</th>
</tr>

<tr>
<th>compnay</th>
<th>".$Company."</th>
</tr>

<tr>
<th>select options</th>
<th>".$select."</th>
</tr>
</table>
</body>
</html>
";

// Always set content-type when sending HTML email
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

// More headers
$headers .= 'From: <mohith.svarks@gmail.com>' . "\r\n";
$headers .= 'Cc: mohith.svarks@gmail.com' . "\r\n";


$mail=mail($to, "Subject: $subject",$body,$headers );
if($mail){
  echo "Thank you for using our mail form";
}else{
  echo "Mail sending failed."; 
}


  ?>