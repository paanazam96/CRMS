<?php
    session_start();
    include_once("config.php");
?>
<html>
    <head>
        <!--Meta tags-->
        <meta charset="utf-8">
        <meta name="viewport"  content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <!--bootstrap css-->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
        
        <title>List of Key People</title>
        <link rel="icon" href="../imgs/icon.ico" width='16px' height='16px' type="image/x-icon">
        <style>
            body {
                overflow-x: hidden;
                background-image: url("../imgs/3.jpg");
                background-repeat: no-repeat;
                background-attachment: fixed;
                background-size: 1920px 1080px;
            }
            #footer {
                bottom:0;
                width:100%;
                height:30px;   /* Height of the footer */
                background: white;
                opacity: 0.9;
                position: fixed;
                text-align: center;
            } 
            #footer {
                -moz-user-select: none;  
                -webkit-user-select: none;  
                -ms-user-select: none;  
                -o-user-select: none;  
                user-select: none;
            }
        </style>
        <script>
            history.pushState(null, null, location.href);
            window.onpopstate = function () {
                history.go(1);
            };
        </script>
    </head>
    <body>
        <?php include "navbar.php" ?>
        <!-- Content -->
        <div class="container col-12" style="background-color: #FFFFFF; border-top-left-radius: 20px; border-top-right-radius: 20px; border-bottom-right-radius: 20px; border-bottom-left-radius: 20px; margin-top: 100px; border: 3px solid #283360;">
            <br>
            <div class="container">
                <h3 style="font-family:Trebuchet MS;">Search Key People</h3>
            </div>
            <div class="container">
                <div class="tab-pane fade show active" id="staff" role="tabpanel" aria-labelledby="home-tab">
                    <div class="container">
                        <div class="row">
                            <div class="" >
                                <input type="text" id="search_text" class="bg-white text-dark form-control form-control-lg form-control-borderless" placeholder="Search.." style="width: 1000px;">
                            </div>
                            <div class="">
                                <a href="peoplelist.php" class="btn btn-warning btn-lg " role="button">Reset</a>
                            </div>
                        </div>
                    </div>
                    <br>
                </div>
            </div>
            <!-- Table -->
            <div id="result">

            </div>
            <!-- /Table -->
            <br>
        </div>
        <br>
        <br>
        <!-- Footer -->
        <div id="footer">
            <?php include "footer.php" ?>
        </div>
        <!-- /Footer -->
    </body>
</html>
<script>
    $(document).ready(function(){
        load_data();
        function load_data(query)
        {
            $.ajax({
                url:"peoplelistfetch.php",
                method:"post",
                data:{query:query},
                success:function(data)
                {
                    $('#result').html(data);
                }
            });
        }

        $('#search_text').keyup(function(){
            var search = $(this).val();
            if(search != '')
            {
                load_data(search); //when user type, it fill find data
            }
            else 
            {
                load_data(); //when user type, it fill find data			
            }
        });
    });
    
    // hide table when no value in search input and show table when there is value in search input
    $('#search_text').keyup(function() {

      // If value is not empty
      if ($(this).val().length == 0) {
        // Hide the element
        $('#result').hide();
      } else {
        // Otherwise show it
        $('#result').show();
      }
    }).keyup(); // Trigger the keyup event, thus running the handler on page load
</script>