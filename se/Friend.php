

<?php 
   require_once "Mail.php";  

echo $CustomerName = $_POST['form-CustomerName'];
echo "  "  ;
echo $CustomerId = $_POST['form-CustomerId'];
echo "  "  ;
echo $email = $_POST['form-Email'];
echo "  "  ;

echo $phone = $_POST['form-phone'];
echo "  "  ;

echo $pcname = $_POST['form-pcname'];    
echo "  "  ;
echo $address = $_POST['form-address'];
echo "  "  ;

echo $pcmobile = $_POST['form-PCmobile']; 
echo "  "  ;
echo $PCsystem = $_POST['form-PCsystem'];
echo "  "  ;

$from = $_POST['form-Email']; 
//echo $from;
$to = "info@sungeetha.com"; 
$subject = 'Friend a freinds Mail send  '; 


$body = "
<html>
<head>
<title>HTML email</title>
</head>
<body>

<table>
<tr>
<th>Customer Name</th>
<th>".$CustomerName."</th>
</tr>
<tr>
<th>Customer Id</th>
<th>".$CustomerId."</th>
</tr>
<tr>
<th>Mobile</th>
<th>".$email."</th>
</tr>
<tr>
<th>phone</th>
<th>".$phone."</th>
</tr>
<tr>
<th>prospective customer</th>
<th>".$pcname."</th>
</tr>

<tr>
<th>Address</th>
<th>".$address."</th>
</tr>

<tr>
<th>prospective Customer Mobile</th>
<th>".$pcmobile."</th>
</tr>

<tr>
<th>Type of System</th>
<th>".$PCsystem."</th>
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