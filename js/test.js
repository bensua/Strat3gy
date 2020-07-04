function TogglePannel() {
    var acc = document.getElementsByClassName("accordion");
    var i;

    for (i = 0; i < acc.length; i++) {
        acc[i].addEventListener("click", function () {
            this.classList.toggle("active");
            var panel = this.nextElementSibling;
            if (panel.style.maxHeight) {
                panel.style.maxHeight = null;
            } else {
                panel.style.maxHeight = panel.scrollHeight + "px";
            }
        });
    }
}

function myFunction() {
    alert("Page is loaded");
}

function ShowPassword2(psw) {
    var checkBox = document.getElementById("CheckShowPassword");
    var i;
    
    if (checkBox.checked == true) {
        for (i = 0; i < psw.length; i++) {
            var t = document.getElementById(psw[i]);
            t.type = "text";
        }
    } else {
        for (i = 0; i < psw.length; i++) {
            var t = document.getElementById(psw[i]);
            t.type = "password";
        }
    }
}

function ShowPassword() {
    var checkBox = document.getElementById("CheckShowPassword");
    var psw = document.getElementById("psw");
    var repsw = document.getElementById("repsw");

    if (checkBox.checked == true) {
        psw.type = "text";
        repsw.type = "text";
    } else {
        psw.type = "password";
        repsw.type = "password";
    }
}