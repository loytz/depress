<?php   include('connect.php'); ?>

<?php 
// Database connection info 
$dbDetails = array( 
    'host' => $hostname, 
    'user' => $username , 
    'pass' => $password, 
    'db'   => $database
); 
 
// DB table to use 
$table = 'learners_assessment'; 

 
// Table's primary key 
$primaryKey = 'id';
$query_btn = $_GET['query_btn'];
 
// Array of database columns which should be read and sent back to DataTables. 
// The `db` parameter represents the column name in the database.  
// The `dt` parameter represents the DataTables column identifier. 

$columns = array(
    array( 'db' => 'id',    'dt' => 0, 'field' => 'id'),
    array( 'db' => 'lrn',    'dt' => 1, 'field' => 'lrn'),
    array( 'db' => 'strand',    'dt' => 2, 'field' => 'strand'),
    array( 'db' => 'year_level',    'dt' => 3, 'field' => 'year_level'),
    array( 'db' => 'depression_score',    'dt' => 4, 'field' => 'depression_score'),
    array( 'db' => "DATE_FORMAT(assessment_date,'%M %d, %Y')",    'dt' => 5, 'field' => "DATE_FORMAT(assessment_date,'%M %d, %Y')"),
    array( 'db' => 'id',    'dt' => 6, 'field' => 'id'),
); 
 
// Include SQL query processing class 
require 'ssp.class.php'; 

if($query_btn === "clicked")
{
    $date_range_from = $_GET['date_range_from'];
    $date_range_to = $_GET['date_range_to'];

    $joinQuery = ", assessment_date, DATE_FORMAT(assessment_date,'%M %d, %Y') FROM `{$table}` ";
    $where = "";
    $conditions = array();

    if($date_range_from != "")
    {
        $conditions[] = "`assessment_date` >= '$date_range_from'";
    }

    if($date_range_to != "")
    {
        $conditions[] = "`assessment_date` <= '$date_range_to'";
    }


    if (count($conditions) > 0) {
        $where = implode(' AND ', $conditions);
    }
}
else
{
  $joinQuery = ", assessment_date, DATE_FORMAT(assessment_date,'%M %d, %Y') FROM `{$table}` ";
  $where = "";
}



// Output data as json format 
  echo json_encode( SSP::simple( $_GET, $dbDetails, $table, $primaryKey, $columns, $joinQuery, $where) );
// print json_encode($where);

?>