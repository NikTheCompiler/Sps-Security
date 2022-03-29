<?php
require_once("connect.php");
if(!empty($_GET['Qid'])) {
    $qid = $_GET["Qid"];
	         
	$query ="SELECT * FROM Categories WHERE Dept IN ($qid)";
	$results = sqlsrv_query($conn, $query);
?>
	<option disabled value="all">Select Category</option>
<?php
	while ($row = sqlsrv_fetch_array($results,SQLSRV_FETCH_ASSOC)) {
		
?>
	<option value="<?php echo $row["CID"]; ?>"><?php echo $row["Cname"]; ?></option>
	
<?php
	}
}
?>