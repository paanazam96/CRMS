<?php   //including the database connection file
    session_start();
    include_once("config.php");
?>
<html>
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
        
        <link rel="stylesheet" href="//code.jquery.com/ui/1.11.1/themes/smoothness/jquery-ui.css">
        <script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <script src="//code.jquery.com/ui/1.11.1/jquery-ui.js"></script>
        
        <title>List of Event</title>
        <link rel="icon" href="imgs/icon.ico" width='16px' height='16px' type="image/x-icon">
        
        <style>
            body {
                overflow-x: hidden;
                background-image: url("imgs/1.jpg");
                background-size: cover;
            }
            ::-webkit-scrollbar {
                display: none;
            }
            #footer { 
                bottom:0;
                width:100%;
                height:30px;   /* Height of the footer */
                background: white;
                opacity: 0.7;
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
        <!-- Navbar -->
        <?php include "navbar.php" ?>
        <!-- /Navbar -->
        <div class="container col-12" style="background-color: #FFFFFF; border-top-left-radius: 20px; border-top-right-radius: 20px; border-bottom-right-radius: 20px; border-bottom-left-radius: 20px; margin-top: 100px; border: 3px solid #283360;">
            <div class="row">
                <!-- My Profile -->
                <div class="card-body col-md-12">
                    <div class="row">
                        <div class="col">
                            <h1 style="font-family:Trebuchet MS; color:black;">List of Events</h1>
                        </div>
                        <div class="col">
                            <select id="year" name="year" class="bg-white text-dark form-control form-control-lg form-control-borderless float-right" style="width: 216px;">
                                <?php
                                    //$prev_year = 2016;
                                    for($i=date('Y'); $i<date('Y')+5; $i++) {
                                        //echo "$i<br>";
                                        print '<option value="'.$i.'">'.$i.'</option>';
                                    }
                                ?>
                            </select>       
                        </div>
                    </div> 
                    <!-- Table -->
                    <div id="table">

                    </div>
                <!-- /Table -->
                </div>
            </div>
        </div>
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
                url:"eventfetch.php",
                method:"post",
                data:{query:query},
                success:function(data)
                {
                    $('#table').html(data);
                }
            });
        }

        $('#year').change(function(){
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
    $('#year').change(function() {
      // If value is not empty
      if ($(this).val().length == 0) {
        // Hide the element
        $('#table').hide();
      } else {
        // Otherwise show it
        $('#table').show();
      }
    }).keyup(); // Trigger the keyup event, thus running the handler on page load
</script>