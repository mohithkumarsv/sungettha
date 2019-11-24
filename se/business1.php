
<?php 
   require_once "Mail.php";  

$name = $_POST['BusinessFirstName'];
$mobile = $_POST['BusinessTelephone'];
$address = $_POST['BusinessAddress'];
$Description = $_POST['BusinessDescription'];
$email = $_POST['BusinessEmail'];
$company = $_POST['BusinessCompany'];
$lastname = $_POST['BusinessLastName'];    
$city = $_POST['BusinessCity'];
$size = $_POST['BusinessSize']; 
$code = $_POST['BusinessPostCode']; 

$from = $_POST['BusinessEmail']; 
//echo $from;
$to = "info@sungeetha.com"; 
$subject = 'Business Email sending '; 



$body = "
<html>
<head>
<title>HTML email</title>
</head>
<body>
<table>
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
<th>Address</th>
<th>".$address."</th>
</tr>
<tr>
<th>Description</th>
<th>".$Description."</th>
</tr>
<tr>
<th>company</th>
<th>".$company."</th>
</tr>
<tr>
<th>city</th>
<th>".$city."</th>
</tr>
<tr>
<th>size</th>
<th>".$size."</th>
</tr>
<tr>
<th>code</th>
<th>".$code."</th>
</tr>
</table>
</body>
</html>
";



// Always set content-type when sending HTML email
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

// More headers
$headers .= 'From: <info@sungeetha.com>' . "\r\n";
$headers .= 'Cc: info@sungeetha.com' . "\r\n";


$mail=mail($to, "Subject: $subject",$body,$headers );
if($mail){
  echo "Thank you for using our mail form";
}else{
  echo "Mail sending failed."; 
}

  ?>