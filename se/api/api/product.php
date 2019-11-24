<?php

$app->post('/addproduct', function ($request, $response, $args) {


if(json_encode(getAdminUserId()) == "false" ){
echo "no authentication";
exit();
}


$result =  new stdClass();
$files = $request->getUploadedFiles();

$item_name = $_POST['item_name'];
$item_deails = $_POST['item_deails'];
$price = $_POST['price'];

date_default_timezone_set('Asia/Kolkata');
$timezone = date_default_timezone_get();
$date1 = date('Y-m-d H:i:s', time());

if (empty($files['file'])) {          
$query = "insert into product_details (item_name,item_deails,price,created_date,updated_date) values ('".$item_name."','".$item_deails."','".$price."','".$date1."','".$date1."')";
$db = new DbHandler();
$dbresult = $db->insert($query);
$result->status = true ;

}else {
$target_dir = "upload/";
$newfile = $files['file'];
$newfile->moveTo($target_dir.$_FILES['file']['name']);

$image =$_FILES['file']['name'];
$query = "insert into product_details (item_name,item_deails,image,price,created_date,updated_date) values ('".$item_name."','".$item_deails."','".$image."','".$price."','".$date1."','".$date1."')";
$db = new DbHandler();
$dbresult = $db->insert($query);
$result->status = true ;
}
echo json_encode($result); 
});

$app->post('/updateProduct', function ($request, $response, $args) {


    if(json_encode(getAdminUserId()) == "false" ){
    echo "no authentication";
    exit();
    }
    
    
    $result =  new stdClass();
    $files = $request->getUploadedFiles();
    $id = $_POST['id'];
    $item_name = $_POST['item_name'];
    $item_deails = $_POST['item_deails'];
    $price = $_POST['price'];
    
    date_default_timezone_set('Asia/Kolkata');
    $timezone = date_default_timezone_get();
    $date1 = date('Y-m-d H:i:s', time());
    if (empty($files['file'])) {          
    $query = "update product_details item_name='".$item_name."', item_deails='".$item_deails."',price='".$price."',created_date='".$date1."',updated_date='".$date1."' where id ='".$id."' ";
    $db = new DbHandler();
    $dbresult = $db->insert($query);
    $result->status = true ;
    
    }else {
    $target_dir = "upload/";
    $newfile = $files['file'];
    $newfile->moveTo($target_dir.$_FILES['file']['name']);
    
    $image =$_FILES['file']['name'];
    $query = "update product_details item_name='".$item_name."', item_deails='".$item_deails."', image='".$image."',price='".$price."',created_date='".$date1."',updated_date='".$date1."' where id ='".$id."' ";
    $db = new DbHandler();
    $dbresult = $db->insert($query);
    $result->status = true ;
    }
    echo json_encode($result); 
    });

$app->post('/deleteproduct', function ($request, $response, $args) {

if(json_encode(getAdminUserId()) == "false" ){
echo "no authentication";
exit();
}

$result =  new stdClass();
$param =  $request->getParsedBody();
$id = $param['id'];
$db = new DbHandler();
$query = "delete from product_details where id =". $id ; 
$dbresult = $db->insert($query);
$result->status = true ;
echo json_encode($result); 
});


$app->post('/addSystemInfo', function ($request, $response, $args) {

if(json_encode(getAdminUserId()) == "false" ){
echo "no authentication";
exit();
}

$result =  new stdClass();
$files = $request->getUploadedFiles();

$contact_number = $_POST['contact_number'];
$orderEmail = $_POST['orderEmail'];
$email_id = $_POST['email_id'];
$tax = $_POST['tax'];

$genemail = $_POST['genemail'];
$tin = $_POST['tin'];
$servicetax = $_POST['servicetax'];
$address = $_POST['address'];

if (empty($files['file'])) {

$query = "update system_details set genemail='".$genemail."',tin = '".$tin."' , servicetax = '".$servicetax."' ,address = '".$address."' , contact_number='".$contact_number."',orderEmail='".$orderEmail."',email_id='".$email_id."',tax='".$tax."'where id= 1";

$db = new DbHandler();
$dbresult = $db->insert($query);
$result->status = true ;

}else {
$target_dir = "upload/";
$newfile = $files['file'];
$newfile->moveTo($target_dir.$_FILES['file']['name']);

$contact_number = $_POST['contact_number'];
$orderEmail = $_POST['orderEmail'];
$email_id = $_POST['email_id'];
$tax = $_POST['tax'];
$image =$_FILES['file']['name'];

$query = "update system_details set genemail='".$genemail."',tin = '".$tin."' , servicetax = '".$servicetax."' ,address = '".$address."',contact_number='".$contact_number."',orderEmail='".$orderEmail."',email_id='".$email_id."',tax='".$tax."',logo_url='".$image."'where id= 1";
$db = new DbHandler();
$dbresult = $db->insert($query);
$result->status = true ;
}
echo json_encode($result); 
});



$app->get('/getusers', function ($request, $response, $args) {

if(json_encode(getAdminUserId()) == "false" ){
echo "no authentication";
exit();
}

$result =  new stdClass();
$db = new DbHandler();
$query = "select ln.id,ln.userName,ln.firstName,ln.lastName,ln.phone,ln.email,ln.createdDate,ud.address,ud.address2,ud.pincode,ud.city,ud.ladmark,ud.state,ud.location from login as ln LEFT JOIN user_deatils as ud on ud.userId = ln.id where ln.type = 0 ORDER BY ln.id DESC ";
$dbresult = $db->getRecords($query);
$result->status = true ;
$result->data = $dbresult ;
echo json_encode($result);
});

