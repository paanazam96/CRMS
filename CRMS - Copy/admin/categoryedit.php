<?php   //including the database connection file 
    session_start();
    include_once("config.php");

    if(isset($_POST['update'])) //update staff details based on id
    { 
        $id = mysqli_real_escape_string($conn, $_POST['id']);        
        $category = mysqli_real_escape_string($conn, strtoupper($_POST['category']));
        
        $result = mysqli_query($conn, "UPDATE category SET category='$category' WHERE id='$id' ");
        
        echo "<script>alert('Category Successfully Updated!'); window.location.href='detailadd.php?id=$id';</script>";
    }
?>
<?php
    $id = $_GET['id'];
    $result = mysqli_query($conn, "SELECT * FROM category WHERE id=$id");

    while($res = mysqli_fetch_array($result))
    {
        $category = $res['category'];
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
        <title>Add Details</title>
        <link rel="icon" href="imgs/icon.ico" width='16px' height='16px' type="image/x-icon">
        
        <style>
            body {
                overflow-x: hidden;
                background-image: url("imgs/8331.jpg");
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
                                <center><h1 style="font-family:Trebuchet MS; color:black;">Edit Details</h1></center>
                            </div>
                        </div>
                        <div class="card-body col-md-12">                        
                            <div class="row">
                                <div class="col">
                                    <h4>Category</h4>
                                </div>
                            </div>
                            <form action="categoryedit.php" method="post" autocomplete="off">
                                <input type="text" class="form-control" name="category" style="text-transform:uppercase;" value="<?php echo $category; ?>" required>
                                <br>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <a href="detailadd.php" class="btn btn-danger btn-sm float-left" role="button">Back</a>     
                                    </div>
                                    <div class="form-group col-md-6">
                                        <input type="hidden" name="id" value="<?php echo $id;?>">
                                        <input type="submit" name="update" value="Update" class="btn btn-success btn-sm float-right">
                                    </div>
                                </div>
                            </form> 
                        </div>
                    </div>
                </div>
            </div>
            <!-- /My Profile -->
        </div>
        <!-- Footer -->
        <div id="footer">
            <?php include "footer.php" ?>
        </div>
        <!-- /Footer -->
    </body>
</html>