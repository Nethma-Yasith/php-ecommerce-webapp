function register() {

    var f = document.getElementById("f");
    var l = document.getElementById("l");
    var e = document.getElementById("e");
    var m = document.getElementById("m");
    var p = document.getElementById("p");
    var g = document.getElementById("g");



    var form = new FormData;

    form.append("f", f.value);
    form.append("l", l.value);
    form.append("e", e.value);
    form.append("p", p.value);
    form.append("m", m.value);
    form.append("g", g.value);

    var request = new XMLHttpRequest();

    request.onreadystatechange = function () {
        if (request.readyState == 4) {
            var text = request.responseText;
            if (text == "1") {
                alert("Success!");
                window.location = "signin.php";

            } else {
                alert(text);
            }

        }
    };

    request.open("POST", "registerProcess.php", true);
    request.send(form);
}


function Signin() {



    var email = document.getElementById("email2");
    var password = document.getElementById("password2");
    var rememberme = document.getElementById("rememberme");


    var f = new FormData();

    f.append("e", email.value);
    f.append("p", password.value);
    f.append("r", rememberme.checked);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function () {
        if (r.readyState == 4) {

            var t = r.responseText;

            if (t == "success") {
                window.location = "index.php";

            } else {
                alert(t);
            }

        }
    };

    r.open("POST", "signinProcess.php", true);
    r.send(f);

}
function addToCart(id) {
    var r = new XMLHttpRequest();
    r.onreadystatechange = function () {
        if (r.readyState == 4) {
            var t = r.responseText;
            if (t == 2) {
                alert("Please Sign In or Register");
            } else if (1) {
                alert("Product add to cart successfully");
                location.reload();
            } else {
                alert("Something went wrong Please try agin later ");

            }
        }
    }
    r.open("GET", "addToCartProcess.php?id=" + id, true);
    r.send();
}
function delete_fromCart(id) {
    var r = new XMLHttpRequest();
    r.onreadystatechange = function () {
        if (r.readyState == 4) {
            var t = r.responseText;
            if (t == "1") {
                alert("Product Removed From Cart");
                location.reload();
            } else {
                alert(t);
            }
        }
    }

    r.open("GET", "deleteFromCartProcess.php?id=" + id, true);
    r.send();
}
function addToWatchlist(id) {
    var r = new XMLHttpRequest();
    r.onreadystatechange = function () {
        if (r.readyState == 4) {
            var t = r.responseText;
            // alert(t);

            if (t == 1) {
                window.location.reload();
                alert("added");
            } else if (t == 2) {
                alert("removed");
                window.location.reload();
            } else {
                alert(t)
            }
        }
    }
    r.open("GET", "addtoWatchlistProcess.php?id=" + id, true);
    r.send();
}
function changeProductImage() {
    var image = document.getElementById("imageuploader");

    image.onchange = function () {

        var file_count = image.files.length;

        if (file_count <= 7) {
            for (var x = 0; x < file_count; x++) {
                var file = this.files[x];
                var url = window.URL.createObjectURL(file);


                document.getElementById("i" + x).src = url;
            }
        } else {
            alert("Please select 7 or less than 7 images");
        }

    }
    // alert("Ok");
}
function addProduct() {

    var insert = [];
    $('.get_value').each(function () {
        if ($(this).is(":checked")) {
            insert.push($(this).val());
        }
    });

    var inserts = insert.toString();


    var title = document.getElementById("title");
    var category = document.getElementById("category");
    var detail = document.getElementById("detail");
    var color = document.getElementById("color");
    var price = document.getElementById("price");
    var qty = document.getElementById("qty");
    var dwc = document.getElementById("dwc");
    var doc = document.getElementById("doc");
    var desc = document.getElementById("desc");
    var image = document.getElementById("imageuploader");

    //  alert(values);
    //  alert(category.value);
    //  alert(detail.value);
    //  alert(color.value);
    //  alert(price.value);     
    //  alert(qty.value);
    //  alert(dwc.value);
    //  alert(doc.value);
    //  alert(desc.value);
    // alert(inserts);

    var f = new FormData();



    f.append("title", title.value);
    f.append("category", category.value);
    f.append("detail", detail.value);
    f.append("color", color.value);
    f.append("price", price.value);
    f.append("qty", qty.value);
    f.append("dwc", dwc.value);
    f.append("doc", doc.value);
    f.append("desc", desc.value);
    f.append("size", inserts);

    var file_count = image.files.length;

    for (var x = 0; x < file_count; x++) {
        f.append("image" + x, image.files[x]);
    }

    var r = new XMLHttpRequest;

    r.onreadystatechange = function () {
        if (r.readyState == 4) {
            var t = r.responseText;
            alert(t);
        }
    }

    r.open("POST", "addProductProcess.php", true);
    r.send(f);


}







