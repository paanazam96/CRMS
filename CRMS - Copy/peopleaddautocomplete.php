<?php

    //database configuration
    $dbHost = 'localhost';
    $dbUsername = 'root';
    $dbPassword = '';
    $dbName = 'crms';
    
    //connect with the database
    $db = new mysqli($dbHost,$dbUsername,$dbPassword,$dbName);
    
    //get search term
    $searchTerm = $_GET['term'];
    
    //get matched data from skills table
    $query = $db->query("SELECT * FROM category_name WHERE cat_name LIKE '%".$searchTerm."%' ORDER BY cat_name ASC");
    $data = [];
    while ($row = $query->fetch_assoc()) {
        $data[] = $row['cat_name'];
    }
    
    //return json data
    echo json_encode($data);

?>