<?php

    session_start();
    include_once("config.php");

    $id = $_GET['id'];
    $result = mysqli_query($conn, "SELECT * FROM planner WHERE id=$id");

    while($res = mysqli_fetch_array($result))
    {
        $start = date('d-F-Y', strtotime($res['start']));
        $end = date('d-F-Y', strtotime($res['end']));
        
        $type = $res['type'];
        $planner_name = $res['planner_name'];
        $person_meet = $res['person_meet'];
        $planning_detail = $res['planning_detail'];
        $location = $res['location'];
        $start = $start;
        $end = $end;
        $status = $res['status'];
        $remark = $res['remark'];
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
            #footer {
                -moz-user-select: none;  
                -webkit-user-select: none;  
                -ms-user-select: none;  
                -o-user-select: none;  
                user-select: none;
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
                        <form action="planner.php" method="post" autocomplete="off">
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label>Planning Type</label>
                                    <input type="text" class="form-control" value="<?php echo $type; ?>" disabled>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label>Person to Meet</label>
                                    <input type="text" name="person" class="form-control" value="<?php echo $person_meet; ?>" disabled>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label>Planner Name</label>
                                    <input type="text" class="form-control" value="<?php echo $planner_name; ?>" disabled>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label>Planning Detail</label>
                                    <input type="text" name="plandetail" class="form-control" style="text-transform:uppercase;" value="<?php echo $planning_detail; ?>" disabled>
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Location</label>
                                    <input type="text" name="location" class="form-control" style="text-transform:uppercase;" value="<?php echo $location; ?>" disabled>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label for="">Start Date</label>
                                    <input type="text" class="form-control" id="datepicker" name="start" value="<?php echo $start; ?>" disabled>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="">End Date</label>
                                    <input type="text" class="form-control" id="datepicker2" name="end" value="<?php echo $end; ?>" disabled>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="">Status</label>
                                    <input type="text" class="form-control" value="<?php echo $status; ?>" disabled>
                                </div>
                            </div>
                            <div <?php if ($status == "PLANNING" || $status == "COMPLETED" ) echo " style='display: none';"; ?> class="form-row">
                                <div class="form-group col-md-12">
                                    <label for="">Remark</label>
                                    <textarea class="form-control" rows="3" style="resize: none;" name="remark" style="text-transform:uppercase;" disabled><?php echo $remark ?></textarea>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <a href="plannerlist.php" class="btn btn-danger btn-sm float-left" role="button">Back</a>     
                                </div>
                                <div class="form-group col-md-6">
                                    <a href="planneredit.php?id=<?php echo $id ?>" class="btn btn-success btn-sm float-right" role="button">Edit Planner</a>     
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