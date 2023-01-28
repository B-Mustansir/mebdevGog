<?php
include("conn.php");
if(isset($_GET['id'])){
    $id=$_GET['id'];
    $query= "update reports set resolve='1' where id='$id'";
    $data = mysqli_query($connection, $query);
    // $res = mysqli_fetch_array($data);
    // $query2 = "insert into resolved (name,email,age,gender,contact,aadhar,location,description) values('$res[name]','$res[email]','$res[age]','$res[gender]','$res[contact]','$res[aadhar]','$res[location]','$res[description]')";
    // $data = mysqli_query($connection, $query2);
    // $query3="delete from reports where id='$id'";
    // $data = mysqli_query($connection, $query3);
    if($data)
{
    echo "Resolved";
}
else {
   echo "Failed";
}}
?>
