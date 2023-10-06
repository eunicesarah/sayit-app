document.addEventListener('DOMContentLoaded', function () {
const form = document.getElementById('form');
const username = document.getElementById('name');
const email = document.getElementById('email');
const phone = document.getElementById('phone');
const password = document.getElementById('password');

form.addEventListener('submit', function (e) {
    e.preventDefault();
    validateInputs();
});

function validateInputs(){
    // Validate email
    const emailValue = email.value.trim();
    if (emailValue === '') {
        setError(email, 'Email is required');
        isValid = false;
    } else if (!isValidEmail(emailValue)) {
        setError(email, 'Provide a valid email address');
        isValid = false;
    } else {
        setSuccess(email);
    }

    // Validate password
    const passwordValue = password.value.trim();
    if (passwordValue === '') {
        setError(password, 'Password is required');
        isValid = false;
    } else if (passwordValue.length < 8) {
        setError(password, 'Password must be at least 8 characters');
        isValid = false;
    } else {
        setSuccess(password);
    }

    // Validate phone
    const phoneValue = phone.value.trim();
    if (phoneValue === '') {
        setError(phone, 'Phone number is required');
        isValid = false;
    } else if (!isValidPhone(phoneValue)) {
        setError(phone, 'Phone number must be 0xxxx');
        isValid = false;
    } else if(phoneValue.typeof !== 'number'){
        setError(phone, 'Phone number must be a number');
    } else if (isNaN(phoneValue)) {
        setError(phone, 'Phone number must be a number');
        isValid = false;
    }
    else {
        setSuccess(phone);
    }

    if (!isValid) {
        e.preventDefault(); // Prevent form submission if there are validation errors
    }

    // Validate username
    const usernameValue = username.value.trim();
    if (usernameValue === '') {
        setError(username, 'Username is required');
        isValid = false;
    } else {
        setSuccess(username);
    }

}});

const setError = (element, message) => {
    const inputControl = element.parentElement;
    const errorDisplay = inputControl.querySelector('.error');

    errorDisplay.innerText = message;
    inputControl.classList.add('error');
    inputControl.classList.remove('success');
};

const setSuccess = element => {
    const inputControl = element.parentElement;
    const errorDisplay = inputControl.querySelector('.error');

    errorDisplay.innerText = '';
    inputControl.classList.add('success');
    inputControl.classList.remove('error');
};

const isValidEmail = email => {
    const re = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(String(email).toLowerCase());
};

const isValidPhone = phone => {

    const re = /^(?:0)[2-9]\d{6,12}$/;
  
    return re.test(phone);
}
