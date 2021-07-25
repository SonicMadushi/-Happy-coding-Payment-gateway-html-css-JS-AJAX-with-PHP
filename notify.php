<?php
$merchant_id         = $_POST['merchant_id'];
$order_id             = $_POST['order_id'];
$payhere_amount     = $_POST['payhere_amount'];
$payhere_currency    = $_POST['payhere_currency'];
$status_code         = $_POST['status_code'];
$md5sig                = $_POST['md5sig'];
$merchant_secret = '4q7yC0bYzbu8cP9EoBOJYh4KC4Ij1vRm54ubOEEsoyG4'; // Replace with your Merchant Secret (Can be found on your PayHere account's Settings page)
$local_md5sig = strtoupper (md5 ( $merchant_id . $order_id . $payhere_amount . $payhere_currency . $status_code . strtoupper(md5($merchant_secret)) ) );
if (($local_md5sig === $md5sig) AND ($status_code == 2) ){
        //TODO: Update your database as payment success

        $dbms = new mysqli("localhost","root","Madushi927@","payment_app","3306");
        $q = "SELECT `qty` FROM product WHERE `id`='".$order_id."';";
        $resultset = $dbms->query($q);

        $r = $resultset->fetch_assoc();
        $qty =  $r["qty"];

        $newqty = $qty-1;

        $q2 = "UPDATE product SET `qty`='".$newqty."' WHERE `id`='".$order_id."';";
        $dbms->query($q2);
}

//jo(~gC>4n(oh~ekV
?>