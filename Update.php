<?php


$id = $_POST['id'];
$name = $_POST['name'];
$class = $_POST['Class'];
$age = $_POST['age'];

include 'conn.php';
$sql =  "UPDATE user SET user_name = '{$name}',class = '{$class}',age='{$age}' WHERE user_id = '{$id}'";
$result = mysqli_query($conn,$sql);
if($result = true){
    echo 1;
}else{
    echo 0;
}

?>