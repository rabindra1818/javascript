<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Serarch Engine</title>
    <link rel="stylesheet" href="assets/css/style.css">    
</head>
<body>

<div class="base" id="main"> 
  <div class="logo" >       
    <img src="./assets/logo-white.svg" class="logo-icon"  alt="" >       
  </div> 
  <form action="" method="post" id="search_form" class="active" autocomplete="off">
    <div class="search ">
      <input type="text" class="searchTerm" name="search"  id="search" placeholder="Hello ! What are you Ask Me ?">      
      <button type="submit" class="searchButton " id="searchButton">     
        <img src="./assets/search.svg" class="search-icon" alt="" >
      </button> 
    </div>
    <div class="autocom-box hide-div">
        <div class="box-content" id="box-content">            
        </div>        
    </div>     
  </form>
  <div class="login">
    <div class="login-icon"></div>   
  </div>
</div>

<div class="content">
    <div class="content-title" id="content-data"></div>
</div>
<script src="assets/js/jquery.js"></script>
<!-- <script src="assets/jquery-validation.js"></script>  -->
<script src="assets/js/script.js"></script>    
</body>
</html>