$app->post('/cartinfo', function ($request, $response, $args) {
$result =  new stdClass();
$param =  $request->getParsedBody();

$db = new DbHandler();
$query = "select * from system_details order by id desc";
$dbresult = $db->getOneRecord($query);

date_default_timezone_set('Asia/Kolkata');
$timezone = date_default_timezone_get();
$date1 = date('Y-m-d H:i:s', time());

$tax =  $dbresult["tax"];
$cartdata = $param['cartdata'];
$totalItems  = count((array)$cartdata);
$userid = json_encode(getUserId());

if($userid == 'null' ){
$result->status = false ;
$result->data = "Please Login to continue"; 
echo json_encode($result);
exit();
}

$query = "select subscribe,active from login where id=". $userid;
$dbresult  = $db->getOneRecord($query);
$active = $dbresult['active'];

// echo json_encode($dbresult);
// exit();

if( $active  == 0 ){
$result->status = false ;
$result->data =  "Validate your prfile with an otp sent to your email ID " ;
echo json_encode($result);
exit();
}

$totalAmt = 0;
$orderid = "ORDS" . rand(10000,99999999);
for($i = 0 ; $i < $totalItems ; $i++ ){
$item_id = $cartdata[$i]["id"] ;
$quantity = $cartdata[$i]["qty"];
$days  = count((array)$cartdata[$i]["days"]); 
$price = $cartdata[$i]["price"]  * ( $quantity * $days );
$totalAmt =  $totalAmt + $price ;
$db = new DbHandler();
$query = "insert into purchase_details (user_id,item_id,quantity,days,price,orderid) values (".$userid.",'".$item_id."','".$quantity."','".$days."','".$price."','".$orderid."')";
$dbresult = $db->insert($query);
if($dbresult !== 0){
    for($j =0 ; $j < $days ; $j++ ){
        $date =  $cartdata[$i]["days"][$j]; 
        $query = "insert into purchase_dates(day,userid,itemid,orderid,createddate) values ('".$date."',".$userid.",".$item_id.",'".$orderid."','".$date1."')";
        $dbresult1 = $db->insert($query);
        //echo  $query;
    }
        $result->status = true ;
}else {
        $result->status = false ;
}
}

if($result->status){
    $totalAmt = ($totalAmt * $tax)/100 + $totalAmt  ; 
    $query = "insert into purchase_info(orderid,total,date,status) values ('".$orderid."',".$totalAmt.",'".$date1."',0)";
    $dbresult2 = $db->insert($query);
    if($dbresult2 !== 0){
    $result->status = true ;
    $result->data =  $orderid ;
    }else{
    $result->status = false ;
    }
}
echo json_encode($result);
});


$app->post('/getorder', function ($request, $response, $args) {
$result =  new stdClass();
$param =  $request->getParsedBody();
$orderid = $param['orderid'];
$db = new DbHandler();
$query = "select lg.phone,lg.email,pds.item_name,pd.quantity,pd.price,pd.days,pd.orderid,pd.user_id from purchase_details as pd LEFT JOIN product_details as pds on pd.item_id = pds.id LEFT JOIN login as lg on lg.id = pd.user_id  where pd.orderid ='".$orderid."'" ;
$dbresult = $db->getRecords($query);
$query = "select * from system_details order by id desc";
$dbresult1 = $db->getOneRecord($query);
$tax =  $dbresult1["tax"];
$result->status = true ;
$result->data = new stdClass();
$result->data->cart = $dbresult ;
$result->data->tax = $tax ;
echo json_encode($result);
});


