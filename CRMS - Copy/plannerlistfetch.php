<?php
$connect = mysqli_connect("localhost", "root", "", "crms");
$output = '';
if(isset($_POST["query"]))
{
	$year = $_POST['query'];
    $query = "SELECT * FROM planner WHERE YEAR(start)=$year";
}
else
{ 
    $query = "SELECT * FROM planner WHERE YEAR(start)=YEAR(CURDATE())";
}
$result = mysqli_query($connect, $query);
if(mysqli_num_rows($result) > 0)
{
    $output .= '<div class="table-responsive ">
					<table class="table table-hover table-bordered table-light">
						<tr class="bg-info text-white" align="center">
							<th>No.</th>
							<th>Date</th>
							<th>Planner Detail</th>
							<th>Planner Name</th>
							<th>Person to Meet</th>
                            <th>Location</th>
                            <th>Status</th>
                            <th>Action</th>
						</tr>';
    
    $counter = 1;
	while($row = mysqli_fetch_array($result))
	{
        $tarikh=$row['start'];
        $date=date('d-F-Y', strtotime($tarikh));
        
        if($row["status"] == "COMPLETED")
        {
            $stat = "<b style='color:green;'>".$row["status"]."</b>";
        }
        else if($row["status"] == "PLANNING")
        {
            $stat = "<b style='color:black;'>".$row["status"]."</b>";
        }
        else
        {
            $stat = "<b style='color:red;'>".$row["status"]."</b>";
        }
        
		$output .= '
			<tr >
                <td align="center">'.$counter.'</td>
				<td align="center">'.$date.'</td>
				<td>'.$row["planning_detail"].'</td>
                <td>'.$row["planner_name"].'</td>
                <td>'.$row["person_meet"].'</td>
                <td>'.$row["location"].'</td>
                <td>'.$stat.'</td>
                <td align="center"><a href="plannerview.php?id='.$row["id"].'">View</a> | <a href="plannerdelete.php?id='.$row["id"].'" onclick="return checkDelete()">Delete</a></td>
		'; 
        $counter++;
	}
	echo $output;
}
else
{
	echo 'Events not Found!';
}
?>
<script language="JavaScript" type="text/javascript">
function checkDelete(){
    return confirm('Are you sure you want to delete this event?\nThis action CANNOT be undone.');
}
</script>