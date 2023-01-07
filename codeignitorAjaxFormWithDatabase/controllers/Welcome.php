<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {
	
	public function index()
	{
		$this->load->view('welcome_message');
	}

	public function file_upload()
	{

		if(isset($_POST['file_upload'])){

			echo json_encode($_FILES['f8']);

			//console.log()
		}

		$this->load->view('file_upload');
	}

	public function file_multi_upload()
	{
		$this->load->view('multifile_upload');
	}

	public function save_data()
	{

		// $image = rand().".png";
		// f1=reterge&f2=reretret&f3=8585858858&f4=dsdsf%40gmail.cokk&f5=on&f6=rthtrhtr%20rhtr&f7=fhytry&f9=7854885
		

		$config['upload_path']   = './uploads/';
		$config['allowed_types'] = '*';
		$config['encrypt_name']  = TRUE;
		
		$this->load->library('upload', $config);
		$p_img = "";
		if ($this->upload->do_upload('f8'))
		{
			$p_img = $this->upload->data('file_name');
		}  

		

		$data= array(

			"fname" => $_POST['f1'],
			"lname" => $_POST['f2'],
			"phone" => $_POST['f3'],
			"email" => $_POST['f4'],
			"gender" =>$_POST['f5'],
			"about" => $_POST['f6'],
			"address" => $_POST['f7'],
			"img"	 => $p_img,		
			"pincode" => $_POST['f9']
			
		);


		$query = $this->db->insert('users', $data);

		if($query){

			echo "Data saved Successfully";
		}

		
	}
     
	public function save_file()
	{				
			/* Getting file name */
			$filename = $_FILES['file']['name'];			
			/* Location */
			$location = "uploads/".$filename;
			$uploadOk = 1;			
			if($uploadOk == 0){
			echo 0;
			}else{
				/* Upload file */
				if(move_uploaded_file($_FILES['file']['tmp_name'], $location)){
					echo json_encode(array($_FILES['file']));
				}else{
					echo 0;
				}
			}

	  // echo json_encode(array('name'=> $_FILES));

		
	}

	public function save_multiple(){

		$uploadDir = 'uploads/'; 
		$allowTypes = array('pdf', 'doc', 'docx', 'jpg', 'png', 'jpeg'); 
		$response = array( 
			'status' => 0, 
			'message' => 'Form submission failed, please try again.' 
		); 
		
		// If form is submitted 
		$errMsg = ''; 
		$valid = 1; 
		if(isset($_POST['name']) || isset($_POST['email']) || isset($_POST['files'])){ 
			// Get the submitted form data 
			$name = $_POST['name']; 
			$email = $_POST['email']; 
			$filesArr = $_FILES["files"]; 
			
			if(empty($name)){ 
				$valid = 0; 
				$errMsg .= '<br/>Please enter your name.'; 
			} 
			
			if(empty($email)){ 
				$valid = 0; 
				$errMsg .= '<br/>Please enter your email.'; 
			} 
			
			if(filter_var($email, FILTER_VALIDATE_EMAIL) === false){ 
				$valid = 0; 
				$errMsg .= '<br/>Please enter a valid email.'; 
			} 
			
			// Check whether submitted data is not empty 
			if($valid == 1){ 
				$uploadStatus = 1; 
				$fileNames = array_filter($filesArr['name']); 
				
				// Upload file 
				$uploadedFile = ''; 
				if(!empty($fileNames)){  
					foreach($filesArr['name'] as $key=>$val){  
						// File upload path  
						$fileName = basename($filesArr['name'][$key]);  
						$targetFilePath = $uploadDir . $fileName;  
						
						// Check whether file type is valid  
						$fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);  
						if(in_array($fileType, $allowTypes)){  
							// Upload file to server  
							if(move_uploaded_file($filesArr["tmp_name"][$key], $targetFilePath)){  
								$uploadedFile .= $fileName.','; 
							}else{  
								$uploadStatus = 0; 
								$response['message'] = 'Sorry, there was an error uploading your file.'; 
							}  
						}else{  
							$uploadStatus = 0; 
							$response['message'] = 'Sorry, only PDF, DOC, JPG, JPEG, & PNG files are allowed to upload.'; 
						}  
					}  
				} 
				
				if($uploadStatus == 1){ 
					// Include the database config file 
					include_once 'dbConfig.php'; 
					
					// Insert form data in the database 
					$uploadedFileStr = trim($uploadedFile, ','); 
					//$insert = $db->query("INSERT INTO form_data (name,email,file_names) VALUES ('".$name."', '".$email."', '".$uploadedFileStr."')"); 
					$insert = true;
					//if($insert){ 
						$response['status'] = 1; 
						$response['message'] = 'Form data submitted successfully!'; 
					//} 
				} 
			}else{ 
				$response['message'] = 'Please fill all the mandatory fields!'.$errMsg; 
			} 
		} 
		
		// Return response 
		echo json_encode($response);
	}

}
