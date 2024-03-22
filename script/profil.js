const reveal = document.getElementsByClassName("eye");
const password = document.getElementById("password");
const passwordCheck = document.getElementById("passwordCheck");
const pass = [password, passwordCheck];

for (let i = 0; i < reveal.length; i++) {
    reveal[i].addEventListener("click", function() {
        if (reveal[i].classList.contains("fa-eye-slash")) {
            reveal[i].classList.remove("fa-eye-slash");
            reveal[i].classList.add("fa-eye");
            pass[i].setAttribute('type', 'text');
        } else {
            reveal[i].classList.remove("fa-eye");
            reveal[i].classList.add("fa-eye-slash");
            pass[i].setAttribute('type', 'password');
        }
    });
}

