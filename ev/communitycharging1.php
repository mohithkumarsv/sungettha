<?php 
   require_once "mailer.php"; 
   

echo $Electricvehiclesq = $_POST['Electricvehicles'];
echo "  "  ;

echo $FirstName = $_POST['communitychargingFirstNames'];
echo "  "  ;

echo $Telephone = $_POST['communitychargingTelephones'];
echo "  "  ;

echo $Select = $_POST['Community_chargingss'];
echo "  "  ;

echo $LastName = $_POST['communitychargingsLastNames'];
echo "  "  ;

echo $Emails = $_POST['communitychargingsEmails'];
echo "  "  ;

echo $noofwheelers = $_POST['communitychargingsnoof2wheelerss'];    
echo "  "  ;

echo $noflasta = $_POST['communitychargingsnoflastas'];
echo "  "  ;

echo $unityuse = $_POST['communitychargingscommunityuses']; 
echo "  "  ;

echo $Fourwheelers = $_POST['communitychargings4wheelerss']; 
echo "  "  ;

echo $normalcharger = $_POST['communitychargingsnormalchargers']; 
echo "  "  ;

echo $apartmentnowheelers = $_POST['communitychargingsapartmentno4wheelerss']; 
echo "  "  ;

echo $gatedcommunityusesq = $_POST['gatedcommunityuses']; 
echo "  "  ;

echo $gatedcommunityno4wheelerssq = $_POST['gatedcommunityno4wheelerss']; 
echo "  "  ;

echo $domenticLastNamesq = $_POST['domenticLastNames']; 
echo "  "  ;

echo $CSRnamesq = $_POST['CSRnames']; 
echo "  "  ;

echo $corporatecompanynoofchargerssq = $_POST['corporatecompanynoofchargerss']; 
echo "  "  ;

echo $corporatecompanyfastchargersq = $_POST['corporatecompanyfastchargers']; 
echo "  "  ;

echo $corporatecompanynofofourwheelrssq = $_POST['corporatecompanynofofourwheelrss']; 
echo "  "  ;

echo $shoppingcomplexnoofchargerssq = $_POST['shoppingcomplexnoofchargerss']; 
echo "  "  ;

echo $shoppingcomplexnormalchargerssq = $_POST['shoppingcomplexnormalchargerss']; 
echo "  "  ;

echo $shoppingcomplexnoofwheelerssq = $_POST['shoppingcomplexnoofwheelerss']; 
echo "  "  ;

echo $parkinglotnofochargessq = $_POST['parkinglotnofochargess']; 
echo "  "  ;

echo $parkinglotfastchargersq = $_POST['parkinglotfastchargers']; 
echo "  "  ;

echo $parkinglotmaxnoofwheerlsersq = $_POST['parkinglotmaxnoofwheerlsers']; 
echo "  "  ;


$from = $_POST['communitychargingsEmails']; 
//echo $from;
$to = "mohith.svarks@gmail.com"; 
$subject = 'Communitycharging Mail send  '; 


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
<th>select options</th>
<th>".$Electricvehiclesq."</th>
</tr>
<tr>
<th>Firstname</th>
<th>".$FirstName."</th>
</tr>
<tr>
<th>lastname</th>
<th>".$LastName."</th>
</tr>
<tr>
<th>Mobile</th>
<th>".$Telephone."</th>
</tr>
<tr>
<th>email</th>
<th>".$Emails."</th>
</tr>
<tr>
<th>Community details</th>
<th>".$Select."</th>
</tr>


<tr>-------------School/college/institute ------------</tr>
<tr>
<th>Number of 4 wheelers/number of 2 wheelers  </th>
<th>".$noofwheelers."</th>
</tr>



<tr>-------------Apartment ------------</tr>
<tr>
<th>Number of flats:</th>
<th>".$noflasta."</th>
</tr>
<tr>
<th>Charger requirement by self-use/ community use :</th>
<th>".$unityuse."</th>
</tr>

<tr>
<th>If self-use 2 Wheeler/4 Wheeler:</th>
<th>".$Fourwheelers."</th>
</tr>

<tr>
<th>Charger type Fast charger / normal charger :</th>
<th>".$normalcharger."</th>
</tr>

<tr>
<th>Number of 4 wheelers/number of two wheelers:</th>
<th>".$apartmentnowheelers."</th>
</tr>



<tr>-------------Gated community ------------</tr>
<tr>
<th>Charger requirement by self-use/ community use</th>
<th>".$gatedcommunityusesq."</th>
</tr>
<tr>
<th>Charger type Fast charger / normal charger :</th>
<th>".$gatedcommunityno4wheelerssq."</th>
</tr>
<tr>
<th>If self-use 2 Wheeler/4 Wheeler:</th>
<th>".$domenticLastNamesq."</th>
</tr>

<tr>-------------Corporate/company------------</tr>
<tr>
<th>Number of chargers required:</th>
<th>".$corporatecompanynoofchargerssq."</th>
</tr>
<tr>
<th>Fast charger / normal charger :</th>
<th>".$corporatecompanyfastchargersq."</th>
</tr>
<tr>
<th>Max Number of 4 wheelers/number of two wheelers :</th>
<th>".$corporatecompanynofofourwheelrssq."</th>
</tr>


<tr>-------------Shopping complex------------</tr>
<tr>
<th>Number of chargers required:</th>
<th>".$shoppingcomplexnoofchargerssq."</th>
</tr>

<tr>
<th>Fast charger / normal charger :</th>
<th>".$shoppingcomplexnormalchargerssq."</th>
</tr>
<tr>
<th>Max Number of 4 wheelers/number of two wheelers : </th>
<th>".$shoppingcomplexnoofwheelerssq."</th>
</tr>


<tr>-------------Parking lot------------</tr>
<tr>
<th>Number of chargers required: </th>
<th>".$parkinglotnofochargessq."</th>
</tr>
<tr>
<th>Fast charger / normal charger :</th>
<th>".$parkinglotfastchargersq."</th>
</tr>
<tr>
<th>Max Number of 4 wheelers/number of two wheelers :</th>
<th>".$parkinglotmaxnoofwheerlsersq."</th>
</tr>


<tr>-------------CSR------------</tr>
<tr>
<th>CSR NAME with complete details CSR:</th>
<th>".$CSRnamesq."</th>
</tr>
<tr>



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