$app->post('/updatepaymentInfo', function ($request, $response, $args) {
$result =  new stdClass();
$param =  $request->getParsedBody();
$orderid = $param['orderid'];
$TXNAMOUNT = $param['TXNAMOUNT'];
$CURRENCY = $param['CURRENCY'];
$BANKTXNID = $param['BANKTXNID'];
$STATUS = $param['STATUS'];
$RESPCODE = $param['RESPCODE'];
$CHECKSUMHASH = $param['CHECKSUMHASH'];
$PAYMENTMODE = $param['PAYMENTMODE'];
$TXNID = $param['TXNID'];
$TXNDATE = $param['TXNDATE'];

$db = new DbHandler();
$query = "select * from system_details order by id desc";
$dbresult1 = $db->getOneRecord($query);

$orderEmail =  $dbresult1["orderEmail"] ;
$variables['tax'] =   $dbresult1["tax"];
$variables['TIN'] =   $dbresult1["tin"];
$variables['Stax'] =   $dbresult1["servicetax"];
$variables['cmpAddress']  = $dbresult1["address"];
$variables['orDate'] =  date('Y-m-d');
$variables['InvoiceDate'] =  date('Y-m-d');

$variables['Total'] = $TXNAMOUNT;
$variables['orderid'] = $orderid;

$db = new DbHandler();
$query = "update purchase_info set status ='".$STATUS."' , respcode = '".$RESPCODE."' , txnamount ='".$TXNAMOUNT."' , txnid = '".$TXNID."' , CHECKSUMHASH = '".$CHECKSUMHASH."' , BANKTXNID = '".$BANKTXNID."' , CURRENCY = '".$CURRENCY."' , TXNDATE = '".$TXNDATE."' ,  PAYMENTMODE ='".$PAYMENTMODE."' where orderid ='".$orderid."'";

$db->insert($query);
$template = file_get_contents("mail_templates/orderConfirmation.html");
$db = new DbHandler();
$query = "select pds.item_name,pd.quantity,pd.price,pd.days,pd.orderid,pd.user_id,ln.email,ln.phone,ln.firstName,ln.lastName,ud.address,ud.address2,ud.location,ud.city,ud.pincode from purchase_details as pd LEFT JOIN product_details as pds on pd.item_id = pds.id LEFT JOIN login as ln on ln.id = pd.user_id LEFT JOIN user_deatils as ud on ud.userId = ln.id  where pd.orderid ='".$orderid."'" ;
$item = $db->getRecords($query);

$tempPrice = 0 ;
$itemDetails = '';
foreach($item as $item){    
$to = $item["email"];
$variables['userName'] =   $item["firstName"] ." ".$item["lastName"];
$variables['Address']  = $item["address"] .",". $item["address2"] .",". $item["location"]  .",".$item["city"].$item["pincode"];
$itemDetails = $itemDetails. "<table style='width: 100%;'><table style='width: 100%;'><tbody><tr><th style='font-weight: normal;width: 30%'>" . $item['item_name']."</th>";
$itemDetails = $itemDetails. "<th style='font-weight: normal;width: 30%'>" .$item['quantity']."</th>";
$itemDetails = $itemDetails. "<th style='font-weight: normal;width: 30%'>" .$item['days']."</th>";
$itemDetails = $itemDetails. "<th style='font-weight: normal;width: 30%'>" .$item['price']."</th>";
$itemDetails = $itemDetails. "</tr></tbody></table>" ;
$tempPrice =   $tempPrice + $item['price'];

}

$variables['Taxrate'] =  $tempPrice * ($variables['tax']  /100);
$variables["items"] = $itemDetails;


foreach($variables as $key => $value) {
$template = str_replace('{{'.$key.'}}', $value, $template);
}

$subject ="Order Confirmation ";

if($STATUS == 'TXN_SUCCESS'){
$mail_status = sent_mail($to,$subject,$template,$orderEmail);

$mobile = $item["phone"];
$name = $item["firstName"];
$smsText =  urlencode('Dear '.(string)$name.",Thank you for ordering with Freshjoy.\r\n"
            ."your Order ID is ".(string)$variables['orderid'] .",\r\n"
            .'your order will be delivered as per subscribed dates');

$url = "http://198.15.98.50/API/pushsms.aspx?loginID=syed@freshjoy.in&password=joy123&mobile=".$mobile."&text=".$smsText."&senderid=FRSHJY&route_id=1&Unicode=0";
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_exec($ch);
curl_close($ch);
}

$dbresult = $db->insert($query);
$result->status = true ;
$result->data = $dbresult ;
$result->mail = $STATUS ;
$result->to = $to ;

echo json_encode($result);

});


$app->post('/MyOrderHistory', function ($request, $response, $args) {
$result =  new stdClass();
$param =  $request->getParsedBody();

$userid = json_encode(getUserId());
// $userid = 1 ;

if($userid == 'null' ){
$result->status = false ;
$result->data = "Please Login to continue"; 
echo json_encode($result);
exit();
}

$db = new DbHandler();
$query = "select pds.id,pds.item_name,pd.quantity,pd.price,pd.days,pd.orderid from purchase_details as pd LEFT JOIN product_details as pds on pd.item_id = pds.id where pd.user_id =".$userid ;
$dbresult1 = $db->getRecords($query);


$query = "select pd.day,pd.orderid from purchase_dates pd LEFT JOIN product_details as pds on pd.itemid = pds.id where pd.userid =".$userid ;
$dbresult2 = $db->getRecords($query);

$purchaseDetailsCount  =  count((array)$dbresult1);
$purchase_dates = count((array)$dbresult2);
for($i = 0;$i< $purchaseDetailsCount; $i++  ){
$dbresult1[$i]["days"] = new ArrayObject();
for($j= 0 ;$j < $purchase_dates ;$j++){
    if($dbresult1[$i]["orderid"] == $dbresult2[$j]["orderid"] ){

        $query = "select status,TXNDATE from purchase_info where orderid ='".$dbresult1[$i]["orderid"]."'" ;
        $dbresult3 = $db->getOneRecord($query);

        $dbresult1[$i]["days"]->append($dbresult2[$j]["day"]);
        if($dbresult3["status"]  == "TXN_SUCCESS"){
            $dbresult1[$i]["status"] = "success";
            $dbresult1[$i]["TXNDATE"] = $dbresult3["TXNDATE"];
            
        }else{
                $dbresult1[$i]["status"] = "faild";
                $dbresult1[$i]["TXNDATE"] = $dbresult3["TXNDATE"];
        }
        
    }
}
}
$result->status = true ;
$result->data = $dbresult1;
echo json_encode($result);
});

