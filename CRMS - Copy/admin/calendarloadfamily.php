<?php

//load.php

$connect = new PDO('mysql:host=localhost;dbname=crms', 'root', '');

?>
<?php

$data = array();

$query = "SELECT family.fid, 
            family.birthday, 
            family.famname, 
            family.relationship, 
            keypersonal.id, 
            keypersonal.name 
            FROM family, keypersonal 
            WHERE family.fid = keypersonal.id";

$statement = $connect->prepare($query);

$statement->execute();

$result = $statement->fetchAll();

foreach($result as $res)
{
    $date1=date('d-M-Y', strtotime($res['birthday']));
    $date=strtotime($res['birthday']);
    $time  = $date;
    $day   = date('d',$time);
    $month = date('m',$time);
    $year  = date('Y',$time);
    $curryear = date('Y');
    
    $age = date('Y')-$year;
    
    $data[] = array(
        'title'   => "Birthday for " . $res["famname"] . " - "  . $res["relationship"] . " of " . $res["name"] . " ",
        'start'   => $curryear . "-" . $month . "-" . $day
    );
}

echo json_encode($data);

?>
