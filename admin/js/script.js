//  To show password
function show_password() {
    var x = document.getElementById("mypassword");
    if (x.type === "password") {
        x.type = "text";
    } else {
        x.type = "password";
    }
}