$app->post('/orders', function ($request, $response, $args) {
if(json_encode(getAdminUserId()) == "false" ){
echo "no authentication";
exit();
}

$result =  new stdClass();
$param =  $request->getParsedBody();
$db = new DbHandler();
$query = "select pds.item_name,login.id,pd.quantity,pd.price,pd.days,pd.orderid,login.userName,login.firstName,login.lastName,login.phone,login.email,ud.location,ud.pincode,ud.address,ud.address2,ud.city,ud.ladmark,ud.state from purchase_details as pd LEFT JOIN product_details as pds on pd.item_id = pds.id  LEFT JOIN login on pd.user_id = login.id LEFT JOIN user_deatils ud on pd.user_id = ud.userId" ;
$dbresult1 = $db->getRecords($query);

$query = "select pds.item_name,pd.day,pd.orderid from purchase_dates pd LEFT JOIN product_details as pds on pd.itemid = pds.id " ;
$dbresult2 = $db->getRecords($query);

$purchaseDetailsCount  =  count((array)$dbresult1);
$purchase_dates = count((array)$dbresult2);

for($i = 0;$i< $purchaseDetailsCount; $i++  ){
$dbresult1[$i]["days"] = new ArrayObject();
for($j= 0 ;$j < $purchase_dates ;$j++){
    if($dbresult1[$i]["orderid"] == $dbresult2[$j]["orderid"] ){

        $query = "select status,TXNDATE,date from purchase_info where orderid ='".$dbresult1[$i]["orderid"]."'" ;
        $dbresult3 = $db->getOneRecord($query);

        $dbresult1[$i]["days"]->append($dbresult2[$j]["day"]);
        if($dbresult3["status"]  == "TXN_SUCCESS"){
            $dbresult1[$i]["status"] = "success";
            $dbresult1[$i]["TXNDATE"] = $dbresult3["date"];
            
        }else{
                $dbresult1[$i]["status"] = "faild";
                $dbresult1[$i]["TXNDATE"] = $dbresult3["date"];
        }                
    }
}
}

$result->status = true ;
$result->data = $dbresult1;
echo json_encode($result);

});


$app->post('/orderbydate', function ($request, $response, $args) {

if(json_encode(getAdminUserId()) == "false" ){
echo "no authentication";
exit();
}

$result =  new stdClass();
$param =  $request->getParsedBody();
$date = $param['Date'];

$db = new DbHandler();
$query = "select pds.item_name,pd.day,pd.orderid from purchase_dates pd LEFT JOIN product_details as pds on pd.itemid = pds.id where pd.day = '".$date."' " ;
$dbresult = $db->getRecords($query);
$purchase_dates = count((array)$dbresult);
$dbresult1 = new ArrayObject();
for($i = 0;$i< $purchase_dates; $i++ ){
//echo $dbresult[$i]["orderid"]; 
$query = "select pds.item_name,pd.quantity,pd.price,pd.days,pd.orderid,login.id,login.userName,login.firstName,login.lastName,login.phone,login.email,ud.location,ud.pincode,ud.address,ud.address2,ud.city,ud.ladmark,ud.state from purchase_details as pd LEFT JOIN product_details as pds on pd.item_id = pds.id  LEFT JOIN login on pd.user_id = login.id LEFT JOIN user_deatils ud on pd.user_id = ud.userId where pd.orderid = '".$dbresult[$i]["orderid"]."' order by pd.id desc" ;
$dbresult1->append($db->getRecords($query)[0]);
}
// order by pd.createddate desc 
$purchaseDetailsCount  =  count((array)$dbresult1);
for($i = 0;$i< $purchaseDetailsCount; $i++  ){
$dbresult1[$i]["days"] = new ArrayObject();
for($j= 0 ;$j < $purchase_dates ;$j++){
    if($dbresult1[$i]["orderid"] == $dbresult[$j]["orderid"] ){
        $query = "select id,status,TXNDATE,date from purchase_info where orderid ='".$dbresult1[$i]["orderid"]."'" ;
        $dbresult3 = $db->getOneRecord($query);
        $dbresult1[$i]["days"]->append($dbresult[$j]["day"]);
        if($dbresult3["status"]  == "TXN_SUCCESS"){
            $dbresult1[$i]["status"] = "success";
            $dbresult1[$i]["purchaseId"] =  $dbresult3["id"] ;
            $dbresult1[$i]["TXNDATE"] = $dbresult3["date"];
            
        }else{
                $dbresult1[$i]["status"] = "faild";
                $dbresult1[$i]["TXNDATE"] = $dbresult3["date"];
        }
        
    }
}
}


$result->status = true ;
$result->data = $dbresult1;
echo json_encode($result);

});





