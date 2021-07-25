function signIn() {

    var m = document.getElementById("m").value;
    var p = document.getElementById("p").value;

    var form = new FormData();
    form.append("mobile", m);
    form.append("password", p);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var text = r.responseText;
            if (text == "1") {
                window.location = "product.php";
            } else {
                alert("Invalid Details");
            }
        }
    };

    r.open("POST", "siginprocess.php", true);
    r.send(form);

}