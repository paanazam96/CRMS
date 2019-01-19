<?php
    session_start();
    include_once("config.php");

    $id = $_GET['id'];

    if(isset($_POST['update'])) //update staff details based on id
    { 
        $id = mysqli_real_escape_string($conn, $_POST['id']);        
        $type = mysqli_real_escape_string($conn, strtoupper($_POST['type']));
        $planner_name = mysqli_real_escape_string($conn, strtoupper($_POST['name']));
        $person_meet = mysqli_real_escape_string($conn, strtoupper($_POST['person']));
        $planning_detail = mysqli_real_escape_string($conn, strtoupper($_POST['plandetail']));        
        $location = mysqli_real_escape_string($conn, strtoupper($_POST['location']));
        $start = mysqli_real_escape_string($conn, strtoupper($_POST['start']));
        $end = mysqli_real_escape_string($conn, strtoupper($_POST['end']));
        $status = mysqli_real_escape_string($conn, $_POST['status']);
        $remark = mysqli_real_escape_string($conn, strtoupper($_POST['remark']));
        
        $result = mysqli_query($conn, "UPDATE planner SET type='$type', 
                                        planner_name='$planner_name',
                                        person_meet='$person_meet', 
                                        planning_detail='$planning_detail', 
                                        location='$location', 
                                        start='$start', 
                                        end='$end', 
                                        status='$status', 
                                        remark='$remark' WHERE id='$id' ");
        
        echo "<script>alert('Planner Successfully Updated!'); window.location.href='plannerview.php?id=$id';</script>";
    }
?>
<?php
    $id = $_GET['id'];
    $result = mysqli_query($conn, "SELECT * FROM planner WHERE id=$id");

    while($res = mysqli_fetch_array($result))
    {
        $type = $res['type'];
        $planner_name = $res['planner_name'];
        $person_meet = $res['person_meet'];
        $planning_detail = $res['planning_detail'];
        $location = $res['location'];
        $start = $res['start'];
        $end = $res['end'];
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
                        <form action="planneredit.php" method="post" autocomplete="off">
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label>Planning Type</label>
                                    <select name="type" class="form-control" required>
                                        <option value="">Choose..</option>
                                        <option value="MEETING" <?php if($type=="MEETING") echo 'selected="selected"';?>>MEETING</option>
                                        <option value="DISCUSSION" <?php if($type=="DISCUSSION") echo 'selected="selected"';?>>DISCUSSION</option>
                                        <option value="VISIT" <?php if($type=="VISIT") echo 'selected="selected"';?>>VISIT</option>
                                        <option value="ROADSHOW" <?php if($type=="ROADSHOW") echo 'selected="selected"';?>>ROADSHOW</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label>Person to Meet</label>
                                    <input type="text" name="person" class="form-control" id="person" value="<?php echo $person_meet; ?>" placeholder="Type in Key People Name.." required>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label>Planner Name</label>
                                    <select name="name" class="form-control" required>
                                        <option value="">Choose..</option>
                                        <option value="AHMAD KAMEL BIN ABDUL MALIK" <?php if($planner_name=="AHMAD KAMEL BIN ABDUL MALIK") echo 'selected="selected"';?>>AHMAD KAMEL BIN ABDUL MALIK</option>
                                        <option value="ABU HASSAN BIN ABDULLAH" <?php if($planner_name=="ABU HASSAN BIN ABDULLAH") echo 'selected="selected"';?>>ABU HASSAN BIN ABDULLAH</option>
                                        <option value="AB HALIM BIN ABENOH" <?php if($planner_name=="AB HALIM BIN ABENOH") echo 'selected="selected"';?>>AB HALIM BIN ABENOH</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label>Planning Detail</label>
                                    <input type="text" name="plandetail" class="form-control" value="<?php echo $planning_detail; ?>" style="text-transform:uppercase;" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Location</label>
                                    <input type="text" name="location" class="form-control" value="<?php echo $location; ?>" style="text-transform:uppercase;" required>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label for="">Start Date</label>
                                    <input type="text" class="form-control" id="datepicker" name="start" value="<?php echo $start; ?>" required>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="">End Date</label>
                                    <input type="text" class="form-control" id="datepicker2" name="end" value="<?php echo $end; ?>" required>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="">Status</label>
                                    <select name="status" class="form-control" required>
                                        <option value="">Choose..</option>
                                        <option value="PLANNING" <?php if($status=="PLANNING") echo 'selected="selected"';?>>PLANNING</option>
                                        <option value="COMPLETED" <?php if($status=="COMPLETED") echo 'selected="selected"';?>>COMPLETED</option>
                                        <option value="CANCELED" <?php if($status=="CANCELED") echo 'selected="selected"';?>>CANCELED</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label for="">Remark</label>
                                    <textarea class="form-control" rows="3" style="resize: none;" name="remark" onkeyup="this.value = this.value.toUpperCase();"><?php echo $remark; ?></textarea>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <a href="plannerview.php?id=<?php echo $id ?>" class="btn btn-danger btn-md float-left" role="button">Back</a>     
                                </div>
                                <div class="form-group col-md-6">
                                    <input type="hidden" name="id" value="<?php echo $id;?>">
                                    <input type="submit" name="update" value="Update" class="btn btn-success btn-sm float-right">
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