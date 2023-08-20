<?php

$id = $_POST['id'];
$conn = mysqli_connect('localhost','root','','table');
$sql = "DELETE FROM user WHERE user_id = '{$id}'";
$result = mysqli_query($conn,$sql);
if($result = true){
    echo 1;
}else{
    echo 0;
}
?>