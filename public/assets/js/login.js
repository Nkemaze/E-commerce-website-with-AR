const form = document.getElementById('login-form');
const email = document.getElementById('email');
const password = document.getElementById('password');


form.addEventListener('submit', e => {
    e.preventDefault();

    validateInputs(); 
})


const setError = (element, message) => {
    const inputControl = element.parentElement;
    const errorDisplay = inputControl.querySelector('.error')

    errorDisplay.innerText = message;
    inputControl.classList.add('error');
    inputControl.classList.remove('success')
}

const setSuccess = element  => {
    const inputControl = element.parentElement;
    const errorDisplay = inputControl.querySelector('.error');

    errorDisplay.innerText = '';
    inputControl.classList.add('success');
    inputControl.classList.remove('error');
};

const isValidEmail = email  => {
    const re = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(String(email).toLowerCase());
}


const validateInputs = () => {
    const emailvalue = email.value.trim();
    const passwordvalue = password.value.trim();

    if(emailvalue === ''){
        setError(email, 'Email is required');
    }else if (!isValidEmail(emailvalue)) {
        setError(email, 'Provide a valide email address');
    }else{
        setSuccess(email);
    }

    if(passwordvalue ===''){
        setError(password, 'Password is required');
    }else if(passwordvalue.length < 8 ){
        setError(password, 'Password must be at least 8 character.')
    }else{
        setSuccess(password);
    }

};