$app->post('/subscribe', function ($request, $response, $args) {
$result =  new stdClass();
$param =  $request->getParsedBody();

$cartdata = $param['cartdata'];
$totalItems  = count((array)$cartdata);
$orderid = "ORDS" . rand(10000,99999999);

$userid = json_encode(getUserId());

if($userid == 'null' ){
$result->status = false ;
$result->data = "Please Login to continue"; 
echo json_encode($result);
exit();
}

$db = new DbHandler();
$query = "select subscribe,active from login where id=". $userid;
$dbresult  = $db->getOneRecord($query);

$subscribe = $dbresult['subscribe'];
$active = $dbresult['active'];

date_default_timezone_set('Asia/Kolkata');
$timezone = date_default_timezone_get();
$date1 = date('Y-m-d H:i:s', time());

if( $subscribe  == 1 ){
$result->status = false ;
$result->data =  "Already enjoyed the free trail, ready to subscibe" ;
echo json_encode($result);
exit();
}

if( $active  == 0 ){
$result->status = false ;
$result->data =  "Activate your profile to subscribe  " ;
echo json_encode($result);
exit();
}


$query = "update login set subscribe = 1 where id=". $userid;
$dbresult = $db->insert($query);


for($i = 0 ; $i < $totalItems ; $i++ ){
$item_id = $cartdata[$i]["id"] ;
$quantity = $cartdata[$i]["qty"];
$days  = count((array)$cartdata[$i]["days"]); 
$query = "insert into subscribe_details (user_id,item_id,quantity,days,orderid,date) values (".$userid.",'".$item_id."','".$quantity."','".$days."','".$orderid."','".$date1."')";
$dbresult = $db->insert($query);
if($dbresult !== 0){
    for($j =0 ; $j < $days ; $j++ ){
        $date =  $cartdata[$i]["days"][$j]; 
        
        $days1 = explode(":", $date);
        $date = $days1[0];

        $query = "insert into subscribe_dates(day,userid,itemid,orderid,createddate) values ('".$date."',".$userid.",".$item_id.",'".$orderid."','".$date1."')";
        $dbresult1 = $db->insert($query);

    }

    $template = file_get_contents("mail_templates/freeOrderConfirmation.html");
    $db = new DbHandler();
    $query = "select pd.item_name,sd.orderid,ln.id,ln.email,ln.phone,ln.firstName,ln.lastName,ud.address,ud.address2,ud.location,ud.city,ud.pincode from subscribe_details as sd LEFT JOIN product_details as pd on sd.item_id = pd.id LEFT JOIN login as ln on sd.user_id = ln.id LEFT JOIN user_deatils as ud on ud.userId = ln.id  where sd.orderid ='".$orderid."'" ;
    $item = $db->getRecords($query);

    $itemDetails = '';
    $to = '';
    foreach($item as $item){    
        $to = $item["email"];
        $variables['userName'] =   $item["firstName"] ." ".$item["lastName"];
        $variables['Address']  = $item["address"] .",". $item["address2"] .",". $item["location"]  .",".$item["city"].$item["pincode"];
        $itemDetails = $itemDetails. "<table style='width: 100%;'><table style='width: 100%;'><tbody><tr><th style='font-weight: normal;width: 30%'>" . $item['item_name']."</th>";
        $itemDetails = $itemDetails. "<th style='font-weight: normal;width: 30%'> 5 </th>";
        $itemDetails = $itemDetails. "<th style='font-weight: normal;width: 30%'> 3 </th>";
        $itemDetails = $itemDetails. "<th style='font-weight: normal;width: 30%'>  0 </th>";
        $itemDetails = $itemDetails. "</tr></tbody></table>" ;
        
    }


    $variables["items"] = $itemDetails;

    $query = "select * from system_details order by id desc";
    $dbresult = $db->getOneRecord($query);

    
    $variables['orderid'] =   $orderid;
    $variables['tax'] =   $dbresult["tax"];
    $variables['TIN'] =   $dbresult["tin"];
    $variables['Stax'] =   $dbresult["servicetax"];
    $variables['cmpAddress']  = $dbresult["address"];
    $variables['orDate'] =  date('Y-m-d');
    $variables['InvoiceDate'] =  date('Y-m-d');


    foreach($variables as $key => $value) {
        $template = str_replace('{{'.$key.'}}', $value, $template);
    }
    $subject ="Order Confirmation ";

    

    $mobile = $item["phone"];
    $name = $item["firstName"];
    $smsText =  urlencode('Dear '.(string)$name.",Thank you for ordering with Freshjoy.\r\n"
                ."your Order ID is ".(string)$orderid.",\r\n"
                .'your order will be delivered as per subscribed dates');

    $url = "http://198.15.98.50/API/pushsms.aspx?loginID=syed@freshjoy.in&password=joy123&mobile=".$mobile."&text=".$smsText."&senderid=FRSHJY&route_id=1&Unicode=0";
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_exec($ch);
    curl_close($ch);



    $mail_status = sent_mail($to,$subject,$template,$dbresult['orderEmail']);
    $result->status = true ;
    $result->data =  $orderid ;
}else {
        $result->status = false ;
}
}    
echo json_encode($result);

});



$app->post('/Mysubscribe', function ($request, $response, $args) {
$result =  new stdClass();
$param =  $request->getParsedBody();

$userid = json_encode(getUserId());

if($userid == 'null' ){
$result->status = false ;
$result->data = "Please Login to continue"; 
echo json_encode($result);
exit();
}

$db = new DbHandler();
$query = "select pds.item_name,pd.quantity,pd.days,pd.orderid from subscribe_details as pd LEFT JOIN product_details as pds on pd.item_id = pds.id where pd.user_id =".$userid ;
$dbresult1 = $db->getRecords($query);
$query = "select pd.day,pd.orderid from subscribe_dates pd LEFT JOIN subscribe_details as pds on pd.itemid = pds.id where pd.userid =".$userid ;
$dbresult2 = $db->getRecords($query);

$purchaseDetailsCount  =  count((array)$dbresult1);
$purchase_dates = count((array)$dbresult2);

for($i = 0;$i< $purchaseDetailsCount; $i++  ){
$dbresult1[$i]["days"] = new ArrayObject();
for($j= 0 ;$j < $purchase_dates ;$j++){
    if($dbresult1[$i]["orderid"] == $dbresult2[$j]["orderid"] ){
        $dbresult1[$i]["days"]->append($dbresult2[$j]["day"]);
    }
}
}

$result->status = true ;
$result->data = $dbresult1;
echo json_encode($result);
});




