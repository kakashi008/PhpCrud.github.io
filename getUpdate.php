<?php

include 'conn.php';
$id = $_POST['id'];
$sql = "SELECT * FROM user WHERE user_id = '{$id}'";
$result = mysqli_query($conn,$sql);
$output = '';
if(mysqli_num_rows($result) > 0){
            while($row = mysqli_fetch_assoc($result)){

                $output .="
                <div class='close_edit_block'>X</div>
                <div class='edit_userid'>{$row['user_id']}</div>        
                <form id='edit_form' action=''>                
                <input  type='hidden' name='id' value={$row['user_id']} placeholder='Enter the Name'>
                <input  type='text' name='name' value={$row['user_name']} placeholder='Enter the Name'>
                <input  type='text' name='Class' value={$row['class']} placeholder='Enter the Class'>
                <input  type='number' name='age' value={$row['age']} placeholder='Enter the Class'>
                <button id='update' class='btn btn-success'type='submit'>Update</button>
                </form>";
            };
  echo $output;
}else{
    echo 'something is wrong ok there is no record found !';
}
?>