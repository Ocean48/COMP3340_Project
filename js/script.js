// To make header menu small when page size got small
function header_menu() {
    var x = document.getElementById("myTopnav");
    if (x.className === "topnav") {
        x.className += " responsive";
    }
    else {
        x.className = "topnav";
    }
}

// To show password
function show_password() {
    var x = document.getElementById("mypassword");
    if (x.type === "password") {
        x.type = "text";
    } else {
        x.type = "password";
    }
}