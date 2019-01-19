<?php
$connect = mysqli_connect("localhost", "root", "", "crms");
$output = '';
if(isset($_POST["query"]))
{
	$search = mysqli_real_escape_string($connect, $_POST["query"]);
	$query = "
	SELECT * FROM keypersonal 
	WHERE type LIKE '%".$search."%'
	OR sector LIKE '%".$search."%' 
    OR negeri LIKE '%".$search."%'
	OR category LIKE '%".$search."%' 
    OR category_name LIKE '%".$search."%'  
	OR unit LIKE '%".$search."%'
    OR name LIKE '%".$search."%'
    OR position LIKE '%".$search."%'
    OR officeno LIKE '%".$search."%'
    OR hpno LIKE '%".$search."%'
    OR email LIKE '%".$search."%'
    OR birthday LIKE '%".$search."%'
    OR id LIKE '%".$search."%'
	";
}
else
{  
	$query = "
	SELECT * FROM keypersonal ORDER BY id";
}
$result = mysqli_query($connect, $query);
if(mysqli_num_rows($result) > 0)
{
	$output .= '<div class="table-responsive ">
					<table class="table table-hover table-bordered table-light">
						<tr class="bg-info text-white" align="center">
                            <th>No.</th>
                            <th>Name</th>
                            <th>Category</th>
                            <th>State</th>
                            <th>Position</th>
                            <th>Office No</th>
                            <th>Mobile No</th>
                            <th>Email</th>
                            <th>Actions</th>
						</tr>';
    $counter = 1;
	while($row = mysqli_fetch_array($result))
	{
        $tarikh=$row['birthday'];
        $date=date('j/M/y', strtotime($tarikh));
		$output .= '
			<tr >
                <td align="center">'.$counter.'</td>
                <td>'.$row["name"].'</td>
                <td>'.$row["category"].'</td>
                <td>'.$row["negeri"].'</td>
				<td>'.$row["position"].'</td>
				<td>'.$row["officeno"].'</td>
				<td>'.$row["hpno"].'</td>
				<td>'.$row["email"].'</td>
                <td align="center"><a href="peopleprofile.php?id='.$row["id"].'">View</a> | <a href="peopleprofiledelete.php?id='.$row["id"].'" onclick="return checkDelete()">Delete</a></td>			
		';
        $counter++;
	}                                                  
	echo $output;
}
else
{
	echo 'Details not Found!';
}
?>
<script language="JavaScript" type="text/javascript">
function checkDelete(){
    return confirm('Are you sure you want to delete this staff?\nThis action CANNOT be undone.');
}
</script>