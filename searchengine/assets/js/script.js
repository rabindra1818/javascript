

    // auto complete word start
    let inputElem =  $("#search").val();
    let suggestions = [
        "Channel",
        "CodingLab",
        "Transistor",
        "Microproccesor",
        "CodingNepal",
        "YouTube",
        "YouTuber",
        "YouTube Channel",
        "Blogger",
        "Bollywood",
        "Vlogger",
        "Vechiles",
        "Facebook",
        "Freelancer",
        "Facebook Page",
        "Designer",
        "Developer",
        "Web Designer",
        "Web Developer",
        "Login Form in HTML & CSS",
        "How to learn HTML & CSS",
        "How to learn JavaScript",
        "How to become Freelancer",
        "How to become Web Designer",
        "How to start Gaming Channel",
        "How to start YouTube Channel",
        "What does HTML stands for?",
        "What does CSS stands for?"
    ];  

    $("#search").keyup(function(){

             let search =  $("#search").val();
             if(search.length >= 5 ){                         
                if (search) {
                    $(".autocom-box").removeClass('hide-div');
                    $(".searchTerm").addClass('autocomsh');
                    $("#searchButton").addClass('autocom_btn');                   
                    let filteredWord = suggestions.filter(function (word) {
                        return word.toLowerCase().includes(search.toLowerCase());
                        // return word.toLowerCase().startsWith(inputValue.toLowerCase())
                    });
                    //console.log(filteredWord);        
                    suggestionWordsGenerator(filteredWord);
                } else {
                    $(".autocom-box").addClass('hide-div');
                    $(".searchTerm").removeClass('autocomsh');
                    $("#searchButton").removeClass('autocom_btn');
                }
             }else{
                    $(".autocom-box").addClass('hide-div');
                    $(".searchTerm").removeClass('autocomsh');
                    $("#searchButton").removeClass('autocom_btn');
             }
           
             function suggestionWordsGenerator(wordArray) {
                 let suggestionWord = wordArray
                     .map(function (word) {
                         return "<li>" + word + "</li>";
                     })
                     .join("");
         
                 if (suggestionWord) {
                    $("#box-content").html(suggestionWord);
                 }else{
                    $(".autocom-box").addClass('hide-div');
                    $(".searchTerm").removeClass('autocomsh');
                    $("#searchButton").removeClass('autocom_btn');
                 }
                 
                 Select();
             }

             function Select() {
                let allListItems = document.querySelectorAll("li");                
                allListItems.forEach(function (wordItem) {
                    wordItem.addEventListener("click", function (e) {                      

                    
                    $("#search").val(e.target.textContent);
                    $(".autocom-box").addClass('hide-div');
                    $(".searchTerm").removeClass('autocomsh');
                    $("#searchButton").removeClass('autocom_btn');

                       // alert('ok');
                    });
                });
            }
             
       // alert('Keyup work');

    });
    // auto complete word end 

    // validation check  and api call start

    function check_search(){
    
        let search = $('#search').val();

        if(search.length > 0 ){

            return true; 

        }else{

            return false;
        }

        return true;
    }

    function hasWhiteSpace(s) {
        var reWhiteSpace = new RegExp("\\s+");    
        // Check for white space
        if (reWhiteSpace.test(s)) {           
            // return 'true';
            return 'json.php';
        }    
        return 'dictionary.php';
    }
    
    $("#searchButton").click(function(e){
        e.preventDefault();
       if(check_search() == true){
        $("#main").removeClass('base');
        $("#main").addClass('search-header');  
        $('#content-data').html('Please wait 2 Min Searching ..');
        
        var data = {
            query: $("#search").val(),           
        }   

       // console.log(hasWhiteSpace($("#search").val()));

            let url = hasWhiteSpace($("#search").val());
               
            $.ajax({
                url: url,
                type: 'post',
                dataType: 'json',
                contentType: 'application/json',
                success: function (data) {
                    if(data.isSuccess == true){
                        $('#content-data').html(data.Tags);
                    }else{

                        $('#content-data').html("Your question is procces , hence i will inform you after finding");
                    }
                    
                },
                error: function() { // if error occured
                    $('#content-data').html("Due to Heavy Access Server Now Busy Try Later");
                }
            });       
               
       // console.log(data);
       }else{
        $('#search').focus();
       }    

    });

    // validation check  and api call start

