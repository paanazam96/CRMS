<?php
$connect = mysqli_connect("localhost", "root", "", "crms");
$output = '';
if(isset($_POST["query"]))
{
	$year = $_POST['query'];
    $query = "SELECT * FROM events WHERE YEAR(start)=$year";
}
else
{ 
    $query = "SELECT * FROM events WHERE YEAR(start)=YEAR(CURDATE())";
}
$result = mysqli_query($connect, $query);
if(mysqli_num_rows($result) > 0)
{
    $output .= '<div class="table-responsive ">
					<table class="table table-hover table-bordered table-light">
						<tr class="bg-info text-white" align="center">
							<th>No.</th>
							<th>Date</th>
							<th>Type</th>
							<th>Event</th>
							<th>Location</th>
                            <th>Action</th>
						</tr>';
    
    $counter = 1;
	while($row = mysqli_fetch_array($result))
	{
        $tarikh=$row['start'];
        $date=date('d-F-Y', strtotime($tarikh));
        
		$output .= '
			<tr >
                <td align="center">'.$counter.'</td>
				<td align="center">'.$date.'</td>
				<td>'.$row["type"].'</td>
                <td >'.$row["event"].'</td>
                <td >'.$row["location"].'</td>
                <td align="center"><a href="eventview.php?id='.$row["id"].'">View</a> | <a href="eventdelete.php?id='.$row["id"].'" onclick="return checkDelete()">Delete</a></td>
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