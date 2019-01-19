<?php   //including the database connection file 
    session_start();
    include_once("config.php");
    
    if(isset($_POST['add'])) //update staff details based on id
    { 
        //$id = mysqli_real_escape_string($conn, $_POST['id']);
        
        $type = mysqli_real_escape_string($conn, strtoupper($_POST['type']));
        $sector = mysqli_real_escape_string($conn, strtoupper($_POST['sector']));
        $state = mysqli_real_escape_string($conn, strtoupper($_POST['state']));
        $cat = mysqli_real_escape_string($conn, strtoupper($_POST['cat']));
        $catname = mysqli_real_escape_string($conn, strtoupper($_POST['catname']));
        $unit = mysqli_real_escape_string($conn, strtoupper($_POST['unit']));
        $name = mysqli_real_escape_string($conn, strtoupper($_POST['name']));
        $position = mysqli_real_escape_string($conn, strtoupper($_POST['position']));
        $birthday = mysqli_real_escape_string($conn, $_POST['birthday']);
        $officeno = mysqli_real_escape_string($conn, $_POST['officeno']);
        $mobileno = mysqli_real_escape_string($conn, $_POST['mobileno']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $offadd = mysqli_real_escape_string($conn, strtoupper($_POST['offadd']));        
        $homeadd = mysqli_real_escape_string($conn, strtoupper($_POST['homeadd']));
        
        //add staff to table staffs 
        $check_people = "SELECT * FROM keypersonal WHERE name='$name' ";
        $res = mysqli_query($conn, $check_people);
        $count = mysqli_num_rows($res);
        
        if($count == 1)
        { 
            echo "<script>alert('Key People Already Existed!'); window.location.href='welcomepage.php';</script>";
        }
        else
        {
            $result = mysqli_query($conn, "INSERT keypersonal (type, sector, negeri, category, category_name, unit, name, position, birthday, officeno, hpno, email, officeaddress, homeaddress) VALUES ('$type', '$sector', '$state', '$cat', '$catname', '$unit','$name','$position','$birthday','$officeno','$mobileno','$email','$offadd','$homeadd')");
            
            echo "<script>alert('Key People Added Successfully!'); window.location.href='welcomepage.php';</script>";
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


        <title>Add Key People</title>
        
        <link rel="icon" href="imgs/icon.ico" width='16px' height='16px' type="image/x-icon">
        
        <style>
            body {
                overflow-x: hidden;
                background-image: url("imgs/3.jpg");
                background-repeat: no-repeat;
                background-attachment: fixed;
                background-size: 1920px 1080px;
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
            textarea{
                text-transform: uppercase;
            }
        </style>
        <!-- Convrt ic to dob 
        <script>
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
        </script> -->
        
        <script>
            history.pushState(null, null, location.href);
            window.onpopstate = function () {
                history.go(1);
            };
        </script>
        
    </head>
    <body>
        <?php include "navbar.php" ?>
        <!-- card -->
        <div class="container" style="background-color: #FFFFFF; border-top-left-radius: 20px; border-top-right-radius: 20px; border-bottom-right-radius: 20px; border-bottom-left-radius: 20px; margin-top: 100px; border: 3px solid #283360;">
            <div class="row">
                <!-- My Profile -->
                    <div class="container">
                        <div class="card-body col-md-12">
                            <div class="row">
                                <div class="col">
                                    <h1 style="font-family:Trebuchet MS; color:black;">Add Key People</h1>
                                </div>
                                <div class="col">
                                    
                                </div>
                            </div>
                            <form action="peopleadd.php" method="post" autocomplete="off">
                                <div class="form-row">
                                    <!--
                                    <div class="form-group col-md-2">
                                        <label for="">Type</label>
                                        <select name="type" class="form-control" required>
                                            <option value="">Choose..</option>
                                            <option value="INTERNAL">INTERNAL</option>
                                            <option value="EXTERNAL">EXTERNAL</option>
                                        </select>
                                    </div>
                                    -->
                                    <div class="form-group col-md-3">
                                        <label for="">Sector</label>
                                        <select name="sector" class="form-control" required>
                                            <option value="">Choose..</option>
                                            <option value="GOVERNMENT">GOVERNMENT</option>
                                            <option value="PRIVATE">PRIVATE</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="">State</label>
                                        <select name="state" class="form-control" required>
                                            <option value="">Choose..</option>
                                            <option value="JOHOR">JOHOR</option>
                                            <option value="MELAKA">MELAKA</option>
                                            <option value="NEGERI SEMBILAN">NEGERI SEMBILAN</option>
                                            <option value="SELANGOR">SELANGOR</option>
                                            <option value="KL">KL</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="">Category</label>
                                        <select name="cat" class="form-control" required>
                                            <option value="">Choose..</option>
                                            <?php 
                                                $query1 = "SELECT * FROM `category` ";
                                                $result1 = mysqli_query($conn, $query1);
                                            ?>
                                            <?php while($row1=mysqli_fetch_array($result1)): ?>
                                            <option>
                                                <?php echo $row1['category']; ?>    <!-- Looping of category table -->
                                            </option>
                                            <?php endwhile; ?>
                                        </select>
                                    </div>   
                                    <div class="form-group col-md-3">
                                        <label for="">Category Name</label>
                                        <input type="text" class="form-control" id="tag" name="catname" style="text-transform:capitalize;" placeholder="eg: JKR Melaka Tengah" required>
                                    </div>                            
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-5">
                                        <label for="">Name</label>
                                        <input type="text" class="form-control" name="name" style="text-transform:uppercase;" required>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="">Position</label>
                                        <input type="text" class="form-control" name="position" style="text-transform:uppercase;" required>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="">Unit</label>
                                        <select name="unit" class="form-control" required>
                                            <option value="">Choose..</option>
                                            <?php 
                                                $query2 = "SELECT * FROM `unit` ";
                                                $result2 = mysqli_query($conn, $query2);
                                            ?>
                                            <?php while($row2=mysqli_fetch_array($result2)): ?>
                                            <option>
                                                <?php echo $row2['unit_name']; ?>    <!-- Looping of category table -->
                                            </option>
                                            <?php endwhile; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-3">
                                        <label for="">Birthday</label>
                                        <input type="text" class="form-control" id="datepicker" name="birthday">
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="">Mobile No.</label>
                                        <input type="text" class="form-control" name="mobileno">
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="">Office No.</label>
                                        <input type="text" class="form-control" name="officeno">
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="">Email</label>
                                        <input type="email" class="form-control" name="email">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="">Office Address</label>
                                        <textarea class="form-control" rows="5" style="resize: none;" name="offadd" style="text-transform:uppercase;"></textarea>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="">Home Address</label>
                                        <textarea class="form-control" rows="5" style="resize: none;" name="homeadd" style="text-transform:uppercase;"></textarea>
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
            <!-- /My Profile -->
        </div>  
        <!-- /card -->
        <br>
        <br>
        <!-- Footer -->
        <div id="footer">
            <?php include "footer.php" ?>
        </div>
        <!-- /Footer -->
    </body>
</html>

<!-- <script>
    $(document).ready(function () {
        $("#ic").keyup(function () {
            if ($(this).val().length == 6) {
                $(this).val($(this).val() + "-");
            }
            else if ($(this).val().length == 9) {
                $(this).val($(this).val() + "-");
            }
        });
    });
</script> -->
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
<script>
    $(function() {
        $("#tag").autocomplete({
            source: 'peopleaddautocomplete.php'
        });
    });
</script>