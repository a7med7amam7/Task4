<?php

$conn=mysqli_connect('localhost','root','','route');
function insert_user($name,$email,$pass,$phone,$adress){
    global $conn;
    $insert = "INSERT INTO `users`(`name`, `email`, `pass`, `phone`,`address`) 
                   VALUES('$name', '$email', '$pass', '$phone','$adress')";
try {
$insertdone = mysqli_query($conn, $insert);
return true;    
} catch (mysqli_sql_exception $e) {
if ($e->getCode() == 1062) { // "Duplicate Entry"
 return false;
} else {
 
 return false;
}
}
  }
  function insert_card($name,$image,$price,$size,$color,$quantity,$user_id){
    global $conn;
    $insert="INSERT INTO `card` (`name`,`image`,`price`,`size`,`color`,`quant`,`user_id`)
                          VALUES('$name','$image','$price','$size','$color','$quantity','$user_id')";
    $insertdone=mysqli_query($conn,$insert);   
    if($insertdone)return true;
    else return false;                   
  }
  function count_card($id){
    global $conn;
    $query = "SELECT COUNT(*) AS total_rows FROM `card` WHERE `user_id` = '$id'";
  $result = mysqli_query($conn, $query);
  $result=mysqli_fetch_assoc($result);
  return $result['total_rows'];
  } 

?>