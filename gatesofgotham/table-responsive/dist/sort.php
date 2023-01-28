<?php 
if(isset($_GET['sortby'])){
    $sort=$_GET['sortby'];
    $selectquery = "select * from reports group by location ";
}
?>