$app->post('/subscribeList', function ($request, $response, $args) {
$result =  new stdClass();
$param =  $request->getParsedBody();

$userid = json_encode(getUserId());

if($userid == 'null' ){
$result->status = false ;
$result->data = "Please Login to continue"; 
echo json_encode($result);
exit();
}

$db = new DbHandler();
$query = "select pds.item_name,pd.quantity,pd.days,pd.orderid,login.userName,login.firstName,login.lastName,login.id,login.phone,login.email,ud.location,ud.pincode,ud.address,ud.address2,ud.city,ud.ladmark,ud.state from subscribe_details as pd LEFT JOIN product_details as pds on pd.item_id = pds.id LEFT JOIN login on pd.user_id = login.id LEFT JOIN user_deatils ud on pd.user_id = ud.userId order by pd.id desc " ;
$dbresult1 = $db->getRecords($query);
$query = "select pds.id as pdsid, pd.day,pd.orderid,pd.createddate from subscribe_dates pd LEFT JOIN subscribe_details as pds on pd.itemid = pds.id " ;
$dbresult2 = $db->getRecords($query);

$purchaseDetailsCount  =  count((array)$dbresult1);
$purchase_dates = count((array)$dbresult2);

for($i = 0;$i< $purchaseDetailsCount; $i++  ){
$dbresult1[$i]["days"] = new ArrayObject();

for($j= 0 ;$j < $purchase_dates ;$j++){
    if($dbresult1[$i]["orderid"] == $dbresult2[$j]["orderid"] ){
        $dbresult1[$i]["days"]->append($dbresult2[$j]["day"]);
        $dbresult1[$i]["date"]  = $dbresult2[$j]["createddate"];
        $dbresult1[$i]["pdsid"]  = $dbresult2[$j]["pdsid"];
    }
}
}

$result->status = true ;
$result->data = $dbresult1;
echo json_encode($result);
});



$app->post('/cancelNextDay', function ($request, $response, $args) {
$result =  new stdClass();
$param =  $request->getParsedBody();


date_default_timezone_set('Asia/Kolkata');
$timezone = date_default_timezone_get();
$date1 = date('Y-m-d H:i:s', time());

$orderid = $param['orderid'];
$day = $param['day'];
$itemId = $param['itemid'];
$db = new DbHandler();
$query = "select * from purchase_dates where day = '".$day."' and orderid = '".$orderid."' and itemid =".$itemId ;

$dbresult = $db->getOneRecord($query);

if(!isset($dbresult["day"])){
$result->status = false ;
echo json_encode($result);
exit();
}

$date = $dbresult["day"];
$userid = $dbresult["userid"];
$item_id = $dbresult["itemid"];
$orderid = $dbresult["orderid"];
$credate = $dbresult["createddate"];
$query = "insert into cancelorder(day,userid,itemid,orderid,createddate,canceldate) values ('".$date."',".$userid.",".$item_id.",'".$orderid."','".$credate."','".$date1."')";
$dbresult1 = $db->insert($query);

$query = "delete from purchase_dates where id =". $dbresult["id"] ; 
$dbresult = $db->insert($query);    

$result->status = true ;
$result->data = $dbresult;
echo json_encode($result);
});




$app->post('/cancelorder', function ($request, $response, $args) {
$result =  new stdClass();
$param =  $request->getParsedBody();

date_default_timezone_set('Asia/Kolkata');
$timezone = date_default_timezone_get();
$date1 = date('Y-m-d H:i:s', time());

$orderid = $param['orderid'];
$itemId = $param["itemid"];
$db = new DbHandler();
$query = "select * from purchase_dates where orderid = '".$orderid."' and itemid = '".$itemId."'" ;
$dbresult = $db->getRecords($query);
$purchase_dates = count((array)$dbresult);

if($purchase_dates == 0){
    $result->status = false ;
    $result->data = "Order id not found" ;
    echo json_encode($result);
    exit();
}

for($i = 0;$i< $purchase_dates; $i++  ){

$date = $dbresult[$i]["day"];
$userid = $dbresult[$i]["userid"];
$item_id = $dbresult[$i]["itemid"];
$orderid = $dbresult[$i]["orderid"];
$credate = $dbresult[$i]["createddate"];
$query = "insert into cancelorder(day,userid,itemid,orderid,createddate,canceldate) values ('".$date."',".$userid.",".$item_id.",'".$orderid."','".$credate."','".$date1."')";
$dbresult12 = $db->insert($query);

$query = "delete from purchase_dates where id =". $dbresult[$i]["id"] ; 
$dbresult3 = $db->insert($query);  
}
$result->status = true ;

echo json_encode($result);
});



$app->post('/MycancelHistory', function ($request, $response, $args) {
$result =  new stdClass();
$param =  $request->getParsedBody();

$userid = json_encode(getUserId());
//$userid = "1" ;

if($userid == 'null' ){
$result->status = false ;
$result->data = "Please Login to continue"; 
echo json_encode($result);
exit();
}

$db = new DbHandler();
$query = "select pd.item_name,cod.day,cod.day,cod.orderid  from cancelorder as cod LEFT JOIN product_details as pd on pd.id = cod.itemid where cod.userid =".$userid ;
$dbresult1 = $db->getRecords($query);
$result->status = true ;
$result->data = $dbresult1;
echo json_encode($result);

});


$app->post('/cancelHistory', function ($request, $response, $args) {
$result =  new stdClass();
$param =  $request->getParsedBody();

$db = new DbHandler();
$query = "select pd.item_name,cod.day,cod.day,cod.orderid,ln.firstName,ln.id,ln.phone,ln.email from cancelorder as cod LEFT JOIN product_details as pd on pd.id = cod.itemid LEFT JOIN login as ln on ln.id  = cod.userid  " ;
$dbresult1 = $db->getRecords($query);

$result->status = true ;
$result->data = $dbresult1;
echo json_encode($result);

});