function test() {
    alert("test");
}
//   modal
var bm;
//   modal

function forgotPassword() {

    var email = document.getElementById("email2");

    // alert(email.value);
    var r = new XMLHttpRequest();

    r.onreadystatechange = function () {
        if (r.readyState == 4) {
            var t = r.responseText;
            if (t == "Success") {
                alert("Verification code has sent to your email. Please check your inbox");

                var m = document.getElementById("forgotPasswordModal");
                bm = new bootstrap.Modal(m);

                bm.show();
            } else {
                alert(t);
            }

        }
    };

    r.open("GET", "forgotPasswordProcess.php?e=" + email.value, true);
    r.send();

}



function ShowPassword() {

    var input1 = document.getElementById("rnp");
    var input2 = document.getElementById("np");
    var btn = document.getElementById("myButton1");
    // var eye = document.getElementById("e1");

    if (input1.type == "password" && input2.type == "password") {
        input1.type = "text";
        input2.type = "text";
        btn.innerText = "Hide";
        // eye.className = "bi bi-eye-fill";
    } else {
        input1.type = "password";
        input2.type = "password";
        btn.innerText = "Show";
        // eye.className = "bi bi-eye-slash-fill";
    }

}


function resetpw() {

    var email = document.getElementById("email2");
    var np = document.getElementById("np");
    var rnp = document.getElementById("rnp");
    var vcode = document.getElementById("vc");

    var f = new FormData();

    f.append("e", email.value);
    f.append("n", np.value);
    f.append("r", rnp.value);
    f.append("v", vcode.value);

    var r = new XMLHttpRequest;

    r.onreadystatechange = function () {
        if (r.readyState == 4) {
            var t = r.responseText;
            if (t == "Success") {
                bm.hide();
                alert("Password Reset Success");
                window.location.reload();

            } else {
                alert(t);
            }

        }
    };

    r.open("POST", "resetPassword.php", true);
    r.send(f);
}



function signout() {
    var r = new XMLHttpRequest();

    // alert("ok");

    r.onreadystatechange = function () {
        if (r.readyState == 4) {
            var t = r.responseText;
            if (t == "success") {
                // window.location = "home.php";
                location.reload();
            } else {
                alert(t);
            }
        }
    };

    r.open("GET", "signoutProcess.php", true);
    r.send();
}


function changeImage() {

    alert("ok");

    var view = document.getElementById("viewImg");
    var file = document.getElementById("profileimg");

    file.onchange = function () {
        var file1 = this.files[0];
        var url = window.URL.createObjectURL(file1);
        view.src = url;
    }
}


function updateProfile() {

    var fname = document.getElementById("fname");
    var lname = document.getElementById("lname");
    var mobile = document.getElementById("mobile");
    var address = document.getElementById("address");
    var province = document.getElementById("province");
    var district = document.getElementById("district");
    var city = document.getElementById("city");
    var image = document.getElementById("profileimg");

    var f = new FormData();

    f.append("fn", fname.value);
    f.append("ln", lname.value);
    f.append("m", mobile.value);
    f.append("ad", address.value);
    f.append("p", province.value);
    f.append("d", district.value);
    f.append("c", city.value);


    if (image.files.length == 0) {

        var confirmation = confirm("Are you sure You don't want to update Profile Image ?");

        if (confirmation) {
            alert("you have not selected any image");
        }

    } else {
        f.append("image", image.files[0]);
    }

    var r = new XMLHttpRequest;

    r.onreadystatechange = function () {
        if (r.readyState == 4) {
            var t = r.responseText;

            if (t == "success") {
                location.reload();
            } else {
                alert(t);
            }
        }
    }

    r.open("POST", "updateProfileProcess.php", true);
    r.send(f);

}








