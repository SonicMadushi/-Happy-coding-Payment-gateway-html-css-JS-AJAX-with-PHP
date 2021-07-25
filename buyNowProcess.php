<?php

session_start();

$productId = $_GET["pid"];

if (isset($_SESSION["user"])) {

    $dbms = new mysqli("localhost", "root", "Madushi927@", "payment_app", "3306");
    $q = "SELECT * FROM product WHERE id = '" . $productId . "' ";
    $result_set = $dbms->query($q);
    $n = $result_set->num_rows;

    if ($n == 1) {

        $data = $result_set->fetch_assoc();

        $pname = $data["name"];
        $price = $data["price"];

        $user = $_SESSION["user"];
        $uname = $user["name"];
        $uemail = $user["email"];
        $umobile = $user["mobile"];

        $j = '{"pn":"' . $pname . '", "pp":"' . $price . '", "un":"' . $uname . '" , "ue":"' . $uemail . '" , "um":"' . $umobile . '"  }';
        echo $j;
    } else {
        echo "3";
    }
} else {
    echo "2";
}
