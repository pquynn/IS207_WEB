// disabling form submissions if there are invalid fields
(() => {
    'use strict'
  
    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    const forms = document.querySelectorAll('.needs-validation')
  
    // Loop over them and prevent submission
    Array.from(forms).forEach(form => {
      form.addEventListener('submit', event => {
        if (!form.checkValidity()) {
          event.preventDefault()
          event.stopPropagation()
        }
  
        form.classList.add('was-validated')
      }, false)
    })
  })()



// exit confirmation popup
document.addEventListener('DOMContentLoaded', function() {
const cancelButton = document.querySelector('.btn-cancel');

cancelButton.addEventListener('click', function() {
    if (confirm('Xác nhận hủy thêm mới?')) {
    // Dismiss the modal if the user clicks "OK" in the confirm box
    // Replace 'myModal' with the actual ID of your Bootstrap modal
    $('#add-new').modal('hide');

    // Clear the data and reset the form validation in the modal
      const modal = document.getElementById('add-new');
      modal.querySelector('form').reset(); // Reset the form

    Array.from(modal.querySelectorAll('.was-validated')).forEach((element) => {
    element.classList.remove('was-validated'); // Clear Bootstrap form validation classes
    });

    } else {
    // Do not dismiss the modal if the user clicks "Cancel" in the confirm box
    }
});
});

