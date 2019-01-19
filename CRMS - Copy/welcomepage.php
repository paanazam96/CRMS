<?php   //including the database connection file
    session_start();
    include_once("config.php");
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
            
        <!-- Full Calendar -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.css" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.min.js"></script>
        
        <title>Home</title>
        
        <link rel="icon" href="imgs/icon.ico" width='16px' height='16px' type="image/x-icon">
        <style>
            body {
                overflow-x: hidden;
                background-color: #eeeeee;
            }
            ::-webkit-scrollbar {
                display: none;
            }
            .input-color {
                position: relative;
            }
            .input-color input {
                padding-left: 20px;
            }
            .input-color .color-box {
                width: 10px;
                height: 10px;
                position: absolute;
                left: 10px;
                top: 10px;
            }
            #footer {
                bottom:0;
                width:100%;
                height:30px;   /* Height of the footer */
                background: white;
                opacity: 0.9;
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
            .fc-today {
                color: red;
                font-weight: bolder;
            }
            .fc-title {
                font-weight: bold;
            }
            #calendar {
                background-color: #FFFFFF;
            }
            .fc-month-view span.fc-title{
                white-space: normal;
            }
        </style>    
        <script>
            $(document).ready(function() {
                var $months = $('#months');
                var $calendar = $('#calendar');

                $calendar.fullCalendar({
                    displayEventTime: false,
                    eventTextColor: "black",
                    eventBackgroundColor: "yellow",
                    firstDay: 1,
                    eventBorderColor: "black",
                    height: 680,
                    header:{
                        left: 'title',
                        center: 'false', 
                        right: 'today prev,next',
                    },
                    eventSources: [
                        {
                            url: 'calendarloadkeypeople.php',
                            color: 'black',
                            textColor: 'black',
                            backgroundColor: '#fdd1ad'
                        },
                        {
                            url: 'calendarloadfamily.php',
                            color: 'black',
                            textColor: 'black',
                            backgroundColor: '#fd9b49'
                        },
                        {
                            url: 'calendarloadevents.php',
                            color: 'black',
                            textColor: 'black',
                            backgroundColor: '#49e6e0',
                        },
                        {
                            url: 'calendarloadholiday.php',
                            color: 'black',
                            textColor: 'black',
                            backgroundColor: '#ffc5ff',
                        },
                        {
                            url: 'calendarloadplanner.php',
                            color: 'black',
                            textColor: 'black',
                            backgroundColor: 'yellow',
                        },
                        {
                            url: 'calendarloadholiday2.php',
                            color: 'black',
                            textColor: 'black',
                            backgroundColor: '#ffc5ff',
                        },
                    ],
                    //events: 'calendarload.php',
                    viewRender: function() {
                        buildMonthList();
                    }
                });
                //calendar dropdown list
                $('#months').on('change', function() {
                    $calendar.fullCalendar('gotoDate', $(this).val());
                });

                buildMonthList();

                function buildMonthList() {
                    $('#months').empty();
                    var month = $calendar.fullCalendar('getDate');
                    var initial = month.format('YYYY-MM');
                    month.add(-6, 'month');
                    for (var i = 0; i < 13; i++) {
                        var opt = document.createElement('option');
                        opt.value = month.format('YYYY-MM-01');
                        opt.text = month.format('MMM YYYY');
                        opt.selected = initial === month.format('YYYY-MM');
                        $months.append(opt);
                        month.add(1, 'month');
                    }
                }
                //calendar dropdown list
            });   
        </script>        
        <script>
            history.pushState(null, null, location.href);
            window.onpopstate = function () {
                history.go(1);
            };
        </script>
    </head>
    <body>
        <?php include "navbar.php" ?>
        <!-- Content -->
        <div class="row">
            <!-- Calendar -->
            <div class="col-9">
                <div class="container " style="background-color: #FFFFFF; margin-top: 100px; border: 2px solid #283360;">
                    <br>
                    <div class="row">
                        <div class="col">
                            <label>Jump to:</label>
                            <select id='months'></select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-2">
                            <div class="input-color">
                                <input type="text" value="Events" />
                                <div class="color-box" style="background-color: #49e6e0;"></div>
                                <!-- Replace "navy" to change the color -->
                            </div>
                        </div>
                        <div class="col-2">
                            <div class="input-color">
                                <input type="text" value="Holiday" />
                                <div class="color-box" style="background-color: #ffc5ff;"></div>
                                <!-- Replace "navy" to change the color -->
                            </div> 
                        </div>
                        <div class="col-2">
                            <div class="input-color">
                                <input type="text" value="Planner" />
                                <div class="color-box" style="background-color: yellow;"></div>
                                <!-- Replace "navy" to change the color -->
                            </div> 
                        </div>
                        <div class="col-2">
                            <div class="input-color">
                                <input type="text" value="Client's Birthday" />
                                <div class="color-box" style="background-color: #fdd1ad;"></div>
                                <!-- Replace "#FF850A" to change the color -->
                            </div>
                        </div>
                        <div class="col-2">
                            <div class="input-color">
                                <input type="text" value="Client's Family Birthday" />
                                <div class="color-box" style="background-color: #fd9b49;"></div>
                                <!-- Replace "navy" to change the color -->
                            </div> 
                        </div>
                    </div>
                    <hr />
                    <div id="calendar">

                    </div>
                    <br> 
                </div>
            </div>
            <!-- Calendar -->
            <!-- Notification Panel -->
            <div class="col-3">
                <div class="container " style="background-color: #FFFFFF; margin-top: 100px; border: 2px solid #283360;">
                    <br>
                    <div class="row">
                        <div class="col">
                            <center><h3 style="font-family:Trebuchet MS;">Notifications</h3></center>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <label><b>Events on <?php echo date('F') ?> <?php echo date('Y') ?></b></label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <table id="panel" class="table table-hover table-bordered">
                            <?php
                                $query1 = mysqli_query($conn, "SELECT * FROM events WHERE MONTH(start)=MONTH(CURRENT_DATE()) AND YEAR(start)=YEAR(CURRENT_DATE())");
                                
                                while($result = mysqli_fetch_array($query1))
                                {
                                    echo "<tr>";
                                    echo "<td style='font-size:14px;'>". $result['event']."</td>";  
                                    echo "<td align='center'><a href='eventview.php?id=$result[id]'><i class='fas fa-eye'></i></a></td>";    
                                }
                            ?>
                            </table>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <label><b>Schedule Planner on <?php echo date('F') ?> <?php echo date('Y') ?></b></label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <table id="panel" class="table table-hover table-bordered">
                            <?php
                                $query1 = mysqli_query($conn, "SELECT * FROM planner WHERE MONTH(start)=MONTH(CURRENT_DATE()) AND YEAR(start)=YEAR(CURRENT_DATE())");
                                
                                while($result = mysqli_fetch_array($query1))
                                {
                                    if($result["status"] == "COMPLETED")
                                    {
                                        $stat = "<b style='color:green;'>".$result["status"]."</b>";
                                    }
                                    else if($result["status"] == "PLANNING")
                                    {
                                        $stat = "<b style='color:black;'>".$result["status"]."</b>";
                                    }
                                    else
                                    {
                                        $stat = "<b style='color:red;'>".$result["status"]."</b>";
                                    }
                                    
                                    $date = date('d-M-y', strtotime($result['start']));
                                    echo "<tr>";
                                    echo "<td >". $result['planning_detail']."</td>";  
                                    echo "<td style='width: 105px;'>". $date . "<br>" . $stat ."</td>";
                                    echo "<td align='center'><a href='plannerview.php?id=$result[id]'><i class='fas fa-eye'></i></a></td>";    
                                }
                            ?>
                            </table>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <label><b>Birthdays on <?php echo date('F') ?> <?php echo date('Y') ?></b></label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <table id="panel2" class="table table-hover table-bordered">
                            <?php
                                $query2 = mysqli_query($conn, "SELECT * FROM keypersonal 
                                                               WHERE MONTH(birthday) = MONTH(CURRENT_DATE())");
                                
                                while($result = mysqli_fetch_array($query2))
                                {
                                    $birthday = date('d-M-y', strtotime($result['birthday']));
                                    echo "<tr>";
                                    echo "<td>". $result['name'] ."</td>";
                                    echo "<td style='width: 105px;'>". $birthday ."</td>";
                                    echo "<td align='center'><a href='peopleprofile.php?id=$result[id]'><i class='fas fa-eye'></i></a></td>";
                                }
                                
                                $query3 = mysqli_query($conn, "SELECT * FROM family 
                                                               WHERE MONTH(birthday) = MONTH(CURRENT_DATE())");
                                
                                while($result = mysqli_fetch_array($query3))
                                {
                                    $birthday = date('d-M-y', strtotime($result['birthday']));
                                    echo "<tr>";
                                    echo "<td>". $result['famname'] ."</td>";
                                    echo "<td style='width: 105px;'>". $birthday ."</td>";
                                    echo "<td align='center' class='action'><a href='peopleprofile.php?id=$result[fid]'><i class='fas fa-eye'></i></a></td>";
                                }
                            ?>
                            </table>
                        </div>
                    </div>
                    <br>
                </div>
            </div>
            <!-- /Notification Panel -->
        </div>
        <!-- /Content -->
        <br>
        <br>
        <!-- Footer -->
        <div id="footer">
            <?php include "footer.php" ?>
        </div>
        <!-- /Footer -->
    </body>
</html>
