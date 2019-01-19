<?php   //including the database connection file 
    session_start();
    include_once("config.php");
?>
<?php
    $id = $_GET['id'];
    $result = mysqli_query($conn, "SELECT * FROM keypersonal WHERE id='$id'");

    while($res = mysqli_fetch_array($result))
    {
        $date=date('d-F-Y', strtotime($res['birthday']));
        
        $type = $res['type'];
        $sector = $res['sector'];
        $state = $res['negeri'];
        $cat = $res['category'];
        $catname = $res['category_name'];
        $unit = $res['unit'];
        $name = $res['name'];
        $position = $res['position'];
        $birthday = $date;
        $officeno = $res['officeno'];
        $hpno = $res['hpno'];
        $email = $res['email'];
        $offaddress = $res['officeaddress'];
        $homeaddress = $res['homeaddress'];
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


        <title>Key People Profile</title>
        
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
        <?php
            // Make the months array:
            $months = array ('January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December');
            // some months are a bit off, the keys are missing
            // Should be something like this:

            $months = array ('January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December');
            $month_num = range(1, 12);
            $months = array_combine($month_num, $months);
        ?>
        <!-- nav bar -->
        <?php include "navbar.php" ?>
        <!-- /nav bar -->
        <!-- card -->
        <div class="container" style="background-color: #FFFFFF; border-top-left-radius: 20px; border-top-right-radius: 20px; border-bottom-right-radius: 20px; border-bottom-left-radius: 20px; margin-top: 100px; border: 3px solid #283360;">
            <div class="row">
                <!-- My Profile -->
                    <div class="container">
                        <div class="card-body col-md-12">
                            <div class="row">
                                <div class="col">
                                    <div class="float-left"><a href="peoplelist.php" class="btn btn-danger btn-md" role="button">Back</a></div> <!-- This button take the id (by echo) to editprofile page -->
                                </div>
                                <div class="col">
                                    <h1 style="font-family:Trebuchet MS; color:black;">Key People Profile</h1>
                                </div>
                                <div class="col">
                                    <div class="float-right"><a href="peopleprofileedit.php?id=<?php echo $id; ?>" class="btn btn-success btn-md" role="button">Edit Profile</a></div> <!-- This button take the id (by echo) to editprofile page -->
                                </div>
                            </div>
                            <form action="" method="post" autocomplete="off">
                                <div class="form-row">
                                    <div class="form-group col-md-3">
                                        <label for="">Sector</label>
                                        <input type="text" class="form-control" name="sector" style="text-transform:uppercase;" value="<?php echo $sector;?>" disabled>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="">State</label>
                                        <input type="text" class="form-control" name="state" style="text-transform:uppercase;" value="<?php echo $state;?>" disabled>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="">Category</label>
                                        <input type="text" class="form-control" name="cat" style="text-transform:uppercase;" value="<?php echo $cat;?>" disabled>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="">Category Name</label>
                                        <input type="text" class="form-control" name="cat" style="text-transform:uppercase;" value="<?php echo $catname;?>" disabled>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-5">
                                        <label for="">Name</label>
                                        <input type="text" class="form-control" name="name" style="text-transform:uppercase;" value="<?php echo $name;?>" disabled>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="">Position</label>
                                        <input type="text" class="form-control" name="position" style="text-transform:uppercase;" value="<?php echo $position;?>" disabled>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="">Unit</label>
                                        <input type="text" class="form-control" name="unit" style="text-transform:uppercase;" value="<?php echo $unit;?>" disabled>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-3">
                                        <label for="">Birthday</label>
                                        <input type="text" class="form-control" id="datepicker" name="birthday" value="<?php echo $birthday;?>" disabled>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="">Mobile No.</label>
                                        <input type="text" class="form-control" name="mobileno" value="<?php echo $hpno;?>" disabled>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="">Office No.</label>
                                        <input type="text" class="form-control" name="officeno" value="<?php echo $officeno;?>" disabled>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="">Email</label>
                                        <input type="email" class="form-control" name="email" value="<?php echo $email;?>" disabled>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="">Office Address</label>
                                        <textarea class="form-control" rows="5" style="resize: none;" name="offadd" style="text-transform:uppercase;" disabled><?php echo $offaddress;?></textarea>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="">Home Address</label>
                                        <textarea class="form-control" rows="5" style="resize: none;" name="homeadd" style="text-transform:uppercase;" disabled><?php echo $homeaddress;?></textarea>
                                    </div>
                                </div>
                            </form>
                            <div class="row">
                                <div class="col">
                                    
                                </div>
                                <div class="col">
                                    <h1 style="font-family:Trebuchet MS; color:black;">Key People Family</h1>
                                </div>
                                <div class="col">
                                    <div class="float-right"><a href="peoplefamilyadd.php?id=<?php echo $id; ?>" class="btn btn-success btn-md" role="button">Add Family</a></div> <!-- This button take the id (by echo) to editprofile page -->
                                </div>
                            </div>
                            <table class="table table-hover table-bordered">
                                <tr class="bg-info text-white" align="center" style="font-weight:bold">
                                    <td align="center">No.</td>
                                    <td align="center">Relationship</td>
                                    <td align="center">Name</td>
                                    <td align="center">Date of Birth</td>
                                    <td align="center">Action</td>
                                </tr>
                                <tbody>
                                    <?php
                                        $result2 = mysqli_query($conn, "SELECT * FROM family WHERE fid='$id' ORDER BY birthday");
                                        $counter=1;
                                        while($res = mysqli_fetch_array($result2))
                                        { 
                                            $birthday = date('d-F-Y', strtotime($res['birthday']));
                                            echo "<tr>";
                                            echo "<td align='center'>".$counter."</td>";
                                            echo "<td >".$res['relationship']."</td>";
                                            echo "<td >".$res['famname']."</td>";
                                            echo "<td align='center'>".$birthday."</td>";
                                            echo "<td align='center'><a href=\"peoplefamilyedit.php?no=$res[id]\">Edit</a> | <a href=\"peoplefamilydelete.php?no=$res[id]\" onClick=\"return confirm('Are you sure you want to delete $res[famname] ?')\">Delete</a></td>";
                                            $counter++;
                                        }
                                    ?>
                                </tbody>
                            </table>
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

<script>
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
</script>
<script>
    $(function() {
        $( "#datepicker" ).datepicker({
            changeMonth: true,
            changeYear: true,
            dateFormat: 'yy-mm-dd', // iso format
        });
    });
</script>