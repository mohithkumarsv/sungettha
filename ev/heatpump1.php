

<?php 
   require_once "mailer.php";  

echo $name = $_POST['HeatFirstName'];
echo "  "  ;
echo $lastname = $_POST['HeatLastname'];    
echo "  "  ;
echo $mobile = $_POST['HeatTelephone'];
echo "  "  ;
echo $address = $_POST['HeatAddress'];
echo "  "  ;

echo $email = $_POST['HeatEmail'];
echo "  "  ;


echo $Heatwater = $_POST['Heatwater'];
echo "  "  ;

echo $Description = $_POST['HeatDescription']; 
echo "  "  ;

$from = $_POST['DomenticEmail']; 
//echo $from;
$to = "mohith.svarks@gmail.com"; 
$subject = 'Heat pump Mail send  '; 


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
<th>Hot water required for day (LPD) in liters </th>
<th>".$Heatwater."</th>
</tr>

<tr>
<th>code</th>
<th>".$Description."</th>
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