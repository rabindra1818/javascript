
$(document).ready(function() {
    $.validator.addMethod("alphabetsnspace", function(value, element) {
        return this.optional(element) || /^[a-zA-Z ]*$/.test(value);
    });
    $.validator.addMethod("cemail", function(value, element) {
        return this.optional(element) || /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/.test(value);
    });

    $('form[id="leads_form"]').validate({
      rules: {
        fname: {
            required: true,
            alphabetsnspace: true,      
        } ,
        mobile: {
            required: true,
            number : true,
            minlength: 10,
            maxlength: 10,          
        },      
        email: {
          required: true,
          cemail: true,
        },
        website:'required',
        book: {
            required: true,              
        },
        country: {
            required: true,           
        },
        desc: {
            required: true,           
        }
      },
      messages: {
        fname: '',       
        mobile: '',
        email: '',
        website:'',
        book:'',
        country:'',
        desc:''
      },
      submitHandler: function(form) {       
                   
            var data = new FormData($('#leads_form')[0]);
            $.ajax({
            url: 'includes/mail.php', // form action url
            type: 'POST', // form submit method get/post
            dataType: 'json', // request type html/json/xml
            data: data , // serialize form data
            contentType: false,
            processData: false,            
            success: function(data) {
                // console.log(data);
                $("#success_msg").html('<div class="text-success text-center">we have received your request and will get back to you soon</div>');
                 $("#leads_form").css('display','none');
                 $("#leads_form")[0].reset();
            },
            error: function(e) {
                // console.log(e);
            }
            });
       
      }
    });
    
    });
