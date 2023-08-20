<?php

$name = $_POST['first_name'];
$class = $_POST['class_name'];
$age = $_POST['age'];

$conn = mysqli_connect('localhost','root','','table');
$sql = "INSERT INTO user(user_name,class,age)
       VALUES('{$name}','{$class}','{$age}')";
if(mysqli_query($conn,$sql)){
    echo 1;
}else{
    echo 0;
}

?>