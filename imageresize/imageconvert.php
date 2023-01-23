
<?php



if(isset($_POST['upload'])){   

    $image = $_FILES['image']['name'];
    $file_tmp =$_FILES['image']['tmp_name'];
    //location to save image once uploaded
    //$dir="assets/uploads/webp/"; 
    $dir="photos/";
    $newName=time().".webp";
    $ext = pathinfo($image, PATHINFO_EXTENSION); 
    $newNameresize=time().".".$ext; 

    if($_POST['imf_ttt'] === '1'){   
        //create a new image name        
        echo "<script> alert('image extention : $ext')</script>";
        //upload image to server
        if(move_uploaded_file($file_tmp,$dir.$image)){ 
        
                switch ($ext) {
                    case "jpg":
                        $jpg=imagecreatefromjpeg($dir . $image);
                        break;
                    case "png":
                        $jpg=imagecreatefrompng($dir . $image);
                        break;
                    case "jpeg":
                        $jpg=imagecreatefromjpeg($dir . $image);
                        break;
                }
                
                $w=imagesx($jpg);
                $h=imagesy($jpg);
                $webp=imagecreatetruecolor($w,$h);
                imagecopy($webp,$jpg,0,0,0,0,$w,$h);
                imagewebp($webp, $dir . $newName, 80);
                imagedestroy($jpg);
                imagedestroy($webp);
                unlink($dir.$image);   
          

        }

    }elseif($_POST['imf_ttt'] === '2'){     

       
    
     

    }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>webp</title>
</head>
<body>
<div style="margin:250px 0; text-align:center; ">
<form action="" method="post"  enctype="multipart/form-data">

    <input type="file" name="image" accept="image/png, image/jpeg, image/jpg" required>
    <input type="number" name="height" placeholder="Enter height">
    <input type="number" name="width" placeholder="Enter width ">
    <select type="number"  name="imf_ttt"  required>
        <option value="">Select Output Format</option>
        <option value="1">Convest webp Format</option>
        <option value="2">resize Image</option>
    </select>

    <button type="submit" name='upload'>Upload</button>

</form>
</div>   
</body>
</html>