function basicSearch(x) {


    var txt = document.getElementById("basic_search_text");
    var select = document.getElementById("basic_search_select");

    // alert(txt.value);
    // alert(select.value);
    // alert(x);

    var f = new FormData();

    f.append("t", txt.value);
    f.append("s", select.value);
    f.append("page", x);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function () {
        if (r.readyState == 4) {
            var t = r.responseText;
            document.getElementById("basicSearchResult").innerHTML = t;
        }
    }

    r.open("POST", "basicSearchProcess.php", true);
    r.send(f);



}


function loadMainImg(id) {
    var img = document.getElementById("productImg" + id).src;
    var main = document.getElementById("main_img");

    main.style.backgroundImage = "url(" + img + ")";
}




function removeFromWatchlist(id) {

    var r = new XMLHttpRequest();

    r.onreadystatechange = function () {
        if (r.readyState == 4) {
            var t = r.responseText;
            if (t == "success") {
                location.reload();
            } else {
                alert(t);
            }
        }
    }

    r.open("GET", "removeWatchlistProcess.php?id=" + id, true);
    r.send();
}






function payNow(id) {

    // alert(id);
    var qty = document.getElementById("qty_input").value;

    var r = new XMLHttpRequest();

    r.onreadystatechange = function () {
        if (r.readyState == 4) {
            var t = r.responseText;

            var obj = JSON.parse(t);

            var mail = obj["mail"];
            var amount = obj["amount"];

            if (t == "1") {
                alert("Please Login or sign up");
                window.location = "index.php";
            } else if (t == "2") {
                alert("Please update your profile first");
                window.location = "userProfile.php";
            } else {
                // Payment completed. It can be a successful failure.
                payhere.onCompleted = function onCompleted(orderId) {

                    console.log("Payment completed. OrderID:" + orderId);
                    saveInvoice(orderId, id, mail, amount, qty);
                    // Note: validate the payment and show success or failure page to the customer
                };

                // Payment window closed
                payhere.onDismissed = function onDismissed() {
                    // Note: Prompt user to pay again or show an error page
                    console.log("Payment dismissed");
                };

                // Error occurred
                payhere.onError = function onError(error) {
                    // Note: show an error page
                    console.log("Error:" + error);
                };

                // Put the payment variables here
                var payment = {
                    "sandbox": true,
                    "merchant_id": "1221218",    // Replace your Merchant ID
                    "return_url": "http://localhost/javainsti/ekka/singleProduct.php?id" + id,     // Important
                    "cancel_url": "http://localhost/javainsti/ekka/singleProduct.php?id" + id,     // Important
                    "notify_url": "http://sample.com/notify",
                    "order_id": obj["id"],
                    "items": obj["item"],
                    "amount": amount,
                    "currency": "LKR",
                    "first_name": obj["fname"],
                    "last_name": obj["lname"],
                    "email": mail,
                    "phone": obj["mobile"],
                    "address": obj["address"],
                    "city": obj["city"],
                    "country": "Sri Lanka",
                    "delivery_address": obj["address"],
                    "delivery_city": obj["city"],
                    "delivery_country": "Sri Lanka",
                    "custom_1": "",
                    "custom_2": ""
                };

                // Show the payhere.js popup, when "PayHere Pay" is clicked
                // document.getElementById('payhere-payment').onclick = function (e) {
                payhere.startPayment(payment);
                // };
            }
        }
    }

    r.open("GET", "buyNowProcess.php?id=" + id + "&qty=" + qty, true);
    r.send();
}


function saveInvoice(orderId, id, mail, amount, qty) {
    var f = new FormData();
    f.append("o", orderId);
    f.append("i", id);
    f.append("m", mail);
    f.append("a", amount);
    f.append("q", qty);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function () {
        if (r.readyState == 4) {
            var t = r.responseText;

            if (t == "1") {
                window.location = "invoice.php?id=" + orderId;
            } else {
                alert(t);
            }

        }
    }

    r.open("POST", "saveInvoice.php", true);
    r.send(f);
}