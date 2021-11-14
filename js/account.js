//For the Show password button

//Select showPassword button
const PasswordBtn = document.querySelector('#ShowPassword');
//Add eventListener to the button whenever clicked run function
PasswordBtn.addEventListener('click', function() {
    //get elementand store under PasswordInput
    let PasswordInput = document.getElementById('Password');
    //get attribute type of password
    let type = PasswordInput.getAttribute('type');
    //If statement
    if (type === 'password') {
        //show text
        PasswordInput.setAttribute('type', 'text');
        //change button text
        PasswordBtn.innerHTML = 'Hide Password';
    } else {
        //change back to password
        PasswordInput.setAttribute('type', 'password');
        //change button text back
        PasswordBtn.innerHTML = 'Show Password';
    }
});