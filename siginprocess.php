<?php

session_start();

$m = $_POST["mobile"];
$p = $_POST["password"];

$dbms = new mysqli("localhost", "root", "Madushi927@", "payment_app", "3306");
$q = "SELECT * FROM customer WHERE `mobile`='".$m."' AND `pw`='".$p."' ";
$r = $dbms->query($q);
$n = $r->num_rows;

if($n==1){
    $data = $r->fetch_assoc();
    $_SESSION["user"] = $data;
    echo "1";
}else {
    echo "2";
}
