

<?php 
   require_once "mailer.php";  

echo $name = $_POST['DomenticFirstName'];
echo "  "  ;
echo $mobile = $_POST['DomenticTelephone'];
echo "  "  ;
echo $address = $_POST['DomenticAddress'];
echo "  "  ;

echo $email = $_POST['DomenticEmail'];
echo "  "  ;

echo $lastname = $_POST['DomenticLastName'];    
echo "  "  ;
echo $city = $_POST['DomenticCity'];
echo "  "  ;

echo $code = $_POST['DomenticCode']; 
echo "  "  ;

$from = $_POST['DomenticEmail']; 
//echo $from;
$to = "mohith.svarks@gmail.com"; 
$subject = 'Domentic Mail send  '; 


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
<th>email</th>
<th>".$address."</th>
</tr>

<tr>
<th>city</th>
<th>".$city."</th>
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
$headers .= 'From: <mohith.svarks@gmail.com>' . "\r\n";
$headers .= 'Cc: mohith.svarks@gmail.com' . "\r\n";


$mail=mail($to, "Subject: $subject",$body,$headers );
if($mail){
  echo "Thank you for using our mail form";
}else{
  echo "Mail sending failed."; 
}


  ?>