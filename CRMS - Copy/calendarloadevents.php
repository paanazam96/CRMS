<?php

//load.php

$connect = new PDO('mysql:host=localhost;dbname=crms', 'root', '');

?>
<?php

$data = array();

$query = "SELECT * FROM events";

$statement = $connect->prepare($query);

$statement->execute();

$result = $statement->fetchAll();

foreach($result as $res)
{    
    $data[] = array(
        'title'   => $res["event"], 
        'start'   => $res["start"],
        'end' => $res["end"]."T23:59:00",
    );
}

echo json_encode($data);

?>
