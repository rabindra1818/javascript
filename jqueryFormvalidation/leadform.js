
      $(document).ready(function() {

        $.validator.addMethod("alphabetsnspace", function(value, element) {
            return this.optional(element) || /^[a-zA-Z ]*$/.test(value);
        });
        $.validator.addMethod("cemail", function(value, element) {
            return this.optional(element) || /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/.test(value);
        });

        $('form[id="leads_form"]').validate({
          errorElement: "small",
          errorClass: "text-orange-1",
          rules: {
            fname: {
                required: true,
                minlength: 6,
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
            cname: {
                required: true,              
            },           
            desc: {
                required: true,           
            }
          },
          messages: {
            fname:  '' , //'Enter Only characters in name ',       
            mobile: '',
            email: '',
            cname:'',           
            desc:''
          },
          submitHandler: function(form) {          
                $(".leadform").attr("disabled", true);                       
                var data = new FormData($('#leads_form')[0]);
                $.ajax({
                url: base_url+'leads/form', // form action url
                type: 'POST', // form submit method get/post
                dataType: 'json', // request type html/json/xml
                data: data , // serialize form data
                contentType: false,
                processData: false,            
                success: function(data) {
                    // console.log(data);
                    // console.log(data.status);
                    $("#success_msg").html("Hello , " + data.name + "<p class='text-dark-9 text-center'>we have received your request and will get back to you soon.</p>");
                    $("#leads_form").css('display','none');
                    $("#leads_form")[0].reset();
                    $(".leadform").attr("disabled", false);  
                },
                error: function(e) {
                    // console.log(e);
                    $(".leadform").attr("disabled", false);
                }
                });
         
          }
        });
        
      });
   