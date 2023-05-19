const firstname = document.getElementById('firstname');
const middlename = document.getElementById('middlename');
const lastname = document.getElementById('lastname');
const birthdate = document.getElementById('birthdate');
const age = document.getElementById('age');
const gender = document.getElementById('gender');
const email = document.getElementById('email');
const contactnumber = document.getElementById('contactnumber');

form.addEventListener('next', e => {
    e.preventDefault();

    validateInputs();
});

const setError = (element, message) => {
    const inputControl = element.parentElement;
    const errorDisplay = inputControl.querySelector('.errors');

    errorDisplay.innerText = message;
    inputControl.classList.add('errors');
    inputControl.classList.remove('successs')
}

const setSuccess = element => {
    const inputControl = element.parentElement;
    const errorDisplay = inputControl.querySelector('.errors');

    errorDisplay.innerText = '';
    inputControl.classList.add('successs');
    inputControl.classList.remove('errors');
};

const isValidEmail = email => {
    const re = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(String(email).toLowerCase());
}

const validateInputs = () => {
    const firstname = firstname.value.trim();
    const middlename = middlename.value.trim();
    const lastname = lastname.value.trim();
    const birthdate = birthdate.value.trim();
    const age = age.value.trim();
    const gender = gender.value.trim();
    const email = email.value.trim();
    const contactnumber = contactnumber.value.trim();


    if(firstnameValue === '') {
        setError(firstname, 'Firstname is required');
    } 
    else {
        setSuccess(firstname);
    }
      if(middleValue === '') {
        setError(middlename, 'Firstname is required');
    } 
    else {
        setSuccess(middlename);
    }
      if(lastnameValue === '') {
        setError(lastname, 'Firstname is required');
    } 
    else {
        setSuccess(lastname);
    }
      if(firstnameValue === '') {
        setError(firstname, 'Firstname is required');
    } 
    else {
        setSuccess(firstname);
    }
      if(birthdateValue === '') {
        setError(birthdate, 'Firstname is required');
    } 
    else {
        setSuccess(birthdate);
    }
      if(ageValue === '') {
        setError(age, 'Firstname is required');
    } 
    else {
        setSuccess(age);
    }
      if(genderValue === '') {
        setError(gender, 'Firstname is required');
    } 
    else {
        setSuccess(gender);
    }
      if(genderValue === '') {
        setError(gender, 'Firstname is required');
    } 
    else {
        setSuccess(gender);
    }
      if(emailValue === '') {
        setError(email, 'Firstname is required');
    } 
    else {
        setSuccess(email);
    }
      if(contactnumberValue === '') {
        setError(contactmumber, 'Firstname is required');
    } 
    else {
        setSuccess(contactnumber);
    }

};