$app->post('/subscribebydate', function ($request, $response, $args) {

if(json_encode(getAdminUserId()) == "false" ){
echo "no authentication";
exit();
}

$result =  new stdClass();
$param =  $request->getParsedBody();
$date = $param['Date'];


$db = new DbHandler();
$query = "select pds.item_name,pd.day,pd.orderid from subscribe_dates pd LEFT JOIN product_details as pds on pd.itemid = pds.id where pd.day = '".$date."'" ;
$dbresult = $db->getRecords($query);

$purchase_dates = count((array)$dbresult);
$dbresult1 = new ArrayObject();
for($i = 0;$i< $purchase_dates; $i++ ){
//echo $dbresult[$i]["orderid"]; 
$query = "select pds.item_name,pd.quantity,pd.days,pd.orderid,login.id,login.userName,login.lastName,login.firstName,login.phone,login.email,ud.location,ud.pincode,ud.address,ud.address2,ud.city,ud.ladmark,ud.state,pd.date from subscribe_details as pd LEFT JOIN product_details as pds on pd.item_id = pds.id  LEFT JOIN login on pd.user_id = login.id LEFT JOIN user_deatils ud on pd.user_id = ud.userId where pd.orderid = '".$dbresult[$i]["orderid"]."'" ;
$dbresult1->append($db->getRecords($query)[0]);
}

$purchaseDetailsCount  =  count((array)$dbresult1);
for($i = 0;$i< $purchaseDetailsCount; $i++  ){
$dbresult1[$i]["days"] = new ArrayObject();
for($j= 0 ;$j < $purchase_dates ;$j++){
    if($dbresult1[$i]["orderid"] == $dbresult[$j]["orderid"] ){
        $dbresult1[$i]["days"]->append($dbresult[$j]["day"]);
    }
}
}

$result->status = true ;
$result->data = $dbresult1;
echo json_encode($result);

});


$app->post('/addtestimonial', function ($request, $response, $args) {

if(json_encode(getAdminUserId()) == "false" ){
echo "no authentication";
exit();
}

$result =  new stdClass();

$param =  $request->getParsedBody();
$user = $param['user'];
$text = $param['text'];
    
$query = "insert into testimonial (text,user) values ('".$user."','".$text."')";
$db = new DbHandler();
$dbresult = $db->insert($query);
$result->status = true ;
echo json_encode($result);
});


$app->post('/deletetestimonial', function ($request, $response, $args) {

if(json_encode(getAdminUserId()) == "false" ){
echo "no authentication";
exit();
}

$result =  new stdClass();

$param =  $request->getParsedBody();
$id = $param['id'];
    
$query = "delete from testimonial where id =". $id ; 
$db = new DbHandler();
$dbresult = $db->insert($query);
$result->status = true ;
echo json_encode($result);
});

$app->get('/gettestimonial', function ($request, $response, $args) {
$result =  new stdClass();
$db = new DbHandler();
$query = "select * from testimonial";
$dbresult = $db->getRecords($query);
$result->status = true ;
$result->data = $dbresult ;
echo json_encode($result);
});

$app->post('/addCategory', function ($request, $response, $args) {

if(json_encode(getAdminUserId()) == "false" ){
    echo "no authentication";
    exit();
}

$result =  new stdClass();
$param =  $request->getParsedBody();
 
$package=$param['package'];
$title=$param['title'];
$field1=$param['field1'];
$field2=$param['field2'];
$field3=$param['field3'];
$field4=empty($param['field4'])?'':$param['field4'];
$field5=empty($param['field5'])?'':$param['field5'];

$db = new DbHandler();
$query = "insert into locationEntitySolar (package,title,field1,field2,field3,field4,field5) values ('".$package."','".$title."','".$field1."','".$field2."','".$field3."','".$field4."','".$field5."')";
$dbresult = $db->insert($query);
if($dbresult !== 0){
        $result->status = true ;
}else {
        $result->status = false ;
}
    echo json_encode($result);

});
$app->get('/getCategory', function ($request, $response, $args) {

   

    $result =  new stdClass();
    $db = new DbHandler();
    $query = "select * from locationEntitySolar order by id desc ";
    $dbresult = $db->getRecords($query);
    $result->status = true ;
    $result->data = $dbresult ;
    echo json_encode($result);
});


$app->post('/deleteCategory', function ($request, $response, $args) {

    if(json_encode(getAdminUserId()) == "false" ){
    echo "no authentication";
    exit();
}

$result =  new stdClass();
$param =  $request->getParsedBody();
$id = $param['id'];
$db = new DbHandler();
$query = "delete from locationEntitySolar where id =". $id ; 
$dbresult = $db->insert($query);    
$result->status = true ;
echo json_encode($result);

});

$app->post('/adminlogin', function ($request, $response, $args) {
$result =  new stdClass();
$param =  $request->getParsedBody();
$userName = $param['userName'];
$password = $param['password'];
$db = new DbHandler();
$query = "select count(id) as count,token,id from login where type= 1 and userName ='".$userName."' and password ='".$password."'" ;
$dbresult  = $db->getOneRecord($query);

$token = $dbresult['token'];
$id = $dbresult['id'];

if( $dbresult['count']  == 1 ){
    $token = openssl_random_pseudo_bytes(16);
    $token = bin2hex($token);

    $query = "update login set token='".$token."' where id=". $dbresult['id'];
    $dbresult = $db->insert($query);

    $result->status = true ;
    $result->token =  $token;
}else {
        $result->status = false ;
}

echo json_encode($result);
});
 
