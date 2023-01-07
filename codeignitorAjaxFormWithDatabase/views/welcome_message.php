<!doctype html>
<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
		integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

	<title>Hello, world!</title>

	<style>
       .hidden_class{
		display: none;
	   }


	</style>
</head>

<body>

	<div class="container" style="margin-top: 50px; margin-bottom: 50px; max-width: 550px;">
		<h4 style="text-align:center; margin-bottom:20px;">Registration </h4>
		
		<form  id="all_form" enctype="multipart/form-data">

			<div class="form-row" id="step_one_form" style="border:1px solid #000; border-radius:6px; padding:20px; margin:10px;">

				<div class="form-group col-md-6">
					<label for="inputEmail4">First Name</label>
					<input type="text" class="form-control" name = "f1" id="firstname">
					<small style="color:red;" id="error_fname"></small>
				</div>
				<div class="form-group col-md-6">
					<label for="inputPassword4">Last Name</label>
					<input type="text" class="form-control" name = "f2"  id="lastname">
					<small style="color:red;" id="error_lname"></small>
				</div>

				<div class="form-group col-md-12">
					<label for="inputPassword4">Mobile No</label>
					<input type="text" class="form-control" name = "f3"  id="mobileno">
					<small style="color:red;" id="error_phone"></small>
				</div>

				<button type="button" class="btn btn-primary float-sm-right" id="first_step">Next</button>

			</div>

			<div class="form-row  hidden_class" id="step_two_form" style="border:1px solid #000; border-radius:6px; padding:20px; margin:10px;">

				<div class="form-group col-md-12">
					<label for="inputEmail4">Email</label>
					<input type="email" class="form-control" name = "f4" id="email">
					<small style="color:red;" id="error_email"></small>
				</div>

				<div class=" form-group col-md-12">

					<div class="custom-control custom-radio custom-control-inline">
						<input type="radio" id="customRadioInline1" value="male" name="f5" class="custom-control-input">
						<label class="custom-control-label" for="customRadioInline1">Male</label>
					</div>

					<div class="custom-control custom-radio custom-control-inline">
						<input type="radio" id="customRadioInline2" value="Female" name="f5" class="custom-control-input">
						<label class="custom-control-label" for="customRadioInline2">Female</label>
					</div>

					<small style="color:red;" id="error_gender"></small>

				</div>
				<button type="button" id="second_step" class="btn btn-primary ">Next</button>
			</div>	

			<div class="form-row hidden_class" id="step_three_form" style="border:1px solid #000; border-radius:6px; padding:20px; margin:10px;">
				<div class="form-group col-md-12">
					<label for="inputAddress">About Me</label>
					<textarea type="text" class="form-control" id="about" name = "f6"  placeholder="1234 Main St"></textarea>
					<small style="color:red;" id="error_about"></small>
				</div>
				<div class="form-group col-md-12">
					<label for="inputAddress2">Address 2</label>
					<textarea type="text" class="form-control" id="address" name = "f7"  placeholder="Apartment, studio, or floor"></textarea>
					<small style="color:red;" id="error_address"></small>
				</div>
				<div class="row">
				<div class="form-group col-md-6">
					<label for="inputCity">Profile Pic</label>
					<input type="file" class="form-control" id="file" name = "f8"  onchange="PreviewImage();">		
					<small style="color:red;" id="error_file"></small>			
				</div>

				<div class="form-group col-md-6">
				<img id="uploadPreview" style="width: 100px; height: 100px;" />
				</div>				
				</div>
				<div class="form-group col-md-12">
					<label for="inputZip">Pin Code</label>
					<input type="text" class="form-control" id="pincode" name = "f9" >
					<small style="color:red;" id="error_pincode"></small>
				</div>
				<button type="button" class="btn btn-primary btn-block "  id="final_step">Submit</button>
				<button type="button" class="btn btn-primary btn-block hidden_class"  id="final_confirm">Confirm Submit</button>
			</div>
			
			
		</form>
	</div>
	
	<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
		integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
		crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"
		integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct"
		crossorigin="anonymous"></script>

		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js" integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

	<script>    

		function step_one(){

			var  firstname = $("#firstname").val();
			var  lastname = $("#lastname").val();
			var  phone = $("#mobileno").val();

			var pattern = /^[a-zA-Z ]+$/;
			if(!pattern.test(firstname) && firstname !=''){			
			   $("#error_fname").show().text('Name Must Be Latter');
			   return false;
			}else{	
				$("#error_fname").hide();
			}

			if (firstname == "") {			
				$("#error_fname").show().html('<p>Last Name Must Be Latter</p>');			
				return false;
			}else{

				$("#error_fname").hide();
			}


			if(!pattern.test(lastname) && lastname !=''){			
			   $("#error_lname").show().html('<p>Last Name Must Be Latter</p>');
			   return false;
			}else{

				$("#error_lname").hide();
			}

			if (lastname == "") {	

				$("#error_lname").show().html('<p>Last Name Must Be 6 Charecter</p>');			
				return false;

			}else{

				$("#error_lname").hide();
			}

			var mobile = /^((\+[1-9]{1,4}[ \-]*)|(\([0-9]{2,3}\)[ \-]*)|([0-9]{2,4})[ \-]*)*?[0-9]{3,4}?[ \-]*[0-9]{3,4}?$/;
			
			if(!mobile.test(phone) && phone !=''){		
				
					$("#error_phone").show().html('<p>Enter 10 Digit Mobile No</p>');
					return false;

			}else{	

				if(phone.length==10){
					$("#error_phone").hide();
              } else {
				$("#error_phone").show().html('<p>Enter 10 Digit Mobile No</p>');
				return false;
              }
				
			}

			if (phone == "") {
				// alert("Name must be filled out");
				$("#error_phone").show().html('<p>Enter Valid Mobile No</p>');
				return false;
			}else{				
				$("#error_phone").hide();
			} 			
			return true;

		}	

		function step_two(){

			var  email = $("#email").val();
			var  gender = $("input[name='f5']").val();	
			var emailvalid = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;	
			
			
			if(!emailvalid.test(email) && email !=''){			
			   $("#error_email").show().text('Enter Valid Email Address');
			   return false;
			}else{	
				$("#error_email").hide();
			}

			if (email == "") {				
			$("#error_email").show().html('<p>Enter Valid Email</p>');
			return false;
			}else{	
				$("#error_email").hide();
			}

			if ($("input[name='f5']:checked").length == 0) {		

				console.log(gender);
				$("#customRadioInline1").focus();	
				$("#error_gender").show().html('<p>Please choose one.</p>');			
				return false;

			}else{

				$("#error_gender").hide();
			}
								
			return true;
		}
		
		function step_final(){

			var  about = $("#about").val();
			var  address = $("#address").val();
			var  pincode = $("#pincode").val();			

			if (about == "") {	

			$("#error_about").show().html('<p>About Us Not Blank </p>');
			return false;

			  }else{	
				$("#error_about").hide();
			}

			if (address == "") {			
				$("#error_address").show().html('<p>Address Not Be Blank </p>');			
				return false;
			  }else{

				$("#error_address").hide();
			}	

			if (!$('#file').val()) {			
				// alert('Please Upload File');
				$("#error_file").show().html('<p>Must Be upload Profile pic </p>');
			}else{
				$("#error_file").hide();
			}


			var picodev = /^((\+[1-9]{1,4}[ \-]*)|(\([0-9]{2,3}\)[ \-]*)|([0-9]{2,4})[ \-]*)*?[0-9]{3,4}?[ \-]*[0-9]{3,4}?$/;
			
			if(!picodev.test(pincode) && pincode !=''){		
				
					$("#error_pincode").show().html('<p>Enter  6 Digit Pincode.</p>');
					return false;

			}else{	

				if(pincode.length==6){
					$("#error_pincode").hide();
              } else {
				$("#error_pincode").show().html('<p>Enter 6 Digit Pincode.</p>');
				return false;
              }
				
			}
			
			if (pincode == "") {			
				$("#error_pincode").show().html('<p>Enter valid  Pincode </p>');			
				return false;
			  }else{

				$("#error_pincode").hide();
			}
			return true;
		}	

		function PreviewImage() {
			var oFReader = new FileReader();
			oFReader.readAsDataURL(document.getElementById("file").files[0]);

			oFReader.onload = function (oFREvent) {
				document.getElementById("uploadPreview").src = oFREvent.target.result;
			};
		};

		$('#first_step').click(function(){

           if(step_one() == true){
			$("#step_one_form").addClass('hidden_class');
			$("#step_two_form").removeClass('hidden_class');
			
		   }
   		
		});

		$('#second_step').click(function(){

			if(step_two() == true){	

				$("#step_two_form").addClass('hidden_class');
				$("#step_three_form").removeClass('hidden_class');			
			}	

		});

		$('#final_step').click(function(){

			if(step_final() == true){

				$("#step_two_form").removeClass('hidden_class');
				$("#step_one_form").removeClass('hidden_class');

				$("#first_step").addClass('hidden_class');
				$("#second_step").addClass('hidden_class');
				$("#final_step").addClass('hidden_class');
				$("#final_confirm").removeClass('hidden_class');		
				
			}	

		});

		$('#final_confirm').click(function(){

				var data = new FormData($('#all_form')[0]);
             
				$.ajax({
					type:"POST",					
					url:"http://localhost/theuniqueculture.com/index.php/welcome/save_data",
					data:data,    // multiple data sent using ajax
					cache:false,
					contentType: false,
                    processData: false,
					success: function (html) {
						//console.log(data);						
						$("#all_form")[0].reset();
						$("#step_two_form").addClass('hidden_class');
						$("#step_three_form").addClass('hidden_class');						
						$("#final_confirm").addClass('hidden_class');
						$("#first_step,#second_step,#final_step").removeClass('hidden_class');


					}
				});	

		});



	</script>
</body>

</html>