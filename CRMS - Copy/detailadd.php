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
        <title>Add Details</title>
        <link rel="icon" href="imgs/icon.ico" width='16px' height='16px' type="image/x-icon">
        
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
            #myTable {
                display: none;
            }
            #myTable2 {
                display: none;
            }
            #myTable3 {
                display: none;
            }
        </style>
        <!--<script>
            history.pushState(null, null, location.href);
            window.onpopstate = function () {
                history.go(1);
            };
        </script>-->
    </head>
    <body>
        <?php include "navbar.php" ?>
        <div class="container col-5" style="background-color: #FFFFFF; border-top-left-radius: 20px; border-top-right-radius: 20px; border-bottom-right-radius: 20px; border-bottom-left-radius: 20px; margin-top: 100px; border: 3px solid #283360;">
            <div class="row">
                <!-- My Profile -->
                <div class="container">
                    <div class="card-body col-md-12">
                        <div class="row">
                            <div class="col">
                                <center><h1 style="font-family:Trebuchet MS; color:black;">Add Details</h1></center>
                            </div>
                        </div>
                        <div class="card-body col-md-12">                        
                            <div class="row">
                                <div class="col">
                                    <h4>Category</h4>
                                </div>
                                <div class="col-md-3">
                                    <button1 class="btn btn-warning float-right reveal">Show Category</button1>
                                </div>
                            </div>
                            <form action="detailadd.php" method="post" autocomplete="off">
                                <input type="text" class="form-control" name="category" style="text-transform:uppercase;" required>
                                <div class="float-right"><button type="submit" name="subcategory" class="btn">Add</button></div>
                            </form> 
                            <div class="category">
                                <table id="myTable" style="width:100%" border="1" class="table-hover">
                                    <tr align="center">
                                        <th style='width:350px;'>Category</th>
                                        <th>Action</th>
                                    </tr>
                                    <?php
                                        $query1 = mysqli_query($conn, "SELECT * FROM category");
                                
                                        while($result = mysqli_fetch_array($query1))
                                        {
                                            echo "<tr>";
                                            echo "<td>".$result['category']."</td>";  
                                            echo "<td align='center'><a href='categoryedit.php?id=$result[id]'>Edit</a> | <a href='categorydelete.php?id=$result[id]'>Delete</a></td>";    
                                        }                                        
                                    ?>
                                </table>
                            </div>
                        </div>
                        <div class="card-body col-md-12">
                            <div class="row">
                                <div class="col">
                                    <h4>Category Name</h4>
                                </div>
                                <div class="col-md-3">
                                    <button2 class="btn btn-warning float-right reveal2">Show Category Name</button2>
                                </div>
                            </div>
                            <form action="detailadd.php" method="post" autocomplete="off">
                                <input type="text" class="form-control" name="cname" style="text-transform:capitalize;" placeholder="eg: JKR Melaka Tengah" required>
                                <div class="float-right"><button type="submit" name="cat_name" class="btn">Add</button></div>
                            </form>
                            <div class="categoryname">
                                <table id="myTable2" style="width:100%" border="1" class="table-hover">
                                    <tr align="center">
                                        <th style='width:350px;'>Category</th>
                                        <th>Action</th>
                                    </tr>
                                    <?php
                                        $query2 = mysqli_query($conn, "SELECT * FROM category_name");
                                
                                        while($result = mysqli_fetch_array($query2))
                                        {
                                            echo "<tr>";
                                            echo "<td>".$result['cat_name']."</td>";  
                                            echo "<td align='center'><a href='categorynameedit.php?id=$result[id]'>Edit</a> | <a href='categorynamedelete.php?id=$result[id]'>Delete</a></td>";    
                                        }                                        
                                    ?>
                                </table>
                            </div>
                        </div>
                        <div class="card-body col-md-12">
                            <div class="row">
                                <div class="col">
                                    <h4>Unit</h4>
                                </div>
                                <div class="col-md-3">
                                    <button3 class="btn btn-warning float-right reveal3">Show Unit</button3>
                                </div>
                            </div>
                            <form action="detailadd.php" method="post" autocomplete="off">
                                <input type="text" class="form-control" name="unitname" style="text-transform:uppercase;" required>
                                <div class="float-right"><button type="submit" name="unit" class="btn">Add</button></div>
                            </form>
                            <div class="unit">
                                <table id="myTable3" style="width:100%" border="1" class="table-hover">
                                    <tr align="center">
                                        <th style='width:350px;'>Category</th>
                                        <th>Action</th>
                                    </tr>
                                    <?php
                                        $query3 = mysqli_query($conn, "SELECT * FROM unit");
                                
                                        while($result = mysqli_fetch_array($query3))
                                        {
                                            echo "<tr>";
                                            echo "<td>".$result['unit_name']."</td>";  
                                            echo "<td align='center'><a href='unitedit.php?id=$result[id]'>Edit</a> | <a href='unitdelete.php?id=$result[id]'>Delete</a></td>";    
                                        }                                        
                                    ?>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /My Profile -->
        </div>
        <br>
        <br>
        <br>
        <!-- Footer -->
        <div id="footer">
            <?php include "footer.php" ?>
        </div>
        <!-- /Footer -->
    </body>