$app->get('/getImageList', function ($request, $response, $args) {
    
        // if(json_encode(getAdminUserId()) == "false" ){
        //     echo "no authentication";
        //     exit();
        // }
    
        $result =  new stdClass();
        $db = new DbHandler();
        $query = "select * from imageEntitySolar order by id desc";
        $dbresult = $db->getRecords($query);
        $result->status = true ;
        $result->data = $dbresult ;
        echo json_encode($result);
});        

$app->post('/deleteImage', function ($request, $response, $args) {
        
            if(json_encode(getAdminUserId()) == "false" ){
            echo "no authentication";
            exit();
        }
    
        $result =  new stdClass();
        $param =  $request->getParsedBody();
        $id = $param['id'];

        $db = new DbHandler();
        $query = "delete from imageEntitySolar where id =". $id ; 
        $dbresult = $db->insert($query);  
        if($query){
            $filename=$param['url'];            
            unlink("upload/" .$filename);
        }  
        $result->status = true ;
        echo json_encode($result);
    
    });
    $app->post('/addImage', function ($request, $response, $args) {
        
        
        if(json_encode(getAdminUserId()) == "false" ){
        echo "no authentication";
        exit();
        }
        
        
        $result =  new stdClass();
        $files = $request->getUploadedFiles();
        
        $title = $_POST['title'];
        $description = $_POST['description'];
         
        date_default_timezone_set('Asia/Kolkata');
        $timezone = date_default_timezone_get();
        $date1 = date('Y-m-d H:i:s', time());
        

        if (!empty($files['file'])) {  
            $image = $_FILES['file']['name'];
            $result =  new stdClass();
            $db = new DbHandler();
            
                $target_dir = "upload/";
                $newfile = $files['file'];
                $newfile->moveTo($target_dir.$_FILES['file']['name']);                
                $query = "insert into imageEntitySolar (title,description,url) values ('".$title."','".$description."','".$image."')";
                $db = new DbHandler();
                $dbresult = $db->insert($query);
                $result->status = true ;
       
    }
        echo json_encode($result); 
}); 
$app->get('/getVideoList', function ($request, $response, $args) {
    
        // if(json_encode(getAdminUserId()) == "false" ){
        //     echo "no authentication";
        //     exit();
        // }
    
        $result =  new stdClass();
        $db = new DbHandler();
        $query = "select * from videoEntitySolar ";
        $dbresult = $db->getRecords($query);
        $result->status = true ;
        $result->data = $dbresult ;
        echo json_encode($result);
});        

$app->post('/deleteVideo', function ($request, $response, $args) {
        
            if(json_encode(getAdminUserId()) == "false" ){
            echo "no authentication";
            exit();
        }
    
        $result =  new stdClass();
        $param =  $request->getParsedBody();
        $id = $param['id'];

        $db = new DbHandler();
        $query = "delete from videoEntitySolar where id =". $id ; 
        $dbresult = $db->insert($query);  
        if($query){
            $filename=$param['url'];            
            unlink("upload/" .$filename);
        }  
        $result->status = true ;
        echo json_encode($result);
    
    });
    $app->post('/addVideo', function ($request, $response, $args) {                
        if(json_encode(getAdminUserId()) == "false" ){
        echo "no authentication";
        exit();
        }
        
        
        $result =  new stdClass();
        $files1 = $request->getUploadedFiles();

        $page = $_POST['page'];
        $title = $_POST['title'];
        $description = $_POST['description'];
         
        date_default_timezone_set('Asia/Kolkata');
        $timezone = date_default_timezone_get();
        $date1 = date('Y-m-d H:i:s', time());
        

        if (!empty($files1['file'])) {  
            $image = $_FILES['file']['name'];
            $result =  new stdClass();
            $db = new DbHandler();
            
                $target_dir = "upload/";
                $newfile = $files1['file'];
                $newfile->moveTo($target_dir.$_FILES['file']['name']);                
                $query = "insert into videoEntitySolar (page,title,description,url) values ('".$page."','".$title."','".$description."','".$image."')";
                $db = new DbHandler();
                $dbresult = $db->insert($query);
                $result->status = true ;
       
    }
        echo json_encode($result); 
});       
$app->post('/updateVideo', function ($request, $response, $args) {                
    if(json_encode(getAdminUserId()) == "false" ){
    echo "no authentication";
    exit();
    }
    
    
    $result =  new stdClass();
    $files1 = $request->getUploadedFiles();
    $id = $_POST['id'];
    $page = $_POST['page'];
    $title = $_POST['title'];
    $description = $_POST['description'];
     
    date_default_timezone_set('Asia/Kolkata');
    $timezone = date_default_timezone_get();
    $date1 = date('Y-m-d H:i:s', time());
    

    if (!empty($files1['file'])) {  
        $image = $_FILES['file']['name'];
        $result =  new stdClass();
        $db = new DbHandler();
        
            $target_dir = "upload/";
            $newfile = $files1['file'];
            $newfile->moveTo($target_dir.$_FILES['file']['name']);                
            $query = "update videoEntitySolar set page='".$page."',title='".$title."',description='".$description."',url='".$image."' where id ='".$id."' ";
            $db = new DbHandler();
            $dbresult = $db->insert($query);
            $result->status = true ;

}
    echo json_encode($result); 
});