const regform = document.getElementById('register-form');
const username = document.getElementById('username');
const regemail = document.getElementById('reg-email');
const regpassword = document.getElementById('reg-password');

regform.addEventListener('submit', e => {
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

const isValidregEmail = regemail  => {
    const re = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(String(regemail).toLowerCase());
}

const validateInputs = () => {
    const usernamevalue = username.value.trim();
    const regemailvalue = regemail.value.trim();
    const regpasswordvalue = regpassword.value.trim();

    if(usernamevalue === ''){
        setError(username, 'Username is required');
    }else{
        setSuccess(username);
    } 

    if(regemailvalue === ''){
        setError(regemail, 'Email is required');
    }else if (!isValidregEmail(regemailvalue)) {
        setError(regemail, 'Provide a valide email address');
    }else{
        setSuccess(regemail);
    }

    if(regpasswordvalue ===''){
        setError(regpassword, 'Password is required');
    }else if(regpasswordvalue.length < 8 ){
        setError(regpassword, 'Password must be at least 8 character.')
    }else{
        setSuccess(regpassword);
    }

};