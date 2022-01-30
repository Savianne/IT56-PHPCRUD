 function handleSubmit() {
     if(fathersName.value.length > 5 && fathersName.value.length < 35) {
        fathersName.classList.remove('error-feild');
        document.querySelector('.fathers-name-err-message').textContent = "";
     } else {
        fathersName.classList.add('error-feild');
        document.querySelector('.fathers-name-err-message').textContent = "Value must be between 5 to 35 characters!";
     }

     if(mothersName.value.length > 5 && mothersName.value.length < 35) {
        mothersName.classList.remove('error-feild');
        document.querySelector('.mothers-name-err-message').textContent = "";
     } else {
        mothersName.classList.add('error-feild');
        document.querySelector('.mothers-name-err-message').textContent = "Value must be between 5 to 35 characters!";
     }

     if(address.value.length > 10 && address.value.length < 100) {
        address.classList.remove('error-feild');
        document.querySelector('.address-err-message').textContent = "";
     } else {
        address.classList.add('error-feild');
        document.querySelector('.address-err-message').textContent = "Value must be between 10 to 100 characters!";
     }

     if(cpNumber.value.length > 0) {
        cpNumber.classList.remove('error-feild');
        document.querySelector('.cp-number-err-message').textContent = "";
     } else {
        cpNumber.classList.add('error-feild');
        document.querySelector('.cp-number-err-message').textContent = "This field can't be empty!";
     }

     if(occupation.value.length > 5 && occupation.value.length < 100) {
        occupation.classList.remove('error-feild');
        document.querySelector('.occupation-err-message').textContent = "";
     } else {
        occupation.classList.add('error-feild');
        document.querySelector('.occupation-err-message').textContent = "Value must be between 5 to 100 characters!";
     }
     
     if(annualIncome.value.length > 0) {
        annualIncome.classList.remove('error-feild');
        document.querySelector('.annual-income-err-message').textContent = "";
     } else {
        annualIncome.classList.add('error-feild');
        document.querySelector('.annual-income-err-message').textContent = "This field can't be empty!";
     }

     if(
        fathersName.value.length > 5 && fathersName.value.length < 35 &&
        mothersName.value.length > 5 && mothersName.value.length < 35 &&
        address.value.length > 10 && address.value.length < 100 &&
        cpNumber.value.length > 0 &&
        occupation.value.length > 5 && occupation.value.length < 100 &&
        annualIncome.value.length > 0
     ) {
         document.querySelector('.loading-indicator-bg').style.display = 'flex';

         axios.post('add-record.php', {
            "fathersName": fathersName.value,
            "mothersName": mothersName.value,
            "address": address.value,
            "cpNumber": cpNumber.value,
            "occupation": occupation.value,
            "annualIncome": annualIncome.value,
          })
          .then((response) => {
            if(response.data.success) {


               fathersName.value = '';
               mothersName.value = '';
               address.value = '';
               cpNumber.value = '';
               occupation.value = '';
               annualIncome.value = '';

               setTimeout(() => {
                  document.querySelector('.loading-indicator-bg').style.display = 'none';
                  document.querySelector('.success-indicator-bg').style.display = 'flex';
              }, 1000);
            } else {
               throw "Error";
            }
         })
         .catch((error) => {
            document.querySelector('.loading-indicator-bg').style.display = 'none';
            document.querySelector('.error-indicator-bg').style.display = 'flex';
         })
     } else {
         alert("error field")
     }

 }