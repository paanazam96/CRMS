<?php

session_start();
include_once("config.php");

if(isset($_POST['add']))
{
    $type = mysqli_real_escape_string($conn, strtoupper($_POST['type']));
    $name = mysqli_real_escape_string($conn, strtoupper($_POST['name']));
    $person = mysqli_real_escape_string($conn, strtoupper($_POST['person']));
    $plandetail = mysqli_real_escape_string($conn, strtoupper($_POST['plandetail']));
    $location = mysqli_real_escape_string($conn, strtoupper($_POST['location']));
    $start = mysqli_real_escape_string($conn, $_POST['start']);
    $end = mysqli_real_escape_string($conn, $_POST['end']);
    $status = mysqli_real_escape_string($conn, strtoupper($_POST['status']));
    $session = mysqli_real_escape_string($conn, strtoupper($_POST['session']));
    
    //check duplicate
    $check_planner = "SELECT * FROM planner WHERE planning_detail='$plandetail' ";
    $res = mysqli_query($conn, $check_planner);
    $count = mysqli_num_rows($res);
    
    if($count == 1)
    {
        echo "<script>alert('Planner already Existed!'); window.location.href='planner.php';</script>";
    }
    else
    {
        $result = mysqli_query($conn, "INSERT planner (session, type, planner_name, person_meet, planning_detail, location, start, end, status) VALUES ('$session', '$type', '$name', '$person', '$plandetail', '$location', '$start', '$end', 'PLANNING')");
        
        echo "<script>alert('Planner added Successfully!'); window.location.href='welcomepage.php';</script>";
    }
}

?>
<html>
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.5.0/css/all.css' integrity='sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU' crossorigin='anonymous'>
        
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
        
        <!-- Jacascript for Datepicker -->
        <link rel="stylesheet" href="//code.jquery.com/ui/1.11.1/themes/smoothness/jquery-ui.css">
        <script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <script src="//code.jquery.com/ui/1.11.1/jquery-ui.js"></script>
        
        <title>Schedule Planner</title>
        <link rel="icon" href="imgs/icon.ico" width='16px' height='16px' type="text/css">
        
        <style>
            body {
                overflow-x: hidden;
                background-image: url("imgs/4.jpg");
                background-repeat: no-repeat;
                background-attachment: fixed;
                background-size: 1920px 1080px;
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
        </style>
    </head>
    <body>
        <!-- NavBar -->
        <?php include "navbar.php" ?>
        <!-- /NavBar -->
        <div class="container col-7" style="background-color: #FFFFFF; border-top-left-radius: 20px; border-top-right-radius: 20px; border-bottom-right-radius: 20px; border-bottom-left-radius: 20px; margin-top: 100px; border: 3px solid #283360;">
            <div class="row">
                <!-- Planner -->
                <div class="container">
                    <div class="card-body col-md-12">
                        <div class="row">
                            <div class="col">
                                <h1 style="font-family: Trebuchet MS; color:black;">Schedule Planner</h1>
                            </div>
                            <div class="col">
                            
                            </div>
                        </div>
                        <form action="planneradd.php" method="post" autocomplete="off">
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label>Planning Type</label>
                                    <select name="type" class="form-control" required>
                                        <option value="">Choose..</option>
                                        <option value="MEETING">MEETING</option>
                                        <option value="DISCUSSION">DISCUSSION</option>
                                        <option value="VISIT">VISIT</option>
                                        <option value="ROADSHOW">ROADSHOW</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-6">
                                    <?php 
                                        $sesion = $_SESSION['email'];
                                        echo '<input type="hidden" name="session" value="'.$sesion.'">'
                                    ?>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label>Person to Meet</label>
                                    <input type="text" name="person" class="form-control" id="person" placeholder="Type in Key People Name.." required>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label>Planner Name</label>
                                    <select name="name" class="form-control" required>
                                        <option value="">Choose..</option>
                                        <option value="AHMAD KAMEL BIN ABDUL MALIK">AHMAD KAMEL BIN ABDUL MALIK</option>
                                        <option value="ABU HASSAN BIN ABDULLAH">ABU HASSAN BIN ABDULLAH</option>
                                        <option value="AB HALIM BIN ABENOH">AB HALIM BIN ABENOH</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label>Planning Detail</label>
                                    <input type="text" name="plandetail" class="form-control" style="text-transform:uppercase;" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Location</label>
                                    <input type="text" name="location" class="form-control" style="text-transform:uppercase;" required>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label for="">Start Date</label>
                                    <input type="text" class="form-control" id="datepicker" name="start" required>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="">End Date</label>
                                    <input type="text" class="form-control" id="datepicker2" name="end" required>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="">Status</label>
                                    <select name="status" class="form-control" disabled>
                                        <option value="">Choose..</option>
                                        <option value="PLANNING" selected>PLANNING</option>
                                        <option value="COMPLETED">COMPLETED</option>
                                        <option value="CANCELED">CANCELED</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <a href="welcomepage.php" class="btn btn-danger btn-md float-left" role="button">Back</a>     
                                </div>
                                <div class="form-group col-md-6">
                                    <button name="add" type="submit" class="btn btn-success btn-md float-right">Add</button> 
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- /Planner -->
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
<script>
    $(function() {
        $( "#datepicker" ).datepicker({
            changeMonth: true,
            changeYear: true,
            dateFormat: 'yy-mm-dd', // iso format
            yearRange: '1960:+10'
        });
    });
    $(function() {
        $( "#datepicker2" ).datepicker({
            changeMonth: true,
            changeYear: true,
            dateFormat: 'yy-mm-dd', // iso format
            yearRange: '1960:+10'
        });
    });
    $(function() {
        $("#person").autocomplete({
            source: 'plannerautocomplete.php'
        });
    });
</script>