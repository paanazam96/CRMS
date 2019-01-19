<?php   //including the database connection file
    session_start();
    include_once("config.php");

    $id = $_GET['id'];
    if(isset($_POST['add'])) //update staff details based on id
    { 
        $id = mysqli_real_escape_string($conn, $_POST['id']);
        
        $relationship = mysqli_real_escape_string($conn, $_POST['relationship']);
        $name = mysqli_real_escape_string($conn, strtoupper($_POST['name']));
        $dob = mysqli_real_escape_string($conn, $_POST['birthday']);
        
        $result = mysqli_query($conn, "INSERT family (fid, relationship, famname, birthday) VALUES ('$id','$relationship','$name','$dob')"); 
            
        //header("Location: staffprofile.php?id=$id");
        echo "<script>alert('Family Added Successfully!'); window.location.href='peopleprofile.php?id=$id';</script>";    
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

        <title>Add Family</title>
        
        <style>
            body {
                overflow-x: hidden;
                background-image: url("imgs/8331.jpg");
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
                opacity: 0.6;
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
        
        <!--<script>
            function GetDays() {
                var str = document.getElementById("ic").value;
                var year = str.substring(0, 2);
                var month = str.substring(2, 4);
                var day = str.substring(4, 6);
                return day + '/' + month + '/' + year;
            }
            function cal(){
                document.getElementById("numdays2").value=GetDays();
            }
        </script>-->
        
        <script>
            history.pushState(null, null, location.href);
            window.onpopstate = function () {
                history.go(1);
            };
        </script>
        
    </head>
    <body>        
        <!-- nav bar -->
        <?php echo include('navbar.php') ?>
        <!-- /nav bar -->
        <!-- card -->
        <div class="container col-6" style="background-color: #FFFFFF; border-top-left-radius: 20px; border-top-right-radius: 20px; border-bottom-right-radius: 20px; border-bottom-left-radius: 20px; margin-top: 100px; border: 3px solid #283360;">
            <!-- Family -->
            <form action="peoplefamilyadd.php" method="post" autocomplete="off">
                <div class="card-body col-md-12">
                    <h2 style="font-family:Trebuchet MS; color:black;">Add Family</h2>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="">Relationship</label>
                            <select class="custom-select" name="relationship" required>
                                <option value="">Choose...</option>
                                <option value="HUSBAND">HUSBAND</option>
                                <option value="WIFE">WIFE</option>
                                <option value="SON">SON</option>
                                <option value="DAUGHTER">DAUGHTER</option>
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="">Birthday</label>
                            <input type="text" class="form-control" id="datepicker" name="birthday">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="">Name</label>
                            <input type="text" name="name" class="form-control" style="text-transform:uppercase;" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-3">
                            <a href="peopleprofile.php?id=<?php echo $id; ?>" class="btn btn-danger btn-sm float-left" role="button">Back</a>    
                        </div>
                        <div class="form-group col-md-9">
                            <input type="hidden" name="id" value="<?php echo $id;?>">
                            <input type="submit" name="add" value="Add" class="btn btn-success btn-sm float-right">
                        </div>
                    </div> 
                </div>
            </form>
            <!-- /Family -->
        </div>  
        <!-- /card -->
        <br>
        <br>
        <!-- Footer -->
        <?php echo include('footer.php') ?>
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
</script>