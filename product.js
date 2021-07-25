function buyNow(id) {

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var text = r.responseText;

            if (text == "2") {
                window.location = "index.php";
            } else if (text == "3") {
                alert("Invalide Product");
            } else {
                var j = JSON.parse(text);

                payhere.onCompleted = function onCompleted(orderId) {
                    alert("Payment completed")
                };

                payhere.onDismissed = function onDismissed() {
                    alert("Payment popup dismissed");
                };

                payhere.onError = function onError(error) {
                    alert("Invalid Details");
                };

                var n = document.getElementById("n").innerHTML;

                // Put the payment variables here
                var payment = {
                    "sandbox": true,
                    "merchant_id": "1217911", // Replace your Merchant ID
                    "return_url": "http://localhost/payment%20app/payment_app/return.php ", // Important
                    "cancel_url": "http://localhost/payment%20app/payment_app/cancel.php", // Important
                    "notify_url": "http://localhost/payment%20app/payment_app/notify.php",
                    "order_id": id,
                    "items": j.pn,
                    "amount": j.pp,
                    "currency": "LKR",
                    "first_name": j.un,
                    "last_name": "",
                    "email": j.ue,
                    "phone": j.um,
                    "address": "Malabe",
                    "city": "Kaduwela",
                    "country": "Sri Lanka",
                    "delivery_address": "Malabe",
                    "delivery_city": "Kaduwela",
                    "delivery_country": "Sri Lanka",

                };

                payhere.startPayment(payment);

            }

        }
    };

    r.open("GET", "buyNowProcess.php?pid=" + id, true);
    r.send();
}