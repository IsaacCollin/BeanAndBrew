var password = document.getElementById("password");
var password_confirmation = document.getElementById("password_confirmation");
var password_compare = document.getElementById("password_compare");
var letter = document.getElementById("letter");
var number = document.getElementById("number");
var length = document.getElementById("length");

// When the user starts to type something inside the password field
password.onkeyup = function () {
    //Checks that the user has inputted the same password in both fields
    [password, password_confirmation].forEach((element) => {
        element.addEventListener("input", function () {
            if (password_confirmation.value === password.value) {
                password_compare.classList.remove("invalid");
                password_compare.classList.add("valid");
            } else {
                password_compare.classList.remove("valid");
                password_compare.classList.add("invalid");
            }
        });
    });

    // Checks that the user has inputted letters
    var letters = /[a-z]/;
    if (password.value.match(letters)) {
        letter.classList.remove("invalid");
        letter.classList.add("valid");
    } else {
        letter.classList.remove("valid");
        letter.classList.add("invalid");
    }

    // Checks that the user has inputted numbers
    var numbers = /[0-9]/;
    if (password.value.match(numbers)) {
        number.classList.remove("invalid");
        number.classList.add("valid");
    } else {
        number.classList.remove("valid");
        number.classList.add("invalid");
    }

    // Checks that the user has inputted the correct len length
    if (password.value.length >= 8 && password.value.length <= 255) {
        length.classList.remove("invalid");
        length.classList.add("valid");
    } else {
        length.classList.remove("valid");
        length.classList.add("invalid");
    }
};
