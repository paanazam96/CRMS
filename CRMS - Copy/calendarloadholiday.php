<?php

//load.php

$connect = new PDO('mysql:host=localhost;dbname=crms', 'root', '');

?>
<?php

$data = array();

$query = "SELECT * FROM pub_holiday";

$statement = $connect->prepare($query);

$statement->execute();

$result = $statement->fetchAll();

foreach($result as $res)
{
    $dateStart=strtotime($res['start']);
    $timeStart  = $dateStart;
    $day   = date('d',$timeStart);
    $month = date('m',$timeStart);
    $year  = date('Y',$timeStart);
    $curryear = date('Y');
    
    $dateEnd=strtotime($res['end']);
    $timeEnd  = $dateEnd;
    $day1   = date('d',$timeEnd);
    $month1 = date('m',$timeEnd);
    $year1  = date('Y',$timeEnd);
    $curryear = date('Y');
    
    $startDate = $curryear . "-" . $month . "-" . $day;
    $endDate = $curryear . "-" . $month1 . "-" . $day1;
    
    $data[] = array(
        'title'   => $res["name"],
        'start'   => $startDate,
        'end'     => $endDate."T23:59:00",
    );
}

echo json_encode($data);

?> 
