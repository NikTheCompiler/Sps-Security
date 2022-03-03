<?php   
$server_nm="DESKTOP-FCR3KJC";
$connection=array("Database"=>"SpsSecurity","UID"=>"","PWD"=>"");
$conn= sqlsrv_connect($server_nm,$connection);
if($conn){
   //echo "Connection established!";
}
else{
   echo"Connection could not be established";
   die(print_r(sqlsrv_errors(),true));
}
?>     

<?php  
/*
 Specify the server and connection string attributes.   
$serverName = "DESKTOP-FCR3KJC";  
$connectionInfo = array( "Database"=>"SpsSecurity");  
  
 Connect using Windows Authentication.   
$conn = sqlsrv_connect( $serverName, $connectionInfo);  
if( $conn === false )  
{  
     echo "Unable to connect.</br>";  
     die( print_r( sqlsrv_errors(), true));  
}  
  
 Query SQL Server for the login of the user accessing the  
database.   
$tsql = "SELECT CONVERT(varchar(32), SUSER_SNAME())";  
$stmt = sqlsrv_query( $conn, $tsql);  
if( $stmt === false )  
{  
     echo "Error in executing query.</br>";  
     die( print_r( sqlsrv_errors(), true));  
}  
  
 Retrieve and display the results of the query.  
$row = sqlsrv_fetch_array($stmt);  
echo "User login: ".$row[0]."</br>";  
  
 Free statement and connection resources.   
sqlsrv_free_stmt( $stmt);  
sqlsrv_close( $conn);
*/  
?>  
