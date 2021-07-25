<!DOCTYPE html>
<html>

<head>
    <title>Product</title>
    <link rel="stylesheet" href="products.css">
</head>

<body>

    <h3 id="n" class="u"><?php

                session_start();

                if (isset($_SESSION["user"])) {
                    $d = $_SESSION["user"];
                    echo $d["name"];
                }

                ?></h3>

    <h1 class="h1">Products</h1>

    <table class="t">

        <tr class="tr1">
            <td>id</td>
            <td>Name</td>
            <td>Price</td>
            <td>Quantity</td>
            <td>Action</td>
        </tr>

        <?php

        $dbms = new mysqli("localhost", "root", "Madushi927@", "payment_app", "3306");
        $q = "SELECT * FROM product";
        $r = $dbms->query($q);
        $n = $r->num_rows;

        for ($x = 0; $x < $n; $x++) {

            $data = $r->fetch_assoc();

        ?>

            <tr>
                <td><?php echo $data["id"] ?></td>
                <td><?php echo $data["name"] ?></td>
                <td>Rs. <?php echo $data["price"] ?></td>
                <td><?php echo $data["qty"] ?></td>
                <td><button class="btn" onclick="buyNow(<?php echo $data['id'] ?>)">Buy It Now</button></td>
            </tr>

        <?php

        }

        ?>

    </table>

    <script src="product.js"></script>
    <script type="text/javascript" src="https://www.payhere.lk/lib/payhere.js"></script>


</body>

</html>

<!-- id16418361_payment_app	id16418361_root -->