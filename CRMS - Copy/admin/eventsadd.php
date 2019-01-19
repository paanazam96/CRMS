<?php   //including the database connection file
    session_start();
    include_once("config.php");
?>
<?php
    if(isset($_POST['add'])) //update staff details based on id
    { 
        //$id = mysqli_real_escape_string($conn, $_POST['id']);
        
        $type = mysqli_real_escape_string($conn, strtoupper($_POST['type']));
        $event = mysqli_real_escape_string($conn, strtoupper($_POST['event']));
        $location = mysqli_real_escape_string($conn, strtoupper($_POST['location']));
        $start = mysqli_real_escape_string($conn, $_POST['start']);
        $end = mysqli_real_escape_string($conn, $_POST['end']);
        $days = mysqli_real_escape_string($conn, $_POST['days']);
        
        //add staff to table staffs 
        $check_event = "SELECT * FROM events WHERE event='$event' ";
        $res = mysqli_query($conn, $check_event);
        $count = mysqli_num_rows($res);
        
        if($count == 1)
        { 
            echo "<script>alert('Event Already Existed!'); window.location.href='eventsadd.php';</script>";
        }
        else
        {
            $result = mysqli_query($conn, "INSERT events (type, event, location, start, end, days) VALUES ('$type','$event','$location','$start','$end','$days')");
            
            echo "<script>alert('Event Added Successfully!'); window.location.href='welcomepage.php';</script>";
        } 
    }
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
        
        <title>Add Event</title>
        <link rel="icon" href="../imgs/icon.ico" width='16px' height='16px' type="image/x-icon">
        
        <style>
            body {
                overflow-x: hidden;
                background-image: url("../imgs/1.jpg");
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
                position: relative;
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
        
        <!-- Number of days -->
        <script type="text/javascript">
            function GetDays(){
                    var dropdt = new Date(document.getElementById("drop_date").value);
                    var pickdt = new Date(document.getElementById("pick_date").value);
                    return parseInt((dropdt - pickdt) / (24 * 3600 * 1000)+1);
            }

            function cal(){
                document.getElementById("numdays2").value=GetDays();
            }
        </script>
    </head>
    <body>
        <!-- Navbar -->
        <?php include "navbar.php" ?>
        <!-- /Navbar -->
        <div class="container col-7" style="background-color: #FFFFFF; border-top-left-radius: 20px; border-top-right-radius: 20px; border-bottom-right-radius: 20px; border-bottom-left-radius: 20px; margin-top: 100px; border: 3px solid #283360;">
            <div class="row">
                <!-- My Profile -->
                <div class="container">
                    <div class="card-body col-md-12">
                        <div class="row">
                            <div class="col">
                                <h1 style="font-family:Trebuchet MS; color:black;">Add Event</h1>
                            </div>
                            <div class="col">
                                    
                            </div>
                        </div> 
                        <form action="eventsadd.php" method="post" autocomplete="off">
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="">Event Type</label>
                                    <select name="type" class="form-control" required>
                                        <option value="">Choose..</option>
                                        <option value="EXHIBITION">EXHIBITION</option>
                                        <option value="CONFERENCE">CONFERENCE</option>
                                        <option value="FORUM">FORUM</option>
                                        <option value="MEETING">MEETING</option>
                                        <option value="DISCUSSION">DISCUSSION</option>
                                        <option value="WORKSHOP">WORKSHOP</option>
                                        <option value="TRAINING">TRAINING</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label for="">Event Name</label>
                                    <input type="text" name="event" class="form-control" style="text-transform:uppercase;" required>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label for="">Event Location</label>
                                    <input type="text" name="location" class="form-control" style="text-transform:uppercase;" required>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label for="">Start Date/Time</label>
                                    <input type="date" class="form-control" id="pick_date" onchange="cal()" name="start" required>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="">End Date/Time</label>
                                    <input type="date" class="form-control" id="drop_date" onchange="cal()" name="end" required>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="">Number of Days</label>
                                    <input type="text" class="form-control" id="numdays2" name="days" required>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <a href="welcomepage.php" class="btn btn-danger btn-md float-left" role="button">Back</a>     
                                </div>
                                <div class="form-group col-md-6">
                                    <button name="add" type="submit" class="btn btn-success btn-md float-right">Submit</button> 
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
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