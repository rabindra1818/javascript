
$(document).ready(function() {
  
    $('form[id="second_form"]').validate({
      rules: {
        fname: 'required',
        lname: 'required',
        user_email: {
          required: true,
          email: true,
        },
        psword: {
          required: true,
          minlength: 3,
          maxlength: 10,
          
        }
      },
      messages: {
        fname: 'This field is required',
        lname: 'This field is required',
        user_email: 'Enter a valid email',
        psword: {
          minlength: 'Password must be at least 8 characters long',
          maxlength: 'Password must be at bellow 10 characters long',
        }
      },
      submitHandler: function(form) {
         form.submit();
         $('#second_form')[0].reset();        
      }
    });
    
    });