</html>
<?php
  
    if(isset($_POST['subcategory'])) //update staff details based on id
    { 
        $cat = mysqli_real_escape_string($conn, strtoupper($_POST['category']));
        
        //add staff to table staffs
        $check_category = "SELECT * FROM category WHERE category='$cat' ";
        $res = mysqli_query($conn, $check_category);
        $count = mysqli_num_rows($res);
        
        if($count == 1)
        { 
            echo "<script>alert('$cat Already EXISTED!'); window.location.href='detailadd.php';</script>";
        }
        else
        {
            $result = mysqli_query($conn, "INSERT category (category) VALUES ('$cat')");
            
            echo "<script>alert('$cat Added Successfully!'); window.location.href='detailadd.php';</script>";
        } 
    }
    
    /*if(isset($_POST['substate'])) //update staff details based on id
    { 
        $state = mysqli_real_escape_string($conn, strtoupper($_POST['state']));
        
        //add staff to table staffs
        $check_state = "SELECT * FROM state WHERE negeri='$state' ";
        $res = mysqli_query($conn, $check_state);
        $count = mysqli_num_rows($res);
        
        if($count == 1)
        { 
            echo "<script>alert('$state Already EXISTED!'); window.location.href='detailadd.php';</script>";
        }
        else
        {
            $result = mysqli_query($conn, "INSERT state (negeri) VALUES ('$state')");
            
            echo "<script>alert('$state Added Successfully!'); window.location.href='detailadd.php';</script>";
        } 
    } */
        
    if(isset($_POST['cat_name'])) //update staff details based on id
    { 
        $cname = mysqli_real_escape_string($conn, strtoupper($_POST['cname']));
        
        //add staff to table staffs
        $check_cname = "SELECT * FROM category_name WHERE cat_name='$cname' ";
        $res = mysqli_query($conn, $check_cname);
        $count = mysqli_num_rows($res);
        
        if($count == 1)
        { 
            echo "<script>alert('$cname Already EXISTED!'); window.location.href='detailadd.php';</script>";
        }
        else
        {
            $result = mysqli_query($conn, "INSERT category_name (cat_name) VALUES ('$cname')");
            
            echo "<script>alert('$cname Added Successfully!'); window.location.href='detailadd.php';</script>";
        } 
    }
        
    if(isset($_POST['unit'])) //update staff details based on id
    { 
        $unitname = mysqli_real_escape_string($conn, strtoupper($_POST['unitname']));
        
        //add staff to table staffs
        $check_unitname = "SELECT * FROM unit WHERE unit_name='$unitname' ";
        $res = mysqli_query($conn, $check_unitname);
        $count = mysqli_num_rows($res);
        
        if($count == 1)
        { 
            echo "<script>alert('$unitname Already EXISTED!'); window.location.href='detailadd.php';</script>";
        }
        else
        {
            $result = mysqli_query($conn, "INSERT unit (unit_name) VALUES ('$unitname')");
            
            echo "<script>alert('$unitname Added Successfully!'); window.location.href='detailadd.php';</script>";
        } 
    }
?>

<script>
    $(document).ready(function(){
        $("button1").click(function(){
            $("#myTable").toggle();
        });
    });
    $(document).ready(function(){
        $("button2").click(function(){
            $("#myTable2").toggle();
        });
    });
    $(document).ready(function(){
        $("button3").click(function(){
            $("#myTable3").toggle();
        });
    });
    $('.reveal').click(function() {
        if ($(this).text() === 'Close Category') {
             $(this).text('Show Category');
        }
        else {
            $(this).text('Close Category');
        }
    });
    $('.reveal2').click(function() {
        if ($(this).text() === 'Close Category Name') {
             $(this).text('Show Category Name');
        }
        else {
            $(this).text('Close Category Name');
        }
    });
    $('.reveal3').click(function() {
        if ($(this).text() === 'Close Unit') {
             $(this).text('Show Unit');
        }
        else {
            $(this).text('Close Unit');
        }
    });
</script>